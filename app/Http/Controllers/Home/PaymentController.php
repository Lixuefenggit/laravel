<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

// 生成订单
class PaymentController extends Controller
{
    // 处理来自购物车的请求
	public function submit(Request $request)
    {	
        $header=new \App\Model\Home\header();
        $headerData=$header->index();



        // 用户id
        $uid=session('userid');

        $adds=DB::table('address')->where('uid',$uid)->first();
        if(count($adds)>0){
            $id=$adds->id;
            $add_1=DB::table('district')->where('id',$adds->add_1)->first();
            $add_2=DB::table('district')->where('id',$adds->add_2)->first();
            $add_3=DB::table('district')->where('id',$adds->add_3)->first();
            if($adds->add_4){
                $add_4=DB::table('district')->where('id',$adds->add_4)->first();
            }
            $addStr=$add_1->name.$add_2->name.$add_3->name;
            if($adds->add_4){
                $addStr .=$add_4->name;
            }


            //订单数据生成
            $select=$request->input('select');
            // 将购物车选中的数据传递到下一个页面
            $selectTans=implode(',',$select);

            $ob=DB::table('shop_cart');
            for($i=0;$i<count($select);$i++){
                $ob->orWhere('id',$select[$i]);
            }      
            $data=$ob->get();
            
            // 商品数量
            $sum=[];
            $goods=DB::table('goods');
            foreach($data as $k=>$v){
                $arr=[];
                $arr['num']=$v->number;
                $goods->orWhere('id',$v->gid);
                $sum[]=$arr;
            }


            // 商品信息
            $goodsData=$goods->get();
            $sum1=[];
            foreach($goodsData as $k=>$v){
                $arr1=[];
                $arr1[]=$v->id;
                $arr1[]=$v->pic;
                $arr1[]=$v->name;
                $arr1[]=$v->price;
                $sum1[]=$arr1;
            }
                
            // 单个商品总价
            $arr3=[];
            for($j=0;$j<count($sum);$j++){
                $arr3[]=intval($sum[$j]['num'])*intval($sum1[$j][3]);
            }

            // dd($arr3);

            // 订单总金额
            $total=0;
            for($m=0;$m<count($arr3);$m++){
                $total +=$arr3[$m];
            }

            if($total<99){
                $carriage=10;
                $total=$total+$carriage;
            }else{
                $carriage=0;
            }
                

            return view('Home.submit',['sum'=>$sum,'sum1'=>$sum1,'arr3'=>$arr3,'adds'=>$adds,'addStr'=>$addStr,'total'=>$total,'carriage'=>$carriage,'addressId'=>$id,'headerData'=>$headerData,'selectTans'=>$selectTans]);
        }else{
            return redirect('/Home/address')->with('tip','请先添加一条地址');
        }

        
    }

    // 处理来自直接购买的请求
    public function submitFromBuy(Request $request)
    {
        $header=new \App\Model\Home\header();
        $headerData=$header->index();

        // 默认地址id
        // $id=1;
        // 用户id
        $uid=session('userid');
        // // 商品id
        // $gid=1;
        $adds=DB::table('address')->where('uid',$uid)->first();
        if(!$adds){
            return redirect('/Home/address')->with('tip','请先添加一条地址');
        }else{
            $id=$adds->id;
        }
        $add_1=DB::table('district')->where('id',$adds->add_1)->first();
        $add_2=DB::table('district')->where('id',$adds->add_2)->first();
        $add_3=DB::table('district')->where('id',$adds->add_3)->first();
        if($adds->add_4){
            $add_4=DB::table('district')->where('id',$adds->add_4)->first();
        }
        $addStr=$add_1->name.$add_2->name.$add_3->name;
        if($adds->add_4){
            $addStr .=$add_4->name;
        }


        // 生成订单数据
        $gid=$request->input('hiddenGoodsId');
        $goodsCount=$request->input('goodsCount');

        $selectTans=$gid;

        // 商品数量数组
        $sum=[];
        $sum[0]['num']=$goodsCount;

        $temGoods=DB::table('goods')->where('id',$gid)->first();
        $sum1=[];
        $sum1[0][]=$temGoods->id;
        $sum1[0][]=$temGoods->pic;
        $sum1[0][]=$temGoods->name;
        $sum1[0][]=$temGoods->price;

        $arr3=[];
        $arr3[]=intval($temGoods->price)*intval($goodsCount);

        $total=intval($temGoods->price)*intval($goodsCount);

        if($total<99){
            $carriage=10;
        }else{
            $carriage=0;
        }

        return view('Home.submit',['sum'=>$sum,'sum1'=>$sum1,'arr3'=>$arr3,'adds'=>$adds,'addStr'=>$addStr,'total'=>$total,'carriage'=>$carriage,'addressId'=>$id,'headerData'=>$headerData,'selectTans'=>$selectTans]);

    }





    public function complete(Request $request,$orderNum)
    {
        $header=new \App\Model\Home\header();
        $headerData=$header->index();

        $order=DB::table('order')->where('order_num',$orderNum)->first();

        //return 111;
        $id=$order->address;
        $adds=DB::table('address')->where('id',$id)->first();
        //dd($adds);
  
        $add_1=DB::table('district')->where('id',$adds->add_1)->first();
        $add_2=DB::table('district')->where('id',$adds->add_2)->first();
        $add_3=DB::table('district')->where('id',$adds->add_3)->first();
        if($adds->add_4){
            $add_4=DB::table('district')->where('id',$adds->add_4)->first();
        }
        $addStr=$add_1->name.$add_2->name.$add_3->name;
        if($adds->add_4){
            $addStr .=$add_4->name;
        }

        return view('Home.complete',['adds'=>$adds,'addStr'=>$addStr,'headerData'=>$headerData,'order'=>$order,'orderNum'=>$orderNum]);
    }


    public function genOrder(Request $request)
    {
        $selectTans=$request->input('selectTans');
        $select=explode(',', $selectTans);
        $ob=DB::table('shop_cart');
        foreach($select as $k=>$v){
            $ob->orWhere('id',$v);
        }
        $ob->delete();

        // 地址id
        $addressId=$request->input('addressId');
        // 商品id数组
        $goodsId=$request->input('gid');
        // 运费
        $carriage=$request->input('carriage');
        // 订单总价
        $total=$request->input('total');
        // 商品数量数组
        $goodsNumber=$request->input('goodsNumber');
        // 生成订单号
        $orderNum=time().rand(1000,9999);

        $data=[];
        $arr=[];
        for($i=0;$i<count($goodsNumber);$i++){
            $arr=[];
            // 临时uid,需要替换成session里取出的uid
            $arr['uid']=session('userid');
            $arr['gid']=$goodsId[$i];
            $arr['address']=$addressId;
            $arr['order_num']=$orderNum;
            $arr['carriage']=$carriage;
            $arr['total']=$total;
            $arr['number']=$goodsNumber[$i];
            $arr['status']=1;
            $arr['create_at']=date("Y-m-d H:i:s",time());
            $data[]=$arr;
        }

        $result=DB::table('order')->insert($data);

        if($result){
            return redirect('/Home/payoff/'.$orderNum);
        }else{
            return back();
        } 
    }
}
