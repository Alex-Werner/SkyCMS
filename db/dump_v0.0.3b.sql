-- phpMyAdmin SQL Dump
-- version 4.0.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 08 Février 2014 à 01:28
-- Version du serveur: 5.6.11-log
-- Version de PHP: 5.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `skcms`
--
CREATE DATABASE IF NOT EXISTS `skcms` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `skcms`;

-- --------------------------------------------------------

--
-- Structure de la table `sk_blog`
--

CREATE TABLE IF NOT EXISTS `sk_blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` int(11) NOT NULL,
  `content` int(11) NOT NULL,
  `post_date` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sk_config`
--

CREATE TABLE IF NOT EXISTS `sk_config` (
  `entity` varchar(255) CHARACTER SET latin1 NOT NULL,
  `value` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`entity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `sk_config`
--

INSERT INTO `sk_config` (`entity`, `value`) VALUES
('allow_redirect_404', '0'),
('allow_redirect_404_url', 'home'),
('landing_page', 'home');

-- --------------------------------------------------------

--
-- Structure de la table `sk_menu`
--

CREATE TABLE IF NOT EXISTS `sk_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `displayed_title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `url` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Contenu de la table `sk_menu`
--

INSERT INTO `sk_menu` (`id`, `displayed_title`, `url`) VALUES
(1, 'Home', 'home'),
(2, 'Another Page', 'page1'),
(3, 'contact', 'contact'),
(4, 'anchor', '#anchor');

-- --------------------------------------------------------

--
-- Structure de la table `sk_modules`
--

CREATE TABLE IF NOT EXISTS `sk_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `url` varchar(255) COLLATE utf8_bin NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Contenu de la table `sk_modules`
--

INSERT INTO `sk_modules` (`id`, `name`, `url`, `active`) VALUES
(1, 'Sk_Contact', '/contact/', 1);

-- --------------------------------------------------------

--
-- Structure de la table `sk_pages`
--

CREATE TABLE IF NOT EXISTS `sk_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `content` text CHARACTER SET latin1 NOT NULL,
  `url` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Contenu de la table `sk_pages`
--

INSERT INTO `sk_pages` (`id`, `page_title`, `content`, `url`) VALUES
(1, 'Accueil', '<div id="lipsum">\r\n                    <p>\r\n                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non risus pretium, placerat metus id, rhoncus justo. Proin posuere pharetra feugiat. In sodales vulputate elementum. Aliquam turpis dolor, consequat a nisl vitae, feugiat convallis enim. Quisque elit enim, sagittis vitae varius id, consectetur vel mauris. Aliquam ut tellus augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In hac habitasse platea dictumst. Phasellus vestibulum magna non dictum egestas. Duis commodo ac enim et iaculis. Sed sed odio neque. Fusce mollis orci et nisi tincidunt facilisis ut vel justo.\r\n                    </p>\r\n                    <br>\r\n                    <p>\r\n                        Integer eget vestibulum urna. Phasellus adipiscing eget sapien lacinia placerat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam dolor magna, rutrum quis elit sit amet, auctor pulvinar tellus. Ut consectetur ut erat in placerat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin sodales sed diam iaculis tincidunt. Nullam diam arcu, consectetur nec posuere a, placerat a est. Donec varius porttitor pulvinar. In rhoncus lorem vitae eros lobortis convallis. Ut eu mi vel nunc varius elementum. Donec malesuada urna in sem pellentesque consectetur. Morbi dignissim euismod condimentum. Integer in tellus dapibus sapien accumsan dignissim.\r\n                    </p>\r\n                    <br>\r\n                    <p>\r\n                        Cras imperdiet enim nec tincidunt scelerisque. Ut cursus consectetur justo quis malesuada. Proin rutrum dignissim sem. Fusce tincidunt molestie ante id rhoncus. Vestibulum tincidunt justo a magna iaculis posuere. Nulla facilisi. Sed tincidunt, dui id sodales malesuada, ipsum mi dictum turpis, ut consectetur augue risus id risus. Suspendisse potenti. Ut accumsan, tellus eu egestas faucibus, tortor sapien vestibulum lorem, at hendrerit nisl lectus et lectus. In at vestibulum turpis. Aenean vehicula convallis convallis. Sed varius, ipsum eu vehicula adipiscing, nulla risus varius turpis, eget convallis quam libero sit amet lectus. Ut rutrum congue quam, a vulputate nisl suscipit in. Fusce volutpat pretium feugiat. Aenean placerat risus id convallis eleifend. Vivamus a magna ultrices, suscipit nisl at, sodales sem.\r\n                    </p>\r\n                    <br>\r\n                    <p>\r\n                        Donec elementum, tortor id bibendum placerat, lacus dolor rutrum metus, eget porttitor justo tellus et libero. Quisque tristique iaculis ultrices. Nulla mattis, ante nec viverra pretium, ipsum urna ornare metus, in sagittis enim magna id lacus. Sed et varius mi. Morbi eget sem eu tellus mattis pulvinar at eu mauris. Duis vitae lacus faucibus, mattis risus ac, convallis tellus. Aliquam viverra ultricies ipsum, et condimentum libero varius sit amet. In ac est in turpis vestibulum elementum. Etiam vitae posuere dui. Ut eget blandit erat. Duis porta eros in neque viverra rhoncus. Nullam consectetur aliquet libero sed venenatis. Mauris elementum ultrices felis, vel sagittis ipsum ullamcorper eu.\r\n                    </p>\r\n                    <br>\r\n                    <p>\r\n                        Etiam ut tortor eu neque lobortis cursus non et ante. Aliquam condimentum ipsum eu augue dapibus, sed fringilla libero scelerisque. Nullam et hendrerit libero. Etiam eget pellentesque nisi. Morbi sit amet odio urna. Quisque blandit eros purus. Donec adipiscing eget erat nec tristique. Ut consequat nisi sit amet feugiat fringilla. Morbi rutrum ante quam, nec fringilla neque tincidunt sit amet. Aenean auctor augue vitae libero porta, vel porttitor nisl placerat.\r\n                    </p>\r\n                    <br>\r\n                    <p>\r\n                        Etiam ut tortor eu neque lobortis cursus non et ante. Aliquam condimentum ipsum eu augue dapibus, sed fringilla libero scelerisque. Nullam et hendrerit libero. Etiam eget pellentesque nisi. Morbi sit amet odio urna. Quisque blandit eros purus. Donec adipiscing eget erat nec tristique. Ut consequat nisi sit amet feugiat fringilla. Morbi rutrum ante quam, nec fringilla neque tincidunt sit amet. Aenean auctor augue vitae libero porta, vel porttitor nisl placerat.\r\n                    </p>\r\n                    <br>\r\n                    <p>\r\n                        Etiam ut tortor eu neque lobortis cursus non et ante. Aliquam condimentum ipsum eu augue dapibus, sed fringilla libero scelerisque. Nullam et hendrerit libero. Etiam eget pellentesque nisi. Morbi sit amet odio urna. Quisque blandit eros purus. Donec adipiscing eget erat nec tristique. Ut consequat nisi sit amet feugiat fringilla. Morbi rutrum ante quam, nec fringilla neque tincidunt sit amet. Aenean auctor augue vitae libero porta, vel porttitor nisl placerat.\r\n                    </p>\r\n                </div>', '/home/'),
(2, '404', 'Cette page n’est malheureusement pas disponible.<br>\r\n\r\nLe lien que vous avez suivi peut être incorrect ou la page peut avoir été supprimée.', '/404/');

-- --------------------------------------------------------

--
-- Structure de la table `sk_themes`
--

CREATE TABLE IF NOT EXISTS `sk_themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Contenu de la table `sk_themes`
--

INSERT INTO `sk_themes` (`id`, `name`, `active`) VALUES
(1, 'default', 1),
(2, 'SK_Personnal', 0),
(3, 'SK_CleanWhite', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
