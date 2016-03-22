/*
Navicat MySQL Data Transfer

Source Server         : Localserver
Source Server Version : 50710
Source Host           : localhost:3306
Source Database       : messages_db

Target Server Type    : MYSQL
Target Server Version : 50710
File Encoding         : 65001

Date: 2016-03-22 12:23:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for messages
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id auto increment',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of messages
-- ----------------------------
INSERT INTO `messages` VALUES ('2', 'vin@gmail.com', 'vin', '', 'VINAY', '9876543210', 'bangalore', '2016-03-22 11:25:41', '2016-03-22 11:25:41', '');
INSERT INTO `messages` VALUES ('5', 'ade@gmail.com', 'admin123', '', 'adel', '9876543210', 'agscvjvd', '2016-03-22 11:32:05', '2016-03-22 11:32:05', '');

-- ----------------------------
-- Table structure for relations
-- ----------------------------
DROP TABLE IF EXISTS `relations`;
CREATE TABLE `relations` (
  `rel_id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id auto increment',
  `name` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of relations
-- ----------------------------
INSERT INTO `relations` VALUES ('3', 'sssss', '2016-03-22 11:20:59', '2016-03-22 11:20:59');
INSERT INTO `relations` VALUES ('5', '11111', '2016-03-22 11:30:26', '2016-03-22 11:30:26');
