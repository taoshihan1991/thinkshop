<?php
namespace Admin\Model;
use Think\Model;
class ArticleclassModel extends Model {
	// 自动验证
    protected $_validate=array(
        array('title','require','分录名称不能为空'),
    );
    // 添加
    public function insert($data){
        $res=$this->add($data);
        return $res;
    }
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
    // 修改
    public function update($data){
        $condition=array(
            'id'=>$data['id']
        );
        $res=$this->where($condition)->save($data);
        return $res;
    }
    // 获取树形
    public function getTree($arr,$pid=0,$level=0){
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