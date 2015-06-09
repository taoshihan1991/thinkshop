<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
	// 初始化
    public function __construct(){
    	parent::__construct();
    	$this->checkLogin();
    }
    // 验证是否登陆
    public function checkLogin(){
        $session_name = session_name();
        if(isset($_POST[$session_name])){

        }else{
            if(!($_SESSION['admin'])){
                $this->error('请先登录吧',U('Login/index')); 
            }
        }
        
    	
    }
    /**
    * 编辑器内图片上传
    */
    public function uploadDetailImg(){
        if(!IS_POST){
            $this->error('页面不存在！');
        }
        /*
        {
        "originalName":"QQ\u622a\u56fe20141114215545.jpg",
        "name":"14209571758715.jpg",
        "url":"upload\/20150111\/14209571758715.jpg",
        "size":24205,
        "type":".jpg",
        "state":"SUCCESS"
        }
        */
        $obj=new \Think\Upload();
        $obj->maxSize = C('UPLOAD_MAX_SIZE');
        $obj->rootPath = BASE_PATH.C('UPLOAD_PATH');
        $obj->savePath = '';
        $obj->saveRule = 'uniqid';
        $obj->uploadReplace=true;
        $obj->allowExts = C('UPLOAD_EXTS');
        $obj->autoSub=true;
        $obj->subType='date';
        $obj->dateFormat='Y_m';
        $info=$obj->upload();
        if(!$info){
            $res=$obj->getError();
        }else{
          
            $res=array(
                'originalName'=>$info['upfile']['name'],
                'name'=>$info['upfile']['name'],
                'url'=>C('UPLOAD_PATH').$info['upfile']['savepath'].$info['upfile']['savename'],
                'size'=>$info['upfile']['size'],
                'type'=>'.'.$info['upfile']['ext'],
                'state'=>"SUCCESS"
            );
            echo json_encode($res);
        }
       
    }

    /**
    * uploadify图片上传
    */
    public function uploadify(){
        if (!empty($_FILES)) {
            //图片上传设置
            $config = array(   
                'maxSize'    =>    C('UPLOAD_MAX_SIZE'), 
                'savePath'   =>    '',  
                'saveName'   =>    array('uniqid',''), 
                'exts'       =>    C('UPLOAD_EXTS'),  
                'autoSub'    =>    true,   
                'subName'    =>    array('date','Y-m-d'),
            );
            $upload = new \Think\Upload($config);// 实例化上传类
            $images = $upload->upload();
            //判断是否有图
            if($images){
                $info=C('UPLOAD_PATH').$images['Filedata']['savepath'].$images['Filedata']['savename'];
                $miinfo=$info.'.mini.'.$images['Filedata']['ext']; 
                $image = new \Think\Image(); 
                $image->open('./'.$info)->thumb(150, 150,\Think\Image::IMAGE_THUMB_CENTER)->save('./'.$miinfo);  
                //添加图片水印                
                //$image->open('./'.$info)->water('./Data/logo.png',\Think\Image::IMAGE_WATER_NORTHWEST,50)->save('./'.$info);
                //添加文字水印
                //$image->open('./'.$info)->text('姜医生','./Data/1.ttf',20,'#000000',\Think\Image::IMAGE_WATER_SOUTHEAST)->save($info);
                $data=array(
                    'status'=>1,
                    'path'=>array(
                        'mini'=>$miinfo,
                        'origin'=>$info,
                    )
                );
                $this->ajaxReturn($data);     
            }
            else{
                $this->error($upload->getError());//获取失败信息
            }
        }
    }
    // logo上传
    public function uploadLogo($file){
        $upload = new \Think\Upload();
        $upload->maxSize=C('UPLOAD_MAX_SIZE') ;
        $upload->exts =C('UPLOAD_EXTS');
        $upload->rootPath = C('UPLOAD_PATH');
        $upload->savePath = '';
        $info = $upload->uploadOne($file);
        if(!$info){
            $this->error($upload->getError());
        }   
        return $upload->rootPath.$info['savepath'].$info['savename'];
    }
}