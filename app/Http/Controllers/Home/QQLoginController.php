<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QQLoginController extends Controller
{
    //
    public function index()
    {
    	return view('Home.QQ.index');
    }

    public function callback(Request $request)
    {
    	
    }
}
