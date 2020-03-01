-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 02 2020 г., 00:03
-- Версия сервера: 5.7.21-20-beget-5.7.21-20-1-log
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `v903177m_edu`
--

-- --------------------------------------------------------

--
-- Структура таблицы `text_note`
--
-- Создание: Ноя 14 2019 г., 22:29
--

DROP TABLE IF EXISTS `text_note`;
CREATE TABLE `text_note` (
  `id` tinyint(255) NOT NULL,
  `color` varchar(20) NOT NULL,
  `x_coord` smallint(6) NOT NULL,
  `y_coord` smallint(6) NOT NULL,
  `text_note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `text_note`
--

INSERT INTO `text_note` (`id`, `color`, `x_coord`, `y_coord`, `text_note`) VALUES
(92, 'FFFF00', 795, 247, 'Интересно, а ведется-ли история изменений карточек в БД?'),
(93, 'FF3300', 290, 23, 'Здесь будут баги'),
(94, '00FF00', 824, 14, 'можно использовать как отправную точку для прототипа пользовательского интерфейса'),
(95, 'FF3300', 320, 676, 'Test'),
(96, 'FFFF00', 612, 29, 'Кстати, в HTML5 можно любой тег сделать редактируемым, не обязательно textarea подставлять'),
(97, 'FF3300', 257, 265, 'первое и самое главное, у меня в FireFox не работает добавление новых карточек. (FireFox старый 59.0); В Chrome - нормально'),
(98, '00FF00', 896, 748, 'А теперь вопрос - это какое-то учебное задание, или собственная попытка сделать удобное приложение?'),
(99, 'FF3300', 390, 458, 'Интересно, а есть-ли защита от SQL injection?'),
(100, 'FFFF00', 550, 248, 'Можно использовать localstore для хранения заметок, тогда такое приложение можно сделать персонализированным для каждого приходящего'),
(101, '00FF00', 1059, 17, 'Вообще концепция мне нравится. Это почти работающий КАНБАН?'),
(103, 'FFFF00', 579, 740, 'Введите текст'),
(104, '00FF00', 1048, 251, 'Когда жёлтую или красную карточку заносишь за края браузерного окна, то они цепляются к мышке и отцепить потом невозможно :)');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--
-- Создание: Ноя 22 2019 г., 19:17
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` tinyint(4) NOT NULL,
  `login` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `comments` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `name`, `lastname`, `comments`) VALUES
(3, 'babasy2i', '4346547', 'serova26', 'Иванович', ''),
(5, 'belych80', '1231', 'Бананан', 'Бананадзе', 'офигенски клёвый сайт'),
(6, 'belychly', '321464', 'Сергей', 'Иванов', 'офигенски клёвый      '),
(8, 'ivan', '1234', ' Иj', 'Иванов', 'сайт клёвый офигенский'),
(9, 'petya', '1234', 'Петров', 'Петя', 'Мне очень нравится этот сайт. Он красивый.'),
(10, 'petya2', '123', 'Петров', 'Петя', ''),
(50, '8', '8', '8', '8', ''),
(51, '12345', '98765', 'Татьяна', 'Шувалова', 'Мне очень нравится этот сайт. Он красивый.'),
(52, '7', '7', '7', '7', 'сайт клёвый офигенский'),
(53, 'mardus-filin', '1234', 'Иван', 'Леванов', ''),
(54, 'rohdonit@bk/ru', 'ventana1graf', 'Дмитрий', 'Черных', ''),
(55, 'lsd', 'ytcrf;e', 'Вячеслав', 'Пустозеров', 'Очень хороший сайт-портфолио, вот только чуток подшлифовать надо:\n\n1). Вес фотографий 99% от всего объема сайта... 6 Mb для фото в слайдере неоправданно много для трафика... после сжатия до 1/2 Mb на мониторе с разрешением 1366х768 разницу не увидел.\n2). Не выдержаны пропорции фото в слайдере, это хорошо видно на фото где люди фотографируют - изображение вытянуто по горизонтали.\n3). Плохо видно управляющие стрели в лево и в право у слайдера, желательно затемнить бэкграунд или сами стрелки... а то не понятно в начале куда клацкать мышкой\n\nПока что все...'),
(56, 'lsd2', 'ytcrf;e', 'Вячеслав', 'Пустозеров', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `text_note`
--
ALTER TABLE `text_note`
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
-- AUTO_INCREMENT для таблицы `text_note`
--
ALTER TABLE `text_note`
  MODIFY `id` tinyint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
