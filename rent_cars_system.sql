-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Sie 2017, 19:21
-- Wersja serwera: 10.1.25-MariaDB
-- Wersja PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `rent_cars_system`
--
CREATE DATABASE IF NOT EXISTS `rent_cars_system` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `rent_cars_system`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cars`
--

CREATE TABLE `cars` (
  `car_id` int(255) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `number_of_doors` int(10) NOT NULL,
  `fuel` varchar(10) NOT NULL,
  `seats` int(10) NOT NULL,
  `gearbox` varchar(20) NOT NULL,
  `image` text NOT NULL,
  `hire_cost` int(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `cars`
--

INSERT INTO `cars` (`car_id`, `branch`, `name`, `category`, `number_of_doors`, `fuel`, `seats`, `gearbox`, `image`, `hire_cost`, `status`) VALUES
(1, 'Audi', 'A4', 'LUXURY', 5, 'oil', 4, 'manual', 'Audi-A4.jpg', 300, 'available'),
(2, 'BMW', '2 series', 'LUXURY', 5, 'petrol', 4, 'automat', 'BMW-2-series.jpg', 255, 'available'),
(3, 'Hyundai', 'i20', 'MINI', 5, 'oil', 4, 'manual', 'hyundai-i20.jpg', 100, 'available'),
(4, 'Audi', 'Q5', 'SUV', 5, 'petrol', 4, 'automat', 'Audi-Q5.jpg', 500, 'Inaccessible'),
(5, 'Mazda', '6', 'Luxury', 5, 'oil', 4, 'automat', 'Mazda-6.jpg', 325, 'Inaccessible'),
(6, 'Suzuki', 'swift', 'MINI', 5, 'petrol', 4, 'manual', 'suzuki-swift.png', 130, 'available'),
(7, 'Land Rover', 'Range Rover 3.0L V6', 'SUV', 5, 'petrol', 4, 'automat', 'Land-Rover.png', 830, 'Inaccessible'),
(8, 'Smart', 'cabrio', 'MINI', 3, 'petrol', 2, 'manual', 'smart.jpg', 50, 'avaiable'),
(9, 'Smart', 'roadster', 'MINI', 3, 'petrol', 2, 'automat', 'smart-roadster.jpg', 322, 'available'),
(10, 'Range Rover', 'Holland & Holland', 'SUV', 5, 'oil', 5, 'automat', 'Range_Rover_Holland.png', 552, 'available'),
(11, 'Range Rover', 'Holland & Holland', 'SUV', 5, 'petrol', 5, 'automat', 'Range_Rover_Holland.png', 552, 'available'),
(12, 'Audi', 'Q5', 'SUV', 5, 'petrol', 4, 'manual', 'Audi-Q5.jpg', 256, 'avaiable'),
(13, 'Ford', 'Transit', 'VAN', 4, 'oil', 3, 'manual', 'ford-transit-250.png', 203, 'available');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `hire`
--

CREATE TABLE `hire` (
  `hire_id` int(255) NOT NULL,
  `client_id` int(255) NOT NULL,
  `car_id` int(255) NOT NULL,
  `start_place` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `finish_place` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `start_date` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `start_time` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `finish_date` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `finish_time` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `number_of_rental_days` int(255) NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `hire`
--

INSERT INTO `hire` (`hire_id`, `client_id`, `car_id`, `start_place`, `finish_place`, `start_date`, `start_time`, `finish_date`, `finish_time`, `number_of_rental_days`, `total_price`) VALUES
(3, 17, 4, 'kraków', 'kraków', '2017-07-30', '21:00', '2017-08-05', '22:00', 22, '2252'),
(28, 2, 3, '222', '222', '2017-08-01', '11:01', '2017-09-01', '11:01', 31, '3100'),
(29, 2, 4, '123', '123', '2017-08-16', '23:23', '2017-08-31', '13:21', 15, '7500'),
(30, 36, 9, 'qwe', 'qqwe', '2017-08-01', '12:31', '2017-08-30', '12:31', 29, '9338'),
(31, 37, 6, 'qew', 'qwe', '2017-08-30', '23:23', '2017-09-03', '12:31', 4, '520'),
(32, 38, 4, '1e', '12e', '2017-08-02', '12:03', '2017-08-30', '12:03', 28, '14000'),
(33, 39, 7, '1e', '12e', '2017-08-02', '12:03', '2017-08-30', '12:03', 28, '23240'),
(34, 40, 11, 'w', 'w', '2017-08-31', '23:23', '2017-09-02', '23:23', 2, '1104'),
(37, 43, 12, 'qw', 'qw', '2017-08-01', '11:21', '2017-08-16', '12:01', 16, '4096'),
(39, 46, 7, 'Mrozy', 'Brzozy', '2017-07-24', '12:31', '2017-08-31', '12:31', 38, '31540'),
(40, 42, 5, 'kielce', 'kielce', '2017-08-15', '15:00', '2017-08-19', '15:00', 4, '1300'),
(41, 47, 4, 'jjh', 'jhj', '2017-08-15', '23:01', '2017-08-24', '07:59', 9, '4500');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `client_id` int(255) NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `date_of_birth` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `gender` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `location` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`client_id`, `first_name`, `last_name`, `email`, `date_of_birth`, `password`, `gender`, `location`) VALUES
(1, '2', '2', '2@2.pl', 'date_of_brith', '$2y$10$At7/0.X/zb.OdSDjCV/cMuyp7TVhyEFhnTBV9.fcD1/vz3oDlJtMG', '0', '0'),
(12, 'qwe', 'qwe', 'qweqwe@p.pl', '0011-11-11', '$2y$10$VtS5hgUefo5eCNIkH4g06.aehel5LWmJxzkzxP50lNSYJx2QMyrlu', 'Male', '123'),
(13, '123', '12312', '31233@s.pl', '2017-07-04', '$2y$10$gR2Z5YgVMF7fERX0opQ1RedvNE7hDDzIiscskyQlzechbbe7OgN9C', 'Female', 'qew'),
(16, 'qwe123', 'qwe123', 'qwe123@l.pl', '2017-06-28', '$2y$10$gpATboqCv5HXVwMK0aRBJ.7iNbf/7sFF/ddDkefTAFJyLww53Kpg.', 'Female', '`2`21'),
(36, 'q', 'q', 'q@q.q', '2017-08-01', '$2y$10$Po9UoSLEDZhHRgaTXeuShuS4ZPuUMz.brRkS30sbd3l56hxYf0sQi', 'Male', 'q'),
(37, '123', '123', '123@gmail.com', '2017-08-02', '$2y$10$x8iYpPF4jm5l2LuIGAu3CuhA8CKo8i4RyopNYzJ5l6szU08sVqyNC', 'Male', '123'),
(38, '123', '123e', '123ee@2.p', '2017-08-02', '$2y$10$nfG1dYlp.tO3Z7YbI9UkouAtq0BGoBbB6SQrsta6kL6e4TWi056tW', 'Male', 'qwd'),
(39, '123', '123e', '123eewe@2.p', '2017-08-02', '$2y$10$6GmInv6ZkQpJooViVV0zJOtVUzRuuxO3yxPUvfpf/y/U7BAwl.Thq', 'Select Gender', 'qwd'),
(40, 'qwr', '23', '23@g.pl', '2017-08-02', '$2y$10$L6In6EfBLRG4wsi0Gv.oAuHZObqzGNYagk4QKj3YN4/.kufhItbma', 'Male', 'qw'),
(41, 'Karolina', 'Kowalska', 'karolina@gmail.com', '1981-06-04', '$2y$10$JSLsgMb9E92Ao3GApk7ilulcYeU4AiFY31hxBu28.nDNpD1AY/xB2', 'Female', 'lublin'),
(42, 'Kacper', 'Bruno', 'kacper@gmail.com', '1991-07-19', '$2y$10$nGQxLzcLZwWcmSKyF2L0n.xmEnDjipekaTwzk5nnDwCSrg4lsbcxe', 'Male', 'mirzec'),
(43, 'qwr', 'qw', 'qw@p.pl', '2017-08-01', '$2y$10$05WBhFprdXxZyTU5SRyVjOEKrMSMQI5QbrqPzdvQ1zNg/tPzcuqSm', 'Female', 'qw'),
(44, 'RafaÅ‚', 'Brzoza', 'rafal@gmail.com', '1990-02-22', '$2y$10$W/cV0wi4Q.pNkYZGq/.C7uAnQh5.mKuuFm0NoB4Y7wVRj18NBy3EO', 'Male', 'bogatÃ³w'),
(45, 'Rafał', 'Brzoza', 'rafals@gmail.com', '1990-02-22', '$2y$10$BIDjXBEpQ/RdLtyhxmCbE.xNpY5s8/vRewTd7PFUSdszrf661gC.2', 'Select Gender', 'bogatÃ³w'),
(46, 'Karol', 'Karo', 'karo@gmail.com', '1990-07-20', '$2y$10$whhYTegA72t5pIr3.PSL3uzrIky.m8y2CCKztoEi8MLNwaJ90RsY.', 'Male', 'Krozno'),
(47, '121', '23', '12@k.pl', '2017-08-10', '$2y$10$72H4lD5Wx/AoybJedpJ.1e0ySl29YmG7F.Loam4VWdITmVQtPY2sa', 'Male', '111');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `hire`
--
ALTER TABLE `hire`
  ADD PRIMARY KEY (`hire_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`client_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT dla tabeli `hire`
--
ALTER TABLE `hire`
  MODIFY `hire_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `client_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
