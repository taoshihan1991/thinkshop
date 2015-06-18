<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN" xml:lang="zh-CN">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta charset="UTF-8" />
        <title>小麦官网</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        
                <link rel="shortcut icon" href="http://www.mi.com/favicon.ico" type="image/x-icon" />
        <link rel="icon" href="http://www.mi.com/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="/thinkshop/Public/css/base.min.css" />
        <script src="/thinkshop/Public/js/jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="/thinkshop/Public/css/index.min.css" />
        <script type="text/javascript">
        /*<![CDATA[*/
        var isCategoryToggled = "toggled";
        var isSekillOpen = 1;
        var isCommentOpen = 1;
        /*]]>*/
        </script>    
        <script src="/thinkshop/Public/js/xmsg_ti.js"></script>
        <!-- [扩展css,js] -->
        <link rel="stylesheet" href="/thinkshop/Public/css/extend.css" />
        <script src="/thinkshop/Public/js/extend.js"></script>
</head>
<body>
<!-- [顶部] -->
<div class="site-topbar">
    <div class="container">
        <div class="topbar-nav">
            <a href=""  >小麦网</a>
            <span class="sep">|</span><a href=""  target="_blank">MYUI</a>
            <span class="sep">|</span><a href=""  target="_blank">麦聊</a>
            <span class="sep">|</span><a href="javascript:void(0);"  class="J-modal-globalSites">Select region</a>
        </div>
        <div class="topbar-info J_userInfo">
            <a data-needlogin="true" href="">登录</a>
            <span class="sep">|</span>
            <a  href="https://account.xiaomi.com/pass/register">注册</a>
        </div>
    </div>
</div>
<!-- [//顶部] -->

<div class="site-header container">
    <div class="site-logo">
        <a class="logo" href="" title="小麦官网"><i class="iconfont">&#xe61d;</i></a>
    </div>
    <div class="header-info">
        <div class="search-section">
            <form id="J_searchForm" class="search-form clearfix" action="http://search.mi.com/search" method="get">
                <input class="search-text" type="search" name="keyword" autocomplete="off" data-search-config={'defaultWords':["智能硬件","WiFi","自拍杆","移动电源","随身风扇","个性配件","充电线材","存储卡","配件优惠套装"]} placeholder="搜索您需要的商品" />
                <input type="submit" class="search-btn iconfont" value="&#xe630;" />
                <!--[if IE 6]><div class="ie6-fix"></div><![endif]-->
                <div class="hot-words">
                    <a href=http://search.mi.com/search_%E5%B0%8F%E7%B1%B3%E6%89%8B%E7%8E%AF>小麦手环</a><a href=http://search.mi.com/search_%E8%80%B3%E6%9C%BA>耳机</a><a href=http://search.mi.com/search_%E6%8F%92%E7%BA%BF%E6%9D%BF>插线板</a>                </div>
            </form>
        </div>
        <div class="cart-section">
            <a id="J_miniCart" class="mini-cart" href="http://static.mi.com/cart/"><i class="iconfont">&#xe609;</i>购物车<span class="mini-cart-num J_cartNum"></span></a>
            <div id="J_miniCartList" class="mini-cart-list">
                <p class="loading">数据加载中，请稍后...</p>
            </div>
        </div>
    </div>
    <div class="header-nav clearfix">
        <div id="J_categoryContainer" class="nav-category">
            <a class="btn-category-list" href="">全部商品分类</a>
            <div class="nav-category-section">
                <ul class="nav-category-list">
                    <?php if(is_array($cateTreeData)): foreach($cateTreeData as $key=>$rows): ?><li class="nav-category-item nav-category-item-first">
                        <div class="nav-category-content">
                        <a class="title" href="<?php echo U('Category/index',array('cid'=>$rows['id']));?>"><?php echo ($rows["name"]); ?></a>
                        <div class="links">
                            <?php if(is_array($rows["child"])): foreach($rows["child"] as $key=>$r): ?><a href="<?php echo U('Category/index',array('cid'=>$r['id']));?>"><?php echo ($r["name"]); ?></a><?php endforeach; endif; ?>
                        </div>
                        <div class="nav-category-children">
                            <ul class="children-list">
                                <?php if(is_array($rows["child"])): foreach($rows["child"] as $key=>$r): if($r['child']): if(is_array($r["child"])): foreach($r["child"] as $key=>$v): ?><li>
                                    <a href="<?php echo U('Category/index',array('cid'=>$v['id']));?>"><img src="http://c1.mifile.cn/f/i/2014/cn/nav/icons/minote.jpg" width="40" height="40" alt="" class="img-loaded"><span class="text"><?php echo ($v["name"]); ?></span></a>
                                </li><?php endforeach; endif; ?>
                                <?php else: ?>
                                <li>
                                    <a href="<?php echo U('Category/index',array('cid'=>$v['id']));?>"><img src="http://c1.mifile.cn/f/i/2014/cn/nav/icons/minote.jpg" width="40" height="40" alt="" class="img-loaded"><span class="text"><?php echo ($r["name"]); ?></span></a>
                                </li><?php endif; endforeach; endif; ?>
                            </ul>
                        </div>
                        </div>
                    </li><?php endforeach; endif; ?>
                </ul>
            </div>
        </div>
        <div class="nav-main">
            <ul class="nav-main-list J_menuNavMain clearfix">
                <li class="nav-main-item">
                    <a href="<?php echo U('Index/index');?>"><span class="text">首页</span></a>
                </li>
                <?php $i=0; ?>
                <?php if(is_array($navigator)): foreach($navigator as $key=>$v): $i++;if($i>=8) break; ?>
                <li class="nav-main-item">
                    <a href="<?php echo U('Category/index',array('cid'=>$v['id']));?>"><span class="text"><?php echo ($v["name"]); ?></span><span class="arrow"></span></a>
                    <div class="nav-main-children">
                        <ul class="children-list clearfix">
                            <?php $goods_model=D('goods'); $goodsList=$goods_model->where(array('category_id'=>array('in',$v['child'])))->field('name,goods_ad,id,img,sell_price')->order('id desc')->limit(2)->select(); ?>
                            <?php if(is_array($goodsList)): foreach($goodsList as $key=>$row): ?><li class="first">
                             <a class="item-detail" href="">
                                    <span class="title" style="font-size:20px;"><?php echo ($row["name"]); ?></span>
                                    <span class="desc"><?php echo ($row["goods_ad"]); ?></span>
                                    <span class="price"><b><?php echo ($row["sell_price"]); ?></b>元起</span>
                                    <span class="thumb">
                                        <img src="<?php echo getPicUrl($row['img']);?>" width="160" height="160"/>
                                    </span>
                                </a>
                            </li><?php endforeach; endif; ?>
                        
                    </ul>
                    </div>
                </li><?php endforeach; endif; ?>
                </ul>
        </div>
    </div>
    <div class="open-buy-info">
        <a href="http://hd.mi.com/f/buy/open/cn/index.html">6月9日开放购买</a>
    </div>
</div>
<!-- .site-header END -->

<!-- Main Content START -->
<div class="container">
    <div class="row">
        <div class="col col-16 offset4">
            <div class="home-slider">
                <div id="J_homeSlider" class="xm-slider">
                                        <div class="slide">
                        <a href="http://item.mi.com/buyphone/v2/phone/mi4" data-stat-aid='AA10193' data-stat-pid='1_1_1_1' target="_blank"><img src="http://i3.mifile.cn/a4/T1KEZgBKVT1RXrhCrK.jpg" data-src-r="http://i3.mifile.cn/a4/T1u0ZgBKAT1RXrhCrK.jpg" data-src-r-2x="http://i3.mifile.cn/a4/T1Z.KgBmWT1RXrhCrK.jpg"  srcset="http://i3.mifile.cn/a4/T12KCgBKVT1RXrhCrK.jpg 2x" alt="小麦4 旗舰特价直降200" /></a>
                    </div>
                                        <div class="slide">
                        <a href="http://item.mi.com/buyphone/minote" data-stat-aid='AA10172' data-stat-pid='1_1_2_2' target="_blank"><img src="http://i3.mifile.cn/a4/T1GYC_B7ZT1RXrhCrK.jpg" data-src-r="http://i3.mifile.cn/a4/T16YJ_BKLT1RXrhCrK.jpg" data-src-r-2x="http://i3.mifile.cn/a4/T15yVgBTET1RXrhCrK.jpg"  srcset="http://i3.mifile.cn/a4/T1VSEvBCbv1RXrhCrK.jpg 2x" alt="0601NTOTE粉色更新" /></a>
                    </div>
                                        <div class="slide">
                        <a href="http://hd.mi.com/f/zt/hd/2015051901/index.html" data-stat-aid='AA10204' data-stat-pid='1_1_3_4' target="_blank"><img src="http://i3.mifile.cn/a4/T1MBDvBjKT1RXrhCrK.jpg" data-src-r="http://i3.mifile.cn/a4/T1ajWvBTVT1RXrhCrK.jpg" data-src-r-2x="http://i3.mifile.cn/a4/T1bXE_BKKT1RXrhCrK.jpg"  srcset="http://i3.mifile.cn/a4/T1htY_BvAT1RXrhCrK.jpg 2x" alt="红麦2A现货免预约" /></a>
                    </div>
                                        <div class="slide">
                        <a href="http://www.mi.com/yicamera/" data-stat-aid='AA10213' data-stat-pid='1_1_4_5' target="_blank"><img src="http://i3.mifile.cn/a4/T1JrAgB7DT1RXrhCrK.jpg" data-src-r="http://i3.mifile.cn/a4/T1hhhgBmbT1RXrhCrK.jpg" data-src-r-2x="http://i3.mifile.cn/a4/T1TvZgBmbv1RXrhCrK.jpg"  srcset="http://i3.mifile.cn/a4/T1y7dgBmKT1RXrhCrK.jpg 2x" alt="运动相机" /></a>
                    </div>
                                               
                </div>
            </div>
            <div class="home-hd-show clearfix">
                                <div class="hd-show-item hd-show-item-first J_randomItem">
                    <a class="item" href="http://hd.mi.com/f/buy/open/cn/index.html#minote" data-stat-aid='AA10185' data-stat-pid='1_2_1_13'><img alt="6月9日开放购买预约" src="http://i3.mifile.cn/a4/T1WkWgB7dT1RXrhCrK.jpg" srcset="http://i3.mifile.cn/a4/T1UAxgBvCT1RXrhCrK.jpg 2x" /></a>
                </div>                
                                <div class="hd-show-item  J_randomItem">
                    <a class="item" href="http://item.mi.com/static/buymipad" data-stat-aid='AA10186' data-stat-pid='1_2_2_14'><img alt="小麦平板" src="http://i3.mifile.cn/a4/T1_CJ_BKhT1RXrhCrK.jpg" srcset="http://i3.mifile.cn/a4/T16aA_BgYT1RXrhCrK.jpg 2x" /></a>
                </div>                
                                <div class="hd-show-item  J_randomItem">
                    <a class="item" href="http://item.mi.com/buyphone/mi4" data-stat-aid='AA10132' data-stat-pid='1_2_3_15'><img alt="0522各种手机现货" src="http://i3.mifile.cn/a4/T1sxVvBQxT1RXrhCrK.jpg" srcset="http://i3.mifile.cn/a4/T1vlWvBQhT1RXrhCrK.jpg 2x" /></a>
                </div>                
                            </div>
        </div>
    </div>

    <div class="home-star-goods">
        <div class="xm-plain-box J_starGoodsCarousel">
            <div class="box-hd">
                <h3 class="title">小麦明星单品</h3>
                <div class="more">
                    <div class="xm-recommend-page clearfix">
                        <a class="page-btn-prev page-btn-prev-disabled iconfont J_carouselPrev" href="javascript: void(0);">&#xe604;</a><a class="page-btn-next iconfont J_carouselNext" href="javascript: void(0);">&#xe605;</a>
                    </div>
                </div>
            </div>
            <div class="box-bd">
                <div class="xm-star-goods-list-wrap J_carouselWrap">
                    <div class="xm-star-goods-list clearfix J_carouselList">
                    	<?php if(is_array($starList)): foreach($starList as $key=>$v): ?><div class="xm-star-goods-item">
                            <div class="item-content">
                                <span class="item-thumb">
                                  <a href="<?php echo U('Goods/view',array('id'=>$v['id']));?>"><img src="<?php echo getPicUrl($v['img']);?>"  alt="<?php echo ($v["name"]); ?>" /></a>
                                </span>
                                <span class="item-title"><a href="<?php echo U('Goods/view',array('id'=>$v['id']));?>"><?php echo ($v["name"]); ?></a></span>
                                <span class="item-desc"><?php echo ($v["goods_ad"]); ?></span>
                            </div>
                        </div><?php endforeach; endif; ?>
                    </div>
                </div> 
            </div>
        </div> 
    </div>
    <!-- .home-star-goods END -->

    <div class="home-commented-goods">
        <div class="xm-plain-box">
            <div class="box-hd">
                <h3 class="title">小麦手机</h3>
            </div>
            <div class="box-bd">
                <div class="xm-commented-goods-list-wrap">
                    <div class="xm-commented-goods-list clearfix">
                    <?php if(is_array($phoneList)): foreach($phoneList as $key=>$v): ?><div class="xm-commented-goods-item J_commentedGoods" data-cid="2134900289">
                            <div class="item-content">
                                <span class="item-info">
                                    <span class="item-title"><a href="<?php echo U('Goods/view',array('id'=>$v['id']));?>"  ><?php echo ($v["name"]); ?></a></span>
                                    <span class="item-meta"></span>
                                    <span class="item-price"><?php echo ($v["sell_price"]); ?>元 <del><?php echo ($v["sell_price"]); ?>元</del></span>
                                </span>
                                <span class="item-thumb">
                                    <a href="<?php echo U('Goods/view',array('id'=>$v['id']));?>"><img src="<?php echo getPicUrl($v['img']);?>" alt="<?php echo ($v["name"]); ?>" /></a>
                                </span>
                                <span class="item-comment">钱包做工精细很好，能装的卡也很多，是真皮的我很喜欢O(∩_∩)O</span>
                                                                                            </div>
                        </div><?php endforeach; endif; ?>   
                                                     
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .home-commented-goods END -->

    <div class="home-saleoff-goods">
        <div class="xm-plain-box">
            <div class="box-hd">
                <h3 class="title">特价产品</h3>
            </div>
            <div class="box-bd">
                <div class="home-saleoff-goods-list-wrap">
                    <div class="home-saleoff-goods-list clearfix">
					<?php if(is_array($phoneList)): foreach($phoneList as $key=>$v): ?><div class="home-saleoff-goods-item">
                            <div class="item-content">
                                <span class="item-title"><a href="<?php echo U('Goods/view',array('id'=>$v['id']));?>" ><?php echo ($v["name"]); ?></a></span>
                                <span class="item-price"><i><?php echo ($v["sell_price"]); ?></i>元 <del><?php echo ($v["sell_price"]); ?>元</del></span>
                                <span class="item-thumb">
                                    <a href="<?php echo U('Goods/view',array('id'=>$v['id']));?>"  ><img src="<?php echo getPicUrl($v['img']);?>" alt="<?php echo ($v["name"]); ?>"  /></a>
                                </span>
                                                                <div class="item-flag">
                                    <span class="icon-flag">省<?php echo ($v["sell_price"]); ?>元</span>
                                </div>
                                                                                                                            </div>
                        </div><?php endforeach; endif; ?>                     
												
			          
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .home-saleoff-goods END -->

 
 
</div>
<!-- Main Content END -->

<script>
// 来自 xiaomi.com 的用户
jQuery(function($) {
    if (!$('.site-bn').length) {
        if (window.location.href.split('?').length < 2) return false;

        if (window.location.href.split('?')[1].indexOf('f=xiaomi') !== -1) {

            var timeoutModalFrom,
                modalFromCounter = 5,
                $modalFrom = $('<div class="modal modal-from-xiaomi"><div class="modal-body"><a class="btn-enter J_closeModalFrom" href="javascript: void(0);"><span class="J_xmCounter">5秒后</span> 进入小麦网</a><span class="close J_closeModalFrom" data-dismiss="modal"><i class="iconfont">&#xe617;</i></span></div></div>');

            function modalCountDown() {
                modalFromCounter -= 1;

                if (modalFromCounter < 1) {
                    closeModalFrom();
                }
                else {
                    $('.J_xmCounter').text(modalFromCounter + '秒后');
                }
            }

            function closeModalFrom() {
                window.clearInterval(timeoutModalFrom);
                $modalFrom.modal('hide');
                XIAOMI.app.cookie('indexFromXiaomi', '1', {
                    expires: 1
                });
            }

            if (XIAOMI.app.cookie('indexFromXiaomi') !== '1') {
                $('body').append($modalFrom);
                $modalFrom.modal({
                    'backdrop': 'static',
                    'show': true
                });

                timeoutModalFrom = window.setInterval(function() {
                    modalCountDown();
                }, 1000);

                $('.J_closeModalFrom').on('click', function(e) {
                    e.preventDefault();
                    closeModalFrom();
                });
            }
        }
    }
});
</script>

<div class="site-footer">
    <div class="container">
        <div class="footer-service">
            <ul class="list-service clearfix">
                            <li>
                    <a rel="nofollow" href="http://www.mi.com/service/exchange#repaire" target="_blank">
                        <i class="iconfont">&#xe63a;</i>
                        <strong>1小时快修服务</strong>
                    </a>
                </li>
                                <li>
                    <a rel="nofollow" href="http://www.mi.com/service/exchange#back" target="_blank">
                        <i class="iconfont">&#xe638;</i>
                        <strong>7天无理由退货</strong>
                    </a>
                </li>
                                <li>
                    <a rel="nofollow" href="http://www.mi.com/service/exchange#free" target="_blank">
                        <i class="iconfont">&#xe651;</i>
                        <strong>15天免费换货</strong>
                    </a>
                </li>
                                <li>
                    <a rel="nofollow" href="http://www.mi.com/service/exchange#mail" target="_blank">
                        <i class="iconfont">&#xe64d;</i>
                        <strong>满150元包邮</strong>
                    </a>
                </li>
                                <li>
                    <a rel="nofollow" href="http://www.mi.com/c/service/poststation/" target="_blank">
                        <i class="iconfont">&#xe63b;</i>
                        <strong>520余家售后网点</strong>
                    </a>
                </li>
                
            </ul>
        </div>
        <div class="footer-links clearfix">
            
            <dl class="col-links col-links-first">
                <dt>帮助中心</dt>
                
                <dd><a rel="nofollow" href="http://wiki.xiaomi.cn/%E5%B0%8F%E7%B1%B3%E7%BD%91%E8%B4%AD%E7%89%A9%E6%B5%81%E7%A8%8B"  target="_blank">购物指南</a></dd>
                
                <dd><a rel="nofollow" href="http://wiki.xiaomi.cn/%E6%94%AF%E4%BB%98%E6%96%B9%E5%BC%8F"  target="_blank">支付方式</a></dd>
                
                <dd><a rel="nofollow" href="http://wiki.xiaomi.cn/%E7%AC%AC%E4%B8%89%E6%96%B9%E9%85%8D%E9%80%81"  target="_blank">配送方式</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>服务支持</dt>
                
                <dd><a rel="nofollow" href="http://www.mi.com/service/exchange"  target="_blank">售后政策</a></dd>
                
                <dd><a rel="nofollow" href="http://fuwu.mi.com/"  target="_blank">自助服务</a></dd>
                
                <dd><a rel="nofollow" href="http://xiazai.mi.com/"  target="_blank">相关下载</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>小麦之家</dt>
                
                <dd><a rel="nofollow" href="http://www.mi.com/c/xiaomizhijia/"  target="_blank">小麦之家</a></dd>
                
                <dd><a rel="nofollow" href="http://www.mi.com/c/service/poststation/"  target="_blank">服务网点</a></dd>
                
                <dd><a rel="nofollow" href="http://service.order.mi.com/mihome/index"  target="_blank">预约亲临到店服务</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>关于小麦</dt>
                
                <dd><a rel="nofollow" href="http://www.mi.com/about"  target="_blank">了解小麦</a></dd>
                
                <dd><a rel="nofollow" href="http://hr.xiaomi.com/"  target="_blank">加入小麦</a></dd>
                
                <dd><a rel="nofollow" href="http://www.mi.com/about/contact"  target="_blank">联系我们</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>关注我们</dt>
                
                <dd><a rel="nofollow" href="http://e.weibo.com/xiaomishouji"  target="_blank">新浪微博</a></dd>
                
                <dd><a rel="nofollow" href="http://xiaoqu.qq.com/mobile/share/index.html?url=http%3A%2F%2Fxiaoqu.qq.com%2Fmobile%2Fbarindex.html%3Fwebview%3D1%26type%3D%26source%3Dindex%26_lv%3D25741%26sid%3D%26_wv%3D5123%26_bid%3D128%26%23bid%3D10525%26from%3Dwechat"  target="_blank">小麦部落</a></dd>
                
                <dd><a rel="nofollow" class="J_modalWeixin" href="javascript: void(0);" >官方微信</a></dd>
                
            </dl>
                
            <div class="col-contact">
                <p class="phone">400-100-5678</p>
<p>周一至周日 8:00-18:00<br />（仅收市话费）</p>
<a rel="nofollow" class="btn btn-primary btn-small" href="http://www.mi.com/service/contact" target="_blank">24小时在线客服</a>            </div>
        </div>
        <div class="footer-info clearfix">
            <div class="info-text">
                <p>小麦旗下网站：<a href="http://www.mi.com/index.html" target="_blank">小麦网</a><span class="sep">|</span><a href="http://www.miui.com/" target="_blank">MIUI</a><span class="sep">|</span><a href="http://www.miliao.com/" target="_blank">麦聊</a><span class="sep">|</span><a href="http://www.duokan.com/" target="_blank">多看书城</a><span class="sep">|</span><a href="http://www.miwifi.com/" target="_blank">小麦路由器</a><span class="sep">|</span><a href="http://www.mi.com/hk/" target="_blank">繁體香港</a><span class="sep">|</span><a href="http://www.mi.com/tw/" target="_blank">繁體台灣</a><span class="sep">|</span><a href="http://www.mi.com/en/" target="_blank">English</a><span class="sep">|</span><a href="http://blog.xiaomi.com/" target="_blank">小麦后院</a><span class="sep">|</span><a href="http://xiaomi.tmall.com/" target="_blank">小麦天猫店</a><span class="sep">|</span><a href="http://shop115048570.taobao.com" target="_blank">小麦淘宝直营店</a><span class="sep">|</span><a href="http://union.mi.com/" target="_blank">小麦网盟</a>                </p>
                <p>&copy;<a href="http://www.mi.com/" target="_blank" title="mi.com">mi.com</a> 京ICP证110507号 京ICP备10046444号 京公网安备1101080212535号 <a href="http://c1.mifile.cn/f/i/2013/cn/jingwangwen.jpg" target="_blank">京网文[2014]0059-0009号</a></p>
            </div>
            <div class="info-sites J_globalList">
                <div class="global-site-current">简体中文</div>
                <span class="arrow"></span>
                <ul class="global-site-list">
                
                    <li><a href="http://www.mi.com/en/">English</a></li>
                
                    <li><a href="http://www.mi.com/tw/">繁體台灣</a></li>
                
                    <li><a href="http://www.mi.com/hk/">繁體香港</a></li>
                
                    <li><a href="http://www.mi.com/sg/">Singapore</a></li>
                
                    <li><a href="http://www.mi.com/my/">Malaysia</a></li>
                
                    <li><a href="http://www.mi.com/in/">India</a></li>
                
                    <li><a href="http://www.mi.com/ph/">Philippines</a></li>
                
                    <li><a href="http://www.mi.com/id/">Indonesia</a></li>
                
                    <li><a href="http://www.mi.com/">简体中文</a></li>
                
                </ul>
            </div>
            <div class="info-links">
                            <a href="https://ss.knet.cn/verifyseal.dll?sn=e12033011010015771301369&ct=df&pa=461082" target="_blank"><img src="http://s1.mi.com/zt/12052601/cnnicVerifyseal.png" alt="可信网站" /></a>
                            <a href="https://search.szfw.org/cert/l/CX20120926001783002010" target="_blank"><img src="http://s1.mi.com/zt/12052601/szfwVerifyseal.gif" alt="诚信网站" /></a>
                            <a href="http://www.315online.com.cn/member/315140007.html" target="_blank"><img src="http://s1.mi.com/zt/12052601/save.jpg" alt="网上交易保障中心" /></a>
            
            </div>
        </div>
    </div>
</div>
<!-- .site-footer END -->
<div id="loginBox" class="modal modal-login hide" data-width="420" data-width-sns="420"  data-height="430">
        <a class="close" data-dismiss="modal" href="javascript: void(0);"><i class="iconfont">&#xe617;</i></a>
        <div class="modal-body" id="loginBox-con">
            <p class="loginBox-loading">数据加载中，请稍后...</p>
        </div>
    </div>
<!-- .modal-login END -->
<div id="J_modalWeixin" class="modal fade hide modal-weixin" data-width="480" data-height="520">
        <div class="modal-header">
            <a class="close" data-dismiss="modal"><i class="iconfont">&#xe617;</i></a>
            <h3>小麦手机官方微信二维码</h3>
        </div>
        <div class="modal-body" style="padding-top: 10px;">
            <p style="margin: 0 0 10px;">打开微信，点击右上角的“+”，选择“扫一扫”功能，<br/>对准下方二维码即可。</p>
            <img alt="" src="http://c1.mifile.cn/f/i/2014/cn/qr.png" />
        </div>
    </div>
<!-- .modal-weixin END -->
<div class="modal hide xm-dm-queue" id="xmDmQueue">
        <div class="modal-body">
            <span class="close" data-dismiss="modal" aria-hidden="true"><i class="iconfont">&#xe617;</i></span>
            <h3>正在排队，请稍候喔！</h3>
            <p class="queue-tip">抱歉，目前排队人数较多，导致服务器压力山大，请您耐心排队等待，<br>我们将在稍后告诉您排队结果。</p>
            <div class="queue-animate">
                <div id="mituWalking" class="mitu-walk"> </div>
                <div class="animate-mask animate-mask-left"></div>
                <div class="animate-mask animate-mask-right"></div>
            </div>
        </div>
    </div>
<!-- .xm-dm-queue END -->
<div id="xmDmError" class="modal hide xm-dm-error">
        <span class="close" data-dismiss="modal" aria-hidden="true"><i class="iconfont">&#xe617;</i></span>
        <div class="modal-body">
            <h3>抱歉，网络拥堵无法连接服务器</h3>
            <p  class="error-tip">由于访问人数太多导致服务器压力山大，请您稍后再重试。</p>
            <p >
                <a class="btn btn-primary" id="xmDmReload">重试</a>
            </p>
        </div>
    </div>
<!-- .xm-dm-error END -->
<div class="modal fade hide modal-globalSites" data-width="640" id="J_modal-globalSites">
        <span class="close" data-dismiss="modal"><i class="iconfont"></i></span>
        <div class="modal-body">
            <h3>Welcome to Mi.com</h3>
            <p class="modal-globalSites-tips">Please select your country or region</p>
            <p class="modal-globalSites-links clearfix">
                <a href="http://www.mi.com/index.html">Mainland China</a>
                <a href="http://www.mi.com/hk/">Hong Kong</a>
                <a href="http://www.mi.com/tw/">Taiwan</a>
                <a href="http://www.mi.com/sg/">Singapore</a>
                <a href="http://www.mi.com/my/">Malaysia</a>
                <a href="http://www.mi.com/ph/">Philippines</a>
                <a href="http://www.mi.com/in/">India</a>
                <a href="http://www.mi.com/id/">Indonesia</a>
                <a href="http://www.mi.com/en/">Global Home</a>
            </p>
        </div>
    </div>
<!-- .modal-globalSites END -->

    <script src="/thinkshop/Public/js/base.min.js"></script>
    <script>
        XIAOMI.namespace("GLOBAL_CONFIG,GLOBAL_VAR");
        XIAOMI.GLOBAL_CONFIG = {
            orderSite:"http://order.mi.com",
            wwwSite:"http://www.mi.com",
            cartSite:"http://cart.mi.com",
            itemSite:"http://item.mi.com",
            listSite:"http://list.mi.com",
            searchSite:"http://search.mi.com",
            mySite:"http://my.mi.com",
            damiaoSite:"http://tp.hd.mi.com/",
            damiaoGoodsId:["2150900016","2150900017","2151300011","2151300012","1151600007","2151900001","2152300005"],
            logoutUrl:"http://order.mi.com/site/logout",
            staticSite: "http://static.mi.com",
            quickLoginUrl:"https://account.xiaomi.com/pass/static/login.html",
            //图片上传路径地址
            uploadUrl:"http://viewapi.xiaomi.com",
            //图片远程存储地址
            imgSaveUrl:"http://img06.mifile.cn/v1/MI_574AF0887F5D0",
            //评论查询地址
            commentUrl:"http://test.comment.com",
            //评论Api地址
            commentApiUrl:"http://comment.order.mi.com",
            //侧边栏数据接口
            sideBarApiUrl:"http://prs.www.xiaomi.com"
        }
        XIAOMI.app.setLoginInfo.orderUrl = XIAOMI.GLOBAL_CONFIG.orderSite + '/user/order';
        XIAOMI.app.setLoginInfo.logoutUrl = XIAOMI.GLOBAL_CONFIG.logoutUrl;
        XIAOMI.app.setLoginInfo.init(XIAOMI.GLOBAL_CONFIG);
        //全站需要直接执行的函数
        jQuery(function ($) {
            var oLogin = new XIAOMI.app.miniLogin();
            oLogin.init();
            // 搜索
            XIAOMI.app.search.init();
            // miniCart
            XIAOMI.app.miniCart.init();
            // 更新miniCart数量
            XIAOMI.app.updateMiniCart();
            // // 商品分类导航
            // XIAOMI.app.navMenus.init($('.J_menuNavMain'), {
            //     menuSelector: '.nav-main-item',
            //     submenuSelector: '.nav-main-children',
            //     effect: 'slide',
            //     triggerEvent: 'hover'
            // });
            // XIAOMI.app.navCategory.init();
            // 绑定尾部公共事件
            XIAOMI.app.footer.init();
        });
    </script>
    <script type="text/javascript" src="/thinkshop/Public/js/index.min.js"></script>
<script>
$(function(){
	//导航分类树显示
	$('#J_categoryContainer').hover(function(){
		$(this).find('.nav-category-section').show();
	},function(){
		$(this).find('.nav-category-section').show();
	});
	$('#J_categoryContainer').find('.nav-category-section').show();
})

</script>
</body>
</html>