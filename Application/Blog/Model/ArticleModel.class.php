<?php
namespace Blog\Model;
use Think\Model;
class ArticleModel extends Model {
    // 获取列表
    public function getList($size,$condition){
    	$count = $this->count();
    	$page  = new \Think\Page($count,$size);
    	$show  = $page->show();
        $list=$this->table(C('DB_PREFIX')."article a")
                   ->join(C('DB_PREFIX')."articleclass b on a.category_id=b.id")
                   ->field("a.*,b.name cate_name")
                   ->where($condition)
                   ->limit($page->firstRow.','.$page->listRows)->order('a.sort asc,a.id desc')->select();
    	$data['list']=$list;
    	$data['page']=$show;
    	return $data;
    }
    // 获取详情
    public function getInfo($condition){
      return $this->where($condition)->find();
    }
}