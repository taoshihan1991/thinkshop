<?php
namespace Home\Model;
use Think\Model;
class CategoryModel extends Model {

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