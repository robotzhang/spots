/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : spots

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2012-09-23 17:22:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `handbooks`
-- ----------------------------
DROP TABLE IF EXISTS `handbooks`;
CREATE TABLE `handbooks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` int(11) NOT NULL COMMENT '手册唯一id',
  `rand_id` int(11) DEFAULT NULL COMMENT '手册随机id',
  `is_used` char(1) DEFAULT 'N' COMMENT '是否已被激活(默认未被激活)',
  `user_id` int(11) DEFAULT NULL COMMENT '激活用户id',
  `created_at` datetime DEFAULT NULL COMMENT '添加时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='手册';

-- ----------------------------
-- Records of handbooks
-- ----------------------------

-- ----------------------------
-- Table structure for `spots`
-- ----------------------------
DROP TABLE IF EXISTS `spots`;
CREATE TABLE `spots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '景点名称',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='景点/景区表';

-- ----------------------------
-- Records of spots
-- ----------------------------

-- ----------------------------
-- Table structure for `tickets`
-- ----------------------------
DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '所属用户id',
  `spot_id` int(11) NOT NULL COMMENT '票所属景点id',
  `handbook_id` int(11) DEFAULT NULL COMMENT '使用的是哪个手册id',
  `created_at` datetime DEFAULT NULL COMMENT '购买时间',
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户购买打折门票信息';

-- ----------------------------
-- Records of tickets
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(13) NOT NULL COMMENT '手机号码',
  `drive` varchar(255) DEFAULT NULL COMMENT '驾驶证号',
  `password` varchar(255) NOT NULL COMMENT '登陆密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of users
-- ----------------------------
