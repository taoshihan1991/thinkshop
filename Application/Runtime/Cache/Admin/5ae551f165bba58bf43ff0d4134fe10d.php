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

<form action="<?php echo U('Goods/add');?>" method="post" class="hd-form" >
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
                <li lab="upload"><a href="#">seo信息</a></li>
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
                                    <th class="w100">商品货号</th>
                                    <td class="w250">
                                        <input type="text" name="pro_no" value="" class="w400"/>
                                    </td>
                                </tr>  
                                <tr>
                                    <th class="w100">重量</th>
                                    <td class="w250">
                                        <input type="text" name="weight" value="" class="w400"/>
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
                                        <input type="text" name="store_nums" value="" class="w400"/>
                                    </td>
                                </tr>                  
                        </table>
                </div>
                <div id="rewrite">
                    <table class="table1"> 
                    <tr>
                                    <th class="w100">详细内容</th>
                                    <td>
                        <textarea name='content' id="content" class='w650 h400'></textarea>
                        </td>
                    </tr>
                    </table>
                </div>
                <div id="upload">
                    <table class="table1">
                        <tr>
                                    <th class="w100">seo标题</th>
                                    <td class="w250">
                                        <input type="text" name="seo_title" value="" class="w400"/>
                                    </td>
                        </tr> 
                        <tr>
                                    <th class="w100">seo关键字</th>
                                    <td class="w250">
                                        <input type="text" name="seo_keywords" value="" class="w400"/>
                                    </td>
                        </tr>  
                        <tr>
                                    <th class="w100">seo描述</th>
                                    <td>
                        <textarea name='seo_description' class='w400 h100'></textarea>
                        </td>
                    </tr>   
                    </table>
                </div>
                <div id="member">
                    <table class="table1">
                                <tr>
                                    <th class="w100">商品类型</th>
                                    <td>
                                        <select name="type_id" class="w200 goodsType">
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
                        <tr>
                                    <th class="w100">缩略图</th>
                                    <td class="w250">
                                        <!--图片上传插件uploadify-->
<input type="file" id="goods_img" class="form-control"/>
    <input type="hidden" name="imgs" id="manyImages" value="<?php echo ($info["imgs"]); ?>" />
    <input type="hidden" name="img" id="defaultImg" value="<?php echo ($info["img"]); ?>"/>
    <div id="thumb">
    	<?php if($info['imgs']): $imgs=explode('|', $info['imgs'])?>
    	<?php if(is_array($imgs)): foreach($imgs as $key=>$v): ?><img src="<?php echo ($v); ?>" class="thumbShow"/><?php endforeach; endif; endif; ?>
    </div>

    <link rel="stylesheet" type="text/css" href="/thinkshop/Application/Admin/View/Static//Uploadify/uploadify.css"/>
    <script type="text/javascript" src='/thinkshop/Application/Admin/View/Static//Uploadify/jquery.uploadify.min.js'></script>
    <script type="text/javascript">
     
     $('#goods_img').uploadify({
      swf : '/thinkshop/Application/Admin/View/Static//Uploadify/uploadify.swf',//载入swf
      uploader : "<?php echo U('Base/uploadify');?>",//php处理脚本
      fileObjName: 'Filedata',//上传附件$_FILE标识
      width : 120,//按钮的宽度
      height : 30,//按钮的高度
      buttonImage: "/thinkshop/Application/Admin/View/Static//Uploadify/browse-btn.png",//按钮背景图
      fileTypeDesc : 'Image File',//windows保存类型那里
      fileTypeExts : '*.jpeg;*.jpg;*.png;*.gif',//允许选择的文件类型
      formData : {<?php echo session_name();?>:'<?php echo session_id();?>'},//解决session丢失问题
      auto:true,
      multi : true, //开启,多选文件
      uploadLimit: 10, //允许上传文件个数

      //上传成功后的回调函数
      onUploadSuccess : function(file,data,res){
       	data=JSON.parse(data);
        if(data.status){
        	var manyImages=$('#manyImages').val();
        	manyImages+="|"+data.path.origin;
        	
        	$('#manyImages').val(manyImages);
        	$('#defaultImg').val(data.path.origin);
        	var html='<img src="'+data.path.mini+'" class="thumbShow"/>';
       		$('#thumb').append(html);
        }
      }
     });
    </script>
    <!--//图片上传插件-->
                                    </td>
                        </tr>  
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
<script type="text/javascript">
         $(function(){
             window.um = UM.getEditor('content', {
                 /* 传入配置参数,可配参数列表看umeditor.config.js */
                 toolbar: ['undo redo | bold italic underline | emotion image'],
                 imageUrl:"<?php echo U('Base/uploadDetailImg');?>",//php处理脚本
                 imagePath:'/thinkshop/',
                 focus: true,
                 enterTag:'br'
             });
         });
</script>
<!--//Umeditor编辑器-->