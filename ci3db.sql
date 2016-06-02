-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Час створення: Трв 26 2016 р., 00:49
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `categories`
--

INSERT INTO `categories` (`id`, `name`, `tags`, `role_id`) VALUES
(1, 'Without Category', 'Without Category', 6),
(2, 'News', 'SG', 4);

--
-- Тригери `categories`
--
DELIMITER //
CREATE TRIGGER `lost_relation_category` AFTER DELETE ON `categories`
 FOR EACH ROW BEGIN
  DELETE FROM `posts` WHERE `category_id` = `old`.`id`;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблиці `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(11) NOT NULL,
  `body` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `author_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `comments`
--

INSERT INTO `comments` (`id`, `body`, `date`, `author_id`, `post_id`) VALUES
(1, 'ajshdojkashdkj', '2016-05-24 17:23:28', 9, 22),
(2, 'test', '2016-05-25 10:51:15', 61, 18);

-- --------------------------------------------------------

--
-- Структура таблиці `confirmation`
--

CREATE TABLE IF NOT EXISTS `confirmation` (
`id` int(11) NOT NULL,
  `key` varchar(255) NOT NULL,
  `login` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `confirmation`
--

INSERT INTO `confirmation` (`id`, `key`, `login`) VALUES
(7, '28bffb541785ee1b676df6981702bed9830d913d', 'Vovat');

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `author_id`, `attachment`, `date`, `tags`, `category_id`, `slug`) VALUES
(18, 'Hello World!', '<p><strong>asdjkfguklajdhgjklsahdfjk asdfjkl dh;sadjkf bhakdagnjdfgkLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,<em> and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</em></strong></p>', 9, 'default-post.png', '2016-05-19 15:19:19', '', 1, 'HelloWorld'),
(22, 'Hello World3', 'asdjkfguklajdhgjklsahdfjk asdfjkl dh;sadjkf bhakdagnjdfgk', 9, 'default-post.png', '2016-05-24 14:33:52', '', 1, 'HelloWorld3'),
(24, 'hdfkghd!@#$!@@# -gvy', 'dsjksjdgkjdfngjdkfg', 9, 'default-post.png', '2016-05-24 18:42:51', '', 2, 'hdfkghd-gvy');

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
-- Структура таблиці `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `template` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `templates`
--

INSERT INTO `templates` (`id`, `name`, `template`) VALUES
(1, 'Confirmation', 'Dear, {login}!<br>We are very grab for you in our community!<br>To confirm you account click {here}!'),
(2, 'Restore', '<p style="text-align: center;">Dear, {login}!<br />If you don''t restore your password tall about it Administrator! Forgot for this massage!<br />This is your new password: {password}</p>');

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
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `role_id`, `date_created`) VALUES
(9, 'Kosteckiy', 'f2980c5821c8f75e5ad4944cecd4b6b21a9e1198', 'ya.kosteckiy@gmail.com', 1, '2013-05-18 11:48:33'),
(61, '111111', '356a192b7913b04c54574d18c28d46e6395428ab', 'ya.kosteckiy@gmail.com', 4, '2016-05-22 00:55:03'),
(62, '22222', '356a192b7913b04c54574d18c28d46e6395428ab', 'ya.kosteckiy@gmail.com', 4, '2016-05-22 00:57:22'),
(63, '00000', '356a192b7913b04c54574d18c28d46e6395428ab', 'ya.kosteckiy@gmail.com', 4, '2016-05-22 00:58:33'),
(68, 'Alina', '0ee91ecab4013a1fffcd00e8f619002bb274cd0f', 'alisha.artemchyk@gmail.com', 4, '2016-05-22 16:08:46');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `confirmation`
--
ALTER TABLE `confirmation`
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
-- Індекси таблиці `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `templates`
--
ALTER TABLE `templates`
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблиці `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблиці `confirmation`
--
ALTER TABLE `confirmation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблиці `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT для таблиці `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблиці `settings`
--
ALTER TABLE `settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `templates`
--
ALTER TABLE `templates`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=78;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
