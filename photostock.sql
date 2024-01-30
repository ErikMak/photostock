-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 27 2023 г., 16:22
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `photostock`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `photo_id` int NOT NULL,
  `username` text NOT NULL,
  `txt` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `photo_id`, `username`, `txt`) VALUES
(1, 11, 'qwertfly', 'Действительно красивая картинка!))'),
(2, 9, 'vr0mg', 'Прикольно'),
(3, 11, 'lostinvivo', 'Неплохо получился снимок'),
(4, 11, 'flexlilayy', 'Невероятно красиво!!! Хочется смотреть вдаль не отрываясь'),
(5, 10, 'sandyambar35', 'Que belleza un camino encantado');

-- --------------------------------------------------------

--
-- Структура таблицы `photos`
--

CREATE TABLE `photos` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `author` text NOT NULL,
  `timest` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `filename` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `photos`
--

INSERT INTO `photos` (`id`, `name`, `author`, `timest`, `filename`) VALUES
(1, 'Кукушка', 'Alllmazz', '21:31', 'image_2.jpg'),
(2, 'RoomDesign', 'shxczer', '21:36', 'ROOM 108, NeoDesign.jpg'),
(7, 'Корги', 'yuaandi', '16:37', 'image_3.jpg'),
(8, 'Северный полюс', 'teramit0', '10:38', 'desdfa00854.jpg'),
(9, 'Зимородок', 'squeee', '1:40', 'funart-pro.jpg'),
(10, 'Торт', '1lkinks', '19:41', 'MOChSpHxc5X3.jpg'),
(11, 'Красивый вулкан', 'teishatei', '22:44', '07cef44546ba0cf8bb1a.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` text NOT NULL,
  `role` int NOT NULL,
  `email` text NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `role`, `email`, `password`) VALUES
(5, 'Admin', 2, 'admin@gmail.com', 'Qwerty00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
