-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2017 at 04:56 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bdo_community`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_artikel`
--

CREATE TABLE IF NOT EXISTS `data_artikel` (
  `idArtikel` varchar(10) NOT NULL,
  `dtArtikel` text NOT NULL,
  `tglArtikel` varchar(30) NOT NULL,
  `statusArtikel` varchar(30) NOT NULL,
  `creatorArtikel` varchar(30) NOT NULL,
  `idTag` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_komunitas`
--

CREATE TABLE IF NOT EXISTS `data_komunitas` (
  `idKomunitas` varchar(10) NOT NULL,
  `dataKomunitas` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_komunitas`
--

INSERT INTO `data_komunitas` (`idKomunitas`, `dataKomunitas`) VALUES
('kom1', 'Riders R6 Bandung'),
('kom2', 'Bandung Calisthenics'),
('kom3', 'Bandung City Arts Pedia');

-- --------------------------------------------------------

--
-- Table structure for table `data_tag`
--

CREATE TABLE IF NOT EXISTS `data_tag` (
  `idTag` varchar(10) NOT NULL,
  `dataTag` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE IF NOT EXISTS `table_user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(120) NOT NULL,
  `idKomunitas` varchar(10) NOT NULL,
  `role` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`username`, `password`, `email`, `idKomunitas`, `role`) VALUES
('abid', 'ghozi', 'abid@ghozi.com', 'kom1', 3),
('admin', 'admin', 'admin@bdocommunity.com', 'kom1', 2),
('super', 'super', 'super@bdocommunity.com', 'super', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_artikel`
--
ALTER TABLE `data_artikel`
  ADD PRIMARY KEY (`idArtikel`);

--
-- Indexes for table `data_komunitas`
--
ALTER TABLE `data_komunitas`
  ADD PRIMARY KEY (`idKomunitas`);

--
-- Indexes for table `data_tag`
--
ALTER TABLE `data_tag`
  ADD PRIMARY KEY (`idTag`);

--
-- Indexes for table `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
