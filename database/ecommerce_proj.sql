-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2022 at 09:23 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `games_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `Progress` tinyint(1) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Cart_id`, `user_id`, `games_id`, `quantity`, `Progress`, `total_price`) VALUES
(25, 9, 7, 12, 0, 2400);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `Game_name` varchar(150) NOT NULL,
  `game_image` varchar(500) NOT NULL,
  `game_price` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Rating` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `Game_name`, `game_image`, `game_price`, `Description`, `Rating`) VALUES
(7, 'Grand theft Auto', './Uploadedimg/bee24af44bb1cfab5cb963e1198aa2e2Grand Theft Auto IV - The Complete Edition.jpg', 200, '', 5),
(8, '303 Squadron - Battle of Britain', './Uploadedimg/c9e06a034114b8be2f69015738f20706303 Squadron - Battle of Britain.jpg', 90, 'hasdnsapdas', 3),
(9, '428 -  Shibuya Scramble', './Uploadedimg/d76bf3b03f34ebbda7b4b06da8399924428 -  Shibuya Scramble.jpg', 50, '', 2),
(10, 'Anno 1800 - Complete Edition', './Uploadedimg/4ed0afa887d0c48fd7d8bacbd656d351Anno 1800 - Complete Edition.jpg', 50, '', 5),
(11, 'Halo - The Master Chief', './Uploadedimg/aaa03149c9a948e35b0d7af6ded9a779Halo - The Master Chief Collection.jpg', 50, '', 4),
(12, 'Immortal - Unchained', './Uploadedimg/f30d1fcaa91c7eb82ede1b0fdae4f1c9Immortal - Unchained.jpg', 60, '', 3),
(13, 'Gaia', './Uploadedimg/ace03ca499b0d46d4f3783451e6699a9Gaia.jpg', 45, '', 4),
(14, 'Fable 3', './Uploadedimg/5369ed00dbac7d8ee9438967438c948dFable 3.jpg', 90, '', 0),
(15, 'Dynasty Warriors 7', './Uploadedimg/8d91acf87e78752cca263731bf87f82aDynasty Warriors 7 - Xtreme Legends Definitive Edition.jpg', 80, '', 0),
(17, 'Cricket 19', './Uploadedimg/3759f14bb1e9c2930245cf23e18a5a9cCricket 19.jpg', 50, '', 0),
(18, 'CONTROL - Ultimate Edition', './Uploadedimg/b01ce697552cc35f215ccad9affeb3e5CONTROL - Ultimate Edition.jpg', 70, '', 0),
(23, 'A Way Out', './Uploadedimg/9a9b70d6e4714b39a873ffb6dd0848caA Way Out.jpg', 50, '', 0),
(26, 'attack on titan 2-Final Battle-', './Uploadedimg/4e77494301f4757bffab67e69f175065Attack on Titan 2 - Final Battle.jpg', 80, '', 0),
(27, 'Amid Evil', './Uploadedimg/21d47ff8d99488d3add020841f0cee69Amid Evil.jpg', 150, '', 0),
(28, 'Animal Crossing', './Uploadedimg/74a38702f20d0bf027f6fedac85f57bcAnimal Crossing - New Horizons.jpg', 80, '', 0),
(29, 'After Party', './Uploadedimg/9eca34994214fd1e9e835793bc46af5aAfterparty.jpg', 150, '', 0),
(30, 'Bake `n Switch', './Uploadedimg/05e0c4a31be01e312471b8d073628ac5Bake ‘n Switch.jpg', 45, '', 0),
(31, 'Astroneer', './Uploadedimg/a0913d43263c2cec5414d4ff31e4393eASTRONEER.jpg', 150, '', 0),
(32, 'Battlefield V', './Uploadedimg/cfcd621296abf0a12fa07d13ee0943c2Battlefield V.jpg', 80, '', 0),
(35, 'A Total war saga', './Uploadedimg/9797b00af2ca79ea6bd7deb055c6d984A Total War Saga - Troy.jpg', 90, '', 0),
(38, 'Helicopter', './Uploadedimg/5f30bbb54a742676f731f7f209cd2939Age of Empires 3 - Complete Collection.jpg', 150, '', 0);

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
(2, 'Admin', '$2y$10$3ecTjUnODiOcXyDiTGtMF.OdifHDpFrxYoUjG9Hk1qedlVQzOunDe', '2021-12-09 15:00:41'),
(3, 'Jerricho', '$2y$10$7dnOJ3Np7grzD/R/uSH5BuO.FpkZaXXsevWnmXR5qEL1UbaJ0tSJW', '2021-12-11 19:46:30'),
(7, 'DON2', '$2y$10$YQ6uGX.WW5v4OmFlumglXO04w/y2mim6UYRn9OFUcEKf.dG4kIZ4O', '2021-12-11 23:23:23'),
(8, 'qwer', '$2y$10$qfXQ0bv9.MD3bej85F6Gtu7M9Pd2qg2hN6kWRtsEk9UHAE3IpGWBu', '2022-04-27 20:46:11'),
(9, 'don', '$2y$10$vsgf8OIm9ZJvziYlXBM.0.NzOEJ7V94pwvGm647/wg4K4QP7MrB1a', '2022-05-02 10:06:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `games_id` (`games_id`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`games_id`) REFERENCES `games` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
