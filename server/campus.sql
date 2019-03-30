-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2019 at 02:59 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campus`
--

-- --------------------------------------------------------

--
-- Table structure for table `loggedin`
--

CREATE TABLE `loggedin` (
  `id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `loggedin` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loggedin`
--

INSERT INTO `loggedin` (`id`, `user_id`, `token`, `loggedin`, `time`) VALUES
(1, '116060667f1cfe627a1ac5bbfb1aa3d948ff38b1955dd082242af0b45ed65ee7e8cc9baadd91991fa40e8ce22e516fd27dd1a76c23f5c6659109ea1252c8ab0f', '93cc4ae4cbeeea4e5e842fce08782704db54471001dd4998cb3d555b4f577b21c4ace401d2f12115664ba7f6d8c8125c82a2497e725c78ce171b0436f394e956', 1, 1552312395);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `reg_no` int(7) NOT NULL,
  `webmail` varchar(200) NOT NULL,
  `product` varchar(191) NOT NULL,
  `tent` varchar(20) NOT NULL,
  `payment` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '116060667f1cfe627a1ac5bbfb1aa3d948ff38b1955dd082242af0b45ed65ee7e8cc9baadd91991fa40e8ce22e516fd27dd1a76c23f5c6659109ea1252c8ab0f', 'uchella', '$2y$10$kh51dpFxxEmvyuEQRks3f.oe2vn7Pz.yy1W6pM9wAZ03CD2DhPuxi', 1),
(2, '6cd23db79f927ad2a63c0963783ae583bc53fe128a6e525e1adb6a49c91f2beec5e355c6ba4b804677a6251e5fe586c8d63f1a13f886f4a33a3ad5e24f573f8a', 'klefcodes', '$2y$10$qSIxgcr21uWdchHUVoID/ulq6g/opYDCCdEfwSn6whpR.x5wqyNky', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loggedin`
--
ALTER TABLE `loggedin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reg_no` (`reg_no`),
  ADD UNIQUE KEY `webmail` (`webmail`);

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
-- AUTO_INCREMENT for table `loggedin`
--
ALTER TABLE `loggedin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
