-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 13, 2012 at 11:04 PM
-- Server version: 5.0.51b-community-nt
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `diaxeirisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `a_materials`
--

CREATE TABLE IF NOT EXISTS `a_materials` (
  `id` int(11) NOT NULL auto_increment,
  `name` text collate utf8_unicode_ci NOT NULL,
  `quantity` text collate utf8_unicode_ci NOT NULL,
  `efedroi` tinyint(1) NOT NULL,
  `quantity_type` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Dumping data for table `a_materials`
--

INSERT INTO `a_materials` (`id`, `name`, `quantity`, `efedroi`, `quantity_type`) VALUES
(1, 'ΖΩΝΗ ΠΕΡΙΣΚΕΛΙΔΑΣ ΜΕ ΠΟΡΠΗ', '1', 1, 1),
(2, 'ΚΑΘΡΕΠΤΑΚΙ ΞΥΡΙΣΜΑΤΟΣ', '1', 0, 1),
(3, 'ΣΑΠΟΥΝΟΘΗΚΗ ΠΛΑΣΤΙΚΗ', '1', 0, 1),
(4, 'ΥΔΡΟΔΟΧΕΙΟ', '1', 0, 1),
(5, 'ΘΗΚΗ ΥΔΡΟΔΟΧΕΙΟΥ', '1', 0, 1),
(6, 'ΑΓΓΕΙΑ ΦΑΓΗΤΟΥ', '1', 0, 1),
(7, 'ΠΙΡΟΥΝΙ', '1', 0, 1),
(8, 'ΚΟΥΤΑΛΙ', '1', 0, 1),
(9, 'ΜΑΧΑΙΡΙΔΙΟ ΠΤΥΣΣΟΜΕΝΟ', '1', 0, 1),
(10, 'ΑΤΟΜΙΚΟΣ ΕΠΙΔΕΣΜΟΣ', '1', 0, 1),
(11, 'ΚΡΑΝΟΣ ΕΞΩΤΕΡΙΚΟ', '1', 0, 1),
(12, 'ΚΡΑΝΟΣ ΕΣΩΤΕΡΙΚΟ', '1', 0, 1),
(13, 'ΚΑΛΥΜΜΑ ΠΑΡ/ΓΗΣ ΚΡΑΝΟΥΣ', '1', 0, 1),
(14, 'ΠΛΑΣΤΙΚΟ ΚΟΥΤΙ "Α" ΒΟΗΘΕΙΩΝ', '1', 0, 1),
(15, 'ΚΥΠΕΛΛΟ ΡΟΦΗΜΑΤΟΣ', '1', 0, 1),
(16, 'ΖΩΣΤΗΡΑΣ M71', '1', 0, 1),
(17, 'ΦΥΣΙΓΓΙΟΘΗΚΕΣ M71', '2', 0, 1),
(18, 'ΙΜΑΝΤΑΣ ΕΞΑΡΤΗΣΕΩΣ', '1', 0, 1),
(19, 'ΣΑΚΙΔΙΟ M71', '1', 0, 1),
(20, 'ΘΗΚΗ ΑΤΟΜΙΚΟΥ ΕΠΙΔΕΣΜΟΥ Η ΠΥΞΙΔΑΣ', '1', 0, 1),
(21, 'ΞΙΦΟΚΡΕΜΑΣΤΡΑ ΚΑΝΑΒΙΝΗ', '1', 0, 1),
(22, 'ΠΤΥΟΣΚΑΠΑΝΟ', '0.5', 0, 1),
(23, 'ΘΗΚΗ ΠΤΥΟΣΚΑΠΑΝΟΥ', '0.5', 0, 1),
(24, 'ΑΤΟΜΙΚΟ ΑΔΙΑΒΡΟΧΟ', '1', 0, 1),
(25, 'ΘΗΚΗ ΑΤΟΜΙΚΟΥ ΑΔΙΑΒΡΟΧΟΥ', '1', 0, 1),
(26, 'ΑΤΟΜΙΚΟ ΑΝΤΙΣΚΗΝΟ', '1', 0, 1),
(27, 'ΟΡΘΟΣΤΑΤΗΣ ΑΤΟΜ. ΑΝΤΙΣΚΗΝΟΥ', '1', 0, 1),
(28, 'ΠΑΣΣΑΛΑΚΙΑ ΑΤΟΜ. ΑΝΤΙΣΚΗΝΟΥ', '4', 0, 1),
(29, 'ΙΜΑΝΤΑΣ ΠΡΟΣΔΕΣΕΩΣ ΥΠΝΟΣΑΚΟΥ M71', '1', 0, 1),
(30, 'ΦΑΝΕΛΕΣ ΑΘΛΗΤΙΚΕΣ', '2', 1, 1),
(31, 'ΣΩΒΡΑΚΑ ΤΥΠΟΥ ΣΛΙΠ', '2', 1, 1),
(32, 'ΠΡΟΣΟΨΙΑ', '2', 0, 1),
(33, 'ΠΕΤΣΕΤΕΣ ΛΟΥΤΡΟΥ', '1', 0, 1),
(34, 'ΣΑΚΟΣ ΠΟΛΙΤΙΚΗΣ ΕΝΔΥΜΑΣΙΑΣ', '1', 0, 1),
(35, 'ΕΛΑΣΤΙΚΑ ΥΠΟΘΕΜΑΤΑ', '1', 0, 1),
(36, 'ΣΑΚΚΟΣ ΙΜΑΤΙΣΜΟΥ', '1', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `a_materials_packages`
--

CREATE TABLE IF NOT EXISTS `a_materials_packages` (
  `id` int(11) NOT NULL auto_increment,
  `material_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `quantity` double(11,0) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `a_packages`
--

CREATE TABLE IF NOT EXISTS `a_packages` (
  `id` int(11) NOT NULL auto_increment,
  `number` int(11) NOT NULL,
  `subunit_id` int(11) NOT NULL,
  `last_update` date NOT NULL,
  `next_update` date NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `number_3` (`number`),
  KEY `number` (`number`),
  KEY `number_2` (`number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `a_sizes`
--

CREATE TABLE IF NOT EXISTS `a_sizes` (
  `id` int(11) NOT NULL auto_increment,
  `material_id` int(11) NOT NULL,
  `size` varchar(255) collate utf8_unicode_ci NOT NULL,
  `named_number` varchar(255) collate utf8_unicode_ci NOT NULL,
  `size_number` varchar(255) collate utf8_unicode_ci NOT NULL,
  `percentage` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `material_id` (`material_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `a_sizes`
--

INSERT INTO `a_sizes` (`id`, `material_id`, `size`, `named_number`, `size_number`, `percentage`) VALUES
(1, 30, '1', '8405231138152', '', '0'),
(2, 30, '2', '8405231138153', '', '1.5'),
(3, 30, '3', '8405231138154', '', '6'),
(4, 30, '4', '8405231138155', '', '17.5'),
(5, 30, '5', '8405231138156', '', '28'),
(6, 30, '6', '8405231138157', '', '47'),
(7, 30, 'Δ/Α', '8420SAE004531', '', '0'),
(8, 31, '1', '8420231122774', '', '1.5'),
(9, 31, '2', '8420231122775', '', '6'),
(10, 31, '3', '8420231122776', '', '16'),
(11, 31, '4', '8420231122777', '', '57'),
(12, 31, '5', '8420231122778', '', '12'),
(13, 31, '6', '8420231122779', '', '7.5'),
(14, 31, 'Δ/Α', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `b_materials`
--


CREATE TABLE IF NOT EXISTS `apografi_ylikwn` (
  `id` int(255) NOT NULL auto_increment,
  `material_id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `pinakas_letter` varchar(255) NOT NULL,
  `merida` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `onomastiko` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `logistiko` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=146 ;

INSERT INTO `apografi_ylikwn` (`id`, `material_id`, `size`, `pinakas_letter`, `merida`, `onomastiko`, `logistiko`) VALUES
(1, 1, 'all', 'a', '', '', ''),
(2, 2, 'all', 'a', '', '', ''),
(3, 3, 'all', 'a', '', '', ''),
(4, 4, 'all', 'a', '', '', ''),
(5, 5, 'all', 'a', '', '', ''),
(6, 6, 'all', 'a', '', '', ''),
(7, 7, 'all', 'a', '', '', ''),
(8, 8, 'all', 'a', '', '', ''),
(9, 9, 'all', 'a', '', '', ''),
(10, 10, 'all', 'a', '', '', ''),
(11, 11, 'all', 'a', '', '', ''),
(12, 12, 'all', 'a', '', '', ''),
(13, 13, 'all', 'a', '', '', ''),
(14, 14, 'all', 'a', '', '', ''),
(15, 15, 'all', 'a', '', '', ''),
(16, 16, 'all', 'a', '', '', ''),
(17, 17, 'all', 'a', '', '', ''),
(18, 18, 'all', 'a', '', '', ''),
(19, 19, 'all', 'a', '', '', ''),
(20, 20, 'all', 'a', '', '', ''),
(21, 21, 'all', 'a', '', '', ''),
(22, 22, 'all', 'a', '', '', ''),
(23, 23, 'all', 'a', '', '', ''),
(24, 24, 'all', 'a', '', '', ''),
(25, 25, 'all', 'a', '', '', ''),
(26, 26, 'all', 'a', '', '', ''),
(27, 27, 'all', 'a', '', '', ''),
(28, 28, 'all', 'a', '', '', ''),
(29, 29, 'all', 'a', '', '', ''),
(30, 30, 'all', 'a', '', '', ''),
(31, 31, 'all', 'a', '', '', ''),
(32, 32, 'all', 'a', '', '', ''),
(33, 33, 'all', 'a', '', '', ''),
(34, 34, 'all', 'a', '', '', ''),
(35, 35, 'all', 'a', '', '', ''),
(36, 36, 'all', 'a', '', '', ''),
(37, 1, 'all', 'b', '', '', ''),
(38, 2, 'all', 'b', '', '', ''),
(39, 3, 'all', 'b', '', '', ''),
(40, 4, 'all', 'b', '', '', ''),
(41, 5, 'all', 'b', '', '', ''),
(42, 6, 'all', 'b', '', '', ''),
(43, 7, 'all', 'b', '', '', ''),
(44, 8, 'all', 'b', '', '', ''),
(45, 9, 'all', 'b', '', '', ''),
(46, 10, 'all', 'b', '', '', ''),
(47, 11, 'all', 'b', '', '', ''),
(48, 12, 'all', 'b', '', '', ''),
(49, 13, 'all', 'b', '', '', ''),
(50, 30, '1', 'a', '', '', ''),
(51, 30, '2', 'a', '', '', ''),
(52, 30, '3', 'a', '', '', ''),
(53, 30, '4', 'a', '', '', ''),
(54, 30, '5', 'a', '', '', ''),
(55, 30, '6', 'a', '', '', ''),
(56, 30, '7', 'a', '', '', ''),
(57, 31, '8', 'a', '', '', ''),
(58, 31, '9', 'a', '', '', ''),
(59, 31, '10', 'a', '', '', ''),
(60, 31, '11', 'a', '', '', ''),
(61, 31, '12', 'a', '', '', ''),
(62, 31, '13', 'a', '', '', ''),
(63, 31, '14', 'a', '', '', ''),
(64, 1, '1', 'b', '', '', ''),
(65, 1, '2', 'b', '', '', ''),
(66, 1, '3', 'b', '', '', ''),
(67, 1, '4', 'b', '', '', ''),
(68, 1, '5', 'b', '', '', ''),
(69, 1, '6', 'b', '', '', ''),
(70, 1, '7', 'b', '', '', ''),
(71, 1, '8', 'b', '', '', ''),
(72, 3, '9', 'b', '', '', ''),
(73, 3, '10', 'b', '', '', ''),
(74, 3, '11', 'b', '', '', ''),
(75, 3, '12', 'b', '', '', ''),
(76, 3, '13', 'b', '', '', ''),
(77, 3, '14', 'b', '', '', ''),
(78, 3, '15', 'b', '', '', ''),
(79, 3, '16', 'b', '', '', ''),
(80, 3, '17', 'b', '', '', ''),
(81, 3, '18', 'b', '', '', ''),
(82, 4, '19', 'b', '', '', ''),
(83, 4, '20', 'b', '', '', ''),
(84, 4, '21', 'b', '', '', ''),
(85, 4, '22', 'b', '', '', ''),
(86, 4, '23', 'b', '', '', ''),
(87, 5, '24', 'b', '', '', ''),
(88, 5, '25', 'b', '', '', ''),
(89, 5, '26', 'b', '', '', ''),
(90, 5, '27', 'b', '', '', ''),
(91, 5, '28', 'b', '', '', ''),
(92, 6, '29', 'b', '', '', ''),
(93, 6, '30', 'b', '', '', ''),
(94, 6, '31', 'b', '', '', ''),
(95, 6, '32', 'b', '', '', ''),
(96, 6, '33', 'b', '', '', ''),
(97, 6, '34', 'b', '', '', ''),
(98, 6, '35', 'b', '', '', ''),
(99, 8, '36', 'b', '', '', ''),
(100, 8, '37', 'b', '', '', ''),
(101, 8, '38', 'b', '', '', ''),
(102, 8, '39', 'b', '', '', ''),
(103, 8, '40', 'b', '', '', ''),
(104, 8, '41', 'b', '', '', ''),
(105, 8, '42', 'b', '', '', ''),
(106, 8, '43', 'b', '', '', ''),
(107, 8, '44', 'b', '', '', ''),
(108, 8, '45', 'b', '', '', ''),
(109, 8, '46', 'b', '', '', ''),
(110, 10, '47', 'b', '', '', ''),
(111, 10, '48', 'b', '', '', ''),
(112, 10, '49', 'b', '', '', ''),
(113, 10, '50', 'b', '', '', ''),
(114, 11, '51', 'b', '', '', ''),
(115, 11, '52', 'b', '', '', ''),
(116, 11, '53', 'b', '', '', ''),
(117, 11, '54', 'b', '', '', ''),
(118, 11, '55', 'b', '', '', ''),
(119, 11, '56', 'b', '', '', ''),
(120, 11, '57', 'b', '', '', ''),
(121, 12, '58', 'b', '', '', ''),
(122, 12, '59', 'b', '', '', ''),
(123, 12, '60', 'b', '', '', ''),
(124, 13, '61', 'b', '', '', ''),
(125, 13, '62', 'b', '', '', ''),
(126, 13, '63', 'b', '', '', ''),
(127, 13, '64', 'b', '', '', ''),
(128, 13, '65', 'b', '', '', ''),
(129, 13, '66', 'b', '', '', ''),
(130, 13, '67', 'b', '', '', ''),
(131, 2, '68', 'b', '', '', ''),
(132, 2, '69', 'b', '', '', ''),
(133, 2, '70', 'b', '', '', ''),
(134, 2, '71', 'b', '', '', ''),
(135, 2, '72', 'b', '', '', ''),
(136, 2, '73', 'b', '', '', ''),
(137, 2, '74', 'b', '', '', ''),
(138, 2, '75', 'b', '', '', ''),
(139, 9, '76', 'b', '', '', ''),
(140, 9, '77', 'b', '', '', ''),
(141, 9, '78', 'b', '', '', ''),
(142, 9, '79', 'b', '', '', ''),
(143, 9, '80', 'b', '', '', ''),
(144, 2, '81', 'b', '', '', ''),
(145, 1, '82', 'b', '', '', '');



CREATE TABLE IF NOT EXISTS `b_materials` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `efedroi` tinyint(1) NOT NULL,
  `quantity_type` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `b_materials`
--

INSERT INTO `b_materials` (`id`, `name`, `quantity`, `efedroi`, `quantity_type`) VALUES
(1, 'ΑΡΒΥΛΑ', 1, 1, 2),
(2, 'ΓΑΝΤΙΑ ΜΑΛΛΙΝΑ', 1, 0, 2),
(3, 'ΕΜΒΑΔΕΣ - ΣΑΓΙΩΝΑΡΕΣ', 1, 0, 2),
(4, 'ΕΣΩΤΕΡΙΚΗ ΕΠΕΝΔΥΣΗ ΠΑΝΤΕΛΟΝΙΟΥ', 2, 1, 1),
(5, 'ΕΣΩΤΕΡΙΚΗ ΕΠΕΝΔΥΣΗ ΧΙΤΩΝΙΟΥ', 2, 1, 1),
(6, 'ΠΑΝΤΕΛΟΝΙ ΠΑΡΑΛΛΑΓΗΣ', 2, 1, 1),
(7, 'ΠΕΡΙΛΑΙΜΙΑ ΜΑΛΛΙΝΑ', 1, 0, 1),
(8, 'ΠΗΛΗΚΙΟ ΠΑΡ/ΓΗΣ ΜΕ ΚΕΝΤ. ΕΘΝΟΣΗΜΟ', 1, 1, 1),
(9, 'ΠΟΔΕΙΑ ΜΑΛΛΙΝΑ', 3, 1, 2),
(10, 'ΠΟΥΛΟΒΕΡ ΟΠΛΙΤΩΝ', 1, 0, 1),
(11, 'ΤΖΑΚΕΤ ΠΑΡΑΛΛΑΓΗΣ', 1, 0, 1),
(12, 'ΥΠΝΟΣΑΚΟΙ', 1, 0, 1),
(13, 'ΧΙΤΩΝΙΟ ΠΑΡΑΛΛΑΓΗΣ', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `b_materials_packages`
--

CREATE TABLE IF NOT EXISTS `b_materials_packages` (
  `id` int(11) NOT NULL auto_increment,
  `material_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `package_id` (`package_id`),
  KEY `material_id` (`material_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `b_packages`
--

CREATE TABLE IF NOT EXISTS `b_packages` (
  `id` int(11) NOT NULL auto_increment,
  `number` int(11) NOT NULL,
  `subunit_id` int(11) NOT NULL,
  `last_update` date NOT NULL,
  `next_update` date NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `number_2` (`number`),
  KEY `number` (`number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `b_sizes`
--

CREATE TABLE IF NOT EXISTS `b_sizes` (
  `id` int(11) NOT NULL auto_increment,
  `material_id` int(11) NOT NULL,
  `size_id` varchar(255) collate utf8_unicode_ci default '0',
  `named_number` varchar(255) collate utf8_unicode_ci NOT NULL,
  `size_number` varchar(255) collate utf8_unicode_ci NOT NULL,
  `percentage` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `material_id` (`material_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=83 ;

--
-- Dumping data for table `b_sizes`
--

INSERT INTO `b_sizes` (`id`, `material_id`, `size_id`, `named_number`, `size_number`, `percentage`) VALUES
(1, 1, '40', '8430231136452', '', '2.5'),
(2, 1, '41', '8430231136453', '', '7.5'),
(3, 1, '42', '8430231136454', '', '25.5'),
(4, 1, '43', '8430231136455', '', '27'),
(5, 1, '44', '8430231136456', '', '20'),
(6, 1, '45', '8430231136457', '', '12.5'),
(7, 1, '46', '8430231136458', '', '4'),
(8, 1, '47', '8430231136459', '', '1'),
(9, 3, '40', '8430231136700', '', '2.5'),
(10, 3, '41', '8430231136701', '', '7.5'),
(11, 3, '42', '8430231136702', '', '25.5'),
(12, 3, '43', '8430231136703', '', '27'),
(13, 3, '44', '8430231136704', '', '20'),
(14, 3, '45', '8430231136705', '', '12.5'),
(15, 3, '46', '8430231136706', '', '4'),
(16, 3, '47', '8430231136707', '', '1'),
(17, 3, '48', '8430231136708', '', '0'),
(18, 3, '49', '8430231136709', '', '0'),
(19, 4, '1', '8420231137540', '6100/7885', '1.5'),
(20, 4, '2', '8420231137541', '6100/7885', '6'),
(21, 4, '3', '8420231137542', '6100/8693', '16'),
(22, 4, '4', '8420231137543', '6100/9401', '57'),
(23, 4, '5', '8420231137544', '6100/0209', '19.5'),
(24, 5, '1', '8420231137535', '6100/7986', '2.5'),
(25, 5, '2', '8420231137536', '6100/8794', '12'),
(26, 5, '3', '8420231137537', '6100/9502', '33'),
(27, 5, '4', '8420231137538', '6100/0310', '23.5'),
(28, 5, '5', '8420231137539', '6100/1118', '29'),
(29, 6, 'XXS', '8405231138478', '6170/7173 7185/7073', '0.5'),
(30, 6, 'XS', '8405231138477', '6170/7477 6170/7881 7185/7477 7185/7881', '3'),
(31, 6, 'S', '8405231136848', '6170/8285 7185/8285 8600/8285', '4'),
(32, 6, 'M', '8405231136849', '6170/8689 6170/9093 7185/8689 7185/9093 8600/8689 8600/9093', '16'),
(33, 6, 'L', '8405231136850', '6170/9497 7185/9497 7185/9801 8600/9497 8600/9801', '56.5'),
(34, 6, 'XL', '8405231136851', '7185/0205 7185/0609 8600/0205', '12'),
(35, 6, 'XXL', '8405231136852', '7185/1013 7185/1417 7185/1821', '8'),
(36, 8, '52', '8405231138113', '', '0.5'),
(37, 8, '53', '', '', '1'),
(38, 8, '54', '8405231138834', '', '4'),
(39, 8, '55', '8405231138835', '', '5.5'),
(40, 8, '56', '8405231138836', '', '17'),
(41, 8, '57', '8405231138837', '', '14.5'),
(42, 8, '58', '8405231138838', '', '32.5'),
(43, 8, '59', '8405231138839', '', '8'),
(44, 8, '60', '8405231138840', '', '13'),
(45, 8, '61', '8405231138841', '', '1.5'),
(46, 8, '62', '8405231138842', '', '2.5'),
(47, 10, '1', '8405231127038', '6100/8190', '6.5'),
(48, 10, '2', '8405231136361', '6100/9100', '32.5'),
(49, 10, '3', '8405231136362', '6100/0110', '31'),
(50, 10, '4', '8405231136363', '6100/1120', '30'),
(51, 11, 'XXS', '8405231138476', '6170/7984', '1.5'),
(52, 11, 'XS', '8405231138475', '6170/8590 7180/8590 8190/8590', '6'),
(53, 11, 'S', '8405231136843', '6170/9196 7180/9196 8190/9196', '17.5'),
(54, 11, 'M', '8405231136844', '6170/9702 7180/9702 8190/9702 9100/9702', '28'),
(55, 11, 'L', '8405231136845', '6170/0308 7180/0308 8190/0308 9100/0308', '21'),
(56, 11, 'XL', '8405231136846', '7180/0914 8190/0914', '11'),
(57, 11, 'XXL', '8405231136847', '7180/1520 8190/1520 8190/2126', '15'),
(58, 12, '1', '8465231126690', '7180/7984', '15'),
(59, 12, '2', '8465231126691', '', '80'),
(60, 12, '3', '8465231126692', '', '5'),
(61, 13, 'XXS', '8405231138476', '7180/7984', '1.5'),
(62, 13, 'XS', '8405231138475', '6170/8590 7180/8590 8190/8590', '6'),
(63, 13, 'S', '8405231136843', '6170/9196 7180/9196 8190/9196', '17.5'),
(64, 13, 'M', '8405231136844', '6170/9702 7180/9702 8190/9702 9100/9702', '28'),
(65, 13, 'L', '8405231136845', '6170/0308 7180/0308 8190/0308 9100/0308', '21'),
(66, 13, 'XL', '8405231136846', '7180/0914 8190/0914', '11'),
(67, 13, 'XXL', '8405231136847', '7180/1520 8190/1520 8190/2126', '15'),
(68, 2, '6', '', '', '10'),
(69, 2, '6.5', '', '', '10'),
(70, 2, '7', '', '', '10'),
(71, 2, '7.5', '', '', '10'),
(72, 2, '8', '', '', '10'),
(73, 2, '8.5', '', '', '10'),
(74, 2, '9', '', '', '10'),
(75, 2, 'ΑΝΕΥ', '', '', '20'),
(76, 9, '10.0', '', '', '20'),
(77, 9, '10.5', '', '', '20'),
(78, 9, '11.0', '', '', '20'),
(79, 9, '11.5', '', '', '20'),
(80, 9, 'ΑΝΕΥ', '', '', '20'),
(81, 2, '10', '', '', '10'),
(82, 1, '39', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE IF NOT EXISTS `configurations` (
  `id` int(11) NOT NULL auto_increment,
  `variable_name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `value` varchar(1024) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`id`, `variable_name`, `value`) VALUES
(1, 'stoixeia_monados', '101 ΜΠ Α/Κ ΜΠ 9233 ΑΣ'),
(2, 'dkti', 'Ανχης (ΠΒ) Γιάννης Δεληγιάννης'),
(3, 'ped', 'Τχης (ΠΒ) Γιάννης Δεληγιάννης'),
(4, 'gdy', 'Ανθστης (ΦΠΒ) Γιάννης Δεληγιάννης'),
(5, 'proedros_oplismou', 'Τχη (ΠΒ) Γιάννης Δεληγιάννης'),
(6, 'melosa_oplismou', 'Ανθστης (ΦΠΒ) Γιάννης Δεληγιάννης'),
(7, 'melosb_oplismou', 'Λχιας (ΠΒ) Γιάννης Δεληγιάννης'),
(8, 'date_oplismou', '22 Φεβρουαρίου 2010'),
(9, 'todaydate_oplismou', ''),
(10, 'ea', '88 ΜΕ'),
(11, 'em', '33'),
(12, 'place', 'Στο Λιβαδοχώρι'),
(13, 'apomiwsi', '34'),
(14, 'pinakasaleft', 'ΠΑΡΑΡΤΗΜΑ "Γ" ΣΤΗ \r\n<br />\r\nΑΠ. ΕΠΣ Φ.600/'),
(15, 'pinakasaright', '<div style="font-weight: bold;">\r\n                        ΑΕΑ: 4      ΑΑΑ:\r\n</div>\r\n			101 ΜΠΜΠ\r\n<br />\r\n			ΓΕΝ. ΔΙΑΧ/ΣΗ ΥΛΙΚΟΥ\r\n<br />'),
(16, 'pinakasbleft', '			ΠΑΡΑΡΤΗΜΑ "Α" ΣΤΗ ΔΓΗ\r\n<br />\r\n			Φ.600/'),
(17, 'pinakasbright', '              88 ΣΤΡΑΤΙΩΤΙΚΗ ΔΙΟΙΚΗΣΗ\r\n<br />\r\n              "ΛΗΜΝΟΣ"\r\n<br />\r\n              4o ΕΠΙΤΕΛΙΚΟ ΓΡΑΦΕΙΟ/4\r\n<br />\r\n              23 Αυγ. 12'),
(18, 'protokollocenter', '			ΠΑΡΑΡΤΗΜΑ "Α" ΣΤΗ ΔΓΗ\r\n<br />\r\n			Φ.600/278/20387/Σ.2476'),
(19, 'pinakasacenter', 'ΥΛΙΚΑ ΠΙΝΑΚΑ Α<br /> ΚΑΤΑ ΕΙΔΟΣ ΚΑΙ ΠΟΣΟΤΗΤΑ ΥΛΙΚΩΝ ΤΗΣ 9233 ΑΣ'),
(20, 'pinakasbcenter', 'ΠΡΩΤΟΚΟΛΛΟ ΚΑΤΑΜΕΤΡΗΣΕΩΣ ΥΛΙΚΩΝ ΠΙΝΑΚΑ Β\r\n<br />\r\nΚΑΤΑ ΕΙΔΟΣ ΚΑΙ ΠΟΣΟΤΗΤΑ ΤΗΣ 9233 ΑΣ');

-- --------------------------------------------------------

-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `quantity_type` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(256) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `quantity_type`
--

INSERT INTO `quantity_type` (`id`, `name`) VALUES
(1, 'Τεμ.'),
(2, 'Ζεύγη'),
(3, 'Σετ');
--
-- Table structure for table `dinami_oplismou`
--

CREATE TABLE IF NOT EXISTS `dinami_oplismou` (
  `id` int(11) NOT NULL auto_increment,
  `oplismou_materials_id` int(11) NOT NULL,
  `subunit_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

INSERT INTO `dinami_oplismou` (`id`, `oplismou_materials_id`, `subunit_id`, `quantity`) VALUES
(1, 1, 1, 340),
(2, 1, 3, 275),
(3, 1, 5, 275),
(4, 1, 7, 275),
(5, 1, 9, 600),
(6, 2, 1, 67),
(7, 2, 3, 54),
(8, 2, 5, 54),
(9, 2, 7, 54),
(10, 2, 9, 119),
(11, 3, 1, 54),
(12, 3, 3, 53),
(13, 3, 5, 53),
(14, 3, 7, 53),
(15, 3, 9, 92),
(16, 4, 1, 54),
(17, 4, 3, 53),
(18, 4, 5, 53),
(19, 4, 7, 53),
(20, 4, 9, 92),
(21, 5, 1, 67),
(22, 5, 3, 54),
(23, 5, 5, 54),
(24, 5, 7, 54),
(25, 5, 9, 119),
(26, 6, 1, 54),
(27, 6, 3, 53),
(28, 6, 5, 53),
(29, 6, 7, 53),
(30, 6, 9, 92),
(31, 7, 1, 13),
(32, 7, 3, 11),
(33, 7, 5, 11),
(34, 7, 7, 11),
(35, 7, 9, 27),
(36, 8, 1, 1),
(37, 8, 3, 1),
(38, 8, 5, 1),
(39, 8, 7, 1),
(40, 8, 9, 1),
(41, 9, 1, 1),
(42, 9, 3, 1),
(43, 9, 5, 1),
(44, 9, 7, 1),
(45, 9, 9, 1),
(46, 10, 1, 1),
(47, 10, 3, 1),
(48, 10, 5, 1),
(49, 10, 7, 1),
(50, 10, 9, 1),
(51, 11, 1, 54),
(52, 11, 3, 53),
(53, 11, 5, 53),
(54, 11, 7, 53),
(55, 11, 9, 92);


--
-- Table structure for table `oplismou_materials`
--

CREATE TABLE IF NOT EXISTS `oplismou_materials` (
  `id` int(11) NOT NULL auto_increment,
  `yliko` varchar(255) collate utf8_unicode_ci NOT NULL,
  `monada_metrisis` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `oplismou_materials`
--

INSERT INTO `oplismou_materials` (`id`, `yliko`, `monada_metrisis`) VALUES
(1, 'Γεμιστήρες Εφεδρικοί', ''),
(2, 'Αορτήρες Τυφεκίων', ''),
(3, 'Ξιφολόγχες τυφεκίων', ''),
(4, 'Ξιφοκρεμάστρες με κολεό', ''),
(5, 'Συλλογές καθάρσεως – συντήρησης', ''),
(6, 'Δίποδες Τυφεκίων G3A3', ''),
(7, 'Τυφέκια G3A4', ''),
(8, 'Οπλοπολυβόλο ΗΚ11 ', ''),
(9, 'Εφεδρική Κάνη ΗΚ11', ''),
(10, 'Δίποδας ΗΚ11', ''),
(11, 'Τυφέκια G3A3', '');

-- --------------------------------------------------------

--
-- Table structure for table `oplismou_materials_packages`
--

CREATE TABLE IF NOT EXISTS `oplismou_materials_packages` (
  `id` int(11) NOT NULL auto_increment,
  `package_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `gun_number` varchar(255) collate utf8_unicode_ci NOT NULL,
  `quantity` int(11) default NULL,
  `comments` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `package_id` (`package_id`),
  KEY `material_id` (`material_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `oplismou_packages`
--

CREATE TABLE IF NOT EXISTS `oplismou_packages` (
  `id` int(11) NOT NULL auto_increment,
  `number` int(11) NOT NULL,
  `subunit_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subunits`
--

CREATE TABLE IF NOT EXISTS `subunits` (
  `id` int(11) NOT NULL auto_increment,
  `subunits` varchar(255) collate utf8_unicode_ci NOT NULL,
  `provlepomeni_dinami` int(11) NOT NULL,
  `color` varchar(255) collate utf8_unicode_ci NOT NULL,
  `start_package` int(11) NOT NULL,
  `end_package` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `start_package` (`start_package`),
  KEY `end_package` (`end_package`),
  KEY `start_package_2` (`start_package`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `subunits`
--

INSERT INTO `subunits` (`id`, `subunits`, `provlepomeni_dinami`, `color`, `start_package`, `end_package`) VALUES
(1, '1', 10, 'ff0000', 101, 250),
(2, '1 ΠΥΡΗΝΕΣ', 10, 'ff0000', 1, 20),
(3, '2', 10, '00ff00', 251, 400),
(4, '2 ΠΥΡΗΝΕΣ', 10, '00ff00', 21, 40),
(5, '3', 10, 'efefef', 401, 550),
(6, '3 ΠΥΡΗΝΕΣ', 10, 'efefef', 41, 60),
(7, '4', 10, 'ff8a00', 551, 700),
(8, '4 ΠΥΡΗΝΕΣ', 10, 'ff8a00', 61, 80),
(9, '5', 10, 'ffff00', 701, 900),
(10, '5 ΠΥΡΗΝΕΣ', 10, 'ffff00', 81, 100),
(11, 'ΑΝΑΠΛ', 10, '996600', 901, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE IF NOT EXISTS `warehouses` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`) VALUES
(1, 'Αποθήκη ΑΣ'),
(2, 'Αποθήκη Οπλισμού');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_material_mappings`
--

CREATE TABLE IF NOT EXISTS `warehouse_material_mappings` (
  `warehouse_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `material_type` varchar(11) collate utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `warehouse_material_mappings`
--

INSERT INTO `warehouse_material_mappings` (`warehouse_id`, `material_id`, `material_type`) VALUES
(1, 1, 'a'),
(1, 2, 'a'),
(1, 3, 'a'),
(1, 4, 'a'),
(1, 5, 'a'),
(1, 6, 'a'),
(1, 7, 'a'),
(1, 8, 'a'),
(1, 9, 'a'),
(1, 10, 'a'),
(1, 11, 'a'),
(1, 12, 'a'),
(1, 13, 'a'),
(1, 14, 'a'),
(1, 15, 'a'),
(1, 16, 'a'),
(1, 17, 'a'),
(1, 18, 'a'),
(1, 19, 'a'),
(1, 20, 'a'),
(1, 21, 'a'),
(1, 22, 'a'),
(1, 23, 'a'),
(1, 24, 'a'),
(1, 25, 'a'),
(1, 26, 'a'),
(1, 27, 'a'),
(1, 28, 'a'),
(1, 29, 'a'),
(1, 30, 'a'),
(1, 31, 'a'),
(1, 32, 'a'),
(1, 33, 'a'),
(1, 34, 'a'),
(1, 35, 'a'),
(1, 36, 'a'),
(1, 1, 'b'),
(1, 2, 'b'),
(1, 3, 'b'),
(1, 4, 'b'),
(1, 5, 'b'),
(1, 6, 'b'),
(1, 7, 'b'),
(1, 8, 'b'),
(1, 9, 'b'),
(1, 10, 'b'),
(1, 11, 'b'),
(1, 12, 'b'),
(1, 13, 'b'),
(2, 1, 'oplismou'),
(2, 2, 'oplismou'),
(2, 3, 'oplismou'),
(2, 4, 'oplismou'),
(2, 5, 'oplismou'),
(2, 6, 'oplismou'),
(2, 7, 'oplismou'),
(2, 8, 'oplismou'),
(2, 9, 'oplismou'),
(2, 10, 'oplismou'),
(2, 11, 'oplismou');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `a_sizes`
--
ALTER TABLE `a_sizes`
  ADD CONSTRAINT `a_sizes_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `a_materials` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `b_materials_packages`
--
ALTER TABLE `b_materials_packages`
  ADD CONSTRAINT `b_materials_packages_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `b_materials` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `b_materials_packages_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `b_packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `b_sizes`
--
ALTER TABLE `b_sizes`
  ADD CONSTRAINT `b_sizes_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `b_materials` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `oplismou_materials_packages`
--
ALTER TABLE `oplismou_materials_packages`
  ADD CONSTRAINT `oplismou_materials_packages_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `oplismou_packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `oplismou_materials_packages_ibfk_2` FOREIGN KEY (`material_id`) REFERENCES `oplismou_materials` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
