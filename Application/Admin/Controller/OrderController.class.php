<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends BaseController {
	public $errMsg;//错误信息
    public function index(){
        $order_model=D('order');

        $data=$order_model->getList(10);

        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
    	$this->display();
    }

    public function delete(){
        $id=I('get.id','intval');
        $order_model=D('order');
        $res=$order_model->where(array('id'=>$id))->setField('status',99);
        if($res){
            $this->success('操作成功');
        }else{
            $this->error('操作失败');
        }
    }

    public function update(){
        $order_model=D('order');
        if(IS_POST){
            exit;
        }

        $condition=array('a.id'=>I('get.id'));
        $info=$order_model->getInfo($condition);
        $this->assign('info',$info);

        $this->display();
    }
 
}