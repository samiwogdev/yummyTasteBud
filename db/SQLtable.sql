CREATE TABLE `menu` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `user_admin` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` int(11) NOT NULL COMMENT '1 => super_admin, 2 => admin 3 => user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `order` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_email` varchar(150) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `payment_status` int(11) NOT NULL DEFAULT 0,
  `trans_ref` varchar(250) NOT NULL DEFAULT '0',
  `order_date` datetime NOT NULL,
  `amount_paid` double(20,2) NOT NULL DEFAULT 0.00,
  `delivery_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `shop` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `alias` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `price` double(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `shop` ADD COLUMN status INT(11) NOT NULL DEFAULT 1 AFTER `price` 


