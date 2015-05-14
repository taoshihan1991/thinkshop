<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleclassController extends BaseController {
    public function index(){
        $articleclass_model=D('articleclass');
        $data=$articleclass_model->getList(100);
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
    	$this->display();
    }
    //添加分类
    public function add(){
        $articleclass_model=D('articleclass');
        if(IS_POST){
            $data=array(
                'name'=>I('post.name'),
                'sort'=>I('post.sort'),
                'parent_id'=>I('post.parent_id','intval'),
            );

            // 自动验证
            if(!$articleclass_model->create()){
                $this->error($articleclass_model->getError());
            }

            $res=$articleclass_model->insert($data);
            if($res){
                $this->success('添加成功',U('index'),1);
            }else{
                $this->error('添加失败');
            }
        }else{
            $cate=$articleclass_model->getAll();
            $cateTree=$articleclass_model->getTree($cate);
            $this->assign('cate',$cateTree);
            $this->display(); 
        }
        
    }

    public function delete(){
        $id=I('get.id','intval');
        $articleclass_model=D('articleclass');
        $cate=$articleclass_model->getAll();
        $sonCate=$articleclass_model->getSonCate($cate,$id);

        $condition=array('id'=>array('in',$sonCate));
        $res=$articleclass_model->where($condition)->delete();
        if($res){
            $this->success('操作成功',U('index'));
        }else{
            $this->error('操作失败');
        }
    }

    public function update(){
        $articleclass_model=D('articleclass');
        $cate=$articleclass_model->getAll();

        if(IS_POST){
            $data=array(
                'id'=>I('post.id','intval'),
                'name'=>I('post.name'),
                'sort'=>I('post.sort'),
                'parent_id'=>I('post.parent_id','intval'),
            );

            // 自动验证
            if(!$articleclass_model->create()){
                $this->error($articleclass_model->getError());
            }


            //不能把当前分类和当前分类的子分类作为上级分类
            $sonCate=$articleclass_model->getSonCate($cate,$data['id']);
            if(in_array($data['parent_id'],$sonCate)){
                 $this->error('不能把当前分类和当前分类的子分类作为上级分类');
            }

            $res=$articleclass_model->update($data);
            if($res){
                $this->success('操作成功',U('index'),1);
            }else{
                $this->error('操作失败');
            }
            exit;
        }

        $condition=array('id'=>I('get.id'));
        $info=$articleclass_model->getInfo($condition);
        $this->assign('info',$info);

        $cateTree=$articleclass_model->getTree($cate);
        $this->assign('cate',$cateTree);
        $this->display();
    }
}