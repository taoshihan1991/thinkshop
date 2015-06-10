<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
	// 构造函数
    public function __construct(){
    	parent::__construct();
    }
    
    public function index(){
    	$cate=F('category');
    	// 小麦明星单品
    	$starCate=$phoneCate=$this->getAllSonCate($cate,38);
    	$starList=$this->indexFloorGoods($starCate);
    	$this->assign('starList',$starList);

    	// 小麦手机
    	$phoneCate=$this->getAllSonCate($cate,6);
    	$phoneList=$this->indexFloorGoods($phoneCate);
    	$this->assign('phoneList',$phoneList);

    	$this->display();
    }
    public function indexFloorGoods($cid){
    	$condition=array(
    		'category_id'=>array('in',$cid)
    	);
    	$field=array(
    		'name','id','img','sell_price','goods_ad'
    	);
    	$goods_model=D('goods');
    	$list=$goods_model->getAll($condition,$field);
    	return $list;
    }
}