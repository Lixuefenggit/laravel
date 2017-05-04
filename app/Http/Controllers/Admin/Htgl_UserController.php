<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class Htgl_UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jieshou ='';
        $ob = DB::table('users');
        if($request->has('name')){
            $name = $request->input('name');
            $jieshou['name']=$name;
            $ob->where('name',$name);
        }
        $list = $ob->paginate(7);
        return view('Admin.Htgl_user.index',['list'=>$list,'jieshou'=>$jieshou]);
        //实例化操作表

    }  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //修改显示
       $data = DB::table('users')->where('id',$id)->first();
        return view('Admin.htgl_user.edit',['ob'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //修改提交
        $data = $request->only('auth');
        $row = DB::table('users')->where('id',$id)->update($data);
        if($row>0){
            return redirect('/Htgl_user')->with('msg','修改成功');
        }else{
            return redirect('/Htgl_user')->with('error','修改失败');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       $row = DB::table('users')->where('id',$id)->delete();
        if($row>0){
            return redirect('/Htgl_user')->with('msg','删除成功');
        }else{
            return redirect('/Htgl_user')->with('error','删除失败');
        }
    }

    
}
