-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2023 at 08:37 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jukebox`
--

-- --------------------------------------------------------

--
-- Table structure for table `music_list`
--

CREATE TABLE `music_list` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `audio_path` text DEFAULT NULL,
  `image_path` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `music_list`
--

INSERT INTO `music_list` (`id`, `title`, `description`, `audio_path`, `image_path`, `date_created`, `date_updated`) VALUES
(2, 'Tere Bina', 'authors', './resources/audio/tere_bina.mp3?v=1683275047', './resources/images/0_music1.jpg?v=1683275047', '2023-05-05 13:30:49', '2023-05-05 13:54:07'),
(3, 'Believer', 'authors', './resources/audio/believer.mp3?v=1683274806', './resources/images/0_music3.jpg?v=1683274806', '2023-05-05 13:50:06', '2023-05-05 13:50:06'),
(4, '3-movie', '3 BGM', './resources/audio/0_illayaraja.mp3?v=1683280262', './resources/images/1_0_music3.jpg?v=1683280263', '2023-05-05 15:21:02', '2023-05-05 15:21:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `music_list`
--
ALTER TABLE `music_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `music_list`
--
ALTER TABLE `music_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
