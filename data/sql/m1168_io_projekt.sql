-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: mysql47.mydevil.net
-- Czas generowania: 13 Sty 2024, 16:05
-- Wersja serwera: 8.0.33
-- Wersja PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `m1168_io_projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dokumentacja_medyczna`
--

CREATE TABLE `dokumentacja_medyczna` (
  `id_dokumentu` int NOT NULL,
  `data_wykonania_badania` datetime NOT NULL,
  `notatka` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `id_pacjenta` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pacjent`
--

CREATE TABLE `pacjent` (
  `id_pacjenta` int NOT NULL,
  `imie` varchar(255) NOT NULL,
  `nazwisko` varchar(255) NOT NULL,
  `pesel` varchar(11) NOT NULL,
  `numer_kontaktowy_opiekuna` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `personel_medyczny`
--

CREATE TABLE `personel_medyczny` (
  `id_pracownika` int NOT NULL,
  `imie` varchar(255) NOT NULL,
  `nazwisko` varchar(255) NOT NULL,
  `numer_kontaktowy` int DEFAULT NULL,
  `stanowisko` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przypisanie_pacjenta_do_zajec`
--

CREATE TABLE `przypisanie_pacjenta_do_zajec` (
  `id_pacjenta` int NOT NULL,
  `id_zajec` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacja_terminu`
--

CREATE TABLE `rezerwacja_terminu` (
  `id_rezerwacji` int NOT NULL,
  `data_przyjecia` datetime NOT NULL,
  `data_wypisu` datetime NOT NULL,
  `notatka` text,
  `id_pacjenta` int NOT NULL,
  `id_uzytkownika` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sala`
--

CREATE TABLE `sala` (
  `id_sali` int NOT NULL,
  `numer_sali` int NOT NULL,
  `pietro` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `skierowanie`
--

CREATE TABLE `skierowanie` (
  `id_skierowania` int NOT NULL,
  `numer_skierowania` varchar(255) NOT NULL,
  `notatka_z_wywiadu` text NOT NULL,
  `id_pacjenta` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sprzet`
--

CREATE TABLE `sprzet` (
  `id_sprzetu` int NOT NULL,
  `id_sali` int NOT NULL,
  `numer_seryjny` varchar(255) NOT NULL,
  `nazwa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `id_uzytkownika` int NOT NULL,
  `imie` varchar(255) NOT NULL,
  `nazwisko` varchar(255) NOT NULL,
  `rola` varchar(255) NOT NULL,
  `haslo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zajecia`
--

CREATE TABLE `zajecia` (
  `id_zajec` int NOT NULL,
  `id_sali` int NOT NULL,
  `id_personelu_medycznego` int NOT NULL,
  `data_i_godzina_rozpoczecia` datetime DEFAULT NULL,
  `data_i_godzina_zakonczenia` datetime DEFAULT NULL,
  `nazwa` varchar(255) NOT NULL,
  `opis` text,
  `id_uzytkownika` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dokumentacja_medyczna`
--
ALTER TABLE `dokumentacja_medyczna`
  ADD PRIMARY KEY (`id_dokumentu`),
  ADD KEY `id_pacjenta` (`id_pacjenta`);

--
-- Indeksy dla tabeli `pacjent`
--
ALTER TABLE `pacjent`
  ADD PRIMARY KEY (`id_pacjenta`);

--
-- Indeksy dla tabeli `personel_medyczny`
--
ALTER TABLE `personel_medyczny`
  ADD PRIMARY KEY (`id_pracownika`);

--
-- Indeksy dla tabeli `przypisanie_pacjenta_do_zajec`
--
ALTER TABLE `przypisanie_pacjenta_do_zajec`
  ADD KEY `id_pacjenta` (`id_pacjenta`,`id_zajec`),
  ADD KEY `id_zajec` (`id_zajec`);

--
-- Indeksy dla tabeli `rezerwacja_terminu`
--
ALTER TABLE `rezerwacja_terminu`
  ADD PRIMARY KEY (`id_rezerwacji`),
  ADD KEY `id_pacjenta` (`id_pacjenta`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id_sali`);

--
-- Indeksy dla tabeli `skierowanie`
--
ALTER TABLE `skierowanie`
  ADD PRIMARY KEY (`id_skierowania`),
  ADD KEY `id_pacjenta` (`id_pacjenta`);

--
-- Indeksy dla tabeli `sprzet`
--
ALTER TABLE `sprzet`
  ADD PRIMARY KEY (`id_sprzetu`),
  ADD KEY `id_sali` (`id_sali`);

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`id_uzytkownika`);

--
-- Indeksy dla tabeli `zajecia`
--
ALTER TABLE `zajecia`
  ADD PRIMARY KEY (`id_zajec`),
  ADD KEY `id_personelu_medycznego` (`id_personelu_medycznego`),
  ADD KEY `id_sali` (`id_sali`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `dokumentacja_medyczna`
--
ALTER TABLE `dokumentacja_medyczna`
  MODIFY `id_dokumentu` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `pacjent`
--
ALTER TABLE `pacjent`
  MODIFY `id_pacjenta` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `personel_medyczny`
--
ALTER TABLE `personel_medyczny`
  MODIFY `id_pracownika` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `rezerwacja_terminu`
--
ALTER TABLE `rezerwacja_terminu`
  MODIFY `id_rezerwacji` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sala`
--
ALTER TABLE `sala`
  MODIFY `id_sali` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `skierowanie`
--
ALTER TABLE `skierowanie`
  MODIFY `id_skierowania` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sprzet`
--
ALTER TABLE `sprzet`
  MODIFY `id_sprzetu` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `id_uzytkownika` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `zajecia`
--
ALTER TABLE `zajecia`
  MODIFY `id_zajec` int NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `dokumentacja_medyczna`
--
ALTER TABLE `dokumentacja_medyczna`
  ADD CONSTRAINT `dokumentacja_medyczna_ibfk_1` FOREIGN KEY (`id_pacjenta`) REFERENCES `pacjent` (`id_pacjenta`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ograniczenia dla tabeli `przypisanie_pacjenta_do_zajec`
--
ALTER TABLE `przypisanie_pacjenta_do_zajec`
  ADD CONSTRAINT `przypisanie_pacjenta_do_zajec_ibfk_1` FOREIGN KEY (`id_pacjenta`) REFERENCES `pacjent` (`id_pacjenta`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `przypisanie_pacjenta_do_zajec_ibfk_2` FOREIGN KEY (`id_zajec`) REFERENCES `zajecia` (`id_zajec`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ograniczenia dla tabeli `rezerwacja_terminu`
--
ALTER TABLE `rezerwacja_terminu`
  ADD CONSTRAINT `rezerwacja_terminu_ibfk_1` FOREIGN KEY (`id_pacjenta`) REFERENCES `pacjent` (`id_pacjenta`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `rezerwacja_terminu_ibfk_2` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownik` (`id_uzytkownika`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ograniczenia dla tabeli `skierowanie`
--
ALTER TABLE `skierowanie`
  ADD CONSTRAINT `skierowanie_ibfk_1` FOREIGN KEY (`id_pacjenta`) REFERENCES `pacjent` (`id_pacjenta`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ograniczenia dla tabeli `sprzet`
--
ALTER TABLE `sprzet`
  ADD CONSTRAINT `sprzet_ibfk_1` FOREIGN KEY (`id_sali`) REFERENCES `sala` (`id_sali`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ograniczenia dla tabeli `zajecia`
--
ALTER TABLE `zajecia`
  ADD CONSTRAINT `zajecia_ibfk_1` FOREIGN KEY (`id_sali`) REFERENCES `sala` (`id_sali`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `zajecia_ibfk_2` FOREIGN KEY (`id_personelu_medycznego`) REFERENCES `personel_medyczny` (`id_pracownika`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `zajecia_ibfk_3` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownik` (`id_uzytkownika`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
