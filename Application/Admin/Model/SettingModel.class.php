<?php
namespace Admin\Model;
use Think\Model;
class SettingModel extends Model {
    // 获取列表
    public function getList(){
        $list=$this->select();
        $data=array();
        foreach($list as $v){
            $data[$v['name']]=$v['value'];
        }
    	return $data;
    }
    public function update($data){
        foreach($data as $k=>$v){
            $condition=array('name'=>$k);
            $this->where($condition)->setField('value',$v);
        }
        return ture;
    }
}