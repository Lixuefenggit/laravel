<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Home;

use DB;

// 首页控制器
class IndexController extends Controller
{
    //
    public function index()
    {
    	$header=new \App\Model\Home\header();
        $headerData=$header->index();

        // 获取需要展示的各个分类下的商品
        $goods=DB::table('goods')->select('id','name','pid','price','pic','brand')->where('on_sale',1)->orderBy('add_time','desc')->get();
        $goodsAll=[];
        foreach($headerData[0] as $k=>$v){
        	$temArr=[];
        	$end=0;
        	foreach($v->children as $m=>$n){
        		foreach($goods as $z=>$x){
	        		if($x->pid==$n->id){
	        			$temArr[]=$x;
	        			if(count($temArr)>=4){
	        				$end=1;
	        				break;
	        			}
	        		}
	        	}
	        	if($end){
	        		break;
	        	}
        	}
        	$goodsAll[]=$temArr;
        }

        // 获取最新上架的8件商品
        $newGoods=$goods->take(8);

    	return view('Home.index.index',['headerData'=>$headerData,'goodsAll'=>$goodsAll,'newGoods'=>$newGoods]);
    }
}
