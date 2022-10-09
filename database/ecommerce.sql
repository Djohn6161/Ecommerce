-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2021 at 04:38 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `Game_name` varchar(150) NOT NULL,
  `game_image` varchar(500) NOT NULL,
  `game_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `Game_name`, `game_image`, `game_price`) VALUES
(7, 'Grand theft Auto', './Uploadedimg/bee24af44bb1cfab5cb963e1198aa2e2Grand Theft Auto IV - The Complete Edition.jpg', 200),
(8, '303 Squadron - Battle of Britain', './Uploadedimg/c9e06a034114b8be2f69015738f20706303 Squadron - Battle of Britain.jpg', 60),
(9, '428 -  Shibuya Scramble', './Uploadedimg/d76bf3b03f34ebbda7b4b06da8399924428 -  Shibuya Scramble.jpg', 50),
(10, 'Anno 1800 - Complete Edition', './Uploadedimg/4ed0afa887d0c48fd7d8bacbd656d351Anno 1800 - Complete Edition.jpg', 50),
(11, 'Halo - The Master Chief', './Uploadedimg/aaa03149c9a948e35b0d7af6ded9a779Halo - The Master Chief Collection.jpg', 50),
(12, 'Immortal - Unchained', './Uploadedimg/f30d1fcaa91c7eb82ede1b0fdae4f1c9Immortal - Unchained.jpg', 60),
(13, 'Gaia', './Uploadedimg/ace03ca499b0d46d4f3783451e6699a9Gaia.jpg', 45),
(14, 'Fable 3', './Uploadedimg/5369ed00dbac7d8ee9438967438c948dFable 3.jpg', 90),
(15, 'Dynasty Warriors 7', './Uploadedimg/8d91acf87e78752cca263731bf87f82aDynasty Warriors 7 - Xtreme Legends Definitive Edition.jpg', 80),
(17, 'Cricket 19', './Uploadedimg/3759f14bb1e9c2930245cf23e18a5a9cCricket 19.jpg', 50),
(18, 'CONTROL - Ultimate Edition', './Uploadedimg/b01ce697552cc35f215ccad9affeb3e5CONTROL - Ultimate Edition.jpg', 70),
(23, 'A Way Out', './Uploadedimg/9a9b70d6e4714b39a873ffb6dd0848caA Way Out.jpg', 50),
(26, 'attack on titan 2-Final Battle-', './Uploadedimg/4e77494301f4757bffab67e69f175065Attack on Titan 2 - Final Battle.jpg', 80),
(27, 'Amid Evil', './Uploadedimg/21d47ff8d99488d3add020841f0cee69Amid Evil.jpg', 150),
(28, 'Animal Crossing', './Uploadedimg/74a38702f20d0bf027f6fedac85f57bcAnimal Crossing - New Horizons.jpg', 80),
(29, 'After Party', './Uploadedimg/9eca34994214fd1e9e835793bc46af5aAfterparty.jpg', 150),
(30, 'Bake `n Switch', './Uploadedimg/05e0c4a31be01e312471b8d073628ac5Bake ‘n Switch.jpg', 45),
(31, 'Astroneer', './Uploadedimg/a0913d43263c2cec5414d4ff31e4393eASTRONEER.jpg', 150),
(32, 'Battlefield V', './Uploadedimg/cfcd621296abf0a12fa07d13ee0943c2Battlefield V.jpg', 80),
(35, 'A Total war saga', './Uploadedimg/9797b00af2ca79ea6bd7deb055c6d984A Total War Saga - Troy.jpg', 90),
(38, 'Helicopter', './Uploadedimg/5f30bbb54a742676f731f7f209cd2939Age of Empires 3 - Complete Collection.jpg', 150);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'don', '$2y$10$smPpnco3kuogRbrdAsTOj.ia0ex9x9rX54Sw52JiKFFXi29WC1PX.', '2021-12-08 19:20:32'),
(2, 'Admin', '$2y$10$3ecTjUnODiOcXyDiTGtMF.OdifHDpFrxYoUjG9Hk1qedlVQzOunDe', '2021-12-09 15:00:41'),
(3, 'Jerricho', '$2y$10$7dnOJ3Np7grzD/R/uSH5BuO.FpkZaXXsevWnmXR5qEL1UbaJ0tSJW', '2021-12-11 19:46:30'),
(4, 'MARY', '$2y$10$7rZOx0C/L2twfsaO7GsOxuxU3bDer8m25/OA54WOAIzvvIuD.UDom', '2021-12-11 21:20:29'),
(5, 'sample', '$2y$10$LZJLN72HDMda3oT/zqbWCeWhM1vf9wSNdnoDjTb/iuTBerB69EI0y', '2021-12-11 21:54:56'),
(6, 'don1', '$2y$10$nj0UZHWN5gcG3oU40vzBZO6NIENOFkuMOnqDJfknWMQKarlN0HKeC', '2021-12-11 23:13:39'),
(7, 'DON2', '$2y$10$YQ6uGX.WW5v4OmFlumglXO04w/y2mim6UYRn9OFUcEKf.dG4kIZ4O', '2021-12-11 23:23:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
