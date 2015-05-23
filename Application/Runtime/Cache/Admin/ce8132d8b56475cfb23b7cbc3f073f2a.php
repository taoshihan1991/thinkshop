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
    <div class="menu_list">
        <ul>
            <li><a href="<?php echo U('Comment/index');?>" >信息列表</a></li>
            <li><a href="" class="action">阅读信息</a></li>
        </ul>
    </div>
    <div class="title-header">阅读信息</div>
    <form method="post" class="hd-form" action="<?php echo U('Comment/update');?>">
    <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>" />
        <table class="table1">
            <tr>
                <th class="w100">评论文章</th>
                <td>
                    <a href="<?php echo U('Blog/index/detail',array('id'=>$article['id']));?>" target="_blank"><?php echo ($article["title"]); ?></a>
                </td>
            </tr>
            <tr>
                <th class="w100">昵称</th>
                <td>
                    <input type="text" name="name" class="w300" value="<?php echo ($info["name"]); ?>" />
                </td>
            </tr>
            <tr>
                <th class="w100">邮箱</th>
                <td>
                    <input type="text" name="email" class="w300" value="<?php echo ($info["email"]); ?>" />
                </td>
            </tr>
            <tr>
                <th class="w100">内容</th>
                <td>
                    <textarea name="content" id="content" class="w650 h100"><?php echo ($info["content"]); ?></textarea>
                </td>
            </tr>
            <tr>
                <th class="w100">回复</th>
                <td>
                    <textarea name="reply"  class="w650 h100"><?php echo ($info["reply"]); ?></textarea>
                </td>
            </tr>
            
        </table>
        <div class="position-bottom">
            <input type="submit" value="确定" class="hd-success"/>
        </div>

    </form>
</div>


	</body>
</html>