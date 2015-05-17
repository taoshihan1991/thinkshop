<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title>ThinkShop电子商务系统</title>
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
	</head>
	<body>

<div class="wrap">
    <div class="search">

        <form class="hd-form">
        文章分类 :
        <select name="category_id" class="w100 searchAttr">
            <option value="<?php echo U('Article/index');?>">全部</option>
            <?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value="<?php echo U('Article/index',array('category_id'=>$v['id']));?>" <?php if($_GET['category_id']==$v['id']): ?>selected="selected"<?php endif; ?>><?php echo str_repeat("&nbsp;",$v['level']); if($v['level']): ?>├─<?php endif; echo ($v["name"]); ?></option><?php endforeach; endif; ?>
        </select>
        </form>
    </div>
    <div class="menu_list">
        <ul>
            <li><a href="<?php echo U('Article/index');?>" class="action">文章列表</a></li>
            <li><a href="<?php echo U('Article/add');?>">添加文章</a></li>
        </ul>
    </div>
    <table class="table2 hd-form">
        <thead>
        <tr>
            <td class="w30">编号</td>
            <td class="w200">标题</td>
            <td class="w200">分类</td>
            <td class="w150">操作</td>
        </tr>
        </thead>
            <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
                <td><?php echo ($v["id"]); ?></td>
                <td><?php echo ($v["title"]); ?></td>
                <td><?php echo ($v["cate_name"]); ?></td>
                <td>
                    <a href="<?php echo U('Article/update',array('id'=>$v['id']));?>">修改</a> 
                    <span class="line">|</span> 
                    <a href="<?php echo U('Article/delete',array('id'=>$v['id']));?>">删除</a>
                </td>
            </tr><?php endforeach; endif; ?>
            </table>
    <div class="page1"><?php echo ($page); ?></div>
    <div class="h60"></div>
</div>
	</body>
</html>

<script>
    $('.searchAttr').change(function(){
        window.location.href=$(this).val();
    });
</script>