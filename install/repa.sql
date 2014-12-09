/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : repa

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2014-12-10 00:45:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for activations
-- ----------------------------
DROP TABLE IF EXISTS `activations`;
CREATE TABLE `activations` (
  `code` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of activations
-- ----------------------------
INSERT INTO `activations` VALUES ('3080b109c9d626b7edeee8a60fd46463', 'n.gilko@gmail.com');

-- ----------------------------
-- Table structure for invites
-- ----------------------------
DROP TABLE IF EXISTS `invites`;
CREATE TABLE `invites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of invites
-- ----------------------------

-- ----------------------------
-- Table structure for messages
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `value` text NOT NULL,
  `messageType` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of messages
-- ----------------------------

-- ----------------------------
-- Table structure for pages
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL,
  `title` text,
  `description` text,
  `maintance` tinyint(1) NOT NULL DEFAULT '0',
  `pagetype` varchar(64) DEFAULT NULL,
  `data` text,
  `inMenu` tinyint(1) NOT NULL DEFAULT '0',
  `mainCategory` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES ('1', 'terms-and-licenses', 'Правила сайта', null, '0', 'page', 'Правила пользования сайтом repa.in.ua', '0', null);
INSERT INTO `pages` VALUES ('2', 'about', 'О сайте', null, '0', 'page', 'О сайте', '1', null);
INSERT INTO `pages` VALUES ('3', 'contacts', 'Контакты', null, '0', 'page', 'Контакты', '0', null);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` text,
  `surname` text,
  `phone` text,
  `avatar` text,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('5', 'BoBRoID', '4e4929eedfb1e7569e41e202656af358f745cecafc0ae0b8e307db1735190406650e9a4c4dd80a5921e52396e97d05f2c2119f0daffdf023799b8523d453ca33', 'n.gilko@gmail.com', 'Николай', 'Гилко', '+380939829014', null, '1');
