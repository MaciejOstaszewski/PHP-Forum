-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Sty 2018, 18:28
-- Wersja serwera: 10.1.10-MariaDB
-- Wersja PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `forumdb`
--
DROP DATABASE IF EXISTS `forumdb`;
CREATE DATABASE `forumdb`;

USE `forumdb`;
-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dzial`
--

CREATE TABLE `dzial` (
  `nazwa` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `idForum` int(11) NOT NULL,
  `liczbaTematow` int(11) NOT NULL,
  `liczbaPostow` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `dzial`
--

INSERT INTO `dzial` (`nazwa`, `id`, `idForum`, `liczbaTematow`, `liczbaPostow`) VALUES
('PamiÄ™Ä‡', 4, 1, 1, 3),
('Karty Graficzne', 5, 1, 1, 4),
('Procesory', 6, 1, 1, 8),
('PÅ‚yty gÅ‚Ã³wne', 7, 1, 0, 0),
('Dyski twarde', 8, 1, 0, 0),
('Zasilacze', 9, 1, 0, 0),
('Inne', 10, 1, 0, 0),
('Programowanie', 11, 2, 0, 0),
('Grafika', 12, 2, 0, 0),
('Systemy Operacyjne', 13, 2, 0, 0),
('Humor', 14, 3, 0, 0),
('Muzyka', 15, 3, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `forum`
--

CREATE TABLE `forum` (
  `nazwa` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `forum`
--

INSERT INTO `forum` (`nazwa`, `id`) VALUES
('hardware', 1),
('software', 2),
('offtopic', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posty`
--

CREATE TABLE `posty` (
  `temat` text COLLATE utf8_polish_ci NOT NULL,
  `tresc` text COLLATE utf8_polish_ci NOT NULL,
  `wlasciciel` text COLLATE utf8_polish_ci NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `idTematu` int(10) UNSIGNED NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `posty`
--

INSERT INTO `posty` (`temat`, `tresc`, `wlasciciel`, `id`, `idTematu`, `data`) VALUES
('DDR4 - dyskusja ogÃ³lna', 'Zapewne tak ale czy juÅ¼ teraz to wydaje mi siÄ™ Å¼e jeszcze nie, kaÅ¼dy z nas dobrze pamiÄ™ta jak to bylo z koÅ›Ä‡mi DDR3 jak weszÅ‚y na rynek i jakie kosmiczne ceny miaÅ‚y. I tak samo bÄ™dzie chyba z DDR4', 'Soviet', 1, 1, '2016-06-18 19:04:41'),
('DDR4 - dyskusja ogÃ³lna', 'ponoÄ‡ majÄ… juÅ¼ w przyszÅ‚ym roku zaczynaÄ‡ wchodziÄ‡ na rynek, najpierw chyba w rozwiÄ…zania serwerowe, a potem dla masy, czyli dla NAS', 'Nep', 2, 1, '2016-06-18 19:05:29'),
('Czy warto kupowaÄ‡ GTX 1070 do tego zestawu?', 'A jaki masz monitor?', 'Cyanide', 3, 2, '2016-06-18 19:09:21'),
('Czy warto kupowaÄ‡ GTX 1070 do tego zestawu?', 'Obecnie 22 cali ASUS FullHD', 'Nep', 4, 2, '2016-06-18 19:11:24'),
('Czy warto kupowaÄ‡ GTX 1070 do tego zestawu?', 'GTX970 to karta, ktÃ³ra wystarczy do grania we wszystkie nowe gry w 1080p na ultra przez kilka najbliÅ¼szych lat, GTX1070 to karta bardziej pod 2K/4K, wiÄ™c jeÅ¼eli nie masz zamiaru kupowaÄ‡ monitora 2/4K, nie za bardzo jest sens brania tej karty. SzczegÃ³lnie, Å¼e ceny serii 900 zaczynajÄ… spadaÄ‡.', 'Zielony', 5, 2, '2016-06-18 19:12:36'),
('NiepokojÄ…ca temperatura procesora.', 'Pasta termo przewodzÄ…ca kiedy ostatni raz zmieniana byÅ‚a?', 'administrator', 6, 3, '2016-06-18 19:19:43'),
('NiepokojÄ…ca temperatura procesora.', '\r\nProcesor zaÅ‚oÅ¼yÅ‚em pÃ³Å‚tora tygodnia temu, wtedy teÅ¼ byÅ‚ czyszczony i zaÅ‚oÅ¼ona byÅ‚a nowa pasta. Dopiero dwa dni temu profilaktycznie sprawdziÅ‚em temperatury i myÅ›laÅ‚em Å¼e coÅ› jest nie tak, ale chciaÅ‚em sie upewniÄ‡ i codziennie sprawdzaÅ‚em. WiÄ™c to nie to. Jest moÅ¼liwe Å¼e napiÄ™cie jest niepoprawnie ustawione?', 'Edberg', 7, 3, '2016-06-18 19:20:09'),
('NiepokojÄ…ca temperatura procesora.', '\r\nJak BIOS na domyÅ›lnych to wszystko OK powinno byÄ‡.\r\nWentylator krÄ™ci siÄ™ oczywiÅ›cie?', 'administrator', 8, 3, '2016-06-18 19:20:35'),
('NiepokojÄ…ca temperatura procesora.', 'BIOS na domyÅ›lnych, wentylator siÄ™ krÄ™ci, sprawdzaÅ‚em wszystko ok. Przed chwilÄ… ponownie wymieniÅ‚em paste i nadal jest to samo. Czy jest to moÅ¼liwe Å¼e radiator nie styka siÄ™ z procesorem? PoniewaÅ¼ temperatury wyglÄ…dajÄ… nieciekawie, szczegÃ³lnie w porÃ³wnaniu do starego procesora.', 'Edberg', 9, 3, '2016-06-18 19:21:07'),
('NiepokojÄ…ca temperatura procesora.', 'A radiator idealnie przylega z kaÅ¼dej stronie?', 'administrator', 10, 3, '2016-06-18 19:21:28'),
('NiepokojÄ…ca temperatura procesora.', '\r\nWÅ‚aÅ›nie to moÅ¼e byÄ‡ przyczyna, tylko nie bardzo wiem jak to sprawdziÄ‡... Mam standardowe chÅ‚odzenie boxowe Intela i wszystkie zaciski dobrze zÅ‚apaÅ‚y, sÄ… mocno wciÅ›niÄ™te i kaÅ¼dy jest zablokowany wiÄ™c zamontowane zostaÅ‚o poprawnie. Co najdziwniejsze, niezaleznie od gry, zawsze temperatura osiÄ…ga 100 stopni. MyÅ›laÅ‚em ze to po prostu WiedÅºmin, ale nawet przy Hearthstone, komputer siÄ™ nagrzewa. MoÅ¼e to byÄ‡ wina procesora? PÅ‚yty gÅ‚Ã³wnej nie podejrzewam, poniewaÅ¼ na starym procesorze nie byÅ‚o tego problemu.', 'Edberg', 11, 3, '2016-06-18 19:21:55'),
('NiepokojÄ…ca temperatura procesora.', 'Jakie napiÄ™cie w BiOSie ma ustawione ten CPU?', 'administrator', 12, 3, '2016-06-18 19:22:30');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tematy`
--

CREATE TABLE `tematy` (
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `tresc` text COLLATE utf8_polish_ci NOT NULL,
  `wlasciciel` text COLLATE utf8_polish_ci NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `idDzialu` int(10) UNSIGNED NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `liczbaPostow` int(11) NOT NULL,
  `nazwaDzialu` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `tematy`
--

INSERT INTO `tematy` (`nazwa`, `tresc`, `wlasciciel`, `id`, `idDzialu`, `data`, `liczbaPostow`, `nazwaDzialu`) VALUES
('DDR4 - dyskusja ogÃ³lna', 'CzyÅ¼by DDR4 miaÅ‚o zastÄ…piÄ‡ DDR3?\r\n[url="http://www.komputerswiat.pl/nowosci/sprzet/2012/19/micron-prezentuje-wlasne-ddr4-a-standardu-nadal-nie-ma.aspx"]http://www.komputerswiat.pl/nowosci/sprzet/2012/19/micron-prezentuje-wlasne-ddr4-a-standardu-nadal-nie-ma.aspx[/url]\r\n', 'administrator', 1, 4, '2016-06-18 19:05:29', 3, 'PamiÄ™Ä‡'),
('Czy warto kupowaÄ‡ GTX 1070 do tego zestawu?', '\r\nWitam, mam pytanie czy jest sens dokÅ‚adaÄ‡ najnowszÄ… kartÄ™ GTX 1070 do procka i5-4590 bo sÅ‚yszaÅ‚em Å¼e nie zbyt gdyÅ¼ sama karta nie bÄ™dzie z siebie dawaÅ‚a maksimum wydajnoÅ›ci poniewaÅ¼ procesor bÄ™dzie jÄ… ograniczaÅ‚. KasÄ™ bÄ™dÄ™ miaÅ‚ za miesiÄ…c poniewaÅ¼ czekam aÅ¼ sytuacja na rynku siÄ™ uspokoi. A zasilacz zamierzam wymieniÄ‡ moÅ¼e na SilentiumPC 600W Vero M1.\r\nPozdrawiam.\r\n \r\nMÃ³j zestaw:\r\n \r\nPÅ‚yta gÅ‚Ã³wna:\r\nMSI H81M-E34/H81/DDR3/SATA3/USB3/s. 1150/mATX\r\nProcesor:\r\nIntel Core i5-4590 3.3GHz LGA1150 BOX\r\nPamiÄ™Ä‡ RAM:\r\n2x DDR3 GOODRAM 4GB/1600MHz PC3-12800 (1600MHz) CL11\r\nDysk:\r\nSEAGATE ST1000DM003 1TB 7200 64MB SATA III NCQ\r\nSystem:\r\nMicrosoft Windows 10 PL\r\nKarta graficzna:\r\nIntel HD Graphics 4600 - zintegrowana\r\nZasilacz:\r\nJakiÅ› no-name 300W', 'Nep', 2, 5, '2016-06-19 10:32:44', 4, 'Karty Graficzne'),
('NiepokojÄ…ca temperatura procesora.', '\r\nWitam, chciaÅ‚bym siÄ™ dowiedzieÄ‡ czym moÅ¼e byÄ‡ spowodowana wysoka temperatura procesora. Procesor w spoczynku osiÄ…ga 70 stopni, w obciÄ…Å¼eniu nawet do 100 stopni. Procesor to Intel Core i5 750. Co dziwne, podczas gry w WiedÅºmina 3 poprzedni procesor Intel i3 540 dochodziÅ‚ do 90 stopni przy wykorzystaniu 90-95%. Obecny procesor przy wykorzystaniu 60%-70% podczas gry w WiedÅºmina osiÄ…ga ok. 100 stopni. Nie byÅ‚ podkrÄ™cany, jedynie wÅ‚Ä…czona jest opcja Turbo Boost, po jej wyÅ‚Ä…czeniu nic siÄ™ nie zmieniÅ‚o. JeÅ›li ktoÅ› zna rozwiÄ…zanie, prosze o odpowiedÅº. ', 'Edberg', 3, 6, '2016-06-19 11:27:26', 8, 'Procesory');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `nazwa` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `plec` int(2) NOT NULL,
  `typ` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `id` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`nazwa`, `haslo`, `plec`, `typ`, `id`, `data`) VALUES
('administrator', 'administrator', 2, 'root', 5, '2016-06-15 20:00:46'),
('Zielony', '12345678', 2, 'user', 6, '2016-06-18 19:31:48'),
('Soviet', 'qwerty', 2, 'user', 7, '2016-06-18 19:31:55'),
('Caleb', 'asdfgh', 2, 'user', 8, '2016-06-18 19:32:02'),
('Nep', 'zxcvbn', 1, 'user', 9, '2016-06-18 19:32:09'),
('Moogle', '123456', 2, 'user', 10, '2016-06-18 19:32:17'),
('Edberg', '654321', 2, 'user', 11, '2016-06-18 19:32:23'),
('Cyanide', 'qwerty', 2, 'user', 12, '2016-06-18 19:32:30');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `dzial`
--
ALTER TABLE `dzial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idForum` (`idForum`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD KEY `id` (`id`);

--
-- Indexes for table `posty`
--
ALTER TABLE `posty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTematu` (`idTematu`);

--
-- Indexes for table `tematy`
--
ALTER TABLE `tematy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDzialu` (`idDzialu`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `dzial`
--
ALTER TABLE `dzial`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT dla tabeli `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `posty`
--
ALTER TABLE `posty`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT dla tabeli `tematy`
--
ALTER TABLE `tematy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `posty`
--
ALTER TABLE `posty`
  ADD CONSTRAINT `posty_ibfk_1` FOREIGN KEY (`idTematu`) REFERENCES `tematy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `tematy`
--
ALTER TABLE `tematy`
  ADD CONSTRAINT `tematy_ibfk_1` FOREIGN KEY (`idDzialu`) REFERENCES `dzial` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
