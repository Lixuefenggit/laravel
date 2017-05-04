<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class GoodsListController extends Controller
{
    public function index(Request $request)
    {
        $header=new \App\Model\Home\header();
        $headerData=$header->index();
    	
    	$pid = $request->input('pid');

    	$xpid = $request->input('xpid');
    	$pid2 = $request->input('pid2');

    	if( $request->has('xpid') && $xpid != 0){
    		$id = 'id';
    		$pid = $xpid;
    		// $pid = 2;
    		$statu = 1;

    		// 导航条
    		$dht=DB::table('cate')->where('pid',$pid2)->get();

    		$order = $pid;

    	}else if($request->has('xpid') && $xpid == 0){
    		$id = 'pid';
    		$pid = $pid2;
    		// $pid = 2;
    		$statu = 0;

    		// 导航条
    		$dht=DB::table('cate')->where('pid',$pid2)->get();

    		$order = 0;
    	}else{

    		$id = 'pid';
    		$pid2 = $pid;
    		$statu = 0;

    		// 导航条
    		$dht=DB::table('cate')->where('pid',$pid)->get();
    		$order = 0;
    	}

    	// var_dump($statu);

    	//建议排序
    	$index = 'price';
    	$index2 = 'desc';

     	if($request->has('statu') && $order != 0){
     		// var_dump('statu');
	        if($request->input('statu')== 'price'){

		        if(session()->has('price_statu')){
				    $price_statu = session('price_statu');

				    if($price_statu == 1){
				    	$index = 'price';
    					$index2 = 'desc';
    					session(['price_statu' => 2]);
				    }else{
				    	$index = 'price';
    					$index2 = 'asc';
    					session(['price_statu' => 1]);
				    }

				}else{
					$index = 'price';
    				$index2 = 'asc';
    				session(['price_statu' => 1]);
				}

	        }elseif($request->input('statu')== 'time'){
	        	// var_dump('time');
				if(session()->has('time_statu')){
				    $time_statu = session('time_statu');

				    if($time_statu == 1){
				    	$index = 'add_time';
    					$index2 = 'desc';
    					session(['time_statu' => 2]);
				    }else{
				    	$index = 'add_time';
    					$index2 = 'asc';
    					session(['time_statu' => 1]);
				    }

				}else{
					$index = 'add_time';
    				$index2 = 'asc';
    				session(['time_statu' => 1]);
				}
	        }   
	    }

    	$totalCate=DB::table('cate')->where($id,$pid)->get();

    	

    	$ob=DB::table('goods');

    	$fenlei = array();


    	foreach($totalCate as $k=>$v){
    		$fenlei[$v->id] = $v;
    		$ob->orWhere('pid',$v->id);
    	}

    	// dd($totalCate);

    	// 得到顶级大分类下的所有商品
    	// $goods=$ob->orderBy('price','asc')->get();
    	$goods=$ob->orderBy($index,$index2)->get();
    	// dd($goods);
    	// dd($goods);
    	$list=[];
    	foreach($goods as $k=>$v){
    		foreach($totalCate as $m=>$n)
    			if($v->pid==$n->id){
    				$list[$n->id][]=$v;
    			}
    	}    	





    	// $json=json_encode($list,JSON_UNESCAPED_UNICODE);

    	// dd($fenlei);
    	// dd($list);
    	// dd($dht);


    	return view('Home.goods_list',['list'=>$list,'pid2'=>$pid2,'xpid'=>$xpid,'order'=>$order,'fenlei'=>$fenlei,'statu'=>$statu,'dht'=>$dht,'headerData'=>$headerData,'request'=>$request]);
    }
}



// $cate=DB::table('cate')->where('pid',$pid)->get();
// $ob=DB('goods');

// foreach($cate as $k){
// 	$ob->orWhere('gpid',$k->id);
// }
// $goods=$ob->get();

// json_encode(data[][])

// fenlei[][]


// foreach($data as $k=>$v){
// 	fenlei[$v]['name']
// 	fenlei[$v]['pic']
// 		foreach ($variable as $key => $value) {
// 			$value['id']
// 			$value['name']
// 		}
// }


// $json=json_encode(data[][])
// <span>{{ $json }}</span>

// js eval()

// "<div>"+  +"</div>"
// "<img src="+  +">"
