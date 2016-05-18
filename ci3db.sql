-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Час створення: Трв 19 2016 р., 01:08
-- Версія сервера: 5.5.49-0+deb8u1
-- Версія PHP: 5.6.20-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База даних: `ci3db`
--

-- --------------------------------------------------------

--
-- Структура таблиці `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tags` varchar(100) DEFAULT NULL,
  `role_id` int(11) DEFAULT '6'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `categories`
--

INSERT INTO `categories` (`id`, `name`, `tags`, `role_id`) VALUES
(1, 'Without Category', 'Without Category', 0);

-- --------------------------------------------------------

--
-- Структура таблиці `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `attachment` varchar(100) DEFAULT NULL,
  `date` datetime NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT '1',
  `slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `author_id`, `attachment`, `date`, `tags`, `category_id`, `slug`) VALUES
(1, 'First Post', 'asdfsdfhgf', 8, '', '2016-05-15 12:11:14', '', 1, 'first-post'),
(2, 'Welcome!', 'We very happy to see you here! Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 7, '', '2016-06-15 11:11:14', '', 1, 'welcome'),
(3, 'Welco231me!', 'We very happy to see you here! Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 7, '', '2016-05-15 13:11:14', '', 1, 'welcome1'),
(4, 'tet', 'We very happy to see you here! Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 9, '', '2016-05-15 14:11:14', '', 1, 'welcome1'),
(8, 'Welcome!2', '56456456456', 7, '', '2016-05-15 15:11:14', '', 1, 'welcome'),
(9, '1123', 'We very happy to see you here! Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 9, '', '2016-05-15 20:11:14', '', 1, 'welcome1'),
(10, 'Welco231me!', 'We very happy to see you here! Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 7, '', '2016-05-15 16:11:14', '', 1, 'welcome1');

-- --------------------------------------------------------

--
-- Структура таблиці `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `access_lvl` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `roles`
--

INSERT INTO `roles` (`id`, `name`, `access_lvl`) VALUES
(1, 'Admin', 10),
(2, 'Moderator', 8),
(3, 'Content Moderator', 6),
(4, 'User', 4),
(5, 'Not Active User', 2),
(6, 'Guest', 0),
(7, 'Banned', -1);

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role_id` int(11) DEFAULT '5',
  `date_created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `role_id`, `date_created`) VALUES
(7, 'Adminman', 'b692b4fc2b4bb8f20b1f2ef0318f1ed599e05453', 'Adminman@admin.com', 1, '2015-05-18 11:48:33'),
(9, 'Kosteckiy', '51d291167e983ab74e5cfbb7cec486003ba11725', 'ya.kosteckiy@gmail.com', 1, '2013-05-18 11:48:33'),
(10, 'kostecki', '042dc4512fa3d391c5170cf3aa61e6a638f84342', 'yaroslavxxxx@yandex.ru', 2, '2012-05-18 11:48:33'),
(11, 'Alina', '356a192b7913b04c54574d18c28d46e6395428ab', 'Alina@bk.ru', 4, '2011-05-18 11:48:33'),
(12, 'Maxim', '356a192b7913b04c54574d18c28d46e6395428ab', 'Max@mail.bk', 3, '2016-05-18 11:48:33');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблиці `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
