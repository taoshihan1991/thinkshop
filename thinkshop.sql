/*
Navicat MySQL Data Transfer

Source Server         : taoshihan
Source Server Version : 50150
Source Host           : localhost:3306
Source Database       : thinkshop

Target Server Type    : MYSQL
Target Server Version : 50150
File Encoding         : 65001

Date: 2015-06-18 21:13:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ts_admin`
-- ----------------------------
DROP TABLE IF EXISTS `ts_admin`;
CREATE TABLE `ts_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(255) NOT NULL DEFAULT '' COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_admin
-- ----------------------------
INSERT INTO `ts_admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- ----------------------------
-- Table structure for `ts_article`
-- ----------------------------
DROP TABLE IF EXISTS `ts_article`;
CREATE TABLE `ts_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自动编号',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `content` text NOT NULL COMMENT '主要内容',
  `thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '缩略图',
  `category_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分类编号',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `link` varchar(255) NOT NULL DEFAULT '' COMMENT '外链',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_article
-- ----------------------------
INSERT INTO `ts_article` VALUES ('1', '小米4手机直降100元', '<p>小米4手机直降100元</p>', 'Uploads/2015-06-06/5572cbd774d5e.jpg', '1', '1433586647', '0', 'http://www.qingguow.cn/');

-- ----------------------------
-- Table structure for `ts_articleclass`
-- ----------------------------
DROP TABLE IF EXISTS `ts_articleclass`;
CREATE TABLE `ts_articleclass` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增编号',
  `name` varchar(200) NOT NULL DEFAULT '' COMMENT '分类名称',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父级分类',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_articleclass
-- ----------------------------
INSERT INTO `ts_articleclass` VALUES ('1', '首页banner图轮播', '0', '0');

-- ----------------------------
-- Table structure for `ts_attribute`
-- ----------------------------
DROP TABLE IF EXISTS `ts_attribute`;
CREATE TABLE `ts_attribute` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(125) NOT NULL DEFAULT '' COMMENT '属性名称',
  `type` varchar(125) NOT NULL DEFAULT '',
  `input_type` varchar(45) NOT NULL DEFAULT '',
  `value` varchar(255) NOT NULL DEFAULT '' COMMENT '属性值',
  `type_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '类型id',
  PRIMARY KEY (`id`),
  KEY `fk_ts_attribute_ts_type1_idx` (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_attribute
-- ----------------------------
INSERT INTO `ts_attribute` VALUES ('1', '颜色', '2', '1', '红色|白色|黑色', '3');
INSERT INTO `ts_attribute` VALUES ('2', '型号', '1', '0', '', '2');
INSERT INTO `ts_attribute` VALUES ('3', '尺寸', '1', '1', '一寸|二寸|三寸', '2');
INSERT INTO `ts_attribute` VALUES ('4', '售后保障', '0', '2', '', '2');
INSERT INTO `ts_attribute` VALUES ('5', '包装', '1', '1', '线装|精装', '4');
INSERT INTO `ts_attribute` VALUES ('6', '出版社', '1', '1', '人教版|科教版', '4');
INSERT INTO `ts_attribute` VALUES ('7', '选择颜色', '1', '0', '', '5');
INSERT INTO `ts_attribute` VALUES ('8', '选择版本', '1', '1', '移动4G|联通4G|电信4G', '5');
INSERT INTO `ts_attribute` VALUES ('9', '选择内存', '1', '1', '2G|3G', '5');

-- ----------------------------
-- Table structure for `ts_brand`
-- ----------------------------
DROP TABLE IF EXISTS `ts_brand`;
CREATE TABLE `ts_brand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '品牌名称',
  `logo` varchar(255) NOT NULL DEFAULT '' COMMENT '品牌logo',
  `sort` varchar(255) NOT NULL DEFAULT '' COMMENT '品牌排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_brand
-- ----------------------------
INSERT INTO `ts_brand` VALUES ('9', '小米', './Uploads/2015-06-08/55759e970a909.png', '2');
INSERT INTO `ts_brand` VALUES ('8', '苹果', '', '1');

-- ----------------------------
-- Table structure for `ts_category`
-- ----------------------------
DROP TABLE IF EXISTS `ts_category`;
CREATE TABLE `ts_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增编号',
  `name` varchar(200) NOT NULL DEFAULT '' COMMENT '分类名称',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父级分类',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `logo` varchar(255) NOT NULL DEFAULT '' COMMENT '栏目图标',
  `type` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '筛选类型',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_category
-- ----------------------------
INSERT INTO `ts_category` VALUES ('12', '小麦手机', '6', '0', '', '0');
INSERT INTO `ts_category` VALUES ('11', '红麦手机', '6', '0', '', '0');
INSERT INTO `ts_category` VALUES ('10', '小麦电视', '0', '0', '', '5');
INSERT INTO `ts_category` VALUES ('6', '小麦手机', '0', '1', '', '0');
INSERT INTO `ts_category` VALUES ('13', '小麦1s', '12', '0', '', '0');
INSERT INTO `ts_category` VALUES ('14', '小麦2s', '12', '0', '', '0');
INSERT INTO `ts_category` VALUES ('15', '红麦1s', '11', '0', '', '0');
INSERT INTO `ts_category` VALUES ('16', '红麦Note', '11', '0', '', '0');
INSERT INTO `ts_category` VALUES ('17', '小麦电视2.4英寸', '10', '0', '', '0');
INSERT INTO `ts_category` VALUES ('18', '小麦电视2.49英寸', '10', '0', '', '0');
INSERT INTO `ts_category` VALUES ('19', '路由器', '0', '0', '', '0');
INSERT INTO `ts_category` VALUES ('20', '小麦路由器', '19', '0', '', '0');
INSERT INTO `ts_category` VALUES ('21', '小麦路由mini', '19', '0', '', '0');
INSERT INTO `ts_category` VALUES ('22', '盒子', '0', '0', '', '0');
INSERT INTO `ts_category` VALUES ('23', '小麦盒子', '22', '0', '', '0');
INSERT INTO `ts_category` VALUES ('24', '小麦盒子增强', '22', '0', '', '0');
INSERT INTO `ts_category` VALUES ('25', '小麦电视2.4', '17', '0', '', '0');
INSERT INTO `ts_category` VALUES ('26', '小麦电视2.49', '18', '0', '', '0');
INSERT INTO `ts_category` VALUES ('27', '移动电源和电池', '0', '0', '', '0');
INSERT INTO `ts_category` VALUES ('28', '耳机音响', '0', '0', '', '0');
INSERT INTO `ts_category` VALUES ('29', '小麦周边', '0', '0', '', '0');
INSERT INTO `ts_category` VALUES ('30', '个性化配件', '0', '0', '', '0');
INSERT INTO `ts_category` VALUES ('31', '移动电源', '27', '0', '', '0');
INSERT INTO `ts_category` VALUES ('32', '活塞耳机', '28', '0', '', '0');
INSERT INTO `ts_category` VALUES ('33', '手机贴纸', '30', '0', '', '0');
INSERT INTO `ts_category` VALUES ('34', '麦兔', '29', '0', '', '0');
INSERT INTO `ts_category` VALUES ('35', '耳麦', '28', '0', 'Uploads/2015-06-09/5576e74442f0a.png', '0');
INSERT INTO `ts_category` VALUES ('36', '小麦4', '12', '0', 'Uploads/2015-06-09/5576e8a9e0459.jpg', '0');
INSERT INTO `ts_category` VALUES ('37', '小麦5', '12', '0', 'Uploads/2015-06-09/5576e8866c9d1.jpg', '0');
INSERT INTO `ts_category` VALUES ('38', '小麦明星单品', '0', '0', '', '0');

-- ----------------------------
-- Table structure for `ts_goods`
-- ----------------------------
DROP TABLE IF EXISTS `ts_goods`;
CREATE TABLE `ts_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增编号',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '商品名称',
  `goods_ad` varchar(125) NOT NULL DEFAULT '' COMMENT '商品广告语',
  `goods_no` varchar(20) NOT NULL DEFAULT '' COMMENT '商品编号',
  `pro_no` varchar(20) NOT NULL DEFAULT '' COMMENT '商品货号',
  `type_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '类型编号',
  `content` text NOT NULL COMMENT '详细内容',
  `img` varchar(255) NOT NULL DEFAULT '' COMMENT '默认图片',
  `imgs` varchar(2048) NOT NULL DEFAULT '' COMMENT '产品相册',
  `sell_price` float(10,2) NOT NULL DEFAULT '0.00' COMMENT '商城价',
  `market_price` float(10,2) NOT NULL DEFAULT '0.00' COMMENT '市场价',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上架时间',
  `store_nums` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '库存',
  `seo_title` varchar(255) NOT NULL DEFAULT '' COMMENT '页面标题',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '页面关键字',
  `seo_description` varchar(255) NOT NULL DEFAULT '' COMMENT '页面描述',
  `weight` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品重量',
  `visit` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击数',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `is_online` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否下架',
  `sale_protection` text NOT NULL COMMENT '售后保障',
  `category_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分类编号',
  `brand_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '品牌编号',
  PRIMARY KEY (`id`),
  KEY `fk_ts_goods_ts_category_idx` (`category_id`),
  KEY `fk_ts_goods_ts_brand1_idx` (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_goods
-- ----------------------------
INSERT INTO `ts_goods` VALUES ('11', '小麦电视2 全系列', '40/49/55英寸 现货购买', '', '', '0', '<h3 class=\"webfont\" style=\"font-family: FZLTXHK; font-weight: normal; -webkit-font-smoothing: antialiased; font-size: 40px; line-height: 1.25; color: rgb(51, 51, 51); white-space: normal;\">全球唯一10代线<br/>SDP X-Gen 超晶屏</h3><p style=\"margin-top: 0px; margin-bottom: 0px; padding-top: 10px; padding-bottom: 10px; -webkit-font-smoothing: antialiased; line-height: 1.625; color: rgb(51, 51, 51); font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif; font-size: 16px; white-space: normal;\">SDP X-Gen超晶屏具有5000:1的超高静态对比度和6毫秒<br/>的超快响应速度，搭配瑞仪光电的顶级背光模组，组成一个完美的<br/>屏幕模组，超凡画质由此开始。</p><p><a class=\"link\" href=\"http://www.mi.com/mitv40/pq/\" data-stat-id=\"47807442bc47e133\" style=\"color: rgb(18, 176, 235); font-size: 16px; display: inline-block; -webkit-font-smoothing: antialiased; padding-top: 20px; font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif; line-height: 24px; white-space: normal;\">了解顶级画质&gt;</a><span style=\"color: rgb(51, 51, 51); font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif; font-size: 16px; line-height: 24px; white-space: normal;\"></span></p><p><br/></p>', 'Uploads/2015-06-10/557834c26d494.jpg', '|Uploads/2015-06-10/557834c26d494.jpg', '1999.00', '0.00', '1434547324', '1999', '', '', '', '0', '0', '0', '0', '', '25', '9');
INSERT INTO `ts_goods` VALUES ('9', '小米T恤 留声机 军绿色', '小米T恤 留声机 军绿色', '', '', '3', '<div class=\"totalList\" style=\"margin-bottom: 20px; color: rgb(101, 109, 120); font-family: arial, &#39;Microsoft Yahei&#39;, SimSun, sans-serif; line-height: 24px; white-space: normal;\"><p style=\"margin-top: 0px; margin-bottom: 0px;\">如您对在小米网买到的商品不满意，或出现质量问题，可随时与我们取得联系，提出售后维修或退换货申请。相关工作人员将为您提供一对一的VIP式服务，确保您的消费权益。在您提交售后服务申请前，请阅读本页说明，了解我们的售后服务政策和退换货流程，谢谢。</p><dl style=\"padding-top: 30px; padding-bottom: 30px; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(230, 233, 237);\"><dt style=\"font-weight: bold; font-size: 14px;\">请选择</dt><dd style=\"padding-left: 30px;\"><a href=\"http://www.mi.com/service/shouhou#q30\" style=\"color: rgb(255, 102, 0);\">优惠套装</a></dd><dd style=\"padding-left: 30px;\"><a href=\"http://www.mi.com/service/shouhou#q9\" style=\"color: rgb(255, 102, 0);\">贴膜</a></dd><dd style=\"padding-left: 30px;\"><a href=\"http://www.mi.com/service/shouhou#q8\" style=\"color: rgb(255, 102, 0);\">保护套、保护壳</a></dd><dd style=\"padding-left: 30px;\"><a href=\"http://www.mi.com/service/shouhou#q10\" style=\"color: rgb(255, 102, 0);\">防尘塞</a></dd><dd style=\"padding-left: 30px;\"><a href=\"http://www.mi.com/service/shouhou#q2\" style=\"color: rgb(255, 102, 0);\">后盖</a></dd><dd style=\"padding-left: 30px;\"><a href=\"http://www.mi.com/service/shouhou#q3\" style=\"color: rgb(255, 102, 0);\">贴纸</a></dd><dd style=\"padding-left: 30px;\"><a href=\"http://www.mi.com/service/shouhou#q4\" style=\"color: rgb(255, 102, 0);\">挂饰</a></dd><dd style=\"padding-left: 30px;\"><a href=\"http://www.mi.com/service/shouhou#q5\" style=\"color: rgb(255, 102, 0);\">手机支架</a></dd><dd style=\"padding-left: 30px;\"><a href=\"http://www.mi.com/service/shouhou#q6\" style=\"color: rgb(255, 102, 0);\">耳机绕线器</a></dd><dd style=\"padding-left: 30px;\"><a href=\"http://www.mi.com/service/shouhou#q12\" style=\"color: rgb(255, 102, 0);\">小米移动电源</a></dd><dd style=\"padding-left: 30px;\"><a href=\"http://www.mi.com/service/shouhou#q14\" style=\"color: rgb(255, 102, 0);\">电池</a></dd><dd style=\"padding-left: 30px;\"><a href=\"http://www.mi.com/service/shouhou#q15\" style=\"color: rgb(255, 102, 0);\">充电器</a></dd><dd style=\"padding-left: 30px;\"><a href=\"http://www.mi.com/service/shouhou#q16\" style=\"color: rgb(255, 102, 0);\">线材</a></dd><dd style=\"padding-left: 30px;\"><a href=\"http://www.mi.com/service/shouhou#q18\" style=\"color: rgb(255, 102, 0);\">耳机</a></dd><dd style=\"padding-left: 30px;\"><a href=\"http://www.mi.com/service/shouhou#q19\" style=\"color: rgb(255, 102, 0);\">蓝牙音箱</a></dd><dd style=\"padding-left: 30px;\"><a href=\"http://www.mi.com/service/shouhou#q66\" style=\"color: rgb(255, 102, 0);\">米兔玩偶</a></dd><dd style=\"padding-left: 30px;\"><a href=\"http://www.mi.com/service/shouhou#q22\" style=\"color: rgb(255, 102, 0);\">小米T恤</a></dd><dd style=\"padding-left: 30px;\"><a href=\"http://www.mi.com/service/shouhou#q24\" style=\"color: rgb(255, 102, 0);\">生活周边</a></dd><dd style=\"padding-left: 30px;\"><a href=\"http://www.mi.com/service/shouhou#q27\" style=\"color: rgb(255, 102, 0);\">存储卡</a></dd><dd style=\"padding-left: 30px;\"><a href=\"http://www.mi.com/service/shouhou#q66\" style=\"color: rgb(255, 102, 0);\">读卡器</a></dd><dd style=\"padding-left: 30px;\"><a href=\"http://www.mi.com/service/shouhou#q67\" style=\"color: rgb(255, 102, 0);\">路由器</a></dd><dd style=\"padding-left: 30px;\"><a href=\"http://www.mi.com/service/shouhou#q23\" style=\"color: rgb(255, 102, 0);\">背包</a></dd><dd style=\"padding-left: 30px;\"><a href=\"http://www.mi.com/service/shouhou#q25\" style=\"color: rgb(255, 102, 0);\">拉卡拉刷卡器</a></dd><dd style=\"padding-left: 30px;\"><a href=\"http://www.mi.com/service/shouhou#q13\" style=\"color: rgb(255, 102, 0);\">品牌移动电源</a></dd></dl></div><div class=\"itemList\" style=\"color: rgb(101, 109, 120); font-family: arial, &#39;Microsoft Yahei&#39;, SimSun, sans-serif; line-height: 24px; white-space: normal;\"><h1 style=\"padding-top: 20px; padding-bottom: 20px; font-size: 14px;\"><a name=\"q30\" href=\"http://\">优惠套装</a></h1><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">电源</h2><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，一年内质保（质保范围：客户在正常使用条件下由于产品自身原因导致的无法充放电,鼓胀,漏液等不良情况给予质保处理.。</dd><dd>2.退换凭证：用户提供发票或三包凭证，以及发票底联或者发票（底联.复印件等有效证据。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；用户因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。</dd><dd>4.质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">耳机与音箱</h2><dl><dd>A、小米耳机、声美耳机、小米蓝牙音箱：</dd><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，一年内质保。</dd><dd>2.退换凭证：用户提供发票或三包凭证，以及发票底联或者发票（底联.复印件等有效证据。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；用户因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。</dd><dd>4.质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">保护</h2><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货。</dd><dd>2.退换凭证：用户提供发票或三包凭证，以及发票底联或者发票（底联.复印件等有效证据。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；用户因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。</dd><dd>4.质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">后盖</h2><dl><dt>A、普通后盖：</dt><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货。</dd><dd>2.退换凭证：用户提供发票或三包凭证，以及发票底联或者发票（底联.复印件等有效证据。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；用户因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。</dd><dd>4.质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd><dt>B、个性化定制后盖：</dt><dd>1.定制后盖为特殊商品，非质量问题，暂不支持退换货。存在质量问题可在签收后7日内申请退货。</dd><dd>2.质量问题范围：跟手机扣不紧，定制图案有明显留白，壳体不平，裂痕等。</dd><dd>3.退货凭证：用户提供发票或三包凭证，以及发票底联或者发票（底联.复印件等有效证据。</dd><dd>4.定制类产品为特殊商品，请不要根据喜好随意拒收，我们暂不受理此产品的拒收服务。</dd><dd>5.如您因质量问题办理退货，在您邮寄商品时，您须将快递发票一并寄回。此过程中产生的相关运费凭快递发票最高可报销15元/单。</dd><dd>6.定制类为特殊商品，暂不支持货到付款和上门取货服务。</dd><dd>7.小米之家对此产品暂不办理自提和退货业务，仅提供网上办理及电话办理两种方式。</dd></dl><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">贴膜</h2><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货。</dd><dd>2.退换凭证：用户提供发票或三包凭证，以及发票底联或者发票（底联.复印件等有效证据。</dd><dd>3.贴膜不接受非质量问题的退换；用户因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。</dd><dd>4.质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">挂饰</h2><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货。</dd><dd>2.退换凭证：用户提供发票或三包凭证，以及发票底联或者发票（底联.复印件等有效证据。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；用户因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。</dd><dd>4.质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">贴纸</h2><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货。</dd><dd>2.退换凭证：用户提供发票或三包凭证，以及发票底联或者发票（底联.复印件等有效证据。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；用户因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。</dd><dd>4.质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">支架</h2><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货。</dd><dd>2.退换凭证：用户提供发票或三包凭证，以及发票底联或者发票（底联.复印件等有效证据。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；用户因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。</dd><dd>4.质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">手机刷卡器</h2><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，一年内质保。</dd><dd>2.退换凭证：用户提供发票或三包凭证，以及发票底联或者发票（底联.复印件等有效证据。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；用户因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。</dd><dd>4.质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">存储卡与读卡器</h2><dl><dt>A、存储卡</dt><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，五年内质保。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd><dd>5.在质保期内且签收超过15日，请直接联系品牌商，以便更快捷获得售后服务。</dd><dd>6.品牌官方网站: http://www.toshiba.com.cn/ 品牌售后电话：400-670-6071</dd><dt>B、读卡器</dt><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，一年内质保。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><a href=\"http://www.mi.com/service/shouhou#top\" class=\"returnTop\" style=\"color: rgb(255, 102, 0);\">返回顶部</a><h1 style=\"padding-top: 20px; padding-bottom: 20px; font-size: 14px;\"><a name=\"q9\" href=\"http://\">贴膜</a></h1><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><a href=\"http://www.mi.com/service/shouhou#top\" class=\"returnTop\" style=\"color: rgb(255, 102, 0);\">返回顶部</a><h1 style=\"padding-top: 20px; padding-bottom: 20px; font-size: 14px;\"><a name=\"q8\" href=\"http://\">保护套、保护壳</a></h1><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><a href=\"http://www.mi.com/service/shouhou#top\" class=\"returnTop\" style=\"color: rgb(255, 102, 0);\">返回顶部</a><h1 style=\"padding-top: 20px; padding-bottom: 20px; font-size: 14px;\"><a name=\"q10\" href=\"http://\">防尘塞</a></h1><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><a href=\"http://www.mi.com/service/shouhou#top\" class=\"returnTop\" style=\"color: rgb(255, 102, 0);\">返回顶部</a><h1 style=\"padding-top: 20px; padding-bottom: 20px; font-size: 14px;\"><a name=\"q2\" href=\"http://\">后盖</a></h1><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">A、普通后盖：</h2><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">B、个性化定制后盖：</h2><dl><dd>1.定制后盖为特殊商品，非质量问题，暂不支持退换货。存在质量问题可在签收后7日内申请退货。</dd><dd>2.质量问题范围：跟手机扣不紧，定制图案有明显留白，壳体不平，裂痕等。</dd><dd>3.退换凭证：用户提供相关订单号。</dd><dd>4.定制类产品为特殊商品，我们暂不受理此产品的拒收服务。</dd><dd>5.如您因质量问题办理退货，在您邮寄商品时，您须将快递发票一并寄回。此过程中产生的相关运费凭快递发票最高可报销15元/单。</dd><dd>6.定制类为特殊商品，暂不支持货到付款和上门取货服务。</dd><dd>7.小米之家对此产品暂不办理自提和退货业务，仅提供网上办理及电话办理两种方式</dd></dl><a href=\"http://www.mi.com/service/shouhou#top\" class=\"returnTop\" style=\"color: rgb(255, 102, 0);\">返回顶部</a><h1 style=\"padding-top: 20px; padding-bottom: 20px; font-size: 14px;\"><a name=\"q3\" href=\"http://\">贴纸</a></h1><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><a href=\"http://www.mi.com/service/shouhou#top\" class=\"returnTop\" style=\"color: rgb(255, 102, 0);\">返回顶部</a><h1 style=\"padding-top: 20px; padding-bottom: 20px; font-size: 14px;\"><a name=\"q4\" href=\"http://\">挂饰</a></h1><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><a href=\"http://www.mi.com/service/shouhou#top\" class=\"returnTop\" style=\"color: rgb(255, 102, 0);\">返回顶部</a><h1 style=\"padding-top: 20px; padding-bottom: 20px; font-size: 14px;\"><a name=\"q5\" href=\"http://\">手机支架</a></h1><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><a href=\"http://www.mi.com/service/shouhou#top\" class=\"returnTop\" style=\"color: rgb(255, 102, 0);\">返回顶部</a><h1 style=\"padding-top: 20px; padding-bottom: 20px; font-size: 14px;\"><a name=\"q6\" href=\"http://\">耳机绕线器</a></h1><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><a href=\"http://www.mi.com/service/shouhou#top\" class=\"returnTop\" style=\"color: rgb(255, 102, 0);\">返回顶部</a><h1 style=\"padding-top: 20px; padding-bottom: 20px; font-size: 14px;\"><a name=\"q12\" href=\"http://\">小米移动电源</a></h1><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，一年内质保（质保范围：客户在正常使用条件下由于产品自身原因导致的无法充放电,鼓胀,漏液等不良情况给予质保处理.。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><a href=\"http://www.mi.com/service/shouhou#top\" class=\"returnTop\" style=\"color: rgb(255, 102, 0);\">返回顶部</a><h1 style=\"padding-top: 20px; padding-bottom: 20px; font-size: 14px;\"><a name=\"q14\" href=\"http://\">电池</a></h1><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，一年内质保（质保范围：客户在正常使用条件下由于产品自身原因导致的无法充放电,鼓胀,漏液等不良情况给予质保处理.。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><a href=\"http://www.mi.com/service/shouhou#top\" class=\"returnTop\" style=\"color: rgb(255, 102, 0);\">返回顶部</a><h1 style=\"padding-top: 20px; padding-bottom: 20px; font-size: 14px;\"><a name=\"q15\" href=\"http://\">充电器</a></h1><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，一年内质保（质保范围：客户在正常使用条件下由于产品自身原因导致的无法充放电,鼓胀,漏液等不良情况给予质保处理.。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><a href=\"http://www.mi.com/service/shouhou#top\" class=\"returnTop\" style=\"color: rgb(255, 102, 0);\">返回顶部</a><h1 style=\"padding-top: 20px; padding-bottom: 20px; font-size: 14px;\"><a name=\"q16\" href=\"http://\">线材</a></h1><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，一年内质保（质保范围：客户在正常使用条件下由于产品自身原因导致的无法充放电,鼓胀,漏液等不良情况给予质保处理.。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><a href=\"http://www.mi.com/service/shouhou#top\" class=\"returnTop\" style=\"color: rgb(255, 102, 0);\">返回顶部</a><h1 style=\"padding-top: 20px; padding-bottom: 20px; font-size: 14px;\"><a name=\"q18\" href=\"http://\">耳机</a></h1><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">A、小米活塞耳机</h2><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，一年内质保。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">B、小米线控通话/灵悦耳机</h2><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，六个月内质保。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">C、铁三角耳机</h2><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，一年内质保。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd></dl><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">D、声美耳机</h2><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，一年内质保。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">E、捷波朗蓝牙耳机</h2><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，一年内质保。</dd><dd>2.退换凭证：用户提供相关订单号。</dd></dl><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">F、jawbone蓝牙耳机</h2><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，一年内质保。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.品牌官方网站: http://www.aliph.com/ 品牌售后电话：010-82699821</dd></dl><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">G、森海塞尔耳机</h2><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，二年内质保。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.品牌官方网站: http://shop.sennheiser.com.cn/　 品牌售后电话：020-34812000</dd></dl><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">H、Beats耳机</h2><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，一年内质保。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.品牌官方网站:http://www.beatsbydre.com/ 品牌售后电话：010-67522485</dd></dl><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">I、AKG耳机</h2><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，二年内质保。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">J、马歇尔耳机</h2><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，一年内质保。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.品牌官方网站: http://www.marshallheadphones.com/ 品牌售后电话：021-58684988</dd></dl><a href=\"http://www.mi.com/service/shouhou#top\" class=\"returnTop\" style=\"color: rgb(255, 102, 0);\">返回顶部</a><h1 style=\"padding-top: 20px; padding-bottom: 20px; font-size: 14px;\"><a name=\"q19\" href=\"http://\">蓝牙音箱</a></h1><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">A、小米蓝牙音箱、小钢炮音乐座充、小米方盒子蓝牙音箱</h2><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，一年内质保。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；用户因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。</dd><dd>4.质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">B、飞利浦蓝牙音箱</h2><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，一年内质保。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd><dd>5.在质保期内且签收超过15日，请直接联系品牌商，以便更快捷获得售后服务。品牌售后电话：4008 800 008</dd></dl><a href=\"http://www.mi.com/service/shouhou#top\" class=\"returnTop\" style=\"color: rgb(255, 102, 0);\">返回顶部</a><h1 style=\"padding-top: 20px; padding-bottom: 20px; font-size: 14px;\"><a name=\"q66\" href=\"http://\">米兔玩偶</a></h1><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将发票快递一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><a href=\"http://www.mi.com/service/shouhou#top\" class=\"returnTop\" style=\"color: rgb(255, 102, 0);\">返回顶部</a><h1 style=\"padding-top: 20px; padding-bottom: 20px; font-size: 14px;\"><a name=\"q22\" href=\"http://\">小米T恤</a></h1><dl><dd>1.自签收之日起，在不影响二次销售的情况下(保证洗水标、吊牌完整，无穿着与水洗痕迹等)，小米承担七天退货，十五天换货。</dd><dd>2.退换凭证：用户提供相关订单号。，用户提供发货票或三包凭证，以及发货票底联或者发货票（底联.复印件等有效证据。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd><dd>5.服装类为特殊商品，暂不支持上门取货服务，给您带来的不便请谅解；</dd><dd>6.小米之家暂不办理自提和退换货业务，现阶段仅提供网上办理及电话办理两种方式；</dd></dl><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">属下列情形不实行三包。</h2><dl><dd>1、自行裁剪、修改、无法保持原样的商品，一律不予退换。</dd><dd>2、商品标上有洗涤、保养说明，而未按说明洗涤造成商品损伤的，不予退换。</dd><dd>3、消费者因穿着、保养不当（如雨天穿着或接触溶剂、碱、油等易腐蚀物.或人为破坏而导致衣服破损者。</dd><dd>4、已标明特价、拍卖“处理品”等外品。</dd><dd>5、无发票及消费凭证（购物明细单.。</dd><dd>6、超出“三包”期限和自行修理或拆动的</dd><dd>7、在质保期外。</dd></dl><a href=\"http://www.mi.com/service/shouhou#top\" class=\"returnTop\" style=\"color: rgb(255, 102, 0);\">返回顶部</a><h1 style=\"padding-top: 20px; padding-bottom: 20px; font-size: 14px;\"><a name=\"q24\" href=\"http://\">生活周边</a></h1><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">A、Phone飞车、点点看遥控视频车</h2><dl><dd>1.产品自签收后14日内保修。</dd><dd>2.以下情况不能申请售后服务：<ul><li>a. 未经授权的修理、改装、改动、碰撞、误用、进水、及不正确的使用所造成的问题。</li><li>b. 商品的外包装、附件、说明书不完整；发票缺失或涂改。</li><li>c. 产品已使用（产品自身质量问题除外.。</li><li>d. 其他不符合售后流程的情况。</li></ul></dd><dd>3.产品自身质量问题范围：<ul><li>a. 汽车不正常工作且不存在电量低、电池松动或接触点未连好、电池没电、电子部件损坏、开关键处于关的情况。</li><li>b. 电池不能充电且不存在电池连接点接触不好的情况。</li><li>c. 玩用时间短且不存在电池能量低、能量耗尽的情况。</li><li>d. 低速度且不存在电池没电、玩用的地面不平的情况。</li><li>e. wifi链接失败且不存在电量不足、超出遥控范围的情况。</li></ul></dd><dd>4.小米之家暂不办理自提和退换货业务，现阶段仅提供网上办理及电话办理两种方式</dd></dl><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">B、Brinno TLC200（缩时拍.、HDMI便携式投影仪</h2><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，一年内质保。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程</dd></dl><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">C、帆布鞋</h2><dl><dd>1.自签收之日起，在不影响二次销售的情况下(保证吊牌完整，无穿着与磨损等)，小米承担七天退货，十五天换货，两个月内质保。</dd><dd>2.退换凭证：用户提供发货票或三包凭证，以及发货票底联或者发货票（底联.复印件等有效证据。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；用户因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。</dd><dd>4.质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd><dd>5.鞋类为特殊商品，暂不支持上门取货服务，给您带来的不便请谅解；</dd><dd>6.小米之家暂不办理自提和退换货业务，现阶段仅提供网上办理及电话办理两种方式；</dd><dd>包换：&nbsp;<br/>A. 未穿过之新鞋因以下质量问题，予以包换。&nbsp;<br/>左右脚不配双, 鞋头大小不一致，鞋面沾胶或赃污，做工脱线， 缝线歪斜，开胶。 B、售出两个月内出现以下问题之鞋子，予以包换。<ul><li>1. 正常穿着鞋面有严重退色者（面料全部通过国家检验标准.。</li><li>2. 正常穿着而鞋面断裂。</li><li>3. 正常穿着而鞋底断裂。</li></ul>属下列情形不实行三包。<ul><li>1、自行裁剪、修改、无法保持原样的商品，一律不予退换。</li><li>2、商品标上有洗涤、保养说明，而未按说明洗涤造成商品损伤的，不予退换。</li><li>3、消费者因穿着、保养不当（如雨天穿着或接触溶剂、碱、油等易腐蚀物.或人为破坏而导致鞋子破损者。</li><li>4、已标明特价、拍卖“处理品”等外品。</li><li>5、无发票及消费凭证（购物明细单.。</li><li>6、超出“三包”期限和自行修理或拆动的</li><li>7、在质保期外。</li></ul></dd></dl><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">D、收纳袋：</h2><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程</dd></dl><a href=\"http://www.mi.com/service/shouhou#top\" class=\"returnTop\" style=\"color: rgb(255, 102, 0);\">返回顶部</a><h1 style=\"padding-top: 20px; padding-bottom: 20px; font-size: 14px;\"><a name=\"q27\" href=\"http://\">存储卡</a></h1><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，五年内质保。</dd><dd>2.退换凭证：用户提供发票或三包凭证，以及发票底联或者发票（底联.复印件等有效证据。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；用户因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。</dd><dd>5.品牌官方网站:&nbsp;<br/>东芝官网：http://www.toshiba.com.cn/&nbsp;<br/>东芝售后服务电话：400-699-9925&nbsp;<br/>闪迪官网：http://www.sandisk.cn/&nbsp;<br/>闪迪售后服务电话：400-670-6071</dd></dl><a href=\"http://www.mi.com/service/shouhou#top\" class=\"returnTop\" style=\"color: rgb(255, 102, 0);\">返回顶部</a><h1 style=\"padding-top: 20px; padding-bottom: 20px; font-size: 14px;\"><a name=\"q66\" href=\"http://\">读卡器</a></h1><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，一年内质保。</dd><dd>2.退换凭证：用户提供发票或三包凭证，以及发票底联或者发票（底联.复印件等有效证据。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；用户因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。</dd><dd>4.质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><a href=\"http://www.mi.com/service/shouhou#top\" class=\"returnTop\" style=\"color: rgb(255, 102, 0);\">返回顶部</a><h1 style=\"padding-top: 20px; padding-bottom: 20px; font-size: 14px;\"><a name=\"q67\" href=\"http://\">路由器</a></h1><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><a href=\"http://www.mi.com/service/shouhou#top\" class=\"returnTop\" style=\"color: rgb(255, 102, 0);\">返回顶部</a><h1 style=\"padding-top: 20px; padding-bottom: 20px; font-size: 14px;\"><a name=\"q23\" href=\"http://\">背包</a></h1><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">A、小米背包</h2><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><h2 style=\"padding-top: 15px; padding-bottom: 15px; font-weight: normal;\">B、Wenger背包</h2><dl><dd>1.自签收之日起，7日内保修。</dd><dd>2.保修范围包含缝合不好、开裂等。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><a href=\"http://www.mi.com/service/shouhou#top\" class=\"returnTop\" style=\"color: rgb(255, 102, 0);\">返回顶部</a><h1 style=\"padding-top: 20px; padding-bottom: 20px; font-size: 14px;\"><a name=\"q25\" href=\"http://\">拉卡拉刷卡器</a></h1><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，一年内质保。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd></dl><a href=\"http://www.mi.com/service/shouhou#top\" class=\"returnTop\" style=\"color: rgb(255, 102, 0);\">返回顶部</a><h1 style=\"padding-top: 20px; padding-bottom: 20px; font-size: 14px;\"><a name=\"q13\" href=\"http://\">品牌移动电源</a></h1><dl><dd>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货，一年内质保（质保范围：客户在正常使用条件下由于产品自身原因导致的无法充放电,鼓胀,漏液等不良情况给予质保处理.。</dd><dd>2.退换凭证：用户提供相关订单号。</dd><dd>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</dd><dd>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</dd><dd>5.在质保期内且签收超过15日，请直接联系品牌商，以便更快捷获得售后服务。</dd><dd>6.品牌售后电话：4000-836-400</dd></dl><a href=\"http://www.mi.com/service/shouhou#top\" class=\"returnTop\" style=\"color: rgb(255, 102, 0);\">返回顶部</a></div><p><br/></p>', 'Uploads/2015-06-09/5576d66bd324b.jpg', '|Uploads/2015-06-09/5576d64e719d5.jpg|Uploads/2015-06-09/5576d65da92ec.jpg|Uploads/2015-06-09/5576d66bd324b.jpg', '39.00', '100.00', '1433851508', '9999', '', '', '', '0', '0', '0', '0', '', '34', '9');
INSERT INTO `ts_goods` VALUES ('10', '小米手机4', '不锈钢金属边框、 5英寸屏超窄边，工艺和手感超乎想象', '', '', '5', '<h1 style=\"font-weight: normal; font-size: 70px; color: rgb(0, 0, 0); font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif; text-align: center; white-space: normal;\">小米手机4</h1><h3 style=\"font-weight: normal; font-size: 20px; font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif; text-align: center; white-space: normal;\">不锈钢金属边框、 5英寸屏超窄边，工艺和手感超乎想象</h3><div class=\"price\" style=\"font-size: 20px; color: rgb(255, 74, 0); padding-top: 13px; font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif; text-align: center; white-space: normal;\">2GB版 特价1499元</div><p><br/></p>', 'Uploads/2015-06-09/5576debade34e.jpg', '|Uploads/2015-06-09/5576debade34e.jpg', '1499.00', '1499.00', '1433853630', '1499', '', '', '', '0', '0', '0', '0', '', '14', '9');

-- ----------------------------
-- Table structure for `ts_goods_attr`
-- ----------------------------
DROP TABLE IF EXISTS `ts_goods_attr`;
CREATE TABLE `ts_goods_attr` (
  `goods_id` int(10) unsigned NOT NULL COMMENT '商品id',
  `attribute_id` int(11) NOT NULL DEFAULT '0' COMMENT '属性id',
  `attr_value` varchar(1024) NOT NULL DEFAULT '' COMMENT '属性值',
  `attr_price` varchar(255) NOT NULL DEFAULT '0' COMMENT '属性价格',
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增编号',
  PRIMARY KEY (`id`),
  KEY `fk_table1_ts_goods1_idx` (`goods_id`),
  KEY `fk_goods_attr_ts_attribute1_idx` (`attribute_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_goods_attr
-- ----------------------------
INSERT INTO `ts_goods_attr` VALUES ('9', '1', '黑色', '', '21');
INSERT INTO `ts_goods_attr` VALUES ('10', '7', '白色', '', '22');
INSERT INTO `ts_goods_attr` VALUES ('10', '8', '移动4G', '', '23');
INSERT INTO `ts_goods_attr` VALUES ('10', '9', '2G', '', '24');

-- ----------------------------
-- Table structure for `ts_message`
-- ----------------------------
DROP TABLE IF EXISTS `ts_message`;
CREATE TABLE `ts_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增编号',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '姓名',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '邮箱',
  `content` varchar(10000) NOT NULL DEFAULT '' COMMENT '信息内容',
  `article_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章id',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `reply` varchar(10000) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_message
-- ----------------------------
INSERT INTO `ts_message` VALUES ('1', '雪狼骑兵', '630892807@qq.com', '哈哈哈哈哈哈', '0', '1432346234', '0', '');
INSERT INTO `ts_message` VALUES ('3', '迅雷', '630892807@qq.com', '不知道', '0', '1432346516', '0', '');
INSERT INTO `ts_message` VALUES ('4', '你好', '630892807@qq.com', '你我都是神火', '2', '1432346617', '0', '');
INSERT INTO `ts_message` VALUES ('5', '雪狼骑兵', '630892807@qq.com', '你这个太高深了', '1', '1432349507', '0', '');
INSERT INTO `ts_message` VALUES ('6', '雪狼骑兵', '630892807@qq.com', '牛逼的人不需要解释', '3', '1432352140', '0', '牛逼的人不需要解释牛逼的人不需要解释牛逼的人不需要解释牛逼的人不需要解释牛逼的人不需要解释牛逼的人不需要解释牛逼的人不需要解释牛逼的人不需要解释牛逼的人不需要解释');

-- ----------------------------
-- Table structure for `ts_order`
-- ----------------------------
DROP TABLE IF EXISTS `ts_order`;
CREATE TABLE `ts_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增编号',
  `order_sn` varchar(255) NOT NULL DEFAULT '' COMMENT '订单编号',
  `payment` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '支付方式',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '订单状态',
  `info` text COMMENT '备注信息',
  `fee` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '应付款',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户编号',
  `address_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '地址编号',
  `addtime` int(10) unsigned DEFAULT '0' COMMENT '下单时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_order
-- ----------------------------
INSERT INTO `ts_order` VALUES ('1', 'TS2015531175240555', '1', '99', '请尽快发货', '99.50', '1', '1', '0');

-- ----------------------------
-- Table structure for `ts_order_goods`
-- ----------------------------
DROP TABLE IF EXISTS `ts_order_goods`;
CREATE TABLE `ts_order_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增编号',
  `order_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单id',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品编号',
  `num` smallint(5) unsigned NOT NULL DEFAULT '1' COMMENT '购买数量',
  `goods_attribute_id` varchar(255) NOT NULL DEFAULT '' COMMENT '属性id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_order_goods
-- ----------------------------
INSERT INTO `ts_order_goods` VALUES ('1', '1', '7', '1', '19|20');
INSERT INTO `ts_order_goods` VALUES ('2', '1', '8', '1', '15');

-- ----------------------------
-- Table structure for `ts_setting`
-- ----------------------------
DROP TABLE IF EXISTS `ts_setting`;
CREATE TABLE `ts_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增编号',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '设置项key',
  `value` varchar(9999) NOT NULL DEFAULT '' COMMENT '设置项value',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_setting
-- ----------------------------
INSERT INTO `ts_setting` VALUES ('1', 'webname', 'webname5');
INSERT INTO `ts_setting` VALUES ('2', 'keywords', 'keywords');
INSERT INTO `ts_setting` VALUES ('3', 'description', 'description');
INSERT INTO `ts_setting` VALUES ('4', 'copyright', 'copyright');

-- ----------------------------
-- Table structure for `ts_type`
-- ----------------------------
DROP TABLE IF EXISTS `ts_type`;
CREATE TABLE `ts_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '类型编号',
  `name` varchar(125) NOT NULL DEFAULT '' COMMENT '类型名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_type
-- ----------------------------
INSERT INTO `ts_type` VALUES ('4', '书本');
INSERT INTO `ts_type` VALUES ('3', '衣服');
INSERT INTO `ts_type` VALUES ('5', '手机');

-- ----------------------------
-- Table structure for `ts_user_address`
-- ----------------------------
DROP TABLE IF EXISTS `ts_user_address`;
CREATE TABLE `ts_user_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增编号',
  `address` varchar(1024) NOT NULL DEFAULT '' COMMENT '详细地址',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '收货人',
  `tel` varchar(50) NOT NULL DEFAULT '' COMMENT '联系电话',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_user_address
-- ----------------------------
INSERT INTO `ts_user_address` VALUES ('1', '山东济南历城区甸柳庄', '陶士涵', '18805419506', '1');
