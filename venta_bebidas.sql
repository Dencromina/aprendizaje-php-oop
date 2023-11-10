/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : venta_bebidas

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 09/11/2023 19:16:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for barra
-- ----------------------------
DROP TABLE IF EXISTS `barra`;
CREATE TABLE `barra`  (
  `id` int(11) NOT NULL,
  `idevento` int(255) NULL DEFAULT NULL,
  `horario_apertura` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `horario_cierre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk01`(`idevento`) USING BTREE,
  CONSTRAINT `fk01` FOREIGN KEY (`idevento`) REFERENCES `evento` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of barra
-- ----------------------------
INSERT INTO `barra` VALUES (1, 1, '21:00', '03:00');

-- ----------------------------
-- Table structure for bebida
-- ----------------------------
DROP TABLE IF EXISTS `bebida`;
CREATE TABLE `bebida`  (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tipo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cantidad` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `usado` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `vendido` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `precio` decimal(65, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `precio`(`precio`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bebida
-- ----------------------------
INSERT INTO `bebida` VALUES (1, 'Cerveza', 'Lata', '240', '10', '10', 600);

-- ----------------------------
-- Table structure for evento
-- ----------------------------
DROP TABLE IF EXISTS `evento`;
CREATE TABLE `evento`  (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `horario_inicio` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `horario_finalizacion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of evento
-- ----------------------------
INSERT INTO `evento` VALUES (1, 'recital', '21:00', '05:00', '2020-10-23');

-- ----------------------------
-- Table structure for metodo_pago
-- ----------------------------
DROP TABLE IF EXISTS `metodo_pago`;
CREATE TABLE `metodo_pago`  (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tipo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of metodo_pago
-- ----------------------------
INSERT INTO `metodo_pago` VALUES (1, 'efectivo', 'efectivo');
INSERT INTO `metodo_pago` VALUES (2, 'mercadopago', 'transferencia');
INSERT INTO `metodo_pago` VALUES (3, 'efectivo_mercadopago', 'mixto');

-- ----------------------------
-- Table structure for venta
-- ----------------------------
DROP TABLE IF EXISTS `venta`;
CREATE TABLE `venta`  (
  `idventa` int(11) NOT NULL,
  `idbarra` int(255) NULL DEFAULT NULL,
  `idevento` int(255) NULL DEFAULT NULL,
  `idbebida` int(255) NULL DEFAULT NULL,
  `cantidad` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `precio` decimal(65, 0) NULL DEFAULT NULL,
  `idmetodo_pago` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`idventa`) USING BTREE,
  INDEX `fk02`(`idbarra`) USING BTREE,
  INDEX `fk03`(`idevento`) USING BTREE,
  INDEX `fk04`(`idbebida`) USING BTREE,
  INDEX `fk05`(`idmetodo_pago`) USING BTREE,
  INDEX `fk06`(`precio`) USING BTREE,
  CONSTRAINT `fk02` FOREIGN KEY (`idbarra`) REFERENCES `barra` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk03` FOREIGN KEY (`idevento`) REFERENCES `evento` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk04` FOREIGN KEY (`idbebida`) REFERENCES `bebida` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk05` FOREIGN KEY (`idmetodo_pago`) REFERENCES `metodo_pago` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk06` FOREIGN KEY (`precio`) REFERENCES `bebida` (`precio`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of venta
-- ----------------------------
INSERT INTO `venta` VALUES (1, 1, 1, 1, '10', 600, 1);

SET FOREIGN_KEY_CHECKS = 1;
