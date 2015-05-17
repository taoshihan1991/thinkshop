<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>PerfectSystem后台登录</title>
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
<body class="loginContainer">
    <form action="<?php echo U('Login/index');?>" method="post" class="hd-form loginForm">
    <div class="title">PerfectSystem后台登陆</div>
    <input type="text" name="username" value="" autofocus='false' placeholder="帐号" class="inp" />
     <input type="password" name="password" placeholder="密码" class="inp"/>
     <input type="text" name="code" placeholder="验证码" class="inp" autofocus='false'/>
     <div class="btnBox">
        <img src="<?php echo U('Login/code');?>" class="code" id="verify" style="cursor: pointer;"onclick="this.src='<?php echo U('Login/code');?>&'+Math.random()"/><br/>
        <a href="javascript:void(0);" onclick="$('#verify').trigger('click')">看不清，换一张</a>
        <input type="submit" class="btn1 sub" value="登录"/>
     </div>
     
     
    </form>
</body>
</html>