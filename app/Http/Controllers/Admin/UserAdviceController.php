<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class UserAdviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$tid)
    {   

    	$index = 'id';
    	$index2 = 'asc';
        if($request->has('heat')){
      		$index = 'heat';
      		$index2 = 'desc';
        }elseif($request->has('new2')){
      		$index = 'time';
      		$index2 = 'desc';
        }   

        //保存搜索条件
        $where = '';

        //实例化操作表
     	$ob = DB::table('advice_user')
	       ->join('advice_type', 'advice_user.tid', '=', 'advice_type.id')
	       ->join('users', 'advice_user.uid', '=', 'users.id')
	       ->select('advice_user.*', 'advice_type.pic', 'users.name')
	       ->where('tid', $tid);

	    
        //判断是否有搜索条件
        if($request->has('name')){

            //获取搜索的条件
            $name = $request->input('name');

            //添加到将要携带到分页中的数组中
            $where['name'] = $name;

            //给查询添加where条件
            $ob->where('name','like',"%{$name}%");
        }

        //执行分页查询
        $list = $ob->orderBy($index,$index2)->paginate(5);
        
        return view('Admin.uadvice',['list'=>$list,'tid'=>$tid,'where'=>$where]);
    }



    public function delete(Request $request,$tid)
    {
    	$id = $request->input('del');
        $row = DB::table('advice_user')->where('id',$id)->delete();
        if($row>0){
            return redirect('/admin/uAdvice/'.$tid)->with('msg','删除成功');
        }else{
            return redirect('/admin/uAdvice/'.$tid)->with('error','删除失败');
        }
    }
}

