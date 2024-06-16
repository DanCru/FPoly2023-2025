CREATE DATABASE  IF NOT EXISTS `assignment` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `assignment`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: assignment
-- ------------------------------------------------------
-- Server version	8.2.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `phieu_muon`
--

DROP TABLE IF EXISTS `phieu_muon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `phieu_muon` (
  `ma_phieu` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `ngay_muon` date DEFAULT NULL,
  `ngay_tra` date DEFAULT NULL,
  `trang_thai` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ma_sinh_vien` varchar(7) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`ma_phieu`),
  KEY `ma_sinh_vien` (`ma_sinh_vien`),
  CONSTRAINT `phieu_muon_ibfk_1` FOREIGN KEY (`ma_sinh_vien`) REFERENCES `sinh_vien` (`ma_sinh_vien`),
  CONSTRAINT `muon_tra` CHECK ((`ngay_muon` <= `ngay_tra`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phieu_muon`
--

LOCK TABLES `phieu_muon` WRITE;
/*!40000 ALTER TABLE `phieu_muon` DISABLE KEYS */;
INSERT INTO `phieu_muon` VALUES ('D1','2017-05-04','2017-05-11','Đã trả','PA0829'),('D2','2017-03-25','2017-04-02','Đã trả','PA0485'),('D3','2017-04-10','2017-04-17','Đã trả','PA0832'),('H1','2017-07-12','2017-07-19','Chưa trả','PA0943'),('K1','2017-06-22','2017-06-29','Chưa trả','PA0333'),('K2','2017-01-11','2017-01-18','Đã trả','PA0399'),('L1','2017-10-01','2017-10-07','Chưa trả','PA0189'),('L2','2017-05-05','2017-05-12','Chưa trả','PA0294'),('T1','2017-11-08','2017-11-15','Chưa trả','PA0239'),('V1','2017-01-18','2017-01-25','Đã trả','PA0471');
/*!40000 ALTER TABLE `phieu_muon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phieu_muon_chi_tiet`
--

DROP TABLE IF EXISTS `phieu_muon_chi_tiet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `phieu_muon_chi_tiet` (
  `ma_phieu_muon_chi_tiet` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `ma_phieu` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ma_sach` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ghi_chu` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`ma_phieu_muon_chi_tiet`),
  KEY `ma_phieu` (`ma_phieu`),
  KEY `ma_sach` (`ma_sach`),
  CONSTRAINT `phieu_muon_chi_tiet_ibfk_1` FOREIGN KEY (`ma_phieu`) REFERENCES `phieu_muon` (`ma_phieu`),
  CONSTRAINT `phieu_muon_chi_tiet_ibfk_2` FOREIGN KEY (`ma_sach`) REFERENCES `sach` (`ma_sach`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phieu_muon_chi_tiet`
--

LOCK TABLES `phieu_muon_chi_tiet` WRITE;
/*!40000 ALTER TABLE `phieu_muon_chi_tiet` DISABLE KEYS */;
INSERT INTO `phieu_muon_chi_tiet` VALUES ('MPM01','D1','1A','Chưa trả sách'),('MPM010','K2','3C','Đã trả sách'),('MPM02','H1','2B','Đã trả sách'),('MPM03','D2','3C','Đã trả sách'),('MPM04','T1','4D','Chưa trả sách'),('MPM05','V1','5E','Chưa trả sách'),('MPM06','D3','1A','Đã trả sách'),('MPM07','L1','4D','Chưa trả sách'),('MPM08','L2','2B','Đã trả sách'),('MPM09','K1','4D','Chưa trả sách');
/*!40000 ALTER TABLE `phieu_muon_chi_tiet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sach`
--

DROP TABLE IF EXISTS `sach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sach` (
  `ma_sach` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `ten_sach` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nxb` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tac_gia` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `so_trang` int DEFAULT NULL,
  `so_luong` int DEFAULT NULL,
  `gia_tien` decimal(10,3) DEFAULT NULL,
  `ngay_nhap_kho` date DEFAULT NULL,
  `vi_tri` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ma_the_loai` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ban_sao` int DEFAULT NULL,
  PRIMARY KEY (`ma_sach`),
  KEY `ma_the_loai` (`ma_the_loai`),
  CONSTRAINT `sach_ibfk_1` FOREIGN KEY (`ma_the_loai`) REFERENCES `the_loai` (`ma_the_loai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sach`
--

LOCK TABLES `sach` WRITE;
/*!40000 ALTER TABLE `sach` DISABLE KEYS */;
INSERT INTO `sach` VALUES ('1A','SQL','FPT','Bảo Ninh',156,92,150000.000,'2014-01-01','a1','KT',1),('2B','Javascript','TDT','Stephen Hawking',756,25,210000.000,'2014-01-02','b2','VH',10),('3C','Photoshop','UEF','Dương Thuỵ',456,74,470000.000,'2015-01-01','c3','IT',5),('4D','HTML','NTT','Sơn Nam',656,54,220000.000,'2015-01-02','d4','DL',12),('5E','English','UPT','J.K.Rowling',256,78,180000.000,'2015-01-03','e5','NN',2),('6F','Javascript','FPT','Bảo Ninh',424,63,580000.000,'2014-01-03','f6','VH',5),('7H','English','UEF','Sơn Nam',646,24,431200.000,'2013-01-01','h7','NN',12),('8I','Photoshop','FPT','Dương Thuỵ',735,16,87710.000,'2013-01-02','i8','IT',8),('9U','HTML','TDT','Stephen Hawking',811,21,275000.000,'2017-01-01','u9','DL',9),('Z10','SQL','NTT','J.K.Rowling',429,33,654000.000,'2017-01-02','z10','KT',11);
/*!40000 ALTER TABLE `sach` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sinh_vien`
--

DROP TABLE IF EXISTS `sinh_vien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sinh_vien` (
  `ma_sinh_vien` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `ten_sinh_vien` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `chuyen_nganh` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sdt` int DEFAULT NULL,
  PRIMARY KEY (`ma_sinh_vien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sinh_vien`
--

LOCK TABLES `sinh_vien` WRITE;
/*!40000 ALTER TABLE `sinh_vien` DISABLE KEYS */;
INSERT INTO `sinh_vien` VALUES ('PA0189','Ngô Minh Kiên','DDT','kiennmPA0239@fpt.edu.vn',582313145),('PA0239','Thạch Nhật Tiến','QTKD','tientnPA0239@fpt.edu.vn',832732442),('PA0294','Đinh Văn Long','TĐH','longdvps12395@fpt.edu.vn',239934356),('PA0333','Trần Nam Kiệt','TKĐH','kiettnPA0239@fpt.edu.vn',823823952),('PA0399','Trần Thị Mỹ Linh','K-Beauty','linhttmps12395@fpt.edu.vn',812838313),('PA0471','Trần Thị Thuý Vân','K-Beauty','vanntbPA09765@fpt.edu.vn',412738534),('PA0485','Trần Quốc Dũng','TKĐH','dungnhps34854@fpt.edu.vn',732524424),('PA0829','Nguyễn Hoàng Duy','CNTT','duynhPA0829@fpt.edu.vn',919993715),('PA0832','Nguyễn Xuân Đào','QTKD','daonxPA0239@fpt.edu.vn',424231234),('PA0943','Nguyễn Đăng Hưng','TĐH','hungnvPA0943@fpt.edu.vn',943247731);
/*!40000 ALTER TABLE `sinh_vien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `the_loai`
--

DROP TABLE IF EXISTS `the_loai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `the_loai` (
  `ma_the_loai` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `ten_loai` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`ma_the_loai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `the_loai`
--

LOCK TABLES `the_loai` WRITE;
/*!40000 ALTER TABLE `the_loai` DISABLE KEYS */;
INSERT INTO `the_loai` VALUES ('DL','Du lịch'),('IT','Công nghệ thông tin'),('KT','Kinh tế'),('NN','Ngoại ngữ'),('VH','Văn học');
/*!40000 ALTER TABLE `the_loai` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-23  0:20:44
