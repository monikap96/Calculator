-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Wrz 2021, 14:50
-- Wersja serwera: 10.4.19-MariaDB
-- Wersja PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `calculator`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `credit_calc`
--

CREATE TABLE `credit_calc` (
  `id_wynik` int(11) NOT NULL,
  `kwota` double NOT NULL,
  `lata` int(11) NOT NULL,
  `oprocentowanie` double NOT NULL,
  `miesięczna_rata` double NOT NULL,
  `kwota_do_zapłaty` double NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `credit_calc`
--

INSERT INTO `credit_calc` (`id_wynik`, `kwota`, `lata`, `oprocentowanie`, `miesięczna_rata`, `kwota_do_zapłaty`, `data`) VALUES
(1, 1000, 2, 3, 42.916666666667, 1030, '2021-09-24 23:58:18'),
(2, 1000, 4, 3, 21.458333333333, 1030, '2021-09-25 00:35:10'),
(3, 2400.5, 1, 3, 206.04291666667, 2472.515, '2021-09-28 14:30:10'),
(4, 2400.5, 1, 3, 206.04291666667, 2472.515, '2021-09-28 14:48:52');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `credit_calc`
--
ALTER TABLE `credit_calc`
  ADD PRIMARY KEY (`id_wynik`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `credit_calc`
--
ALTER TABLE `credit_calc`
  MODIFY `id_wynik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
