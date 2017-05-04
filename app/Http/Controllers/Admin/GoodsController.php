<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use App\Model\Admin;

class GoodsController extends Controller
{
	// 商品管理首页
    public function index(Request $request)
    {
        $where='';
        $ob=DB::table('goods');
        $list=$ob->paginate(8);
        return view('Admin.goods.index',['list'=>$list,'where'=>$where]);
    }

    // 商品添加显示
    public function add(Request $request)
    {
        // get请求，处理显示页面
        if($request->method()=='GET'){
            $data=DB::table('cate')->get();
            $model=new \App\Model\Admin\Goods();
            $data=$model->resort($data);

            $brand=DB::table('brand')->get();
            return view('Admin.goods.add',['data'=>$data,'brand'=>$brand]);
        }
        // post请求，处理商品添加过程
        if($request->method()=='POST'){
            $allData=[];
            $allData['name']=$request->input('name');
            $allData['pid']=$request->input('pid');
            $allData['brand']=$request->input('brand');
            $allData['price']=$request->input('price');
            $allData['sim_desc']=$request->input('sim_desc');
            $allData['attr']=$request->input('attr');
            $allData['attr_value']=$request->input('attr_value');
            $allData['stock']=1000;
            
            // 写入数据库
            $id=DB::table('goods')->insertGetId($allData);
            if($id){
                echo $id;
            }else{
                echo 0;
            }

        }
    	
    }

    // 添加商品上传图片
    public function addImage(Request $request,$id)
    {
        if($request->method()=='GET'){
            return view('Admin.goods.image',['id'=>$id]);
        }

        if($request->method()=='POST'){
            // 上传缩略图
            if($request->hasFile('thumb')){
                foreach($request->file('thumb') as $k=>$thumb) {
                    $ext = $thumb->getClientOriginalExtension();
                    $picname = time().rand(1000,9999).'.'.$ext;
                    $thumb->move('./Admin/thumb/', $picname);
                    if($thumb->getError()>0){

                    }else{
                        if($k==0){
                           DB::table('goods')->where('id',$id)->update(['pic'=>'./Admin/thumb/'.$picname]); 
                        }
                        DB::table('thumb')->insertGetId(['gid'=>$id,'url'=>'./Admin/thumb/'.$picname]);
                    }
                }
            }
            // 上传详情图
            if($request->hasFile('detail')){
                foreach($request->file('detail') as $detail) {
                    $ext = $detail->getClientOriginalExtension();
                    $picname = time().rand(1000,9999).'.'.$ext;
                    $detail->move('./Admin/detail/', $picname);
                    if($detail->getError()>0){

                    }else{
                        DB::table('detail')->insertGetId(['gid'=>$id,'url'=>'./Admin/detail/'.$picname]);
                    }
                }
            }
            return redirect('/Admin/goods');
        }
    }

    // 获取类别属性，前台添加商品时切换商品类型时请求，ajax请求
    public function getAttr(Request $request)
    {
    	$id=$request->input('id');
    	$attr=DB::table('cate')->where('id',$id)->first()->attr;
    	$attr=explode(',',$attr);
    	echo json_encode($attr,JSON_UNESCAPED_UNICODE);
    }

    public function delete(Request $request,$id)
    {
        $result=$result=DB::table('goods')->where('id',$id)->delete();
        if($result){
            return redirect('/Admin/goods')->with('msg','删除成功');
        }else{
            return redirect('/Admin/goods')->with('error','删除失败');
        }
    }

    // 商品修改
    public function edit(Request $request,$id)
    {
        // get请求，处理显示页面
        if($request->method()=='GET'){
            $data=DB::table('goods')->where('id',$id)->first();
            // 所属分类名称
            $cate=DB::table('cate')->where('id',$data->pid)->first();
            // 属性
            $cateAttr=explode(',', $cate->attr);
            // 品牌名
            $brand=DB::table('brand')->where('id',$data->brand)->first()->brand_name;
            $attr=json_decode($data->attr,true);
            $attr_value=$data->attr_value;
            return view('Admin.goods.edit',['cate'=>$cate,'brand'=>$brand,'data'=>$data,'attr'=>$attr,'cateAttr'=>$cateAttr,'attr_value'=>$attr_value]);
        }
        // post请求，处理商品修改过程
        if($request->method()=='POST'){
            $allData=[];
            $allData['name']=$request->input('name');
            $allData['price']=$request->input('price');
            $allData['sim_desc']=$request->input('sim_desc');
            $allData['attr']=$request->input('attr');
            $allData['attr_value']=$request->input('attr_value');
            
            // 写入数据库
            $result=DB::table('goods')->where('id',$id)->update($allData);
            if($result){
                echo $id;
            }else{
                echo 0;
            }
        }
    }
}
