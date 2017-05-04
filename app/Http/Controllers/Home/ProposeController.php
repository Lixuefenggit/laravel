<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class ProposeController extends Controller
{

    public function index(Request $request,$id=0)
    {   
        $header=new \App\Model\Home\header();
        $headerData=$header->index();

    	//建议排序
    	$index = 'heat';
    	$index2 = 'desc';
    	$select = '1';
        if($request->input('order')== '1'){
      		$index = 'heat';
      		$index2 = 'desc';
        }elseif($request->input('order')== '2'){
      		$index = 'time';
      		$index2 = 'desc';
      		$select = '2';
        }   


       // 判断显示模块
  
        $s = DB::table('advice_type')->where('status','2')->first();
        // dd($id == '0');
        if($s && $id == '0'){
        	$type = DB::table('advice_type')->where('status','2')->first();
        }elseif($id != '0'){
        	$type = DB::table('advice_type')->where('id',$id)->first();
        }else{
        	$creator_time = DB::table('advice_type')->max('creator_time');
        	$type = DB::table('advice_type')->where('creator_time',$creator_time)->first();
        }

        // 当前显示的id
        $id1 = $type->id;

        // 遍历最右边图片
        $users = DB::table('advice_type')->where('id','!=',$id1)->orderBy('status','desc');
        $ulist = $users->orderBy('creator_time','desc')->get();


        //用户建议
     	$user = DB::table('advice_user')
	       ->join('advice_type', 'advice_user.tid', '=', 'advice_type.id')
	       ->join('users', 'advice_user.uid', '=', 'users.id')
	       ->select('advice_user.*', 'advice_type.topic_content','advice_type.pic','advice_type.topic','advice_type.status', 'users.name','users.head')
	       ->where('tid',$id1);     	

	    // dd($user->get());
	    // 建议总数
	    $count = count($user->get());
	   
        $list = $user->orderBy($index,$index2)->paginate(15);

        return view('Home.propose',['list'=>$list,'type'=>$type,'count'=>$count,'select'=>$select,'ulist'=>$ulist,'headerData'=>$headerData]);
    }


    // ajax更新建议热度
    public function ajaxHeat(Request $request)
    {	
    		// dd($request);
    	if($request->input('id') == 'load'){

    		if(session()->has('site')){
    			// dd('1');
    			// 把客户点击的热度放到session
				$site = session()->get('site');
    		}else{
    			// dd('0');
    			$site = 0;
    		}
			
			// var_dump($site);die();
			// dd($site);
			echo json_encode($site);
	    	// echo json_encode($list);
	    	// echo json_encode($site);


    	}else{
	    	// 获取ajax值(id)
	    	$id = $request->input('id');

	    	// 查这条建议的数据
	    	$list = DB::table('advice_user')->where('id',$id)->first();

	    	// 热度+1
	    	$heat = $list->heat += 1;

	    	// 更新数据库建议热度
			DB::table('advice_user')->where('id',$id)->update(['heat' => $heat]);

			// session()->push('site.heat', $id);

			// 把客户点击的热度放到session
			session()->push('site.heat', $id);
			
			// session(['user_id'=>'1']);
			if(session()->has('site')){
			    $site = session()->get('site');
			    $site = $site['heat'];
			}else{
				$site = false;
			    $site = false;
			}
			// var_dump($site);
			
			echo json_encode(array('heat'=>$heat,'site'=>$site));
	    	// echo json_encode($list);
	    	// echo json_encode($site);

    	}
    	

    }



    // 用户提交建议方法
    public function store(Request $request)
    {  

        if(session('userid')){

            $tid = $request->input('tid');
            $content = $request->input('content');
            $uid = session('userid');

            // 设置时区
            date_default_timezone_set('PRC');

            //设置提交时间 
            $time = date('Y-m-d H:i:s',time());

                
            $id = DB::table('advice_user')->insertGetId(['tid'=>$tid,'content'=>$content,'uid'=>$uid,'time'=>$time]);
            if($id>0){
                return redirect('/home/propose');
            }
        }else{
            return redirect('/Home/Qtgluser');
        }


    }

}
