-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2019 at 12:49 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cas`
--

-- --------------------------------------------------------

--
-- Table structure for table `enterpreneur`
--

CREATE TABLE `enterpreneur` (
  `id` int(11) NOT NULL,
  `personId` varchar(200) NOT NULL,
  `person` varchar(191) NOT NULL,
  `likes` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fashionable`
--

CREATE TABLE `fashionable` (
  `id` int(11) NOT NULL,
  `personId` varchar(200) NOT NULL,
  `person` varchar(191) NOT NULL,
  `likes` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `focas`
--

CREATE TABLE `focas` (
  `id` int(11) NOT NULL,
  `personId` varchar(200) NOT NULL,
  `person` varchar(191) NOT NULL,
  `likes` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `freshman`
--

CREATE TABLE `freshman` (
  `id` int(11) NOT NULL,
  `person` varchar(191) NOT NULL,
  `personId` varchar(200) NOT NULL,
  `likes` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fypersonality`
--

CREATE TABLE `fypersonality` (
  `id` int(11) NOT NULL,
  `personId` varchar(200) NOT NULL,
  `person` varchar(191) NOT NULL,
  `likes` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leadership`
--

CREATE TABLE `leadership` (
  `id` int(11) NOT NULL,
  `personId` varchar(200) NOT NULL,
  `person` varchar(191) NOT NULL,
  `likes` int(11) NOT NULL,
  `user_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loggedin`
--

CREATE TABLE `loggedin` (
  `id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `loggedin` tinyint(1) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loggedin`
--

INSERT INTO `loggedin` (`id`, `user_id`, `token`, `loggedin`, `time`) VALUES
(3, 'ad13c72f1a89fd7992bbf77c2ad08c3fa1d5eaf850babed48976629c875646b76a9a42af15790208c003734c0cff87f4b111cd8a1c06434cdf32886e40b7f854', 'd51c0cebc69b2897c06b0fcaea83d1f4c5bbfd574ff00c5d592d2f6c7b20c7b26911916ec1af1b5c2c1c9f1d4954a82d8b377d8700d847386a876d1964d710a5', 1, 1553801675);

-- --------------------------------------------------------

--
-- Table structure for table `nominees`
--

CREATE TABLE `nominees` (
  `id` int(11) NOT NULL,
  `personId` varchar(200) NOT NULL,
  `reg_no` int(11) NOT NULL,
  `person` varchar(191) NOT NULL,
  `personImage` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nominees`
--

INSERT INTO `nominees` (`id`, `personId`, `reg_no`, `person`, `personImage`, `category`, `likes`) VALUES
(1, '373b07615a85818544dde34845639441064537621d9f81c897bea5e00d1ad13689f236e75fafde656919a7d3d2434fbd69129cf15784888cca2163986d6a77eb', 1402029, 'Adegbenro Comfort', 'uploads/ebae9d62c377513ff693973a6810e67b049619b0121c34edd10786535a94051f0d4d75eab6345751dcf4c3dcbe75c84eac97b092d63e43b10e08fd18f47ea69c_michael-dam-258165-unsplash.jpg', 'fypersonality', 0),
(2, '2ae9e256b1ae52d4e493ec613ecc903bca71925cf23e235bfc8194c537282adb848e769cae10dccc0390d2a8b9d23c4a49441925df0b7d168bef8ec336a3935a', 1500254, 'Ojo Zebulun', 'uploads/19a011ef1448afc45ac714779669cde72804b566f9a0cffc3bb077acf29d1ca3d1ecde53833e52d34894f5617712c1cbe87055f651ea74cb2c23492f61b2b730_zebulun.jpg', 'leadership', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sociable`
--

CREATE TABLE `sociable` (
  `id` int(11) NOT NULL,
  `personId` varchar(200) NOT NULL,
  `person` varchar(191) NOT NULL,
  `likes` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sportman`
--

CREATE TABLE `sportman` (
  `id` int(11) NOT NULL,
  `personId` varchar(200) NOT NULL,
  `person` varchar(191) NOT NULL,
  `likes` int(11) NOT NULL,
  `user_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `reg_no` int(11) NOT NULL,
  `password` varchar(191) NOT NULL,
  `voted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `reg_no`, `password`, `voted`) VALUES
(1, '7c4951702777a7edad814ebc19827b07024d72d6c9edf46dbffb45eed45572d304767156f696c28bddca3b5a867687c7235bcc6158792f5585a84810141132c3', 1700172, '$2y$10$qEyjNcQ9fNcPP1ewSxW9D.TS461J1VuzkSxZy8H/DeNxj5vXB8ppO', 0),
(2, 'f9b823d33f0b8af44d6aff157d7aa31e46528d14d4d458732e8f28358ddd94dca0c86073975305112e41c28449d206d0175414720cb09e00b531d91b450944a3', 1600172, '$2y$10$2knE/fbyoCZXkayZJiKMcedCZGg0MMLA09sHouRoGBPag7JuK37cm', 0),
(3, '0dcd52fd570c6b487fe4e5ac37a3e249b9826cd6d905a08b87111e4d935a70f1517eba1b26f3e9fe89d88b688db8cfdfd1e6424798eb28b1f16afe691c3a6fbf', 1800381, '$2y$10$.yvg.8Z7AMepB4L4/EHtsuNByD5UMvweyGr2y1hEWn2mnl6iYv5J6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `username` varchar(65) NOT NULL,
  `password` varchar(191) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `admin`) VALUES
(1, 'ad13c72f1a89fd7992bbf77c2ad08c3fa1d5eaf850babed48976629c875646b76a9a42af15790208c003734c0cff87f4b111cd8a1c06434cdf32886e40b7f854', 'zebulun', '$2y$10$7DtaShUNKxR1zenJBjxVe.CMMZd4JgjEqT6aP8IqcFQyykwVRuPRe', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enterpreneur`
--
ALTER TABLE `enterpreneur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `fashionable`
--
ALTER TABLE `fashionable`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `focas`
--
ALTER TABLE `focas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `freshman`
--
ALTER TABLE `freshman`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `fypersonality`
--
ALTER TABLE `fypersonality`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `leadership`
--
ALTER TABLE `leadership`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `loggedin`
--
ALTER TABLE `loggedin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nominees`
--
ALTER TABLE `nominees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sociable`
--
ALTER TABLE `sociable`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `sportman`
--
ALTER TABLE `sportman`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reg_no` (`reg_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enterpreneur`
--
ALTER TABLE `enterpreneur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fashionable`
--
ALTER TABLE `fashionable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `focas`
--
ALTER TABLE `focas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freshman`
--
ALTER TABLE `freshman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fypersonality`
--
ALTER TABLE `fypersonality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leadership`
--
ALTER TABLE `leadership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loggedin`
--
ALTER TABLE `loggedin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nominees`
--
ALTER TABLE `nominees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sociable`
--
ALTER TABLE `sociable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sportman`
--
ALTER TABLE `sportman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
