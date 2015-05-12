/*
Navicat MySQL Data Transfer

Source Server         : taoshihan
Source Server Version : 50150
Source Host           : localhost:3306
Source Database       : thinkshop

Target Server Type    : MYSQL
Target Server Version : 50150
File Encoding         : 65001

Date: 2015-05-12 17:20:05
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
-- Table structure for `ts_attribute`
-- ----------------------------
DROP TABLE IF EXISTS `ts_attribute`;
CREATE TABLE `ts_attribute` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL DEFAULT '' COMMENT '属性名称',
  `type` varchar(125) NOT NULL DEFAULT '',
  `input_type` varchar(45) NOT NULL DEFAULT '',
  `value` varchar(255) NOT NULL DEFAULT '' COMMENT '属性值',
  `type_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '类型id',
  PRIMARY KEY (`id`),
  KEY `fk_ts_attribute_ts_type1_idx` (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_attribute
-- ----------------------------

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_brand
-- ----------------------------
INSERT INTO `ts_brand` VALUES ('7', '12', './Uploads/2015-05-12/555170fbd21bd.jpg', '12');
INSERT INTO `ts_brand` VALUES ('5', 'aa', '', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_category
-- ----------------------------
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
  `imgs` varchar(45) NOT NULL DEFAULT '' COMMENT '产品相册',
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_goods
-- ----------------------------

-- ----------------------------
-- Table structure for `ts_goods_attr`
-- ----------------------------
DROP TABLE IF EXISTS `ts_goods_attr`;
CREATE TABLE `ts_goods_attr` (
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品id',
  `attribute_id` int(11) NOT NULL DEFAULT '0' COMMENT '属性id',
  KEY `fk_table1_ts_goods1_idx` (`goods_id`),
  KEY `fk_goods_attr_ts_attribute1_idx` (`attribute_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_goods_attr
-- ----------------------------

-- ----------------------------
-- Table structure for `ts_type`
-- ----------------------------
DROP TABLE IF EXISTS `ts_type`;
CREATE TABLE `ts_type` (
  `id` int(10) unsigned NOT NULL COMMENT '类型编号',
  `type_name` varchar(125) NOT NULL DEFAULT '' COMMENT '类型名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ts_type
-- ----------------------------
