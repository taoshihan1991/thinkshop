<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
	// 构造函数
    public function __construct(){
    	parent::__construct();
    }
    
    public function index(){
    	$this->display();
    }
}