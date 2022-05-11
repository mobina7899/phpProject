-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2021 at 08:28 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kosharayan`
--

-- --------------------------------------------------------

--
-- Table structure for table `about-us`
--

CREATE TABLE `about-us` (
  `id` int(11) NOT NULL,
  `pic` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `description` longtext COLLATE utf8_persian_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `about-us`
--

INSERT INTO `about-us` (`id`, `pic`, `description`, `title`) VALUES
(1, 'ds', 'fgfg', 'gffg');

-- --------------------------------------------------------

--
-- Table structure for table `company-member`
--

CREATE TABLE `company-member` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `family` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `takhasos` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `body` text COLLATE utf8_persian_ci NOT NULL,
  `pic` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `pic` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eftekharat`
--

CREATE TABLE `eftekharat` (
  `id` int(11) NOT NULL,
  `pic` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `body` longtext COLLATE utf8_persian_ci NOT NULL,
  `data` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eslider`
--

CREATE TABLE `eslider` (
  `id` int(10) NOT NULL,
  `pic` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `url` text COLLATE utf8_persian_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `created` date NOT NULL,
  `modifi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form-tamas`
--

CREATE TABLE `form-tamas` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `email` text COLLATE utf8_persian_ci NOT NULL,
  `body` text COLLATE utf8_persian_ci NOT NULL,
  `created` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery-pic`
--

CREATE TABLE `gallery-pic` (
  `id` int(10) NOT NULL,
  `pic` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `body` text COLLATE utf8_persian_ci NOT NULL,
  `fk_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_cat`
--

CREATE TABLE `gallery_cat` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `pic` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `body` longtext COLLATE utf8_persian_ci NOT NULL,
  `media` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `fk_cat` int(11) NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_cat`
--

CREATE TABLE `news_cat` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `porsesh-body`
--

CREATE TABLE `porsesh-body` (
  `id` int(10) NOT NULL,
  `fk-question` int(10) NOT NULL,
  `body` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `data` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `porsesh-pasokh`
--

CREATE TABLE `porsesh-pasokh` (
  `id` int(11) NOT NULL,
  `porsesh` text COLLATE utf8_persian_ci NOT NULL,
  `coder` int(11) NOT NULL,
  `data` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `body` text COLLATE utf8_persian_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product-pic`
--

CREATE TABLE `product-pic` (
  `id` int(11) NOT NULL,
  `pic` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `fk-product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `body` text COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tamas`
--

CREATE TABLE `tamas` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mobail` text COLLATE utf8_persian_ci NOT NULL,
  `watsapp` text COLLATE utf8_persian_ci NOT NULL,
  `telegram` text COLLATE utf8_persian_ci NOT NULL,
  `instagrag` text COLLATE utf8_persian_ci NOT NULL,
  `address` text COLLATE utf8_persian_ci NOT NULL,
  `lat` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `lon` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about-us`
--
ALTER TABLE `about-us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company-member`
--
ALTER TABLE `company-member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eftekharat`
--
ALTER TABLE `eftekharat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eslider`
--
ALTER TABLE `eslider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form-tamas`
--
ALTER TABLE `form-tamas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery-pic`
--
ALTER TABLE `gallery-pic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Gallery_GalleryCat` (`fk_cat`);

--
-- Indexes for table `gallery_cat`
--
ALTER TABLE `gallery_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_News_NewsCat` (`fk_cat`);

--
-- Indexes for table `news_cat`
--
ALTER TABLE `news_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `porsesh-body`
--
ALTER TABLE `porsesh-body`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-question` (`fk-question`),
  ADD KEY `fk-question_2` (`fk-question`),
  ADD KEY `fk-question_3` (`fk-question`),
  ADD KEY `fk-question_4` (`fk-question`),
  ADD KEY `fk-question_5` (`fk-question`),
  ADD KEY `fk-question_6` (`fk-question`);

--
-- Indexes for table `porsesh-pasokh`
--
ALTER TABLE `porsesh-pasokh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product-pic`
--
ALTER TABLE `product-pic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-product` (`fk-product`),
  ADD KEY `fk-product_2` (`fk-product`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tamas`
--
ALTER TABLE `tamas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about-us`
--
ALTER TABLE `about-us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `company-member`
--
ALTER TABLE `company-member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eftekharat`
--
ALTER TABLE `eftekharat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eslider`
--
ALTER TABLE `eslider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `form-tamas`
--
ALTER TABLE `form-tamas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery-pic`
--
ALTER TABLE `gallery-pic`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery_cat`
--
ALTER TABLE `gallery_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news_cat`
--
ALTER TABLE `news_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `porsesh-body`
--
ALTER TABLE `porsesh-body`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `porsesh-pasokh`
--
ALTER TABLE `porsesh-pasokh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product-pic`
--
ALTER TABLE `product-pic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tamas`
--
ALTER TABLE `tamas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `gallery-pic`
--
ALTER TABLE `gallery-pic`
  ADD CONSTRAINT `FK_Gallery_GalleryCat` FOREIGN KEY (`fk_cat`) REFERENCES `gallery_cat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `FK_News_NewsCat` FOREIGN KEY (`fk_cat`) REFERENCES `news_cat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `porsesh-body`
--
ALTER TABLE `porsesh-body`
  ADD CONSTRAINT `porsesh-body_ibfk_1` FOREIGN KEY (`fk-question`) REFERENCES `porsesh-pasokh` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-pic`
--
ALTER TABLE `product-pic`
  ADD CONSTRAINT `product-pic_ibfk_1` FOREIGN KEY (`fk-product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
