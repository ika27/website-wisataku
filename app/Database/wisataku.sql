/*
 Navicat Premium Data Transfer

 Source Server         : SERVER LOCAL XAMPP
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : wisataku

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 29/08/2025 22:51:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_alternatif
-- ----------------------------
DROP TABLE IF EXISTS `tbl_alternatif`;
CREATE TABLE `tbl_alternatif`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_wisata` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_wisata` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kategori_wisata` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rating` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_alternatif
-- ----------------------------
INSERT INTO `tbl_alternatif` VALUES (1, 'A001', 'Wisata Goa Pindul', 'Wisata Alam', 'Wisata goa pindul sangat diminta oleh pengunjung', 'goa pindul.jpg', '');
INSERT INTO `tbl_alternatif` VALUES (2, 'A002', 'Wisata Pantai Parangtritis', 'Wisata Pantai', '       Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa aliquam, eaque soluta ab doloribus, facere officiis iusto voluptas assumenda magnam aliquid rem consectetur? Tempore consectetur suscipit nemo architecto illo? Libero?', 'parangtritis.jpg', '');
INSERT INTO `tbl_alternatif` VALUES (3, 'A003', 'Alun Alun Kindul', 'Wisata Religi', '       Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa aliquam, eaque soluta ab doloribus, facere officiis iusto voluptas assumenda magnam aliquid rem consectetur? Tempore consectetur suscipit nemo architecto illo? Libero?', 'alun alun kidul.jpg', '');

-- ----------------------------
-- Table structure for tbl_kriteria
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kriteria`;
CREATE TABLE `tbl_kriteria`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_kriteria` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_kriteria` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kategori_utama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `bobot` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_kriteria
-- ----------------------------
INSERT INTO `tbl_kriteria` VALUES (1, 'C1', 'Rating Google Maps', 'Rating Google Maps', '2,9');
INSERT INTO `tbl_kriteria` VALUES (2, 'C2', 'Jumlah Ulasan Google Maps', 'Jumlah Ulasan', '0,5');
INSERT INTO `tbl_kriteria` VALUES (3, 'C3', 'Jumlah Pengunjung', 'Jumlah Pengunjung', '1,4');
INSERT INTO `tbl_kriteria` VALUES (4, 'C4', 'Biaya', 'Biaya', '3,4');
INSERT INTO `tbl_kriteria` VALUES (5, 'C5', 'Fasilitas Toilet', 'Fasilitas', '0,3');
INSERT INTO `tbl_kriteria` VALUES (6, 'C6', 'Fasilitas Tempat Ibadah', 'Fasilitas', '2,2');
INSERT INTO `tbl_kriteria` VALUES (7, 'C7', 'Fasilitas Parkir', 'Fasilitas', '4,0');
INSERT INTO `tbl_kriteria` VALUES (8, 'C8', 'Fasilitas Indoor (Payung/Gazebo)', 'Fasilitas', '3,1');
INSERT INTO `tbl_kriteria` VALUES (9, 'C9', 'Fasilitas Kesehatan', 'Fasilitas', '0,2');

-- ----------------------------
-- Table structure for tbl_sub_kriteria
-- ----------------------------
DROP TABLE IF EXISTS `tbl_sub_kriteria`;
CREATE TABLE `tbl_sub_kriteria`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_kriteria` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sub_kriteria` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nilai` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_sub_kriteria
-- ----------------------------
INSERT INTO `tbl_sub_kriteria` VALUES (1, 'C1', 'Benefit', '4.0 – 4.49', '3');

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username` ASC) USING BTREE,
  UNIQUE INDEX `email`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 'admin', 'Admin', 'admin@gmail.com', '$2y$10$i0xoiFVc/etw/WXRuU1D1ODE5v.u6ZEOU4MVTMgSjZYwp8u0LpC7S', 'admin', '2025-08-28 23:10:35', NULL);
INSERT INTO `tbl_user` VALUES (2, 'mentari201', 'Ika Mentari', 'mentari@gmail.com', '$2y$10$YBFA1bgtbDBRR.FjzVAUo.U8Gty1beros.VwKXoXGVkpi8xniBQDy', 'user', '2025-08-29 07:11:11', '2025-08-29 14:49:25');
INSERT INTO `tbl_user` VALUES (3, 'alcantara', 'Firman Dhani Pratama', 'firmanpratama519@gmail.com', '$2y$10$iqKndckqgaCuA16taBUcQ.9TDLwnYwPf7IeJ213z97p2Edqyr8.LO', 'user', '2025-08-29 07:29:33', '2025-08-29 07:29:33');

SET FOREIGN_KEY_CHECKS = 1;
