<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title>ThinkShop电子商务系统</title>
		<script type='text/javascript' src='/thinkshop/Application/Admin/View/Static/js/jquery-1.8.2.min.js'></script>
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
	</head>
	<body>

<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="<?php echo U('Article/index');?>">文章列表</a></li>
            <li><a href="" class="action">修改文章</a></li>
        </ul>
    </div>
    <div class="title-header">修改类型</div>
    <form method="post" class="hd-form" action="<?php echo U('Article/update');?>" >
    <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>" />
        <table class="table1">
            <tr>
                <th class="w100">标题</th>
                <td>
                    <input type="text" name="title" class="w300" value="<?php echo ($info["title"]); ?>" />
                </td>
            </tr>
           <tr>
                <th class="w100">分类</th>
                <td>
                    <select name="category_id" class="w200">
                         <option value="0">请选择</option>
                         <?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"
                             <?php if($info['category_id']==$v['id']): ?>selected="selected"<?php endif; ?>
                             ><?php echo str_repeat("&nbsp;",$v['level']); if($v['level']): ?>├─<?php endif; echo ($v["name"]); ?></option><?php endforeach; endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th class="w100">缩略图</th>
                <td>
                    <input type="file" name="thumb" class="w300" />
                    <img src="<?php echo ($info["thumb"]); ?>" class="thumbShow" />
                </td>
            </tr>
            <tr>
                <th class="w100">排序</th>
                <td>
                    <input type="text" name="sort" class="w300" value="<?php echo ($info["sort"]); ?>" />
                </td>
            </tr>
            <tr>
                <th class="w100">内容</th>
                <td>
                    <textarea name="content" class="w400 h100"><?php echo ($info["content"]); ?></textarea>
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