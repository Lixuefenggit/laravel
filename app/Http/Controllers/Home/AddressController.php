<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

use App\Model\Home;

class AddressController extends Controller
{
    public function index()
    {
        $header=new \App\Model\Home\header();
        $headerData=$header->index();

        $uid=session('userid');
        $adds=DB::table('address')->where('uid',$uid)->get();

        $sum=[];
        foreach ($adds as $k) 
        {
            $arr=[];
            $arr[]=$k->id;
            // 收货人名字
            $arr[]=$k->add_name;
            // 分级地址
            $add_1=DB::table('district')->where('id',$k->add_1)->first();
            $add_2=DB::table('district')->where('id',$k->add_2)->first();
            $add_3=DB::table('district')->where('id',$k->add_3)->first();
            if($k->add_4){
            	$add_4=DB::table('district')->where('id',$k->add_4)->first();
            }
            $addStr=$add_1->name.$add_2->name.$add_3->name;
            if($k->add_4){
            	$addStr .=$add_4->name;
            }
            $arr[]=$addStr;
            // 收货人电话
            $arr[]=$k->add_number;
            $arr[]=$k->add_detail;
   			// 所有信息整合
            $sum[]=$arr;
        }

    	return view('Home.address',['uid'=>$uid,'sum'=>$sum,'headerData'=>$headerData]);
    }

    // 取地址并排序函数
    public function add($id)
    {
    	static $arr=array();
    	$tem=DB::table('district')->where('upid',$id)->get();
    	if(count($tem)){
    		$arr[]=$tem;
    		$upid=DB::table('district')->where('upid',$id)->first()->id;
    		$this->add($upid,$arr);
    	}
    	return $arr;
    }

    // 获取给定id的城市信息及其下属城市信息
    public function getCity(Request $request)
    {
    	$id=$request->input('id');
    	$data=$this->add($id);
    	echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }

    public function editCity(Request $request)
    {
    	$id=$request->input('id');
    	$data=$this->add($id);
    	echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }

    public function editIndex(Request $request)
    {
        $id=$request->input('id');
        $result=DB::table('address')->where('id',$id)->first();

        $lev1=$result->add_1;
        $lev2=$result->add_2;
        $lev3=$result->add_3;
        $lev4=$result->add_4;


        $arr=[];
        $pro=DB::table('district')->where('upid',0)->get();
        $arr[]=$pro;
        $city=DB::table('district')->where('upid',$lev1)->get();
        $arr[]=$city;
        $dis=DB::table('district')->where('upid',$lev2)->get();
        $arr[]=$dis;
        $county=DB::table('district')->where('upid',$lev3)->get();
        if(count($county)){
            $arr[]=$county;
        }

        $data=[$lev1,$lev2,$lev3,$lev4];
        $arr[]=$data;

        echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    }


    // 添加地址
    public function allInfo(Request $request)
    {

        $id=session('userid');
        $pro=$request->input('add_1');
        $cit=$request->input('add_2');
        $dis=$request->input('add_3');
        $str=$request->input('add_4');
        $add_detail=$request->input('add_detail');
        $add_name=$request->input('add_name');
        $add_number=$request->input('add_number');
        $add_default=$request->input('add_default');
        DB::table('address')->insertGetId(['uid'=>$id,'add_1'=>$pro,'add_2'=>$cit,'add_3'=>$dis,'add_4'=>$str,'add_detail'=>$add_detail,'add_name'=>$add_name,'add_number'=>$add_number,'add_default'=>$add_default]);
        // DB::table('address')->insertGetId($data);
    }

    // 修改地址
    public function allEdit(Request $request)
    {

        $id=$request->input('id');
        $pro=$request->input('add_1');
        $cit=$request->input('add_2');
        $dis=$request->input('add_3');
        $str=$request->input('add_4');
        $add_detail=$request->input('add_detail');
        $add_name=$request->input('add_name');
        $add_number=$request->input('add_number');
        DB::table('address')->where('id',$id)->update(['add_1'=>$pro,'add_2'=>$cit,'add_3'=>$dis,'add_4'=>$str,'add_detail'=>$add_detail,'add_name'=>$add_name,'add_number'=>$add_number]);
    }

    public function delete(Request $request)
    {
    	$id=$request->input('id');
        $result=DB::table('address')->where('id',$id)->delete();
        if($result){
        	echo 1;
        }else{
        	echo 0;
        }
        
    }
}
