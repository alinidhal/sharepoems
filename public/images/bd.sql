CREATE TABLE `user` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nickname` varchar(255),
  `password` varchar(255)
);

CREATE TABLE `post` (
  `user_id` int,
  `title` varchar(255),
  `datetime` varchar(255),
  `description` longtext,
  `url_img` varchar(255)
);

ALTER TABLE `user` ADD FOREIGN KEY (`id`) REFERENCES `post` (`user_id`);
