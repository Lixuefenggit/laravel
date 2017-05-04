<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

use App\Model\Home;

class GoodsController extends Controller
{
    public function index(Request $request,$id)
    {

        $header=new \App\Model\Home\header();
        $headerData=$header->index();

    	$data=DB::table('goods')->where('id',$id)->first();
    	$attr=DB::table('cate')->where('id',$data->pid)->first()->attr;
    	$attr=explode(',', $attr);
    	
    	$attr_value=json_decode($data->attr,true);

    	// 规格
    	$specification=$data->attr_value;

        $isCollect=0;
        if(session('userid')){
            // 获取收藏数据
            $user=DB::table('users')->where('id',session('userid'))->first();
            $collect=explode(',', $user->collection);
            if(in_array($id,$collect)){
                $isCollect=1;
            } 
        }


        // 缩略图
        $thumb=DB::table('thumb')->where('gid',$id)->get();
        // 详情图
        $detail=DB::table('detail')->where('gid',$id)->get();


    	return view('Home.goods',['attr'=>$attr,'attr_value'=>$attr_value,'specification'=>$specification,'data'=>$data,'headerData'=>$headerData,'isCollect'=>$isCollect,'thumb'=>$thumb,'detail'=>$detail]);
    }

    public function getAttr(Request $request,$id)
    {
    	$data=DB::table('goods')->where('id',$id)->first()->attr_value;
    	echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }

    // 添加购物车
    public function addShop(Request $request)
    {
        if(session('username')){
            $id=$request->input('gid');
            $goodsData=DB::table('goods')->where('id',$id)->first();
            $num=$request->input('num');
            $total=intval($goodsData->price)*intval($num);
            $data=DB::table('shop_cart')->where('gid',$id)->where('uid',session('userid'))->first();
            if($data){
                $data->number +=intval($num);
                $data->total +=intval($total);
                $update=json_decode(json_encode($data),true);
                DB::table('shop_cart')->where('id',$data->id)->update($update);
            }else{
                DB::table('shop_cart')->insert(['uid'=>session('userid'),'gid'=>$id,'create_at'=>date("Y-m-d H:i:s",time()),'total'=>$total,'number'=>$num,'select'=>1]);
            }  
        }
        
    }
}
