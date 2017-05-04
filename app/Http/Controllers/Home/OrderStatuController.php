<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class OrderStatuController extends Controller
{
    public function index(Request $request)
    {
    	$header=new \App\Model\Home\header();
        $headerData=$header->index();

        $user_id = session('userid');

        //实例化操作表
        $data = DB::table('order')
           ->join('goods', 'goods.id', '=', 'order.gid')
           ->select('order.*','goods.name', 'goods.pic','goods.sale_count as sum')
           ->where('uid',$user_id)->orderBy('create_at','desc')->get();

        $arr=[];
        foreach($data as $k =>$v){
            if(in_array($v->order_num, $arr)){
                
            }else{
                $arr[]=$v->order_num;
            }
        }


        $list=[];
        // $sum = 0;
        foreach($arr as $m=>$n){
            foreach($data as $b=>$d){
                if($d->order_num==$n){
                    	$list[$n][]=$d;
                }
            }
        }

        $list2=[];
        foreach ($list as $k => $v) {
        	// dd($v);
        	if(count($v)>1){
        		$v[0]->sum = count($v);
        		$list2[$k]=$v[0];
        	}else{
        		$v[0]->sum = count($v);
        		$list2[$k]=$v[0];
        	}
        }


		return view('Home.order_statu',['list'=>$list2,'headerData'=>$headerData]);
    }

    // 删除订单
    public function delete(Request $request)
    {
    	// 要删除的订单编号
    	$rid = $request->input('rid');

    	$row = DB::table('order')->where('order_num',$rid)->delete();
       
       	echo json_encode('true');

    	// dd($rid);
    }    


    // 修改状态
    public function update(Request $request)
    {
    	// 要删除的订单编号
    	$rid2 = $request->input('rid2');

    	$row = DB::table('order')->where('order_num',$rid2)->update(['status'=>'5']);

    	dd($row);
       
       	echo json_encode('true');

    }    


    // ajax检查更新
    public function up(Request $request)
    {

    	$user_id = session('userid');

    	if(!$request->has('time')){

			$time = 0;
    	}else{
    		$time = $request->input('time');
    	}

	    	

    	$order = DB::table('order');

    	// 最新时间
    	$create_at = $order->max('create_at');

    	if($create_at > $time){
	        $data = $order
	        	->join('goods', 'goods.id', '=', 'order.gid')
		       	->select('order.*','goods.name', 'goods.pic','goods.sale_count as sum')
		       	->where('uid',$user_id)->where('create_at','>',$time)->orderBy('create_at','desc')->get();


		    $arr=[];
	        foreach($data as $k =>$v){
	            if(in_array($v->order_num, $arr)){
	                
	            }else{
	                $arr[]=$v->order_num;
	            }
	        }


	        $list=[];
	        // $sum = 0;
	        foreach($arr as $m=>$n){
	            foreach($data as $b=>$d){
	                if($d->order_num==$n){
	                    	$list[$n][]=$d;
	                }
	            }
	        }

	        $list2=[];
	        foreach ($list as $k => $v) {
	        	// dd($v);
	        	if(count($v)>1){
	        		$v[0]->sum = count($v);
	        		$list2[$k]=$v[0];
	        	}else{
	        		$v[0]->sum = count($v);
	        		$list2[$k]=$v[0];
	        	}
	        }

		    echo json_encode($list2);

		}else{

			echo json_encode(0);

		}
    }
}
