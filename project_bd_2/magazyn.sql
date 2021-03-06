-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2021 at 02:36 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magazyn`
--

-- --------------------------------------------------------

--
-- Table structure for table `pracownicy`
--

CREATE TABLE `pracownicy` (
  `id_pracownika` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `surname` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `data_urodzenia` date NOT NULL,
  `stanowisko` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `login` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `hasło` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `pracownicy`
--

INSERT INTO `pracownicy` (`id_pracownika`, `name`, `surname`, `data_urodzenia`, `stanowisko`, `login`, `hasło`) VALUES
(1, 'Kasia', 'Motyl', '2000-02-12', 'Ksiegowa', 'user', 'user'),
(2, 'Karol', 'Mucha', '1975-04-07', 'Magazynier', 'user', 'user'),
(3, 'Miłosz', 'Krupa', '1994-12-27', 'Magazynier', 'user', 'user'),
(4, 'Piotr', 'Wojcik', '2000-03-18', 'Magazynier', 'user', 'user'),
(5, 'Daniel', 'Wariat', '1989-04-20', 'Magazynier', 'user', 'user'),
(6, 'Karolina', 'Welon', '2001-06-01', 'Ksiegowa', 'user', 'user'),
(7, 'Aneta', 'Kropek', '1972-02-01', 'Sprzątaczka', 'user', 'user'),
(9, 'Hubert', 'Urbanski', '1999-09-12', 'Asystent magazyniera', 'user', 'user'),
(21, 'Mariusz', 'Konieczny', '1997-04-05', 'Asystent magazyniera', 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `towar`
--

CREATE TABLE `towar` (
  `id_towaru` int(11) NOT NULL,
  `nazwa` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `ilosc` int(11) DEFAULT NULL,
  `stan` varchar(30) COLLATE utf8_polish_ci DEFAULT NULL,
  `id_zamawiajacego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `towar`
--

INSERT INTO `towar` (`id_towaru`, `nazwa`, `ilosc`, `stan`, `id_zamawiajacego`) VALUES
(1, 'Uchwyt Spawalniczy VW TigLift ', 24, 'Dostępny', 1),
(2, 'Spawarka Caddy MIG C200', 10, 'Dostępny', 2),
(3, 'Korpus palnika', 40, 'Dostepny', 2),
(4, 'Końcówka prądowa mb-15 - 0,8', 0, 'Nie dostępny', 3),
(5, 'Końcówka prądowa mb-25 - 0,8', 200, 'Dostępny', 4),
(6, 'Weldman ARC 203', 0, 'Zamówiony', 5),
(7, 'Sherman 180 FL', 0, 'Zamówiony', 6),
(8, 'Rękawice Heavy Duty', 0, 'Nie dostępny', 7),
(9, 'Sherman 130F', 2, 'Dostępny', 9);

-- --------------------------------------------------------

--
-- Table structure for table `zadania`
--

CREATE TABLE `zadania` (
  `id_zadania` int(11) NOT NULL,
  `do_wykonania` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `stanowisko` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `id_pracownika` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `zadania`
--

INSERT INTO `zadania` (`id_zadania`, `do_wykonania`, `stanowisko`, `status`, `id_pracownika`) VALUES
(1, 'Posegregować Faktury', 'Ksiegowa', 'Zrobione', 1),
(2, 'Wypełnić Faktury', 'Księgowa', 'Do wykonania', 1),
(3, 'Wyłożyć towar na pół', 'Magazynier', 'Zrobione', 9),
(4, 'Posprzątać na hali', 'Magazynier', 'Do wykonania', 2),
(5, 'Spakować Paczki', 'Magazynier', 'Do wykonania', 3),
(6, 'Policzyć stany magaz', 'Magazynier', 'Do wykonania', 5),
(7, 'Wydrukować naklejki', 'Magazynier', 'Do wykonania', 3),
(8, 'Spotkanie firmowe', 'Magazyn', '-', 2),
(9, 'Zafakturować Towar ', 'Ksiegowa', 'w trakcie', 6),
(10, 'Odebrac towar', 'Asystent magazyniera', 'Do wykonania', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`id_pracownika`);

--
-- Indexes for table `towar`
--
ALTER TABLE `towar`
  ADD PRIMARY KEY (`id_towaru`),
  ADD KEY `id_zamawiajacego` (`id_zamawiajacego`) USING BTREE;

--
-- Indexes for table `zadania`
--
ALTER TABLE `zadania`
  ADD PRIMARY KEY (`id_zadania`),
  ADD KEY `id_pracownika` (`id_pracownika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `id_pracownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `towar`
--
ALTER TABLE `towar`
  MODIFY `id_towaru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `zadania`
--
ALTER TABLE `zadania`
  MODIFY `id_zadania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `towar`
--
ALTER TABLE `towar`
  ADD CONSTRAINT `towar_ibfk_1` FOREIGN KEY (`id_zamawiajacego`) REFERENCES `pracownicy` (`id_pracownika`);

--
-- Constraints for table `zadania`
--
ALTER TABLE `zadania`
  ADD CONSTRAINT `zadania_ibfk_1` FOREIGN KEY (`id_pracownika`) REFERENCES `pracownicy` (`id_pracownika`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
