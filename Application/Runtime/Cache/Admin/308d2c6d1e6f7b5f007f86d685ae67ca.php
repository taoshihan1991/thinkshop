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

    <div class="title-header">站点设置</div>
    <form method="post" class="hd-form" action="<?php echo U('Setting/update');?>" enctype="multipart/form-data">
        <table class="table1">
            <tr>
                <th class="w100">网站名称</th>
                <td>
                    <input type="text" name="webname" class="w300" value="<?php echo ($info["webname"]); ?>" />
                </td>
            </tr>
            <tr>
                <th class="w100">网站关键字</th>
                <td>
                    <input type="text" name="keywords" class="w300" value="<?php echo ($info["keywords"]); ?>" />
                </td>
            </tr>
            <tr>
                <th class="w100">网站描述</th>
                <td>
                    <input type="text" name="description" class="w300" value="<?php echo ($info["description"]); ?>" />
                </td>
            </tr>
            <tr>
                <th class="w100">网站版权</th>
                <td>
                    <textarea name="copyright" class="w350 h150"><?php echo ($info["copyright"]); ?></textarea>
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