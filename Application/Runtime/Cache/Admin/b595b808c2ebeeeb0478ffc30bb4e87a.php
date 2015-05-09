<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title>ThinkShop电子商务系统</title>
		<script type='text/javascript' src='/thinkshop/Application/Admin/View/Static/js/jquery-1.8.2.min.js'></script>
<link href='/thinkshop/Application/Admin/View/Static/hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='/thinkshop/Application/Admin/View/Static/hdjs/js/hdjs.js'></script>
<script src='/thinkshop/Application/Admin/View/Static/hdjs/js/slide.js'></script>
<script src='/thinkshop/Application/Admin/View/Static/hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = '/thinkshop/';
		ROOT = '/thinkshop/';
		WEB = '/thinkshop/';
		URL = 'http://localhost/hdcms/index.php?a=Admin';
		HDPHP = 'http://localhost/hdcms/hd/HDPHP/hdphp';
		HDPHPDATA = 'http://localhost/hdcms/hd/HDPHP/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdcms/hd/HDPHP/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdcms/hd/HDPHP/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Admin';
		CONTROL = '/thinkshop/'+'index.php?m=Admin&c=Index';
		METH = 'http://localhost/hdcms/index.php?a=Admin&c=Index&m=index';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Admin/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Admin/Tpl/Index';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Admin/Tpl/Public';
		HISTORY = 'http://localhost/hdcms/index.php?a=Admin&c=Login&m=login';
		HTTPREFERER = 'http://localhost/hdcms/index.php?a=Admin&c=Login&m=login';
		TEMPLATE = 'http://localhost/hdcms/template/default';
</script>
		<script type="text/javascript" src="/thinkshop/Application/Admin/View/Static/index/js/menu.js"></script>
		<script type="text/javascript" src="/thinkshop/Application/Admin/View/Static/index/js/quick_menu.js"></script>
		<link href='/thinkshop/Application/Admin/View/Static/index/css/css.css' rel='stylesheet' media='screen'>
		<link href='/thinkshop/Application/Admin/View/Static/index/css/quick_menu.css' rel='stylesheet' media='screen'>
	</head>
	<body>
		<div class="nav">
			<!--头部左侧导航-->
			<div class="top_menu">
				
					<a href="javascript:" nid="1" onclick="get_left_menu('1');" class="top_menu">
						商品中心
					</a>
					<a href="javascript:" nid="2" onclick="get_left_menu('2');" class="top_menu">
						订单中心
					</a>
					<a href="javascript:" nid="3" onclick="get_left_menu('3');" class="top_menu">
						客户中心
					</a>
					<a href="javascript:" nid="4" onclick="get_left_menu('4');" class="top_menu">
						营销中心
					</a>
					<a href="javascript:" nid="5" onclick="get_left_menu('5');" class="top_menu">
						统计中心
					</a>
					<a href="javascript:" nid="6" onclick="get_left_menu('6');" class="top_menu">
						内容中心
					</a>
					<a href="javascript:" nid="7" onclick="get_left_menu('7');" class="top_menu">
						系统中心
					</a>
			
			</div>
			<!--头部左侧导航-->
			<!--头部右侧导航-->
			<div class="r_menu">
				管理员 : admin
				<a href="{|U:'Login/out'}" target="_self">
					[退出]
				</a>
				<span>|</span>
				<a href="javascript:hd_ajax('{|U:'updateAllCache'}');">
					更新全站缓存
				</a>
				<span>|</span>
				<a href="__WEB__" target="_blank">
					前台首页
				</a>
				<span>|</span>
				<a href="{|U:'Member/Index/index'}" target="_blank">
					会员中心
				</a>
			</div>
			<!--头部右侧导航-->
		</div>
		<!--左侧导航-->
		<div class="main">
			<!--主体左侧导航-->
			<div class="left_menu">
				<div class="nid_1">
					<dl>
						<dt>商品管理</dt>
						<dd><a nid="17" href="javascript:;" onclick="get_content(this,17)" url="http://localhost/hdcms/index.php?g=Hdcms&amp;a=Admin&amp;c=Administrator&amp;m=index" class="">管理员管理</a></dd>
					</dl>
				</div>
				<div class="nid_2">
					<dl>
						<dt>管理员设置2</dt>
						<dd><a nid="17" href="javascript:;" onclick="get_content(this,17)" url="http://localhost/hdcms/index.php?g=Hdcms&amp;a=Admin&amp;c=Administrator&amp;m=index" class="">管理员管理</a></dd>
					</dl>
				</div>
				<div class="nid_3">
					<dl>
						<dt>管理员设置3</dt>
						<dd><a nid="17" href="javascript:;" onclick="get_content(this,17)" url="http://localhost/hdcms/index.php?g=Hdcms&amp;a=Admin&amp;c=Administrator&amp;m=index" class="">管理员管理</a></dd>
					</dl>
				</div>
				<div class="nid_4">
					<dl>
						<dt>管理员设置4</dt>
						<dd><a nid="17" href="javascript:;" onclick="get_content(this,17)" url="http://localhost/hdcms/index.php?g=Hdcms&amp;a=Admin&amp;c=Administrator&amp;m=index" class="">管理员管理</a></dd>
					</dl>
				</div>
			</div>
			<!--主体左侧导航-->
			<!--内容显示区域-->
			<div class="menu_nav">
				<div class="direction">
					<a href="#" class="left">
						向左
					</a>
					<a href="#" class="right">
						向右
					</a>
				</div>
				<div class="favorite_menu">
					<ul>
						<li class="action" nid="0" style="border-left:solid 1px #D8D8D8;">
							<a href="javascript:;" class="menu" nid="0">
								欢迎页
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="top_content">
				<iframe src="<?php echo U('welcome');?>" nid="0" scrolling="auto" frameborder="0"
				style="height: 100%;width: 100%;"></iframe>
			</div>
			<!--内容显示区域-->
		</div>
		<div id="quick_menu">
			<div class="set">
				<a url="{|U:'setFavorite'}" onclick="get_content(this,90001)" href="javascript:;" nid="90001">
					设置
				</a>
			</div>
			<div
			style="float:left;width:1px;margin-right:5px;overflow: hidden;background: #999999;height:15px;margin-top:12px;"></div>
			<div class="bottom-menu">
				<list from="$favorite_menu" name="f">
					<a url="?a=<?php echo ($f["app"]); ?>&c=<?php echo ($f["control"]); ?>&m=<?php echo ($f["method"]); ?>&nid=<?php echo ($f["nid"]); ?>"
					onclick="get_content(this,<?php echo ($f["nid"]); ?>)" href="javascript:;" nid="<?php echo ($f["nid"]); ?>">
						<?php echo ($f["title"]); ?>
					</a>
				</list>
			</div>
			<div class="quick-hide">
				<a href="javascript:quick_menu_hide();">
					隐藏
				</a>
			</div>
		</div>
		<div id="show_quick_menu" onclick="show_quick_menu()">
			显示
		</div>
		<!--加载后触发第一个顶级菜单-->
		<script>
			$("a[nid=1]").trigger("click");
		</script>
		
	</body>
</html>