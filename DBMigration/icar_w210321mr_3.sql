-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 31, 2021 at 02:48 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icar_w210321mr`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `article`, `created_at`) VALUES
(6, 3, 'HELLOOOOO', 'fjlkjf. alkjjjf', '2021-10-28 15:53:31'),
(7, 3, 'kflkl', 'jadfj', '2021-10-28 15:59:30'),
(13, 7, 'HEloooo Allll', 'sglkhassog apogjasgjasd\r\n\r\nagjag', '2021-10-31 03:34:46'),
(14, 7, 'fadsasdf', 'asdfafds\r\nhg\r\ndgj\r\nj\r\njg', '2021-10-31 03:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `profile_image`) VALUES
(2, 'user@domain.com', '$2y$10$Y8UHEZoC0.rxlyKaNRsuJODDqikwzZ5HWH7/F6n1h8BhHGQsf9hl2', 'John Doe', ''),
(3, 'user2@domain.com', '$2y$10$Y8UHEZoC0.rxlyKaNRsuJODDqikwzZ5HWH7/F6n1h8BhHGQsf9hl2', 'User 2 ', ''),
(4, 'user3@domain.com', '$2y$10$Y8UHEZoC0.rxlyKaNRsuJODDqikwzZ5HWH7/F6n1h8BhHGQsf9hl2', 'User 3', ''),
(6, 'user20@domain.ocm', '$2y$10$Y8UHEZoC0.rxlyKaNRsuJODDqikwzZ5HWH7/F6n1h8BhHGQsf9hl2', 'User 20', '2021.10.31.02.29.50-apphill-logo-favicon.png'),
(7, 'user30@domain.com', '$2y$10$Y8UHEZoC0.rxlyKaNRsuJODDqikwzZ5HWH7/F6n1h8BhHGQsf9hl2', 'User 30', '2021.10.31.02.34.33-megaphone.png'),
(9, 'kevin@domain.com', '$2y$10$L8kZlvM3XRJFod3OPwJHI.0LdNzepE1WaVp5lsz717KuXwHsiImbK', 'Kevin Durant', 'default_profile.png'),
(10, 'lebron@domain.com', '$2y$10$L8kZlvM3XRJFod3OPwJHI.0LdNzepE1WaVp5lsz717KuXwHsiImbK', 'Lebron James', 'default_profile.png'),
(11, 'mj@domain.com', '$2y$10$gwcCTk2Hq3DoTGYuRPJYMug3b5Ft5IRhGAUDcVFwjIvU45T5Ym6RS', 'Michael Jordan', 'default_profile.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
