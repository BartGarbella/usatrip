/*
Navicat MariaDB Data Transfer

Source Server         : Localhost
Source Server Version : 100113
Source Host           : localhost:3306
Source Database       : usa_trip

Target Server Type    : MariaDB
Target Server Version : 100113
File Encoding         : 65001

Date: 2016-05-09 10:34:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for costs
-- ----------------------------
DROP TABLE IF EXISTS `costs`;
CREATE TABLE `costs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Sum` varchar(255) DEFAULT NULL,
  `Share` varchar(255) DEFAULT NULL,
  `PaidBy` varchar(255) DEFAULT NULL,
  `Balanced` varchar(255) DEFAULT NULL,
  `Currency` varchar(255) DEFAULT NULL,
  `Created` date DEFAULT NULL,
  `BalancedDate` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of costs
-- ----------------------------
INSERT INTO `costs` VALUES ('1', 'Flüge', '3631.70', '0.5/0.5', 'Bart', '1', 'EUR', '2016-05-09', '2016-04-15');
INSERT INTO `costs` VALUES ('2', 'Auto', '2458.67', '0.5/0.5', 'Bart', '1', 'EUR', '2016-05-09', '2016-04-15');
INSERT INTO `costs` VALUES ('3', 'Bellagio Hotel', '370.72', '0.5/0.5', 'Bart', '0', 'USD', '2016-05-09', null);
INSERT INTO `costs` VALUES ('4', 'GC Heli', '568.00', '0.5/0.5', 'Bart', '0', 'USD', '2016-05-09', null);

-- ----------------------------
-- View structure for balance
-- ----------------------------
DROP VIEW IF EXISTS `balance`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `balance` AS SELECT 
    SUM(IF(`Currency` LIKE 'USD',
        Round( ((Sum * `Share`) * 0.87), 2)    ,   Round((Sum * `Share`),2))    ) AS 'ToBalance'
FROM
    usa_trip.costs
WHERE
    Balanced != 1 ;
