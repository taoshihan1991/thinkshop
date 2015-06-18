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
		<link href='/thinkshop/Application/Admin/View/Static/index/css/welcome.css' rel='stylesheet' media='screen'>
	</head>
	<body>
		<div class="wrap">

			<div class="title-header">
				ThinkShop电子商务系统,欢迎您
			</div>
			<table class="table2">
				<tr>
					<td>1. 专业
工匠精神，打造工艺技术，让产品更加轻易上手，给产品一个本来的面目。</td>
				</tr>
				<tr>
					<td>2. 基于ThinkPHP框架开发的产品，使系统更加高效、稳定、快捷、安全。</td>
				</tr>
				<tr>
					<td>3. 完全开源的系统，让您的个性化定制更加轻松自如，提前为自己的企业的壮大打下坚实的基础。</td>
				</tr>
				<tr>
					<td>4. 紧跟时代步伐，引领产品潮流，做更加专业的产品，注重的不只是细节。</td>
				</tr>
			</table>
			<!-- [图表测试] -->
			<div id="hignchart" style="min-width:800px;height:400px"></div>
			<script type="text/javascript" src="/thinkshop/Application/Admin/View/Static/js/highcharts.js"></script>
			<script type="text/javascript">
			$(function () { 
				var statDataJson=<?php echo $statDataJson?>;
			    $('#hignchart').highcharts({                   //图表展示容器，与div的id保持一致
			        chart: {
			            type: 'line'                         //指定图表的类型，默认是折线图（line）
			        },
			        title: {
			            text: 'PrefectSystem系统欢迎您'      //指定图表标题
			        },
			        xAxis: {
			            categories: statDataJson.xAxis.categories   //指定x轴分组
			        },
			        yAxis: {
			            title: {
			                text: '更新文件(数量)'                  //指定y轴的标题
			            }
			        },
			        series: [{                                 //指定数据列
			            name: '个数',                          //数据列名
			            data: statDataJson.series.data                        //数据
			        }],
			        credits:{
					     enabled:false 							// 禁用版权信息
					}
			    });
			});
			</script>
			<!-- [//图表测试] -->
		</div>
	</body>

</html>