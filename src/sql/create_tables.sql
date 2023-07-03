DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `products`;
DROP TABLE IF EXISTS `baskets`;
DROP TABLE IF EXISTS `items`;
DROP TABLE IF EXISTS `sets`;
DROP TABLE IF EXISTS `keyboards`;
DROP TABLE IF EXISTS `keycaps`;
DROP TABLE IF EXISTS `switches`;
DROP TABLE IF EXISTS `cases`;
DROP TABLE IF EXISTS `pcbs`;
DROP TABLE IF EXISTS `cables`;
DROP TABLE IF EXISTS `tools`;
DROP TABLE IF EXISTS `accessories`;

CREATE TABLE `users` (
  id          INT AUTO_INCREMENT,
  name        VARCHAR(255) NOT NULL,
  email       VARCHAR(255) NOT NULL,
  password    VARCHAR(255) NOT NULL,
  avatar_url  VARCHAR(8192),
  PRIMARY KEY (`id`)
);

CREATE TABLE `products` (
  id         INT AUTO_INCREMENT,
  type       ENUM('set', 'keyboard', 'keycaps', 'switches', 'case', 'pcb', 'cable', 'tool', 'accessory'),
  name       VARCHAR(255),
  price      DECIMAL(10, 2),
  image_url  VARCHAR(8192),
  PRIMARY KEY (`id`)
);

CREATE TABLE `baskets` (
  id INT AUTO_INCREMENT,
  user_id INT,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);

CREATE TABLE `items` (
  product_id INT,
  basket_id INT,
  quantity INT,
  PRIMARY KEY (`product_id`, `basket_id`),
  FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  FOREIGN KEY (`basket_id`) REFERENCES `baskets` (`id`)
);

CREATE TABLE `sets` (
  id INT AUTO_INCREMENT,
  type ENUM('builtin', 'custom'),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES `products` (`id`)
);

CREATE TABLE `keyboards` (
  id INT AUTO_INCREMENT,
  size ENUM('full', 'tkl', '75', '65', '60', '40', 'other'),
  layout ENUM('ansi', 'iso', 'other'),
  rgb BOOLEAN,
  wireless BOOLEAN,
  hot_swappable BOOLEAN,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES `products` (`id`)
);

CREATE TABLE `keycaps` (
  id INT AUTO_INCREMENT,
  type ENUM('groupby', 'classic'),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES `products` (`id`)
);

CREATE TABLE `switches` (
  id INT AUTO_INCREMENT,
  type ENUM('linear', 'tactile', 'clicky', 'optical', 'other'),
  actuation INT,
  bottom_out INT,
  `force` INT,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES `products` (`id`)
);

CREATE TABLE `cases` (
  id INT AUTO_INCREMENT,
  type ENUM('aluminum', 'plastic', 'wood', 'other'),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES `products` (`id`)
);

CREATE TABLE `pcbs` (
  id INT AUTO_INCREMENT,
  type ENUM('north', 'south', 'other'),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES `products` (`id`)
);

CREATE TABLE `tools` (
  id INT AUTO_INCREMENT,
  type ENUM('lube', 'switch opener', 'switch puller', 'keycap puller', 'lube station', 'other'),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES `products` (`id`)
);

CREATE TABLE `accessories` (
  id INT AUTO_INCREMENT,
  type ENUM('mouse pad', 'wrist rest', 'stabilizers', 'foam', 'cables', 'house', 'knobs', 'buffers', 'o rings', 'stickers', 'other'),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES `products` (`id`)
);
