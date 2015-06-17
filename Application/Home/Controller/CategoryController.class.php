<?php
namespace Home\Controller;
use Think\Controller;
class CategoryController extends CommonController {
	protected $cid;
	protected $category_model;
	// 构造函数
    public function __construct(){
		$this->cid=I('get.cid','intval');
		$this->category_model=D('Category');
    	parent::__construct();
    }
    
    public function index(){
		$condition=array(
			'id'=>$this->cid	
		);
		$info=$this->category_model->getInfo($condition);
		$this->assign('info',$info);

		//组成分类条件
		$attrCate=$this->getCateConditionList($info);
		$this->assign('attrCate',$attrCate);	
		//组成筛选条件
		$attrList=$this->getAttrConditionList($info);
		$this->assign('attrList',$attrList);	
		
		//筛选商品
		$searchGoods=$this->searchGoodsByCondition();
		$this->assign('searchGoods',$searchGoods);	

    	$this->display();
    }
	//分类条件
	public function getCateConditionList($info){
		//筛选条件分类
		$cates=F('category');
		$attrCate=array();
		foreach($cates as $v){
			if($info['id']==$v['parent_id']){
				$attrCate[]=$v;
			}
		}
		return $attrCate;
	}
	//属性条件
	public function getAttrConditionList($info){
		//get传递的信息
		$filter_attr_str=I('get.a_id');
		$filter_attr = empty($filter_attr_str) ? '' : explode('.', $filter_attr_str);
		$cid=I('get.cid',0);
		$bid=I('get.bid',0);

		$attrList=array();
		$attribute_model=M('attribute');
		$goodsAttrModel=M('goods_attr');

		$attrTemp=$attribute_model->where(array('type_id'=>$info['type']))->select();
		//循环属性种类
		foreach($attrTemp as $key=>$v){
			$attrList[$key]['filter_attr_name']=$v['name'];
			$goodsAttrList=$goodsAttrModel->field('attr_value,MIN(id) as goods_attr_id')->where(array('attribute_id'=>$v['id']))->group('attr_value')->select();

			$tempAttrUrlArr=array();
			for($i=0;$i<count($attrTemp);$i++){
				$tempAttrUrlArr[$i]=!empty($filter_attr[$i]) ? $filter_attr[$i] : 0;
			}
			//全部
			$tempAttrUrlArr[$key]=0;
			$tempAttrUrl=implode('.',$tempAttrUrlArr);
			$attrList[$key]['attr_list'][0]['attr_value']='全部';
			$attrList[$key]['attr_list'][0]['url']=U('Category/index',array('cid'=>$cid,'bid'=>$bid,'a_id'=>$tempAttrUrl));
			$attrList[$key]['attr_list'][0]['selected']=empty($filter_attr[$key]) ? 1 : 0;
			
			//循环属性选项
			foreach($goodsAttrList as $k=>$rows){
				$rowsKey=$k+1;
				$tempAttrUrlArr[$key]=$rows['goods_attr_id'];
				$tempAttrUrl=implode('.',$tempAttrUrlArr);
				$attrList[$key]['attr_list'][$rowsKey]['attr_value']=$rows['attr_value'];
				$attrList[$key]['attr_list'][$rowsKey]['url']=U('Category/index',array('cid'=>$cid,'bid'=>$bid,'a_id'=>$tempAttrUrl));
				if(!empty($filter_attr[$key])&&$filter_attr[$key]==$rows['goods_attr_id']){
					$attrList[$key]['attr_list'][$rowsKey]['selected']=1;
				}else{
					$attrList[$key]['attr_list'][$rowsKey]['selected']=0;
				}
			}
		}

		return $attrList;
	}
	public function searchGoodsByCondition(){
		$filter_attr_str=I('get.a_id');
		$filter_attr = empty($filter_attr_str) ? '' : explode('.', $filter_attr_str);
		$cid=I('get.cid','0');
		$bid=I('get.bid','0');	
		$cate=F('category');
		$cidArr=$this->getAllSonCate($cate,$cid);

		$condition=array();
		$condition['a.category_id']=array('in',$cidArr);
		if(!empty($bid)) $condition['a.brand_id']=$bid;
		$goods_model=D('goods');
		$list=$goods_model->getList(10,$condition);

		return $list;
	}

}