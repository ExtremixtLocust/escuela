/*
 Navicat Premium Data Transfer

 Source Server         : MariaDB
 Source Server Type    : MariaDB
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : escuela

 Target Server Type    : MariaDB
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 19/11/2022 19:23:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for administrativo
-- ----------------------------
DROP TABLE IF EXISTS `administrativo`;
CREATE TABLE `administrativo`  (
  `adm_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `adm_departamento_id` int(11) NOT NULL COMMENT 'Id departamento',
  `adm_nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Nombre',
  `adm_appaterno` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Apellido Paterno',
  `adm_apmaterno` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Apellido Materno',
  `adm_telefono` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Teléfono',
  `adm_direccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Dirección',
  `adm_rfc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'RFC',
  `adm_correo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Correo',
  PRIMARY KEY (`adm_id`) USING BTREE,
  INDEX `fk_administrativo_departamento_1`(`adm_departamento_id`) USING BTREE,
  CONSTRAINT `fk_administrativo_departamento_1` FOREIGN KEY (`adm_departamento_id`) REFERENCES `departamento` (`dep_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of administrativo
-- ----------------------------
INSERT INTO `administrativo` VALUES (1, 1, 'Lucila', 'Jauregui', 'Wade', '9966326598', 'Indeco', 'Wad136598', 'wade@gmail.com');
INSERT INTO `administrativo` VALUES (2, 1, 'Margarita', 'Martínez', 'Manzano', '9932548791', 'Altos hornos', 'Mzn986532', 'manzano@gmail.com');

-- ----------------------------
-- Table structure for alumno
-- ----------------------------
DROP TABLE IF EXISTS `alumno`;
CREATE TABLE `alumno`  (
  `alu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `alu_nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Nombre',
  `alu_appaterno` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Apellido Paterno',
  `alu_apmaterno` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Apellido Materno',
  `alu_reticula_id` int(11) NOT NULL COMMENT 'Retícula',
  `alu_nocontrol` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'No de control',
  `alu_semestre` int(11) NOT NULL COMMENT 'Semestre',
  PRIMARY KEY (`alu_id`) USING BTREE,
  INDEX `fk_alumno_reticula_1`(`alu_reticula_id`) USING BTREE,
  CONSTRAINT `fk_alumno_reticula_1` FOREIGN KEY (`alu_reticula_id`) REFERENCES `reticula` (`ret_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of alumno
-- ----------------------------
INSERT INTO `alumno` VALUES (1, 'Eusebio Angel', 'Sanchez', 'Rincon', 1, '18301276', 9);
INSERT INTO `alumno` VALUES (2, 'Juan Rafael', 'Figueroa', 'Dzul', 1, '18301222', 9);
INSERT INTO `alumno` VALUES (3, 'Bryan Alejandro', 'Zavala', 'García', 1, '18301280', 9);

-- ----------------------------
-- Table structure for aula
-- ----------------------------
DROP TABLE IF EXISTS `aula`;
CREATE TABLE `aula`  (
  `aul_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `aul_numero` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'No de aula',
  PRIMARY KEY (`aul_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of aula
-- ----------------------------
INSERT INTO `aula` VALUES (1, '1');

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment`  (
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`item_name`, `user_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_assignment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('Administrativo', 3, 1667766936);
INSERT INTO `auth_assignment` VALUES ('Alumno', 4, 1667247225);

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item`  (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `rule_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `data` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  `group_code` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE,
  INDEX `rule_name`(`rule_name`) USING BTREE,
  INDEX `idx-auth_item-type`(`type`) USING BTREE,
  INDEX `fk_auth_item_group_code`(`group_code`) USING BTREE,
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `auth_item_ibfk_2` FOREIGN KEY (`group_code`) REFERENCES `auth_item_group` (`code`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/administrativo/*', 3, NULL, NULL, NULL, 1667247427, 1667247427, NULL);
INSERT INTO `auth_item` VALUES ('/administrativo/create', 3, NULL, NULL, NULL, 1667247427, 1667247427, NULL);
INSERT INTO `auth_item` VALUES ('/administrativo/delete', 3, NULL, NULL, NULL, 1667247427, 1667247427, NULL);
INSERT INTO `auth_item` VALUES ('/administrativo/index', 3, NULL, NULL, NULL, 1667247427, 1667247427, NULL);
INSERT INTO `auth_item` VALUES ('/administrativo/update', 3, NULL, NULL, NULL, 1667247427, 1667247427, NULL);
INSERT INTO `auth_item` VALUES ('/administrativo/view', 3, NULL, NULL, NULL, 1667247427, 1667247427, NULL);
INSERT INTO `auth_item` VALUES ('/alumno/*', 3, NULL, NULL, NULL, 1667247427, 1667247427, NULL);
INSERT INTO `auth_item` VALUES ('/alumno/create', 3, NULL, NULL, NULL, 1667247427, 1667247427, NULL);
INSERT INTO `auth_item` VALUES ('/alumno/delete', 3, NULL, NULL, NULL, 1667247427, 1667247427, NULL);
INSERT INTO `auth_item` VALUES ('/alumno/index', 3, NULL, NULL, NULL, 1667247427, 1667247427, NULL);
INSERT INTO `auth_item` VALUES ('/alumno/update', 3, NULL, NULL, NULL, 1667247427, 1667247427, NULL);
INSERT INTO `auth_item` VALUES ('/alumno/view', 3, NULL, NULL, NULL, 1667247427, 1667247427, NULL);
INSERT INTO `auth_item` VALUES ('/aula/*', 3, NULL, NULL, NULL, 1667247427, 1667247427, NULL);
INSERT INTO `auth_item` VALUES ('/aula/create', 3, NULL, NULL, NULL, 1667247427, 1667247427, NULL);
INSERT INTO `auth_item` VALUES ('/aula/delete', 3, NULL, NULL, NULL, 1667247427, 1667247427, NULL);
INSERT INTO `auth_item` VALUES ('/aula/index', 3, NULL, NULL, NULL, 1667247427, 1667247427, NULL);
INSERT INTO `auth_item` VALUES ('/aula/update', 3, NULL, NULL, NULL, 1667247427, 1667247427, NULL);
INSERT INTO `auth_item` VALUES ('/aula/view', 3, NULL, NULL, NULL, 1667247427, 1667247427, NULL);
INSERT INTO `auth_item` VALUES ('/carga/*', 3, NULL, NULL, NULL, 1667247426, 1667247426, NULL);
INSERT INTO `auth_item` VALUES ('/carga/create', 3, NULL, NULL, NULL, 1667247427, 1667247427, NULL);
INSERT INTO `auth_item` VALUES ('/carga/delete', 3, NULL, NULL, NULL, 1667247427, 1667247427, NULL);
INSERT INTO `auth_item` VALUES ('/carga/index', 3, NULL, NULL, NULL, 1667247427, 1667247427, NULL);
INSERT INTO `auth_item` VALUES ('/carga/update', 3, NULL, NULL, NULL, 1667247427, 1667247427, NULL);
INSERT INTO `auth_item` VALUES ('/carga/view', 3, NULL, NULL, NULL, 1667247427, 1667247427, NULL);
INSERT INTO `auth_item` VALUES ('/curso/*', 3, NULL, NULL, NULL, 1667247426, 1667247426, NULL);
INSERT INTO `auth_item` VALUES ('/curso/create', 3, NULL, NULL, NULL, 1667247426, 1667247426, NULL);
INSERT INTO `auth_item` VALUES ('/curso/delete', 3, NULL, NULL, NULL, 1667247426, 1667247426, NULL);
INSERT INTO `auth_item` VALUES ('/curso/index', 3, NULL, NULL, NULL, 1667247426, 1667247426, NULL);
INSERT INTO `auth_item` VALUES ('/curso/update', 3, NULL, NULL, NULL, 1667247426, 1667247426, NULL);
INSERT INTO `auth_item` VALUES ('/curso/view', 3, NULL, NULL, NULL, 1667247426, 1667247426, NULL);
INSERT INTO `auth_item` VALUES ('/dashboard/*', 3, NULL, NULL, NULL, 1510367286, 1510367286, NULL);
INSERT INTO `auth_item` VALUES ('/dashboard/create', 3, NULL, NULL, NULL, 1510367286, 1510367286, NULL);
INSERT INTO `auth_item` VALUES ('/dashboard/delete', 3, NULL, NULL, NULL, 1510367286, 1510367286, NULL);
INSERT INTO `auth_item` VALUES ('/dashboard/index', 3, NULL, NULL, NULL, 1510367286, 1510367286, NULL);
INSERT INTO `auth_item` VALUES ('/dashboard/update', 3, NULL, NULL, NULL, 1510367286, 1510367286, NULL);
INSERT INTO `auth_item` VALUES ('/dashboard/view', 3, NULL, NULL, NULL, 1510367286, 1510367286, NULL);
INSERT INTO `auth_item` VALUES ('/debug/*', 3, NULL, NULL, NULL, 1510367286, 1510367286, NULL);
INSERT INTO `auth_item` VALUES ('/debug/default/*', 3, NULL, NULL, NULL, 1510367286, 1510367286, NULL);
INSERT INTO `auth_item` VALUES ('/debug/default/db-explain', 3, NULL, NULL, NULL, 1510367287, 1510367287, NULL);
INSERT INTO `auth_item` VALUES ('/debug/default/download-mail', 3, NULL, NULL, NULL, 1510367286, 1510367286, NULL);
INSERT INTO `auth_item` VALUES ('/debug/default/index', 3, NULL, NULL, NULL, 1510367287, 1510367287, NULL);
INSERT INTO `auth_item` VALUES ('/debug/default/toolbar', 3, NULL, NULL, NULL, 1510367287, 1510367287, NULL);
INSERT INTO `auth_item` VALUES ('/debug/default/view', 3, NULL, NULL, NULL, 1510367287, 1510367287, NULL);
INSERT INTO `auth_item` VALUES ('/debug/user/*', 3, NULL, NULL, NULL, 1510367286, 1510367286, NULL);
INSERT INTO `auth_item` VALUES ('/debug/user/reset-identity', 3, NULL, NULL, NULL, 1510367286, 1510367286, NULL);
INSERT INTO `auth_item` VALUES ('/debug/user/set-identity', 3, NULL, NULL, NULL, 1510367286, 1510367286, NULL);
INSERT INTO `auth_item` VALUES ('/departamento/*', 3, NULL, NULL, NULL, 1667247426, 1667247426, NULL);
INSERT INTO `auth_item` VALUES ('/departamento/create', 3, NULL, NULL, NULL, 1667247426, 1667247426, NULL);
INSERT INTO `auth_item` VALUES ('/departamento/delete', 3, NULL, NULL, NULL, 1667247426, 1667247426, NULL);
INSERT INTO `auth_item` VALUES ('/departamento/index', 3, NULL, NULL, NULL, 1667247426, 1667247426, NULL);
INSERT INTO `auth_item` VALUES ('/departamento/update', 3, NULL, NULL, NULL, 1667247426, 1667247426, NULL);
INSERT INTO `auth_item` VALUES ('/departamento/view', 3, NULL, NULL, NULL, 1667247426, 1667247426, NULL);
INSERT INTO `auth_item` VALUES ('/gii/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/gii/default/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/gii/default/action', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/gii/default/diff', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/gii/default/index', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/gii/default/preview', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/gii/default/view', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/grupo/*', 3, NULL, NULL, NULL, 1667247426, 1667247426, NULL);
INSERT INTO `auth_item` VALUES ('/grupo/create', 3, NULL, NULL, NULL, 1667247426, 1667247426, NULL);
INSERT INTO `auth_item` VALUES ('/grupo/delete', 3, NULL, NULL, NULL, 1667247426, 1667247426, NULL);
INSERT INTO `auth_item` VALUES ('/grupo/index', 3, NULL, NULL, NULL, 1667247426, 1667247426, NULL);
INSERT INTO `auth_item` VALUES ('/grupo/update', 3, NULL, NULL, NULL, 1667247426, 1667247426, NULL);
INSERT INTO `auth_item` VALUES ('/grupo/view', 3, NULL, NULL, NULL, 1667247426, 1667247426, NULL);
INSERT INTO `auth_item` VALUES ('/inventario/*', 3, NULL, NULL, NULL, 1667247426, 1667247426, NULL);
INSERT INTO `auth_item` VALUES ('/inventario/create', 3, NULL, NULL, NULL, 1667247426, 1667247426, NULL);
INSERT INTO `auth_item` VALUES ('/inventario/delete', 3, NULL, NULL, NULL, 1667247426, 1667247426, NULL);
INSERT INTO `auth_item` VALUES ('/inventario/index', 3, NULL, NULL, NULL, 1667247426, 1667247426, NULL);
INSERT INTO `auth_item` VALUES ('/inventario/update', 3, NULL, NULL, NULL, 1667247426, 1667247426, NULL);
INSERT INTO `auth_item` VALUES ('/inventario/view', 3, NULL, NULL, NULL, 1667247426, 1667247426, NULL);
INSERT INTO `auth_item` VALUES ('/maestro/*', 3, NULL, NULL, NULL, 1667247425, 1667247425, NULL);
INSERT INTO `auth_item` VALUES ('/maestro/create', 3, NULL, NULL, NULL, 1667247425, 1667247425, NULL);
INSERT INTO `auth_item` VALUES ('/maestro/delete', 3, NULL, NULL, NULL, 1667247425, 1667247425, NULL);
INSERT INTO `auth_item` VALUES ('/maestro/index', 3, NULL, NULL, NULL, 1667247425, 1667247425, NULL);
INSERT INTO `auth_item` VALUES ('/maestro/update', 3, NULL, NULL, NULL, 1667247425, 1667247425, NULL);
INSERT INTO `auth_item` VALUES ('/maestro/view', 3, NULL, NULL, NULL, 1667247425, 1667247425, NULL);
INSERT INTO `auth_item` VALUES ('/materia/*', 3, NULL, NULL, NULL, 1667247425, 1667247425, NULL);
INSERT INTO `auth_item` VALUES ('/materia/create', 3, NULL, NULL, NULL, 1667247425, 1667247425, NULL);
INSERT INTO `auth_item` VALUES ('/materia/delete', 3, NULL, NULL, NULL, 1667247425, 1667247425, NULL);
INSERT INTO `auth_item` VALUES ('/materia/index', 3, NULL, NULL, NULL, 1667247425, 1667247425, NULL);
INSERT INTO `auth_item` VALUES ('/materia/update', 3, NULL, NULL, NULL, 1667247425, 1667247425, NULL);
INSERT INTO `auth_item` VALUES ('/materia/view', 3, NULL, NULL, NULL, 1667247425, 1667247425, NULL);
INSERT INTO `auth_item` VALUES ('/proveedor/*', 3, NULL, NULL, NULL, 1667247424, 1667247424, NULL);
INSERT INTO `auth_item` VALUES ('/proveedor/create', 3, NULL, NULL, NULL, 1667247425, 1667247425, NULL);
INSERT INTO `auth_item` VALUES ('/proveedor/delete', 3, NULL, NULL, NULL, 1667247425, 1667247425, NULL);
INSERT INTO `auth_item` VALUES ('/proveedor/index', 3, NULL, NULL, NULL, 1667247425, 1667247425, NULL);
INSERT INTO `auth_item` VALUES ('/proveedor/update', 3, NULL, NULL, NULL, 1667247425, 1667247425, NULL);
INSERT INTO `auth_item` VALUES ('/proveedor/view', 3, NULL, NULL, NULL, 1667247425, 1667247425, NULL);
INSERT INTO `auth_item` VALUES ('/reticula/*', 3, NULL, NULL, NULL, 1667247424, 1667247424, NULL);
INSERT INTO `auth_item` VALUES ('/reticula/create', 3, NULL, NULL, NULL, 1667247424, 1667247424, NULL);
INSERT INTO `auth_item` VALUES ('/reticula/delete', 3, NULL, NULL, NULL, 1667247424, 1667247424, NULL);
INSERT INTO `auth_item` VALUES ('/reticula/index', 3, NULL, NULL, NULL, 1667247424, 1667247424, NULL);
INSERT INTO `auth_item` VALUES ('/reticula/update', 3, NULL, NULL, NULL, 1667247424, 1667247424, NULL);
INSERT INTO `auth_item` VALUES ('/reticula/view', 3, NULL, NULL, NULL, 1667247424, 1667247424, NULL);
INSERT INTO `auth_item` VALUES ('/site/*', 3, NULL, NULL, NULL, 1510367286, 1510367286, NULL);
INSERT INTO `auth_item` VALUES ('/site/about', 3, NULL, NULL, NULL, 1510367286, 1510367286, NULL);
INSERT INTO `auth_item` VALUES ('/site/captcha', 3, NULL, NULL, NULL, 1510367286, 1510367286, NULL);
INSERT INTO `auth_item` VALUES ('/site/contact', 3, NULL, NULL, NULL, 1510367286, 1510367286, NULL);
INSERT INTO `auth_item` VALUES ('/site/error', 3, NULL, NULL, NULL, 1510367286, 1510367286, NULL);
INSERT INTO `auth_item` VALUES ('/site/index', 3, NULL, NULL, NULL, 1510367286, 1510367286, NULL);
INSERT INTO `auth_item` VALUES ('/site/language', 3, NULL, NULL, NULL, 1667247424, 1667247424, NULL);
INSERT INTO `auth_item` VALUES ('/site/login', 3, NULL, NULL, NULL, 1510367286, 1510367286, NULL);
INSERT INTO `auth_item` VALUES ('/site/logout', 3, NULL, NULL, NULL, 1510367286, 1510367286, NULL);
INSERT INTO `auth_item` VALUES ('/site/reporte', 3, NULL, NULL, NULL, 1667247424, 1667247424, NULL);
INSERT INTO `auth_item` VALUES ('/site/reporte2', 3, NULL, NULL, NULL, 1667247424, 1667247424, NULL);
INSERT INTO `auth_item` VALUES ('/trabajador/*', 3, NULL, NULL, NULL, 1667247424, 1667247424, NULL);
INSERT INTO `auth_item` VALUES ('/trabajador/create', 3, NULL, NULL, NULL, 1667247424, 1667247424, NULL);
INSERT INTO `auth_item` VALUES ('/trabajador/delete', 3, NULL, NULL, NULL, 1667247424, 1667247424, NULL);
INSERT INTO `auth_item` VALUES ('/trabajador/index', 3, NULL, NULL, NULL, 1667247424, 1667247424, NULL);
INSERT INTO `auth_item` VALUES ('/trabajador/update', 3, NULL, NULL, NULL, 1667247424, 1667247424, NULL);
INSERT INTO `auth_item` VALUES ('/trabajador/view', 3, NULL, NULL, NULL, 1667247424, 1667247424, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth-item-group/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth-item-group/bulk-activate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth-item-group/bulk-deactivate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth-item-group/bulk-delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth-item-group/create', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth-item-group/delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth-item-group/grid-page-size', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth-item-group/grid-sort', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth-item-group/index', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth-item-group/toggle-attribute', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth-item-group/update', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth-item-group/view', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth/captcha', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth/change-own-password', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth/confirm-email', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth/confirm-email-receive', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth/confirm-registration-email', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth/login', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth/logout', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth/password-recovery', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth/password-recovery-receive', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth/registration', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/bulk-activate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/bulk-deactivate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/bulk-delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/create', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/grid-page-size', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/grid-sort', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/index', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/refresh-routes', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/set-child-permissions', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/set-child-routes', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/toggle-attribute', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/update', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/view', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/bulk-activate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/bulk-deactivate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/bulk-delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/create', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/grid-page-size', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/grid-sort', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/index', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/set-child-permissions', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/set-child-roles', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/toggle-attribute', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/update', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/view', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-permission/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-permission/set', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-permission/set-roles', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-visit-log/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-visit-log/bulk-activate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-visit-log/bulk-deactivate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-visit-log/bulk-delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-visit-log/create', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-visit-log/delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-visit-log/grid-page-size', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-visit-log/grid-sort', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-visit-log/index', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-visit-log/toggle-attribute', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-visit-log/update', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-visit-log/view', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/bulk-activate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/bulk-deactivate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/bulk-delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/change-password', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/create', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/grid-page-size', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/grid-sort', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/index', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/toggle-attribute', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/update', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/view', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('Admin', 1, 'Admin', NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('Administrativo', 1, 'Administrativo', NULL, NULL, 1667766904, 1667766904, NULL);
INSERT INTO `auth_item` VALUES ('Alumno', 1, 'Alumno', NULL, NULL, 1666806991, 1666806991, NULL);
INSERT INTO `auth_item` VALUES ('assignRolesToUsers', 2, 'Assign roles to users', NULL, NULL, 1426062189, 1426062189, 'userManagement');
INSERT INTO `auth_item` VALUES ('bindUserToIp', 2, 'Bind user to IP', NULL, NULL, 1426062189, 1426062189, 'userManagement');
INSERT INTO `auth_item` VALUES ('changeOwnPassword', 2, 'Change own password', NULL, NULL, 1426062189, 1426062189, 'userCommonPermissions');
INSERT INTO `auth_item` VALUES ('changeUserPassword', 2, 'Change user password', NULL, NULL, 1426062189, 1426062189, 'userManagement');
INSERT INTO `auth_item` VALUES ('commonPermission', 2, 'Common permission', NULL, NULL, 1426062188, 1426062188, NULL);
INSERT INTO `auth_item` VALUES ('createUsers', 2, 'Create users', NULL, NULL, 1426062189, 1426062189, 'userManagement');
INSERT INTO `auth_item` VALUES ('deleteUsers', 2, 'Delete users', NULL, NULL, 1426062189, 1426062189, 'userManagement');
INSERT INTO `auth_item` VALUES ('editUserEmail', 2, 'Edit user email', NULL, NULL, 1426062189, 1426062189, 'userManagement');
INSERT INTO `auth_item` VALUES ('editUsers', 2, 'Edit users', NULL, NULL, 1426062189, 1426062189, 'userManagement');
INSERT INTO `auth_item` VALUES ('PermisodeAdministrativo', 2, 'Permiso de Administrativo', NULL, NULL, 1667766745, 1667766745, 'GrupodeEscuela');
INSERT INTO `auth_item` VALUES ('PermisodeAlumno', 2, 'Permiso de Alumno', NULL, NULL, 1667247414, 1667247414, 'GrupodeEscuela');
INSERT INTO `auth_item` VALUES ('viewRegistrationIp', 2, 'View registration IP', NULL, NULL, 1426062189, 1426062189, 'userManagement');
INSERT INTO `auth_item` VALUES ('viewUserEmail', 2, 'View user email', NULL, NULL, 1426062189, 1426062189, 'userManagement');
INSERT INTO `auth_item` VALUES ('viewUserRoles', 2, 'View user roles', NULL, NULL, 1426062189, 1426062189, 'userManagement');
INSERT INTO `auth_item` VALUES ('viewUsers', 2, 'View users', NULL, NULL, 1426062189, 1426062189, 'userManagement');
INSERT INTO `auth_item` VALUES ('viewVisitLog', 2, 'View visit log', NULL, NULL, 1426062189, 1426062189, 'userManagement');

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child`  (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`parent`, `child`) USING BTREE,
  INDEX `child`(`child`) USING BTREE,
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('Admin', 'assignRolesToUsers');
INSERT INTO `auth_item_child` VALUES ('Admin', 'changeOwnPassword');
INSERT INTO `auth_item_child` VALUES ('Admin', 'changeUserPassword');
INSERT INTO `auth_item_child` VALUES ('Admin', 'createUsers');
INSERT INTO `auth_item_child` VALUES ('Admin', 'deleteUsers');
INSERT INTO `auth_item_child` VALUES ('Admin', 'editUsers');
INSERT INTO `auth_item_child` VALUES ('Admin', 'viewUsers');
INSERT INTO `auth_item_child` VALUES ('Administrativo', 'PermisodeAdministrativo');
INSERT INTO `auth_item_child` VALUES ('Alumno', 'changeOwnPassword');
INSERT INTO `auth_item_child` VALUES ('Alumno', 'PermisodeAlumno');
INSERT INTO `auth_item_child` VALUES ('assignRolesToUsers', '/user-management/user-permission/set');
INSERT INTO `auth_item_child` VALUES ('assignRolesToUsers', '/user-management/user-permission/set-roles');
INSERT INTO `auth_item_child` VALUES ('assignRolesToUsers', 'viewUserRoles');
INSERT INTO `auth_item_child` VALUES ('assignRolesToUsers', 'viewUsers');
INSERT INTO `auth_item_child` VALUES ('changeOwnPassword', '/user-management/auth/change-own-password');
INSERT INTO `auth_item_child` VALUES ('changeUserPassword', '/user-management/user/change-password');
INSERT INTO `auth_item_child` VALUES ('changeUserPassword', 'viewUsers');
INSERT INTO `auth_item_child` VALUES ('createUsers', '/user-management/user/create');
INSERT INTO `auth_item_child` VALUES ('createUsers', 'viewUsers');
INSERT INTO `auth_item_child` VALUES ('deleteUsers', '/user-management/user/bulk-delete');
INSERT INTO `auth_item_child` VALUES ('deleteUsers', '/user-management/user/delete');
INSERT INTO `auth_item_child` VALUES ('deleteUsers', 'viewUsers');
INSERT INTO `auth_item_child` VALUES ('editUserEmail', 'viewUserEmail');
INSERT INTO `auth_item_child` VALUES ('editUsers', '/user-management/user/bulk-activate');
INSERT INTO `auth_item_child` VALUES ('editUsers', '/user-management/user/bulk-deactivate');
INSERT INTO `auth_item_child` VALUES ('editUsers', '/user-management/user/update');
INSERT INTO `auth_item_child` VALUES ('editUsers', 'viewUsers');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/alumno/create');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/alumno/index');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/alumno/update');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/alumno/view');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/grupo/create');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/grupo/delete');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/grupo/index');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/grupo/update');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/grupo/view');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/maestro/create');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/maestro/delete');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/maestro/index');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/maestro/update');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/maestro/view');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/materia/create');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/materia/delete');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/materia/index');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/materia/update');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/materia/view');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/proveedor/create');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/proveedor/delete');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/proveedor/index');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/proveedor/update');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/proveedor/view');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/site/about');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/site/captcha');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/site/contact');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/site/error');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/site/index');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/trabajador/create');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/trabajador/delete');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/trabajador/index');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/trabajador/update');
INSERT INTO `auth_item_child` VALUES ('PermisodeAdministrativo', '/trabajador/view');
INSERT INTO `auth_item_child` VALUES ('PermisodeAlumno', '/carga/index');
INSERT INTO `auth_item_child` VALUES ('PermisodeAlumno', '/maestro/index');
INSERT INTO `auth_item_child` VALUES ('PermisodeAlumno', '/materia/index');
INSERT INTO `auth_item_child` VALUES ('PermisodeAlumno', '/materia/view');
INSERT INTO `auth_item_child` VALUES ('PermisodeAlumno', '/reticula/index');
INSERT INTO `auth_item_child` VALUES ('PermisodeAlumno', '/reticula/view');
INSERT INTO `auth_item_child` VALUES ('PermisodeAlumno', '/site/about');
INSERT INTO `auth_item_child` VALUES ('PermisodeAlumno', '/site/captcha');
INSERT INTO `auth_item_child` VALUES ('PermisodeAlumno', '/site/contact');
INSERT INTO `auth_item_child` VALUES ('PermisodeAlumno', '/site/error');
INSERT INTO `auth_item_child` VALUES ('PermisodeAlumno', '/site/index');
INSERT INTO `auth_item_child` VALUES ('PermisodeAlumno', '/site/language');
INSERT INTO `auth_item_child` VALUES ('viewUsers', '/user-management/user/grid-page-size');
INSERT INTO `auth_item_child` VALUES ('viewUsers', '/user-management/user/index');
INSERT INTO `auth_item_child` VALUES ('viewUsers', '/user-management/user/view');
INSERT INTO `auth_item_child` VALUES ('viewVisitLog', '/user-management/user-visit-log/grid-page-size');
INSERT INTO `auth_item_child` VALUES ('viewVisitLog', '/user-management/user-visit-log/index');
INSERT INTO `auth_item_child` VALUES ('viewVisitLog', '/user-management/user-visit-log/view');

-- ----------------------------
-- Table structure for auth_item_group
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_group`;
CREATE TABLE `auth_item_group`  (
  `code` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`code`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_item_group
-- ----------------------------
INSERT INTO `auth_item_group` VALUES ('GrupodeEscuela', 'Grupo de Escuela', 1667247380, 1667247380);
INSERT INTO `auth_item_group` VALUES ('userCommonPermissions', 'User common permission', 1426062189, 1426062189);
INSERT INTO `auth_item_group` VALUES ('userManagement', 'User management', 1426062189, 1426062189);

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule`  (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `data` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for carga
-- ----------------------------
DROP TABLE IF EXISTS `carga`;
CREATE TABLE `carga`  (
  `car_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `car_reticula_id` int(11) NOT NULL COMMENT 'Id retícula',
  `car_materia_id` int(11) NOT NULL COMMENT 'Id materia',
  PRIMARY KEY (`car_id`) USING BTREE,
  INDEX `fk_carga_reticula_1`(`car_reticula_id`) USING BTREE,
  INDEX `fk_carga_materia_1`(`car_materia_id`) USING BTREE,
  CONSTRAINT `fk_carga_materia_1` FOREIGN KEY (`car_materia_id`) REFERENCES `materia` (`mat_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_carga_reticula_1` FOREIGN KEY (`car_reticula_id`) REFERENCES `reticula` (`ret_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of carga
-- ----------------------------
INSERT INTO `carga` VALUES (1, 1, 1);
INSERT INTO `carga` VALUES (2, 6, 2);
INSERT INTO `carga` VALUES (3, 1, 2);

-- ----------------------------
-- Table structure for curso
-- ----------------------------
DROP TABLE IF EXISTS `curso`;
CREATE TABLE `curso`  (
  `cur_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `cur_alumno_id` int(11) NOT NULL COMMENT 'Id alumno',
  `cur_grupo_id` int(11) NOT NULL COMMENT 'Id carrera',
  PRIMARY KEY (`cur_id`) USING BTREE,
  INDEX `fk_curso_alumno_1`(`cur_alumno_id`) USING BTREE,
  INDEX `fk_curso_grupo_1`(`cur_grupo_id`) USING BTREE,
  CONSTRAINT `fk_curso_alumno_1` FOREIGN KEY (`cur_alumno_id`) REFERENCES `alumno` (`alu_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_curso_grupo_1` FOREIGN KEY (`cur_grupo_id`) REFERENCES `grupo` (`gru_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of curso
-- ----------------------------
INSERT INTO `curso` VALUES (1, 1, 1);

-- ----------------------------
-- Table structure for dashboard
-- ----------------------------
DROP TABLE IF EXISTS `dashboard`;
CREATE TABLE `dashboard`  (
  `dash_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `dash_titulo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Título',
  `dash_img` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Imagen',
  `dash_descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Descripción',
  `dash_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Url',
  `dash_estatus` tinyint(1) NOT NULL COMMENT 'Estatus',
  `dash_roles` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Roles',
  `dash_orden` int(2) NOT NULL COMMENT 'Orden',
  PRIMARY KEY (`dash_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dashboard
-- ----------------------------
INSERT INTO `dashboard` VALUES (1, 'Alumnos', 'alumnos', 'Acceder al menú de los alumnos', '/alumno/index', 1, 'Administrativo', 1);
INSERT INTO `dashboard` VALUES (2, 'Maestros', 'maestros', 'Acceder al menú de los maestros', '/maestro/index', 1, 'Administrativo,Alumno', 2);
INSERT INTO `dashboard` VALUES (3, 'Administrativos', 'administrativos', 'Acceder al menú del personal Administrativo', '/administrativo/index', 1, 'Administrativo', 3);
INSERT INTO `dashboard` VALUES (4, 'Retículas', 'reticulas', 'Acceder al menú de las retículas', '/reticula/index', 1, 'Administrativo,Alumno', 4);
INSERT INTO `dashboard` VALUES (5, 'Departamentos', 'departamentos', 'Acceder al menú de los departamentos', '/departamento/index', 1, 'Administrativo', 5);
INSERT INTO `dashboard` VALUES (6, 'Trabajador', 'trabajadores', 'Acceder al menú de los trabajadores', '/trabajador/index', 1, 'Administrativo', 6);
INSERT INTO `dashboard` VALUES (7, 'Inventario', 'inventario', 'Acceder al menú del inventario', '/inventario/index', 1, 'Administrativo', 7);
INSERT INTO `dashboard` VALUES (8, 'Proveedores', 'proveedores', 'Acceder al menú de los proveedores', '/proveedor/index', 1, 'Administrativo', 8);
INSERT INTO `dashboard` VALUES (9, 'Materia', 'materias', 'Acceder al menú de las materias', '/materia/index', 1, 'Administrativo,Alumno', 9);
INSERT INTO `dashboard` VALUES (11, 'Dashboard', 'dashboard', 'Administrar dashboard', '/dashboard/index', 1, 'Admin', 10);

-- ----------------------------
-- Table structure for departamento
-- ----------------------------
DROP TABLE IF EXISTS `departamento`;
CREATE TABLE `departamento`  (
  `dep_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `dep_proveedor_id` int(11) NOT NULL COMMENT 'Id proveedor',
  `dep_nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Nombre del departamento',
  PRIMARY KEY (`dep_id`) USING BTREE,
  INDEX `fk_departamento_proveedor_1`(`dep_proveedor_id`) USING BTREE,
  CONSTRAINT `fk_departamento_proveedor_1` FOREIGN KEY (`dep_proveedor_id`) REFERENCES `proveedor` (`pro_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of departamento
-- ----------------------------
INSERT INTO `departamento` VALUES (1, 1, 'Centro de cómputo');
INSERT INTO `departamento` VALUES (2, 1, 'Económico');

-- ----------------------------
-- Table structure for grupo
-- ----------------------------
DROP TABLE IF EXISTS `grupo`;
CREATE TABLE `grupo`  (
  `gru_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `gru_materia_id` int(11) NOT NULL COMMENT 'Id materia',
  `gru_maestro_id` int(11) NOT NULL COMMENT 'Id maestro',
  `gru_aula_id` int(11) NOT NULL COMMENT 'Id aula',
  PRIMARY KEY (`gru_id`) USING BTREE,
  INDEX `fk_grupo_aula_1`(`gru_aula_id`) USING BTREE,
  INDEX `fk_grupo_maestro_1`(`gru_maestro_id`) USING BTREE,
  INDEX `fk_grupo_materia_1`(`gru_materia_id`) USING BTREE,
  CONSTRAINT `fk_grupo_aula_1` FOREIGN KEY (`gru_aula_id`) REFERENCES `aula` (`aul_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_grupo_maestro_1` FOREIGN KEY (`gru_maestro_id`) REFERENCES `maestro` (`mae_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_grupo_materia_1` FOREIGN KEY (`gru_materia_id`) REFERENCES `materia` (`mat_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of grupo
-- ----------------------------

-- ----------------------------
-- Table structure for inventario
-- ----------------------------
DROP TABLE IF EXISTS `inventario`;
CREATE TABLE `inventario`  (
  `inv_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `inv_nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Nombre del artículo',
  `inv_clave` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Clave',
  PRIMARY KEY (`inv_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of inventario
-- ----------------------------
INSERT INTO `inventario` VALUES (1, 'Silla', 'SillaCCN1');

-- ----------------------------
-- Table structure for maestro
-- ----------------------------
DROP TABLE IF EXISTS `maestro`;
CREATE TABLE `maestro`  (
  `mae_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `mae_departamento_id` int(11) NOT NULL COMMENT 'Id departamento',
  `mae_nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Nombre',
  `mae_appaterno` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Apellido Paterno',
  `mae_apmaterno` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Apellido Materno',
  `mae_rfc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'RFC',
  `mae_telefono` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Teléfono',
  `mae_direccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Direccion',
  `mae_correo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Correo',
  PRIMARY KEY (`mae_id`) USING BTREE,
  INDEX `fk_maestro_departamento_1`(`mae_departamento_id`) USING BTREE,
  CONSTRAINT `fk_maestro_departamento_1` FOREIGN KEY (`mae_departamento_id`) REFERENCES `departamento` (`dep_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of maestro
-- ----------------------------
INSERT INTO `maestro` VALUES (1, 1, 'Alberto', 'Chablé', 'Rodríguez', 'Cha112233', '9933226597', 'Industrial Indeco', 'chablé@gmail.com');
INSERT INTO `maestro` VALUES (2, 1, 'Jose Angel', 'Magaña', 'Lopez', 'Mag121265', '9966536598', 'Altos hornos', 'magaña@gmail.com');
INSERT INTO `maestro` VALUES (3, 1, 'Jorge', 'Cein', 'Villanueva', 'Cei1265988', '9932665987', 'ITVH', 'cein@gmail.com');
INSERT INTO `maestro` VALUES (4, 1, 'Maria', 'Antonieta', 'De las Nieves', 'MAD1956523', '993659861', 'Indeco villahermosa', 'delasnieves@gmail.com');

-- ----------------------------
-- Table structure for materia
-- ----------------------------
DROP TABLE IF EXISTS `materia`;
CREATE TABLE `materia`  (
  `mat_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `mat_nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Nombre',
  PRIMARY KEY (`mat_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of materia
-- ----------------------------
INSERT INTO `materia` VALUES (1, 'Cálculo Diferencial');
INSERT INTO `materia` VALUES (2, 'Cálculo Integral');
INSERT INTO `materia` VALUES (3, 'Diseño de Interfáces de usuario');
INSERT INTO `materia` VALUES (5, 'Taller de investigación II');
INSERT INTO `materia` VALUES (6, 'Materia Eusebio');

-- ----------------------------
-- Table structure for proveedor
-- ----------------------------
DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor`  (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `pro_nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Nombre',
  `pro_fechaAsoc` date NOT NULL COMMENT 'Fecha de Asociación',
  `pro_direccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Direccion',
  `pro_correo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Correo',
  `pro_telefono` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Teléfono',
  PRIMARY KEY (`pro_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of proveedor
-- ----------------------------

-- ----------------------------
-- Table structure for reticula
-- ----------------------------
DROP TABLE IF EXISTS `reticula`;
CREATE TABLE `reticula`  (
  `ret_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `ret_carrera` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Carrera',
  PRIMARY KEY (`ret_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of reticula
-- ----------------------------
INSERT INTO `reticula` VALUES (1, 'Ing. Sistemas Computacionales');
INSERT INTO `reticula` VALUES (2, 'Ing Gestión empresarial');
INSERT INTO `reticula` VALUES (3, 'Ing Ambiental');
INSERT INTO `reticula` VALUES (4, 'Ing Tecnologías de la información y las comunicaciones');
INSERT INTO `reticula` VALUES (6, 'Ing. Naval');
INSERT INTO `reticula` VALUES (7, 'Ing. Química');
INSERT INTO `reticula` VALUES (8, 'Ing. Bioquímica');

-- ----------------------------
-- Table structure for trabajador
-- ----------------------------
DROP TABLE IF EXISTS `trabajador`;
CREATE TABLE `trabajador`  (
  `tra_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `tra_departamento_id` int(11) NOT NULL COMMENT 'Id departamento',
  `tra_nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Nombre',
  `tra_appaterno` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Apellido Paterno',
  `tra_apmaterno` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Apellido Materno',
  `tra_rfc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'RFC',
  `tra_direccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Direccion',
  `tra_telefono` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Teléfono',
  `tra_correo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Correo',
  PRIMARY KEY (`tra_id`) USING BTREE,
  INDEX `fk_trabajador_departamento_1`(`tra_departamento_id`) USING BTREE,
  CONSTRAINT `fk_trabajador_departamento_1` FOREIGN KEY (`tra_departamento_id`) REFERENCES `departamento` (`dep_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of trabajador
-- ----------------------------
INSERT INTO `trabajador` VALUES (1, 1, 'Jaimito', 'El', 'Carterito', 'Jai659823', 'Indeco', '9966326598', 'jaimito@gmail.com');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `confirmation_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `superadmin` smallint(1) NULL DEFAULT 0,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `registration_ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `bind_to_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email_confirmed` smallint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'superadmin', 'kz2px152FAWlkHbkZoCiXgBAd-S8SSjF', '$2y$13$MhlYe12xkGFnSeK0sO2up.Y9kAD9Ct6JS1i9VLP7YAqd1dFsSylz2', NULL, 1, 1, 1426062188, 1426062188, NULL, NULL, NULL, 0);
INSERT INTO `user` VALUES (3, 'Bryan', 'JDykEffZcYtqBHsIsbc6b1ucUKvw2WSs', '$2y$13$WSiG7qvI0cvgabJJLkXlFOSOEpdV1UAPj//EWtqLIXGNYdt0aZZ3y', NULL, 1, 0, 1666338581, 1666338581, '127.0.0.1', '', 'alex.zavala.b@gmail.com', 1);
INSERT INTO `user` VALUES (4, 'Eusebio', 'R2i55ASw_R9oV2bIubE7IHggMTL6FsUs', '$2y$13$2iLXQZCmNHuNJ8Wkr4ccHONNHXU2XSP0w4Zp6bFGfm9/lHP/zbphi', NULL, 1, 0, 1666338615, 1667247267, '127.0.0.1', '', '', 0);

-- ----------------------------
-- Table structure for user_visit_log
-- ----------------------------
DROP TABLE IF EXISTS `user_visit_log`;
CREATE TABLE `user_visit_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `language` char(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `visit_time` int(11) NOT NULL,
  `browser` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `os` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `user_visit_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_visit_log
-- ----------------------------
INSERT INTO `user_visit_log` VALUES (1, '63524dbd734e3', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36 OPR/91.0.4516.72 (Edition std-1)', 1, 1666338237, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (2, '6352518a186f2', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36 OPR/91.0.4516.72 (Edition std-1)', 3, 1666339210, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (3, '6352f29097096', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36 OPR/91.0.4516.72 (Edition std-1)', 3, 1666380433, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (4, '6352f2b17660a', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36 OPR/91.0.4516.72 (Edition std-1)', 1, 1666380465, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (5, '63596d315022d', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36 Edg/106.0.1370.52', 1, 1666805041, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (6, '635acdf9b630d', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36 Edg/106.0.1370.52', 1, 1666895353, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (7, '63602c63d7c59', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.26', 1, 1667247203, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (8, '63602caa7da8f', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.26', 4, 1667247274, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (9, '63602e1e1697e', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.26', 4, 1667247646, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (10, '636030f64a058', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.26', 4, 1667248374, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (11, '63632ed4be408', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.26', 1, 1667444436, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (12, '63632ed6e1d30', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.26', 4, 1667444438, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (13, '636749fcb2bb5', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.35', 4, 1667713532, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (14, '63674d71c8503', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.35', 1, 1667714417, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (15, '636819aed3986', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.35', 1, 1667766702, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (16, '63681b1502936', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.35', 3, 1667767061, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (17, '636872d5ad192', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.35', 1, 1667789525, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (18, '6368739c04cba', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.35', 3, 1667789724, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (19, '636ab94423439', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.35', 1, 1667938628, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (20, '636ab94f51995', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.35', 4, 1667938639, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (21, '636ac9ba55260', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.35', 4, 1667942842, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (22, '636af4c345749', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.35', 1, 1667953859, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (23, '636af4ece6f38', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.35', 4, 1667953900, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (24, '636c05aa61222', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.35', 1, 1668023722, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (25, '636c06d88d994', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.35', 4, 1668024024, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (26, '637581808e0ff', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.42', 1, 1668645248, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (27, '63758390e0942', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.42', 4, 1668645776, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (28, '6375bb1ced705', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.42', 4, 1668659996, 'Chrome', 'Windows');

SET FOREIGN_KEY_CHECKS = 1;
