-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 10 2020 г., 15:20
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `autobox`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `id` int(11) UNSIGNED NOT NULL,
  `image` varchar(100) NOT NULL,
  `brand` varchar(70) NOT NULL,
  `model` varchar(35) NOT NULL,
  `color` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id`, `image`, `brand`, `model`, `color`) VALUES
(1, 'img/16075338901.jpg', 'Nissan', 'Teana', 'Черный'),
(8, 'img/16075353382.webp', 'Chevrolet', 'Aveo', 'Черный'),
(9, 'img/16075366433.jpg', 'Mercedes', 'GLK', 'Красный'),
(10, 'img/16075366774', 'Nissan', 'GTR', 'Серый'),
(11, 'img/16075367145.jpg', 'Toyota', 'Mark', 'Белый'),
(12, 'img/16075371266.jpg', 'ВАЗ', '2107', 'Синий'),
(13, 'img/16075371517', 'Porche', 'Porche', 'Белый'),
(14, 'img/16075371838.jpg', 'ВАЗ', 'Patriot', 'Серый');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD UNIQUE KEY `id-auto` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
