<?php
namespace Blog\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$this->getCategory();

    	$condition=isset($_GET['category_id']) ? array('a.category_id'=>I('get.category_id','intval')) : array();
    	$article_model=D('article');
    	$articleData=$article_model->getList(20,$condition);
    	
    	$articleLeft=array();
    	$articleRight=array();
    	foreach($articleData['list'] as $k=>$v){
    		if($k%2==0){
    			$articleLeft[]=$v;
    		}else{
    			$articleRight[]=$v;
    		}
    	}
    	$this->assign('articleLeft',$articleLeft);
    	$this->assign('articleRight',$articleRight);
    	$this->assign('page',$articleData['page']);
    	$this->display();
    }
    public function getCategory(){
    	$articleclass_model=D('Articleclass');
    	$data=$articleclass_model->getTree();
    	$this->assign('cate',$data);
    }
}