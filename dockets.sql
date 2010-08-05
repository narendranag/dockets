-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 04, 2010 at 11:44 AM
-- Server version: 5.1.37
-- PHP Version: 5.2.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dockets`
--

-- --------------------------------------------------------

--
-- Table structure for table `dockets`
--

CREATE TABLE `dockets` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `completed` tinyint(4) NOT NULL,
  `shared` tinyint(4) NOT NULL,
  `short_url` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `dockets`
--

INSERT INTO `dockets` VALUES(37, 'Grocery List', 'biwi ne mangwai hai leke aana', 1, 0, 1, 'http://bit.ly/bpZ9yO', '2010-07-06 21:58:53', '2010-07-06 16:28:53');
INSERT INTO `dockets` VALUES(38, 'Things To Do', '', 1, 0, 0, 'http://bit.ly/d5SE6G', '2010-07-05 22:44:54', '2010-07-05 17:14:54');
INSERT INTO `dockets` VALUES(39, 'Test Todo', '', 1, 0, 0, 'http://bit.ly/cNh9DM', '2010-07-05 22:45:24', '2010-07-05 17:15:24');
INSERT INTO `dockets` VALUES(40, 'Work', '', 2, 0, 1, 'http://bit.ly/aCGKwX', '2010-08-02 17:10:07', '2010-08-02 11:40:07');
INSERT INTO `dockets` VALUES(41, 'build Jobs application', '', 2, 0, 0, 'http://bit.ly/bJaguW', '2010-08-02 17:25:09', '2010-08-02 11:55:09');
INSERT INTO `dockets` VALUES(42, 'List of items Office Stationary', 'to be bought before this time', 2, 1, 0, 'http://bit.ly/bgGVNH', '2010-08-02 17:11:57', '2010-08-02 11:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `gold`
--

CREATE TABLE `gold` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `amount` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `gold`
--

INSERT INTO `gold` VALUES(1, 10);
INSERT INTO `gold` VALUES(2, 10);
INSERT INTO `gold` VALUES(3, 10);
INSERT INTO `gold` VALUES(4, 10);
INSERT INTO `gold` VALUES(5, 10);
INSERT INTO `gold` VALUES(6, 10);
INSERT INTO `gold` VALUES(7, 10);
INSERT INTO `gold` VALUES(8, 360);
INSERT INTO `gold` VALUES(9, 10);

-- --------------------------------------------------------

--
-- Table structure for table `gold_users`
--

CREATE TABLE `gold_users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `gold_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gold_users`
--

INSERT INTO `gold_users` VALUES(1, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `login_attempts`
--


-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `data` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `permissions`
--


-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `roles`
--


-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` VALUES('6b315048a0ba3386c3d8350281b98aa0', '127.0.0.1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_3; ', 1280750098, 0x613a31303a7b733a31303a2244585f757365725f6964223b733a313a2232223b733a31313a2244585f757365726e616d65223b733a31313a226e6172656e6472616e6167223b733a383a2244585f656d61696c223b733a32313a226e6172656e6472616e616740676d61696c2e636f6d223b733a31303a2244585f726f6c655f6964223b733a313a2231223b733a31323a2244585f726f6c655f6e616d65223b733a303a22223b733a31383a2244585f706172656e745f726f6c65735f6964223b613a303a7b7d733a32303a2244585f706172656e745f726f6c65735f6e616d65223b613a303a7b7d733a31333a2244585f7065726d697373696f6e223b613a303a7b7d733a32313a2244585f706172656e745f7065726d697373696f6e73223b613a303a7b7d733a31323a2244585f6c6f676765645f696e223b733a313a2231223b7d);
INSERT INTO `sessions` VALUES('76259a289fddc4cf0930e1bccb70aed4', '127.0.0.1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_4; ', 1280812797, 0x613a343a7b733a32323a22666c6173683a6f6c643a636170746368615f776f7264223b733a363a224a565a494f39223b733a32323a22666c6173683a6f6c643a636170746368615f74696d65223b733a31333a22313238303831323831312e3534223b733a32323a22666c6173683a6e65773a636170746368615f776f7264223b733a363a22434f564c4b43223b733a32323a22666c6173683a6e65773a636170746368615f74696d65223b733a31333a22313238303831323831312e3638223b7d);
INSERT INTO `sessions` VALUES('e7591a097de0596d5d4a5cf5e577bcb7', '0.0.0.0', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.6; en', 1280749825, 0x613a31303a7b733a31303a2244585f757365725f6964223b733a313a2232223b733a31313a2244585f757365726e616d65223b733a31313a226e6172656e6472616e6167223b733a383a2244585f656d61696c223b733a32313a226e6172656e6472616e616740676d61696c2e636f6d223b733a31303a2244585f726f6c655f6964223b733a313a2231223b733a31323a2244585f726f6c655f6e616d65223b733a303a22223b733a31383a2244585f706172656e745f726f6c65735f6964223b613a303a7b7d733a32303a2244585f706172656e745f726f6c65735f6e616d65223b613a303a7b7d733a31333a2244585f7065726d697373696f6e223b613a303a7b7d733a32313a2244585f706172656e745f7065726d697373696f6e73223b613a303a7b7d733a31323a2244585f6c6f676765645f696e223b733a313a2231223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `completed` tinyint(4) NOT NULL,
  `due` date NOT NULL,
  `docket_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` VALUES(47, 'bhindi', 1, '0000-00-00', 37, 0, '2010-07-05 01:04:30', '0000-00-00 00:00:00');
INSERT INTO `tasks` VALUES(48, 'Grocery List', 1, '0000-00-00', 37, 0, '2010-07-05 01:06:03', '0000-00-00 00:00:00');
INSERT INTO `tasks` VALUES(49, 'phool gobhi', 1, '2010-07-06', 37, 0, '2010-07-06 21:58:53', '2010-07-06 16:28:53');
INSERT INTO `tasks` VALUES(50, 'By Making this Docket Public, anyone can view it!', 0, '2010-07-31', 37, 0, '2010-07-06 21:57:10', '2010-07-06 16:27:10');
INSERT INTO `tasks` VALUES(51, 'Build a jobs application', 1, '2010-07-08', 40, 2, '2010-08-02 15:50:27', '2010-07-07 10:39:24');
INSERT INTO `tasks` VALUES(52, 'Build a jobs application', 1, '2010-07-08', 40, 2, '2010-08-02 17:09:55', '2010-08-02 11:39:55');
INSERT INTO `tasks` VALUES(53, 'build Jobs application', 1, '1970-01-01', 40, 2, '2010-08-02 17:09:56', '2010-08-02 11:39:56');
INSERT INTO `tasks` VALUES(54, 'Beer Party', 0, '1970-01-01', 40, 0, '2010-08-02 10:20:46', '2010-08-02 10:20:46');
INSERT INTO `tasks` VALUES(55, 'Beer Party', 0, '1970-01-01', 40, 0, '2010-08-02 10:20:54', '2010-08-02 10:20:54');
INSERT INTO `tasks` VALUES(56, 'Beer Party', 0, '1970-01-01', 40, 0, '2010-08-02 10:21:24', '2010-08-02 10:21:24');
INSERT INTO `tasks` VALUES(57, 'Beer Party', 0, '1970-01-01', 40, 0, '2010-08-02 10:21:33', '2010-08-02 10:21:33');
INSERT INTO `tasks` VALUES(58, 'Beer Party', 1, '1970-01-01', 40, 2, '2010-08-02 17:10:05', '2010-08-02 11:40:05');
INSERT INTO `tasks` VALUES(59, 'Beer Party', 1, '1970-01-01', 40, 2, '2010-08-02 17:10:06', '2010-08-02 11:40:06');
INSERT INTO `tasks` VALUES(60, 'Neeraj Kumar', 1, '1970-01-01', 40, 2, '2010-08-02 17:10:07', '2010-08-02 11:40:07');
INSERT INTO `tasks` VALUES(61, 'Beer Party', 0, '1970-01-01', 41, 2, '2010-08-02 17:25:04', '2010-08-02 11:55:04');
INSERT INTO `tasks` VALUES(62, 'build Jobs application', 1, '1970-01-01', 41, 2, '2010-08-02 17:25:06', '2010-08-02 11:55:06');
INSERT INTO `tasks` VALUES(63, 'Neeraj Kumar', 1, '2010-08-18', 41, 2, '2010-08-02 17:25:07', '2010-08-02 11:55:07');
INSERT INTO `tasks` VALUES(64, 'testing due date', 1, '2010-08-12', 41, 2, '2010-08-02 17:25:09', '2010-08-02 11:55:09');
INSERT INTO `tasks` VALUES(65, 'clips', 1, '2010-08-12', 42, 2, '2010-08-02 17:11:55', '2010-08-02 11:41:55');
INSERT INTO `tasks` VALUES(66, 'paper weight', 1, '2010-08-12', 42, 2, '2010-08-02 17:11:57', '2010-08-02 11:41:57');
INSERT INTO `tasks` VALUES(67, 'colin spray', 1, '2010-08-12', 42, 2, '2010-08-02 17:11:56', '2010-08-02 11:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `username` varchar(25) COLLATE utf8_bin NOT NULL,
  `password` varchar(34) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `newpass` varchar(34) COLLATE utf8_bin DEFAULT NULL,
  `newpass_key` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `newpass_time` datetime DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(2, 1, 'narendranag', 's0yAFIYKQDFjk', 'narendranag@gmail.com', 0, NULL, NULL, NULL, NULL, '0.0.0.0', '2010-08-02 16:16:30', '2010-07-07 16:07:25', '2010-08-02 16:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

CREATE TABLE `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` mediumint(8) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_autologin`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` VALUES(1, 1, NULL, NULL);
INSERT INTO `user_profile` VALUES(2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_temp`
--

CREATE TABLE `user_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(34) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activation_key` varchar(50) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_temp`
--

