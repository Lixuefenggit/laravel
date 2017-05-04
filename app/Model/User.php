<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function checkUser($request)
    {
    	$name=$request->input('name');
    	$ob=$this->where('name',$name)->first();
    	if($ob){
    		if($request->input('password') == $ob->password){
    			return $ob;
    		}else{
    			return null;
    		}
    	}else{
    		return null;
    	}
    }
}
