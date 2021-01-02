-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Sty 2021, 19:31
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `baza_pilkarska`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sedzia`
--

CREATE TABLE `sedzia` (
  `id_sedzia` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `surname` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `age` int(11) NOT NULL,
  `experience` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `sedzia`
--

INSERT INTO `sedzia` (`id_sedzia`, `name`, `surname`, `age`, `experience`) VALUES
(1, 'dsffsd', 'sfddsf', 33, 5),
(2, 'safd', 'asf', 23, 21);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trenerzy`
--

CREATE TABLE `trenerzy` (
  `id_trenera` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_polish_ci NOT NULL,
  `surname` text COLLATE utf8mb4_polish_ci NOT NULL,
  `age` int(11) NOT NULL,
  `club` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `trenerzy`
--

INSERT INTO `trenerzy` (`id_trenera`, `name`, `surname`, `age`, `club`) VALUES
(2, 'Kamil', 'kaka', 44, 'fajny'),
(5, 'mlody', 'wariat', 32, 'sosnowiec'),
(6, 'duzo', 'malo', 12, 'jakis'),
(8, 'Kami', 'sa', 33, 'vzxc'),
(9, 'dbbs', 'sfbsd', 456, 'bfxbc');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zawodnik`
--

CREATE TABLE `zawodnik` (
  `id_zawodnika` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `surname` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `club` text COLLATE utf8mb4_polish_ci NOT NULL,
  `position` text COLLATE utf8mb4_polish_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `zawodnik`
--

INSERT INTO `zawodnik` (`id_zawodnika`, `name`, `surname`, `club`, `position`, `date`) VALUES
(5, 'dsc', 'cdwsc', 'dcs', 'cd', '1998-09-02'),
(9, 'scas', 'cd', 'acac', 'adcad', '1998-09-06'),
(10, 'dsvs', 'svd', 'vds', 'svd', '1999-08-08'),
(11, 'dsvs', 'svd', 'vds', 'svd', '1999-08-08'),
(13, 'dsvs', 'svd', 'vds', 'svd', '1999-08-08');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `sedzia`
--
ALTER TABLE `sedzia`
  ADD PRIMARY KEY (`id_sedzia`);

--
-- Indeksy dla tabeli `trenerzy`
--
ALTER TABLE `trenerzy`
  ADD PRIMARY KEY (`id_trenera`);

--
-- Indeksy dla tabeli `zawodnik`
--
ALTER TABLE `zawodnik`
  ADD PRIMARY KEY (`id_zawodnika`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `sedzia`
--
ALTER TABLE `sedzia`
  MODIFY `id_sedzia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `trenerzy`
--
ALTER TABLE `trenerzy`
  MODIFY `id_trenera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `zawodnik`
--
ALTER TABLE `zawodnik`
  MODIFY `id_zawodnika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
