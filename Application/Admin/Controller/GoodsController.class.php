<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends BaseController {
	public $errMsg;//错误信息
    public function index(){
        $goods_model=D('goods');
        $condition=isset($_GET['category_id']) ? array('a.category_id'=>I('get.category_id','intval')) : array();

        $data=$goods_model->getList(10,$condition);
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);

        // 分类
        $category_model=D('category');
        $cate=$category_model->getAll();
        $cateTree=$category_model->getTree($cate);
        $this->assign('cate',$cateTree);

    	$this->display();
    }
    //添加
    public function add(){
        $goods_model=D('goods');
        if(IS_POST){
            $data=array(
                'name'=>I('post.name'),
                'goods_ad'=>I('post.goods_ad'),
                'goods_no'=>I('post.goods_no'),
                'pro_no'=>I('post.pro_no'),
                'type_id'=>I('post.type_id','intval'),
                'content'=>stripslashes($_POST['content']),
                'img'=>I('post.img'),
                'imgs'=>I('post.imgs'),
                'sell_price'=>I('post.sell_price'),
                'market_price'=>I('post.market_price'),
                'create_time'=>time(),
                'store_nums'=>I('post.store_nums'),
                'seo_title'=>I('post.seo_title'),
                'seo_keywords'=>I('post.seo_keywords'),
                'seo_description'=>I('post.seo_description'),
                'weight'=>I('post.weight'),
                'brand_id'=>I('post.brand_id','intval'),
                'category_id'=>I('post.category_id','intval'),
            );

            // 自动验证
            if(!$goods_model->create($data)){
                $this->error($goods_model->getError());
            }

            // 验证字段
            if(!$this->checkData($data)){
            	$this->error($this->errMsg);
            }

            $goods_id=$goods_model->add($data);
            if($goods_id){
            	// 属性入库
            	$this->addAttribute($_POST,$goods_id);
                $this->success('添加成功',U('index'),1);
            }else{
                $this->error('添加失败');
            }
        }else{
            // 分类
            $category_model=D('category');
            $cate=$category_model->getAll();
            $cateTree=$category_model->getTree($cate);
            $this->assign('cate',$cateTree);
            // 品牌
            $brand_model=D('brand');
            $brand=$brand_model->getAll();
            $this->assign('brand',$brand);
            // 类型
            $type=M('type')->select();
            $this->assign('types',$type);

            $this->display(); 
        }
        
    }

    public function delete(){
        $id=I('get.id','intval');
        $goods_model=D('goods');
        $condition=array('id'=>$id);
        $info=$goods_model->getInfo($condition);
        $this->delSiteImgs($info['imgs']);

        $res=$goods_model->where($condition)->delete();
        if($res){
			M('goods_attr')->where(array('goods_id'=>$id))->delete();
            $this->success('操作成功',U('index'));
        }else{
            $this->error('操作失败');
        }
    }
    public function delSiteImgs($imgs){
        if(empty($imgs)) return;
        $imgArray=explode('|',$imgs);
        foreach($imgArray as $v){
            $url=getPicPath($v);
            if(!is_file($url)) continue;
            @unlink($url);
            @unlink($url.'.mini.jpg');
        }
    }
    public function update(){
        $goods_model=D('goods');
        if(IS_POST){
            $data=array(
            	'id'=>I('post.id','intval'),
                'name'=>I('post.name'),
                'goods_ad'=>I('post.goods_ad'),
                'goods_no'=>I('post.goods_no'),
                'pro_no'=>I('post.pro_no'),
                'type_id'=>I('post.type_id','intval'),
                'content'=>stripslashes($_POST['content']),
                'img'=>I('post.img'),
                'imgs'=>I('post.imgs'),
                'sell_price'=>I('post.sell_price'),
                'market_price'=>I('post.market_price'),
                'create_time'=>time(),
                'store_nums'=>I('post.store_nums'),
                'seo_title'=>I('post.seo_title'),
                'seo_keywords'=>I('post.seo_keywords'),
                'seo_description'=>I('post.seo_description'),
                'weight'=>I('post.weight'),
                'brand_id'=>I('post.brand_id','intval'),
                'category_id'=>I('post.category_id','intval'),
            );

            // 自动验证
            if(!$goods_model->create($data)){
                $this->error($goods_model->getError());
            }

            // 验证字段
            if(!$this->checkData($data)){
            	$this->error($this->errMsg);
            }

            $res=$goods_model->update($data);
            if($res){
            	// 属性入库
            	$this->addAttribute($_POST,$data['id']);
                $this->success('操作成功',U('index'),1);
            }else{
                $this->error('操作失败');
            }
            exit;
        }

        $condition=array('id'=>I('get.id'));
        $info=$goods_model->getInfo($condition);
        $this->assign('info',$info);

       // 分类
        $category_model=D('category');
        $cate=$category_model->getAll();
        $cateTree=$category_model->getTree($cate);
        $this->assign('cate',$cateTree);
        // 品牌
        $brand_model=D('brand');
        $brand=$brand_model->getAll();
        $this->assign('brand',$brand);
        // 类型
        $type=M('type')->select();
        $this->assign('types',$type);

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