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
(1,	'admin',	'admin',	'admin sndonlineshop');

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
(1,	'sandymulyanda03@gmail.com',	'12345',	'sandy mulyanda',	'L',	'0000-00-00',	'lubuk buaya ,padang ',	'082173056084',	'IMG_9581.JPG',	'2022-01-11 12:07:25'),
(3,	'sandymulyanda03@gmail.com',	'12345',	'sandy mulyanda',	'L',	'1999-05-05',	'lubuk buaya ,padang ',	'082173056084',	'IMG_9581.JPG',	'2022-01-11 12:07:25'),
(4,	'sandymulyanda03@gmail.com',	'12345',	'sandy mulyanda',	'L',	'1999-05-05',	'lubuk buaya ,padang ',	'082173056084',	'IMG_9581.JPG',	'2022-01-11 12:07:25'),
(5,	'sandymulyanda03@gmail.com',	'12345',	'sandy mulyanda',	'L',	'1999-05-05',	'lubuk buaya ,padang ',	'082173056084',	'IMG_9581.JPG',	'2022-01-11 12:07:25');

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `idcart` int NOT NULL AUTO_INCREMENT,
  `idproduk` int NOT NULL,
  `idanggota` int NOT NULL,
  `jumlahbeli` int NOT NULL,
  `tglcart` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idcart`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cart` (`idcart`, `idproduk`, `idanggota`, `jumlahbeli`, `tglcart`) VALUES
(12,	21,	1,	1,	'2022-01-23 17:40:33');

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
(1,	1,	'notebook',	'semua yang berhubungan dengan notebook',	'2021-12-02 10:37:11'),
(2,	1,	'printer',	'semua yang berhubungan dengan merk printer tersedia disini',	'2021-12-07 10:44:19'),
(3,	1,	'laptop',	'semua yang berhubungan dengan merk laptop tersedia disini',	'2021-12-07 10:44:57'),
(4,	1,	'handphone',	'semua yang berhubungan dengan Handphone printer tersedia disini',	'2021-12-07 10:49:23');

DROP TABLE IF EXISTS `orderdetail`;
CREATE TABLE `orderdetail` (
  `idorder` int NOT NULL,
  `idproduk` int NOT NULL,
  `idjasa` int NOT NULL,
  `jumlahbeli` int NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `orderdetail` (`idorder`, `idproduk`, `idjasa`, `jumlahbeli`, `subtotal`) VALUES
(1,	21,	1,	2,	2);

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `idorder` int NOT NULL AUTO_INCREMENT,
  `noorder` double NOT NULL,
  `idanggota` int NOT NULL,
  `alamatkirim` text NOT NULL,
  `total` double NOT NULL,
  `tglorder` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `statusorder` varchar(20) NOT NULL,
  PRIMARY KEY (`idorder`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `orders` (`idorder`, `noorder`, `idanggota`, `alamatkirim`, `total`, `tglorder`, `statusorder`) VALUES
(1,	21,	1,	'sdfdsfsss',	2,	'2022-01-23 16:01:23',	'Baru');

SET NAMES utf8mb4;

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

INSERT INTO `pembayaran` (`idbayar`, `idorder`, `namabankpengirim`, `namapengirim`, `jumlahtranfer`, `tgltranfer`, `namabankpenerima`, `bukti`) VALUES
(2,	1,	'223',	'22',	22222,	'2022-01-24',	'sdfdf',	'Screenshot from 2021-12-30 10-47-30.png');

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

INSERT INTO `produk` (`idproduk`, `idkat`, `idadmin`, `nama`, `harga`, `stok`, `spesifikasi`, `detail`, `diskon`, `berat`, `isikotak`, `foto1`, `foto2`, `tglproduk`) VALUES
(20,	3,	1,	'23',	234,	0,	'234234\"\"',	'234234',	5,	0,	'0',	'Screenshot from 2021-12-17 13-12-38.png',	'Screenshot from 2021-12-30 10-47-30.png',	'2022-01-23 16:46:57'),
(21,	3,	1,	'asdasdasd',	234,	5,	'234234\"',	'234234',	2342342,	23423,	'234324',	'Screenshot from 2021-12-17 13-12-38.png',	'Screenshot from 2021-12-30 10-47-30.png',	'2022-01-23 16:46:57'),
(22,	3,	1,	'23',	234,	2342,	'234234',	'234234',	2342342,	23423,	'234324',	'Screenshot from 2021-12-17 13-12-38.png',	'Screenshot from 2021-12-30 10-47-30.png',	'2022-01-23 16:46:57'),
(23,	3,	1,	'23',	234,	2342,	'234234',	'234234',	2342342,	23423,	'234324',	'Screenshot from 2021-12-17 13-12-38.png',	'Screenshot from 2021-12-30 10-47-30.png',	'2022-01-23 16:46:57');

-- 2022-01-24 07:50:06
