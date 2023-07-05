DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `products`;
DROP TABLE IF EXISTS `baskets`;
DROP TABLE IF EXISTS `favorites`;
DROP TABLE IF EXISTS `items`;
DROP TABLE IF EXISTS `sets`;
DROP TABLE IF EXISTS `keyboards`;
DROP TABLE IF EXISTS `keycaps`;
DROP TABLE IF EXISTS `switches`;
DROP TABLE IF EXISTS `cases`;
DROP TABLE IF EXISTS `pcbs`;
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

CREATE TABLE `favorites` (
  user_id INT,
  product_id INT,
  PRIMARY KEY (`user_id`, `product_id`),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
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
  product_id INT,
  type ENUM('builtin', 'custom'),
  PRIMARY KEY (`product_id`),
  FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
);

CREATE TABLE `keyboards` (
  product_id INT,
  type ENUM('full', 'tkl', '75', '65', '60', '40', 'other'),
  layout ENUM('ansi', 'iso', 'other'),
  rgb BOOLEAN,
  wireless BOOLEAN,
  hot_swappable BOOLEAN,
  PRIMARY KEY (`product_id`),
  FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
);

CREATE TABLE `keycaps` (
  product_id INT,
  type ENUM('group_by', 'classic', 'artisanal'),
  PRIMARY KEY (`product_id`),
  FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
);

CREATE TABLE `switches` (
  product_id INT,
  type ENUM('linear', 'tactile', 'clicky', 'optical', 'other'),
  actuation INT,
  bottom_out INT,
  `force` INT,
  PRIMARY KEY (`product_id`),
  FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
);

CREATE TABLE `cases` (
  product_id INT,
  type ENUM('aluminum', 'plastic', 'wood', 'other'),
  PRIMARY KEY (`product_id`),
  FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
);

CREATE TABLE `pcbs` (
  product_id INT,
  type ENUM('north', 'south', 'other'),
  PRIMARY KEY (`product_id`),
  FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
);

CREATE TABLE `tools` (
  product_id INT,
  type ENUM('switch_puller', 'keycaps_puller', 'brush', 'lube', 'switch_opener', 'lube_station'),
  PRIMARY KEY (`product_id`),
  FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
);

CREATE TABLE `accessories` (
  product_id INT,
  type ENUM('mouse_pad', 'wrist_rest', 'stabilizers', 'foam', 'cables', 'house', 'knobs', 'buffers', 'o_rings', 'stickers'),
  PRIMARY KEY (`product_id`),
  FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
);
