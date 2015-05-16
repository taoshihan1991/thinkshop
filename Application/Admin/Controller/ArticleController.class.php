<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends BaseController {
    public $errorMsg;//错误信息
    public function index(){
        $article_model=D('article');
        $data=$article_model->getList(10);
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
    	$this->display();
    }
    public function add(){
        if(IS_POST){
            $data=array(
                'title'=>I('post.title'),
                'category_id'=>I('post.category_id','intval'),
                'content'=>stripslashes($_POST['content']),
                'sort'=>I('post.sort','intval'),
                'addtime'=>time(),
            );

            // 验证
            if($this->checkData($data)){
                $this->error($this->errorMsg);
            }

            // 文件上传
            if(!empty($_FILES['thumb']['tmp_name'])){
                $data['thumb']=$this->uploadLogo($_FILES);
            }
 

            $article_model=D('article');
            // 自动验证
            if(!$article_model->create()){
                $this->error($article_model->getError());
            }
        
            $res=$article_model->insert($data);
            if($res){
                $this->success('添加成功');
            }else{
                $this->error('添加失败');
            }
        }else{
            // 分类
            $this->getCate();
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
        $article_model=D('article');
        if(IS_POST){
            $data=array(
                'id'=>I('post.id','intval'),
                'title'=>I('post.title'),
                'category_id'=>I('post.category_id','intval'),
                'content'=>stripslashes($_POST['content']),
                'sort'=>I('post.sort','intval'),
            );

            // 验证
            if(!$this->checkData($data)){
                $this->error($this->errorMsg);
            }

            // 文件上传
            if(!empty($_FILES['thumb']['tmp_name'])){
                $data['thumb']=$this->uploadLogo($_FILES);
            }
 

            $article_model=D('article');
            // 自动验证
            if(!$article_model->create()){
                $this->error($article_model->getError());
            }
        
            $res=$article_model->update($data);
            if($res){
                $this->success('操作成功');
            }else{
                $this->error('操作失败');
            }
            exit;
        }

        $condition=array('id'=>I('get.id'));
        $info=$article_model->getInfo($condition);

         // 分类
        $this->getCate();
        $this->assign('info',$info);
        $this->display();
    }
    // 缩略图上传
    public function uploadLogo($_FILES){
        $upload = new \Think\Upload();
        $upload->maxSize=3145728 ;
        $upload->exts =array('jpg', 'gif', 'png', 'jpeg');
        $upload->rootPath = './Uploads/';
        $upload->savePath = '';
        $info = $upload->uploadOne($_FILES['thumb']);
        if(!$info){
            $this->error($upload->getError());
        }   
        return $upload->rootPath.$info['savepath'].$info['savename'];
    }
    // 分配分类
    public function getCate(){
        $articleclass_model=D('Articleclass');
        $cate=$articleclass_model->getAll();
        $cateTree=$articleclass_model->getTree($cate);
        $this->assign('cate',$cateTree);
    }
    // 验证字段
    public function checkData($data){
        if(empty($data['category_id'])){
            $this->errorMsg="分类id不能为空";
            return false;
        } 
         return true;
    }
}