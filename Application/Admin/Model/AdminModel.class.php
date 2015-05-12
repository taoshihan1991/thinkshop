<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model {
    // 根据用户名取出管理员信息
    public function getInfoByUsername($username){
        $condition=array('username'=>$username);
        $info=$this->where($condition)->find();
        return $info;
    }
}