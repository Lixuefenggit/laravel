<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class Htgl_HosspecialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $jieshou ='';
        $ob = DB::table('special_hosspecial');
        if($request->has('imgtitle')){
            $title = $request->input('title');
            $jieshou['title']=$title;
            $ob->where('title',$title);
        }
        $list = $ob->paginate(7);
        return view('Admin.Htgl_hosspecial.index',['list'=>$list,'jieshou'=>$jieshou]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Htgl_hosspecial.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data = $request->except('_token');
       if($request->hasFile('img')){
           if($request->file('img')->isValid()){
            //request请求
               $data2 = $request->file('img');
               //后缀名
               $ext = $data2->getClientOriginalExtension();
               //拼装出你需要使用的文件名
               $picname = time().rand(1000,9999).'.'.$ext;
               $data2->move('./Admin/upload',$picname);
               if($data2->getError()>0){
                echo '上传失败';
                }else{
                    //拼装的地址
                    $data1= './Admin/upload/'.$picname;
                    //因为data是除了_token其他的所有数据插入数据库，['img']是选择下标为img的字段，然后img字段等于拼装的地址,将这个地址插入到数据库img字段
                    $data['img'] = $data1;
                    //插入这一行数据
                    $id = DB::table('special_hosspecial')->insertGetId($data);
                    if($id>0){ 
                        return redirect('Htgl_hosspecial')->with('msg','添加成功');
                    }
                }   
            }
        }   
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
         //文章修改显示
        $row = DB::table('special_hosspecial')->where('id','=',$id)->first();
        //相当于$row存到ob里显示到Stu/edit模板
        return view('Admin/Htgl_hosspecial/edit',['ob'=>$row]);
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
               $users = DB::table('special_hosspecial')->where('id',$id)->first();
               // return $users->img;
               if(file_exists($users->img)){
                    unlink($users->img);
                }
               $data->move('./Admin/upload',$picname);
               if($data->getError()>0){
                echo '上传失败';
                }else{

                    $data1= './Admin/upload/'.$picname;
                    $data = $request->only('imgtitle','img','imgcontent','time');
                    $data['img'] = $data1;
                    $row = DB::table('special_hosspecial')->where('id',$id)->update($data);
                    if($row>0){
                        return redirect('/Htgl_hosspecial')->with('msg','修改成功');
                    }else{
                        return redirect('/Htgl_hosspecial')->with('error','修改失败');
                    }            
                }   
            }

        } 
        //找好判断
        return redirect('/Htgl_hosspecial')->with('error','修改失败');
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
       $row = DB::table('special_hosspecial')->where('id',$id)->delete();
        if($row>0){
            return redirect('/Htgl_hosspecial')->with('msg','删除成功');
        }else{
            return redirect('/Htgl_hosspecial')->with('error','删除失败');
        }        
    }        
    
}
