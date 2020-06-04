-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Czas generowania: 16 Cze 2018, 09:43
-- Wersja serwera: 5.7.19
-- Wersja PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `karol`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

DROP TABLE IF EXISTS `klienci`;
CREATE TABLE IF NOT EXISTS `klienci` (
  `id_klienta` int(20) NOT NULL AUTO_INCREMENT,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `ulica` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `numer` int(10) NOT NULL,
  `miasto` text COLLATE utf8_polish_ci NOT NULL,
  `kod_pocztowy` varchar(6) COLLATE utf8_polish_ci NOT NULL,
  `numer_telefonu` int(12) NOT NULL,
  `email` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `login` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id_klienta`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`id_klienta`, `imie`, `nazwisko`, `ulica`, `numer`, `miasto`, `kod_pocztowy`, `numer_telefonu`, `email`, `login`, `haslo`) VALUES
(1, 'Jan', 'Kowalski', 'Głęboka', 234, 'Rzeszów', '23-502', 345678456, 'janek33@gmail.com', 'janek33', 'janek'),
(7, 'kamila', 'kamila', 'kamila', 1234, 'kamila', 'kamila', 123434563, '-mail', 'kamila', 'kamila12'),
(8, 'kamila', 'kamila', 'kamila', 222, 'kamila', 'kamila', 123434563, '-mail', 'kamila1', 'kamila111'),
(9, 'janek', 'janek', 'janek', 222, 'janek', '22-170', 22222222, 'janek@gmail.com', 'janek', 'janekjanek'),
(10, 'kama', 'kama', 'kama', 222, 'kama', '2323', 22222222, 'kama@gmail.com', 'kama', 'kamakama'),
(11, 'kewin', 'kewin', 'kewin', 1234, 'kewin', '2325', 123434563, 'kewin@gmail.com', 'kewin', 'kewinkewin'),
(12, 'Karol', 'Cyrek', 'ÅÄ…ka', 111, 'RzeszÃ³w', 'trzejd', 123434563, 'karol123@gmail.com', 'karol123', 'karolkarol');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samochody`
--

DROP TABLE IF EXISTS `samochody`;
CREATE TABLE IF NOT EXISTS `samochody` (
  `nr_samochodu` int(20) NOT NULL AUTO_INCREMENT,
  `marka` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `zdjecie` varchar(256) COLLATE utf8_polish_ci DEFAULT NULL,
  `Kategoria` text CHARACTER SET utf16 COLLATE utf16_polish_ci NOT NULL,
  `model` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `rok_produkcji` year(4) NOT NULL,
  `kolor` text COLLATE utf8_polish_ci NOT NULL,
  `Cena` int(12) NOT NULL,
  PRIMARY KEY (`nr_samochodu`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `samochody`
--

INSERT INTO `samochody` (`nr_samochodu`, `marka`, `zdjecie`, `Kategoria`, `model`, `rok_produkcji`, `kolor`, `Cena`) VALUES
(1, 'Audi', './img/database/Audi A4.png', 'Klasa premium', 'A4', 2004, 'Niebieski', 0),
(2, 'Audi ', './img/database/Audi A7.png', 'Klasa premium', 'A7', 2016, 'Srebrne', 0),
(5, 'Volkswagen', './img/database/volswagen golf 7.png', 'Klasa średnia', 'Golf Wersja VII ', 2018, 'Beżowy', 0),
(7, 'Opel', './img/database/Opel-Astra-Sedan.png', 'Klasa średnia', 'Astra H', 2016, 'Metaliczny', 0),
(8, 'Opel', './img/database/opel insignia.png', 'Klasa premium', 'Insignia A', 2012, 'Czarny', 0),
(9, 'Mercedes-Benz', './img/database/mercedes benz klasa c.png', 'Klasa premium', 'Klasa C', 2018, 'Biały', 0),
(10, 'Mercedes-Benz', './img/database/mercedes benz glk 220.png', 'Klasa premium', 'GLK 220', 2009, 'Czarny', 0),
(11, 'BMW', './img/database/Bmw seria 3.png', 'Klasa premium', 'Seria 3 ', 2017, 'Niebieski', 0),
(12, 'BMW', './img/database/bmw seria 5.png', 'Klasa premium', 'Seria 5 G30', 2017, 'Czarny', 0),
(14, 'Nissan', './img/database/nissan micra.png', 'Miejskie', 'Micra', 2007, 'Srebrny', 0),
(15, 'Smart', './img/database/smart fortwo.png', 'Miejskie', 'Fortwo ', 2014, 'Metaliczny', 0),
(16, 'Opel', './img/database/opel vivaro.png', 'Busy 9 osobowe', 'Vivaro', 2018, 'Czerwony', 0),
(17, 'Citroen', './img/database/citroen jumper.png', 'Busy 9 osobowe', 'Jumper', 2015, 'Niebieski', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wypozyczenia`
--

DROP TABLE IF EXISTS `wypozyczenia`;
CREATE TABLE IF NOT EXISTS `wypozyczenia` (
  `id_wypozyczenia` int(20) NOT NULL,
  `id_klienta` int(20) NOT NULL,
  `id_samochodu` int(20) NOT NULL,
  `data_wypozyczenia` datetime(6) NOT NULL,
  `data_oddania` datetime(6) NOT NULL,
  `kaucja` int(12) NOT NULL,
  `cena` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
