SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `thinkshop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `thinkshop` ;

-- -----------------------------------------------------
-- Table `thinkshop`.`ts_category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `thinkshop`.`ts_category` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自增编号',
  `name` VARCHAR(200) NOT NULL DEFAULT '' COMMENT '分类名称',
  `parent_id` INT NOT NULL DEFAULT 0 COMMENT '父级分类',
  `sort` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thinkshop`.`ts_brand`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `thinkshop`.`ts_brand` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '品牌名称',
  `logo` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '品牌logo',
  `sort` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '品牌排序',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thinkshop`.`ts_goods`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `thinkshop`.`ts_goods` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自增编号',
  `name` VARCHAR(50) NOT NULL DEFAULT '' COMMENT '商品名称',
  `goods_ad` VARCHAR(125) NOT NULL DEFAULT '' COMMENT '商品广告语',
  `goods_no` VARCHAR(20) NOT NULL DEFAULT '' COMMENT '商品编号',
  `pro_no` VARCHAR(20) NOT NULL DEFAULT '' COMMENT '商品货号',
  `type_id` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '类型编号',
  `content` TEXT NOT NULL DEFAULT '' COMMENT '详细内容',
  `img` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '默认图片',
  `imgs` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '产品相册',
  `sell_price` FLOAT(10,2) NOT NULL DEFAULT 0.00 COMMENT '商城价',
  `market_price` FLOAT(10,2) NOT NULL DEFAULT 0.00 COMMENT '市场价',
  `create_time` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '上架时间',
  `store_nums` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '库存',
  `seo_title` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '页面标题',
  `seo_keywords` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '页面关键字',
  `seo_description` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '页面描述',
  `weight` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '商品重量',
  `visit` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '点击数',
  `sort` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序',
  `is_online` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否下架',
  `sale_protection` TEXT NOT NULL DEFAULT '' COMMENT '售后保障',
  `category_id` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '分类编号',
  `brand_id` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '品牌编号',
  PRIMARY KEY (`id`),
  INDEX `fk_ts_goods_ts_category_idx` (`category_id` ASC),
  INDEX `fk_ts_goods_ts_brand1_idx` (`brand_id` ASC),
  CONSTRAINT `fk_ts_goods_ts_category`
    FOREIGN KEY (`category_id`)
    REFERENCES `thinkshop`.`ts_category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ts_goods_ts_brand1`
    FOREIGN KEY (`brand_id`)
    REFERENCES `thinkshop`.`ts_brand` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thinkshop`.`ts_type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `thinkshop`.`ts_type` (
  `id` INT UNSIGNED NOT NULL COMMENT '类型编号',
  `type_name` VARCHAR(125) NOT NULL DEFAULT '' COMMENT '类型名称',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thinkshop`.`ts_attribute`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `thinkshop`.`ts_attribute` (
  `id` INT NOT NULL,
  `name` VARCHAR(125) NOT NULL DEFAULT '' COMMENT '属性名称',
  `type` VARCHAR(125) NOT NULL DEFAULT '',
  `input_type` VARCHAR(45) NOT NULL DEFAULT '',
  `value` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '属性值',
  `type_id` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '类型id',
  PRIMARY KEY (`id`),
  INDEX `fk_ts_attribute_ts_type1_idx` (`type_id` ASC),
  CONSTRAINT `fk_ts_attribute_ts_type1`
    FOREIGN KEY (`type_id`)
    REFERENCES `thinkshop`.`ts_type` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thinkshop`.`goods_attr`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `thinkshop`.`goods_attr` (
  `goods_id` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '商品id',
  `attribute_id` INT NOT NULL DEFAULT 0 COMMENT '属性id',
  INDEX `fk_table1_ts_goods1_idx` (`goods_id` ASC),
  INDEX `fk_goods_attr_ts_attribute1_idx` (`attribute_id` ASC),
  CONSTRAINT `fk_table1_ts_goods1`
    FOREIGN KEY (`goods_id`)
    REFERENCES `thinkshop`.`ts_goods` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_goods_attr_ts_attribute1`
    FOREIGN KEY (`attribute_id`)
    REFERENCES `thinkshop`.`ts_attribute` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
