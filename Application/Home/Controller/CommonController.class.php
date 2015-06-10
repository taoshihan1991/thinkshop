<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
	// 构造函数
    public function __construct(){
    	parent::__construct();
    	$this->mkCateData();
    	$this->getNav();
    	$this->getCategoryTree();
    }
    // 分类树部分
    public function getCategoryTree(){
    	$cate=F('category');
    	$cateTreeData=generateTree($cate);
    	$this->assign('cateTreeData',$cateTreeData);
    }
    // 导航部分
    public function getNav(){
    	$cate=F('category');
    	$nav=array();
    	foreach($cate as $v){
    		if($v['parent_id']==0){
    			$nav[]=$v;
    		}
    	}
        foreach($nav as $key=>$v){
            $temp=$this->getAllSonCate($cate,$v['id']);
            $nav[$key]['child']=$temp;            
        }
    	$this->assign('navigator',$nav);
    }
    // 获取所有子分类
    public function getAllSonCate($cate,$id){
        $allSonCate=findSon($cate,$id);
        $temp=array();
        foreach($allSonCate as $r){
            $temp[]=$r['id'];
        }
        $temp[]=$id;
        return $temp;  
    }
    // 缓存分类数据
    public function mkCateData(){
    	$cateData=F('category');
    	if(!$cateData){
	    	$category_model=D('category');
	    	$cateData=$category_model->select();
	    	F('category',$cateData);
    	}
    	return $cateData;
    }

}