/*
Navicat MySQL Data Transfer

Source Server         : taoshihan
Source Server Version : 50150
Source Host           : localhost:3306
Source Database       : thinkshop

Target Server Type    : MYSQL
Target Server Version : 50150
File Encoding         : 65001

Date: 2015-05-20 22:50:07
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_article
-- ----------------------------
INSERT INTO `ts_article` VALUES ('1', '关于奇点，我用感觉描绘过它', '<p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑, Tahoma, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 23px; white-space: normal;\">关于奇点，我用感觉描绘过它，那是从一个被无限压缩的单元向四周拉伸，形成一个球体。在这里除了最基本的三维构造，还有以实体的形式存在的时间。因此，你从任意一个点，向任何一个方向出发，最终都可以回到那个点。星际穿越，仿佛就是梦的轮回。平行世界里没有他们，全是我们。</span></p>', './Uploads/2015-05-17/55584d0be191f.jpg', '11', '0', '12');
INSERT INTO `ts_article` VALUES ('2', '生活中遇到许多似曾相识的过客', '<p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑, Tahoma, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 23px; white-space: normal;\">生活中遇到许多似曾相识的过客，让你怦然心动，深觉这么近，却又那么远。就像是一束暖阳，你看到了，感觉到了，但却无法捕捉。而这些，往往在心底慢慢消散，直到下一个循环。</span></p>', '', '12', '1431843102', '0');
INSERT INTO `ts_article` VALUES ('3', '心愿未了有牵绊。生命不息，折腾未止。', '<p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑, Tahoma, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 23px; white-space: normal;\">心愿未了有牵绊。生命不息，折腾未止。</span></p>', './Uploads/2015-05-17/555851a91651b.jpg', '11', '1431851433', '0');
INSERT INTO `ts_article` VALUES ('4', '轻博客折腾不止', '<p>轻博客折腾不止</p>', './Uploads/2015-05-17/555852a16a37b.jpg', '11', '1431851499', '0');
INSERT INTO `ts_article` VALUES ('5', '不行了,不能再研究代码了,必须出去走走', '<p>不行了,不能再研究代码了,必须出去走走</p>', '', '11', '1431851562', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_articleclass
-- ----------------------------
INSERT INTO `ts_articleclass` VALUES ('12', '旅游分享', '0', '0');
INSERT INTO `ts_articleclass` VALUES ('11', '系统文章', '0', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_attribute
-- ----------------------------
INSERT INTO `ts_attribute` VALUES ('1', '颜色', '2', '1', '44', '3');
INSERT INTO `ts_attribute` VALUES ('2', '型号', '1', '0', '', '2');
INSERT INTO `ts_attribute` VALUES ('3', '尺寸', '1', '1', '一寸|二寸|三寸', '2');
INSERT INTO `ts_attribute` VALUES ('4', '售后保障', '0', '2', '', '2');

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
INSERT INTO `ts_brand` VALUES ('9', '小米', '', '2');
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_category
-- ----------------------------
INSERT INTO `ts_category` VALUES ('10', '精品图书', '0', '0');
INSERT INTO `ts_category` VALUES ('6', '数码产品', '0', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_goods
-- ----------------------------
INSERT INTO `ts_goods` VALUES ('3', '2', '', '', '', '0', '2', '', '', '0.00', '0.00', '1431741702', '0', '', '', '', '0', '0', '0', '0', '', '6', '2');
INSERT INTO `ts_goods` VALUES ('4', '3', '', '', '', '0', '3', '', '', '0.00', '0.00', '1431741786', '0', '', '', '', '0', '0', '0', '0', '', '6', '2');
INSERT INTO `ts_goods` VALUES ('5', '3', '', '', '', '0', '3', '', '', '0.00', '0.00', '1431741798', '0', '', '', '', '0', '0', '0', '0', '', '6', '2');
INSERT INTO `ts_goods` VALUES ('6', '3', '', '', '', '0', '3', '', '', '0.00', '0.00', '1431741842', '0', '', '', '', '0', '0', '0', '0', '', '6', '2');
INSERT INTO `ts_goods` VALUES ('7', '明朝那些事(精装本)', '明朝那些事(精装本)', '', '22', '2', '明朝那些事(精装本)<div><br/></div><div><img src=\"http://localhost/thinkshop/Uploads/2015-05-16/5556e4895d420.jpg\" _src=\"http://localhost/thinkshop/Uploads/2015-05-16/5556e4895d420.jpg\"/></div>', 'Uploads/2015-05-17/5557e79010a13.jpg', 'Uploads/2015-05-16/55574aa92603b.jpg|Uploads/|Uploads/2015-05-17/5557e684c9ef5.jpg|Uploads/2015-05-17/5557e6c624ca3.jpg|Uploads/2015-05-17/5557e79010a13.jpg', '20.00', '99.00', '1431824283', '0', '明朝那些事(精装本)', '明朝那些事(精装本)', '明朝那些事(精装本)', '23', '0', '0', '0', '', '10', '0');
INSERT INTO `ts_goods` VALUES ('8', '狼图腾(精装本)', '狼图腾(精装本)', '', '22', '2', '狼图腾(精装本)狼图腾(精装本)', '狼图腾(精装本)', '', '50.00', '100.00', '1431743701', '99', '狼图腾(精装本)', '狼图腾(精装本)', '狼图腾(精装本)', '22', '0', '0', '0', '', '10', '8');

-- ----------------------------
-- Table structure for `ts_goods_attr`
-- ----------------------------
DROP TABLE IF EXISTS `ts_goods_attr`;
CREATE TABLE `ts_goods_attr` (
  `goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `attribute_id` int(11) NOT NULL DEFAULT '0' COMMENT '属性id',
  `attr_value` varchar(1024) NOT NULL DEFAULT '' COMMENT '属性值',
  `attr_price` varchar(255) NOT NULL DEFAULT '' COMMENT '属性价格',
  KEY `fk_table1_ts_goods1_idx` (`goods_id`),
  KEY `fk_goods_attr_ts_attribute1_idx` (`attribute_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_goods_attr
-- ----------------------------
INSERT INTO `ts_goods_attr` VALUES ('8', '3', '二寸', '0');
INSERT INTO `ts_goods_attr` VALUES ('8', '2', '33', '0');
INSERT INTO `ts_goods_attr` VALUES ('7', '4', '7777', '');
INSERT INTO `ts_goods_attr` VALUES ('8', '4', '狼图腾(精装本)狼图腾(精装本)', '0');
INSERT INTO `ts_goods_attr` VALUES ('7', '3', '三寸', '');
INSERT INTO `ts_goods_attr` VALUES ('7', '2', '77', '');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_message
-- ----------------------------

-- ----------------------------
-- Table structure for `ts_type`
-- ----------------------------
DROP TABLE IF EXISTS `ts_type`;
CREATE TABLE `ts_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '类型编号',
  `name` varchar(125) NOT NULL DEFAULT '' COMMENT '类型名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_type
-- ----------------------------
INSERT INTO `ts_type` VALUES ('2', '手机');
INSERT INTO `ts_type` VALUES ('3', '衣服');
