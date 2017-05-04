<?php
// 收藏控制器
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Home;

use DB;

class CollectionController extends Controller
{
    //收藏页显示
    public function index(Request $request)
    {

    	// 显示导航栏
    	$header=new \App\Model\Home\header();
        $headerData=$header->index();

        // 获取收藏数据
        $uid=session('userid');
        $collection=DB::table('users')->where('id',$uid)->first();
        if($collection){
            $collection=$collection->collection;
            $collection=explode(',', $collection);
            $ob=DB::table('goods');
            $arr=[];
            foreach($collection as $k=>$v){
                $ob->orWhere('id',$v);
            }
            $data=$ob->get();
            return view('Home.collection.collection',['headerData'=>$headerData,'data'=>$data]);
        }else{
            return view('Home.collection.collection',['headerData'=>$headerData,'data'=>0]);
        }
        

    }

    // 删除收藏
    public function delete(Request $request)
    {
    	$uid=session('userid');
        $id=$request->input('id');
    	$replace=$id.',';
    	$collection=DB::table('users')->where('id',$uid)->first()->collection;
    	$collection .=',';
    	$collection=str_replace($replace,'',$collection);
    	$collection=rtrim($collection,',');
    	$result=DB::table('users')->where('id',$uid)->update(['collection'=>$collection]);
    	if($result){
    		echo 1;
    	}else{
    		echo 0;
    	}

    }

    // 添加收藏
    public function addCollect(Request $request)
    {
        $gid=$request->input('id');
        $collection=DB::table('users')->where('id',session('userid'))->first()->collection;
        if($collection){
            $collection .=",".$gid;
        }else{
            $collection .=$gid;
        }
        DB::table('users')->where('id',session('userid'))->update(['collection'=>$collection]);
    }
}
