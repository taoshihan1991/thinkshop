<?php
namespace Admin\Model;
use Think\Model;
class BrandModel extends Model {
	// 自动验证
    protected $_validate=array(
        array('name','require','品牌名称不能为空'),
        array('name','','品牌已经存在',0,'unique',1),
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
    	$list=$this->order('sort asc')->limit($page->firstRow.','.$page->listRows)->select();
    	$data['list']=$list;
    	$data['page']=$show;
    	return $data;
    }
    // 获取全部
    public function getAll($condition){
        $info=$this->where($condition)->select();
        return $info;
    }
    // 获取单条
    public function getInfo($condition){
        $info=$this->where($condition)->find();
        return $info;
    }
    // 修改
    public function update($data){
        $condition=array(
            'id'=>$data['id']
        );
        $res=$this->where($condition)->save($data);
        return $res;
    }

}