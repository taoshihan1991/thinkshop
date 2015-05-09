<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
    	$this->display();
    }
    // 退出
    public function logout(){
    	$this->redirect('index');
    }
    // 验证码
    public function code(){
    	$img=new \Think\Verify();
    	$img->entry();
    }
}