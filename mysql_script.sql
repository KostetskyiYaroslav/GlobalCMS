CREATE TABLE ci3db.roles
(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  access_lvl INT(11) NOT NULL
);

CREATE TABLE ci3db.users
(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  login VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  role_id INT(11) DEFAULT 5
);

CREATE TABLE ci3db.categories
(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  tags VARCHAR(100),
  role_id INT(11) DEFAULT '6'
);

CREATE TABLE ci3db.posts
(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  title VARCHAR(100) NOT NULL,
  body TEXT NOT NULL,
  author_id INT(11) NOT NULL,
  atachment VARCHAR(100),
  date DATETIME NOT NULL,
  tags VARCHAR(255),
  categorie_id INT(11) DEFAULT '1'
);

INSERT INTO `ci3db`.`roles`
( `id`, `name`, `access_lvl` )
VALUES
  ( NULL, 'Admin', 10),
  ( NULL, 'Moderator', 8),
  ( NULL, 'Content Moderator', 6),
  ( NULL, 'User', 4),
  ( NULL, 'Not Active User', 2),
  ( NULL, 'Guest', 0),
  ( NULL, 'Banned', -1);

INSERT INTO `ci3db`.`users`
(`id`, `login`, `password`, `email`, `role_id`)
  VALUE
  (NULL,'Kostecki', '1', 'ya.kosteckiy@gmail.com', 1);

INSERT INTO `ci3db`.`categories`
( `id`, `name`, `tags`, `role_id` )
VALUES
  ( NULL, 'Without Category', 'Without Category', 0);

INSERT INTO `ci3db`.`posts`
( `id`, `title`, `body`, `author_id`, `atachment`, `date`, `tags`, `categorie_id`)
VALUES
  (
    NULL, 'First Post'
    ,
    'We very happy to see you here! Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'
    , 1, '', NOW(), '', 1
  ),
  (
    NULL, 'Welcome!'
    , 'We very happy to see you here! Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'
    , 1 , '' , NOW(), '', 1
  );