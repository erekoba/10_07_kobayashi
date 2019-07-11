-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 11, 2019 at 02:21 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gsf_d03_db07`
--

-- --------------------------------------------------------

--
-- Table structure for table `php02_table`
--

CREATE TABLE `php02_table` (
  `id` int(12) NOT NULL,
  `task` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL,
  `image` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `send` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recieve` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trash` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `php02_table`
--

INSERT INTO `php02_table` (`id`, `task`, `deadline`, `comment`, `indate`, `image`, `send`, `recieve`, `trash`) VALUES
(6, 'php課題', '2019-06-08', '難しい', '2019-06-08 15:41:26', NULL, 'erekasi', '11111', 1),
(11, 'kadai', '2019-06-13', 'aaaa', '2019-06-08 17:05:54', NULL, '11111', 'erekasi', 0),
(12, 'モヤモヤ', '2019-06-15', 'モヤモヤモヤ', '2019-06-08 17:07:11', NULL, '11111', 'erekasi', 1),
(17, '企画', '2019-07-04', '期日守れよ', '2019-07-04 22:16:38', NULL, 'erekoba', 'erekasi', NULL),
(18, 'kadai', '2019-07-15', '早くやれよ', '2019-07-04 22:19:18', NULL, 'erekoba', 'erekasi', 0),
(19, '企画', '2019-07-10', 'aaaa', '2019-07-04 22:24:16', NULL, 'erekasi', '11111', 0),
(20, '課題', '2019-07-19', 'aaaa', '2019-07-04 22:24:29', NULL, 'erekasi', 'erekoba', 0),
(21, '企画', '2019-07-11', 'お疲れ', '2019-07-04 22:39:04', NULL, 'erekasi', 'erekoba', 1),
(23, '企画', '2019-07-12', 'やれ', '2019-07-06 14:06:19', NULL, 'erekasi', 'erekoba', 1),
(24, '画像', '2019-07-26', '', '2019-07-06 16:26:13', NULL, NULL, NULL, NULL),
(25, '画像', '2019-07-12', '', '2019-07-06 16:29:24', NULL, NULL, NULL, NULL),
(26, '課題', '2019-07-19', '', '2019-07-06 16:30:31', 'upload/20190706073031d41d8cd98f00b204e9800998ecf8427e.png', NULL, NULL, NULL),
(27, 'whyme', '2019-07-12', '', '2019-07-06 16:31:57', 'upload/20190706073157d41d8cd98f00b204e9800998ecf8427e.png', NULL, NULL, NULL),
(28, 'aaaa', '2019-07-10', 'aaa', '2019-07-06 18:03:29', NULL, NULL, NULL, NULL),
(29, 'aaaa', '2019-07-10', 'aaaa', '2019-07-07 11:34:44', NULL, NULL, NULL, NULL),
(30, 'aaaa', '2019-07-18', 'aaaaa', '2019-07-07 11:42:58', NULL, NULL, NULL, NULL),
(31, 'whyme', '2019-07-18', 'aaa', '2019-07-11 23:13:33', NULL, 'erekoba', '0000', 1),
(32, 'whyme', '2019-07-12', '', '2019-07-11 23:16:29', 'upload/20190711021629d41d8cd98f00b204e9800998ecf8427e.png', 'erekoba', 'erekasi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(3, 'kota', 'erekasi', '1111', 0, 0),
(4, 'koba', '0000', '0', 0, 1),
(5, 'recruit', '11111', '99999', 0, 0),
(6, 'kota kobayashi', 'erekoba', '753091', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `php02_table`
--
ALTER TABLE `php02_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `php02_table`
--
ALTER TABLE `php02_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
