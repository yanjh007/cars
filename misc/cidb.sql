/*
 Navicat Premium Data Transfer

 Source Server         : localdb
 Source Server Type    : MySQL
 Source Server Version : 50620
 Source Host           : localhost
 Source Database       : cidb

 Target Server Type    : MySQL
 Target Server Version : 50620
 File Encoding         : utf-8

 Date: 08/13/2014 17:04:03 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `cars`
-- ----------------------------
DROP TABLE IF EXISTS `cars`;
CREATE TABLE `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) DEFAULT NULL,
  `model` varchar(20) DEFAULT NULL,
  `brand` varchar(20) DEFAULT NULL,
  `desc` varchar(128) DEFAULT NULL,
  `manufacturer` varchar(20) DEFAULT NULL,
  `manudate` varchar(10) DEFAULT NULL,
  `mileage` int(11) DEFAULT NULL COMMENT '里程数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `ci_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `ci_sessions`
-- ----------------------------
BEGIN;
INSERT INTO `ci_sessions` VALUES ('384f5f9ad78e930e94708edea74bfb66', '127.0.0.1', 'VisualJSON/1.6.0 CFNetwork/708.1 Darwin/14.0.0 (x86_64)', '1407918783', ''), ('6f2b4581f49c9fa1cf022096993352f3', '127.0.0.1', 'VisualJSON/1.6.0 CFNetwork/708.1 Darwin/14.0.0 (x86_64)', '1407917802', ''), ('838b75b224d1c40e06d85d8860c5b4f8', '192.168.0.131', 'VisualJSON/1.6.0 CFNetwork/708.1 Darwin/14.0.0 (x86_64)', '1407917854', ''), ('bd44796f79a2b7fa09c0c1865aea2dd1', '192.168.0.131', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10) AppleWebKit/600.1.3 (KHTML, like Gecko) Version/8.0 Safari/600.1.3', '1407918731', ''), ('cdd77c2ddf01d042949becd3e6401618', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10) AppleWebKit/600.1.3 (KHTML, like Gecko) Version/8.0 Safari/600.1.3', '1407918663', '');
COMMIT;

-- ----------------------------
--  Table structure for `clients`
-- ----------------------------
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctype` tinyint(4) DEFAULT NULL COMMENT '客户类型',
  `login` varchar(20) DEFAULT NULL,
  `passwd` varchar(100) DEFAULT NULL,
  `deviceid` varchar(20) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `contact` varchar(128) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `wechat` varchar(20) DEFAULT NULL COMMENT '微信号/QQ/微博',
  `desc` varchar(255) DEFAULT NULL,
  `level` tinyint(4) DEFAULT '0' COMMENT '客户级别',
  `edit_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `clients`
-- ----------------------------
BEGIN;
INSERT INTO `clients` VALUES ('1', null, 'shixc', 'a5b09e5b217127812c3f0e778dd1098404ce1fd4', null, '施磊', null, null, '18602802121', 'X_shileixc', null, '1', '2014-08-13 11:03:01'), ('2', null, 'yanjh', null, null, '颜建华', null, null, '13808077242', 'X_hahar006', null, '0', null);
COMMIT;

-- ----------------------------
--  Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `shops`
-- ----------------------------
DROP TABLE IF EXISTS `shops`;
CREATE TABLE `shops` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `code` varchar(8) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `geoaddress` varchar(100) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `desc` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `shops`
-- ----------------------------
BEGIN;
INSERT INTO `shops` VALUES ('1', 'CDS001', '天府新区旗舰店', '天府软件园', '104.073938889,30.55955278\nN30.55955278,', '028-86000998', null);
COMMIT;

-- ----------------------------
--  Table structure for `tasktypes`
-- ----------------------------
DROP TABLE IF EXISTS `tasktypes`;
CREATE TABLE `tasktypes` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `desc` varchar(200) DEFAULT NULL,
  `duration1` tinyint(4) DEFAULT '0' COMMENT '按日期计算的任务间隔',
  `duration2` smallint(6) DEFAULT '0' COMMENT '按里程计算的任务间隔',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tasktypes`
-- ----------------------------
BEGIN;
INSERT INTO `tasktypes` VALUES ('1', 'W001', '洗车-小型', null, '15', '0'), ('2', 'W002', '洗车-中大型', null, '30', '0'), ('3', 'T101', '更换发动机油滤', null, '60', '6000'), ('4', 'T201', '更换轮胎', null, '127', '32767'), ('5', 'C001', '常规检查', null, '0', '0'), ('6', 'C002', '高级检查', null, '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `login` varchar(16) NOT NULL,
  `name` varchar(16) DEFAULT NULL,
  `passwd` varchar(100) DEFAULT NULL,
  `desc` varchar(256) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'yanjh', '颜建华', '8db1b26f628cddbccb4df5f4530bf853fdca99ea', null, '100'), ('2', 'admin', '管理员', 'f342a7cf3fb38d37dc8a2f6d34f6957569195948', null, '100'), ('3', 'shixc', '施磊', '7e8b8c0eaa636c59c029f5b9b5e1543f6f4117e6', null, '0');
COMMIT;

-- ----------------------------
--  Table structure for `zm_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `zm_sessions`;
CREATE TABLE `zm_sessions` (
  `session_type` tinyint(4) DEFAULT '0' COMMENT 'session类型，用于不同的系统和应用',
  `session_id` varchar(56) NOT NULL COMMENT 'sha1(时间)+ip(aaaaaaaa)',
  `client_id` varchar(20) DEFAULT NULL,
  `stime` datetime DEFAULT NULL,
  `device_id` varchar(20) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
