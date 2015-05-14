<?php
namespace Admin\Model;
use Think\Model;
class ArticleModel extends Model {
    // 自动验证
    protected $_validate=array(
        array('title','require','标题不能为空'),
        array('content','require','内容不能为空'),
        array('category_id','require','分类不能为空',1),
    );
    // 添加
    public function insert($data){
        $res=$this->add($data);
        return $res;
    }
    // 获取列表
    public function getList($size,$condition){
    	$count = $this->count();
    	$page  = new \Think\Page($count,$size);
    	$show  = $page->show();
        $list=$this->table(C('DB_PREFIX')."article a")
                   ->join(C('DB_PREFIX')."articleclass b on a.category_id=b.id")
                   ->field("a.*,b.name cate_name")
                   ->where($condition)
                   ->limit($page->firstRow.','.$page->listRows)->select();
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