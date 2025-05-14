-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Gép: mysql.omega:3306
-- Létrehozás ideje: 2022. Máj 07. 13:35
-- Kiszolgáló verziója: 5.7.37-log
-- PHP verzió: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `jcsa02`
--
CREATE DATABASE IF NOT EXISTS `jcsa02` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `jcsa02`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `colour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `colour`) VALUES
(1, 0, 0, 0),
(2, 0, 0, 0),
(3, 0, 0, 0),
(4, 0, 0, 0),
(5, 0, 0, 0),
(6, 0, 0, 0),
(7, 0, 0, 0),
(8, 0, 0, 0),
(9, 0, 0, 0),
(10, 0, 0, 0),
(11, 0, 0, 0),
(12, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users3`
--

CREATE TABLE `users3` (
  `ID` int(11) NOT NULL,
  `username` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `colour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users3`
--

INSERT INTO `users3` (`ID`, `username`, `password`, `colour`) VALUES
(1, 0, 0, 0),
(2, 0, 0, 0),
(3, 0, 0, 0),
(4, 0, 0, 0),
(5, 0, 0, 0),
(6, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users4`
--

CREATE TABLE `users4` (
  `ID` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `colour` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users4`
--

INSERT INTO `users4` (`ID`, `username`, `password`, `colour`) VALUES
(1, 'katika@gmail.com', 'katica85', 'piros'),
(2, 'arpi40@freemail.hu', 'polip', 'zold'),
(3, 'zsanettka@hotmail.com', 'csillag12', 'sarga'),
(4, 'hatizsak@protonmail.com', 'tracking', 'kek'),
(5, 'terpeszterez@citromail.hu', 'cukorka', 'fekete'),
(6, 'nagysanyi@gmail.hu', 'julcsika', 'feher'),
(7, 'kozak', 'krisz', 'red');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `users3`
--
ALTER TABLE `users3`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `users4`
--
ALTER TABLE `users4`
  ADD PRIMARY KEY (`ID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `users3`
--
ALTER TABLE `users3`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `users4`
--
ALTER TABLE `users4`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
