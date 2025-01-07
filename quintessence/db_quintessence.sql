/*
Navicat MySQL Data Transfer

Source Server         : Kashidota
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_tes

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2023-06-03 22:54:37
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `t_admin`
-- ----------------------------
DROP TABLE IF EXISTS `t_admin`;
CREATE TABLE `t_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `usn_admin` varchar(50) NOT NULL,
  `pass_admin` varchar(50) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of t_admin
-- ----------------------------
INSERT INTO `t_admin` VALUES ('1', 'admin', '123');
INSERT INTO `t_admin` VALUES ('2', 'admin2', '123');
INSERT INTO `t_admin` VALUES ('3', 'admin3', '123');

-- ----------------------------
-- Table structure for `t_bmi`
-- ----------------------------
DROP TABLE IF EXISTS `t_bmi`;
CREATE TABLE `t_bmi` (
  `id_bmi` int(11) NOT NULL AUTO_INCREMENT,
  `berat_badan` int(11) DEFAULT NULL,
  `tinggi_badan` int(11) DEFAULT NULL,
  `id_status_bmi` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_bmi`),
  KEY `fk_bmi_user` (`id_user`),
  KEY `fk_status_bmi` (`id_status_bmi`),
  CONSTRAINT `fk_bmi_user` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_status_bmi` FOREIGN KEY (`id_status_bmi`) REFERENCES `t_status_bmi` (`id_status_bmi`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of t_bmi
-- ----------------------------
INSERT INTO `t_bmi` VALUES ('1', '55', '165', '2', '1');
INSERT INTO `t_bmi` VALUES ('2', '48', '150', '2', '2');
INSERT INTO `t_bmi` VALUES ('3', '45', '165', '1', '3');
INSERT INTO `t_bmi` VALUES ('4', '60', '160', '3', '4');
INSERT INTO `t_bmi` VALUES ('5', '45', '155', '2', '5');
INSERT INTO `t_bmi` VALUES ('6', '50', '165', '2', '6');
INSERT INTO `t_bmi` VALUES ('7', '62', '183', '2', '7');
INSERT INTO `t_bmi` VALUES ('8', '58', '178', '2', '8');
INSERT INTO `t_bmi` VALUES ('9', '48', '163', '2', '9');
INSERT INTO `t_bmi` VALUES ('10', '53', '181', '1', '10');
INSERT INTO `t_bmi` VALUES ('11', '65', '160', '3', '25');
INSERT INTO `t_bmi` VALUES ('35', '66', '187', '2', '24');
INSERT INTO `t_bmi` VALUES ('40', '65', '180', '2', '26');
INSERT INTO `t_bmi` VALUES ('43', '65', '180', '2', '34');
INSERT INTO `t_bmi` VALUES ('45', '72', '170', '3', '36');
INSERT INTO `t_bmi` VALUES ('79', '70', '180', '2', '40');
INSERT INTO `t_bmi` VALUES ('84', null, null, null, '42');
INSERT INTO `t_bmi` VALUES ('86', '65', '170', '2', '43');
INSERT INTO `t_bmi` VALUES ('87', '80', '121', '4', '44');

-- ----------------------------
-- Table structure for `t_covid`
-- ----------------------------
DROP TABLE IF EXISTS `t_covid`;
CREATE TABLE `t_covid` (
  `id_covid` int(11) NOT NULL AUTO_INCREMENT,
  `id_provinsi` int(11) NOT NULL,
  `jumlah_covid` int(11) NOT NULL,
  `jumlah_kematian` int(11) NOT NULL,
  PRIMARY KEY (`id_covid`),
  KEY `fk_covid_provinsi` (`id_provinsi`),
  CONSTRAINT `fk_covid_provinsi` FOREIGN KEY (`id_provinsi`) REFERENCES `t_provinsi` (`id_provinsi`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of t_covid
-- ----------------------------
INSERT INTO `t_covid` VALUES ('1', '1', '8360', '100');
INSERT INTO `t_covid` VALUES ('2', '2', '6709', '84');
INSERT INTO `t_covid` VALUES ('3', '3', '5699', '50');
INSERT INTO `t_covid` VALUES ('4', '4', '5465', '76');
INSERT INTO `t_covid` VALUES ('5', '5', '2328', '32');
INSERT INTO `t_covid` VALUES ('6', '6', '2106', '12');
INSERT INTO `t_covid` VALUES ('7', '7', '1628', '11');
INSERT INTO `t_covid` VALUES ('8', '8', '1276', '11');
INSERT INTO `t_covid` VALUES ('9', '9', '1215', '9');
INSERT INTO `t_covid` VALUES ('10', '10', '1057', '13');
INSERT INTO `t_covid` VALUES ('11', '11', '412', '2');
INSERT INTO `t_covid` VALUES ('12', '12', '321', '3');
INSERT INTO `t_covid` VALUES ('13', '13', '324', '4');
INSERT INTO `t_covid` VALUES ('14', '14', '234', '5');
INSERT INTO `t_covid` VALUES ('15', '15', '123', '6');
INSERT INTO `t_covid` VALUES ('16', '16', '534', '3');
INSERT INTO `t_covid` VALUES ('17', '17', '123', '2');
INSERT INTO `t_covid` VALUES ('18', '18', '553', '3');
INSERT INTO `t_covid` VALUES ('19', '19', '253', '4');
INSERT INTO `t_covid` VALUES ('20', '20', '6452', '56');
INSERT INTO `t_covid` VALUES ('21', '21', '232', '2');
INSERT INTO `t_covid` VALUES ('22', '22', '1123', '12');
INSERT INTO `t_covid` VALUES ('23', '23', '4123', '21');
INSERT INTO `t_covid` VALUES ('24', '24', '1221', '12');
INSERT INTO `t_covid` VALUES ('25', '25', '1134', '14');
INSERT INTO `t_covid` VALUES ('26', '26', '5323', '23');
INSERT INTO `t_covid` VALUES ('27', '27', '1232', '11');
INSERT INTO `t_covid` VALUES ('28', '28', '5344', '34');
INSERT INTO `t_covid` VALUES ('29', '29', '6332', '34');
INSERT INTO `t_covid` VALUES ('30', '30', '1234', '12');
INSERT INTO `t_covid` VALUES ('31', '31', '1231', '14');
INSERT INTO `t_covid` VALUES ('32', '32', '5361', '24');
INSERT INTO `t_covid` VALUES ('33', '33', '234', '3');
INSERT INTO `t_covid` VALUES ('34', '34', '232', '3');

-- ----------------------------
-- Table structure for `t_datadiri`
-- ----------------------------
DROP TABLE IF EXISTS `t_datadiri`;
CREATE TABLE `t_datadiri` (
  `id_biodata` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(150) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `usia` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_biodata`),
  KEY `fk_data_user` (`id_user`),
  CONSTRAINT `fk_data_user` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of t_datadiri
-- ----------------------------
INSERT INTO `t_datadiri` VALUES ('1', 'tantanitania', '2023-06-01', 'P', 'Cigadung', '19', '1');
INSERT INTO `t_datadiri` VALUES ('2', 'Arul', '1999-12-26', 'L', 'Jl. Dahlia', '23', '2');
INSERT INTO `t_datadiri` VALUES ('3', 'Shaka Ardelardo', '2004-07-14', 'L', 'Jl. Kenanga', '18', '4');
INSERT INTO `t_datadiri` VALUES ('4', 'Raneysha Gauri ', '2004-08-13', 'P', 'Jl. Mawar', '18', '5');
INSERT INTO `t_datadiri` VALUES ('5', 'Hazel Lazuardi', '2002-02-06', 'P', 'Jl. Melati', '21', '3');
INSERT INTO `t_datadiri` VALUES ('6', 'Melaa Deandra', '2002-01-05', 'P', 'Jl. Tulip', '21', '6');
INSERT INTO `t_datadiri` VALUES ('7', 'Leyvan Damarion', '2004-03-11', 'L', 'Jl. Teratai', '18', '7');
INSERT INTO `t_datadiri` VALUES ('8', 'Kaafi Bagaskara', '2004-11-03', 'L', 'Jl. Melati', '18', '8');
INSERT INTO `t_datadiri` VALUES ('9', 'Sheryl Danielle', '2003-05-15', 'P', 'Jl. Cilimus', '19', '9');
INSERT INTO `t_datadiri` VALUES ('10', 'Geral Zavierre', '2002-04-04', 'L', 'Jl. Pondok Indah', '21', '10');
INSERT INTO `t_datadiri` VALUES ('21', 'Imam Chalish Rafidhul Haque', '2023-05-31', 'L', 'Bandung ah', '17', '24');
INSERT INTO `t_datadiri` VALUES ('22', 'a', '2021-05-31', 'L', 'wef', '17', '25');
INSERT INTO `t_datadiri` VALUES ('23', 'tes', '2023-06-01', 'L', '1', '18', '26');
INSERT INTO `t_datadiri` VALUES ('33', 'Chalish RH', '2003-05-11', 'L', 'Bandung Barat', '20', '34');
INSERT INTO `t_datadiri` VALUES ('35', 'Kashidota One', '2003-05-11', 'L', 'Bandung', '20', '36');
INSERT INTO `t_datadiri` VALUES ('36', 'Kashidota Two', '2011-05-11', 'L', 'Bandung Barat', '12', '37');
INSERT INTO `t_datadiri` VALUES ('39', 'aa', '2013-06-02', 'L', '12', '10', '40');
INSERT INTO `t_datadiri` VALUES ('41', 'Agung', '2013-06-02', 'L', 'bandung', '10', '42');
INSERT INTO `t_datadiri` VALUES ('42', 'Barbie', '2010-05-02', 'L', 'Inggris', '13', '43');
INSERT INTO `t_datadiri` VALUES ('43', 'Bayu aja', '2013-06-02', 'L', 'Bayung', '10', '44');

-- ----------------------------
-- Table structure for `t_hiv`
-- ----------------------------
DROP TABLE IF EXISTS `t_hiv`;
CREATE TABLE `t_hiv` (
  `id_hiv` int(11) NOT NULL AUTO_INCREMENT,
  `id_provinsi` int(11) NOT NULL,
  `jumlah_hiv` int(11) NOT NULL,
  PRIMARY KEY (`id_hiv`),
  KEY `fk_hiv_provinsi` (`id_provinsi`),
  CONSTRAINT `fk_hiv_provinsi` FOREIGN KEY (`id_provinsi`) REFERENCES `t_provinsi` (`id_provinsi`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of t_hiv
-- ----------------------------
INSERT INTO `t_hiv` VALUES ('1', '1', '967');
INSERT INTO `t_hiv` VALUES ('2', '2', '690');
INSERT INTO `t_hiv` VALUES ('3', '3', '655');
INSERT INTO `t_hiv` VALUES ('4', '4', '420');
INSERT INTO `t_hiv` VALUES ('5', '5', '371');
INSERT INTO `t_hiv` VALUES ('6', '6', '368');
INSERT INTO `t_hiv` VALUES ('7', '7', '336');
INSERT INTO `t_hiv` VALUES ('8', '8', '321');
INSERT INTO `t_hiv` VALUES ('9', '9', '299');
INSERT INTO `t_hiv` VALUES ('10', '10', '223');
INSERT INTO `t_hiv` VALUES ('11', '11', '3242');
INSERT INTO `t_hiv` VALUES ('12', '12', '2132');
INSERT INTO `t_hiv` VALUES ('13', '13', '1232');
INSERT INTO `t_hiv` VALUES ('14', '14', '2433');
INSERT INTO `t_hiv` VALUES ('15', '15', '532');
INSERT INTO `t_hiv` VALUES ('16', '16', '234');
INSERT INTO `t_hiv` VALUES ('17', '17', '6435');
INSERT INTO `t_hiv` VALUES ('18', '18', '3242');
INSERT INTO `t_hiv` VALUES ('19', '19', '234');
INSERT INTO `t_hiv` VALUES ('20', '20', '6345');
INSERT INTO `t_hiv` VALUES ('21', '21', '5634');
INSERT INTO `t_hiv` VALUES ('22', '22', '2343');
INSERT INTO `t_hiv` VALUES ('23', '23', '3245');
INSERT INTO `t_hiv` VALUES ('24', '24', '657');
INSERT INTO `t_hiv` VALUES ('25', '25', '5777');
INSERT INTO `t_hiv` VALUES ('26', '26', '5467');
INSERT INTO `t_hiv` VALUES ('27', '27', '7546');
INSERT INTO `t_hiv` VALUES ('28', '28', '345');
INSERT INTO `t_hiv` VALUES ('29', '29', '7436');
INSERT INTO `t_hiv` VALUES ('30', '30', '5745');
INSERT INTO `t_hiv` VALUES ('31', '31', '8688');
INSERT INTO `t_hiv` VALUES ('32', '32', '565');
INSERT INTO `t_hiv` VALUES ('33', '33', '345');
INSERT INTO `t_hiv` VALUES ('34', '34', '656');

-- ----------------------------
-- Table structure for `t_imunisasi`
-- ----------------------------
DROP TABLE IF EXISTS `t_imunisasi`;
CREATE TABLE `t_imunisasi` (
  `id_imunisasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_provinsi` int(11) NOT NULL,
  `persentase_imunisasi` varchar(15) NOT NULL,
  `jumlah_balita` int(11) NOT NULL,
  PRIMARY KEY (`id_imunisasi`),
  KEY `fk_imun_provinsi` (`id_provinsi`),
  CONSTRAINT `fk_imun_provinsi` FOREIGN KEY (`id_provinsi`) REFERENCES `t_provinsi` (`id_provinsi`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of t_imunisasi
-- ----------------------------
INSERT INTO `t_imunisasi` VALUES ('1', '34', '75,83', '741968');
INSERT INTO `t_imunisasi` VALUES ('2', '33', '62,32', '762534');
INSERT INTO `t_imunisasi` VALUES ('3', '32', '62,32', '692763');
INSERT INTO `t_imunisasi` VALUES ('4', '31', '63,38', '634281');
INSERT INTO `t_imunisasi` VALUES ('5', '30', '65,63', '601192');
INSERT INTO `t_imunisasi` VALUES ('6', '29', '70,52', '520198');
INSERT INTO `t_imunisasi` VALUES ('7', '28', '76,23', '520012');
INSERT INTO `t_imunisasi` VALUES ('8', '27', '75,83', '419827');
INSERT INTO `t_imunisasi` VALUES ('9', '26', '71,52', '401524');
INSERT INTO `t_imunisasi` VALUES ('10', '25', '71,78', '400127');
INSERT INTO `t_imunisasi` VALUES ('11', '24', '43,53', '123123');
INSERT INTO `t_imunisasi` VALUES ('12', '23', '53,53', '243232');
INSERT INTO `t_imunisasi` VALUES ('13', '22', '25,65', '234234');
INSERT INTO `t_imunisasi` VALUES ('14', '21', '46,43', '234325');
INSERT INTO `t_imunisasi` VALUES ('15', '20', '63,67', '234344');
INSERT INTO `t_imunisasi` VALUES ('16', '19', '54.76', '235463');
INSERT INTO `t_imunisasi` VALUES ('17', '18', '23,67', '763443');
INSERT INTO `t_imunisasi` VALUES ('18', '17', '45,64', '324526');
INSERT INTO `t_imunisasi` VALUES ('19', '16', '74,55', '332332');
INSERT INTO `t_imunisasi` VALUES ('20', '15', '35,65', '321312');
INSERT INTO `t_imunisasi` VALUES ('21', '14', '74.45', '234532');
INSERT INTO `t_imunisasi` VALUES ('22', '13', '23,33', '423433');
INSERT INTO `t_imunisasi` VALUES ('23', '12', '42,56', '343245');
INSERT INTO `t_imunisasi` VALUES ('24', '11', '34,64', '435345');
INSERT INTO `t_imunisasi` VALUES ('25', '10', '64,65', '234523');
INSERT INTO `t_imunisasi` VALUES ('26', '9', '75,45', '334325');
INSERT INTO `t_imunisasi` VALUES ('27', '8', '66,34', '325235');
INSERT INTO `t_imunisasi` VALUES ('28', '7', '34,64', '645334');
INSERT INTO `t_imunisasi` VALUES ('29', '6', '42,55', '234354');
INSERT INTO `t_imunisasi` VALUES ('30', '5', '45,43', '234234');
INSERT INTO `t_imunisasi` VALUES ('31', '4', '45,33', '231231');
INSERT INTO `t_imunisasi` VALUES ('32', '3', '26,43', '643434');
INSERT INTO `t_imunisasi` VALUES ('33', '2', '64,44', '463463');
INSERT INTO `t_imunisasi` VALUES ('34', '1', '63,23', '435422');

-- ----------------------------
-- Table structure for `t_nakes`
-- ----------------------------
DROP TABLE IF EXISTS `t_nakes`;
CREATE TABLE `t_nakes` (
  `id_nakes` int(11) NOT NULL AUTO_INCREMENT,
  `id_provinsi` int(11) NOT NULL,
  `jumlah_nakes` int(11) NOT NULL,
  `jumlah_rs` int(11) NOT NULL,
  PRIMARY KEY (`id_nakes`),
  KEY `fk_nakes_provinsi` (`id_provinsi`),
  CONSTRAINT `fk_nakes_provinsi` FOREIGN KEY (`id_provinsi`) REFERENCES `t_provinsi` (`id_provinsi`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of t_nakes
-- ----------------------------
INSERT INTO `t_nakes` VALUES ('1', '1', '84994', '1234');
INSERT INTO `t_nakes` VALUES ('2', '2', '74157', '1211');
INSERT INTO `t_nakes` VALUES ('3', '3', '68646', '1123');
INSERT INTO `t_nakes` VALUES ('4', '4', '40902', '1022');
INSERT INTO `t_nakes` VALUES ('5', '5', '36038', '1011');
INSERT INTO `t_nakes` VALUES ('6', '6', '23492', '943');
INSERT INTO `t_nakes` VALUES ('7', '7', '21179', '832');
INSERT INTO `t_nakes` VALUES ('8', '8', '21061', '798');
INSERT INTO `t_nakes` VALUES ('9', '9', '17846', '742');
INSERT INTO `t_nakes` VALUES ('10', '10', '16805', '637');
INSERT INTO `t_nakes` VALUES ('11', '11', '23435', '901');
INSERT INTO `t_nakes` VALUES ('12', '12', '43534', '1032');
INSERT INTO `t_nakes` VALUES ('13', '13', '23324', '855');
INSERT INTO `t_nakes` VALUES ('14', '14', '32456', '999');
INSERT INTO `t_nakes` VALUES ('15', '15', '64353', '1098');
INSERT INTO `t_nakes` VALUES ('16', '16', '4325', '322');
INSERT INTO `t_nakes` VALUES ('17', '17', '23432', '889');
INSERT INTO `t_nakes` VALUES ('18', '18', '100', '23');
INSERT INTO `t_nakes` VALUES ('19', '19', '645', '111');
INSERT INTO `t_nakes` VALUES ('20', '20', '3244', '190');
INSERT INTO `t_nakes` VALUES ('21', '21', '4643', '423');
INSERT INTO `t_nakes` VALUES ('22', '22', '3453', '211');
INSERT INTO `t_nakes` VALUES ('23', '23', '2343', '184');
INSERT INTO `t_nakes` VALUES ('24', '24', '2343', '153');
INSERT INTO `t_nakes` VALUES ('25', '25', '53232', '1058');
INSERT INTO `t_nakes` VALUES ('26', '26', '23453', '922');
INSERT INTO `t_nakes` VALUES ('27', '27', '32423', '953');
INSERT INTO `t_nakes` VALUES ('28', '28', '2345', '188');
INSERT INTO `t_nakes` VALUES ('29', '29', '234', '90');
INSERT INTO `t_nakes` VALUES ('30', '30', '6435', '622');
INSERT INTO `t_nakes` VALUES ('31', '31', '3434', '210');
INSERT INTO `t_nakes` VALUES ('32', '32', '2342', '123');
INSERT INTO `t_nakes` VALUES ('33', '33', '5453', '590');
INSERT INTO `t_nakes` VALUES ('34', '34', '43433', '1031');

-- ----------------------------
-- Table structure for `t_perokok`
-- ----------------------------
DROP TABLE IF EXISTS `t_perokok`;
CREATE TABLE `t_perokok` (
  `id_perokok` int(11) NOT NULL AUTO_INCREMENT,
  `id_provinsi` int(11) NOT NULL,
  `persentase_perokok` decimal(15,0) NOT NULL,
  `jumlah_penduduk` int(11) NOT NULL,
  PRIMARY KEY (`id_perokok`),
  KEY `fk_rokok_provinsi` (`id_provinsi`),
  CONSTRAINT `fk_rokok_provinsi` FOREIGN KEY (`id_provinsi`) REFERENCES `t_provinsi` (`id_provinsi`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of t_perokok
-- ----------------------------
INSERT INTO `t_perokok` VALUES ('1', '1', '34', '1479822');
INSERT INTO `t_perokok` VALUES ('2', '2', '1', '1253728');
INSERT INTO `t_perokok` VALUES ('3', '3', '33', '1426378');
INSERT INTO `t_perokok` VALUES ('4', '4', '2', '1345678');
INSERT INTO `t_perokok` VALUES ('5', '5', '32', '1763456');
INSERT INTO `t_perokok` VALUES ('6', '6', '3', '1324654');
INSERT INTO `t_perokok` VALUES ('7', '7', '31', '1652709');
INSERT INTO `t_perokok` VALUES ('8', '8', '4', '1432567');
INSERT INTO `t_perokok` VALUES ('9', '9', '30', '1554433');
INSERT INTO `t_perokok` VALUES ('10', '10', '5', '1213456');
INSERT INTO `t_perokok` VALUES ('11', '11', '29', '1238232');
INSERT INTO `t_perokok` VALUES ('12', '12', '6', '1238392');
INSERT INTO `t_perokok` VALUES ('13', '13', '28', '1223231');
INSERT INTO `t_perokok` VALUES ('14', '14', '7', '1231231');
INSERT INTO `t_perokok` VALUES ('15', '16', '27', '5323966');
INSERT INTO `t_perokok` VALUES ('16', '15', '8', '3892922');
INSERT INTO `t_perokok` VALUES ('17', '17', '26', '4086802');
INSERT INTO `t_perokok` VALUES ('18', '18', '9', '6577824');
INSERT INTO `t_perokok` VALUES ('19', '19', '25', '9889594');
INSERT INTO `t_perokok` VALUES ('20', '20', '10', '8886715');
INSERT INTO `t_perokok` VALUES ('21', '21', '24', '4028616');
INSERT INTO `t_perokok` VALUES ('22', '22', '11', '8358941');
INSERT INTO `t_perokok` VALUES ('23', '23', '23', '8837425');
INSERT INTO `t_perokok` VALUES ('24', '24', '12', '4380450');
INSERT INTO `t_perokok` VALUES ('25', '25', '22', '6297672');
INSERT INTO `t_perokok` VALUES ('26', '26', '13', '9132696');
INSERT INTO `t_perokok` VALUES ('27', '27', '21', '7835104');
INSERT INTO `t_perokok` VALUES ('28', '28', '14', '1464726');
INSERT INTO `t_perokok` VALUES ('29', '29', '20', '4965882');
INSERT INTO `t_perokok` VALUES ('30', '30', '15', '4911103');
INSERT INTO `t_perokok` VALUES ('31', '31', '19', '246664');
INSERT INTO `t_perokok` VALUES ('32', '32', '16', '3321805');
INSERT INTO `t_perokok` VALUES ('33', '33', '18', '9166749');
INSERT INTO `t_perokok` VALUES ('34', '34', '17', '7661650');

-- ----------------------------
-- Table structure for `t_provinsi`
-- ----------------------------
DROP TABLE IF EXISTS `t_provinsi`;
CREATE TABLE `t_provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  PRIMARY KEY (`id_provinsi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_provinsi
-- ----------------------------
INSERT INTO `t_provinsi` VALUES ('1', 'ACEH');
INSERT INTO `t_provinsi` VALUES ('2', 'SUMATERA UTARA');
INSERT INTO `t_provinsi` VALUES ('3', 'SUMATERA BARAT');
INSERT INTO `t_provinsi` VALUES ('4', 'RIAU');
INSERT INTO `t_provinsi` VALUES ('5', 'JAMBI');
INSERT INTO `t_provinsi` VALUES ('6', 'SUMATERA SELATAN');
INSERT INTO `t_provinsi` VALUES ('7', 'BENGKULU');
INSERT INTO `t_provinsi` VALUES ('8', 'LAMPUNG');
INSERT INTO `t_provinsi` VALUES ('9', 'KEPULAUAN BANGKA BELITUNG');
INSERT INTO `t_provinsi` VALUES ('10', 'KEPULAUAN RIAU');
INSERT INTO `t_provinsi` VALUES ('11', 'DKI JAKARTA');
INSERT INTO `t_provinsi` VALUES ('12', 'JAWA BARAT');
INSERT INTO `t_provinsi` VALUES ('13', 'JAWA TENGAH');
INSERT INTO `t_provinsi` VALUES ('14', 'DI YOGYAKARTA');
INSERT INTO `t_provinsi` VALUES ('15', 'JAWA TIMUR');
INSERT INTO `t_provinsi` VALUES ('16', 'BANTEN');
INSERT INTO `t_provinsi` VALUES ('17', 'BALI');
INSERT INTO `t_provinsi` VALUES ('18', 'NUSA TENGGARA BARAT');
INSERT INTO `t_provinsi` VALUES ('19', 'NUSA TENGGARA TIMUR');
INSERT INTO `t_provinsi` VALUES ('20', 'KALIMANTAN BARAT');
INSERT INTO `t_provinsi` VALUES ('21', 'KALIMANTAN TENGAH');
INSERT INTO `t_provinsi` VALUES ('22', 'KALIMANTAN SELATAN');
INSERT INTO `t_provinsi` VALUES ('23', 'KALIMANTAN TIMUR');
INSERT INTO `t_provinsi` VALUES ('24', 'KALIMANTAN UTARA');
INSERT INTO `t_provinsi` VALUES ('25', 'SULAWESI UTARA');
INSERT INTO `t_provinsi` VALUES ('26', 'SULAWESI TENGAH');
INSERT INTO `t_provinsi` VALUES ('27', 'SULAWESI SELATAN');
INSERT INTO `t_provinsi` VALUES ('28', 'SULAWESI TENGGARA');
INSERT INTO `t_provinsi` VALUES ('29', 'GORONTALO');
INSERT INTO `t_provinsi` VALUES ('30', 'SULAWESI BARAT');
INSERT INTO `t_provinsi` VALUES ('31', 'MALUKU');
INSERT INTO `t_provinsi` VALUES ('32', 'MALUKU UTARA');
INSERT INTO `t_provinsi` VALUES ('33', 'PAPUA BARAT');
INSERT INTO `t_provinsi` VALUES ('34', 'PAPUA');

-- ----------------------------
-- Table structure for `t_status_bmi`
-- ----------------------------
DROP TABLE IF EXISTS `t_status_bmi`;
CREATE TABLE `t_status_bmi` (
  `id_status_bmi` int(11) NOT NULL AUTO_INCREMENT,
  `status_bmi` varchar(50) NOT NULL,
  PRIMARY KEY (`id_status_bmi`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of t_status_bmi
-- ----------------------------
INSERT INTO `t_status_bmi` VALUES ('1', 'Kurus');
INSERT INTO `t_status_bmi` VALUES ('2', 'Normal');
INSERT INTO `t_status_bmi` VALUES ('3', 'Kegemukan');
INSERT INTO `t_status_bmi` VALUES ('4', 'Obesitas');

-- ----------------------------
-- Table structure for `t_status_tdarah`
-- ----------------------------
DROP TABLE IF EXISTS `t_status_tdarah`;
CREATE TABLE `t_status_tdarah` (
  `id_status_tdarah` int(11) NOT NULL AUTO_INCREMENT,
  `status_tdarah` varchar(50) NOT NULL,
  PRIMARY KEY (`id_status_tdarah`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of t_status_tdarah
-- ----------------------------
INSERT INTO `t_status_tdarah` VALUES ('1', 'Rendah');
INSERT INTO `t_status_tdarah` VALUES ('2', 'Normal');
INSERT INTO `t_status_tdarah` VALUES ('3', 'Normal Tinggi (prehypertension)');
INSERT INTO `t_status_tdarah` VALUES ('4', 'Tinggi Tahap 1');
INSERT INTO `t_status_tdarah` VALUES ('5', 'Tinggi Tahap 2');

-- ----------------------------
-- Table structure for `t_tekanan_darah`
-- ----------------------------
DROP TABLE IF EXISTS `t_tekanan_darah`;
CREATE TABLE `t_tekanan_darah` (
  `id_tekanan_darah` int(11) NOT NULL AUTO_INCREMENT,
  `golongan_darah` varchar(10) DEFAULT NULL,
  `tekanan_darah` varchar(50) DEFAULT NULL,
  `id_status_tdarah` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tekanan_darah`),
  KEY `fk_tdarah_user` (`id_user`),
  KEY `fk_status_tdarah` (`id_status_tdarah`),
  CONSTRAINT `fk_tdarah_status` FOREIGN KEY (`id_status_tdarah`) REFERENCES `t_status_tdarah` (`id_status_tdarah`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tdarah_user` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of t_tekanan_darah
-- ----------------------------
INSERT INTO `t_tekanan_darah` VALUES ('1', 'B', '106/62', '1', '1');
INSERT INTO `t_tekanan_darah` VALUES ('2', 'O', '95/70', '2', '2');
INSERT INTO `t_tekanan_darah` VALUES ('3', 'A', '130/81', '3', '3');
INSERT INTO `t_tekanan_darah` VALUES ('4', 'A', '100/70', '2', '4');
INSERT INTO `t_tekanan_darah` VALUES ('5', 'B', '85/50', '1', '5');
INSERT INTO `t_tekanan_darah` VALUES ('6', 'AB', '90/60', '1', '6');
INSERT INTO `t_tekanan_darah` VALUES ('7', 'O', '120/80', '2', '7');
INSERT INTO `t_tekanan_darah` VALUES ('8', 'O', '156/93', '3', '8');
INSERT INTO `t_tekanan_darah` VALUES ('9', 'A', '83/50', '1', '9');
INSERT INTO `t_tekanan_darah` VALUES ('10', 'B', '140/90', '3', '10');
INSERT INTO `t_tekanan_darah` VALUES ('16', 'O', '120/80', '2', '24');
INSERT INTO `t_tekanan_darah` VALUES ('18', '', '', null, '25');
INSERT INTO `t_tekanan_darah` VALUES ('19', '', '', null, '26');
INSERT INTO `t_tekanan_darah` VALUES ('26', 'A', '120/80', '2', '34');
INSERT INTO `t_tekanan_darah` VALUES ('28', 'A', '90/80', '2', '36');
INSERT INTO `t_tekanan_darah` VALUES ('29', '', '', null, '37');
INSERT INTO `t_tekanan_darah` VALUES ('32', 'A', '88/88', '1', '40');
INSERT INTO `t_tekanan_darah` VALUES ('34', 'O', '120/79', '2', '42');
INSERT INTO `t_tekanan_darah` VALUES ('35', 'O', '120/30', '1', '43');
INSERT INTO `t_tekanan_darah` VALUES ('37', 'A', '120/70', '2', '44');

-- ----------------------------
-- Table structure for `t_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `usn_user` varchar(50) NOT NULL,
  `pass_user` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES ('1', 'tantanitania', 'tantanitania123');
INSERT INTO `t_user` VALUES ('2', 'imam', '123');
INSERT INTO `t_user` VALUES ('3', 'jellyjel', 'jellyjel123');
INSERT INTO `t_user` VALUES ('4', 'shakaard', 'shakaard123');
INSERT INTO `t_user` VALUES ('5', 'eysharan', 'eysharan123');
INSERT INTO `t_user` VALUES ('6', 'melaadeandra', 'melaadeandra123');
INSERT INTO `t_user` VALUES ('7', 'damarionley', 'damarionley123');
INSERT INTO `t_user` VALUES ('8', 'kaafibgskraa', 'kaafibgskraa123');
INSERT INTO `t_user` VALUES ('9', 'daniellesher', 'daniellesher123');
INSERT INTO `t_user` VALUES ('10', 'geralzavierre', 'geralzavierre123');
INSERT INTO `t_user` VALUES ('24', 'arul', '123');
INSERT INTO `t_user` VALUES ('25', 'arul2', '123');
INSERT INTO `t_user` VALUES ('26', 'tes', '123');
INSERT INTO `t_user` VALUES ('34', 'chalish', '123');
INSERT INTO `t_user` VALUES ('36', 'kashidota', '123');
INSERT INTO `t_user` VALUES ('37', 'kashidota2', '123');
INSERT INTO `t_user` VALUES ('40', 'aa', '123');
INSERT INTO `t_user` VALUES ('42', 'agung', '123');
INSERT INTO `t_user` VALUES ('43', 'barbie', '123');
INSERT INTO `t_user` VALUES ('44', 'bayu', '123');
DELIMITER ;;
CREATE TRIGGER `tr_hapus_user` AFTER DELETE ON `t_user` FOR EACH ROW BEGIN
	DELETE FROM t_datadiri WHERE id_user = OLD.id_user;
    DELETE FROM t_bmi WHERE id_user = OLD.id_user;
    DELETE FROM t_tekanan_darah WHERE id_user = OLD.id_user;
 END
;;
DELIMITER ;