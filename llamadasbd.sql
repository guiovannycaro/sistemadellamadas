/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : localhost:3306
 Source Schema         : llamadasbd

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 05/11/2021 16:26:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for guion
-- ----------------------------
DROP TABLE IF EXISTS `guion`;
CREATE TABLE `guion`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `observacion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of guion
-- ----------------------------
INSERT INTO `guion` VALUES (1, 'guion uno', 'este es el guion', 'assa ssaas sasas');
INSERT INTO `guion` VALUES (3, 'guion tres', 'este es un guion para las llamadas', 'ninguna');
INSERT INTO `guion` VALUES (4, 'guion dos', 'este es un guion para las llamadas Dos', 'ninguna Dos');

-- ----------------------------
-- Table structure for llamadasxusuarioxguion
-- ----------------------------
DROP TABLE IF EXISTS `llamadasxusuarioxguion`;
CREATE TABLE `llamadasxusuarioxguion`  (
  `iduentrante` int NULL DEFAULT NULL,
  `idusaliente` int NULL DEFAULT NULL,
  `idguion` int NULL DEFAULT NULL,
  `fechahora` date NULL DEFAULT NULL,
  `duracion` int NULL DEFAULT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_llamada_guion`(`idguion`) USING BTREE,
  INDEX `fk_llamadas_salientes`(`idusaliente`) USING BTREE,
  INDEX `fk_llamadas_entrante`(`iduentrante`) USING BTREE,
  INDEX `fk_llamada_registro`(`fechahora`) USING BTREE,
  CONSTRAINT `fk_llamada_guion` FOREIGN KEY (`idguion`) REFERENCES `guion` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_llamadas_entrante` FOREIGN KEY (`iduentrante`) REFERENCES `uentrantes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_llamadas_salientes` FOREIGN KEY (`idusaliente`) REFERENCES `usalientes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of llamadasxusuarioxguion
-- ----------------------------
INSERT INTO `llamadasxusuarioxguion` VALUES (1, 1, 1, '2021-11-11', 35, 1);
INSERT INTO `llamadasxusuarioxguion` VALUES (1, 9, 1, '2021-11-04', 40, 2);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `rol` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'administrador', 'administra el suistema');
INSERT INTO `roles` VALUES (2, 'empleado', 'rolempleado compañia');
INSERT INTO `roles` VALUES (3, 'cliente', 'cliente de las llamadas');

-- ----------------------------
-- Table structure for uentrantes
-- ----------------------------
DROP TABLE IF EXISTS `uentrantes`;
CREATE TABLE `uentrantes`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `apellidos` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `usuario` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `clave` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `idrol` int NULL DEFAULT NULL,
  `correo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_uentrantes_roles`(`idrol`) USING BTREE,
  CONSTRAINT `fk_uentrantes_roles` FOREIGN KEY (`idrol`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of uentrantes
-- ----------------------------
INSERT INTO `uentrantes` VALUES (1, 'juan', 'aguas', 'jaguas', '123', 2, 'jaguas@outlook.com');
INSERT INTO `uentrantes` VALUES (13, 'migel', '', 'mcanos', '123', 2, 'mcano@gmail.com');

-- ----------------------------
-- Table structure for usalientes
-- ----------------------------
DROP TABLE IF EXISTS `usalientes`;
CREATE TABLE `usalientes`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `apellidos` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `idrol` int NULL DEFAULT NULL,
  `correo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_salientes`(`idrol`) USING BTREE,
  CONSTRAINT `fk_salientes` FOREIGN KEY (`idrol`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of usalientes
-- ----------------------------
INSERT INTO `usalientes` VALUES (1, 'pepito', 'perez', 3, 'pperez@outlook.com');
INSERT INTO `usalientes` VALUES (9, 'luz', 'jimenez', 3, 'lemilia@outlook.com');

SET FOREIGN_KEY_CHECKS = 1;
