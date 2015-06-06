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
        $goods_model=D('goods');
        $condition=array('id'=>$id);

        $res=$goods_model->where($condition)->delete();
        if($res){
			M('goods_attr')->where(array('goods_id'=>$id))->delete();
            $this->success('操作成功',U('index'));
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
    // 验证字段
    public function checkData($data){
    	if(empty($data['category_id'])){
    		$this->errMsg="分类必须选";
    		return false;
    	}
    	return true;
    }
    // 属性入库
    public function addAttribute($attr,$goods_id){
    	if(!empty($attr['attr_id_list'])){
    		M('goods_attr')->where(array('goods_id'=>$goods_id))->delete();

    		$data=array();
    		foreach($attr['attr_id_list'] as $k=>$v){
    			$temp=array(
    				'goods_id'=>$goods_id,
    				'attribute_id'=>$v,
    				'attr_value'=>$attr['attr_value_list'][$k],
    				'attr_price'=>$attr['attr_price_list'][$k],
    			);
    			$data[]=$temp;
    		}
    		
    		$res=M('goods_attr')->addAll($data);
    		return $res;
    	}
    	return false;
    }
}