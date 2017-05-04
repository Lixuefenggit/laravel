<?php
// 前台导航条header处理

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

use DB;

class header extends Model
{
    //
    public function index()
    {
    	$data=DB::table('cate')->get();

        $headerData=[];

        $sum=[];
        foreach($data as $K=>$v){
            if($v->pid==0){
                $sum[]=$v;
            }
        }

        foreach($sum as $m=>$n){
            $arr=[];
            foreach($data as $p=>$x){
                if($x->pid==$n->id){
                    $arr[]=$x;
                }
            }
            $n->children=$arr;
        }
        $headerData[]=$sum;
        // 购物车数量
        $shopCount=DB::table('shop_cart')->where('uid',session('userid'))->select('number')->get();
        $shopnum=0;
        for($i=0;$i<count($shopCount);$i++){
            $shopnum +=$shopCount[$i]->number;
        }
        $headerData[]=$shopnum;
    	return $headerData;
    }
}
