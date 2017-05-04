<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
class AdviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
    

        if($request->has('statu')){
             // dd($request->input('statu'));
            $name['status'] = $request->input('statu');
            $id = $request->input('ID');
            if($request->input('statu') == '2'){
                $statu['status'] = '1';
                DB::table('advice_type')->where('status','2')->update($statu);
            }
            
                DB::table('advice_type')->where('id',$id)->update($name);
        }

        //保存搜索条件
        $where = '';

        //实例化操作表
        $ob = DB::table('advice_type');
        

        //判断是否有搜索条件
        if($request->has('topic')){

            //获取搜索的条件
            $name = $request->input('topic');

            //添加到将要携带到分页中的数组中
            $where['topic'] = $name;

            //给查询添加where条件
            $ob->where('topic','like',"%{$name}%");
        }

        //执行分页查询
        $list = $ob->orderBy('status','desc')->paginate(5);
        // dd($list);
        return view('Admin.advice',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->flashOnly(['topic', 'topic_content']);
        $this->validate($request, [
            'topic' => 'required|between:5,20',
            'topic_content' => 'required|between:10,60',
        ],[
            'topic.required' => '主题必须填写',
            'topic.between' => '请填写5~20的主题名',            
            'topic_content.required' => '主题内容必须填写',
            'topic_content.between' => '请填写10~60的主题内容'
        ]);

        $data;
        // dd($data); 
        if($request->hasFile('pic')){
            $data = $request->except('_token');
            // 判断上传的文件是否有效
            if($request->file('pic')->isValid()){
                // 获取上传的文件对象
                $data1 = $request->file('pic');
                // dd($data);
                // 获取上传的文件的后缀
                $ext = $data1->getClientOriginalExtension();
                // 拼装出你需要使用的文件名
                $picname = time().rand(1000,9999).'.'.$ext;
                // 移动临时文件，生成新文件到指定目录下
                $data1->move('./admin/upload',$picname);
                if($data1->getError()>0){
                    echo '上传失败';
                }else{
                    $data['pic'] ='/admin/upload/'.$picname; 
                }
            }
        }else{

            $data = $request->except('_token','pic');
        }

        //获取用户信息
        $user=session('adminuser')['attributes'];
        $data['creator'] = $user['username'];

        // 设置时区
        date_default_timezone_set('PRC');

        //设置注册时间 
        $data['creator_time'] = date('Y-m-d H:i:s',time());
            
        $id = DB::table('advice_type')->insertGetId($data);
        if($id>0){
            return redirect('/admin/advice')->with('msg','添加成功');
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
        //
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
        
        //闪存
        // $request->flashOnly(['topic', 'topic_content','pic']);

        $this->validate($request, [
            'topic' => 'required|between:5,20',
            'topic_content' => 'required|between:10,60',
        ],[
            'topic.required' => '主题必须填写',
            'topic.between' => '请填写5~20的主题名',            
            'topic_content.required' => '主题内容必须填写',
            'topic_content.between' => '请填写10~60的主题内容'
        ]);


        $data;

        if($request->hasFile('pic')){
            $data = $request->except('_token','_method');
            // 判断上传的文件是否有效
            if($request->file('pic')->isValid()){
                // 获取上传的文件对象
                $data1 = $request->file('pic');
                // dd($data);
                // 获取上传的文件的后缀
                $ext = $data1->getClientOriginalExtension();
                // 拼装出你需要使用的文件名
                $picname = time().rand(1000,9999).'.'.$ext;
                // 移动临时文件，生成新文件到指定目录下
                $data1->move('./admin/upload',$picname);
                if($data1->getError()>0){
                    echo '上传失败';
                }else{

                    // 如果上传成功把老图删除
                    $pic = DB::table('advice_type')->where('id',$id)->first();

                    // 判断是否有这个图片
                    if(file_exists($pic->pic) && !empty($pic->pic) && $pic->pic != '/admin/upload/default.jpg'){
                        unlink($pic->pic);
                    }

                    //图片上传成功后放入$data数组插入库 
                    $data['pic'] ='/admin/upload/'.$picname; 
                }
            }
        }else{

            $data = $request->except('_token','pic','_method');
        }

        $row = DB::table('advice_type')->where('id',$id)->update($data);
        if($row>0){
            return redirect('/admin/advice')->with('msg','修改成功');
        }else{
            return redirect('/admin/advice')->with('error','修改失败');
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
        // 如果上传成功把老图删除
        $pic = DB::table('advice_type')->where('id',$id)->first();
        // 判断是否有这个图片
        if(file_exists($pic->pic) && !empty($pic->pic) && $pic->pic != '/admin/upload/default.jpg'){
            unlink($pic->pic);
        }

        $row = DB::table('advice_type')->where('id',$id)->delete();
        if($row>0){
            DB::table('advice_user')->where('tid',$id)->delete();
            return redirect('/admin/advice')->with('msg','删除成功');
        }else{
            return redirect('/admin/advice')->with('error','删除失败');
        }
    }
}
