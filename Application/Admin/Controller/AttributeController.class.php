<?php
namespace Admin\Controller;
use Think\Controller;
class AttributeController extends BaseController {
    public function index(){
        $attribute_model=D('attribute');
        $condition=isset($_GET['type_id']) ? array('a.type_id'=>I('get.type_id','intval')) : array();

        $data=$attribute_model->getList(10,$condition);
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);

        $types=M('type')->select();
        $this->assign('types',$types);
    	$this->display();
    }
    //添加分类
    public function add(){
        $attribute_model=D('attribute');
        if(IS_POST){
            $data=array(
                'name'=>I('post.name'),
                'type'=>I('post.type','intval'),
                'input_type'=>I('post.input_type'),
                'value'=>I('post.value'),
                'type_id'=>I('post.type_id','intval'),
            );

            // 自动验证
            if(!$attribute_model->create()){
                $this->error($attribute_model->getError());
            }

            $res=$attribute_model->insert($data);
            if($res){
                $this->success('添加成功',U('index'),1);
            }else{
                $this->error('添加失败');
            }
        }else{
            $types=M('type')->select();
            $this->assign('types',$types);
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
            );

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
        $this->display();
    }
}