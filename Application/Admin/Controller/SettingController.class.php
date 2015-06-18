<?php
namespace Admin\Controller;
use Think\Controller;
class SettingController extends BaseController {
    public function index(){
        $setting_model=D('setting');
        $list=$setting_model->getList();
        $this->assign('info',$list);
    	$this->display();
    }
    public function update(){
        $data=$_POST;
        $setting_model=D('setting');
        $setting_model->update($data);
        $this->success('操作成功');
    }
    //修改密码
    public function modifypw(){
        if(IS_POST){
            $oldpw=md5(trim(I('post.oldpw')));
            $newpw=I('post.newpw');
            $confirmpw=I('post.confirmpw');
            
            $admin_model=D('admin');
            $info=$admin_model->getInfoById($_SESSION['admin']['id']);
            if($oldpw!=$info['password']) $this->error('旧密码不正确');
            if($newpw!=$confirmpw) $this->error('两次密码不一致');
            
            $res=$admin_model->where(array('id'=>$_SESSION['admin']['id']))->setField('password',md5($newpw));
            if($res){
                $this->success('操作成功');
            }else{
                $this->error('操作失败');
            }
            exit;
        }
        $this->display();
    }
}