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
    //点击顶部菜单时获得左侧子菜单
	public function getChildMenu() {
		$pid=$_GET['pid'];
		$html="<div class='nid_{$pid}'><dl><dt>管理员设置</dt><dd><a nid='17' href='javascript:;'
                    onclick='get_content(this,17)' url='http://localhost/hdcms/index.php?g=Hdcms&a=Admin&c=Administrator&m=index'>管理员管理</a></dd><dd><a nid='18' href='javascript:;'
                    onclick='get_content(this,18)' url='http://localhost/hdcms/index.php?g=Hdcms&a=Admin&c=Role&m=index'>角色管理</a></dd></dl><dl><dt>系统设置</dt><dd><a nid='20' href='javascript:;'
                    onclick='get_content(this,20)' url='http://localhost/hdcms/index.php?g=Hdcms&a=Admin&c=Config&m=edit'>网站配置</a></dd><dd><a nid='21' href='javascript:;'
                    onclick='get_content(this,21)' url='http://localhost/hdcms/index.php?g=Hdcms&a=Admin&c=Node&m=index'>后台菜单管理</a></dd></dl></div>";
		exit($html);
	}
}