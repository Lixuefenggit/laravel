<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class OrderdetailController extends Controller
{
    public function index(Request $request,$orderNum)
    {
    	$header=new \App\Model\Home\header();
        $headerData=$header->index();

        $orderAll=DB::table('order')->where('order_num',$orderNum)->get();
        $data=$orderAll->first();

        $address=DB::table('address')->where('id',$data->address)->first();	
        $ob=DB::table('district');
        $ob->orWhere('id',$address->add_1);
        $ob->orWhere('id',$address->add_2);
        $ob->orWhere('id',$address->add_3);
        if($address->add_4){
        	$ob->orWhere('id',$address->add_4);
        }
        $add='';
        foreach($ob->get() as $k=>$v){
        	$add .=$v->name;
        }
        $add .=$address->add_detail;


        $goods=DB::table('goods');
        $num=[];
        foreach($orderAll as $m=>$n){
        	$goods->orWhere('id',$n->gid);
        	$num[]=$n->number;
        }
        $goodsData=$goods->get();

        return view('Home.orderdetail',['headerData'=>$headerData,'data'=>$data,'add'=>$add,'address'=>$address,'num'=>$num,'goodsData'=>$goodsData]);
    }
}
