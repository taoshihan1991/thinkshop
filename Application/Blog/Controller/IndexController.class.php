<?php
namespace Blog\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function __construct(){
		parent::__construct();
		$this->getCategory();
	}
    public function index(){
    	$condition=isset($_GET['category_id']) ? array('a.category_id'=>I('get.category_id','intval')) : array();
    	$article_model=D('article');
    	$articleData=$article_model->getList(20,$condition);
    	
    	$articleLeft=array();
    	$articleRight=array();
    	foreach($articleData['list'] as $k=>$v){
    		if($k%2==0){
    			$articleLeft[]=$v;
    		}else{
    			$articleRight[]=$v;
    		}
    	}
    	$this->assign('articleLeft',$articleLeft);
    	$this->assign('articleRight',$articleRight);
    	$this->assign('page',$articleData['page']);
    	$this->display();
    }
    public function getCategory(){
    	$articleclass_model=D('Articleclass');
    	$data=$articleclass_model->getTree();
    	$this->assign('cate',$data);
    }
    public function detail(){
    	$article_model=D('article');
    	$condition=array(
    		'id'=>I('get.id','intval')
    	);
    	$info=$article_model->getInfo($condition);

        $comment=$this->getComment($info['id'],10);
        $this->assign('comment',$comment);
        //print_r($comment);

    	$this->assign('info',$info);
    	$this->display();
    }
    public function getComment($article_id,$size){
        $comment_model=D('message');
        $condition=!empty($article_id) ? array('article_id'=>$article_id) : array();
        $count = $comment_model->where($condition)->count();
        $page  = new \Think\Page($count,$size);
        $show  = $page->show();
        $list=$comment_model->where($condition)->order('addtime desc')->limit($page->firstRow.','.$page->listRows)->select();
        foreach($list as $k=>$v){
            $list[$k]['formatTime']=timeFormat($v['addtime']);
        }
 
        $data['list']=$list;
        $data['page']=$show;
        return $data;
    }
    public function addComment(){
        $parent_id=I('post.parent_id','intval');
        $data=array(
            'article_id'=>I('post.article_id','intval'),
            'name'=>I('post.name'),
            'email'=>I('post.email'),
            'content'=>I('post.message'),
            'addtime'=>time(),
            'parent_id'=>isset($parent_id) ? $parent_id : 0,
        );
        if(!$data['name'])
            $this->error('你的昵称捏?');
        if(!$data['email'])
            $this->error('我没验证邮箱,也不能糊弄我吧?');
        if(!$data['content'])
            $this->error('你的内容捏?');

        $message_model=M('message');
        $res=$message_model->add($data);
        if($res){
            $this->success('评论成功');
        }else{
             $this->error('评论失败');
        }
    }
    public function allMessage(){
        $comment=$this->getComment(0,20);

        $commentLeft=array();
        $commentRight=array();
        foreach($comment['list'] as $k=>$v){
            if($k%2==0){
                $commentLeft[]=$v;
            }else{
                $commentRight[]=$v;
            }
        }
        $this->assign('commentLeft',$commentLeft);
        $this->assign('commentRight',$commentRight);

        $this->assign('page',$comment['page']);
        $this->display();
    }
}