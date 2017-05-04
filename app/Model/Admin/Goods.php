<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

// 无限级分类处理
class Goods extends Model
{
    //
    public function resort($data,$pid=0,$level=0)
	{
		static $arr=array();
		$data= json_decode(json_encode($data),true);
		foreach($data as $k => $v){
			if($v['pid']==$pid){
				$v['level']=$level;
				$arr[]=$v;
				$this->resort($data,$v['id'],$level+1);
			}
		}
		return $arr;
	}
}
