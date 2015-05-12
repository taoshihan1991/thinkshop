<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
    	// 验证
    	if(IS_POST){
    		$username=I('post.username');
    		$password=I('post.password');
    		$code=I('post.code');

    		$verify=new \Think\Verify();
    		if(!$verify->check($code)){
    			$this->error('验证码错误');
    		}

    		$admin_model=D('admin');
    		$info=$admin_model->getInfoByUsername($username);
    		if($info['password']==md5($password)){
    			session('admin',array('id'=>$info['id'],'username'=>$info['username']));
    			$this->success('登陆成功',U('index/index'));
    		}else{
    			$this->error('用户名或者密码错误');
    		}

    	}else{
    		$this->display();
    	}
    	
    }
    // 退出
    public function logout(){
    	unset($_SESSION['admin']);
    	$this->redirect('index');
    }
    // 验证码
    public function code(){
    	$img=new \Think\Verify();
    	$img->entry();
    }
}