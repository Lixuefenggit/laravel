<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class Htgl_SpecialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = DB::table('special_nav')->get();
        return view('Admin.Htgl_special.index',['list' => $list]);
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
        $row = DB::table('special_nav')->where('id','=',$id)->first();
        //相当于$row存到ob里显示到Stu/edit模板
        return view('Admin/Htgl_special/edit',['ob'=>$row]);
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
        if($request->hasFile('img')){
           if($request->file('img')->isValid()){
            //request请求
               $data = $request->file('img');
               //后缀名
               $ext = $data->getClientOriginalExtension();
               //拼随即名
               $picname = time().rand(1000,9999).'.'.$ext;

               //上传图片地址和名
               $users = DB::table('special_nav')->where('id',$id)->first();
               // return $users->img;
               if(file_exists($users->img)){
                    unlink($users->img);
                }
               $data->move('./Admin/upload',$picname);
               if($data->getError()>0){
                echo '上传失败';
                }else{

                    $data1= './Admin/upload/'.$picname;
                    $data = $request->only('navname','img','time');
                    $data['img'] = $data1;

                    $row = DB::table('special_nav')->where('id',$id)->update($data);
                    if($row>0){
                        return redirect('/Htgl_special')->with('msg','修改成功');
                    }else{

                    }            
                }   
            }
        }   
            return redirect('/Htgl_special')->with('error','修改失败');     
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
    }

}