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
            <li><a href="<?php echo U('Article/index');?>">文章列表</a></li>
            <li><a href="<?php echo U('Article/add');?>" class="action">添加文章</a></li>
        </ul>
    </div>
    <div class="title-header">添加文章</div>
    <form method="post" class="hd-form" action="<?php echo U('Article/add');?>" enctype="multipart/form-data">
        <table class="table1">
            <tr>
                <th class="w100">标题</th>
                <td>
                    <input type="text" name="title" class="w300" />
                </td>
            </tr>
            <tr>
                <th class="w100">分类</th>
                <td>
                    <select name="category_id" class="w200">
                         <option value="0">请选择</option>
                         <?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo str_repeat("&nbsp;",$v['level']); if($v['level']): ?>├─<?php endif; echo ($v["name"]); ?></option><?php endforeach; endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th class="w100">缩略图</th>
                <td>
                    <input type="file" name="thumb" class="w300" />
                </td>
            </tr>
            <tr>
                <th class="w100">排序</th>
                <td>
                    <input type="text" name="sort" class="w300" />
                </td>
            </tr>
            <tr>
                <th class="w100">内容</th>
                <td>
                    <textarea name="content" id="content" class="w650 h450"></textarea>
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

<!-- 实例化编辑器代码 -->
<!--Umeditor编辑器-->
<script id="detail" name="detail" type="text/plain" style="width:600px;height:200px;"></script>
<!-- 样式文件 -->
<link rel="stylesheet" href="/thinkshop/Application/Admin/View/Static//Umeditor/themes/default/css/umeditor.css">
<!-- 配置文件 -->
<script type="text/javascript" src="/thinkshop/Application/Admin/View/Static//Umeditor/umeditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/thinkshop/Application/Admin/View/Static//Umeditor/umeditor.js"></script>

<script type="text/javascript">
         $(function(){
             window.um = UM.getEditor('content', {
                 /* 传入配置参数,可配参数列表看umeditor.config.js */
                 toolbar: [
            'source | undo redo | bold italic underline strikethrough | superscript subscript | forecolor backcolor | removeformat |',
            'insertorderedlist insertunorderedlist | selectall cleardoc paragraph | fontfamily fontsize' ,
            '| justifyleft justifycenter justifyright justifyjustify |',
            'link unlink | emotion image video  | map',
            '| horizontal print preview fullscreen', 'drafts', 'formula'
        ],
                 imageUrl:"<?php echo U('Base/uploadDetailImg');?>",//php处理脚本
                 imagePath:'/thinkshop/',
                 focus: true,
                 enterTag:'br'
             });
         });
</script>
<!--//Umeditor编辑器-->