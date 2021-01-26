-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Sty 2021, 20:00
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
-- Baza danych: `magazyn`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `id_pracownika` int(11) NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `surname` text COLLATE utf8_polish_ci NOT NULL,
  `age` int(11) NOT NULL,
  `stanowisko` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`id_pracownika`, `name`, `surname`, `age`, `stanowisko`) VALUES
(1, 'Kasia', 'Motyl', 32, 'Ksiegowa'),
(2, 'Karol', 'Mucha', 23, 'Magazynier'),
(3, 'Miłosz', 'Krupa', 25, 'Magazynier'),
(4, 'Piotr', 'Wojcik', 19, 'Magazynier'),
(5, 'Daniel', 'Wariat', 31, 'Magazynier'),
(6, 'Karolina', 'Welon', 21, 'Ksiegowa'),
(7, 'Aneta', 'Kropek', 32, 'Sprzątaczka'),
(9, 'Hubert', 'Urbanski', 42, 'Asystent magazyniera'),
(21, 'Mariusz', 'Konieczny', 19, 'Asystent magazyniera');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `towar`
--

CREATE TABLE `towar` (
  `id_towaru` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `ilosc` int(11) DEFAULT NULL,
  `stan` text COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `towar`
--

INSERT INTO `towar` (`id_towaru`, `nazwa`, `ilosc`, `stan`) VALUES
(1, 'Uchwyt Spawalniczy VW TigLift 10-25', 24, 'Dostępny'),
(2, 'Spawarka Caddy MIG C200', 10, 'Dostępny'),
(3, 'Korpus palnika', 40, 'Dostepny'),
(4, 'Końcówka prądowa mb-15 - 0,8', 0, 'Nie dostępny'),
(5, 'Końcówka prądowa mb-25 - 0,8', 200, 'Dostępny'),
(6, 'Weldman ARC 203', 0, 'Zamówiony'),
(7, 'Sherman 180 FL', 0, 'Zamówiony'),
(8, 'Rękawice Heavy Duty', 0, 'Nie dostępny'),
(9, 'Sherman 130F', 2, 'Dostępny');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zadania`
--

CREATE TABLE `zadania` (
  `id_zadania` int(11) NOT NULL,
  `do_wykonania` text COLLATE utf8_polish_ci DEFAULT NULL,
  `stanowisko` text COLLATE utf8_polish_ci DEFAULT NULL,
  `status` text COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `zadania`
--

INSERT INTO `zadania` (`id_zadania`, `do_wykonania`, `stanowisko`, `status`) VALUES
(1, 'Posegregować Faktury', 'Ksiegowa', 'Zrobione'),
(2, 'Wypełnić Faktury', 'Księgowa', 'Do wykonania'),
(3, 'Wyłożyć towar na półki', 'Magazynier', 'Zrobione'),
(4, 'Posprzątać na hali', 'Magazynier', 'Do wykonania'),
(5, 'Spakować Paczki', 'Magazynier', 'Do wykonania'),
(6, 'Policzyć stany magazynu ', 'Magazynier', 'Do wykonania'),
(7, 'Wydrukować naklejki', 'Magazynier', 'Do wykonania'),
(8, 'Spotkanie firmowe', 'Magazynier', ''),
(9, 'Zafakturować Towar ', 'Ksiegowa', 'w trakcie'),
(10, 'Odebrac towar', 'Asystent magazyniera', 'Do wykonania');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`id_pracownika`);

--
-- Indeksy dla tabeli `towar`
--
ALTER TABLE `towar`
  ADD PRIMARY KEY (`id_towaru`);

--
-- Indeksy dla tabeli `zadania`
--
ALTER TABLE `zadania`
  ADD PRIMARY KEY (`id_zadania`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `id_pracownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT dla tabeli `towar`
--
ALTER TABLE `towar`
  MODIFY `id_towaru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `zadania`
--
ALTER TABLE `zadania`
  MODIFY `id_zadania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
