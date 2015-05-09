<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>ThinkShop后台登录</title>
    <link href='/thinkshop/Application/Admin/View/Static/login/css/css.css' rel='stylesheet' media='screen'>
    <script>
        $(function () {
            var error = '<?php echo ($error); ?>';
            if (error) {
                $("div#error_tips").show();
                $(".err_m").html(error);
                setTimeout(function(){ $("div#error_tips").hide()},5000);
            }
        })
    </script>
    <script type="text/javascript" src="/thinkshop/Application/Admin/View/Static/js/js.js"></script>
</head>
<body>
<div class="header">
    <div class="links">
        <a href="">首页</a> |
        <a href="">青果网官网</a> |
        <a href="">ThinkShop官网</a>
        
    </div>
</div>
<div class="main">
    <div class="pics">
    </div>
    <div class="login">
        <div class="title">
            后台登录
        </div>
        <div id="tips" class="tips"></div>
        <div class="web_login">
            <div class="login_form">
                <div id="error_tips">
                    <span class="error_logo"></span>
                    <span class="err_m">12dssfd</span>
                </div>
                <form action="<?php echo U('admin/index/index');?>" method="post" class="hd-form">
                    <div class="input">
                        <div class="inputOuter">
                            <input type="text" name="username" value="帐号" autofocus='true' placeholder="帐号"
                                   required=""/>
                        </div>
                    </div>
                    <div class="input">
                        <div class="inputOuter">
                            <input type="password" name="password" placeholder="密码" required=""/>
                        </div>
                    </div>
                    <div class="input">
                        <div class="inputOuter">
                            <input type="text" name="code" placeholder="验证码" required=""/>
                        </div>
                    </div>

                    <div class="verifyimgArea">
                        <img src="{|U:'code'}" class="code" style="cursor: pointer;float:left;"
                             onclick="this.src='{|U:'code'}&'+Math.random()"/>
                        <a href="javascript:void(0);" onclick="$('.code').trigger('click')">看不清，换一张</a>
                    </div>
                    <div class="send">
                        <input type="submit" class="btn2" value="登录"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<iframe name="checkLogin" style="display:none;"></iframe>
</body>
</html>