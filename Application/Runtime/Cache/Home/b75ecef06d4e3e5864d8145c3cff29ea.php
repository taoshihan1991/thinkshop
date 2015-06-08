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
            <a class="btn-category-list" href="http://list.mi.com/">全部商品分类</a>
            <div class="nav-category-section">
                <ul class="nav-category-list">
                    <?php if(is_array($cateTreeData)): foreach($cateTreeData as $key=>$rows): ?><li class="nav-category-item nav-category-item-first">
                        <div class="nav-category-content">
                        <a class="title" href=""><?php echo ($rows["name"]); ?></a>
                        <div class="links">
                            <?php if(is_array($rows["child"])): foreach($rows["child"] as $key=>$r): ?><a href=""><?php echo ($r["name"]); ?></a><?php endforeach; endif; ?>
                        </div>
                        <div class="nav-category-children">
                            <ul class="children-list">
                                <?php if(is_array($rows["child"])): foreach($rows["child"] as $key=>$r): if($r['child']): if(is_array($r["child"])): foreach($r["child"] as $key=>$v): ?><li>
                                    <a href=""><img src="http://c1.mifile.cn/f/i/2014/cn/nav/icons/minote.jpg" width="40" height="40" alt="" class="img-loaded"><span class="text"><?php echo ($v["name"]); ?></span></a>
                                </li><?php endforeach; endif; ?>
                                <?php else: ?>
                                <li>
                                    <a href=""><img src="http://c1.mifile.cn/f/i/2014/cn/nav/icons/minote.jpg" width="40" height="40" alt="" class="img-loaded"><span class="text"><?php echo ($r["name"]); ?></span></a>
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
                    <a href=""><span class="text">首页</span></a>
                </li>
                <?php $i=0; ?>
                <?php if(is_array($navigator)): foreach($navigator as $key=>$v): $i++;if($i>=8) break; ?>
                <li class="nav-main-item">
                    <a href="<?php echo U('Category/index',array('cid'=>$v['id']));?>"><span class="text"><?php echo ($v["name"]); ?></span><span class="arrow"></span></a>
                    <div class="nav-main-children">
                        <ul class="children-list clearfix">
                            <li class="first">
                             <a class="item-detail" href="http://www.mi.com/minote/">
                                    <span class="title" style="font-size:20px;">小麦Note</span>
                                    <span class="desc">大屏旗舰，HiFi 双卡双待</span>
                                    <span class="price"><b>2299</b>元起</span>
                                    <span class="thumb">
                                        <img src="http://c1.mifile.cn/f/i/2014/cn/nav/nav-phone-minote.jpg" srcset="http://c1.mifile.cn/f/i/2014/cn/nav/nav-phone-minote_2x.jpg 2x" alt="小麦Note" width="160" height="160"/>
                                    </span>
                                </a>
                            </li>
                             <li>
                            <a class="item-detail" href="http://www.mi.com/mi4/">
                                    <span class="title" style="font-size:20px;">小麦手机4</span>
                                    <span class="desc">工艺和手感，超乎想象</span>
                                    <span class="price"><b>1499</b>元</span>
                                    <span class="thumb">
                                        <img src="http://c1.mifile.cn/f/i/2014/cn/nav/nav-phone-mi4.jpg" srcset="http://c1.mifile.cn/f/i/2014/cn/nav/nav-phone-mi4_2x.jpg 2x" alt="小麦手机4" width="160" height="160"/>
                                    </span>
                                    <span class="desc">旗舰特价直降200</span>
                                </a>
                            </li>
                        
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
                <h3 class="title">小麦明星单品<a class="acc-link" href="http://www.mi.com/c/peijian/" onClick="_msq.push(['trackEvent',' CN-WW-HP-PJ-A0','', '']);_hmt.push(['_trackEvent','PC','首页_B1_8_http://www.mi.com/c/peijian/']);">根据机型选配件</a></h3>
                <div class="more">
                    <div class="xm-recommend-page clearfix">
                        <a class="page-btn-prev page-btn-prev-disabled iconfont J_carouselPrev" href="javascript: void(0);">&#xe604;</a><a class="page-btn-next iconfont J_carouselNext" href="javascript: void(0);">&#xe605;</a>
                    </div>
                </div>
            </div>
            <div class="box-bd">
                <div class="xm-star-goods-list-wrap J_carouselWrap">
                    <div class="xm-star-goods-list clearfix J_carouselList">
                                                <div class="xm-star-goods-item">
                            <div class="item-content">
                                <span class="item-thumb">
                                  <a href="http://item.mi.com/static/buymitv" data-stat-aid='AA10083' data-stat-pid='1_3_1_16'><img src="http://i1.mifile.cn/a1/T1GqdTByYv1RXrhCrK!220x220.jpg" srcset="http://i1.mifile.cn/a1/T1GqdTByYv1RXrhCrK!440x440.jpg 2x"  alt="小麦电视2 全系列" /></a>
                                </span>
                                <span class="item-title"><a href="http://item.mi.com/static/buymitv">小麦电视2 全系列</a></span>
                                <span class="item-desc">40/49/55英寸 现货购买</span>
                            </div>
                        </div>
                                                <div class="xm-star-goods-item">
                            <div class="item-content">
                                <span class="item-thumb">
                                  <a href="http://item.mi.com/static/buymipad" data-stat-aid='AA280' data-stat-pid='1_3_2_17'><img src="http://i1.mifile.cn/a1/T1m1_TBshT1RXrhCrK!220x220.jpg" srcset="http://i1.mifile.cn/a1/T1m1_TBshT1RXrhCrK!440x440.jpg 2x"  alt="小麦平板" /></a>
                                </span>
                                <span class="item-title"><a href="http://item.mi.com/static/buymipad">小麦平板</a></span>
                                <span class="item-desc">全球首款搭载 NVIDIA Tegra K1 处理器平板</span>
                            </div>
                        </div>
                                                <div class="xm-star-goods-item">
                            <div class="item-content">
                                <span class="item-thumb">
                                  <a href="http://item.mi.com/static/buyhezi" data-stat-aid='AA10071' data-stat-pid='1_3_3_18'><img src="http://i1.mifile.cn/a1/T1BUKvBjbT1RXrhCrK!220x220.jpg" srcset="http://i1.mifile.cn/a1/T1BUKvBjbT1RXrhCrK!440x440.jpg 2x"  alt="小麦盒子增强版 1G" /></a>
                                </span>
                                <span class="item-title"><a href="http://item.mi.com/static/buyhezi">小麦盒子增强版 1G</a></span>
                                <span class="item-desc">首款4K超高清网络机顶盒</span>
                            </div>
                        </div>
                                                <div class="xm-star-goods-item">
                            <div class="item-content">
                                <span class="item-thumb">
                                  <a href="http://www.mi.com/yicamera/" data-stat-aid='AA10209' data-stat-pid='1_3_4_19'><img src="http://i1.mifile.cn/a1/T1l0ZvBydv1RXrhCrK!220x220.jpg" srcset="http://i1.mifile.cn/a1/T1l0ZvBydv1RXrhCrK!440x440.jpg 2x"  alt="小蚁运动相机" /></a>
                                </span>
                                <span class="item-title"><a href="http://www.mi.com/yicamera/">小蚁运动相机</a></span>
                                <span class="item-desc">边玩边录边拍，手机随时分享</span>
                            </div>
                        </div>
                                                <div class="xm-star-goods-item">
                            <div class="item-content">
                                <span class="item-thumb">
                                  <a href="http://item.mi.com/1151900011.html" data-stat-aid='AA10166' data-stat-pid='1_3_5_20'><img src="http://i1.mifile.cn/a1/T12HJvByEv1RXrhCrK!220x220.jpg" srcset="http://i1.mifile.cn/a1/T12HJvByEv1RXrhCrK!440x440.jpg 2x"  alt="小麦移动电源10000mAh" /></a>
                                </span>
                                <span class="item-title"><a href="http://item.mi.com/1151900011.html">小麦移动电源10000mAh</a></span>
                                <span class="item-desc">松下/LG高密度进口电芯</span>
                            </div>
                        </div>
                                                <div class="xm-star-goods-item">
                            <div class="item-content">
                                <span class="item-thumb">
                                  <a href="http://www.mi.com/miwifimini/" data-stat-aid='AA10036' data-stat-pid='1_3_6_21'><img src="http://i1.mifile.cn/a1/T1VwDgBCVT1RXrhCrK!220x220.jpg" srcset="http://i1.mifile.cn/a1/T1VwDgBCVT1RXrhCrK!440x440.jpg 2x"  alt="小麦路由器 mini" /></a>
                                </span>
                                <span class="item-title"><a href="http://www.mi.com/miwifimini/">小麦路由器 mini</a></span>
                                <span class="item-desc">主流双频AC智能路由器，性价比之王</span>
                            </div>
                        </div>
                                                <div class="xm-star-goods-item">
                            <div class="item-content">
                                <span class="item-thumb">
                                  <a href="http://www.mi.com/headphone/" data-stat-aid='AA10120' data-stat-pid='1_3_7_22'><img src="http://i1.mifile.cn/a1/T1GQATBQbT1RXrhCrK!220x220.jpg" srcset="http://i1.mifile.cn/a1/T1GQATBQbT1RXrhCrK!440x440.jpg 2x"  alt="小麦头戴式耳机" /></a>
                                </span>
                                <span class="item-title"><a href="http://www.mi.com/headphone/">小麦头戴式耳机</a></span>
                                <span class="item-desc">50mm大尺寸航天金属振膜</span>
                            </div>
                        </div>
                                                <div class="xm-star-goods-item">
                            <div class="item-content">
                                <span class="item-thumb">
                                  <a href="http://item.mi.com/1141700001.html" data-stat-aid='AA402' data-stat-pid='1_3_8_23'><img src="http://i1.mifile.cn/a1/T1kiWTBChT1RXrhCrK!220x220.jpg" srcset="http://i1.mifile.cn/a1/T1kiWTBChT1RXrhCrK!440x440.jpg 2x"  alt="小麦路由器" /></a>
                                </span>
                                <span class="item-title"><a href="http://item.mi.com/1141700001.html">小麦路由器</a></span>
                                <span class="item-desc">顶配双频AC智能路由器，内置1TB大硬盘 </span>
                            </div>
                        </div>
                                                    
                    </div>
                </div> 
            </div>
        </div> 
    </div>
    <!-- .home-star-goods END -->

    <div class="home-commented-goods">
        <div class="xm-plain-box">
            <div class="box-hd">
                <h3 class="title">热评产品</h3>
            </div>
            <div class="box-bd">
                <div class="xm-commented-goods-list-wrap">
                    <div class="xm-commented-goods-list clearfix">
                                                <div class="xm-commented-goods-item J_commentedGoods" data-cid="2134900289">
                            <div class="item-content">
                                <span class="item-info">
                                    <span class="item-title"><a href="http://item.mi.com/1134900281.html"  >小麦商务真皮钱包</a></span>
                                    <span class="item-meta"></span>
                                    <span class="item-price">99元 <del>159元</del></span>
                                </span>
                                <span class="item-thumb">
                                    <a href="http://item.mi.com/1134900281.html" data-stat-aid='AA10179' data-stat-pid='1_7_1_43'><img src="http://i1.mifile.cn/a1/T1nmhTBTKT1RXrhCrK!220x220.jpg" alt="小麦商务真皮钱包" srcset="http://i1.mifile.cn/a1/T1nmhTBTKT1RXrhCrK!440x440.jpg 2x"  /></a>
                                </span>
                                <span class="item-comment">钱包做工精细很好，能装的卡也很多，是真皮的我很喜欢O(∩_∩)O</span>
                                                                                            </div>
                        </div>
                                                <div class="xm-commented-goods-item J_commentedGoods" data-cid="2141400075">
                            <div class="item-content">
                                <span class="item-info">
                                    <span class="item-title"><a href="http://item.mi.com/1141400037.html"  >小麦足球麦兔T恤 巴西风</a></span>
                                    <span class="item-meta"></span>
                                    <span class="item-price">19元 <del>39元</del></span>
                                </span>
                                <span class="item-thumb">
                                    <a href="http://item.mi.com/1141400037.html" data-stat-aid='AA10140' data-stat-pid='1_7_2_44'><img src="http://i1.mifile.cn/a1/T1IRdvByYT1RXrhCrK!220x220.jpg" alt="小麦足球麦兔T恤 巴西风" srcset="http://i1.mifile.cn/a1/T1IRdvByYT1RXrhCrK!440x440.jpg 2x"  /></a>
                                </span>
                                <span class="item-comment">衣服质量好，穿着舒服，时尚好看，富有青春向上的气息，很好</span>
                                                                                            </div>
                        </div>
                                                <div class="xm-commented-goods-item J_commentedGoods" data-cid="2151600007">
                            <div class="item-content">
                                <span class="item-info">
                                    <span class="item-title"><a href="http://item.mi.com/1151600011.html"  >麦兔主题3D保护壳</a></span>
                                    <span class="item-meta"></span>
                                    <span class="item-price">39元 </span>
                                </span>
                                <span class="item-thumb">
                                    <a href="http://item.mi.com/1151600011.html" data-stat-aid='AA10206' data-stat-pid='1_7_3_45'><img src="http://i1.mifile.cn/a1/T1F8b_BvCT1RXrhCrK!220x220.jpg" alt="麦兔主题3D保护壳" srcset="http://i1.mifile.cn/a1/T1F8b_BvCT1RXrhCrK!440x440.jpg 2x"  /></a>
                                </span>
                                <span class="item-comment">So cool！看麦关公风虎云龙！大喝一声—— 『刀下留人！』</span>
                                                                                            </div>
                        </div>
                                                <div class="xm-commented-goods-item J_commentedGoods" data-cid="2134900300">
                            <div class="item-content">
                                <span class="item-info">
                                    <span class="item-title"><a href="http://item.mi.com/1134900292.html"  >小麦随身杯</a></span>
                                    <span class="item-meta"></span>
                                    <span class="item-price">29元 <del>39元</del></span>
                                </span>
                                <span class="item-thumb">
                                    <a href="http://item.mi.com/1134900292.html" data-stat-aid='AA10207' data-stat-pid='1_7_4_46'><img src="http://i1.mifile.cn/a1/T1vydTBgDT1RXrhCrK!220x220.jpg" alt="小麦随身杯" srcset="http://i1.mifile.cn/a1/T1vydTBgDT1RXrhCrK!440x440.jpg 2x"  /></a>
                                </span>
                                <span class="item-comment">简约而不简单，盛水也多，喝的过瘾！</span>
                                                                                            </div>
                        </div>
                                                     
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
                                                <div class="home-saleoff-goods-item">
                            <div class="item-content">
                                <span class="item-title"><a href="http://item.mi.com/1150900002.html" >红麦必备套装</a></span>
                                <span class="item-price"><i>79</i>元 <del>117元</del></span>
                                <span class="item-thumb">
                                    <a href="http://item.mi.com/1150900002.html"  data-stat-aid='AA136' data-stat-pid='1_8_1_47'><img src="http://i1.mifile.cn/a1/T1F9ZTBbxT1RXrhCrK!220x220.jpg" alt="红麦必备套装" srcset="http://i1.mifile.cn/a1/T1F9ZTBbxT1RXrhCrK!440x440.jpg 2x"  /></a>
                                </span>
                                                                <div class="item-flag">
                                    <span class="icon-flag">省38元</span>
                                </div>
                                                                                                                            </div>
                        </div>
                                                <div class="home-saleoff-goods-item">
                            <div class="item-content">
                                <span class="item-title"><a href="http://item.mi.com/1152100010.html" >出行全能套装</a></span>
                                <span class="item-price"><i>108</i>元 <del>128.7元</del></span>
                                <span class="item-thumb">
                                    <a href="http://item.mi.com/1152100010.html"  data-stat-aid='AA10208' data-stat-pid='1_8_2_48'><img src="http://i3.mifile.cn/a4/T1lbxgB7LT1RXrhCrK.jpg" alt="出行全能套装" srcset="http://i3.mifile.cn/a4/T15nJgB7JT1RXrhCrK.jpg 2x"  /></a>
                                </span>
                                                                <div class="item-flag">
                                    <span class="icon-flag">省20.7元</span>
                                </div>
                                                                                                                            </div>
                        </div>
                                                <div class="home-saleoff-goods-item">
                            <div class="item-content">
                                <span class="item-title"><a href="http://item.mi.com/1134900032.html" >小麦2S原装电池（送座充）</a></span>
                                <span class="item-price"><i>59</i>元 </span>
                                <span class="item-thumb">
                                    <a href="http://item.mi.com/1134900032.html"  data-stat-aid='AA443' data-stat-pid='1_8_3_49'><img src="http://i1.mifile.cn/a1/T1vRhTBTET1RXrhCrK!220x220.jpg" alt="小麦2S原装电池（送座充）" srcset="http://i1.mifile.cn/a1/T1vRhTBTET1RXrhCrK!440x440.jpg 2x"  /></a>
                                </span>
                                                                                                                                <span class="item-flag">
                                    <span class="icon-flag">买赠</span>
                                </span>
                                                            </div>
                        </div>
                                                <div class="home-saleoff-goods-item">
                            <div class="item-content">
                                <span class="item-title"><a href="http://item.mi.com/1150600003.html" >小麦快充套装</a></span>
                                <span class="item-price"><i>59</i>元 <del>79元</del></span>
                                <span class="item-thumb">
                                    <a href="http://item.mi.com/1150600003.html"  data-stat-aid='AA409' data-stat-pid='1_8_4_50'><img src="http://i1.mifile.cn/a1/T1ipAvB_ZT1RXrhCrK!220x220.jpg" alt="小麦快充套装" srcset="http://i1.mifile.cn/a1/T1ipAvB_ZT1RXrhCrK!440x440.jpg 2x"  /></a>
                                </span>
                                                                <div class="item-flag">
                                    <span class="icon-flag">省20元</span>
                                </div>
                                                                                                                            </div>
                        </div>
                                                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .home-saleoff-goods END -->

    <div class="home-commented-goods home-duokan-goods">
        <div class="xm-plain-box">
            <div class="box-hd">
                <h3 class="title">多看图书</h3>
                <div class="more">
                    <a class="more-link" href="http://www.duokan.com/list/1-1?from=xiaomi" target="_blank" onclick="_hmt.push(['_trackEvent','PC','首页_E1_更多_http://www.duokan.com/list/1-1?from=xiaomi']);">更多<i class="iconfont">&#xe605;</i></a>
                </div>
            </div>
            <div class="box-bd">
                <div class="xm-commented-goods-list-wrap">
                    <div class="xm-commented-goods-list clearfix">
                                                <div class="xm-commented-goods-item">
                            <div class="item-content">
                                <span class="item-info">
                                    <span class="item-title"><a href="http://www.duokan.com/book/90842"   target="_blank">阿狸·呓语</a></span>
                                     <span class="item-author">Hans</span>                                    
                                    <span class="item-price">10.99元</span>
                                </span>
                                <span class="item-thumb">
                                    <a href="http://www.duokan.com/book/90842"  data-stat-aid='AA10167' data-stat-pid='1_9_1_51' target="_blank"><img src="http://i3.mifile.cn/a4/T1C___BKVT1RXrhCrK.jpg" alt="阿狸·呓语" srcset="http://i3.mifile.cn/a4/T1IjV_B5VT1RXrhCrK.jpg 2x"  /></a>
                                </span>
                                <span class="item-comment">小阿狸触动每个人内心深处的柔软与坚强，感动你、治愈你</span>
                            </div>
                        </div>
                                                <div class="xm-commented-goods-item">
                            <div class="item-content">
                                <span class="item-info">
                                    <span class="item-title"><a href="http://www.duokan.com/book/90100?ch=MiCom"   target="_blank">心理医生在吗</a></span>
                                     <span class="item-author">严歌苓</span>                                    
                                    <span class="item-price">8.99元</span>
                                </span>
                                <span class="item-thumb">
                                    <a href="http://www.duokan.com/book/90100?ch=MiCom"  data-stat-aid='AA10011' data-stat-pid='1_9_2_52' target="_blank"><img src="http://i3.mifile.cn/a4/T1OwLjB4YT1RXrhCrK.jpg" alt="心理医生在吗" srcset="http://i3.mifile.cn/a4/T1vIZjB4WT1RXrhCrK.jpg 2x"  /></a>
                                </span>
                                <span class="item-comment">严歌苓长篇小说，原名《人寰》，获台湾时报百万小说大奖。</span>
                            </div>
                        </div>
                                                <div class="xm-commented-goods-item">
                            <div class="item-content">
                                <span class="item-info">
                                    <span class="item-title"><a href="http://www.duokan.com/book/90137?ch=MiCom"   target="_blank">人在风里</a></span>
                                     <span class="item-author">一鸣</span>                                    
                                    <span class="item-price">免费</span>
                                </span>
                                <span class="item-thumb">
                                    <a href="http://www.duokan.com/book/90137?ch=MiCom"  data-stat-aid='AA10010' data-stat-pid='1_9_3_53' target="_blank"><img src="http://i3.mifile.cn/a4/T1Y2xvB4Dv1RXrhCrK.jpg" alt="人在风里" srcset="http://i3.mifile.cn/a4/T1yrhjBXbT1RXrhCrK.jpg 2x"  /></a>
                                </span>
                                <span class="item-comment">简书小说，随风而逝的，是我们无法留住的青春。</span>
                            </div>
                        </div>
                                                <div class="xm-commented-goods-item">
                            <div class="item-content">
                                <span class="item-info">
                                    <span class="item-title"><a href="http://www.duokan.com/book/89848?ch=MiCom"   target="_blank">读者（2015年第10期）</a></span>
                                     <span class="item-author">《读者》编辑部</span>                                    
                                    <span class="item-price">3元</span>
                                </span>
                                <span class="item-thumb">
                                    <a href="http://www.duokan.com/book/89848?ch=MiCom"  data-stat-aid='AA10012' data-stat-pid='1_9_4_54' target="_blank"><img src="http://i3.mifile.cn/a4/T1yeVjBCDT1RXrhCrK.jpg" alt="读者（2015年第10期）" srcset="http://i3.mifile.cn/a4/T1FOZjBCCT1RXrhCrK.jpg 2x"  /></a>
                                </span>
                                <span class="item-comment">重症病房里的圣诞节&“人”是怎么教没的&父亲最高兴的一天。</span>
                            </div>
                        </div>
                                                
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .home-duokan-goods END -->

    <div class="home-commented-goods home-miui-goods">
        <div class="xm-plain-box">
            <div class="box-hd">
                <h3 class="title">MIUI 主题</h3>
                <div class="more">
                    <a class="more-link" href="http://zhuti.xiaomi.com/?from=mi" target="_blank" onclick="_hmt.push(['_trackEvent','PC','首页_E2_更多_http://zhuti.xiaomi.com/?from=mi']);">更多<i class="iconfont">&#xe605;</i></a>
                </div>
            </div>
            <div class="box-bd">
                <div class="xm-commented-goods-list-wrap">
                    <div class="xm-commented-goods-list clearfix">
                                               <div class="xm-commented-goods-item">
                            <div class="item-content">
                                <span class="item-info">
                                    <span class="item-title"><a href="http://zhuti.xiaomi.com/detail/8e935324-0bdf-411d-9d47-4766b6e886d8"   target="_blank">iOS Color</a></span>                                   
                                    <span class="item-price">6麦币</span>
                                </span>
                                <span class="item-thumb">
                                    <a href="http://zhuti.xiaomi.com/detail/8e935324-0bdf-411d-9d47-4766b6e886d8"  data-stat-aid='AA10173' data-stat-pid='1_10_1_55' target="_blank"><img src="http://i3.mifile.cn/a4/T1wZdgBy_v1RXrhCrK.jpg" alt="iOS Color" srcset="http://i3.mifile.cn/a4/T186dgB7YT1RXrhCrK.jpg 2x"  /></a>
                                </span>
                            </div>
                        </div>
                                                <div class="xm-commented-goods-item">
                            <div class="item-content">
                                <span class="item-info">
                                    <span class="item-title"><a href="http://zhuti.xiaomi.com/detail/4df62481-00c4-45f8-8135-6a2433a8bdfb"   target="_blank">小薇之向来缘浅，奈何情深</a></span>                                   
                                    <span class="item-price">免费 <del>6麦币</del></span>
                                </span>
                                <span class="item-thumb">
                                    <a href="http://zhuti.xiaomi.com/detail/4df62481-00c4-45f8-8135-6a2433a8bdfb"  data-stat-aid='AA10174' data-stat-pid='1_10_2_56' target="_blank"><img src="http://i3.mifile.cn/a4/T1J5KgBgZT1RXrhCrK.jpg" alt="小薇之向来缘浅，奈何情深" srcset="http://i3.mifile.cn/a4/T1oHEgBKWT1RXrhCrK.jpg 2x"  /></a>
                                </span>
                            </div>
                        </div>
                                                <div class="xm-commented-goods-item">
                            <div class="item-content">
                                <span class="item-info">
                                    <span class="item-title"><a href="http://zhuti.xiaomi.com/detail/8e0da6e6-b07c-4479-9bd0-486b0baddcd8"   target="_blank">iOS雅黑版</a></span>                                   
                                    <span class="item-price">6麦币</span>
                                </span>
                                <span class="item-thumb">
                                    <a href="http://zhuti.xiaomi.com/detail/8e0da6e6-b07c-4479-9bd0-486b0baddcd8"  data-stat-aid='AA10175' data-stat-pid='1_10_3_57' target="_blank"><img src="http://i3.mifile.cn/a4/T1aFEgBKAT1RXrhCrK.jpg" alt="iOS雅黑版" srcset="http://i3.mifile.cn/a4/T104YgB7AT1RXrhCrK.jpg 2x"  /></a>
                                </span>
                            </div>
                        </div>
                                                <div class="xm-commented-goods-item">
                            <div class="item-content">
                                <span class="item-info">
                                    <span class="item-title"><a href="http://zhuti.xiaomi.com/detail/3575a5da-a2a8-417f-84b4-09e24020fbca"   target="_blank">绝色</a></span>                                   
                                    <span class="item-price">6麦币</span>
                                </span>
                                <span class="item-thumb">
                                    <a href="http://zhuti.xiaomi.com/detail/3575a5da-a2a8-417f-84b4-09e24020fbca"  data-stat-aid='AA10176' data-stat-pid='1_10_4_58' target="_blank"><img src="http://i3.mifile.cn/a4/T1t4ZgBjxT1R4cSCrK.png" alt="绝色" srcset="http://i3.mifile.cn/a4/T1B5YgB7KT1RXrhCrK.jpg 2x"  /></a>
                                </span>
                            </div>
                        </div>
                                                
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .home-miui-goods END -->
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
</body>
</html>