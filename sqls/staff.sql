/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : ancestra_other

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2012-07-29 14:18:38
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `staff`
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(40) CHARACTER SET latin1 NOT NULL,
  `rôle` varchar(255) NOT NULL,
  `contact` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of staff
-- ----------------------------
INSERT INTO `staff` VALUES ('1', 'Nicky31', 'Développeur .png', 'Skype: dulismo31');
INSERT INTO `staff` VALUES ('15', 'Yvan Dupain', 'Cuisto du staff', 'Restos du coeur');
