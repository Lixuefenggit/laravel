<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class BrandController extends Controller
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
        $ob = DB::table('brand');
        //判断是否有搜索条件
        if($request->has('brand_name')){
            //获取搜索的条件
            $name = $request->input('brand_name');
            //添加到将要携带到分页中的数组中
            $where['brand_name'] = $name;
            //给查询添加where条件
            $ob->where('brand_name','like',"%{$name}%");
        }
        $list = $ob->paginate(5);
        // $list = DB::table('brand')->get();
        return view('Admin.Brand.index',['list'=> $list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Brand.add');
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
         $data=$request->except('_token');
         $id = DB::table('brand')->insertGetId($data);
         if($id>0){
         return redirect('/Admin/brand')->with('msg','添加成功');
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
        $data = DB::table('brand')->where('id',$id)->first();
        return view('Admin.Brand.edit',['ob'=> $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $id=$request->input('id');
        $brand_name=$request->input('brand_name');
        $url=$request->input('url');
        $pic=DB::table('brand')->where('id',$id)->first()->pic;
        $filename = ('/Admin/upload/'.$pic);
        if(file_exists($filename)){
            unlink($filename);
        }
        if($request->hasFile('pic')){                 //是否有文件上传
            if($request->file('pic')->isValid()){       //是否有效
                $data = $request->file('pic');              //获取上传对象
                $ext = $data->getClientOriginalExtension();      //获取上传文件后缀
                $pic = time().rand(1000,9999).'.'.$ext;          //拼装你需要使用的文件名
                $data->move('./Admin/upload',$pic);          //移动临时文件生成新文件
                DB::table('brand')->where('id',$id)->update(['brand_name'=>$brand_name,'url'=>$url,'pic'=>$pic]);
            }else{
                return redirect('/Admin/brand');
            }
            return redirect('/Admin/brand');
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
        $row = DB::table('brand')->where('id',$id)->delete();
        if($row>0){
            return redirect('/Admin/brand')->with('msg','删除成功');
        }else{
            return redirect('/Admin/brand')->with('error','删除失败');
        }
    }

    public function doupload(Request $request)
    {

        if($request->pic){                 //是否有文件上传
            if($request->file('pic')->isValid()){         //是否有效
                $data = $request->file('pic');              //获取上传对象
                $ext = $data->getClientOriginalExtension();      //获取上传文件后缀
                $pic = time().rand(1000,9999).'.'.$ext;          //拼装你需要使用的文件名
                $data->move('./Admin/upload',$pic);          //移动临时文件生成新文件
                // DB::table('brand');
                $name=$request->input('brand_name');
                $url=$request->input('url');
                $id=DB::table('brand')->insertGetId(['brand_name'=>$name,
                            'pic'=>$pic,
                            'url'=>$url,
                ]);
                return redirect('/Admin/brand');
            }
        }
    }
}
