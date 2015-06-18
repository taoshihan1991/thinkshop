<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title>PerfectSystem管理系统</title>
		<script type='text/javascript' src='/thinkshop/Application/Admin/View/Static/js/jquery.min.js'></script>
<link href='/thinkshop/Application/Admin/View/Static/hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<link href='/thinkshop/Application/Admin/View/Static/css/extend.css' rel='stylesheet' media='screen'>
<script src='/thinkshop/Application/Admin/View/Static/hdjs/js/hdjs.js'></script>
<script src='/thinkshop/Application/Admin/View/Static/hdjs/js/slide.js'></script>
<script src='/thinkshop/Application/Admin/View/Static/hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = '/thinkshop/';
		ROOT = '/thinkshop/';
		WEB = '/thinkshop/';
		URL = 'http://localhost/hdcms/index.php?a=Admin';
</script>
		<script type="text/javascript" src="/thinkshop/Application/Admin/View/Static/index/js/menu.js"></script>
		<script type="text/javascript" src="/thinkshop/Application/Admin/View/Static/index/js/quick_menu.js"></script>
		<link href='/thinkshop/Application/Admin/View/Static/index/css/css.css' rel='stylesheet' media='screen'>
		<link href='/thinkshop/Application/Admin/View/Static/index/css/quick_menu.css' rel='stylesheet' media='screen'>
		<link href='/thinkshop/Application/Admin/View/Static/css/extend.css' rel='stylesheet' media='screen'>
	</head>
	<body>
		<div class="nav">
			<!--头部左侧导航-->
			<div class="top_menu">
				<h1 class="main_logo">Perfect<i>System</i></h1>
					<a href="javascript:" nid="1" onclick="get_left_menu('1');" class="top_menu">
						CMS中心
					</a>
				
					<a href="javascript:" nid="2" onclick="get_left_menu('2');" class="top_menu">
						SHOP中心
					</a>

					<a href="javascript:" nid="" class="top_menu">
						问答中心
					</a>

					<a href="javascript:" nid="" class="top_menu">
						微博中心
					</a>
			
			</div>
			<!--头部左侧导航-->
			<!--头部右侧导航-->
			<div class="r_menu">
				管理员 : <?php echo ($_SESSION['admin']['username']); ?>
				<a href="<?php echo U('Login/logout');?>" target="_self">
					[退出]
				</a>
				<span>|</span>
				<a href="<?php echo U('Index/clearAllCache');?>">
					更新全站缓存
				</a>
				<span>|</span>
				<a href="<?php echo U('Home/Index/index');?>" target="_blank">
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

						<dt>分类管理</dt>
						<dd><a nid="3" href="javascript:;" onclick="get_content(this,3)" url="<?php echo U('Articleclass/index');?>" class="">分类列表</a></dd>
						<dt>文章管理</dt>
						<dd><a nid="4" href="javascript:;" onclick="get_content(this,4)" url="<?php echo U('Article/index');?>" class="">文章列表</a></dd>
						<dt>留言评论</dt>
						<dd><a nid="5" href="javascript:;" onclick="get_content(this,5)" url="<?php echo U('Comment/index');?>" class="">信息列表</a></dd>
						<dt>系统设置</dt>
						<dd><a nid="6" href="javascript:;" onclick="get_content(this,6)" url="<?php echo U('Setting/index');?>" class="">网站设置</a></dd>
						<dd><a nid="7" href="javascript:;" onclick="get_content(this,7)" url="<?php echo U('Setting/modifypw');?>" class="">修改密码</a></dd>
					</dl>
				</div>
				<div class="nid_2">
					<dl>
						<dt>品牌管理</dt>
						<dd><a nid="8" href="javascript:;" onclick="get_content(this,8)" url="<?php echo U('Brand/index');?>" class="">品牌列表</a></dd>
						<dt>分类管理</dt>
						<dd><a nid="9" href="javascript:;" onclick="get_content(this,9)" url="<?php echo U('Category/index');?>" class="">分类列表</a></dd>
						<dt>属性管理</dt>
						<dd><a nid="10" href="javascript:;" onclick="get_content(this,10)" url="<?php echo U('Type/index');?>" class="">类型列表</a></dd>
						<dd><a nid="11" href="javascript:;" onclick="get_content(this,11)" url="<?php echo U('Attribute/index');?>" class="">属性列表</a></dd>
						<dt>商品管理</dt>
						<dd><a nid="12" href="javascript:;" onclick="get_content(this,12)" url="<?php echo U('Goods/index');?>" class="">商品列表</a></dd>
						<dt>订单管理</dt>
						<dd><a nid="13" href="javascript:;" onclick="get_content(this,13)" url="<?php echo U('Order/index');?>" class="">订单列表</a></dd>
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