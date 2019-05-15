-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2019 at 06:57 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `collegeproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `notfications`
--

CREATE TABLE `notfications` (
  `ID` int(11) NOT NULL,
  `NotficationMessage` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(9) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Description` longtext NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` double NOT NULL,
  `ProductPicture` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `Name`, `Description`, `Quantity`, `Price`, `ProductPicture`, `user_id`) VALUES
(0, 'ASUS ROG Zephyrus S Ultra Slim', 'Geforce Fortnite bundle â€“ offer valid through may 22, 2019. For a limited time, purchase a ROG device with qualifying GTX graphics and get the GeForce Fortnite Counterattack set!\r\n15.6â€ Full HD 144Hz IPS Type Display | 3ms response time with slim 6.5mm Bezel\r\nNvidia GeForce GTX 1070 8GB GDDR5 *(with Max Q technology)\r\n8Th-generation Intel Core i7-8750H (up to 3.9GHz) processor\r\n0.62â€ thin, 4.6 lbs | ultraportable military-grade magnesium alloy body gaming laptop with premium cover CNC-milled from Solid aluminum\r\n16GB 2666Hz DDR4 | 512GB PCIe NVMe M.2 SSD | Windows 10 Home\r\nRog active Aerodynamic System (AAs) | Upgraded 12V fans and anti-dust tunnels to preserve cooling performance and system stability\r\nCustomizable 4-zone ASUS Aura RGB Gaming Keyboard', 1, 34999, 'https://images-na.ssl-images-amazon.com/images/I/81Nox3hzQaL._SL1500_.jpg', 1),
(1, 'ASUS ROG Zephyrus S GX701 Gami', 'Nvidia GeForce RTX 2080 8GB GDDR6 (base: 990 MHz, Boost: 1230 MHz; TDP: 90W)\r\nIntel Core i7-8750H Hexa-Core processor\r\n17.3â€ 144Hz 3ms Pantone validated FHD display with NVIDIA G-SYNC\r\n16GB DDR4 2666MHz RAM | 1TB NVMe PCIe SSD (Hyper drive) | Windows 10 Professional\r\nSmaller-than-standard form Factor only 0.74â€ (18.7mm) thin\r\nReduced temperature compared to conventional cooling design Due to ROG-exclusive active Aerodynamic system and 12V fans. Increased longevity with anti-dust technology\r\nGpu switch mode: switch between integrated and discrete graphics for increased battery life or powerful gaming performance\r\n802.11AC Wave 2 Gigabit Wi-Fi\r\nPer-key aura Sync RGB keyboard with separate volume roll key\r\nDetachable/external 1080P 60Hz webcam', 4, 68000, 'https://images-na.ssl-images-amazon.com/images/I/71VgyNvXPgL._SL1500_.jpg', 1),
(2, 'ROG', 'Open Box - ASUS GX501GI-XS74 Gaming Laptop PC Intel Intel Core i7 i7-8750H Hexa Core (6 Core) - 16 DDR4 - No HDD - 512 SSD - NVIDIA GeForce GTX 1080 Dedicated - 15.6 1920 x 1080 15.6\" Full HD 1920x1080 Display - Windows 10', 1, 28900, 'https://images-na.ssl-images-amazon.com/images/I/81BLPIj3%2BUL._SL1500_.jpg', 0),
(3, 'Area 51M Gaming Laptop', 'Processor 9th Generation Intel Core i9-9900K (8-Core, 16MB Cache, up to 5.0Ghz w/Turbo Boost)\r\nMemory 128GB, 4x32GB, DDR4, 2666MHz\r\nHard Drive 2TB PCIe NVME M.2 SSDs Upgrade, Super fast read and write\r\nNVIDIA GeForce RTX 2080 8GB GDDR6 (OC Ready)\r\n15.6\" FHD (1920 x 1080) 144Hz IPS, 300-nits 72% color gamut, Narrow-Border - Nebula Red', 1, 120081, 'https://images-na.ssl-images-amazon.com/images/I/51TLAZygC5L._SL1072_.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(9) NOT NULL,
  `FirstName` varchar(18) NOT NULL,
  `LastName` varchar(18) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Email` varchar(32) NOT NULL,
  `PhoneNumber` varchar(11) NOT NULL,
  `profilePicture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FirstName`, `LastName`, `Password`, `Email`, `PhoneNumber`, `profilePicture`) VALUES
(0, 'Rami', 'Shenouda', 'Annie', 'ramishenouda@outlook.com', '01551874208', '../Images/no-profile-photo.jpg'),
(1, 'Kareem', 'Gamal', 'Annie', 'kareem@outlook.com', '01551874207', '../Images/no-profile-photo.jpg'),
(2, 'Abdelrahman', 'Kandil', 'Kandil', 'kandil@outlook.com', '', '../Images/no-profile-photo.jpg'),
(3, 'Mohamed', 'Khaled', 'khaled', 'khaled@outlook.com', '', '../Images/no-profile-photo.jpg'),
(4, 'Doctor', 'Mohamed', 'doctor', 'mohamedhashem@gmail.com', '', '../Images/no-profile-photo.jpg'),
(5, 'Doctor', 'Diea', 'doctor', 'dieanassr@gmail.com', '', '../Images/no-profile-photo.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notfications`
--
ALTER TABLE `notfications`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notfications`
--
ALTER TABLE `notfications`
  ADD CONSTRAINT `notfications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
