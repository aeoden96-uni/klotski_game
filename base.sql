-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2021 at 03:11 PM
-- Server version: 5.7.33-0ubuntu0.18.04.1
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `martinjak`
--

-- --------------------------------------------------------

--
-- Table structure for table `bricks`
--

CREATE TABLE `bricks` (
  `indX` int(11) NOT NULL,
  `indY` int(11) NOT NULL,
  `local_id` varchar(2) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `bricks`
--

INSERT INTO `bricks` (`indX`, `indY`, `local_id`) VALUES
(3, 0, '-1'),
(2, 0, '-1'),
(1, 0, '-1'),
(0, 5, '-1'),
(6, 4, '-1'),
(7, 1, '-1'),
(6, 1, '-1'),
(7, 5, '-1'),
(0, 4, '-1'),
(0, 2, '-1'),
(0, 3, '-1'),
(6, 5, '-1'),
(5, 5, '-1'),
(4, 5, '-1'),
(6, 0, '-1'),
(3, 5, '-1'),
(2, 5, '-1'),
(1, 5, '-1'),
(0, 1, '-1'),
(0, 0, '-1'),
(7, 0, '-1'),
(5, 0, '-1'),
(4, 0, '-1'),
(7, 4, '-1'),
(6, 2, '-2'),
(7, 2, '-2'),
(6, 3, '-2'),
(7, 3, '-2'),
(4, 1, '1'),
(3, 1, '1'),
(3, 4, '5'),
(4, 4, '5'),
(4, 2, '6'),
(4, 3, '6'),
(5, 1, '8'),
(1, 2, '10'),
(1, 3, '10'),
(2, 2, '10'),
(2, 3, '10');

-- --------------------------------------------------------

--
-- Table structure for table `bricks2`
--

CREATE TABLE `bricks2` (
  `indX` int(11) NOT NULL,
  `indY` int(11) NOT NULL,
  `local_id` varchar(2) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `bricks2`
--

INSERT INTO `bricks2` (`indX`, `indY`, `local_id`) VALUES
(3, 0, '-1'),
(2, 0, '-1'),
(1, 0, '-1'),
(0, 5, '-1'),
(6, 4, '-1'),
(7, 1, '-1'),
(6, 1, '-1'),
(7, 5, '-1'),
(0, 4, '-1'),
(0, 2, '-1'),
(0, 3, '-1'),
(6, 5, '-1'),
(5, 5, '-1'),
(4, 5, '-1'),
(6, 0, '-1'),
(3, 5, '-1'),
(2, 5, '-1'),
(1, 5, '-1'),
(0, 1, '-1'),
(0, 0, '-1'),
(7, 0, '-1'),
(5, 0, '-1'),
(4, 0, '-1'),
(7, 4, '-1'),
(6, 2, '-2'),
(7, 2, '-2'),
(6, 3, '-2'),
(7, 3, '-2'),
(1, 1, '1'),
(2, 1, '1'),
(1, 4, '2'),
(2, 4, '2'),
(3, 1, '3'),
(4, 1, '3'),
(3, 2, '4'),
(3, 3, '4'),
(3, 4, '5'),
(4, 4, '5'),
(4, 2, '6'),
(4, 3, '7'),
(5, 1, '8'),
(5, 4, '9'),
(1, 2, '10'),
(1, 3, '10'),
(2, 2, '10'),
(2, 3, '10');

-- --------------------------------------------------------

--
-- Table structure for table `bricks3`
--

CREATE TABLE `bricks3` (
  `indX` int(11) NOT NULL,
  `indY` int(11) NOT NULL,
  `local_id` varchar(2) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `bricks3`
--

INSERT INTO `bricks3` (`indX`, `indY`, `local_id`) VALUES
(2, 5, '2'),
(3, 5, '2'),
(3, 4, '2'),
(3, 3, '1'),
(3, 2, '1'),
(2, 2, '1'),
(2, 4, '10'),
(2, 3, '10'),
(1, 4, '10'),
(1, 3, '10'),
(8, 4, '-2'),
(8, 3, '-2'),
(7, 4, '-2'),
(7, 3, '-2'),
(8, 6, '-1'),
(8, 5, '-1'),
(8, 2, '-1'),
(8, 1, '-1'),
(7, 6, '-1'),
(7, 5, '-1'),
(7, 2, '-1'),
(7, 1, '-1'),
(8, 7, '-1'),
(8, 0, '-1'),
(7, 7, '-1'),
(7, 0, '-1'),
(6, 7, '-1'),
(6, 0, '-1'),
(5, 7, '-1'),
(5, 0, '-1'),
(4, 7, '-1'),
(4, 0, '-1'),
(3, 7, '-1'),
(3, 0, '-1'),
(2, 7, '-1'),
(2, 0, '-1'),
(1, 7, '-1'),
(1, 0, '-1'),
(0, 7, '-1'),
(0, 6, '-1'),
(0, 5, '-1'),
(0, 4, '-1'),
(0, 3, '-1'),
(0, 2, '-1'),
(0, 1, '-1'),
(0, 0, '-1'),
(4, 1, '3'),
(4, 2, '4'),
(4, 3, '4'),
(5, 2, '4'),
(4, 4, '5'),
(4, 5, '6'),
(4, 6, '6'),
(5, 6, '6'),
(5, 1, '7'),
(6, 1, '7'),
(6, 2, '7'),
(5, 3, '8'),
(5, 4, '8'),
(6, 3, '8'),
(6, 4, '8'),
(5, 5, '9'),
(6, 5, '9'),
(6, 6, '9');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `playerName` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `score` int(11) NOT NULL,
  `cheated` tinyint(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`playerName`, `score`, `cheated`, `date`, `id`, `level`) VALUES
('Mateo', 4, 1, '2021-05-02 12:46:16', 5, 3),
('Mateo', 7, 0, '2021-05-02 14:28:56', 9, 3),
('player 1', 3, 0, '2021-05-02 14:58:06', 11, 1),
('player 1', 3, 0, '2021-05-02 15:01:11', 12, 1);

-- --------------------------------------------------------


--
-- Indexes for table `bricks`
--
ALTER TABLE `bricks`
  ADD PRIMARY KEY (`indX`,`indY`);

--
-- Indexes for table `bricks2`
--
ALTER TABLE `bricks2`
  ADD PRIMARY KEY (`indX`,`indY`);

--
-- Indexes for table `bricks3`
--
ALTER TABLE `bricks3`
  ADD PRIMARY KEY (`indX`,`indY`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Studenti`
--
ALTER TABLE `Studenti`
  ADD PRIMARY KEY (`JMBAG`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
