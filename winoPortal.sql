-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 06, 2017 at 10:27 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `winoPortal`
--

-- --------------------------------------------------------

--
-- Table structure for table `opinie`
--

CREATE TABLE `opinie` (
  `id` int(11) NOT NULL,
  `wino_id` int(11) DEFAULT NULL,
  `tresc` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ocena` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `opinie`
--

INSERT INTO `opinie` (`id`, `wino_id`, `tresc`, `ocena`, `user_id`) VALUES
(4, 1, 'Perfecto', 5, 1),
(5, 1, 'Brdzo dobre wino', 4, 1),
(6, 4, 'słabe wino, nie polecam', 2, 1),
(7, 1, 'Wyjątkowe wino', 8, 2),
(8, 1, 'bardzo dobre wino', 8, 1),
(9, 2, 'sdsdds', 5, 1),
(10, 6, 'Młode ale dobre wino. polecam', 8, 2),
(11, 2, 'bardzo dobre wino', 7, 9),
(12, 1, 'wino jest super', 5, 6),
(13, 1, 'bardzo dobre wino', 8, 6),
(14, 8, 'Bardzo dobre wino', 8, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `description` longtext COLLATE utf8_unicode_ci,
  `address` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `description`, `address`) VALUES
(1, 'Jan Winiarz', 'jan winiarz', 'jan@o2.pl', 'jan@o2.pl', 1, NULL, '$2y$13$agmoJUTLq9EO4pu9hUSjMesR5B.H98av2S144lubgUACclI7QAfH2', '2017-06-04 12:14:42', NULL, NULL, 'a:0:{}', 'Produkuję wina od 1986 roku, w swojej winnicy mam ponad 100 tys. butelek.', 'Zielona Góra'),
(2, 'kuba', 'kuba', 'kuba@onet.pl', 'kuba@onet.pl', 1, NULL, '$2y$13$UU4uP08VRiHo8sNFijUEu.tdpxyANi5gzcCiR7ZDfX/Y/opjzGF0m', '2017-06-03 09:11:32', NULL, NULL, 'a:0:{}', 'Jestem winiarze, prawidziwym winiarzem, winiarstwa nowy rozdział napiszę ;)', 'Nowy Targ'),
(6, 'Michał', 'michał', 'michal@michal.pl', 'michal@michal.pl', 1, NULL, '$2y$13$.o7KsAZmYm4HjQrUKpMSXOSLdx2pF7hCgMWAnqN3aS16c0ZVMAzmi', '2017-06-06 21:19:44', NULL, NULL, 'a:0:{}', 'Produkuję wino od 2001 roku, Moja specjalność to wino aroniowe. Mam już ponad 2000 butelek w piwnicy.', 'Rzeszów'),
(7, 'Andrzej', 'andrzej', 'andrzej@andrzej.pl', 'andrzej@andrzej.pl', 1, NULL, '$2y$13$rZLeG7SoHhD3tCV5m1h9SOWuhMc.Yy//BZ4r4vSRMIC9i7JaK2fsy', '2017-06-03 10:37:59', NULL, NULL, 'a:0:{}', NULL, 'Nowy Sącz'),
(8, 'kdjskdj', 'kdjskdj', 'adksl@kdlsdl.pl', 'adksl@kdlsdl.pl', 1, NULL, '$2y$13$cG1yZQLtbP3H0q3UbZYb2Oaer4a72j33rUJpb7rmlLB2Q6TwnL682', '2017-06-03 10:39:38', NULL, NULL, 'a:0:{}', NULL, NULL),
(9, 'Rafał Rafalski', 'rafał rafalski', 'rafal@rafal.pl', 'rafal@rafal.pl', 1, NULL, '$2y$13$fOrS3a5b95uUOd5H9DeUKe3AwsZgwdKYKZjG8vPbg.wfWfODaqRva', '2017-06-04 11:14:45', NULL, NULL, 'a:0:{}', 'Jestem amatoram winiarstwa.', 'Jelenia Góra');

-- --------------------------------------------------------

--
-- Table structure for table `wiadomosc`
--

CREATE TABLE `wiadomosc` (
  `id` int(11) NOT NULL,
  `nadawca_id` int(11) DEFAULT NULL,
  `odbiorca_id` int(11) DEFAULT NULL,
  `tytul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tresc` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wiadomosc`
--

INSERT INTO `wiadomosc` (`id`, `nadawca_id`, `odbiorca_id`, `tytul`, `tresc`) VALUES
(6, 1, 2, 'zamówienie', 'zamawiam to wino'),
(8, 1, 2, 'Zamówienie', 'Cześć jak realizacja zamówienie przebiega?'),
(9, 2, 1, 'Zamówienie', 'Witam chciałbym zamówić 20 litrów tego wina'),
(10, 2, 1, 'zamówienie', 'Cześć jutro zostanie wysłana przesyłka'),
(11, 9, 1, 'zamówienie', 'Chciałbym zamówić 15 butelek wina'),
(12, 6, 1, 'zamówienie', 'chcę kupić 20 butelek tego wina');

-- --------------------------------------------------------

--
-- Table structure for table `wina`
--

CREATE TABLE `wina` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nazwa` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `kolor` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `smak` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `rocznik` int(11) NOT NULL,
  `wyprodukowana_ilosc` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stan` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cena` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wina`
--

INSERT INTO `wina` (`id`, `user_id`, `nazwa`, `kolor`, `smak`, `rocznik`, `wyprodukowana_ilosc`, `stan`, `cena`) VALUES
(1, 1, 'Blanco', 'białe', 'wytrawne', 1999, '200', '12', '23'),
(2, 1, 'Jabol', 'biały', 'wytrawne', 1985, '89', '9', '90'),
(4, 1, 'Biały Kieł', 'białe', 'półwytrawne', 2012, '2000', '200', '45'),
(5, 2, 'Kubol', 'białe', 'wytrawne', 2007, '200', '30', '34'),
(6, 1, 'Porto', 'białe', 'wytrawne', 2015, '2000', '2000', '21'),
(7, 2, 'Rosso', 'różowe', 'półwytrawne', 2009, '1000', '900', '32'),
(8, 9, 'Rafesco', 'czerwone', 'półsłodkie', 2014, '2000', '900', '40'),
(9, 6, 'Testowe', 'różowe', 'półwytrawne', 1986, '200', '30', '40'),
(10, 6, 'Michallo', 'białe', 'półsłodkie', 2009, '390', '90', '42'),
(11, 6, 'Millano', 'czerwone', 'półsłodkie', 2012, '200', '100', '23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `opinie`
--
ALTER TABLE `opinie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3C32E779471F5D12` (`wino_id`),
  ADD KEY `IDX_3C32E779A76ED395` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_1483A5E9A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_1483A5E9C05FB297` (`confirmation_token`);

--
-- Indexes for table `wiadomosc`
--
ALTER TABLE `wiadomosc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_42C752B7CCF39CE2` (`nadawca_id`),
  ADD KEY `IDX_42C752B7328A74B5` (`odbiorca_id`);

--
-- Indexes for table `wina`
--
ALTER TABLE `wina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5161A071A76ED395` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `opinie`
--
ALTER TABLE `opinie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `wiadomosc`
--
ALTER TABLE `wiadomosc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `wina`
--
ALTER TABLE `wina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `opinie`
--
ALTER TABLE `opinie`
  ADD CONSTRAINT `FK_3C32E779471F5D12` FOREIGN KEY (`wino_id`) REFERENCES `wina` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_3C32E779A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `wiadomosc`
--
ALTER TABLE `wiadomosc`
  ADD CONSTRAINT `FK_42C752B7328A74B5` FOREIGN KEY (`odbiorca_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_42C752B7CCF39CE2` FOREIGN KEY (`nadawca_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `wina`
--
ALTER TABLE `wina`
  ADD CONSTRAINT `FK_5161A071A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
