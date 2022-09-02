-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2022 at 04:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Game'),
(2, 'Book'),
(3, 'Tech accessories');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `address` varchar(100) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `city` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `address`, `zip_code`, `city`) VALUES
(1, 'Chuck', 'Norris', 'Everywhere', 12345, 'NorrisLand'),
(2, 'Charlize', 'Theron', 'Here and there', 32154, 'NiceCity'),
(3, 'Ryan', 'Gosling', 'London Street', 65432, 'London'),
(4, 'Ireneusz', 'Piskorski', '9 Rue René Fernandat', 38100, 'GRENOBLE');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_price` float NOT NULL,
  `total_weight` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `number`, `customer_id`, `date`, `total_price`, `total_weight`) VALUES
(1, 1, 1, '2022-08-24', 7499, 45),
(2, 2, 1, '2022-08-14', 50897, 3000),
(3, 3, 2, '2022-08-14', 15998, 1615),
(4, 4, 2, '2022-08-14', 75998, 200),
(5, 5, 2, '2022-08-24', 52500, 1326);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_product_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_product_price` float NOT NULL,
  `total_product_weight` float NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_product_id`, `product_id`, `quantity`, `total_product_price`, `total_product_weight`, `order_id`) VALUES
(1, 1, 1, 1500, 15, 1),
(2, 3, 1, 3000, 15, 1),
(3, 4, 1, 2999, 15, 1),
(4, 9, 1, 9999, 1600, 2),
(5, 10, 1, 5999, 1200, 2),
(6, 11, 1, 34899, 200, 2),
(7, 2, 1, 5999, 15, 3),
(8, 9, 1, 9999, 1600, 3),
(9, 3, 1, 3000, 15, 4),
(10, 4, 1, 2999, 15, 4),
(11, 13, 1, 69999, 170, 4),
(12, 1, 1, 1500, 15, 5),
(13, 12, 3, 51000, 1311, 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `available` tinyint(1) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `price`, `weight`, `image_url`, `stock`, `available`, `category_id`) VALUES
(1, 'StarCraft', 'A game remastered edition', 1500, 15, 'https://static.lpnt.fr/images/2017/08/17/9763107lpw-9763113-article-starcraft-jeux-video-jpg_4493476_1250x625.jpg', 1, 1, 1),
(2, 'StarCraft2', 'A game v2', 5999, 15, 'https://bnetcmsus-a.akamaihd.net/cms/blog_thumbnail/ay/AYJ0P9WLD7IP1602720127239.jpg', 1, 1, 1),
(3, 'Factorio', 'Factorio is a construction and management simulation game developed by the Czech studio Wube Software.', 3000, 15, 'https://hb.imgix.net/368cd1a0b8a818d31d10ef8f45c17f05e6f8ef78.jpg?auto=compress,format&fit=crop&h=353&w=616&s=45f7c207620518090615e11622f7a7dd', 10, 1, 1),
(4, 'They are billions', 'They Are Billions is a post-apocalyptic steampunk real-time strategy survival video game developed and published by Numantian Games.', 2999, 15, 'https://www.godisageek.com/wp-content/uploads/TheyAreBillions_review.jpg', 10, 1, 1),
(5, 'Deus Ex: Game of the Year Edition', 'Deus Ex is a 2000 action role-playing game developed by Ion Storm and published by Eidos Interactive.', 699, 15, 'https://iunctis.fr/uploads/default/original/3X/6/7/673a79af9440bd996e2f475a0b10a014db68b610.jpeg', 1, 0, 1),
(6, 'Deus Ex: Human Revolution', 'Deus Ex: Human Revolution is an action role-playing game developed by Eidos-Montréal and published by Square Enix\'s European subsidiary in August 2011. ', 1999, 15, 'https://cdn.cloudflare.steamstatic.com/steam/apps/238010/capsule_616x353.jpg?t=1661266769', 1, 0, 1),
(7, 'Ubik', 'The story is set in a future 1992 where psychic powers are utilized in corporate espionage, while cryonic technology allows recently deceased people to be maintained in a lengthy state of hibernation.', 1299, 400, 'https://images-na.ssl-images-amazon.com/images/I/715jPDdlfrL.jpg', 0, 1, 2),
(8, 'The Star Diaries', 'The Star Diaries is a series of short stories of the adventures of space traveller Ijon Tichy, of satirical nature, by Polish writer Stanisław Lem.', 1242, 500, 'https://images-eu.ssl-images-amazon.com/images/I/51nsEEwBxGL._SX342_SY445_QL70_ML2_.jpg', 0, 1, 2),
(9, 'Series of Jakub Wędrowycz', 'Include all 8 books: Chronicles of Jakub Wędrowycz, Ivanov the Wizard, Ye Shall Take a Black Hen, Mystery of Jack the Reaper, Hanging for everybody, Homo moonshinicus, Poison, Conan the Distiller', 9999, 1600, 'https://s.lubimyczytac.pl/upload/books/5000/5049/352x500.jpg', 2, 1, 2),
(10, 'Deer`s eye', 'Book series, includes: The Way to Nidaros, Silver Doe From Visby, The Wooden Stronghold\r\nThe Master of Wolves, Triumph of Fox Reinicke\r\nArmillary Sphere, The Owl\'s Mirror', 5999, 1200, 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1303801445i/3607932.jpg', 2, 1, 2),
(11, 'Apple iPhone 11, 64GB, Black, Renewed', 'The product is refurbished, fully functional, and in excellent condition. ', 34899, 200, 'https://media.ldlc.com/r1600/ld/products/00/05/92/68/LD0005926841_1.jpg', 5, 1, 3),
(12, 'Apple iPad Air 2 - 64GB - Gold (Renewed) ', 'The product is refurbished, fully functional, and in good condition. ', 17000, 437, 'https://support.apple.com/library/APPLE/APPLECARE_ALLGEOS/SP708/SP708-gold.jpeg', 5, 1, 3),
(13, 'SAMSUNG Galaxy S22, 128GB, Phantom Black', 'Cell Phone', 69999, 170, 'https://images.frandroid.com/wp-content/uploads/2022/02/samsung-galaxy-s22-frandroid-2022.png', 5, 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_orders_customer_id` (`customer_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_product_id`),
  ADD KEY `fk_order_product_product_id` (`product_id`),
  ADD KEY `fk_orders_product_product_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_products_categories_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `order_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `fk_order_product_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `fk_orders_product_product_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
