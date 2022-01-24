-- Adminer 4.8.1 MySQL 8.0.27-0ubuntu0.20.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `idadmin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin` (`idadmin`, `username`, `password`, `namalengkap`) VALUES
(1,	'admin',	'admin',	'Admin SND STORE');

DROP TABLE IF EXISTS `anggota`;
CREATE TABLE `anggota` (
  `idanggota` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` char(1) NOT NULL,
  `tgllahir` date NOT NULL DEFAULT '0000-00-00',
  `alamat` text NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `foto` text NOT NULL,
  `tgldaftar` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idanggota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `anggota` (`idanggota`, `email`, `password`, `nama`, `jk`, `tgllahir`, `alamat`, `nohp`, `foto`, `tgldaftar`) VALUES
(1,	'sandymulyanda03@gmail.com',	'12345',	'sandy mulyanda',	'L',	'0000-00-00',	'lubuk buaya ,padang ',	'082173056084',	'IMG_9581.JPG',	'2022-01-11 12:07:25');

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `idcart` int NOT NULL AUTO_INCREMENT,
  `idproduk` int NOT NULL,
  `idanggota` int NOT NULL,
  `jumlahbeli` int NOT NULL,
  `tglcart` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idcart`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `jasakirim`;
CREATE TABLE `jasakirim` (
  `idjasa` int NOT NULL AUTO_INCREMENT,
  `idadmin` int NOT NULL,
  `nama` varchar(30) NOT NULL,
  `logo` text NOT NULL,
  `detail` text NOT NULL,
  `tarif` double NOT NULL,
  PRIMARY KEY (`idjasa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `jasakirim` (`idjasa`, `idadmin`, `nama`, `logo`, `detail`, `tarif`) VALUES
(1,	1,	'JNE',	'JNE-Logo_vectrostudio.jpg',	'sdfgrhtyhgrtjk y tyjyhrtykrujyeth jurjytj',	12000),
(2,	1,	'POS INDONESIA',	'pos-indo.png',	'kodjifrhotuoren ewgotijgre rouekng',	10000),
(3,	1,	'PANDU LOGISTIC',	'Pandu.png',	'SDFGHJHYHGF FRETJ ',	11000);

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `idcat` int NOT NULL AUTO_INCREMENT,
  `idadmin` int NOT NULL,
  `namakat` varchar(40) NOT NULL,
  `ketkat` text NOT NULL,
  `tglkat` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idcat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `kategori` (`idcat`, `idadmin`, `namakat`, `ketkat`, `tglkat`) VALUES
(8,	1,	'Converse Shoes',	'Semua Converse Shoes Tersedia Disini',	'2022-01-24 17:45:33'),
(9,	1,	'Casual Shoes',	'Semua Casual Shoes Tersedia Disini',	'2022-01-24 17:46:26'),
(10,	1,	'Running Shoes',	'Semua Running Shoes Tersedia Disini',	'2022-01-24 17:49:54');

DROP TABLE IF EXISTS `orderdetail`;
CREATE TABLE `orderdetail` (
  `idorder` double NOT NULL,
  `idproduk` int NOT NULL,
  `idjasa` int NOT NULL,
  `jumlahbeli` int NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


SET NAMES utf8mb4;

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `idorder` int NOT NULL AUTO_INCREMENT,
  `noorder` double NOT NULL,
  `idanggota` int NOT NULL,
  `alamatkirim` text NOT NULL,
  `total` double DEFAULT NULL,
  `tglorder` datetime NOT NULL,
  `statusorder` varchar(20) NOT NULL,
  PRIMARY KEY (`idorder`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran` (
  `idbayar` int NOT NULL AUTO_INCREMENT,
  `idorder` int NOT NULL,
  `namabankpengirim` varchar(50) NOT NULL,
  `namapengirim` varchar(50) NOT NULL,
  `jumlahtranfer` double NOT NULL,
  `tgltranfer` date NOT NULL,
  `namabankpenerima` varchar(50) NOT NULL,
  `bukti` text NOT NULL,
  PRIMARY KEY (`idbayar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk` (
  `idproduk` int NOT NULL AUTO_INCREMENT,
  `idkat` int NOT NULL,
  `idadmin` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` double NOT NULL,
  `stok` int NOT NULL,
  `spesifikasi` text NOT NULL,
  `detail` text NOT NULL,
  `diskon` int NOT NULL,
  `berat` float NOT NULL,
  `isikotak` text NOT NULL,
  `foto1` text NOT NULL,
  `foto2` text NOT NULL,
  `tglproduk` datetime NOT NULL,
  PRIMARY KEY (`idproduk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2022-01-24 11:15:56
