-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Час створення: Чрв 04 2016 р., 01:06
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `confirmation`
--

INSERT INTO `confirmation` (`id`, `key`, `login`) VALUES
(13, 'd3805ba9907ddf829cd7ea5bf8bbf6d525e9a3b2', 'ci3user'),
(14, 'ed03d7475160d6c55a80aaf94a26e22602458ff5', 'Nika1');

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
(18, 'Hello World!', '<p>asdjkfguklajdhgjklsahdfjk asdfjkl dh;sadjkf bhakdagnjdfgkLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 9, 'default-post.png', '2016-05-19 15:19:19', '', 1, 'HelloWorld'),
(22, 'Hello World3', '<p> dh;sadjkf bhakdagnjdfgkLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 9, 'default-post.png', '2016-05-24 14:33:52', '', 1, 'HelloWorld3'),
(24, 'hdfkghd!@#$!@@# -gvy', '<p>dsjksjdgkjdfngjdkfg</p>', 9, 'default-post.png', '2016-05-24 18:42:51', ''';drop table tb1', 2, 'hdfkghd-gvy');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`) VALUES
(1, 'site_name', 'Web Site'),
(2, 'contact_email', 'ya.kosteckiy@gmail.com'),
(3, 'domain', 'ci3.ukrspace.com'),
(4, 'keywords', 'SofgGroup, sg, IT Company, PHP Development, PHP Academy, CMS, CodeIgniter3, ci3');

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
(1, 'Confirmation', '<p>Dear, {login}!<br>We are very glab for you in our community!<br>To confirm you account click {here}!</p>'),
(2, 'Restore', '<p xss=removed><strong>Dear, {login}!</strong><br><strong>If you don''t restore your password tall about it Administrator! Forgot for this massage!</strong><br><strong>This is your new password: {password}</strong></p>');

-- --------------------------------------------------------

--
-- Структура таблиці `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `author` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `screenshot` varchar(100) DEFAULT NULL,
  `activate` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `themes`
--

INSERT INTO `themes` (`id`, `name`, `path`, `author`, `description`, `screenshot`, `activate`) VALUES
(4, 'Standard', 'standard', 'KostetskiyCMS', 'This theme are default on web site', NULL, 0),
(5, 'Minimalistic', 'minimalistic', 'Yaroslav', 'This theme make your site easy to view and beautiful colors rich your pages.', NULL, 0),
(6, 'Special Theme', 'special_theme', 'Another Author', 'This theme different from other.', NULL, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `role_id`, `date_created`) VALUES
(9, 'Kosteckiy', '356a192b7913b04c54574d18c28d46e6395428ab', 'ya.kosteckiy@gmail.com', 1, '2013-05-18 11:48:33'),
(61, '111111', '356a192b7913b04c54574d18c28d46e6395428ab', 'ya.kosteckiy@gmail.com', 4, '0000-00-00 00:00:00'),
(62, '22222', '356a192b7913b04c54574d18c28d46e6395428ab', 'ya.kosteckiy@gmail.com', 4, '2016-05-22 00:57:22'),
(63, '00000', '356a192b7913b04c54574d18c28d46e6395428ab', 'ya.kosteckiy@gmail.com', 4, '2016-05-22 00:58:33'),
(68, 'Alina', '0ee91ecab4013a1fffcd00e8f619002bb274cd0f', 'alisha.artemchyk@gmail.com', 4, '2016-05-22 16:08:46'),
(79, 'ci3user', '356a192b7913b04c54574d18c28d46e6395428ab', '11111@111.dsf', 1, '2016-05-26 19:29:20'),
(80, 'Nika1', '356a192b7913b04c54574d18c28d46e6395428ab', 'alisha.artemchyk@gmail.com', 5, '2016-05-30 14:53:54');

-- --------------------------------------------------------

--
-- Структура таблиці `widgets_abs`
--

CREATE TABLE IF NOT EXISTS `widgets_abs` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `path` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `widgets_abs`
--

INSERT INTO `widgets_abs` (`id`, `name`, `path`, `role_id`) VALUES
(1, 'Current Time', 'current_time', 6),
(2, 'Search Form', 'search_form', 6);

-- --------------------------------------------------------

--
-- Структура таблиці `widgets_act`
--

CREATE TABLE IF NOT EXISTS `widgets_act` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `path` text NOT NULL,
  `priority` int(11) DEFAULT '0',
  `position` varchar(50) NOT NULL,
  `options` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  `role_id` int(11) NOT NULL DEFAULT '6'
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `widgets_act`
--

INSERT INTO `widgets_act` (`id`, `name`, `path`, `priority`, `position`, `options`, `active`, `role_id`) VALUES
(45, 'Current Time', 'current_time', 10, 'wdgt-footer-3', NULL, 1, 6),
(46, 'Current Time', 'current_time', 20, 'wdgt-sidebar-1', NULL, 1, 6),
(50, 'Search Form', 'search_form', 99, 'wdgt-sidebar-1', NULL, 1, 6),
(53, 'Search Form', 'search_form', 50, 'wdgt-footer-3', NULL, 1, 6),
(71, 'Search Form', 'search_form', 70, 'wdgt-footer-1', NULL, 1, 6),
(72, 'Current Time', 'current_time', 65, 'wdgt-footer-1', NULL, 1, 6),
(81, 'Current Time', 'current_time', 0, 'wdgt-sidebar-1', NULL, 1, 6),
(84, 'Current Time', 'current_time', 0, 'wdgt-footer-2', NULL, 1, 6),
(85, 'Current Time', 'current_time', 0, 'wdgt-footer-1', NULL, 1, 6);

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
-- Індекси таблиці `themes`
--
ALTER TABLE `themes`
 ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `widgets_abs`
--
ALTER TABLE `widgets_abs`
 ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `widgets_act`
--
ALTER TABLE `widgets_act`
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблиці `templates`
--
ALTER TABLE `templates`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблиці `themes`
--
ALTER TABLE `themes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT для таблиці `widgets_abs`
--
ALTER TABLE `widgets_abs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблиці `widgets_act`
--
ALTER TABLE `widgets_act`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=86;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
