<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
	// 初始化
    public function __construct(){
    	parent::__construct();
    	$this->checkLogin();
    }
    // 验证是否登陆
    public function checkLogin(){
    	if(!$_SESSION['admin']){
    		//$this->error('请先登录吧',U('Login/index'));
    	}
    }

}