-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2016 at 01:11 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `mail` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` int(11) NOT NULL,
  `status` int(1) NOT NULL COMMENT '1: active 0:no-active 2:block',
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `mail`, `password`, `level`, `status`, `code`) VALUES
(1, 'abcd@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, 'HKSLTW'),
(2, 'aaaa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, 'HKSLTW'),
(3, '1111@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, 'HKSLTW'),
(4, '1234@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, 'HKSLTW'),
(5, 'haiahas@gmail.com', '1111', 0, 1, 'HKSLTW'),
(6, 'h1aiahas@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 0, 0, 'ZIKYFE'),
(7, 'h1a1iahas@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 0, 1, ''),
(8, 'h1a1iahas@gmail.ceom', 'a01610228fe998f515a72dd730294d87', 0, 1, ''),
(9, 'h1a1iashas@gmail.ceo', 'b59c67bf196a4758191e42f76670ceba', 0, 0, 'IPCYSJ'),
(10, 'h1a1iashas@gmail.ceo', 'b59c67bf196a4758191e42f76670ceba', 0, 1, ''),
(11, 'h1a1iah1as@gmail.ceo', 'b59c67bf196a4758191e42f76670ceba', 0, 0, 'WQDCKM'),
(12, 'haiahqas@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 0, 1, 'DXTCZR'),
(13, 'haras@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 0, 1, ''),
(14, 'haiawwwhas@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 0, 1, ''),
(15, 'haiahdeas@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 0, 1, ''),
(16, 'haiasshas@gmail.com', '8f60c8102d29fcd525162d02eed4566b', 0, 0, 'YXVMCO'),
(17, 'haiahas@gmail.comw', 'b59c67bf196a4758191e42f76670ceba', 0, 2, 'FBVDIC'),
(18, 'haiahas@gmail.com3', 'b59c67bf196a4758191e42f76670ceba', 0, 1, ''),
(19, 'haiahssas@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 0, 1, 'KNAETR'),
(20, 'haiahaqs@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 0, 1, 'KVZMGP'),
(48, 'buihai2603@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 1, 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
