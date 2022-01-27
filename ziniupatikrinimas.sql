-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 04:03 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ziniupatikrinimas`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_userid`
--

CREATE TABLE `cart_userid` (
  `vartotojo_vardas` varchar(11) NOT NULL,
  `prekes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_userid`
--

INSERT INTO `cart_userid` (`vartotojo_vardas`, `prekes_id`) VALUES
('', 1),
('', 8),
('', 8),
('', 7),
('John', 6),
('John', 1),
('John', 1),
('John', 3);

-- --------------------------------------------------------

--
-- Table structure for table `produktai`
--

CREATE TABLE `produktai` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(255) NOT NULL,
  `nuotrauka` varchar(255) NOT NULL,
  `kaina` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produktai`
--

INSERT INTO `produktai` (`id`, `pavadinimas`, `nuotrauka`, `kaina`) VALUES
(1, 'Samsung J2 Pro', '1.jpg', 100.00),
(2, 'HP Notebook', '2.jpg', 299.00),
(3, 'Obuoliai', '3.jpg', 125.00),
(4, 'Kriauses', '4.jpg', 125.00),
(5, 'Ledai', '5.jpg', 125.00),
(6, 'Darzoves', '6.jpg', 125.00),
(7, 'Cementas', '7.jpg', 125.00),
(8, 'Glaistas', '8.jpg', 125.00);

-- --------------------------------------------------------

--
-- Table structure for table `vartotojai`
--

CREATE TABLE `vartotojai` (
  `id` int(11) NOT NULL,
  `vardas` varchar(255) DEFAULT NULL,
  `pavarde` varchar(255) DEFAULT NULL,
  `slaptazodis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vartotojai`
--

INSERT INTO `vartotojai` (`id`, `vardas`, `pavarde`, `slaptazodis`) VALUES
(1, 'John', 'Doe', 'pirmas'),
(2, 'Jonas', 'Doh', 'antras');

-- --------------------------------------------------------

--
-- Table structure for table `vertinimas`
--

CREATE TABLE `vertinimas` (
  `vardas` varchar(11) DEFAULT NULL,
  `vidurkis` float(11,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vertinimas`
--

INSERT INTO `vertinimas` (`vardas`, `vidurkis`) VALUES
('0', 3.0),
('0', 4.0),
('0', 0.0),
('0', 0.0),
('0', 0.0),
('0', 0.0),
('0', 3.0),
('0', 0.0),
('John', 4.0),
('John', 0.0),
('John', 4.0),
('jonas', 5.0),
('John', 4.0),
('John', 4.0),
('John', 4.6);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
