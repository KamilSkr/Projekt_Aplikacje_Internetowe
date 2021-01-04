-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Sty 2021, 22:19
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
(1, 'Paweł', 'Raczkowski', 37, 12),
(2, 'Tomasz', 'Kwiatkowski', 42, 9);

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
(2, 'Jurgen', 'Klop', 52, 'FC Liverpool'),
(5, 'Maurizio', 'Sarri', 60, 'Juventus Turyn'),
(6, 'Pep', 'Guardiola', 48, 'Manchester City'),
(8, 'Erik', 'ten Hag', 49, 'Ajax Amsterdam'),
(9, 'Mauricio', 'Pochettino', 47, 'Tottenham Hotspur');

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
(5, 'Kevin', 'De Bruyne', 'Manchester City', 'Pomocnik', '1991-06-28'),
(9, 'Robert', 'Lewandowski', 'Bayern Monachium', 'Napastnik', '1988-08-21'),
(10, 'Lionel', 'Messi', 'FC Barcelona', 'Napastnik', '1987-06-24'),
(11, 'Cristiano', 'Ronaldo', 'Juventus Turyn', 'Napastnik', '1985-02-05'),
(13, 'Virgil', 'van Dijk ', 'Liverpool FC', 'Obrońca', '1991-07-08');

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
