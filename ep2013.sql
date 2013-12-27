-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 27. dec 2013 ob 17.22
-- Različica strežnika: 5.6.11
-- Različica PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Zbirka podatkov: `ep2013`
--
CREATE DATABASE IF NOT EXISTS `ep2013` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ep2013`;

-- --------------------------------------------------------

--
-- Struktura tabele `carts`
--

CREATE TABLE IF NOT EXISTS `carts` (
  `cart_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `user_id` smallint(6) NOT NULL,
  `status` varchar(8) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Odloži podatke za tabelo `carts`
--

INSERT INTO `carts` (`cart_id`, `user_id`, `status`) VALUES
(1, 2, 'approved'),
(2, 2, 'canceled'),
(3, 2, 'approved'),
(4, 2, 'open');

-- --------------------------------------------------------

--
-- Struktura tabele `cart_items`
--

CREATE TABLE IF NOT EXISTS `cart_items` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `cart_id` smallint(6) NOT NULL,
  `item_id` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Odloži podatke za tabelo `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `item_id`) VALUES
(2, 1, 2),
(13, 1, 1),
(14, 1, 5),
(21, 2, 3),
(22, 2, 4),
(23, 3, 1),
(24, 3, 5);

-- --------------------------------------------------------

--
-- Struktura tabele `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `item_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `category` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `photo` varchar(40) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Odloži podatke za tabelo `items`
--

INSERT INTO `items` (`item_id`, `name`, `category`, `price`, `photo`, `active`) VALUES
(1, 'Crocs', 'Running', 20, '/shoes/crocs.jpg', 1),
(2, 'Adidas Supreme', 'Casual', 40, '/shoes/casual-adidas.jpg', 1),
(3, 'Adidas Supreme Rose', 'Casual', 40, '/shoes/casual-adidas2.jpg', 1),
(4, 'Crocs super Pink', 'Summer', 24, '/shoes/crocs2.jpg', 0),
(5, 'Super Crocs', 'Summer', 19, '/shoes/crocs3.jpg', 1);

-- --------------------------------------------------------

--
-- Struktura tabele `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `transaction_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `user_id` smallint(6) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabele `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `emso` varchar(13) NOT NULL,
  `address` varchar(40) NOT NULL,
  `city` varchar(30) NOT NULL,
  `post` varchar(4) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `role` int(1) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Odloži podatke za tabelo `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `email`, `password`, `emso`, `address`, `city`, `post`, `phone`, `role`, `active`) VALUES
(1, 'Bostjan', 'Cotar', 'bobo@gmail.com', 'b736efda7342c257b42af16d6f7b8da01d5aa165', '', 'Marezige 34', 'Marezige', '6273', '031 282 494', 2, 1),
(2, 'matej', 'matej', 'matej@gmail.com', '99f83fffab4df0adaa9e68e4f8217334d66b32c2', '', 'marezige 34', 'marezige', '6273', '031329529', 0, 1),
(3, 'prodaja', 'prodaja', 'prodaja@gmail.com', 'e5423e38b9c0e1b54f1f8fa24ee98ba7061c9bf3', '2010234728362', '', '', '0', '', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
