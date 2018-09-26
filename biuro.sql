-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Lut 2018, 21:31
-- Wersja serwera: 10.1.28-MariaDB
-- Wersja PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `biuro`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `address`
--

CREATE TABLE `address` (
  `Id_address` int(11) NOT NULL,
  `City` text COLLATE utf8_polish_ci NOT NULL,
  `Street` text COLLATE utf8_polish_ci NOT NULL,
  `Post_code` text COLLATE utf8_polish_ci NOT NULL,
  `Number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `address`
--

INSERT INTO `address` (`Id_address`, `City`, `Street`, `Post_code`, `Number`) VALUES
(55, 'Ryglice', '', '', 0),
(56, 'Tarn&oacute;w', '', '', 0),
(57, 'Tarn&oacute;w', '', '', 0),
(58, 'Zawada', '', '', 0),
(59, 'Havka', '', '', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `object`
--

CREATE TABLE `object` (
  `ID_Object` int(11) NOT NULL,
  `ID_Type` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `object`
--

INSERT INTO `object` (`ID_Object`, `ID_Type`, `Price`) VALUES
(1, 3, 350000),
(2, 1, 200000);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `offer`
--

CREATE TABLE `offer` (
  `Id_offer` int(11) NOT NULL,
  `id_offer_status` int(11) NOT NULL,
  `offer_name` text COLLATE utf8_polish_ci NOT NULL,
  `Price` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `description` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `offer`
--

INSERT INTO `offer` (`Id_offer`, `id_offer_status`, `offer_name`, `Price`, `description`) VALUES
(58, 1, 'Gospodarstwo 2.5 ha', '123000', 'Oferowana do sprzedaÅ¼y nieruchomoÅ›Ä‡ to grunt stanowiÄ…cy jednÄ… dziaÅ‚kÄ™ ewidencyjnÄ… o powierzchni 2,52 hektara z zabudowÄ… siedliskowÄ… usytuowanÄ… poÅ›rodku dziaÅ‚ki, na kt&oacute;rÄ… skÅ‚ada siÄ™ budynek mieszkalny o powierzchni 90 m2'),
(59, 1, 'Mieszkanie dwupoziomowe', '420000', 'OFERTA BEZ PROWIZJI OD KUPUJÄ„CEGO. Nowe dwupoziomowe mieszkanie o powierzchni 127 m2, 6-cio pokojowe z dwoma duÅ¼ymi balkonami,  w stanie deweloperskim, usytuowane jest na piÄ™trze i poddaszu jednopiÄ™trowego budynku wielorodzinnego, w odlegÅ‚oÅ›ci'),
(60, 1, 'Nowe mieszkanie 68 m2', '330000', 'OFERTA BEZ PROWIZJI OD KUPUJÄ„CEGO. Nowe mieszkanie z balkonem na rynku pierwotnym, w stanie deweloperskim o powierzchni 68,3 m2, usytuowane jest na poddaszu jednopiÄ™trowego budynku wielorodzinnego, w odlegÅ‚oÅ›ci 1 km od centrum miasta.'),
(61, 1, 'DziaÅ‚ki widokowe 15 arÃ³w', '12000', 'Przeznaczona do sprzedaÅ¼y widokowa dziaÅ‚ka poÅ‚oÅ¼ona jest w pobliÅ¼u centrum miejscowoÅ›ci Zawada, ok. 5 km. od Tarnowa Teren pÅ‚aski usytuowany jest w sÄ…siedztwie lasu z panoramÄ… w kierunku poÅ‚udniowym. Obok powstaje nowa zabudowa willowa. '),
(62, 1, 'Dom z bali na SÅ‚owacji', '450000', 'Oferowany do sprzedaÅ¼y dom z bali drewnianych, na podmur&oacute;wce z kamienia, usytuowany jest na 8-arowej dziaÅ‚ce w maÅ‚ej miejscowoÅ›ci Havka na SÅ‚owacji - 13 km od Niedzicy k. jeziora CzorsztyÅ„skiego.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `o_p`
--

CREATE TABLE `o_p` (
  `ID_Parameter` int(11) NOT NULL,
  `ID_Object` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `o_p`
--

INSERT INTO `o_p` (`ID_Parameter`, `ID_Object`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `parameter`
--

CREATE TABLE `parameter` (
  `ID_Parameter` int(11) NOT NULL,
  `Name` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `parameter`
--

INSERT INTO `parameter` (`ID_Parameter`, `Name`) VALUES
(1, 'Powierzchnia'),
(2, 'Liczba pieter');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `property`
--

CREATE TABLE `property` (
  `ID_property` int(11) NOT NULL,
  `ID_Type` int(11) NOT NULL,
  `ID_Address` int(11) NOT NULL,
  `ID_Offer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `property`
--

INSERT INTO `property` (`ID_property`, `ID_Type`, `ID_Address`, `ID_Offer`) VALUES
(44, 1, 56, 59),
(45, 1, 57, 60),
(43, 2, 55, 58),
(46, 2, 58, 61),
(47, 3, 59, 62);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `p_value`
--

CREATE TABLE `p_value` (
  `ID_value` int(11) NOT NULL,
  `ID_Parameter` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `p_value`
--

INSERT INTO `p_value` (`ID_value`, `ID_Parameter`, `value`) VALUES
(1, 1, 30),
(2, 2, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status`
--

CREATE TABLE `status` (
  `Id_status` int(11) NOT NULL,
  `description` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `status`
--

INSERT INTO `status` (`Id_status`, `description`) VALUES
(1, 'na sprzedaż');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `type`
--

CREATE TABLE `type` (
  `ID_Type` int(11) NOT NULL,
  `Name` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `type`
--

INSERT INTO `type` (`ID_Type`, `Name`) VALUES
(1, 'Mieszkanie'),
(2, 'Dzialka'),
(3, 'Dom');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `typ` enum('1','2') COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `email`, `imie`, `nazwisko`, `typ`) VALUES
(1, 'admin', 'admin', 'admin@gm.com', '', '', '1'),
(9, 'Jhon', 'qwerty', 'a@g.c', 'jan', 'KOWALSKI', '2'),
(10, 'Jozin', 'qwerty', 'wkalda@gmail.cm', 'Adam', 'Dobrz', '2');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`Id_address`);

--
-- Indexes for table `object`
--
ALTER TABLE `object`
  ADD PRIMARY KEY (`ID_Object`),
  ADD KEY `ID_Type` (`ID_Type`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`Id_offer`),
  ADD KEY `id_offer_status` (`id_offer_status`);

--
-- Indexes for table `o_p`
--
ALTER TABLE `o_p`
  ADD KEY `ID_Parameter` (`ID_Parameter`,`ID_Object`),
  ADD KEY `ID_Object` (`ID_Object`);

--
-- Indexes for table `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`ID_Parameter`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`ID_property`),
  ADD KEY `ID_Type` (`ID_Type`,`ID_Address`,`ID_Offer`),
  ADD KEY `ID_Offer` (`ID_Offer`),
  ADD KEY `ID_Address` (`ID_Address`);

--
-- Indexes for table `p_value`
--
ALTER TABLE `p_value`
  ADD PRIMARY KEY (`ID_value`),
  ADD KEY `ID_Parameter` (`ID_Parameter`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Id_status`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`ID_Type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `address`
--
ALTER TABLE `address`
  MODIFY `Id_address` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT dla tabeli `object`
--
ALTER TABLE `object`
  MODIFY `ID_Object` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `offer`
--
ALTER TABLE `offer`
  MODIFY `Id_offer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT dla tabeli `parameter`
--
ALTER TABLE `parameter`
  MODIFY `ID_Parameter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `property`
--
ALTER TABLE `property`
  MODIFY `ID_property` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT dla tabeli `p_value`
--
ALTER TABLE `p_value`
  MODIFY `ID_value` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `status`
--
ALTER TABLE `status`
  MODIFY `Id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `type`
--
ALTER TABLE `type`
  MODIFY `ID_Type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `object`
--
ALTER TABLE `object`
  ADD CONSTRAINT `object_ibfk_1` FOREIGN KEY (`ID_Type`) REFERENCES `type` (`ID_Type`);

--
-- Ograniczenia dla tabeli `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `offer_ibfk_1` FOREIGN KEY (`id_offer_status`) REFERENCES `status` (`Id_status`);

--
-- Ograniczenia dla tabeli `o_p`
--
ALTER TABLE `o_p`
  ADD CONSTRAINT `o_p_ibfk_1` FOREIGN KEY (`ID_Object`) REFERENCES `object` (`ID_Object`),
  ADD CONSTRAINT `o_p_ibfk_2` FOREIGN KEY (`ID_Parameter`) REFERENCES `parameter` (`ID_Parameter`);

--
-- Ograniczenia dla tabeli `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`ID_Type`) REFERENCES `type` (`ID_Type`),
  ADD CONSTRAINT `property_ibfk_2` FOREIGN KEY (`ID_Offer`) REFERENCES `offer` (`Id_offer`),
  ADD CONSTRAINT `property_ibfk_3` FOREIGN KEY (`ID_Address`) REFERENCES `address` (`Id_address`);

--
-- Ograniczenia dla tabeli `p_value`
--
ALTER TABLE `p_value`
  ADD CONSTRAINT `p_value_ibfk_1` FOREIGN KEY (`ID_Parameter`) REFERENCES `parameter` (`ID_Parameter`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
