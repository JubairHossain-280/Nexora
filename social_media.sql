-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2025 at 04:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_media`
--

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `image_path`, `created_at`) VALUES
(4, 'uploads/stories/6832d10951aebaa56a2ab-782f-44f3-9f30-97f1801e5a79.jpg', '2025-05-25 08:12:57.335181'),
(5, 'uploads/stories/6832d12840d7fac3abcab-a4e3-4ec2-9300-1e53f6f7bcb8.jpg', '2025-05-25 08:13:28.266821'),
(6, 'uploads/stories/6832d13a078b1c705aad3-c9ab-4b20-b407-b9b99cc4fbae.jpg', '2025-05-25 08:13:46.031916'),
(7, 'uploads/stories/6832d14d67d83WhatsApp Image 2025-05-10 at 22.07.35_43b4b0e4.jpg', '2025-05-25 08:14:05.426021'),
(8, 'uploads/stories/6832d16194f69WhatsApp Image 2024-06-01 at 16.38.48_d9b9c018.jpg', '2025-05-25 08:14:25.610777'),
(9, 'uploads/stories/6832d16d36040WhatsApp Image 2024-05-27 at 22.37.55_8a033bf6.jpg', '2025-05-25 08:14:37.221907'),
(10, 'uploads/stories/6832d1adb6725WhatsApp Image 2024-05-30 at 21.17.39_e0e3e94b.jpg', '2025-05-25 08:15:41.748151'),
(11, 'uploads/stories/68332b76e95bcWhatsApp Image 2024-09-05 at 15.04.01_691e10dc.jpg', '2025-05-25 14:38:46.961085'),
(12, 'uploads/stories/68348b2adc5e7WhatsApp Image 2024-05-30 at 21.17.39_e0e3e94b.jpg', '2025-05-26 15:39:22.903759'),
(13, 'uploads/stories/68348b44ee5daWhatsApp Image 2024-09-05 at 15.04.01_691e10dc.jpg', '2025-05-26 15:39:48.977438'),
(14, 'uploads/stories/68348b525111aWhatsApp Image 2024-06-01 at 16.38.48_d9b9c018.jpg', '2025-05-26 15:40:02.333267'),
(15, 'uploads/stories/68348b674fdcaWhatsApp Image 2025-05-10 at 22.07.35_89c4fec6.jpg', '2025-05-26 15:40:23.329219');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `cover_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `dob`, `email`, `password`, `profile_image`, `cover_photo`) VALUES
(46, 'sakib', '2025-05-25', 'sakib@gmail.com', '$2y$10$tywQZAUIUOEN0LPG/FvgFuA13wjWum16Ly8bhitCMLbGMhMojTdKC', 'uploads/profiles/6833c9c7b7a82aa56a2ab-782f-44f3-9f30-97f1801e5a79.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
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
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
