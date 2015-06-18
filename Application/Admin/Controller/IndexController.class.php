<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
    	$this->display();
    }
    public function welcome(){
		$now=strtotime(date('Y-m-d',time()));
        $daySecond=24*60*60;

        $statData=array();
        for($i=10;$i>=1;$i--){
            $statData['xAxis']['categories'][]=date('m-d',$now-$i*$daySecond);
            $statData['series']['data'][]=rand(1,20);
        }
        $statDataJson=json_encode($statData);
		$this->assign('statDataJson',$statDataJson);
    	$this->display();
    }
    // 更新全站缓存
    public function clearAllCache(){
        header("Content-type: text/html; charset=utf-8");
        $this->_rmdirr(BASE_PATH.'Application/Runtime');
        $this->error("缓存清理成功！");  
    }
    public function _rmdirr($dirname) {
        if (!file_exists($dirname)) {
            return false;
        }
        if (is_file($dirname) || is_link($dirname)) {
           return unlink($dirname);
        }
        $dir = dir($dirname);
        if($dir){
            while (false !== $entry = $dir->read()) {
                if ($entry == '.' || $entry == '..') {
                    continue;
                }
            //递归
            $this->_rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
            }
        }
        $dir->close();
        return rmdir($dirname);
     }
}