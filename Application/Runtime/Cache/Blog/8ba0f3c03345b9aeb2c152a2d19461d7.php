<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="gbk">
<title>青果轻博客</title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"> 
<meta name="apple-mobile-web-app-status-bar-style" content="black"> 
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="/thinkshop/Application/Blog/View/Static/css/base.css" media="all">
<link href="/thinkshop/Application/Blog/View/Static/css/blog.css" type="text/css" rel="stylesheet" />
<link href="/thinkshop/Application/Blog/View/Static/css/extend.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div class="xutop"><i class="iconfont iconf_caidan">&#xe601;</i></div>
<div class="box_index xunav">
    <a href="<?php echo U('index');?>" >首页</a>
    <?php if(is_array($cate)): foreach($cate as $key=>$v): ?><a href="<?php echo U('Index/index',array('category_id'=>$v['id']));?>"><?php echo ($v["name"]); ?></a><?php endforeach; endif; ?>
</div>
<div class="box_index xuheader">
    <div class="shadow xuheader_Bg"></div>
    <a href="" title="轻博客" class="xulogo" target="_self">轻博客<em>SoftBlog</em></a>
    <div class="xucard">
        <p>你瞧那远古的光 裸露空荡</p>
        <p>无穷无尽是你深邃的眼 传递遐想 </p>
        <p style="margin-top: 8px;">——《远与暗》 写于2015·夏·济南</p>
    </div>
    <div class="icon_layer xuheader_yuan"></div>
</div>
    <div class="box_index timeline clearfix">
        <ul class="clearfix timeline_left">

    
    <li class="shadow timeline_content">
        <div class="timeline_text">
            <div class="timeline_desc">
            	<p><?php echo ($info['content']); ?></p>
                <?php if($info['thumb']): ?><p style="text-align:center"><a href=""><img alt="<?php echo ($info["title"]); ?>" src="/thinkshop<?php echo str_replace('./','/',$info['thumb']);?>"></a></p><?php endif; ?>
                <div class="line"></div>
                <div class="timeline_tips"><span class="timeline_time"><?php echo date('Y年m月d日',$info['addtime']);?> 来自轻博客(SoftBlog)</span><span class="timeline_ready"><a href="<?php echo U('Index/detail',array('id'=>$v['id']));?>"><i class="icon_timeline" title="关注"></i>113次关注</a></span></div>
            </div>
        </div>
        <span class="arrow_bg"></span>
        <span class="icon_timeline arrow_dot"></span>
    </li>
    

  
</ul>
<ul class="timeline_right timeline_weibo">

	
    <li class="shadow timeline_content">
       <h3 class="main_title"><i class="i"></i>一些读后感<i class="switch" title="收缩"></i></h3>
            <div class="timeline_text xu">
                <div class="timeline_desc" id="thirdComment">
                    <!-- 多说评论框 start -->
                    <div class="ds-thread" data-thread-key="112-220" data-title="<?php echo ($info["title"]); ?>" data-url=""></div>
                    <!-- 多说评论框 end -->
                    <!-- 多说公共JS代码 start (一个网页只需插入一次) -->
                    <script type="text/javascript">
                    var duoshuoQuery = {short_name:"SoftBlog"};
                    (function() {
                    var ds = document.createElement('script');
                    ds.type = 'text/javascript';ds.async = true;
                    ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
                    ds.charset = 'UTF-8';
                    (document.getElementsByTagName('head')[0] 
                    || document.getElementsByTagName('body')[0]).appendChild(ds);
                    })();
                    </script>
                </div>
            </div>
            <span class="arrow_bg"></span>
            <span class="icon_timeline arrow_dot"></span>

    </li>  


    
</ul>



        <div class="c"></div>
    	<span class="arrow_line"><i id="add_event_plus" class="icon_timeline spine_plus"></i></span>

</div>



<div class="box_index shadow xufooter">


        <div class="bottomMsg">
       
        <ul class="footer_me">
            <li>轻博客，SoftBlog。不只是一个博客。</li>
            <li><a href="">广告合作</a> - 站长邮箱：</li>
            <li><a href="" target="_blank">新浪微博</a>：<a href="" 
target="_blank"></a>
</li>
            <li><a href="">Sitemap</a> | phper一枚，小phper一枚</li>
            <li>
                <a href="">php开发</a> 
                <a href="">轻博客</a>
            </li>
            <li>2011-3011  &copy; qingguow.cn <a href="javascript:;" onclick="paysentsin()">友情赞助</a></li>
        </ul>
        <ul class="ul footerLiuyan" id="liuyan"></ul>
        <em id="eig_top"><i class="icon_old"></i>TOP</em>
    </div>
    <script src="/thinkshop/Application/Blog/View/Static/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript">
    $('.iconf_caidan').click(function(){
        if($('.xunav').css('display')=='block'){
            $('.xunav').hide();
        }else{
            $('.xunav').show();
        }
        
    });
    $('#eig_top').click(function(){
        $('body,html').animate({
            scrollTop:0,
        },1000);
    });
</script>
</div>

</body>
</html>