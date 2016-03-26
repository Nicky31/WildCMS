/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : ancestra_other

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2012-07-29 14:18:52
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) CHARACTER SET latin1 NOT NULL,
  `text` text NOT NULL,
  `auteur` varchar(255) CHARACTER SET latin1 NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('52', 'WildCMS v0.2', 'Changelog=>\r\n\r\n- Mise en place du dossier errors dans le répertoire views contenant toutes les vues des erreurs fréquentes\r\n\r\n- Delete + Ajout + Edit news OK \r\n   => News terminées, manque que les commentaires\r\n\r\n- Page Mon compte OK \r\n   => Affichage ndc , pseudo, email , question , pts. Possibilité de modifier ndc / pseudo / email / question / mdp avec validation auto HTML5 sur les forms\r\n\r\n- Inscription OK\r\n\r\n- Nous rejoindre OK  ', 'Nicky', '2012-07-25');
INSERT INTO `news` VALUES ('51', 'WildCMS v0.1', '  Changelog:\r\n\r\n- Intégration du design by CELTHIUM\r\n- Codage de la librairie layout pour intégrer le template (merci le SdZ :p)\r\n- Codage d\'une classe mère des models MY_Model pour intégrer les fonctions de base (select / delete / count / update / insert) (merci le SdZ :p)\r\n- Affichage des news OK\r\n- Connection + déconnection OK ( Utilisation des sessions de CodeIgniter, avec stockage sur table ci_sessions )', 'Nicky', '2012-07-25');
INSERT INTO `news` VALUES ('53', 'WildCms v0.3', ' \r\n			- Page Infos OK  [Affiche texte introductif configurable, type serveur, rates, nbre comptes / persos, neutres/anges/demons/serianes avec pourcentage / perso, nbre classes avec % sur persos]\r\n\r\n- Ajout d\'une condition autour de la fonction view de la lib layout pour être sûr qu\'elle ne soit appellée qu\'une fois (éviter double page). Utiliser views pour appeller plusieurs vues.\r\n\r\n- Page admin Gestion des comptes OK [Affiche liste comptes avec liens pour obtenir  + d\'infos sur les comptes, recherche de comptes avec ndc  / account / IP , nettoyage des comptes jamais connectés & inactifs depuis X date]\r\n  	   \r\n- Page staff OK, delete staff OK, bug sur l\'ajout d\'un staff à régler\r\n\r\n- Classement persos / guildes / voteurs OK', 'Nicky', '2012-07-25');
