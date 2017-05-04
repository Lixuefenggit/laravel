<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class ColumnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		//保存搜索条件
        $where = '';
        //实例化操作表
        $ob = DB::table('cate');
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
        $list = $ob->paginate(5);
        return view('Admin.Column.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Column.add');
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
        $message = [
        	'name.required'=>'栏目名必须填写',
        ];
        $this->validate($request, [
            'name' => 'required|max:8',
        ],$message);
        $data = $request->except('_token');
        $id = DB::table('cate')->insertGetId($data);
        if($id>0){
            return redirect('/Admin/column')->with('msg','添加成功');
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
        $data = DB::table('cate')->where('id',$id)->first();
        return view('Admin.Column.edit',['ob'=> $data]);
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
        $data = $request->only('name');
        $row = DB::table('cate')->where('id',$id)->update($data);
        if($row>0){
            return redirect('/Admin/column')->with('msg','修改成功');
        }else{
            return redirect('/Admin/column')->with('error','修改失败');
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
        $list = DB::table('cate')->where('pid',$id)->get();
        if(count($list)>0){
            return redirect('/Admin/column')->with('error','要删除这个类必须先删除这个类下的子类');
        }

        $row = DB::table('cate')->where('id',$id)->delete();
        if($row>0){
            return redirect('/Admin/column')->with('msg','删除成功');
        }else{
            return redirect('/Admin/column')->with('error','删除失败');
        }
    }



    
    public function createSubclass($id)
    {
        $list = DB::table('cate')->where('id',$id)->first();
        return view('Admin.Column.addSubclass',['list' => $list]);
    }

    
    public function storeSubclass(Request $request)
    {
        $data = $request->except('_token');
        $par = DB::table('cate')->where('id',$request->input('pid'))->first();
        $data['path'] = $par->pid.','.$data['pid'];
        $id = DB::table('cate')->insertGetId($data);
        if($id>0){
            return redirect('/Admin/column')->with('msg','添加子类成功');
        }
    }
}
