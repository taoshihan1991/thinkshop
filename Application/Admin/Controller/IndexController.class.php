<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
    	$this->display();
    }
    public function welcome(){
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