-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2023 at 02:37 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

CREATE DATABASE `img-uploader`;

USE `img-uploader`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `image-uploader`
--

-- --------------------------------------------------------

--
-- Table structure for table `kepek`
--

CREATE TABLE `kepek` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
);

--
-- Dumping data for table `kepek`
--

INSERT INTO `kepek` (`id`, `name`, `type`) VALUES
(162, '13306121406415ba03d1b412.53082452', 'jpg'),
(163, '3662192866415ba03d5bfe9.80404375', 'jpg'),
(164, '11539357076415ba03de9724.82790910', 'jpg'),
(165, '5232159956415ba03e66f09.88330721', 'jpg'),
(166, '17666375606415ba03e9fb67.65590669', 'jpg'),
(167, '4456137966415ba03f1f500.95721792', 'jpg'),
(168, '1444202696415ba04058b76.83272373', 'jpg'),
(169, '5839117036415ba040e6af8.04111035', 'jpg'),
(170, '1052476486415ba0414d8e8.88840184', 'jpg'),
(171, '15744215856415ba041c8fb5.76460024', 'jpg'),
(172, '10675496196415ba042446e7.69437722', 'jpg'),
(173, '2615165746415ba042c26f5.87229513', 'jpg'),
(174, '18168152856415ba0435b1a6.49761057', 'jpg'),
(175, '12161871996415ba04394ce3.62690458', 'jpg'),
(176, '14614462716415ba043f58e5.63183229', 'jpg'),
(177, '21209960046415ba0445aa50.49593327', 'jpg'),
(178, '13812964146415ba045318c2.43879961', 'jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kepek`
--
ALTER TABLE `kepek`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kepek`
--
ALTER TABLE `kepek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;
COMMIT;
