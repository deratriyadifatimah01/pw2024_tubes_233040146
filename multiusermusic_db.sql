-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2024 at 03:38 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multiusermusic_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `file` varchar(1024) NOT NULL,
  `image` varchar(1024) NOT NULL,
  `title` varchar(100) NOT NULL,
  `views` int NOT NULL DEFAULT '0',
  `downloads` int NOT NULL DEFAULT '0',
  `popularity` int NOT NULL DEFAULT '0',
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `user_id`, `file`, `image`, `title`, `views`, `downloads`, `popularity`, `date`) VALUES
(6, 6, 'uploads/Rizky Febian - Hingga Tua Bersama [Official Music Video].mp3', 'uploads/OIP.jpeg', 'Hingga Tua Bersama', 1, 0, 1, '2024-06-12 01:36:29'),
(7, 5, 'uploads/Mahalini Mati Matian.mp3', 'uploads/mati.jpg', 'Mati-matian', 0, 0, 0, '2024-06-13 01:37:12'),
(8, 5, 'uploads/Mahalini Sisa Rasa (lapaklagu.wapkiz.mobi).mp3', 'uploads/sisarasa.jpg', 'SIsa Rasa', 0, 0, 0, '2024-06-13 01:49:44'),
(9, 5, 'uploads/Mahalini Sial.mp3', 'uploads/sial.jpg', 'Sial', 0, 0, 0, '2024-06-13 02:09:31'),
(10, 6, 'uploads/Rizky Febian Seperti Kisah Ft. Fivein (Keroncong).mp3', 'uploads/kasih.jpg', 'Seperti Kisah', 1, 0, 0, '2024-06-13 02:16:01'),
(11, 7, 'uploads/Tiara Andini – Kupu - Kupu (Official Lyric Video) (64).mp3', 'uploads/kupu.jpg', 'Kupu-Kupu', 0, 0, 0, '2024-06-13 02:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(6) NOT NULL,
  `date` datetime NOT NULL,
  `image` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `role`, `date`, `image`) VALUES
(1, 'dera', 'dera', 'triyadi', 'dera@email.com', 'dera1234', 'admin', '2023-02-22 07:53:01', 'uploads/Akon-net-worth-2020.jpg'),
(2, 'Mary', 'Mary', 'Jones', 'mary@email.com', '$2y$10$FUnZATyPSUysD5iKFHiC.e4Mvx5KV1dWPH5LGoMbFvTIc0lSyr.n6', 'user', '2023-02-22 07:58:52', 'uploads/895484e5-a3b0-47ff-a4bf-6d0ca1db6149-Tiffany-Jeffers-Faculty-Photo-021-Final-lores-1024x683.webp'),
(3, 'John Tha Killer', 'John', 'Batiste', 'john@email.com', '$2y$10$VXDwXR.12zDNlF0Xy8eiF.uGoq58U5uP9VM0Yn9YhTiKBj29nhwFO', 'user', '2023-02-23 16:22:23', 'uploads/791a047636136702e25ba1096b11cfe7.jpg'),
(5, 'Mahalini', 'Mahalini', 'Raharja', 'derafatimah@gmail.com', '$2y$10$peE.AWcWS.mdmMcR8eQqWeZ42YNmzeKCQtHWsPGgk0fnOyWiEtXo.', 'user', '2024-06-06 06:33:44', 'uploads/Mahalini.jpg'),
(6, 'Rizky', 'Rizky', 'Febiyan', 'muftihfirdaus@gmail.com', '$2y$10$zZT4raPgva4OKwzugZE1weIoebdMMFtRPb0LgHqJqf/6g.0Fd7Nei', 'user', '2024-06-12 01:29:51', 'uploads/rizkyjpg.jpg'),
(7, 'Tiara Andini', 'Tiara', 'Andini ', 'tiaraandini@gmail.com', '$2y$10$qTaJ/Mq.IqZAcioxw21DQO3MUWGZLDKZNXhIq901egBqPknFYPUmC', 'user', '2024-06-13 02:21:09', 'uploads/tiaraandini.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `title` (`title`),
  ADD KEY `views` (`views`),
  ADD KEY `popularity` (`popularity`),
  ADD KEY `downloads` (`downloads`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
