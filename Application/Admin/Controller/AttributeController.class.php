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
        $attribute_model=D('attribute');
        if(IS_POST){
            $data=array(
                'id'=>I('post.id','intval'),
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

            $res=$attribute_model->update($data);
            if($res){
                $this->success('操作成功');
            }else{
                $this->error('操作失败');
            }
            exit;
        }

        $condition=array('id'=>I('get.id'));
        $info=$attribute_model->getInfo($condition);
        $this->assign('info',$info);

        $types=M('type')->select();
        $this->assign('types',$types);

        $this->display();
    }
    public function ajaxType(){
        $type_id=I('get.type_id','intval');
        $goods_id=I('get.goods_id','intval');
        $attribute_model=D('attribute');

        $condition=array('type_id'=>$type_id);
        $list=$attribute_model->getAll($condition);

        $str="";
        foreach($list as $v){
            if($goods_id){
                $condition=array(
                    'goods_id'=>$goods_id,
                    'attribute_id'=>$v['id'],
                );
                $attrValues=M('goods_attr')->where($condition)->find();
            }

            $str.="<tr><th class='w100'>{$v['name']}</th><td>";
            $str.="<input type='hidden' name='attr_id_list[]' value='{$v['id']}' />";
            $str.="<input type='hidden' name='attr_price_list[]' value='{$attrValues['attr_price']}' />";
            switch ($v['input_type']) {
                case 0:
                    $inputTypeStr="<input type='text' name='attr_value_list[]' value='{$attrValues['attr_value']}' />";
                    break;
                case 1:
                    $inputTypeStr="<select name='attr_value_list[]'>";
                    $temp=explode('|',$v['value']);
                    foreach($temp as $r){
                        if($attrValues['attr_value']==$r){
                           $inputTypeStr.="<option value='{$r}' selected='selected'>{$r}</option>"; 
                        }else{
                            $inputTypeStr.="<option value='{$r}'>{$r}</option>";
                        }
                        
                    }
                    $inputTypeStr.="<select>";
                    break;
                        
                case 2:
                    $inputTypeStr="<textarea name='attr_value_list[]' class='w400 h100'>{$attrValues['attr_value']}</textarea>";
                    break;
                default:
                    # code...
                    break;
            }
            $str.=$inputTypeStr;
            $str.="</td></tr>";
        }
        exit($str);
    }
}