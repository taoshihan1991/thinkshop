<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends BaseController {
    public function index(){
        $category_model=D('category');
        $data=$category_model->getList(100);
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
    	$this->display();
    }
    //添加分类
    public function add(){
        $category_model=D('category');
        if(IS_POST){
            $data=array(
                'name'=>I('post.name'),
                'sort'=>I('post.sort'),
                'parent_id'=>I('post.parent_id','intval'),
				'type'=>I('post.type','intval'),
            );

            // 文件上传
            if(!empty($_FILES['logo']['tmp_name'])){
                $data['logo']=$this->uploadLogo($_FILES['logo']);
            }

            // 自动验证
            if(!$category_model->create()){
                $this->error($category_model->getError());
            }

            $res=$category_model->insert($data);
            if($res){
                $this->success('添加成功',U('index'),1);
            }else{
                $this->error('添加失败');
            }
        }else{
            $cate=$category_model->getAll();
            $cateTree=$category_model->getTree($cate);
            $this->assign('cate',$cateTree);

            $typeList=D('type')->select();
            $this->assign('typeList',$typeList);

            $this->display(); 
        }
        
    }

    public function delete(){
        $id=I('get.id','intval');
        $category_model=D('category');
        $cate=$category_model->getAll();
        $sonCate=$category_model->getSonCate($cate,$id);

        $condition=array('id'=>array('in',$sonCate));
        $res=$category_model->where($condition)->delete();
        if($res){
            $this->success('操作成功',U('index'));
        }else{
            $this->error('操作失败');
        }
    }

    public function update(){
        $category_model=D('category');
        $cate=$category_model->getAll();

        if(IS_POST){
            $data=array(
                'id'=>I('post.id','intval'),
                'name'=>I('post.name'),
                'sort'=>I('post.sort'),
                'parent_id'=>I('post.parent_id','intval'),
				'type'=>I('post.type','intval'),
            );
            // 文件上传
            if(!empty($_FILES['logo']['tmp_name'])){
                $data['logo']=$this->uploadLogo($_FILES['logo']);
            }
            // 自动验证
            if(!$category_model->create()){
                $this->error($category_model->getError());
            }


            //不能把当前分类和当前分类的子分类作为上级分类
            $sonCate=$category_model->getSonCate($cate,$data['id']);
            if(in_array($data['parent_id'],$sonCate)){
                 $this->error('不能把当前分类和当前分类的子分类作为上级分类');
            }

            $res=$category_model->update($data);
            if($res){
                $this->success('操作成功',U('index'),1);
            }else{
                $this->error('操作失败');
            }
            exit;
        }

        $condition=array('id'=>I('get.id'));
        $info=$category_model->getInfo($condition);
        $this->assign('info',$info);

        $cateTree=$category_model->getTree($cate);
        $this->assign('cate',$cateTree);

        $typeList=D('type')->select();
        $this->assign('typeList',$typeList);
        $this->display();
    }
}