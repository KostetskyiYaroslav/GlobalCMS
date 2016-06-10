-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Час створення: Чрв 10 2016 р., 22:42
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
-- Структура таблиці `media`
--

CREATE TABLE IF NOT EXISTS `media` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `hash_name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `date` datetime DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `share_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `media`
--

INSERT INTO `media` (`id`, `name`, `hash_name`, `link`, `date`, `author_id`, `type`, `share_link`) VALUES
(80, '1', 'ef5b539de6caabad1c7ccb5d0da33f39', 'http://www.ci3.ukrspace.com/assets/uploads/media/ef5b539de6caabad1c7ccb5d0da33f39.png', '2016-06-10 00:26:27', 9, '.png', '<img class=''col-xs-12'' src=''http://www.ci3.ukrspace.com/assets/uploads/media/ef5b539de6caabad1c7ccb5d0da33f39.png''></img>'),
(81, '2', '893ba2ae65b55b68e59eb55ca5778a0a', 'http://www.ci3.ukrspace.com/assets/uploads/media/893ba2ae65b55b68e59eb55ca5778a0a.png', '2016-06-10 00:26:32', 9, '.png', '<img class=''col-xs-12'' src=''http://www.ci3.ukrspace.com/assets/uploads/media/893ba2ae65b55b68e59eb55ca5778a0a.png''></img>'),
(82, '3', '72133ba999763d465e615ae26d52282c', 'http://www.ci3.ukrspace.com/assets/uploads/media/72133ba999763d465e615ae26d52282c.png', '2016-06-10 00:26:38', 9, '.png', '<img class=''col-xs-12'' src=''http://www.ci3.ukrspace.com/assets/uploads/media/72133ba999763d465e615ae26d52282c.png''></img>'),
(83, '4', 'c78913799698fe2ea7929876c991f3c3', 'http://www.ci3.ukrspace.com/assets/uploads/media/c78913799698fe2ea7929876c991f3c3.png', '2016-06-10 00:26:42', 9, '.png', '<img class=''col-xs-12'' src=''http://www.ci3.ukrspace.com/assets/uploads/media/c78913799698fe2ea7929876c991f3c3.png''></img>'),
(84, '5', 'f61b034c97ce05792f530a4422dddb88', 'http://www.ci3.ukrspace.com/assets/uploads/media/f61b034c97ce05792f530a4422dddb88.png', '2016-06-10 00:26:47', 9, '.png', '<img class=''col-xs-12'' src=''http://www.ci3.ukrspace.com/assets/uploads/media/f61b034c97ce05792f530a4422dddb88.png''></img>'),
(85, 'TeamViewer_Setup_uk', '204e71dc18410777484110cbe53003a2', 'http://www.ci3.ukrspace.com/assets/uploads/media/204e71dc18410777484110cbe53003a2.exe', '2016-06-10 11:21:11', 9, '.exe', 'http://www.ci3.ukrspace.com/assets/uploads/media/204e71dc18410777484110cbe53003a2.exe');

-- --------------------------------------------------------

--
-- Структура таблиці `navigation`
--

CREATE TABLE IF NOT EXISTS `navigation` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `priority` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `navigation`
--

INSERT INTO `navigation` (`id`, `name`, `link`, `priority`) VALUES
(9, 'VK Conversations', 'https://vk.com/im', 1),
(26, 'Test Item 2', '/posts/view/18', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `author_id`, `attachment`, `date`, `tags`, `category_id`, `slug`) VALUES
(18, 'Hello World!', '<p>dh;sadjkf bhakdagnjdfgkLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to <video class=''col-xs-12'' controls=''controls''><source src=''http://www.ci3.ukrspace.com/assets/uploads/media/f4df7f065250cd35a2c2b25b4d43f313.mp4''></video></p>', 9, 'default-post.png', '2016-05-19 15:19:19', '', 1, 'HelloWorld'),
(22, 'Hello World3', '<p>dh;sadjkf bhakdagnjdfgkLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to &lt;video class=''col-xs-12'' src=''http://ci3.ukrspace.com/assets/uploads/media/57c694574bc93054c4af451de96f0c02.3gp''&gt;&lt;/video&gt;</p>', 9, 'default-post.png', '2016-05-24 14:33:52', '', 1, 'HelloWorld3'),
(25, 'Hello World3', '<p>dh;sadjkf bhakdagnjdfgkLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to &lt;video class=''col-xs-12'' src=''http://ci3.ukrspace.com/assets/uploads/media/57c694574bc93054c4af451de96f0c02.3gp''&gt;&lt;/video&gt;</p>', 9, 'default-post.png', '2016-05-24 14:33:52', '', 1, 'HelloWorld3'),
(26, 'Hello World3', '<p>dh;sadjkf bhakdagnjdfgkLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to &lt;video class=''col-xs-12'' src=''http://ci3.ukrspace.com/assets/uploads/media/57c694574bc93054c4af451de96f0c02.3gp''&gt;&lt;/video&gt;</p>', 9, 'default-post.png', '2016-05-24 14:33:52', '', 1, 'HelloWorld3'),
(27, 'Hello World3', '<p>dh;sadjkf bhakdagnjdfgkLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to &lt;video class=''col-xs-12'' src=''http://ci3.ukrspace.com/assets/uploads/media/57c694574bc93054c4af451de96f0c02.3gp''&gt;&lt;/video&gt;</p>', 9, 'default-post.png', '2016-05-24 14:33:52', '', 1, 'HelloWorld3'),
(28, 'Hello World3', '<p>dh;sadjkf bhakdagnjdfgkLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to &lt;video class=''col-xs-12'' src=''http://ci3.ukrspace.com/assets/uploads/media/57c694574bc93054c4af451de96f0c02.3gp''&gt;&lt;/video&gt;</p>', 9, 'default-post.png', '2016-05-24 14:33:52', '', 1, 'HelloWorld3'),
(29, 'Hello World3', '<p>dh;sadjkf bhakdagnjdfgkLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scramb</p>\r\n<p> </p>\r\n<p>&lt;video class="col-xs-12" src="http://ci3.ukrspace.com/assets/uploads/media/57c694574bc93054c4af451de96f0c02.3gp"&gt;&lt;/video&gt;</p>', 9, 'default-post.png', '2016-05-24 14:33:52', '', 1, 'HelloWorld3'),
(30, 'Hello World3', '<p>dh;sadjkf bhakdagnjdfgkLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to &lt;video class=''col-xs-12'' src=''http://ci3.ukrspace.com/assets/uploads/media/57c694574bc93054c4af451de96f0c02.3gp''&gt;&lt;/video&gt;</p>', 9, 'default-post.png', '2016-05-24 14:33:52', '', 1, 'HelloWorld3'),
(31, 'Hello World3', '<p>dh;sadjkf bhakdagnjdfgkLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to &lt;video class=''col-xs-12'' src=''http://ci3.ukrspace.com/assets/uploads/media/57c694574bc93054c4af451de96f0c02.3gp''&gt;&lt;/video&gt;</p>', 9, 'default-post.png', '2016-05-24 14:33:52', '', 1, 'HelloWorld3'),
(32, 'Hello World3', '<p>dh;sadjkf bhakdagnjdfgkLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to <video class=''col-xs-12'' controls=''controls''><source src=''http://www.ci3.ukrspace.com/assets/uploads/media/f4df7f065250cd35a2c2b25b4d43f313.mp4''></video></p>', 9, 'default-post.png', '2016-05-24 14:33:52', '', 1, 'HelloWorld3');

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `themes`
--

INSERT INTO `themes` (`id`, `name`, `path`, `author`, `description`, `screenshot`, `activate`) VALUES
(4, 'Standard', 'standard', 'KostetskiyCMS', '<p xss=removed><em><strong>This theme are default on web site</strong></em></p>', NULL, 0),
(5, 'Minimalistic Edit', 'minimalistic', 'Yaroslav Edit', '<p>This theme make your site easy to view and beautiful colors rich your pages.edit</p>', '', 0),
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
(61, '111111', '356a192b7913b04c54574d18c28d46e6395428ab', 'ya.kosteckiy@gmail.com', -13, '0000-00-00 00:00:00'),
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `widgets_abs`
--

INSERT INTO `widgets_abs` (`id`, `name`, `path`, `role_id`) VALUES
(1, 'Current Time', 'current_time', 6),
(2, 'Search Form', 'search_form', 6),
(8, 'Advertising', 'advertising', 6),
(9, 'Advertising', 'advertising', 6),
(11, 'Example', 'example', 6);

--
-- Тригери `widgets_abs`
--
DELIMITER //
CREATE TRIGGER `remove_active_widgets` AFTER DELETE ON `widgets_abs`
 FOR EACH ROW BEGIN
  DELETE FROM `widgets_act` WHERE `path` = `old`.`path`;
END
//
DELIMITER ;

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
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `widgets_act`
--

INSERT INTO `widgets_act` (`id`, `name`, `path`, `priority`, `position`, `options`, `active`, `role_id`) VALUES
(92, 'Advertising', 'advertising', 0, 'wdgt-footer-3', NULL, 1, 6),
(108, 'Search Form', 'search_form', 50, 'wdgt-footer-1', NULL, 1, 6),
(113, 'Advertising', 'advertising', 0, 'wdgt-sidebar-1', NULL, 1, 6),
(114, 'Advertising', 'advertising', 0, 'wdgt-footer-1', NULL, 1, 6),
(115, 'Search Form', 'search_form', 0, 'wdgt-footer-1', NULL, 1, 6),
(116, 'Current Time', 'current_time', 500, 'wdgt-footer-1', NULL, 1, 6),
(117, 'Advertising', 'advertising', 0, 'wdgt-footer-1', NULL, 1, 6),
(119, 'Advertising', 'advertising', 100, 'wdgt-footer-2', NULL, 1, 6),
(121, 'Search Form', 'search_form', 0, 'wdgt-footer-2', NULL, 1, 6),
(122, 'Current Time', 'current_time', 850, 'wdgt-footer-3', NULL, 1, 6),
(123, 'Advertising', 'advertising', 0, 'wdgt-footer-2', NULL, 1, 6),
(124, 'Advertising', 'advertising', 0, 'wdgt-footer-2', NULL, 1, 6),
(125, 'Advertising', 'advertising', 0, 'wdgt-sidebar-1', NULL, 1, 6),
(126, 'Example', 'example', 50000, 'wdgt-footer-3', NULL, 1, 6);

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
-- Індекси таблиці `media`
--
ALTER TABLE `media`
 ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `navigation`
--
ALTER TABLE `navigation`
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
-- AUTO_INCREMENT для таблиці `media`
--
ALTER TABLE `media`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT для таблиці `navigation`
--
ALTER TABLE `navigation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблиці `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT для таблиці `widgets_abs`
--
ALTER TABLE `widgets_abs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблиці `widgets_act`
--
ALTER TABLE `widgets_act`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=127;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
