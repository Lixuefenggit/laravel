<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class SafetyController extends Controller
{
    public function index()
    {
        $header=new \App\Model\Home\header();
        $headerData=$header->index();

    	return view('Home.safety',['headerData'=>$headerData]);
    }

    public function doedit(Request $request)
    {
    	//echo $request->input('password');
       	$this->validate($request, [
        'password' => 'required|max:8|between:6,12',
	    ]);
	    $uid=$request->input('uid');
       	$password=$request->input('password');
    	$row = DB::table('users')->where('id',$uid)->update(['password'=>$password]);
    	if($row>0){
            echo $row;
        }else{
            echo $row;
        	
        }
	}
}
