-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 18 2019 г., 15:04
-- Версия сервера: 5.6.38
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `progbd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL COMMENT 'id изображения',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'путь до изображения',
  `last_id` int(11) NOT NULL COMMENT 'id поста'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `name`, `last_id`) VALUES
(58, '2717521398.jpg', 84),
(59, 'icon_admin(1).png', 85);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL COMMENT 'id поста',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'название',
  `post` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'пост',
  `autor_id` int(11) NOT NULL COMMENT 'id автора',
  `date_add` timestamp NULL DEFAULT NULL COMMENT 'дата добавления',
  `date_update` date DEFAULT NULL COMMENT 'дата изменения',
  `draft` tinyint(1) NOT NULL COMMENT 'черновик',
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'статус задачи',
  `deleted` tinyint(1) NOT NULL COMMENT 'проверка удаления'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `post`, `autor_id`, `date_add`, `date_update`, `draft`, `status`, `deleted`) VALUES
(84, 'Запись первая1', 'Описание первой записи. Описание первой записи. Описание первой записи. Описание первой записи. Описание первой записи. Описание первой записи. Описание первой записи. Описание первой записи. Описание первой записи. Описание первой записи. Описание первой записи. Описание первой записи. Описание первой записи. Описание первой записи. Описание первой записи. Описание первой записи. Описание первой записи. Описание первой записи. Описание первой записи. ', 16, '2019-03-18 09:40:31', NULL, 0, 'В процессе', 0),
(85, 'Запись вторая5', '123Описание второй записи. Описание второй записи. Описание второй записи. Описание второй записи. Описание второй записи. Описание второй записи. Описание второй записи. Описание второй записи. Описание второй записи. Описание второй записи. Описание второй записи. Описание второй записи. Описание второй записи. Описание второй записи. Описание второй записи. Описание второй записи. Описание второй записи. ', 16, '2019-03-18 09:50:37', NULL, 0, 'В процессе', 0);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `posts_up`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `posts_up` (
`id` int(11)
,`title` varchar(255)
,`post` text
,`date_update` date
,`draft` tinyint(1)
,`status` varchar(50)
,`name` varchar(255)
,`last_id` int(11)
);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(13) DEFAULT NULL,
  `userlogin` varchar(20) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `email` varchar(44) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `userlogin`, `password`, `email`) VALUES
(15, 'Марина', 'marinka', 'd9b1d7db4cd6e70935368a1efb10e377', 'marishka8422@gmail.com'),
(16, 'Макс Кириллов', 'Maxavel', '45ba0f04526b43257d1dfb5b658ac754', 'km.115@yandex.ru');

-- --------------------------------------------------------

--
-- Структура для представления `posts_up`
--
DROP TABLE IF EXISTS `posts_up`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `posts_up`  AS  select `posts`.`id` AS `id`,`posts`.`title` AS `title`,`posts`.`post` AS `post`,`posts`.`date_update` AS `date_update`,`posts`.`draft` AS `draft`,`posts`.`status` AS `status`,`images`.`name` AS `name`,`images`.`last_id` AS `last_id` from (`posts` join `images` on((`posts`.`id` = `images`.`last_id`))) ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id изображения', AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id поста', AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
