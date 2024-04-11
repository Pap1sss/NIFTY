

CREATE TABLE `admin_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_initial` varchar(2) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO admin_accounts VALUES("25","castroroyfrancis@gmail.com","Roy Francis","B","Castro","Papisss","$2y$10$/dhVJv2rsFL0ZzqTYO4.7eKd6qU33d4ydxgnT.sOBaEUfupxF9f1O","0","verified");
INSERT INTO admin_accounts VALUES("26","papisss05@gmail.com","Lebron","K","James","LBJ","$2y$10$f2Zt5Ip/M3htcgO/mNloKuLF18tcqPycjUYd0Mi3Bzh9UuMjmyjja","0","verified");



CREATE TABLE `admin_activity_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `date_log` date NOT NULL,
  `time_log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `action` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=256 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO admin_activity_log VALUES("254","Papisss","2024-04-11","2024-04-11 18:37:31","Generate Sales Report");
INSERT INTO admin_activity_log VALUES("255","Papisss","2024-04-11","2024-04-11 18:40:27","Generate Sales Report from 2024-04-10 to 2024-04-10");



CREATE TABLE `admin_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `timein` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO admin_log VALUES("132","Papisss","2024-04-10 15:57:13","2024-04-10");
INSERT INTO admin_log VALUES("133","LBJ","2024-04-10 16:02:29","2024-04-10");
INSERT INTO admin_log VALUES("134","Papisss","2024-04-10 16:02:42","2024-04-10");
INSERT INTO admin_log VALUES("135","Papisss","2024-04-11 15:05:52","2024-04-11");



CREATE TABLE `archive_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_time_archive` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `archive_review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `review_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_rating` varchar(255) NOT NULL,
  `user_review` varchar(255) NOT NULL,
  `date_time_archive` datetime NOT NULL DEFAULT current_timestamp(),
  `product_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `archive_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_time_archive` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `cart` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) NOT NULL,
  `user_id` int(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `category` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO category VALUES("33","Flats");
INSERT INTO category VALUES("34","Sandals");
INSERT INTO category VALUES("37","Heels");
INSERT INTO category VALUES("45","Slip-ons");
INSERT INTO category VALUES("66","Slide");



CREATE TABLE `logs` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `timein` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO logs VALUES("123","castroroyfrancis@gmail.com","2024-04-10 16:01:33","2024-04-10");
INSERT INTO logs VALUES("124","castroroyfrancis@gmail.com","2024-04-10 16:02:54","2024-04-10");
INSERT INTO logs VALUES("125","mowal46777@kravify.com","2024-04-11 14:37:28","2024-04-11");



CREATE TABLE `order_archive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `datetime_of_order` varchar(255) NOT NULL,
  `datetime_of_archive` datetime NOT NULL DEFAULT current_timestamp(),
  `reference_number` varchar(255) NOT NULL,
  `gcash_number` varchar(255) NOT NULL,
  `screenshot` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `order_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO order_log VALUES("5","132","Accepted Payment for GCASH - ORDER #: 132","Papisss","2024-04-10 16:09:11");
INSERT INTO order_log VALUES("6","135","updated order status (to ship)","Papisss","2024-04-10 16:34:01");
INSERT INTO order_log VALUES("7","135","updated order status (to receive)","Papisss","2024-04-10 16:34:08");
INSERT INTO order_log VALUES("8","135","updated order status (order completed)","Papisss","2024-04-10 16:34:12");
INSERT INTO order_log VALUES("9","135","updated order status (order completed)","Papisss","2024-04-10 16:38:05");
INSERT INTO order_log VALUES("10","135","updated order status (order completed)","Papisss","2024-04-10 16:38:48");
INSERT INTO order_log VALUES("11","135","updated order status (order completed)","Papisss","2024-04-10 16:39:51");
INSERT INTO order_log VALUES("12","135","updated order status (order completed)","Papisss","2024-04-10 16:40:40");
INSERT INTO order_log VALUES("13","135","updated order status (order completed)","Papisss","2024-04-10 16:42:15");
INSERT INTO order_log VALUES("14","136","updated order status (to ship)","Papisss","2024-04-10 16:46:06");
INSERT INTO order_log VALUES("15","136","updated order status (to receive)","Papisss","2024-04-10 16:46:15");
INSERT INTO order_log VALUES("16","136","updated order status (order completed)","Papisss","2024-04-10 16:46:19");
INSERT INTO order_log VALUES("17","137","updated order status (to ship)","Papisss","2024-04-10 16:49:35");
INSERT INTO order_log VALUES("18","137","updated order status (to receive)","Papisss","2024-04-10 16:49:42");
INSERT INTO order_log VALUES("19","137","updated order status (order completed)","Papisss","2024-04-10 16:49:55");



CREATE TABLE `orders` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `date_created` date NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `reference_number` varchar(255) NOT NULL,
  `gcash_number` varchar(255) NOT NULL,
  `screenshot` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO orders VALUES("136","Roy Francis","09750162818","castroroyfrancis@gmail.com","cash on delivery","5014 General Ricarte St. South Cembo Makati","FOLDABLE BALLERINA -7Navy Blue -2

Mystic -7Black -1

Gabe -7White -1

Ferdie -7Gunmetal -1
","4295","137","order completed","2024-04-10","2024-04-10 16:44:55","0","0","none");
INSERT INTO orders VALUES("137","Roy Francis","09750162818","castroroyfrancis@gmail.com","cash on delivery","5014 General Ricarte St. South Cembo Makati","Mystic -7Black -1

Gabe -7Beige -1
","2098","137","order completed","2024-04-10","2024-04-10 16:47:56","0","0","none");



CREATE TABLE `pending_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO pending_cart VALUES("1","52","135","Gabe","5495","8","White","5");
INSERT INTO pending_cart VALUES("2","47","136","FOLDABLE BALLERINA","999","7","Navy Blue","2");
INSERT INTO pending_cart VALUES("3","51","136","Mystic","999","7","Black","1");
INSERT INTO pending_cart VALUES("4","52","136","Gabe","999","7","White","1");
INSERT INTO pending_cart VALUES("5","53","136","Ferdie","999","7","Gunmetal","1");



CREATE TABLE `product_gallery` (
  `gallery_id` int(255) NOT NULL AUTO_INCREMENT,
  `product_id` int(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `date_uploaded` datetime NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO product_gallery VALUES("1","44","367c4418-0e6d-4d4f-8aeb-17ea1792e692.jpg","2024-03-28 21:17:43");
INSERT INTO product_gallery VALUES("2","45","427800912_246012861891625_4022607893347354658_n.png","2024-03-31 19:52:30");
INSERT INTO product_gallery VALUES("3","46","ph-11134207-7r98p-lsdufaivyjwka6 (1).jpg","2024-04-06 00:45:19");
INSERT INTO product_gallery VALUES("4","47","ph-11134207-7r98p-lsdufaivyjwka6 (1).jpg","2024-04-06 00:47:06");
INSERT INTO product_gallery VALUES("10","47","ph-11134207-7r98r-lsduuv67pqt1d5.jpg","2024-04-09 11:38:18");
INSERT INTO product_gallery VALUES("12","48","427800912_246012861891625_4022607893347354658_n.png","2024-04-09 23:43:47");
INSERT INTO product_gallery VALUES("13","49","shinobi-jett-valorant-thumb.jpg","2024-04-09 23:46:43");
INSERT INTO product_gallery VALUES("14","50","shinobi-jett-valorant-thumb.jpg","2024-04-09 23:48:15");
INSERT INTO product_gallery VALUES("15","51","ph-11134207-7r98r-ltw2j3bqc67kdd.jpg","2024-04-10 13:00:07");
INSERT INTO product_gallery VALUES("16","52","ph-11134207-7r98p-ltvyg3pr3ypv21.jpg","2024-04-10 13:02:30");
INSERT INTO product_gallery VALUES("17","53","ph-11134207-7r98s-lq8ofk5jjgsb10.jpg","2024-04-10 13:04:08");
INSERT INTO product_gallery VALUES("18","53","ph-11134207-7r98t-lq8orkuom1cf8f.jpg","2024-04-10 13:04:15");
INSERT INTO product_gallery VALUES("19","53","ph-11134207-7r98o-lq8orkuokmrz37.jpg","2024-04-10 13:05:09");
INSERT INTO product_gallery VALUES("20","53","ph-11134207-7r98w-lq8orkuo56j353.jpg","2024-04-10 13:05:12");
INSERT INTO product_gallery VALUES("21","53","ph-11134207-7r98t-lq8orkuo6lkr80.jpg","2024-04-10 13:05:16");
INSERT INTO product_gallery VALUES("22","54","ph-11134207-7r98z-ltvxqowdtyeoa5.jpg","2024-04-10 13:06:29");
INSERT INTO product_gallery VALUES("23","55","ph-11134207-7r98o-ltbuf4wobt50fb (1).jpg","2024-04-10 13:07:46");
INSERT INTO product_gallery VALUES("24","56","ph-11134207-7r991-ltafe19du7lh10 (1).jpg","2024-04-10 13:09:14");
INSERT INTO product_gallery VALUES("25","57","ph-11134207-7r992-lt3iblk6ejic1f.jpg","2024-04-10 13:16:00");
INSERT INTO product_gallery VALUES("26","57","ph-11134207-7r98o-lt3iblk6fy2sf1.jpg","2024-04-10 13:16:08");
INSERT INTO product_gallery VALUES("27","57","ph-11134207-7r98o-lt3icqf0m5thd9.jpg","2024-04-10 13:16:13");
INSERT INTO product_gallery VALUES("28","57","ph-11134207-7r98v-lt3icqf0nkdx39.jpg","2024-04-10 13:16:18");
INSERT INTO product_gallery VALUES("29","58","ghahha.png","2024-04-10 13:19:54");



CREATE TABLE `product_operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO product_operation VALUES("3","LBJ","created a category","SD","2024-04-06 01:18:45");
INSERT INTO product_operation VALUES("9","Papisss","created a product","Mystic","2024-04-10 13:00:07");
INSERT INTO product_operation VALUES("10","Papisss","created a product","Gabe","2024-04-10 13:02:30");
INSERT INTO product_operation VALUES("11","Papisss","created a product","Ferdie","2024-04-10 13:04:08");
INSERT INTO product_operation VALUES("12","Papisss","created a product","Sahara","2024-04-10 13:06:29");
INSERT INTO product_operation VALUES("13","Papisss","created a product","Ariella","2024-04-10 13:07:46");
INSERT INTO product_operation VALUES("14","Papisss","created a product","Goldie","2024-04-10 13:09:14");
INSERT INTO product_operation VALUES("15","Papisss","created a product","Stella","2024-04-10 13:16:00");



CREATE TABLE `product_sales` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO product_sales VALUES("32","136","FOLDABLE BALLERINA","2");
INSERT INTO product_sales VALUES("33","137","Mystic","1");
INSERT INTO product_sales VALUES("34","137","Gabe","1");



CREATE TABLE `product_stocks` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO product_stocks VALUES("19","47","7","Navy Blue","43");
INSERT INTO product_stocks VALUES("20","47","7","Caramel","45");
INSERT INTO product_stocks VALUES("21","47","8","Choco Brown","25");
INSERT INTO product_stocks VALUES("22","47","8","Caramel","11");
INSERT INTO product_stocks VALUES("23","47","9","Choco Brown","30");
INSERT INTO product_stocks VALUES("24","47","9","Navy Blue","20");
INSERT INTO product_stocks VALUES("25","47","9","Caramel","23");
INSERT INTO product_stocks VALUES("26","47","9","Black","29");
INSERT INTO product_stocks VALUES("27","47","9","Gunmetal","6");
INSERT INTO product_stocks VALUES("28","47","10","Choco Brown","18");
INSERT INTO product_stocks VALUES("29","47","10","Navy Blue","15");
INSERT INTO product_stocks VALUES("30","47","10","Black","29");
INSERT INTO product_stocks VALUES("31","51","5","Silver","20");
INSERT INTO product_stocks VALUES("32","51","5","Black","14");
INSERT INTO product_stocks VALUES("33","51","5","Unicorn","11");
INSERT INTO product_stocks VALUES("34","51","6","Unicorn","7");
INSERT INTO product_stocks VALUES("35","51","6","Black","10");
INSERT INTO product_stocks VALUES("36","51","6","Silver","5");
INSERT INTO product_stocks VALUES("37","51","7","Silver","16");
INSERT INTO product_stocks VALUES("38","51","7","Black","8");
INSERT INTO product_stocks VALUES("39","51","7","Unicorn","5");
INSERT INTO product_stocks VALUES("40","51","8","Silver","7");
INSERT INTO product_stocks VALUES("41","51","8","Black","15");
INSERT INTO product_stocks VALUES("42","51","8","Unicorn","13");
INSERT INTO product_stocks VALUES("43","51","9","Black","7");
INSERT INTO product_stocks VALUES("44","51","10","Silver","5");
INSERT INTO product_stocks VALUES("45","53","5","Black","10");
INSERT INTO product_stocks VALUES("46","53","5","Gunmetal","5");
INSERT INTO product_stocks VALUES("47","53","6","Gold","10");
INSERT INTO product_stocks VALUES("48","53","6","Gunmetal","12");
INSERT INTO product_stocks VALUES("49","53","7","Black","7");
INSERT INTO product_stocks VALUES("50","53","7","Gold","19");
INSERT INTO product_stocks VALUES("51","53","7","Gunmetal","2");
INSERT INTO product_stocks VALUES("52","53","8","Black","19");
INSERT INTO product_stocks VALUES("53","53","8","Gold","7");
INSERT INTO product_stocks VALUES("54","53","8","Gunmetal","9");
INSERT INTO product_stocks VALUES("55","53","9","Gold","15");
INSERT INTO product_stocks VALUES("56","53","9","Nude","15");
INSERT INTO product_stocks VALUES("57","53","9","Gunmetal","11");
INSERT INTO product_stocks VALUES("58","53","10","Black","29");
INSERT INTO product_stocks VALUES("59","53","10","Gunmetal","14");
INSERT INTO product_stocks VALUES("60","52","6","Black","10");
INSERT INTO product_stocks VALUES("61","52","7","Beige","11");
INSERT INTO product_stocks VALUES("62","52","7","Black","15");
INSERT INTO product_stocks VALUES("63","52","7","White","13");
INSERT INTO product_stocks VALUES("64","52","8","Black","9");
INSERT INTO product_stocks VALUES("65","52","8","Beige","18");
INSERT INTO product_stocks VALUES("66","52","8","White","2");
INSERT INTO product_stocks VALUES("67","52","9","Black","15");
INSERT INTO product_stocks VALUES("68","52","9","Beige","7");
INSERT INTO product_stocks VALUES("69","52","9","White","15");
INSERT INTO product_stocks VALUES("70","54","5","Nude","10");
INSERT INTO product_stocks VALUES("72","54","5","Dark Beige","10");
INSERT INTO product_stocks VALUES("73","54","5","White","9");
INSERT INTO product_stocks VALUES("74","54","5","Gold","12");
INSERT INTO product_stocks VALUES("75","54","6","Nude","14");
INSERT INTO product_stocks VALUES("76","54","6","Black","16");
INSERT INTO product_stocks VALUES("77","54","6","Dark Beige","18");
INSERT INTO product_stocks VALUES("78","54","6","White","10");
INSERT INTO product_stocks VALUES("79","54","6","Gold","5");
INSERT INTO product_stocks VALUES("80","54","7","Nude","12");
INSERT INTO product_stocks VALUES("81","54","7","Dark Beige","3");
INSERT INTO product_stocks VALUES("82","54","7","Gold","15");
INSERT INTO product_stocks VALUES("83","54","8","Black","12");
INSERT INTO product_stocks VALUES("84","54","8","White ","9");
INSERT INTO product_stocks VALUES("85","54","9","Nude","10");
INSERT INTO product_stocks VALUES("86","54","9","Black","5");
INSERT INTO product_stocks VALUES("87","54","9","White","10");
INSERT INTO product_stocks VALUES("88","55","5","Blush","1");
INSERT INTO product_stocks VALUES("89","55","5","Nude","1");
INSERT INTO product_stocks VALUES("90","55","5","Red","1");
INSERT INTO product_stocks VALUES("91","55","5","Black","1");
INSERT INTO product_stocks VALUES("92","55","6","Blush","1");
INSERT INTO product_stocks VALUES("93","55","7","Blush","1");
INSERT INTO product_stocks VALUES("94","55","7","Red","1");
INSERT INTO product_stocks VALUES("95","55","8","Blush","1");
INSERT INTO product_stocks VALUES("96","55","8","Red","1");
INSERT INTO product_stocks VALUES("97","55","9","Blush","1");
INSERT INTO product_stocks VALUES("98","55","9","Red","1");
INSERT INTO product_stocks VALUES("99","56","5","Black","10");
INSERT INTO product_stocks VALUES("100","47","5","Black","10");
INSERT INTO product_stocks VALUES("101","47","5","Navy Blue","6");
INSERT INTO product_stocks VALUES("102","47","5","Gunmetal","8");



CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_edited` varchar(244) NOT NULL,
  `time_edited` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO products VALUES("47","Flats","FOLDABLE BALLERINA","599","admin/uploaded_img/ph-11134207-7r98p-lsdufaivyjwka6 (1).jpg","Effortless elegance meets ultimate comfort with these foldable ballet-inspired shoes that feel like a dream on your feet! 💃👣 #ComfortMeetsStyle #staycomfywearnifty","2024-04-06","2024-04-06 00:47:06","0000-00-00","2024-04-06 00:47:06");
INSERT INTO products VALUES("51","Flats","Mystic","999","admin/uploaded_img/ph-11134207-7r98r-ltw2j3bqc67kdd.jpg","Exclusively available at @niftyshoes
Nifty Shoes would like to introduce to everyone that our  Shoe Capital of the Philippines (Marikina City) does classy, comfy, and durable footwear locally.
MYSTIC is one of the best sellers.","2024-04-10","2024-04-10 13:00:07","0000-00-00","2024-04-10 13:00:07");
INSERT INTO products VALUES("52","Slide","Gabe","1099","admin/uploaded_img/ph-11134207-7r98p-ltvyg3pr3ypv21.jpg","Exclusively available at @niftyshoes
Nifty Shoes would like to introduce to everyone that our  Shoe Capital of the Philippines (Marikina City) does classy, comfy, and durable footwear locally.
GABE is one of the best sellers.","2024-04-10","2024-04-10 13:02:30","0000-00-00","2024-04-10 13:02:30");
INSERT INTO products VALUES("53","Flats","Ferdie","999","admin/uploaded_img/ph-11134207-7r98s-lq8ofk5jjgsb10.jpg","Cast a Stylish and Comfortable Net with Ferdie Fisherman's Sandals

#niftyshoesprestigecollection #staycomfywearnifty #marikinamade","2024-04-10","2024-04-10 13:04:08","0000-00-00","2024-04-10 13:04:08");
INSERT INTO products VALUES("54","Sandals","Sahara","1200","admin/uploaded_img/ph-11134207-7r98z-ltvxqowdtyeoa5.jpg","Exclusively available at @niftyshoes
Nifty Shoes would like to introduce to everyone that our  Shoe Capital of the Philippines (Marikina City) does classy, comfy, and durable footwear locally.
SAHARA is one of the best sellers.","2024-04-10","2024-04-10 13:06:29","0000-00-00","2024-04-10 13:06:29");
INSERT INTO products VALUES("55","Slip-ons","Ariella","600","admin/uploaded_img/ph-11134207-7r98o-ltbuf4wobt50fb (1).jpg","Exclusively available at @niftyshoes
Nifty Shoes would like to introduce to everyone that our  Shoe Capital of the Philippines (Marikina City) does classy, comfy, and durable footwear locally.
Ariella Bow is one of the best sellers.","2024-04-10","2024-04-10 13:07:46","0000-00-00","2024-04-10 13:07:46");
INSERT INTO products VALUES("56","Slip-ons","Goldie","720","admin/uploaded_img/ph-11134207-7r991-ltafe19du7lh10 (1).jpg","Exclusively available at @niftyshoes

Nifty Shoes would like to introduce to everyone that our  Shoe Capital of the Philippines (Marikina City) does classy, comfy, and durable footwear locally.

Goldie Mule is one of the best sellers.","2024-04-10","2024-04-10 13:09:14","0000-00-00","2024-04-10 13:09:14");
INSERT INTO products VALUES("57","Heels","Stella","1300","admin/uploaded_img/ph-11134207-7r992-lt3iblk6ejic1f.jpg","Tall and Sexy. 
Stella sling back almond toe shape. Available only at Nifty Shoes.
#supportlocal","2024-04-10","2024-04-10 13:16:00","0000-00-00","2024-04-10 13:16:00");



CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL,
  `product_id` int(255) NOT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`sales_id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO sales VALUES("99","136","4295","2024-04-10");
INSERT INTO sales VALUES("100","137","2098","2024-04-10");



CREATE TABLE `stocks_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO stocks_log VALUES("109","Papisss","added a stock","47","5","Gunmetal","4","2024-04-10 11:17:46");
INSERT INTO stocks_log VALUES("110","Papisss","added a stock","51","5","Unicorn","10","2024-04-10 11:18:22");



CREATE TABLE `upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `homepage_image` varchar(255) NOT NULL,
  `gcash_ss` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO upload VALUES("1","Nifty Shoes","FLATS, SANDALS, PUMPS, WEDGES, AND OTHER NIFTY SHOES FOR WOMEN.	","121 Malaya St. Malanday, Marikina City, Marikina City, Philippines","9064997545","niftyshoesph@gmail.com","homelogo.png","homepic.jpg","University_of_Makati_logo.png");



CREATE TABLE `usertable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `contact` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO usertable VALUES("137","Roy Francis","castroroyfrancis@gmail.com","$2y$10$UP1Bhl7P9Sq7YxV5FFmChu1ak6k0eAoO0S.mlamVnsKKU6PgLr0pu","0","verified","09750162818","5014 General Ricarte St. South Cembo Makati");
INSERT INTO usertable VALUES("138","","mowal46777@kravify.com","$2y$10$P6TEJps.LL2kx26lCbsAGuOQn1tWMVDA91wZ3GfuKd57.C3XgCpxy","0","verified","","");

