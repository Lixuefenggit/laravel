<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        //判断用户是否登录 
        // session()->has('user_id')
        // if(1){

        $header=new \App\Model\Home\header();
        $headerData=$header->index();

            
            $user_id = session('userid');

            //实例化操作表
            $shops = DB::table('shop_cart')
               ->join('goods', 'goods.id', '=', 'shop_cart.gid')
               ->select('shop_cart.select','shop_cart.number','shop_cart.total','shop_cart.id', 'goods.name', 'goods.price', 'goods.sim_desc', 'goods.pic', 'goods.stock','goods.on_sale');
            // dd($shops);

             // ->orWhere('name', 'John')
            $list = $shops->where('uid',$user_id)->orderBy('create_at','desc')->get();


            // var_dump($list[0]);dd();
            // [
            //     ['select', '=', '1'],
            //     ['stock', '>', 0],
            //     ['on_sale','=', '1'],
            // ]
            if($shops){
                 $shops = $shops->where([
                            ['uid', '=', $user_id],
                            ['select', '=', '1'],
                            ['stock', '>', 0],
                            ['on_sale','=', '1'],
                            ])
                        ->pluck('total');
                // dd($shops);
                $sum = 0;
                foreach ( $shops  as $v ) {
                    // dd($v);
                    $sum += $v;
                }
           

                $sum = number_format($sum,2,'.','');
                // var_dump($sum);
                // dd($sum);
            }

            return view('Home.shop',['list'=>$list,'sum'=>$sum,'headerData'=>$headerData]);
            // return view('Home.shop');


      
        // }
       
    }





    // 添加商品
    public function add(Request $request){
        // dd('aaaaaaa');
        //判断用户是否登录 
        // session()->has('user_id')

        // 商品Id
        // $gid = $request->input('gid'); 
        $gid = 2;

        // 购买数量
        // $number = $request->input('number');
        $number = 5;


            // $user_id = session('user_id');
            $user_id = session('userid');

            $goods = DB::table('goods')->where('id',$gid)->first();
            // var_dump($goods);dd();
            $price = $goods->price;
            $data = array();

            $data['uid'] = $user_id;
            $data['gid'] = $gid;
            $data['number'] = $number;
            $data['create_at'] = time();
            $data['total'] = $price * $number;


            //查询购物车商品是否存在
            $gd = DB::table('shop_cart')->where('gid',$gid)->first();

            // 如果存在修改个数与小计
            if(!empty($gd)){
                // 查询原有个数
                $ygs = $gd->number;
                $data = array();
                $data['number'] = $number + $ygs;
                $data['create_at'] = time();
                $data['total'] = $price * $data['number'];

                $id = DB::table('shop_cart')->where('gid',$gid)->update($data);
            }else{
                // 不存在重新插入
                $id = DB::table('shop_cart')->insertGetId($data);
            }
    }



    // 购物车输入框修改
    public function store(Request $request)
    {   
        // dd(111);
        // 商品数量(购物车修改的)
        $number = $request->input('number');
        // dd($number);

        // 购物车商品id(购物车修改的)
        $id = $request->input('id');
        // dd($id);

        // 获取小计
        $total = $request->input('total');
        // dd($total);
        // dd($id);

        //判断用户是否登录 
        // session()->has('user_id')
        if(1){

            // $user_id = session('user_id');
            // $user_id = 1;

            // 调用对应的购物车商品
            $shop = DB::table('shop_cart')->where('id',$id)->first();

            // 从购物车获取uid
            $uid = $shop->uid;
            // 调用对应的商品
            // $goods = DB::table('goods')->where('id',$shops->gid)->first();

            // 获取商品单价
            // $price = $goods->price;

            $data = array();

            // 购买数
            $data['number'] = $number;

            // 小计
            $data['total'] = $total;
 

            DB::table('shop_cart')->where('id',$id)->update($data);


             //实例化操作表
            $shops = DB::table('shop_cart')
               ->join('goods', 'goods.id', '=', 'shop_cart.gid')
               ->select('shop_cart.select','shop_cart.number','shop_cart.total','shop_cart.id', 'goods.name', 'goods.price', 'goods.sim_desc', 'goods.pic', 'goods.stock','goods.on_sale');
            // dd($row);
            $shops = $shops->where([
                                    ['uid', '=', $uid],
                                    ['select', '=', '1'],
                                    ['stock', '>', 0],
                                    ['on_sale','=', '1'],
                                    ])
                            ->pluck('total');


            // $shops = DB::table('shop_cart')->where('uid',$uid)->where('select','1')->pluck('total');
            // dd($shops);
            $sum = 0;
            foreach ( $shops  as $v ) {
                // dd($v);
                $sum += $v;
            }
            // dd($sum);
            $sum = number_format($sum,2,'.','');

            echo json_encode(array('sum'=>$sum,'total'=>$data['total'],'number'=>$data['number']));
            // echo json_encode($sum $data['total']);
                

        }
    }

    // 记录用户选择状态
    public function select(Request $request)
    {   
        // dd($request->all());
        // 用户sessionId
        $user_id = 1;
        // $user_id = session('user_id');

        // 商品数量(购物车修改的)
        $id = $request->input('id');
        // dd($id != 0);
        $checked = $request->input('checked');
        // dd($checked);
        if($id != 0){
            // $shop = DB::table('shop_cart')->where('id',$id)->first();
            // dd($shop->select == true);
            if($checked == 'true'){
                $select = '1';
            }else{
                $select = '0';
            }
            // dd($select);
            DB::table('shop_cart')->where('id',$id)->update(['select' => $select]);
        }else{

            if($checked == 'true'){
                DB::table('shop_cart')->where('uid',$user_id)->update(['select' =>'1']);
            }else{
                DB::table('shop_cart')->where('uid',$user_id)->update(['select' =>'0']);
            }
        }

         //实例化操作表
        $shops = DB::table('shop_cart')
           ->join('goods', 'goods.id', '=', 'shop_cart.gid')
           ->select('shop_cart.select','shop_cart.number','shop_cart.total','shop_cart.id', 'goods.name', 'goods.price', 'goods.sim_desc', 'goods.pic', 'goods.stock','goods.on_sale');
    

        $shops = $shops->where([
                                ['uid', '=', $user_id],
                                ['select', '=', 1],
                                ['stock', '>', 0],
                                ['on_sale','=', 1],
                                ])
                        ->pluck('total');

        // $shops = DB::table('shop_cart')->where('uid',$user_id)->where('select', '1')->pluck('total');
        // dd($shops);
        if($shops){
            $sum = 0;
            foreach ( $shops  as $v ) {
                // dd($v);
                $sum += $v;
            }
        }

       $sum = number_format($sum,2,'.','');
       echo json_encode($sum);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function submit(Request $request)
    {
        // $all = $request->all();
        $all = $request->input('select');
        dd($all);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 删除
    public function delete(Request $request)
    {   
        $var = $request->input('arr');
        // $data = array();
        // for ($i=0; $i <var.length ; $i++) { 
        //     $data['id']=$var[$i];
        // }

        // dd($var);
        $row = DB::table('shop_cart')->whereIn('id',$var)->delete();
       
       echo json_encode('true');
    }





}


