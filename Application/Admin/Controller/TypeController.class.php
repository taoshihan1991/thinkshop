<?php
namespace Admin\Controller;
use Think\Controller;
class TypeController extends BaseController {
    public function index(){
        $type_model=D('type');
        $data=$type_model->getList(10);
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
    	$this->display();
    }
    public function add(){
        if(IS_POST){
            $data=array(
                'name'=>I('post.name'),
            );
 
            $type_model=D('type');
            // 自动验证
            if(!$type_model->create()){
                $this->error($type_model->getError());
            }
        
            $res=$type_model->insert($data);
            if($res){
                $this->success('添加成功');
            }else{
                $this->error('添加失败');
            }
        }else{
            $this->display();
        }
    }
    public function delete(){
        $type_model=D('type');
        $condition=array('id'=>I('get.id'));

        $res=$type_model->where($condition)->delete($condition);
        if($res){
            $this->success('操作成功',U('index'));
        }else{
            $this->error('操作失败');
        }
    }
    public function update(){
        $type_model=D('type');
        if(IS_POST){
            $data=array(
                'id'=>I('post.id'),
                'name'=>I('post.name'),
            );

            $type_model=D('type');
            // 自动验证
            if(!$type_model->create($data)){
                $this->error($type_model->getError());
            }
        
            $res=$type_model->update($data);
            if($res){
                $this->success('操作成功');
            }else{
                $this->error('操作失败');
            }
            exit;
        }

        $condition=array('id'=>I('get.id'));
        $info=$type_model->getInfo($condition);
        $this->assign('info',$info);
        $this->display();
    }

}