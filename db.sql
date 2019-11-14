/*
SQLyog Community v13.1.4  (64 bit)
MySQL - 10.1.37-MariaDB : Database - db_bank_sampah
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_bank_sampah` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_bank_sampah`;

/*Table structure for table `anggota` */

DROP TABLE IF EXISTS `anggota`;

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `nama_anggota` varchar(50) DEFAULT NULL,
  `umur` varchar(15) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `alamat` text,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(10) DEFAULT 'anggota',
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `anggota` */

insert  into `anggota`(`id_anggota`,`nama_anggota`,`umur`,`jenis_kelamin`,`alamat`,`username`,`password`,`level`) values 
(1,'Yono','24','laki-laki','Kupang Jawa timur','yono','yono','anggota');

/*Table structure for table `jenis_sampah` */

DROP TABLE IF EXISTS `jenis_sampah`;

CREATE TABLE `jenis_sampah` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_sampah` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `jenis_sampah` */

insert  into `jenis_sampah`(`id_jenis`,`jenis_sampah`) values 
(1,'Sampah Organik'),
(2,'Sampah Anorganik');

/*Table structure for table `pembelian` */

DROP TABLE IF EXISTS `pembelian`;

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `id_sampah` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `berat` int(3) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `ket` text,
  `tabungan` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_pembelian`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `pembelian` */

insert  into `pembelian`(`id_pembelian`,`id_sampah`,`tanggal`,`id_anggota`,`berat`,`total`,`ket`,`tabungan`) values 
(1,1,'2019-07-25',1,20,40000,'-','ya');

/*Table structure for table `penjualan` */

DROP TABLE IF EXISTS `penjualan`;

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `id_sampah` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `berat` int(3) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `petugas` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_penjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `penjualan` */

/*Table structure for table `sampah` */

DROP TABLE IF EXISTS `sampah`;

CREATE TABLE `sampah` (
  `id_sampah` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sampah` varchar(50) DEFAULT NULL,
  `id_jenis` int(3) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_sampah`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `sampah` */

insert  into `sampah`(`id_sampah`,`nama_sampah`,`id_jenis`,`harga_beli`,`harga_jual`,`stok`) values 
(1,'Sampah Botol Plastik',1,2000,2500,50),
(2,'Sampah Kantong Plastik',2,1000,1200,20);

/*Table structure for table `tabungan` */

DROP TABLE IF EXISTS `tabungan`;

CREATE TABLE `tabungan` (
  `id_tabungan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `tabungan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tabungan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tabungan` */

insert  into `tabungan`(`id_tabungan`,`id_user`,`tabungan`) values 
(1,1,40000);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `foto_user` varchar(50) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id_user`,`nama_user`,`username`,`password`,`email`,`foto_user`,`level`) values 
(4,'Administrator','admin','admin','admin@gmail.com','user_1563899386.png','admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
