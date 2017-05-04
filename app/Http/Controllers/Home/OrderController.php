<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

use App\Model\Home;

// 订单控制器
class OrderController extends Controller
{
    //
    public function index()
    {
    	$header=new \App\Model\Home\header();
        $headerData=$header->index();

    	return view('Home.order.order',['headerData'=>$headerData]);
    }
}
