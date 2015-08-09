-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 09, 2015 at 04:52 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `benjamin`
--
CREATE DATABASE IF NOT EXISTS `benjamin` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `benjamin`;

-- --------------------------------------------------------

--
-- Table structure for table `ad_timing`
--

CREATE TABLE IF NOT EXISTS `ad_timing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_id` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `open` time NOT NULL,
  `close` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `ad_timing`
--

INSERT INTO `ad_timing` (`id`, `ad_id`, `day`, `open`, `close`) VALUES
(1, 15, 'monday', '00:30:00', '02:30:00'),
(2, 15, 'tuesday', '01:00:00', '07:30:00'),
(3, 15, 'wednesday', '07:00:00', '07:30:00'),
(4, 15, 'thursday', '07:00:00', '07:00:00'),
(5, 15, 'friday', '06:30:00', '05:00:00'),
(6, 15, 'saturday', '04:30:00', '04:30:00'),
(7, 15, 'sunday', '05:00:00', '08:00:00'),
(8, 16, 'monday', '01:30:00', '02:00:00'),
(9, 16, 'tuesday', '03:30:00', '03:30:00'),
(10, 16, 'wednesday', '03:00:00', '05:00:00'),
(11, 16, 'thursday', '05:30:00', '04:00:00'),
(12, 16, 'friday', '03:00:00', '06:00:00'),
(13, 16, 'saturday', '06:30:00', '06:30:00'),
(14, 16, 'sunday', '06:00:00', '07:00:00'),
(15, 17, 'monday', '01:00:00', '07:00:00'),
(16, 17, 'tuesday', '04:30:00', '05:30:00'),
(17, 17, 'wednesday', '04:00:00', '04:30:00'),
(18, 17, 'thursday', '02:30:00', '07:30:00'),
(19, 17, 'friday', '03:00:00', '08:00:00'),
(20, 17, 'saturday', '04:30:00', '23:00:00'),
(21, 17, 'sunday', '04:30:00', '23:00:00'),
(22, 18, 'monday', '01:00:00', '08:00:00'),
(23, 18, 'tuesday', '05:00:00', '00:00:00'),
(24, 18, 'wednesday', '05:00:00', '09:00:00'),
(25, 18, 'thursday', '05:00:00', '08:00:00'),
(26, 18, 'friday', '02:30:00', '08:30:00'),
(27, 18, 'saturday', '02:30:00', '08:00:00'),
(28, 18, 'sunday', '07:00:00', '07:30:00'),
(29, 19, 'monday', '00:30:00', '01:30:00'),
(30, 19, 'tuesday', '02:00:00', '02:30:00'),
(31, 19, 'wednesday', '01:30:00', '04:00:00'),
(32, 19, 'thursday', '01:00:00', '04:00:00'),
(33, 19, 'friday', '01:30:00', '03:30:00'),
(34, 19, 'saturday', '00:30:00', '03:00:00'),
(35, 19, 'sunday', '08:30:00', '09:00:00'),
(36, 20, 'monday', '00:00:00', '00:30:00'),
(37, 20, 'tuesday', '00:30:00', '01:30:00'),
(38, 20, 'wednesday', '01:00:00', '01:00:00'),
(39, 20, 'thursday', '01:00:00', '01:30:00'),
(40, 20, 'friday', '07:00:00', '01:30:00'),
(41, 20, 'saturday', '01:00:00', '00:00:00'),
(42, 20, 'sunday', '07:30:00', '08:00:00'),
(43, 21, 'monday', '00:30:00', '04:30:00'),
(44, 21, 'tuesday', '02:00:00', '06:00:00'),
(45, 21, 'wednesday', '03:30:00', '06:30:00'),
(46, 21, 'thursday', '02:00:00', '09:00:00'),
(47, 21, 'friday', '05:30:00', '20:00:00'),
(48, 21, 'saturday', '05:30:00', '23:00:00'),
(49, 21, 'sunday', '06:00:00', '23:30:00'),
(50, 22, 'monday', '00:00:00', '01:00:00'),
(51, 22, 'tuesday', '01:00:00', '01:00:00'),
(52, 22, 'wednesday', '01:00:00', '03:00:00'),
(53, 22, 'thursday', '01:00:00', '02:30:00'),
(54, 22, 'friday', '04:30:00', '07:00:00'),
(55, 22, 'saturday', '03:30:00', '07:30:00'),
(56, 22, 'sunday', '05:00:00', '06:30:00'),
(57, 23, 'monday', '01:30:00', '01:30:00'),
(58, 23, 'tuesday', '00:30:00', '21:00:00'),
(59, 23, 'wednesday', '00:30:00', '19:30:00'),
(60, 23, 'thursday', '01:00:00', '20:00:00'),
(61, 23, 'friday', '09:00:00', '22:00:00'),
(62, 23, 'saturday', '04:00:00', '23:00:00'),
(63, 23, 'sunday', '03:30:00', '23:00:00'),
(64, 24, 'monday', '00:30:00', '22:00:00'),
(65, 24, 'tuesday', '01:00:00', '22:00:00'),
(66, 24, 'wednesday', '05:00:00', '21:30:00'),
(67, 24, 'thursday', '10:00:00', '20:30:00'),
(68, 24, 'friday', '05:30:00', '20:30:00'),
(69, 24, 'saturday', '04:00:00', '23:00:00'),
(70, 24, 'sunday', '07:00:00', '23:00:00'),
(71, 29, '', '02:00:00', '02:30:00'),
(72, 30, '', '02:00:00', '02:30:00'),
(73, 31, '', '01:00:00', '00:00:00'),
(74, 32, '', '01:00:00', '00:00:00'),
(75, 33, '', '01:00:00', '00:00:00'),
(76, 34, '', '07:30:00', '07:30:00'),
(77, 35, '', '07:30:00', '07:30:00'),
(78, 36, '', '07:30:00', '07:30:00'),
(79, 37, '', '01:30:00', '02:00:00'),
(80, 38, '', '01:30:00', '02:00:00'),
(81, 39, '', '01:00:00', '02:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(255) DEFAULT NULL,
  `country_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=256 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_code`, `country_name`) VALUES
(1, 'FR ', 'France'),
(4, 'DE ', 'Germany'),
(5, 'IE ', 'Ireland'),
(6, 'ES ', 'Spain'),
(7, 'GB ', 'United Kingdom'),
(8, 'US ', 'United States'),
(9, 'AF ', 'Afghanistan'),
(10, 'AL ', 'Albania'),
(11, 'DZ ', 'Algeria'),
(12, 'AS ', 'American samoa'),
(13, 'AD ', 'Andorra'),
(14, 'AO ', 'Angola'),
(15, 'AI ', 'Anguilla'),
(16, 'AQ ', 'Antarctica'),
(17, 'AG ', 'Antigua and Barbuda'),
(18, 'AR ', 'Argentina'),
(19, 'AM ', 'Armenia'),
(20, 'AW ', 'Aruba'),
(21, 'AU ', 'Australia'),
(22, 'AT ', 'Austria'),
(23, 'AZ ', 'Azerbaijan'),
(24, 'BS ', 'Bahamas'),
(25, 'BH ', 'Bahrain'),
(26, 'BD ', 'Bangladesh'),
(27, 'BB ', 'Barbados'),
(28, 'BY ', 'Belarus'),
(29, 'BE ', 'Belgium'),
(30, 'BZ ', 'Belize'),
(31, 'BJ ', 'Benin'),
(32, 'BM ', 'Bermuda'),
(33, 'BT ', 'Bhutan'),
(34, 'BO ', 'Bolivia'),
(35, 'BA ', 'Bosnia and Herzegovina'),
(36, 'BW ', 'Botswana'),
(37, 'BV ', 'Bouvet Island'),
(38, 'BR ', 'Brazil'),
(39, 'IO ', 'British Indian Ocean Territory'),
(40, 'BN ', 'Brunei Darussalam'),
(41, 'BG ', 'Bulgaria'),
(42, 'BF ', 'Burkina Faso'),
(43, 'BI ', 'Burundi'),
(44, 'KH ', 'Cambodia'),
(45, 'CM ', 'Cameroon'),
(46, 'CA ', 'Canada'),
(47, 'CV ', 'Cape Verde'),
(48, 'KY ', 'Cayman Islands'),
(49, 'CF ', 'Central African Republic'),
(50, 'TD ', 'Chad'),
(51, 'CL ', 'Chile'),
(52, 'CN ', 'China'),
(53, 'CX ', 'Christmas Island'),
(54, 'CC ', 'Cocos (Keeling) Islands'),
(55, 'CO ', 'Colombia'),
(56, 'KM ', 'Comoros'),
(57, 'CG ', 'Congo'),
(58, 'CK ', 'Cook Islands'),
(59, 'CR ', 'Costa Rica'),
(60, 'HR ', 'Croatia'),
(61, 'CU ', 'Cuba'),
(62, 'CY ', 'Cyprus'),
(63, 'CS ', 'Czech Republic'),
(64, 'DK ', 'Denmark'),
(65, 'DJ ', 'Djibouti'),
(66, 'DM ', 'Dominica'),
(67, 'DO ', 'Dominican Republic'),
(68, 'TP ', 'East Timor'),
(69, 'EC ', 'Ecuador'),
(70, 'EG ', 'Egypt'),
(71, 'SV ', 'El Salvador'),
(72, 'GQ ', 'Equatorial guinea'),
(73, 'ER ', 'Eritrea'),
(74, 'EE ', 'Estonia'),
(75, 'ET ', 'Ethiopia'),
(76, 'FK ', 'Falkland Islands (Malvinas)'),
(77, 'FO ', 'Faroe Islands'),
(78, 'FJ ', 'Fiji'),
(79, 'FI ', 'Finland'),
(80, 'GF ', 'French Guiana'),
(81, 'PF ', 'French Polynesia'),
(82, 'TF ', 'French Southern Territories'),
(83, 'GA ', 'Gabon'),
(84, 'GM ', 'Gambia'),
(85, 'GE ', 'Georgia'),
(86, 'GH ', 'Ghana'),
(87, 'GI ', 'Gibraltar'),
(88, 'GR ', 'Greece'),
(89, 'GL ', 'Greenland'),
(90, 'GD ', 'Grenada'),
(91, 'GP ', 'Guadeloupe'),
(92, 'GU ', 'Guam'),
(93, 'GT ', 'Guatemala'),
(94, 'GN ', 'Guinea'),
(95, 'GW ', 'Guinea-Bissau'),
(96, 'GY ', 'Guyana'),
(97, 'HT ', 'Haiti'),
(98, 'HM ', 'Heard Island and Mcdonald Islands'),
(99, 'VA ', 'Holy See (Vatican City State)'),
(100, 'HN ', 'Honduras'),
(101, 'HK ', 'Hong Kong'),
(102, 'HU ', 'Hungary'),
(103, 'IS ', 'Iceland'),
(104, 'IN ', 'India'),
(105, 'ID ', 'Indonesia'),
(106, 'IR ', 'Iran, Islamic Republic of'),
(107, 'IQ ', 'Iraq'),
(108, 'IL ', 'Israel'),
(109, 'IT ', 'Italy'),
(110, 'JM ', 'Jamaica'),
(111, 'JP ', 'Japan'),
(112, 'JO ', 'Jordan'),
(113, 'KZ ', 'Kazakstan'),
(114, 'KE ', 'Kenya'),
(115, 'KI ', 'Kiribati'),
(116, 'KP ', 'Korea, Democratic People''s Republic of'),
(117, 'KR ', 'Korea, Republic of'),
(118, 'KW ', 'Kuwait'),
(119, 'KG ', 'Kyrgyzstan'),
(120, 'LA ', 'Lao People''s Democratic Republic'),
(121, 'LV ', 'Latvia'),
(122, 'LB ', 'Lebanon'),
(123, 'LS ', 'Lesotho'),
(124, 'LR ', 'Liberia'),
(125, 'LY ', 'Libyan Arab Jamahiriya'),
(126, 'LI ', 'Liechtenstein'),
(127, 'LT ', 'Lithuania'),
(128, 'LU ', 'Luxembourg'),
(129, 'MO ', 'Macau'),
(130, 'MK ', 'Macedonia'),
(131, 'MG ', 'Madagascar'),
(132, 'MW ', 'Malawi'),
(133, 'MY ', 'Malaysia'),
(134, 'MV ', 'Maldives'),
(135, 'ML ', 'Mali'),
(136, 'MT ', 'Malta'),
(137, 'MH ', 'Marshall Islands'),
(138, 'MQ ', 'Martinique'),
(139, 'MR ', 'Mauritania'),
(140, 'MU ', 'Mauritius'),
(141, 'YT ', 'Mayotte'),
(142, 'MX ', 'Mexico'),
(143, 'FM ', 'Micronesia, Federated States of'),
(144, 'MD ', 'Moldova, Republic of'),
(145, 'MC ', 'Monaco'),
(146, 'MN ', 'Mongolia'),
(147, 'MS ', 'Montserrat'),
(148, 'MA ', 'Morocco'),
(149, 'MZ ', 'Mozambique'),
(150, 'MM ', 'Myanmar'),
(151, 'NA ', 'Namibia'),
(152, 'NR ', 'Nauru'),
(153, 'NP ', 'Nepal'),
(154, 'NL ', 'Netherlands'),
(155, 'AN ', 'Netherlands Antilles'),
(156, 'NC ', 'New Caledonia'),
(157, 'NZ ', 'New Zealand'),
(158, 'NI ', 'Nicaragua'),
(159, 'NE ', 'Niger'),
(160, 'NG ', 'Nigeria'),
(161, 'NU ', 'Niue'),
(162, 'NF ', 'Norfolk Island'),
(163, 'MP ', 'Northern Mariana Islands'),
(164, 'NO ', 'Norway'),
(165, 'OM ', 'Oman'),
(166, 'PK ', 'Pakistan'),
(167, 'PW ', 'Palau'),
(168, 'PA ', 'Panama'),
(169, 'PG ', 'Papua New Guinea'),
(170, 'PY ', 'Paraguay'),
(171, 'PE ', 'Peru'),
(172, 'PH ', 'Philippines'),
(173, 'PN ', 'Pitcairn'),
(174, 'PL ', 'Poland'),
(175, 'PT ', 'Portugal'),
(176, 'PR ', 'Puerto Rico'),
(177, 'QA ', 'Qatar'),
(178, 'RE ', 'Reunion'),
(179, 'RO ', 'Romania'),
(180, 'RU ', 'Russian Federation'),
(181, 'RW ', 'Rwanda'),
(182, 'SH ', 'Saint Helena'),
(183, 'KN ', 'Saint Kitts and Nevis'),
(184, 'LC ', 'Saint Lucia'),
(185, 'PM ', 'Saint Pierre and Miquelon'),
(186, 'VC ', 'Saint Vincent and the Grenadines'),
(187, 'WS ', 'Samoa (US)'),
(188, 'SM ', 'San Marino'),
(189, 'ST ', 'Sao Tome and Principe'),
(190, 'SA ', 'Saudi Arabia'),
(191, 'SN ', 'Senegal'),
(192, 'SC ', 'Seychelles'),
(193, 'SL ', 'Sierra Leone'),
(194, 'SG ', 'Singapore'),
(195, 'SK ', 'Slovakia'),
(196, 'SI ', 'Slovenia'),
(197, 'SB ', 'Solomon Islands'),
(198, 'SO ', 'Somalia'),
(199, 'GS ', 'South Georgia'),
(200, 'ZA ', 'South Africa'),
(201, 'LK ', 'Sri Lanka'),
(202, 'SD ', 'Sudan'),
(203, 'SR ', 'Suriname'),
(204, 'SJ ', 'Svalbard and Jan Mayen'),
(205, 'SZ ', 'Swaziland'),
(206, 'SE ', 'Sweden'),
(207, 'CH ', 'Switzerland'),
(208, 'SY ', 'Syrian Arab Republic'),
(209, 'TW ', 'Taiwan, Province of China'),
(210, 'TJ ', 'Tajikistan'),
(211, 'TZ ', 'Tanzania, United Republic of'),
(212, 'TH ', 'Thailand'),
(213, 'TG ', 'Togo'),
(214, 'TK ', 'Tokelau'),
(215, 'TO ', 'Tonga'),
(216, 'TT ', 'Trinidad and Tobago'),
(217, 'TN ', 'Tunisia'),
(218, 'TR ', 'Turkey'),
(219, 'TM ', 'Turkmenistan'),
(220, 'TC ', 'Turks and Caicos Islands'),
(221, 'TV ', 'Tuvalu'),
(222, 'UG ', 'Uganda'),
(223, 'UA ', 'Ukraine'),
(224, 'AE ', 'United Arab Emirates'),
(225, 'UM ', 'United States Minor Outlying Islands'),
(226, 'UY ', 'Uruguay'),
(227, 'UZ ', 'Uzbekistan'),
(228, 'VU ', 'Vanuatu'),
(229, 'VE ', 'Venezuela'),
(230, 'VN ', 'Vietnam'),
(231, 'VG ', 'Virgin Islands, British'),
(232, 'VI ', 'Virgin Islands, U.S.'),
(233, 'WF ', 'Wallis and Futuna'),
(234, 'EH ', 'Western Sahara'),
(235, 'YE ', 'Yemen'),
(236, 'YU ', 'Yugoslavia'),
(237, 'ZM ', 'Zambia'),
(238, 'ZW ', 'Zimbabwe'),
(239, 'AX', 'Aland Islands'),
(240, 'FR', 'Corsica, France'),
(241, 'IT', 'Sardinia, Italy'),
(242, 'IT', 'Vatican City, Italy'),
(243, 'NO', 'Spitzbergen, Norway'),
(244, 'ES', 'Azores, Spain'),
(245, 'ES', 'Madeira, Spain'),
(246, 'ES', 'Majorca, Spain'),
(247, 'ES', 'Menorca, Spain'),
(248, 'ES', 'Ibiza, Spain'),
(249, 'ES', 'Formentera, Spain'),
(250, 'ES', 'Canary Islands, Spain'),
(251, 'NO', 'Spitsbergen, Norway'),
(252, 'HLD', 'UK(Scottish Highlands)'),
(253, 'NIUK', 'UK(Northern Ireland)'),
(254, 'CI', 'UK(Channel Islands)'),
(255, 'IMUK', 'UK(Isle Of Man)');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(255) NOT NULL,
  `code` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state`, `code`) VALUES
(1, 'New South Wales', 'NSW'),
(2, 'Victoria', 'VIC'),
(3, 'Western Australia', 'WA'),
(4, 'Queensland', 'QLD'),
(5, 'Tasmania', 'TAS'),
(6, 'Australian Capital Territory', 'ACT'),
(7, 'Northern Territory', 'NT'),
(8, 'South Australia', 'SA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advertisement`
--

CREATE TABLE IF NOT EXISTS `tbl_advertisement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `long_description` int(11) NOT NULL,
  `price` decimal(11,0) NOT NULL,
  `image` varchar(255) NOT NULL,
  `buiseness_name` varchar(255) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `latt` varchar(255) NOT NULL,
  `longt` varchar(255) NOT NULL,
  `activity_level` int(11) NOT NULL,
  `opening_time` time NOT NULL,
  `closing_time` time NOT NULL,
  `ad_duration` varchar(100) NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no',
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `tbl_advertisement`
--

INSERT INTO `tbl_advertisement` (`id`, `heading`, `short_description`, `long_description`, `price`, `image`, `buiseness_name`, `contact_number`, `address`, `state`, `city`, `country`, `latt`, `longt`, `activity_level`, `opening_time`, `closing_time`, `ad_duration`, `is_deleted`, `created_at`, `modified_at`, `user_id`) VALUES
(20, 'werwer', 'werwer', 0, '23432432432', '2015-06-02-190152_N-Optix_Logo_1_-_Copy.png', 'ewrewr', 234324234, '21 Kirksway Place', 'TAS', 'Hobart', 'AU', '-42.887593', '147.330391', 0, '00:00:00', '00:00:00', '1:4', 'no', '2015-06-02 19:01:52', '0000-00-00 00:00:00', 0),
(21, 'wewew', 'wewew', 0, '344343', '2015-06-03-222119_sadasad.jpg', 'fdsfds gds dgd', 2147483647, '201 Walker Street', 'QLD', 'Townsville', 'AU', '-19.2603644', '146.8132707', 0, '00:00:00', '00:00:00', '12:8', 'no', '2015-06-03 22:21:19', '0000-00-00 00:00:00', 0),
(22, '1dsfsf', '1excddsf', 0, '324324', '2015-06-04-002630_10922622_1562737857317818_4137835395776617208_n.jpg', 'ewrwer', 324324324, '45 Francis Street', 'WA', 'Northbridge', 'AU', '-31.947902', '115.859113', 0, '00:00:00', '00:00:00', '6:12', 'no', '2015-06-04 00:26:30', '0000-00-00 00:00:00', 0),
(23, '2 fefew', '2 fggreg', 0, '34324', '2015-06-04-002752_mic_one.png', 'dsfdfder', 2147483647, '506 Lorimer Street Fishermans Bend', 'VIC', '506 Lorimer Street Fishermans Bend', 'AU', '-37.8268261', '144.9116167', 0, '00:00:00', '00:00:00', '14:16', 'no', '2015-06-04 00:27:52', '0000-00-00 00:00:00', 0),
(24, '3 DGDG', '3 dsfdsf', 0, '32423432', '2015-06-04-002905_birds.jpg', 'gghfghfh', 2147483647, '12 Weaving Court', 'NT', 'ALICE SPRINGS', 'AU', '-23.702446', '133.850442', 0, '00:00:00', '00:00:00', '6:8', 'no', '2015-06-04 00:29:05', '0000-00-00 00:00:00', 0),
(25, 'jhjkh', 'jkhkj', 0, '0', 'fake.jpg', '', 0, '', '', '', '', '', '', 0, '00:00:00', '00:00:00', '', 'no', '2015-08-09 03:51:55', '0000-00-00 00:00:00', 0),
(26, 'jhjkh', 'jkhkj', 0, '0', 'fake.jpg', '', 0, '', '', '', '', '', '', 0, '00:00:00', '00:00:00', '', 'no', '2015-08-09 03:53:25', '0000-00-00 00:00:00', 0),
(27, 'jgjkgjkgjkg', 'jg', 0, '0', 'fb_signUp_form.png', '', 0, '', '', '', '', '', '', 0, '00:00:00', '00:00:00', '', 'no', '2015-08-09 03:55:05', '0000-00-00 00:00:00', 0),
(28, 'jgjkgjkgjkg', 'jg', 0, '0', 'fb_signUp_form.png', '', 0, '', '', '', '', '', '', 0, '00:00:00', '00:00:00', '', 'no', '2015-08-09 03:56:19', '0000-00-00 00:00:00', 0),
(29, 'sda', 'dsadas', 0, '0', 'fake.jpg', '', 0, 'sadsad', '', '', '', '', '', 0, '00:00:00', '00:00:00', '', 'no', '2015-08-09 04:41:48', '0000-00-00 00:00:00', 0),
(30, 'sda', 'dsadas', 0, '0', 'fake.jpg', '', 0, 'sadsad', '', '', '', '', '', 0, '00:00:00', '00:00:00', '', 'no', '2015-08-09 04:42:29', '0000-00-00 00:00:00', 0),
(31, 'sadsad', 'dsad', 0, '0', 'fake.jpg', '', 0, 'asdasdas', '', '', '', '', '', 0, '00:00:00', '00:00:00', '', 'no', '2015-08-09 04:43:41', '0000-00-00 00:00:00', 0),
(32, 'sadsad', 'dsad', 0, '0', 'birds.jpg', '', 0, 'asdasdas', '', '', '', '', '', 0, '00:00:00', '00:00:00', '', 'no', '2015-08-09 04:44:51', '0000-00-00 00:00:00', 0),
(33, 'sadsad', 'dsad', 0, '0', 'fake1.jpg', '', 0, 'asdasdas', '', '', '', '', '', 0, '00:00:00', '00:00:00', '', 'no', '2015-08-09 04:45:02', '0000-00-00 00:00:00', 0),
(34, 'asdad', 'dsadsa', 0, '222', '15-aug.jpg', '', 0, 'Hamilton Island Great Barrier Reef5', 'AU', 'Hamilton Island', '', '-20.3512228', '148.9578898', 0, '00:00:00', '00:00:00', '', 'no', '2015-08-10 01:58:24', '0000-00-00 00:00:00', 0),
(35, 'asdad', 'dsadsa', 0, '222', 'IMG_20150116_121616.jpg', '', 0, 'Hamilton Island Great Barrier Reef5', 'AU', 'Hamilton Island', '', '-20.3512228', '148.9578898', 0, '00:00:00', '00:00:00', '', 'no', '2015-08-10 01:58:41', '0000-00-00 00:00:00', 0),
(36, 'asdad', 'dsadsa', 0, '222', 'us.png', '', 0, 'Hamilton Island Great Barrier Reef5', 'AU', 'Hamilton Island', '', '-20.3512228', '148.9578898', 0, '00:00:00', '00:00:00', '', 'no', '2015-08-10 01:58:53', '0000-00-00 00:00:00', 0),
(37, 'sadad', 'asdsa', 0, '23213', 'us.png', '', 0, 'H', 'QLD', 'Hamilton Island', 'AU', '-20.3512228', '148.9578898', 0, '00:00:00', '00:00:00', '', 'no', '2015-08-10 02:00:46', '0000-00-00 00:00:00', 0),
(38, 'sadad', 'asdsa', 0, '23213', 'mic_two.png', '', 0, 'H', 'QLD', 'Hamilton Island', 'AU', '-20.3512228', '148.9578898', 0, '00:00:00', '00:00:00', '', 'no', '2015-08-10 02:00:59', '0000-00-00 00:00:00', 0),
(39, 'xcxzczxc', 'czxczxczx', 0, '2324', '2015-08-10-020733_fake1.jpg', '', 0, 'fdsfsdf', 'QLD', 'Hamilton Island', 'AU', '-20.3512228', '148.9578898', 3, '00:00:00', '00:00:00', '', 'no', '2015-08-10 02:07:33', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_type` varchar(255) NOT NULL,
  `social_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `interest` varchar(255) NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image_url` varchar(255) NOT NULL,
  `age_range` varchar(255) NOT NULL,
  `gender` enum('notSelected','male','female') NOT NULL,
  `profession` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `country_id` varchar(100) NOT NULL,
  `last_login` datetime NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `is_deleted` enum('0','1') NOT NULL,
  `user_activated` enum('Active','Inactive') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login_type`, `social_id`, `username`, `fname`, `lname`, `email`, `phone`, `interest`, `birth_date`, `password`, `profile_image_url`, `age_range`, `gender`, `profession`, `city`, `state`, `zip`, `country_id`, `last_login`, `status`, `is_deleted`, `user_activated`, `created`, `modified`) VALUES
(1, 'static', '', 'hghg', 'Vivek', 'Kumar', 'vivek_choudhary@hotmail.com', 'gjhtert', 'jgjhtreter', '2', 'g', 'fake1.jpg', '', 'notSelected', '', '', '', '', '', '0000-00-00 00:00:00', 'Active', '0', 'Active', '2015-08-04 23:13:39', '0000-00-00 00:00:00'),
(2, 'static', '', 'zsdsa', 'sdasdsad', 'asdasdsa', 'vivek_choudharey@hotmail.com', 'asdasdsad', 'sadsad', 'e', 'r', '', '', 'notSelected', '', '', '', '', '', '0000-00-00 00:00:00', 'Active', '0', 'Active', '2015-08-06 23:52:42', '0000-00-00 00:00:00'),
(3, 'static', '', 'Vivek', '', '', 'vivek@gmail.com', '', '', '08/25/2015', 'w', '', '', 'notSelected', '', '', '', '', '', '0000-00-00 00:00:00', 'Active', '0', 'Active', '2015-08-09 16:58:17', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
