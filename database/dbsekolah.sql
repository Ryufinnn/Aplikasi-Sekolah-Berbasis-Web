-- phpMyAdmin SQL Dump
-- version 3.1.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2016 at 09:31 PM
-- Server version: 5.1.35
-- PHP Version: 5.2.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbsekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `pengguna` varchar(30) NOT NULL,
  `sandi` varchar(30) NOT NULL,
  PRIMARY KEY (`pengguna`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`pengguna`, `sandi`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE IF NOT EXISTS `desa` (
  `kddes` char(3) NOT NULL,
  `nmdes` varchar(30) NOT NULL,
  `kdkec` char(3) NOT NULL,
  PRIMARY KEY (`kddes`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`kddes`, `nmdes`, `kdkec`) VALUES
('006', 'Keune ', '001'),
('005', 'Bangkeh', '001'),
('004', 'Mesjid Bambong', '018'),
('003', 'Cut', '018'),
('002', 'Bintang Hu', '022'),
('001', 'tuha', '022'),
('007', 'Cot Glumpang', '010'),
('008', 'Pulo Panjoe', '010'),
('009', 'Daka', '019'),
('010', 'Karieng', '019'),
('011', 'Dayah Caleu', '014'),
('012', 'Gle Gapui', '014'),
('013', 'Dayah Blang', '011'),
('014', 'Aron Asan Kumbang', '011'),
('015', 'Jijiem', '004'),
('016', 'Sagoe', '004'),
('017', 'Blang Paseh', '013'),
('018', 'Pasie Rawa', '013'),
('019', 'Mane', '002'),
('020', 'Blang Dalam', '002'),
('021', 'Dayah Andeu', '005'),
('022', 'Mesjid Ilot', '005'),
('023', 'Simpang Beutong', '021'),
('024', 'Suka Jaya', '021'),
('025', 'Mee Teungoh', '007'),
('026', 'Keumangan Cut', '007'),
('027', 'Jojo', '008'),
('028', 'Mee Adan', '008'),
('029', 'Pasar Padang Tiji', '020'),
('030', 'Kunyet', '020'),
('031', 'Mee Lampoh Saka', '015'),
('032', 'Dayah Sukon', '015'),
('033', 'Lhok Keutapang', '016'),
('034', 'Lampeudeu Baroh', '016'),
('035', 'Pasa Kota Bakti', '006'),
('036', 'Leupeum Mesjid', '006'),
('037', 'Pante', '012'),
('038', 'Jaja Baroh', '012'),
('039', 'Keude Tangse', '003'),
('040', 'Blang Dhot', '003'),
('041', 'Mancang', '023'),
('042', 'Pulo Tambo', '023'),
('043', 'Cut', '017'),
('044', 'Uke', '017'),
('045', 'Kampung Jumpa', '009'),
('046', 'Panjoe', '009'),
('047', 'dfg', '001');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE IF NOT EXISTS `kecamatan` (
  `kdkec` char(3) NOT NULL,
  `nmkec` varchar(30) NOT NULL,
  PRIMARY KEY (`kdkec`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`kdkec`, `nmkec`) VALUES
('001', 'Geumpang'),
('002', 'Mane'),
('003', 'Tangse'),
('004', 'Keumala'),
('005', 'Mila'),
('006', 'Sakti'),
('007', 'Mutiara'),
('008', 'Mutuara Timur'),
('009', 'Glumpang Tiga'),
('010', 'Glumpang Baro'),
('011', 'Keumbang Tanjong'),
('012', 'Simpang Tiga'),
('013', 'Kota Sigli'),
('014', 'Indrajaya'),
('015', 'Peukan Baro'),
('016', 'Pidie'),
('017', 'Mila'),
('018', 'Delima'),
('019', 'Grong Grong'),
('020', 'Padang Tiji'),
('021', 'Muara Tiga'),
('022', 'Bate'),
('023', 'Tiro');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_sekolah`
--

CREATE TABLE IF NOT EXISTS `lokasi_sekolah` (
  `kdsekolah` char(4) NOT NULL,
  `nmsekolah` varchar(30) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `kdkec` char(3) NOT NULL,
  `kddes` char(3) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(12) NOT NULL,
  `jlmmrd` varchar(4) NOT NULL,
  `jlmgr` varchar(4) NOT NULL,
  `nmkep` varchar(20) NOT NULL,
  `fasilitas` varchar(60) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  PRIMARY KEY (`kdsekolah`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi_sekolah`
--

INSERT INTO `lokasi_sekolah` (`kdsekolah`, `nmsekolah`, `jenis`, `kdkec`, `kddes`, `alamat`, `telp`, `jlmmrd`, `jlmgr`, `nmkep`, `fasilitas`, `lat`, `lng`) VALUES
('0002', 'SMP NEGERI 2 SIGLI', 'SMP', '013', '017', 'Jln Kota Sigli - Blang Paseh', '-', '230', '15', 'Drs. M. DIAH ALI, M.', 'Lab Komputer, Lapangan Volly,Ruanga belajar Ber AC', 5.38544912756142, 95.9625452756882),
('0001', 'SMP NEGERI 1 SIGLI', 'SMP', '016', '034', 'jln B Aceh Medan Sigli', '-', '104', '15', 'Drs. MUKHLIS', 'Ruang Belajar, Lapangan Basket, Lab komputer', 5.36365852402176, 95.9596914052963),
('0003', 'SMP NEGERI 3 SIGLI', 'SMP', '013', '018', 'Jln Lingkar Blang Paseh ', '-', '70', '10', 'Dra. SYAFRIWATI', 'Ruang Belajar, Lab Komputer', 5.39713455117617, 95.947739481926),
('0004', 'MTS N SIGLI', 'MTsN', '016', '034', 'Jl.Prof A.Madjid Ibrahim', '-', '120', '15', 'MUSTAFA, S.Ag', 'Ruang BElajar, Lab Komputer', 5.35914693498555, 95.9622529149055),
('0005', 'MTS N PADANG TIJI', 'MTsN', '020', '030', 'Jln.Banda Aceh Medan km.99 Desa Teugoh Drieng Gogo', '-', '90', '10', 'Drs. HASANUDDIN, M.P', 'Ruang Belajar, Lapangan Volly', 5.37586242623184, 95.8492138981819),
('0006', 'MTS N GRONG-GRONG ', 'MTsN', '019', '009', 'GAMPONG SUKON MEEMEUANEUK', '-', '170', '15', 'CUT ROSWATI', 'Lab Komputer, Lapangan Volly, Lapangan Bola Kaki', 5.37851680935476, 95.9107196331024);
