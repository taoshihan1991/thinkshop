<?php
namespace Admin\Model;
use Think\Model;
class MessageModel extends Model {

    // 获取列表
    public function getList($size){
    	$count = $this->count();
    	$page  = new \Think\Page($count,$size);
    	$show  = $page->show();
    	$list=$this->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
    	$data['list']=$list;
    	$data['page']=$show;
    	return $data;
    }
    // 获取单条
    public function getInfo($condition){
        $info=$this->where($condition)->find();
        return $info;
    }

}