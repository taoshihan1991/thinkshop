<?php
namespace Admin\Controller;
use Think\Controller;
class BrandController extends BaseController {
    public function index(){
        $brand_model=D('brand');
        $data=$brand_model->getList(10);
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
    	$this->display();
    }
    public function add(){
        if(IS_POST){
            $data=array(
                'name'=>I('post.name'),
                'sort'=>I('post.sort'),
            );

            // 文件上传
            if(!empty($_FILES['logo']['tmp_name'])){
                $data['logo']=$this->uploadLogo($_FILES['logo']);
            }
 

            $brand_model=D('brand');
            // 自动验证
            if(!$brand_model->create()){
                $this->error($brand_model->getError());
            }
        
            $res=$brand_model->insert($data);
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
        $brand_model=D('brand');
        $condition=array('id'=>I('get.id'));

        $info=$brand_model->getInfo($condition);
        @unlink($info['logo']);
        $res=$brand_model->where($condition)->delete($condition);
        if($res){
            $this->success('操作成功',U('index'));
        }else{
            $this->error('操作失败');
        }
    }
    public function update(){
        $brand_model=D('brand');
        if(IS_POST){
            $data=array(
                'id'=>I('post.id'),
                'name'=>I('post.name'),
                'sort'=>I('post.sort'),
            );
            // 文件上传
            if(!empty($_FILES['logo']['tmp_name'])){
                $data['logo']=$this->uploadLogo($_FILES['logo']);
            }
            $brand_model=D('brand');
            // 自动验证
            if(!$brand_model->create()){
                $this->error($brand_model->getError());
            }
        
            $res=$brand_model->update($data);
            if($res){
                $this->success('操作成功');
            }else{
                $this->error('操作失败');
            }
            exit;
        }

        $condition=array('id'=>I('get.id'));
        $info=$brand_model->getInfo($condition);
        $this->assign('info',$info);
        $this->display();
    }

}