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

<form action="http://localhost/hdcms/index.php?a=Admin&c=Config&m=edit" method="post" class="hd-form" onsubmit="return hd_submit(this)">
    <div class="wrap">
        <div class="menu_list">
            <ul>
               <li><a href="<?php echo U('Goods/index');?>">商品列表</a></li>
                <li><a href="<?php echo U('Goods/add');?>" class="action">添加商品</a></li>
            </ul>
        </div>
        <div class="title-header">温馨提示</div>
        <div class="tab">
            <ul class="tab_menu">
                <li lab="web"><a href="#">通用信息</a></li>
                <li><li lab="rewrite"><a href="#">详细描述</a></li></li>
                <li lab="upload"><a href="#">其他信息</a></li>
                <li lab="member"><a href="#">商品属性</a></li>
                <li lab="content"><a href="#">商品相册</a></li>
            </ul>
            <div class="tab_content">
                <div id="web">
                    <table class="table1">
                        
                                <tr>
                                    <th class="w100">商品名称</th>
                                    <td class="w250">
                                        <input type="text" name="name" value="" class="w400"/>
                                    </td>
                                </tr>                        
                                <tr>
                                    <th class="w100">商品广告语</th>
                                    <td class="w250">
                                        <input type="text" name="goods_ad" value="" class="w400"/>
                                    </td>
                                </tr>                         
                                <tr>
                                    <th class="w100">商品货号</th>
                                    <td class="w250">
                                        <input type="text" name="pro_no" value="" class="w400"/>
                                    </td>
                                </tr>   
                                <tr>
                                    <th class="w100">商品分类</th>
                                    <td>
                                        <select name="category_id" class="w200">
                                                    <option value="0">请选择</option>
                                                        <?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo str_repeat("&nbsp;",$v['level']); if($v['level']): ?>├─<?php endif; echo ($v["name"]); ?></option><?php endforeach; endif; ?>
                                        </select>
                                    </td>
                                </tr>  
                               <tr>
                                    <th class="w100">商品品牌</th>
                                    <td>
                                        <select name="brand_id" class="w200">
                                                    <option value="0">请选择</option>
                                                        <?php if(is_array($brand)): foreach($brand as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
                                        </select>
                                    </td>
                                </tr>      
                                <tr>
                                    <th class="w100">商城价</th>
                                    <td class="w250">
                                        <input type="text" name="sell_price" value="" class="w400"/>
                                    </td>
                                </tr>  
                                <tr>
                                    <th class="w100">市场价</th>
                                    <td class="w250">
                                        <input type="text" name="market_price" value="" class="w400"/>
                                    </td>
                                </tr> 
                                <tr>
                                    <th class="w100">仓库量</th>
                                    <td class="w250">
                                        <input type="text" name="market_price" value="" class="w400"/>
                                    </td>
                                </tr>                  
                        </table>
                </div>
                <div id="rewrite">
                    <table class="table1"> 
                    <tr>
                                    <th class="w100">详细内容</th>
                                    <td>
                        <textarea name='content' class='w400 h100'></textarea>
                        </td>
                    </tr>
                    </table>
                </div>
                <div id="upload">
                    <table class="table1">
                                <tr>
                                    <th class="w100">商品类型</th>
                                    <td>
                                        <select name="brand_id" class="w200">
                                                    <option value="0">请选择</option>
                                                        <?php if(is_array($types)): foreach($types as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
                                        </select>
                                    </td>
                                </tr> 
                                
                    </table>
                </div>
                <div id="member">
                    <table class="table1">
                                <tr>
                                    <th class="w100">商品类型</th>
                                    <td>
                                        <select name="brand_id" class="w200 goodsType">
                                                    <option value="0">请选择</option>
                                                        <?php if(is_array($types)): foreach($types as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
                                        </select>
                                    </td>
                                </tr>  
                                <tbody id="extendType"></tbody> 
                    </table>
                </div>
                <div id="content">
                    <table class="table1">
                        
                    </table>
                </div>
            
             
             
            


            </div>
        </div>
    </div>
    <div class="position-bottom">
        <input type="submit" class="hd-success" value="确定"/>
    </div>
</form>
	</body>
</html>
<script type="text/javascript">
$(function(){
    // 扩展属性部分
    $('.goodsType').change(function(){
        var type_id=$(this).val();
        var url="<?php echo U('Attribute/ajaxType');?>";
        $.ajax({
            type:'GET',
            url:url,
            data:{type_id:type_id},
            success:function(res){
                $('#extendType').html(res);
            }

        });
       
    });    
})

</script>