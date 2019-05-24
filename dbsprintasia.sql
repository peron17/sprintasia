/*
 Navicat Premium Data Transfer

 Source Server         : LOKAL - ROOT
 Source Server Type    : MySQL
 Source Server Version : 50714
 Source Host           : localhost:3306
 Source Schema         : dbsprintasia

 Target Server Type    : MySQL
 Target Server Version : 50714
 File Encoding         : 65001

 Date: 25/05/2019 04:14:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for m_brand
-- ----------------------------
DROP TABLE IF EXISTS `m_brand`;
CREATE TABLE `m_brand`  (
  `code` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`code`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_brand
-- ----------------------------
INSERT INTO `m_brand` VALUES ('TOYOTA', 'Toyota');
INSERT INTO `m_brand` VALUES ('HONDA', 'Honda');
INSERT INTO `m_brand` VALUES ('SUZUKI', 'Suzuki');

-- ----------------------------
-- Table structure for m_brand_type
-- ----------------------------
DROP TABLE IF EXISTS `m_brand_type`;
CREATE TABLE `m_brand_type`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_brand_type
-- ----------------------------
INSERT INTO `m_brand_type` VALUES (1, 'TOYOTA', 'Avanza');
INSERT INTO `m_brand_type` VALUES (2, 'HONDA', 'Mobilio');
INSERT INTO `m_brand_type` VALUES (3, 'SUZUKI', 'Ertiga');
INSERT INTO `m_brand_type` VALUES (5, 'HONDA', 'Jazz');

-- ----------------------------
-- Table structure for m_chassis
-- ----------------------------
DROP TABLE IF EXISTS `m_chassis`;
CREATE TABLE `m_chassis`  (
  `chassis_number` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `police_number` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `type` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`chassis_number`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_chassis
-- ----------------------------
INSERT INTO `m_chassis` VALUES ('1234567890', 'B 1234 ABC', 1, 2010);
INSERT INTO `m_chassis` VALUES ('1234567891', 'B 1235 ABC', 2, 2011);
INSERT INTO `m_chassis` VALUES ('1234567892', 'B 1236 ABC', 1, 2011);
INSERT INTO `m_chassis` VALUES ('1234567893', 'B 1237 ABC', 2, 2012);
INSERT INTO `m_chassis` VALUES ('1234567894', 'B 1238 ABC', 5, 2014);

-- ----------------------------
-- Table structure for s_user
-- ----------------------------
DROP TABLE IF EXISTS `s_user`;
CREATE TABLE `s_user`  (
  `username` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `full_name` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `access_token` varchar(140) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` datetime(0) DEFAULT NULL,
  PRIMARY KEY (`username`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of s_user
-- ----------------------------
INSERT INTO `s_user` VALUES ('admin', '$2y$10$Vwr9sTOzCRZJSPFmk4UigebN3CZTe2V2Xop/hL17WMSMGc1ljRxTO', 'Admin Jaya', NULL, 'Y', '2019-05-22 23:21:47');

SET FOREIGN_KEY_CHECKS = 1;
