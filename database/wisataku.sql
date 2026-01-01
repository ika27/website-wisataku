/*
 Navicat Premium Data Transfer

 Source Server         : SERVER LOCALHOST
 Source Server Type    : MySQL
 Source Server Version : 100432
 Source Host           : localhost:3306
 Source Schema         : wisataku

 Target Server Type    : MySQL
 Target Server Version : 100432
 File Encoding         : 65001

 Date: 02/10/2025 15:43:59
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_alternatif
-- ----------------------------
DROP TABLE IF EXISTS `tbl_alternatif`;
CREATE TABLE `tbl_alternatif`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_wisata` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_wisata` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kategori_wisata` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `rating` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 104 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_alternatif
-- ----------------------------
INSERT INTO `tbl_alternatif` VALUES (1, 'A1', 'Pantai Parangtritis', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (2, 'A2', 'Pantai samas', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (3, 'A3', 'Pantai Goa Cemara', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (4, 'A4', 'Pantai Kwaru', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (5, 'A5', 'Pantai Pandansimo', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (6, 'A6', 'Goa Selarong', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (7, 'A7', 'Goa Cerme', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (8, 'A8', 'Pasar Seni Gabusan', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (9, 'A9', 'Kebun Buah Mangunan', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (10, 'A10', 'Gunung Pengger', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (11, 'A11', 'Puncak Becici', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (12, 'A12', 'Lintang 1000', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (13, 'A13', 'Pinus Asri', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (14, 'A14', 'Pinus Sari', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (15, 'A15', '1000 Batu', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (16, 'A16', 'Bukit Panguk', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (17, 'A17', 'Bojong Sari', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (18, 'A18', 'Watu Goyang', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (19, 'A19', 'Potrobayan', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (20, 'A20', 'LBH Dahromo', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (21, 'A21', 'La Li Sa Farmer Village', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (22, 'A22', 'Balong Park', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (23, 'A23', 'Galaxi Water Park', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (24, 'A24', 'Grand Puri Water Park', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (25, 'A25', 'Taman Rekreasi Tirto Tamansari', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (26, 'A26', 'Kids Fun Parks', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (27, 'A27', 'Selopamioro Adventure park', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (28, 'A28', 'Kebun Pisang Mbah Lasio', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (29, 'A29', 'Puncak Sosok', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (30, 'A30', 'Kawasan Cagar Budaya Jagalan ', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (31, 'A31', 'Komplek Masjid Kotagede, Sendang Seliran & Makam Raja-Raja Mataram di Kotagede', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (32, 'A32', 'Makam Raja-Raja Mataram Di Imogiri', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (33, 'A33', 'Makam Sunan Cirebon', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (34, 'A34', 'Lembah Sorory', 'Obyek Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (35, 'A35', 'Padepokan Sumber Karahayon', 'Museum', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (36, 'A36', 'Museum Muhammadiyah', 'Museum', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (37, 'A37', 'Museum Soeharto', 'Museum', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (38, 'A38', 'Museum Wayang Kekayon', 'Museum', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (39, 'A39', 'Museum Wayang Beber Sekartaji', 'Museum', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (40, 'A40', 'Museum Laboratorium Sejarah UPY', 'Museum', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (41, 'A41', 'Museum Purbakala Pleret', 'Museum', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (42, 'A42', 'Museum Tani Jawa ', 'Museum', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (43, 'A43', 'Museum History Of Java', 'Museum', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (44, 'A44', 'Museum Taman Tino Sidin', 'Museum', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (45, 'A45', 'Museum Rumah Belanda \n(Musium Bantul Masa Belanda )', 'Museum', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (46, 'A46', 'Museum Rumah Garuda', 'Museum', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (47, 'A47', 'Museum Gumuk Pasir \n(Geomaritime Sains Park)', 'Museum', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (48, 'A48', 'Museum Coklat Monggo', 'Museum', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (49, 'A49', 'Museum Tembi Rumah Budaya', 'Museum', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (50, 'A50', 'Kaki Langit', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (51, 'A51', 'Goa Gajah Lemah Abang', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (52, 'A52', 'songgo langit', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (53, 'A53', ' Tapak Tilas \nSultan Agung (TTSA)', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (54, 'A54', 'Wirokerten', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (55, 'A55', 'Banyu Nibo Rejosari', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (56, 'A56', 'Karangasem', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (57, 'A57', 'Gunung Cilik', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (58, 'A58', 'dahayu giri', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (59, 'A59', 'Karang Tengah', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (60, 'A60', 'Kebon Agung', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (61, 'A61', 'Candran', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (62, 'A62', 'Giriloyo Wukirsari', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (63, 'A63', 'Bendo', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (64, 'A64', 'pucung rejo', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (65, 'A65', 'Imogiri', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (66, 'A66', 'Sri Kemenut', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (67, 'A67', 'Krebet', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (68, 'A68', 'Mangir Ki Ageng\nWonoboyo', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (69, 'A69', 'Ngembel Mbeji', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (70, 'A70', 'Guwosari Slarong', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (71, 'A71', 'Kampung Santan', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (72, 'A72', 'Kalak Ijo', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (73, 'A73', 'Dewi Gumi', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (74, 'A74', 'Tembi, Timbulharjo', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (75, 'A75', 'Panggungharjo', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (76, 'A76', 'Juron', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (77, 'A77', 'Kajigelem', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (78, 'A78', 'Jipangan', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (79, 'A79', 'Manding', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (80, 'A80', 'Ngringinan', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (81, 'A81', ' Jagalan', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (82, 'A82', 'Retno', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (83, 'A83', 'Kampung Surocolo', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (84, 'A84', 'Panjangrejo', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (85, 'A85', 'Puton', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (86, 'A86', 'Trimulyo', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (87, 'A87', 'Dewa Batu', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (88, 'A88', 'Kiringan', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (89, 'A89', 'Mangrov', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (90, 'A90', 'Laguna Depok Parangtritis', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (91, 'A91', 'Kergan Kampung Gurami', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (92, 'A92', 'dewi sri', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (93, 'A93', 'Mulyodadi', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (94, 'A94', 'Lopati', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (95, 'A95', 'Pandansari', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (96, 'A96', 'Goa cemara', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (97, 'A97', 'Carakan', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (98, 'A98', 'Gadung Mlati', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (99, 'A99', 'Kajii ', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (100, 'A100', 'Dewi Sinta', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (101, 'A101', 'Mulia', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (102, 'A102', 'Banjoe Adji', 'Desa Wisata', NULL, NULL, NULL);
INSERT INTO `tbl_alternatif` VALUES (103, 'A103', 'Bumi Mataram Pleret', 'Desa Wisata', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for tbl_kriteria
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kriteria`;
CREATE TABLE `tbl_kriteria`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_kriteria` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_kriteria` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `bobot` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kategori_utama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_kriteria
-- ----------------------------
INSERT INTO `tbl_kriteria` VALUES (1, 'C1', 'Rating Google Maps', 'Benefit', '0.12', 'Rating Google MapsRating Google Maps');
INSERT INTO `tbl_kriteria` VALUES (2, 'C2', 'Jumlah Ulasan Google Maps', 'Benefit', '0.08', 'Biaya');
INSERT INTO `tbl_kriteria` VALUES (3, 'C3', 'Jumlah Pengunjung', 'Benefit', '0.08', 'Daya Tarik Wisata');
INSERT INTO `tbl_kriteria` VALUES (4, 'C4', 'Biaya', 'Cost', '0.10', 'Daya Tarik Wisata');
INSERT INTO `tbl_kriteria` VALUES (5, 'C5', 'Fasilitas Toilet', 'Benefit', '0.07', 'Daya Tarik Wisata');
INSERT INTO `tbl_kriteria` VALUES (6, 'C6', 'Fasilitas Tempat Ibadah', 'Benefit', '0.06', 'Daya Tarik Wisata');
INSERT INTO `tbl_kriteria` VALUES (7, 'C7', 'Fasilitas Parkir', 'Benefit', '0.06', 'Daya Tarik Wisata');
INSERT INTO `tbl_kriteria` VALUES (8, 'C8', 'Fasilitas Indoor (Payung/Gazebo)', 'Benefit', '0.05', 'Fasilitas');
INSERT INTO `tbl_kriteria` VALUES (9, 'C9', 'Fasilitas Kesehatan', 'Benefit', '0.06', 'Fasilitas');
INSERT INTO `tbl_kriteria` VALUES (10, 'C10', 'Fasilitas Penerangan', 'Benefit', '0.05', 'Fasilitas');
INSERT INTO `tbl_kriteria` VALUES (11, 'C11', 'Dekat Dengan Penginapan', 'Cost', '0.05', 'Fasilitas');
INSERT INTO `tbl_kriteria` VALUES (12, 'C12', 'Dekat Dengan Kantin/Kuliner', 'Cost', '0.05', 'Fasilitas');
INSERT INTO `tbl_kriteria` VALUES (13, 'C13', 'Jarak Dari ATM', 'Cost', '0.04', 'Fasilitas');
INSERT INTO `tbl_kriteria` VALUES (14, 'C14', 'Jarak Dari SPBU', 'Cost', '0.04', 'Aksesbilitas');
INSERT INTO `tbl_kriteria` VALUES (15, 'C15', 'Jarak Dari Pusat Kota', 'Cost', '0.09', 'Aksesbilitas');

-- ----------------------------
-- Table structure for tbl_penilaian
-- ----------------------------
DROP TABLE IF EXISTS `tbl_penilaian`;
CREATE TABLE `tbl_penilaian`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_wisata` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `C1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `C2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `C3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `C4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `C5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `C6` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `C7` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `C8` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `C9` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `C10` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `C11` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `C12` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `C13` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `C14` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `C15` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 104 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_penilaian
-- ----------------------------
INSERT INTO `tbl_penilaian` VALUES (1, 'A1', '4', '5', '5', '3', '4', '3', '5', '4', '1', '4', '5', '5', '0', '5', '2');
INSERT INTO `tbl_penilaian` VALUES (2, 'A2', '3', '3', '5', '4', '3', '2', '4', '3', '1', '2', '0', '5', '0', '5', '3');
INSERT INTO `tbl_penilaian` VALUES (3, 'A3', '3', '5', '4', '3', '4', '3', '5', '3', '1', '3', '0', '5', '0', '5', '3');
INSERT INTO `tbl_penilaian` VALUES (4, 'A4', '3', '5', '5', '4', '3', '2', '3', '3', '1', '1', '0', '5', '0', '5', '3');
INSERT INTO `tbl_penilaian` VALUES (5, 'A5', '3', '3', '5', '2', '3', '2', '3', '3', '1', '1', '0', '5', '0', '5', '3');
INSERT INTO `tbl_penilaian` VALUES (6, 'A6', '4', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '0', '1');
INSERT INTO `tbl_penilaian` VALUES (7, 'A7', '3', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '0', '3');
INSERT INTO `tbl_penilaian` VALUES (8, 'A8', '4', '0', '0', '0', '3', '0', '3', '0', '0', '3', '0', '0', '0', '0', '3');
INSERT INTO `tbl_penilaian` VALUES (9, 'A9', '4', '0', '0', '0', '3', '0', '3', '0', '0', '3', '0', '0', '0', '0', '2');
INSERT INTO `tbl_penilaian` VALUES (10, 'A10', '4', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '0', '1');
INSERT INTO `tbl_penilaian` VALUES (11, 'A11', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3', '2', '2', '0', '0');
INSERT INTO `tbl_penilaian` VALUES (12, 'A12', '3', '0', '0', '0', '3', '0', '3', '0', '0', '3', '0', '0', '0', '0', '2');
INSERT INTO `tbl_penilaian` VALUES (13, 'A13', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2');
INSERT INTO `tbl_penilaian` VALUES (14, 'A14', '5', '0', '0', '0', '3', '0', '0', '0', '0', '0', '0', '0', '0', '2', '5');
INSERT INTO `tbl_penilaian` VALUES (15, 'A15', '3', '0', '0', '0', '3', '0', '3', '3', '0', '3', '0', '0', '0', '0', '4');
INSERT INTO `tbl_penilaian` VALUES (16, 'A16', '3', '0', '0', '0', '3', '0', '3', '3', '0', '3', '0', '0', '0', '0', '3');
INSERT INTO `tbl_penilaian` VALUES (17, 'A17', '3', '0', '0', '0', '0', '0', '3', '0', '0', '3', '0', '0', '0', '0', '3');
INSERT INTO `tbl_penilaian` VALUES (18, 'A18', '4', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '0', '2');
INSERT INTO `tbl_penilaian` VALUES (19, 'A19', '4', '0', '0', '0', '3', '0', '3', '3', '0', '3', '0', '0', '0', '0', '3');
INSERT INTO `tbl_penilaian` VALUES (20, 'A20', '5', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '2', '4');
INSERT INTO `tbl_penilaian` VALUES (21, 'A21', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2');
INSERT INTO `tbl_penilaian` VALUES (22, 'A22', '4', '0', '0', '0', '3', '0', '3', '3', '0', '3', '0', '0', '0', '0', '2');
INSERT INTO `tbl_penilaian` VALUES (23, 'A23', '4', '5', '5', '3', '4', '3', '5', '4', '1', '4', '5', '5', '0', '5', '2');
INSERT INTO `tbl_penilaian` VALUES (24, 'A24', '3', '3', '5', '4', '3', '2', '4', '3', '1', '2', '0', '5', '0', '5', '3');
INSERT INTO `tbl_penilaian` VALUES (25, 'A25', '3', '5', '4', '3', '4', '3', '5', '3', '1', '3', '0', '5', '0', '5', '3');
INSERT INTO `tbl_penilaian` VALUES (26, 'A26', '3', '5', '5', '4', '3', '2', '3', '3', '1', '1', '0', '5', '0', '5', '3');
INSERT INTO `tbl_penilaian` VALUES (27, 'A27', '3', '3', '5', '2', '3', '2', '3', '3', '1', '1', '0', '5', '0', '5', '3');
INSERT INTO `tbl_penilaian` VALUES (28, 'A28', '4', '0', '0', '0', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4');
INSERT INTO `tbl_penilaian` VALUES (29, 'A29', '5', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '1', '4');
INSERT INTO `tbl_penilaian` VALUES (30, 'A30', '4', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '0', '4');
INSERT INTO `tbl_penilaian` VALUES (31, 'A31', '3', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '2', '4');
INSERT INTO `tbl_penilaian` VALUES (32, 'A32', '4', '0', '0', '0', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2');
INSERT INTO `tbl_penilaian` VALUES (33, 'A33', '5', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '2', '5');
INSERT INTO `tbl_penilaian` VALUES (34, 'A34', '4', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '0', '3');
INSERT INTO `tbl_penilaian` VALUES (35, 'A35', '4', '0', '0', '0', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2');
INSERT INTO `tbl_penilaian` VALUES (36, 'A36', '4', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '1', '4');
INSERT INTO `tbl_penilaian` VALUES (37, 'A37', '4', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '2', '5');
INSERT INTO `tbl_penilaian` VALUES (38, 'A38', '3', '0', '0', '0', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2');
INSERT INTO `tbl_penilaian` VALUES (39, 'A39', '4', '0', '0', '0', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3');
INSERT INTO `tbl_penilaian` VALUES (40, 'A40', '4', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '0', '4');
INSERT INTO `tbl_penilaian` VALUES (41, 'A41', '4', '0', '0', '0', '3', '0', '3', '3', '0', '0', '0', '0', '0', '0', '4');
INSERT INTO `tbl_penilaian` VALUES (42, 'A42', '4', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '0', '2');
INSERT INTO `tbl_penilaian` VALUES (43, 'A43', '5', '0', '0', '0', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2');
INSERT INTO `tbl_penilaian` VALUES (44, 'A44', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '4');
INSERT INTO `tbl_penilaian` VALUES (45, 'A45', '3', '0', '0', '0', '0', '0', '3', '3', '0', '0', '0', '0', '0', '0', '2');
INSERT INTO `tbl_penilaian` VALUES (46, 'A46', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2', '2', '2', '0', '0');
INSERT INTO `tbl_penilaian` VALUES (47, 'A47', '4', '0', '0', '0', '3', '0', '3', '0', '0', '3', '0', '4', '4', '0', '0');
INSERT INTO `tbl_penilaian` VALUES (48, 'A48', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3', '2', '2', '0', '0');
INSERT INTO `tbl_penilaian` VALUES (49, 'A49', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4', '3', '3', '0', '0');
INSERT INTO `tbl_penilaian` VALUES (50, 'A50', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `tbl_penilaian` VALUES (51, 'A51', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `tbl_penilaian` VALUES (52, 'A52', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1');
INSERT INTO `tbl_penilaian` VALUES (53, 'A53', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2');
INSERT INTO `tbl_penilaian` VALUES (54, 'A54', '4', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '0', '2');
INSERT INTO `tbl_penilaian` VALUES (55, 'A55', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3');
INSERT INTO `tbl_penilaian` VALUES (56, 'A56', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4', '3', '3', '0', '0');
INSERT INTO `tbl_penilaian` VALUES (57, 'A57', '4', '0', '0', '0', '3', '0', '0', '0', '0', '3', '0', '0', '0', '0', '3');
INSERT INTO `tbl_penilaian` VALUES (58, 'A58', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3');
INSERT INTO `tbl_penilaian` VALUES (59, 'A59', '4', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '0', '3');
INSERT INTO `tbl_penilaian` VALUES (60, 'A60', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4');
INSERT INTO `tbl_penilaian` VALUES (61, 'A61', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '4');
INSERT INTO `tbl_penilaian` VALUES (62, 'A62', '4', '0', '0', '0', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4');
INSERT INTO `tbl_penilaian` VALUES (63, 'A63', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `tbl_penilaian` VALUES (64, 'A64', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2');
INSERT INTO `tbl_penilaian` VALUES (65, 'A65', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4', '4', '0', '0');
INSERT INTO `tbl_penilaian` VALUES (66, 'A66', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1');
INSERT INTO `tbl_penilaian` VALUES (67, 'A67', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3');
INSERT INTO `tbl_penilaian` VALUES (68, 'A68', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `tbl_penilaian` VALUES (69, 'A69', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1');
INSERT INTO `tbl_penilaian` VALUES (70, 'A70', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1');
INSERT INTO `tbl_penilaian` VALUES (71, 'A71', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2');
INSERT INTO `tbl_penilaian` VALUES (72, 'A72', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1');
INSERT INTO `tbl_penilaian` VALUES (73, 'A73', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4', '4', '4', '0', '0');
INSERT INTO `tbl_penilaian` VALUES (74, 'A74', '3', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '0', '1');
INSERT INTO `tbl_penilaian` VALUES (75, 'A75', '4', '0', '0', '0', '3', '0', '3', '3', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `tbl_penilaian` VALUES (76, 'A76', '4', '0', '0', '0', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1');
INSERT INTO `tbl_penilaian` VALUES (77, 'A77', '5', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '0', '3');
INSERT INTO `tbl_penilaian` VALUES (78, 'A78', '4', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '0', '1');
INSERT INTO `tbl_penilaian` VALUES (79, 'A79', '3', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '0', '1');
INSERT INTO `tbl_penilaian` VALUES (80, 'A80', '3', '0', '0', '0', '3', '0', '3', '3', '0', '3', '0', '0', '0', '0', '1');
INSERT INTO `tbl_penilaian` VALUES (81, 'A81', '3', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '0', '1');
INSERT INTO `tbl_penilaian` VALUES (82, 'A82', '3', '0', '0', '0', '3', '0', '3', '3', '0', '0', '0', '0', '0', '0', '3');
INSERT INTO `tbl_penilaian` VALUES (83, 'A83', '4', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '0', '1');
INSERT INTO `tbl_penilaian` VALUES (84, 'A84', '3', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '0', '3');
INSERT INTO `tbl_penilaian` VALUES (85, 'A85', '4', '0', '0', '0', '3', '0', '3', '0', '0', '3', '0', '0', '0', '0', '3');
INSERT INTO `tbl_penilaian` VALUES (86, 'A86', '4', '0', '0', '0', '3', '0', '3', '0', '0', '3', '0', '0', '0', '0', '2');
INSERT INTO `tbl_penilaian` VALUES (87, 'A87', '4', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '0', '1');
INSERT INTO `tbl_penilaian` VALUES (88, 'A88', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3', '2', '2', '0', '0');
INSERT INTO `tbl_penilaian` VALUES (89, 'A89', '3', '0', '0', '0', '3', '0', '3', '0', '0', '3', '0', '0', '0', '0', '2');
INSERT INTO `tbl_penilaian` VALUES (90, 'A90', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2');
INSERT INTO `tbl_penilaian` VALUES (91, 'A91', '5', '0', '0', '0', '3', '0', '0', '0', '0', '0', '0', '0', '0', '2', '5');
INSERT INTO `tbl_penilaian` VALUES (92, 'A92', '3', '0', '0', '0', '3', '0', '3', '3', '0', '3', '0', '0', '0', '0', '4');
INSERT INTO `tbl_penilaian` VALUES (93, 'A93', '3', '0', '0', '0', '3', '0', '3', '3', '0', '3', '0', '0', '0', '0', '3');
INSERT INTO `tbl_penilaian` VALUES (94, 'A94', '3', '0', '0', '0', '0', '0', '3', '0', '0', '3', '0', '0', '0', '0', '3');
INSERT INTO `tbl_penilaian` VALUES (95, 'A95', '4', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '0', '2');
INSERT INTO `tbl_penilaian` VALUES (96, 'A96', '4', '0', '0', '0', '3', '0', '3', '3', '0', '3', '0', '0', '0', '0', '3');
INSERT INTO `tbl_penilaian` VALUES (97, 'A97', '5', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '2', '4');
INSERT INTO `tbl_penilaian` VALUES (98, 'A98', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2');
INSERT INTO `tbl_penilaian` VALUES (99, 'A99', '4', '0', '0', '0', '3', '0', '3', '3', '0', '3', '0', '0', '0', '0', '2');
INSERT INTO `tbl_penilaian` VALUES (100, 'A100', '4', '0', '0', '0', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4');
INSERT INTO `tbl_penilaian` VALUES (101, 'A101', '5', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '1', '4');
INSERT INTO `tbl_penilaian` VALUES (102, 'A102', '4', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '0', '4');
INSERT INTO `tbl_penilaian` VALUES (103, 'A103', '3', '0', '0', '0', '3', '0', '3', '0', '0', '0', '0', '0', '0', '2', '4');

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
) ENGINE = InnoDB AUTO_INCREMENT = 91 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_sub_kriteria
-- ----------------------------
INSERT INTO `tbl_sub_kriteria` VALUES (1, 'C1', 'Benefit', '4.8 – 5.0', '5');
INSERT INTO `tbl_sub_kriteria` VALUES (2, 'C1', 'Benefit', '4.5 – 4.79', '4');
INSERT INTO `tbl_sub_kriteria` VALUES (3, 'C1', 'Benefit', '4.0 – 4.49', '3');
INSERT INTO `tbl_sub_kriteria` VALUES (4, 'C1', 'Benefit', '3.5 – 3.99', '2');
INSERT INTO `tbl_sub_kriteria` VALUES (5, 'C1', 'Benefit', '3.0 – 3.49', '1');
INSERT INTO `tbl_sub_kriteria` VALUES (6, 'C1', 'Benefit', '< 3.0', '0');
INSERT INTO `tbl_sub_kriteria` VALUES (7, 'C2', 'Benefit', '> 1000', '5');
INSERT INTO `tbl_sub_kriteria` VALUES (8, 'C2', 'Benefit', '750 – 1000', '4');
INSERT INTO `tbl_sub_kriteria` VALUES (9, 'C2', 'Benefit', '500 – 749', '3');
INSERT INTO `tbl_sub_kriteria` VALUES (10, 'C2', 'Benefit', '250 – 499', '2');
INSERT INTO `tbl_sub_kriteria` VALUES (11, 'C2', 'Benefit', '100 – 249', '1');
INSERT INTO `tbl_sub_kriteria` VALUES (12, 'C2', 'Benefit', '< 100', '0');
INSERT INTO `tbl_sub_kriteria` VALUES (13, 'C3', 'Benefit', '> 20.000', '5');
INSERT INTO `tbl_sub_kriteria` VALUES (14, 'C3', 'Benefit', '10.001 – 20.000', '4');
INSERT INTO `tbl_sub_kriteria` VALUES (15, 'C3', 'Benefit', '5.001 – 10.000', '3');
INSERT INTO `tbl_sub_kriteria` VALUES (16, 'C3', 'Benefit', '2.001 – 5.000', '2');
INSERT INTO `tbl_sub_kriteria` VALUES (17, 'C3', 'Benefit', '1 – 2.000', '1');
INSERT INTO `tbl_sub_kriteria` VALUES (18, 'C3', 'Benefit', '0', '0');
INSERT INTO `tbl_sub_kriteria` VALUES (19, 'C4', 'Cost', '0 (gratis)', '5');
INSERT INTO `tbl_sub_kriteria` VALUES (20, 'C4', 'Cost', '1 – 5.000', '4');
INSERT INTO `tbl_sub_kriteria` VALUES (21, 'C4', 'Cost', '5.001 – 10.000', '3');
INSERT INTO `tbl_sub_kriteria` VALUES (22, 'C4', 'Cost', '10.001 – 20.000', '2');
INSERT INTO `tbl_sub_kriteria` VALUES (23, 'C4', 'Cost', '20.001 – 30.000', '1');
INSERT INTO `tbl_sub_kriteria` VALUES (24, 'C4', 'Cost', '> 30.000', '0');
INSERT INTO `tbl_sub_kriteria` VALUES (25, 'C5', 'Benefit', 'Sangat bersih, banyak', '5');
INSERT INTO `tbl_sub_kriteria` VALUES (26, 'C5', 'Benefit', 'Bersih, memadai', '4');
INSERT INTO `tbl_sub_kriteria` VALUES (27, 'C5', 'Benefit', 'Cukup, bersih', '3');
INSERT INTO `tbl_sub_kriteria` VALUES (28, 'C5', 'Benefit', 'Ada, tapi terbatas', '2');
INSERT INTO `tbl_sub_kriteria` VALUES (29, 'C5', 'Benefit', 'Ada, tapi tidak bersih', '1');
INSERT INTO `tbl_sub_kriteria` VALUES (30, 'C5', 'Benefit', 'Tidak ada', '0');
INSERT INTO `tbl_sub_kriteria` VALUES (31, 'C6', 'Benefit', 'Lengkap dan terawat', '5');
INSERT INTO `tbl_sub_kriteria` VALUES (32, 'C6', 'Benefit', 'Lengkap', '4');
INSERT INTO `tbl_sub_kriteria` VALUES (33, 'C6', 'Benefit', 'Sederhana dan bersih', '3');
INSERT INTO `tbl_sub_kriteria` VALUES (34, 'C6', 'Benefit', 'Ada namun terbatas', '2');
INSERT INTO `tbl_sub_kriteria` VALUES (35, 'C6', 'Benefit', 'Ada tapi tidak layak', '1');
INSERT INTO `tbl_sub_kriteria` VALUES (36, 'C6', 'Benefit', 'Tidak ada', '0');
INSERT INTO `tbl_sub_kriteria` VALUES (37, 'C7', 'Benefit', 'Luas, aman, tertata baik', '5');
INSERT INTO `tbl_sub_kriteria` VALUES (38, 'C7', 'Benefit', 'Luas, cukup aman', '4');
INSERT INTO `tbl_sub_kriteria` VALUES (39, 'C7', 'Benefit', 'Sedang, cukup', '3');
INSERT INTO `tbl_sub_kriteria` VALUES (40, 'C7', 'Benefit', 'Sempit, kurang tertata', '2');
INSERT INTO `tbl_sub_kriteria` VALUES (41, 'C7', 'Benefit', 'Sempit, tidak aman', '1');
INSERT INTO `tbl_sub_kriteria` VALUES (42, 'C7', 'Benefit', 'Tidak ada', '0');
INSERT INTO `tbl_sub_kriteria` VALUES (43, 'C8', 'Benefit', 'Banyak, teduh', '5');
INSERT INTO `tbl_sub_kriteria` VALUES (44, 'C8', 'Benefit', 'Cukup banyak', '4');
INSERT INTO `tbl_sub_kriteria` VALUES (45, 'C8', 'Benefit', 'Sedikit tapi berguna', '3');
INSERT INTO `tbl_sub_kriteria` VALUES (46, 'C8', 'Benefit', 'Ada, tapi rusak', '2');
INSERT INTO `tbl_sub_kriteria` VALUES (47, 'C8', 'Benefit', 'Ada satu dua', '1');
INSERT INTO `tbl_sub_kriteria` VALUES (48, 'C8', 'Benefit', 'Tidak tersedia', '0');
INSERT INTO `tbl_sub_kriteria` VALUES (49, 'C9', 'Benefit', 'Ada klinik, P3K lengkap', '5');
INSERT INTO `tbl_sub_kriteria` VALUES (50, 'C9', 'Benefit', 'Ada pos P3K + personel', '4');
INSERT INTO `tbl_sub_kriteria` VALUES (51, 'C9', 'Benefit', 'Hanya pos P3K', '3');
INSERT INTO `tbl_sub_kriteria` VALUES (52, 'C9', 'Benefit', 'Kotak P3K sederhana', '2');
INSERT INTO `tbl_sub_kriteria` VALUES (53, 'C9', 'Benefit', 'Informasi darurat saja', '1');
INSERT INTO `tbl_sub_kriteria` VALUES (54, 'C9', 'Benefit', 'Tidak tersedia', '0');
INSERT INTO `tbl_sub_kriteria` VALUES (55, 'C10', 'Benefit', 'Terang di semua area, malam aman', '5');
INSERT INTO `tbl_sub_kriteria` VALUES (56, 'C10', 'Benefit', 'Terang di sebagian besar area', '4');
INSERT INTO `tbl_sub_kriteria` VALUES (57, 'C10', 'Benefit', 'Cukup terang', '3');
INSERT INTO `tbl_sub_kriteria` VALUES (58, 'C10', 'Benefit', 'Beberapa titik gelap', '2');
INSERT INTO `tbl_sub_kriteria` VALUES (59, 'C10', 'Benefit', 'Banyak area gelap', '1');
INSERT INTO `tbl_sub_kriteria` VALUES (60, 'C10', 'Benefit', 'Tidak ada penerangan', '0');
INSERT INTO `tbl_sub_kriteria` VALUES (61, 'C11', 'Cost', '< 100 m', '5');
INSERT INTO `tbl_sub_kriteria` VALUES (62, 'C11', 'Cost', '100 – 300 m', '4');
INSERT INTO `tbl_sub_kriteria` VALUES (63, 'C11', 'Cost', '301 – 500 m', '3');
INSERT INTO `tbl_sub_kriteria` VALUES (64, 'C11', 'Cost', '501 – 1000 m', '2');
INSERT INTO `tbl_sub_kriteria` VALUES (65, 'C11', 'Cost', '1 – 2 km', '1');
INSERT INTO `tbl_sub_kriteria` VALUES (66, 'C11', 'Cost', '> 2 km', '0');
INSERT INTO `tbl_sub_kriteria` VALUES (67, 'C12', 'Cost', '< 50 m', '5');
INSERT INTO `tbl_sub_kriteria` VALUES (68, 'C12', 'Cost', '50 – 150 m', '4');
INSERT INTO `tbl_sub_kriteria` VALUES (69, 'C12', 'Cost', '151 – 300 m', '3');
INSERT INTO `tbl_sub_kriteria` VALUES (70, 'C12', 'Cost', '301 – 600 m', '2');
INSERT INTO `tbl_sub_kriteria` VALUES (71, 'C12', 'Cost', '601 – 1000 m', '1');
INSERT INTO `tbl_sub_kriteria` VALUES (72, 'C12', 'Cost', '> 1 km', '0');
INSERT INTO `tbl_sub_kriteria` VALUES (73, 'C13', 'Cost', '< 50 m', '5');
INSERT INTO `tbl_sub_kriteria` VALUES (74, 'C13', 'Cost', '50 – 150 m', '4');
INSERT INTO `tbl_sub_kriteria` VALUES (75, 'C13', 'Cost', '151 – 300 m', '3');
INSERT INTO `tbl_sub_kriteria` VALUES (76, 'C13', 'Cost', '301 – 600 m', '2');
INSERT INTO `tbl_sub_kriteria` VALUES (77, 'C13', 'Cost', '601 – 1000 m', '1');
INSERT INTO `tbl_sub_kriteria` VALUES (78, 'C13', 'Cost', '> 1 km', '0');
INSERT INTO `tbl_sub_kriteria` VALUES (79, 'C14', 'Cost', '< 1 km', '5');
INSERT INTO `tbl_sub_kriteria` VALUES (80, 'C14', 'Cost', '1 – 2 km', '4');
INSERT INTO `tbl_sub_kriteria` VALUES (81, 'C14', 'Cost', '2 – 3 km', '3');
INSERT INTO `tbl_sub_kriteria` VALUES (82, 'C14', 'Cost', '3 – 5 km', '2');
INSERT INTO `tbl_sub_kriteria` VALUES (83, 'C14', 'Cost', '5 – 7 km', '1');
INSERT INTO `tbl_sub_kriteria` VALUES (84, 'C14', 'Cost', '> 7 km', '0');
INSERT INTO `tbl_sub_kriteria` VALUES (85, 'C15', 'Cost', '< 5 km', '5');
INSERT INTO `tbl_sub_kriteria` VALUES (86, 'C15', 'Cost', '5 – 10 km', '4');
INSERT INTO `tbl_sub_kriteria` VALUES (87, 'C15', 'Cost', '10 – 15 km', '3');
INSERT INTO `tbl_sub_kriteria` VALUES (88, 'C15', 'Cost', '15 – 20 km', '2');
INSERT INTO `tbl_sub_kriteria` VALUES (89, 'C15', 'Cost', '20 – 30 km', '1');
INSERT INTO `tbl_sub_kriteria` VALUES (90, 'C15', 'Cost', '> 30 km', '0');

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
