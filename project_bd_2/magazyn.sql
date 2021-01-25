-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Sty 2021, 20:15
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
-- Struktura tabeli dla tabeli `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `role`
--

INSERT INTO `role` (`id_role`, `name`) VALUES
(1, 'admin'),
(2, 'employee'),
(3, 'user'),
(4, 'zbanowany');

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
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `id_role`) VALUES
(1, 'Talar', 'a1e03cf022862126dabb2b06e3223521', 1),
(2, 'PierwszyUser', 'a1e03cf022862126dabb2b06e3223521', 3),
(3, 'DrugiUser', '21232f297a57a5a743894a0e4a801fc3', 3),
(4, 'TrzeciUser', '21232f297a57a5a743894a0e4a801fc3', 3),
(5, 'Moderator1', 'a1e03cf022862126dabb2b06e3223521', 2),
(6, 'banned', 'a1e03cf022862126dabb2b06e3223521', 4),
(7, 'user', '21232f297a57a5a743894a0e4a801fc3', 3),
(10, 'DrugiAdmin', '64a4e327e97c1e7926f9240edb937362', 1),
(12, 'user12', '21232f297a57a5a743894a0e4a801fc3', 4),
(13, 'user13', '21232f297a57a5a743894a0e4a801fc3', 3),
(14, 'user14', '21232f297a57a5a743894a0e4a801fc3', 3),
(15, 'user15', '21232f297a57a5a743894a0e4a801fc3', 2),
(16, 'user16', '21232f297a57a5a743894a0e4a801fc3', 3),
(17, 'user17', '21232f297a57a5a743894a0e4a801fc3', 3),
(18, 'user18', '21232f297a57a5a743894a0e4a801fc3', 4),
(19, 'user19', '21232f297a57a5a743894a0e4a801fc3', 3),
(20, 'user20', '21232f297a57a5a743894a0e4a801fc3', 1),
(21, 'user21', '21232f297a57a5a743894a0e4a801fc3', 3),
(22, 'user22', '21232f297a57a5a743894a0e4a801fc3', 3),
(23, 'user23', '21232f297a57a5a743894a0e4a801fc3', 3),
(24, 'user24', '21232f297a57a5a743894a0e4a801fc3', 4),
(25, 'user25', '21232f297a57a5a743894a0e4a801fc3', 2),
(26, 'user26', '21232f297a57a5a743894a0e4a801fc3', 3),
(27, 'user27', '21232f297a57a5a743894a0e4a801fc3', 3),
(28, 'user28', '21232f297a57a5a743894a0e4a801fc3', 3),
(29, 'user29', '21232f297a57a5a743894a0e4a801fc3', 3),
(30, 'user30', '21232f297a57a5a743894a0e4a801fc3', 1),
(31, 'user31', '21232f297a57a5a743894a0e4a801fc3', 3),
(32, 'user32', '21232f297a57a5a743894a0e4a801fc3', 3),
(33, 'user33', '21232f297a57a5a743894a0e4a801fc3', 3),
(34, 'user34', '21232f297a57a5a743894a0e4a801fc3', 3),
(35, 'user35', '21232f297a57a5a743894a0e4a801fc3', 2),
(36, 'user36', '21232f297a57a5a743894a0e4a801fc3', 4),
(37, 'user37', '21232f297a57a5a743894a0e4a801fc3', 3),
(38, 'user38', '21232f297a57a5a743894a0e4a801fc3', 3),
(39, 'user39', '21232f297a57a5a743894a0e4a801fc3', 3),
(40, 'user40', '21232f297a57a5a743894a0e4a801fc3', 1),
(41, 'user41', '21232f297a57a5a743894a0e4a801fc3', 3),
(42, 'user42', '21232f297a57a5a743894a0e4a801fc3', 4),
(43, 'user43', '21232f297a57a5a743894a0e4a801fc3', 3),
(44, 'user44', '21232f297a57a5a743894a0e4a801fc3', 3),
(45, 'user45', '21232f297a57a5a743894a0e4a801fc3', 2),
(46, 'user46', '21232f297a57a5a743894a0e4a801fc3', 3),
(47, 'user47', '21232f297a57a5a743894a0e4a801fc3', 3),
(48, 'user48', '21232f297a57a5a743894a0e4a801fc3', 4),
(49, 'user49', '21232f297a57a5a743894a0e4a801fc3', 3),
(50, 'user50', '21232f297a57a5a743894a0e4a801fc3', 1),
(51, 'user51', '21232f297a57a5a743894a0e4a801fc3', 3),
(52, 'user52', '21232f297a57a5a743894a0e4a801fc3', 3),
(53, 'user53', '21232f297a57a5a743894a0e4a801fc3', 3),
(54, 'user54', '21232f297a57a5a743894a0e4a801fc3', 4),
(55, 'user55', '21232f297a57a5a743894a0e4a801fc3', 2),
(56, 'user56', '21232f297a57a5a743894a0e4a801fc3', 3),
(57, 'user57', '21232f297a57a5a743894a0e4a801fc3', 3),
(58, 'user58', '21232f297a57a5a743894a0e4a801fc3', 3),
(59, 'user59', '21232f297a57a5a743894a0e4a801fc3', 3),
(60, 'user60', '21232f297a57a5a743894a0e4a801fc3', 1),
(61, 'user61', '21232f297a57a5a743894a0e4a801fc3', 3),
(62, 'user62', '21232f297a57a5a743894a0e4a801fc3', 3),
(63, 'user63', '21232f297a57a5a743894a0e4a801fc3', 3),
(64, 'user64', '21232f297a57a5a743894a0e4a801fc3', 3),
(65, 'user65', '21232f297a57a5a743894a0e4a801fc3', 2),
(66, 'user66', '21232f297a57a5a743894a0e4a801fc3', 4),
(67, 'user67', '21232f297a57a5a743894a0e4a801fc3', 3),
(68, 'user68', '21232f297a57a5a743894a0e4a801fc3', 3),
(69, 'user69', '21232f297a57a5a743894a0e4a801fc3', 3),
(70, 'user70', '21232f297a57a5a743894a0e4a801fc3', 1),
(71, 'user71', '21232f297a57a5a743894a0e4a801fc3', 3),
(72, 'user72', '21232f297a57a5a743894a0e4a801fc3', 4),
(73, 'user73', '21232f297a57a5a743894a0e4a801fc3', 3),
(74, 'user74', '21232f297a57a5a743894a0e4a801fc3', 3),
(75, 'user75', '21232f297a57a5a743894a0e4a801fc3', 2),
(76, 'user76', '21232f297a57a5a743894a0e4a801fc3', 3),
(77, 'user77', '21232f297a57a5a743894a0e4a801fc3', 3),
(78, 'user78', '21232f297a57a5a743894a0e4a801fc3', 4),
(79, 'user79', '21232f297a57a5a743894a0e4a801fc3', 3),
(80, 'user80', '21232f297a57a5a743894a0e4a801fc3', 1),
(81, 'user81', '21232f297a57a5a743894a0e4a801fc3', 3),
(82, 'user82', '21232f297a57a5a743894a0e4a801fc3', 3),
(83, 'user83', '21232f297a57a5a743894a0e4a801fc3', 3),
(84, 'user84', '21232f297a57a5a743894a0e4a801fc3', 4),
(85, 'user85', '21232f297a57a5a743894a0e4a801fc3', 2),
(86, 'user86', '21232f297a57a5a743894a0e4a801fc3', 3),
(87, 'user87', '21232f297a57a5a743894a0e4a801fc3', 3),
(88, 'user88', '21232f297a57a5a743894a0e4a801fc3', 3),
(89, 'user89', '21232f297a57a5a743894a0e4a801fc3', 3),
(90, 'user90', '21232f297a57a5a743894a0e4a801fc3', 1),
(91, 'user91', '21232f297a57a5a743894a0e4a801fc3', 3),
(92, 'user92', '21232f297a57a5a743894a0e4a801fc3', 3),
(93, 'user93', '21232f297a57a5a743894a0e4a801fc3', 3),
(94, 'user94', '21232f297a57a5a743894a0e4a801fc3', 3),
(95, 'user95', '21232f297a57a5a743894a0e4a801fc3', 2),
(96, 'user96', '21232f297a57a5a743894a0e4a801fc3', 4),
(97, 'user97', '21232f297a57a5a743894a0e4a801fc3', 3),
(98, 'user98', '21232f297a57a5a743894a0e4a801fc3', 3),
(99, 'user99', '21232f297a57a5a743894a0e4a801fc3', 3),
(100, 'nowyAdmin', 'a1e03cf022862126dabb2b06e3223521', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `id_uzytkownika` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`id_uzytkownika`, `login`, `pass`) VALUES
(1, 'admin', 'admin'),
(2, 'employee', 'employee'),
(3, 'user', 'user');

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
-- Indeksy dla tabeli `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeksy dla tabeli `towar`
--
ALTER TABLE `towar`
  ADD PRIMARY KEY (`id_towaru`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rola` (`id_role`) USING BTREE;

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`id_uzytkownika`);

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
-- AUTO_INCREMENT dla tabeli `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `towar`
--
ALTER TABLE `towar`
  MODIFY `id_towaru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `id_uzytkownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `zadania`
--
ALTER TABLE `zadania`
  MODIFY `id_zadania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
