/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : ancestra_other

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2012-07-29 18:06:41
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `guess_book`
-- ----------------------------
DROP TABLE IF EXISTS `guess_book`;
CREATE TABLE `guess_book` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `pseudo` varchar(255) CHARACTER SET latin1 NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of guess_book
-- ----------------------------
INSERT INTO `guess_book` VALUES ('23', 'premier commentaire du livre d\'or', 'Nicky31', '0000-00-00');
INSERT INTO `guess_book` VALUES ('24', 'Deuxieme coms', 'Nivky31', '0000-00-00');
INSERT INTO `guess_book` VALUES ('25', 'troisieme coms', 'Psuedo', '0000-00-00');
