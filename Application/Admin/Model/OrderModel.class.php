<?php
namespace Admin\Model;
use Think\Model;
class OrderModel extends Model {

    // 获取列表
    public function getList($size,$condition=array()){
    	$count = $this->count();
    	$page  = new \Think\Page($count,$size);
    	$show  = $page->show();
    	$list=$this->table(C('DB_PREFIX')."order a")
                   ->join(C('DB_PREFIX')."user_address b on a.address_id=b.id")
                   ->field("a.*,b.name,b.tel")
                   ->where($condition)
                   ->limit($page->firstRow.','.$page->listRows)->order("a.id desc")->select();
    	$data['list']=$list;
    	$data['page']=$show;
    	return $data;
    }
    // 获取单条
    public function getInfo($condition){
        $info=$this->table(C('DB_PREFIX')."order a")
                   ->join(C('DB_PREFIX')."user_address b on a.address_id=b.id")
                   ->field("a.*,b.name,b.tel,b.address")
                   ->where($condition)
                   ->find();
        $goods=$this->table(C('DB_PREFIX')."order_goods a")
                    ->join(C('DB_PREFIX')."goods b on a.goods_id=b.id")
                    ->where(array('a.order_id'=>$info['id']))
                    ->field("a.num,b.name,b.id,b.img,b.sell_price,a.goods_attribute_id")
                    ->select();
        foreach($goods as $k=>$v){
            $attrArray=explode('|', $v['goods_attribute_id']);
            $attrList=$this->table(C('DB_PREFIX')."goods_attr a")
                     ->join(C('DB_PREFIX')."attribute b on a.attribute_id=b.id")
                     ->where(array('a.id'=>array('in',$attrArray)))
                     ->field("a.attr_value,a.attr_price,b.name attr_name")
                     ->select();
            $goods[$k]['attr']=$attrList;
        }
        $info['goods']=$goods;
        return $info;
    }

}