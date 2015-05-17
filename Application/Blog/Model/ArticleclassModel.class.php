<?php
namespace Blog\Model;
use Think\Model;
class ArticleclassModel extends Model {

    // 获取列表
    public function getList($size){
    	$count = $this->count();
    	$page  = new \Think\Page($count,$size);
    	$show  = $page->show();
    	$list=$this->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
        $list=$this->getTree($list);
    	$data['list']=$list;
    	$data['page']=$show;
    	return $data;
    }
    // 获取单条
    public function getInfo($condition){
        $info=$this->where($condition)->find();
        return $info;
    }
    // 获取全部
    public function getAll(){
        $data=$this->select();
        return $data;
    }
 
    // 获取树形
    public function getTree($pid=0,$level=0){
        if($level==0) $arr=$this->getAll();
        static $result=array();
        foreach($arr as $v){
            if($v['parent_id']==$pid){
                $v['level']=$level;
                $result[]=$v;
                $this->getTree($arr,$v['id'],$level+1);
            }
        }
        return $result;
    }
    // 获取子孙类
    public function getSonCate($arr,$id){
        $data=$this->getTree($arr,$id);
        $result=array();
        foreach($data as $v){
            $result[]=$v['id'];
        }
        $result[]=$id;
        return $result;
    }
}