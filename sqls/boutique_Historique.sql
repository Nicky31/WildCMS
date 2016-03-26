/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : ancestra_other

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2012-08-18 16:12:11
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `boutique_historique`
-- ----------------------------
DROP TABLE IF EXISTS `boutique_historique`;
CREATE TABLE `boutique_historique` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `account` int(100) DEFAULT NULL,
  `perso` int(100) DEFAULT NULL,
  `action` int(100) DEFAULT NULL,
  `item` int(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of boutique_historique
-- ----------------------------
