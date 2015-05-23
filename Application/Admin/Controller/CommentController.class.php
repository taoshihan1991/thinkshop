<?php
namespace Admin\Controller;
use Think\Controller;
class CommentController extends BaseController {
    public function index(){
        $message_model=D('message');
        $data=$message_model->getList(10);
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
    	$this->display();
    }
 
    public function delete(){
        $message_model=D('message');
        $condition=array('id'=>I('get.id'));

        $res=$message_model->where($condition)->delete($condition);
        if($res){
            $this->success('操作成功',U('index'));
        }else{
            $this->error('操作失败');
        }
    }
    public function update(){
        $message_model=D('message');
        $condition=array('id'=>I('get.id'));
        if(IS_POST){
            $data=array(
                'id'=>I('post.id','intval'),
                'name'=>I('post.name'),
                'email'=>I('post.email'),
                'content'=>I('post.content'),
                'reply'=>I('post.reply'),
            );
            $res=$message_model->where(array('id'=>$data['id']))->save($data);
            if($res){
                $this->success('操作成功');
            }else{
                $this->error('操作失败');
            }
            exit;
        }

        $info=$message_model->getInfo($condition);

        if($info['article_id']){
            $article_model=D('article');
            $article=$article_model->getInfo(array('id'=>$info['article_id']));
            $this->assign('article',$article);
        }

        $this->assign('info',$info);
        $this->display();
        
    }

}