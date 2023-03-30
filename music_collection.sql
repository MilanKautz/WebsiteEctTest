-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 30 nov 2021 om 11:57
-- Serverversie: 10.4.21-MariaDB
-- PHP-versie: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `ect_werknemers`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `albums`
--

CREATE TABLE `werknemers` (
    `id` int(11) UNSIGNED NOT NULL,
    `name` varchar(50) NOT NULL,
    `secondname` varchar(50) NOT NULL,
    `workplace` varchar(20) NOT NULL,
    `certificate` smallint(6) UNSIGNED NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `albums`
--

INSERT INTO `werknemers` (`id`, `name`, `secondname`, `workplace`, `certificate`) VALUES
    (1, 'Mark', 'Kautz', 'ECT', 'veiligheid certificaat', ''),


--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `albums`
--
ALTER TABLE `werknemers`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `albums`
--
ALTER TABLE `werknemers`
    MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;
