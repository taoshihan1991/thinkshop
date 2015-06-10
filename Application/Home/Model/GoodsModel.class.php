<?php
namespace Home\Model;
use Think\Model;
class GoodsModel extends Model {
    // 获取列表
    public function getList($size,$condition){
    	$count = $this->count();
    	$page  = new \Think\Page($count,$size);
    	$show  = $page->show();
    	$list=$this->table(C('DB_PREFIX')."goods a")
                   ->join(C('DB_PREFIX')."category b on a.category_id=b.id")
                   ->field("a.*,b.name cate_name")
                   ->where($condition)
                   ->limit($page->firstRow.','.$page->listRows)->order("a.id desc")->select();
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
    public function getAll($condition,$field,$limit=4){
        $data=$this->where($condition)->field($field)->limit($limit)->select();
        return $data;
    }

}