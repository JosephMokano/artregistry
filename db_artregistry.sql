-- phpMyAdmin SQL Dump
-- version 2.9.0.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Nov 05, 2006 at 07:40 PM
-- Server version: 5.0.24
-- PHP Version: 5.1.6
-- 
-- Database: `artregistry`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `alliance`
-- 

CREATE TABLE `alliance` (
  `alliance_id` int(11) NOT NULL auto_increment,
  `alliance_name` varchar(100) NOT NULL,
  `alliance_code` varchar(50) NOT NULL,
  `alliance_description` varchar(255) NOT NULL,
  `sphere_id` int(11) NOT NULL,
  PRIMARY KEY  (`alliance_id`),
  KEY `sphere_id` (`sphere_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `alliance`
-- 

INSERT INTO `alliance` (`alliance_id`, `alliance_name`, `alliance_code`, `alliance_description`, `sphere_id`) VALUES (1, 'SHTORM', 'SHTORM', 'Мы пришли в этот мир воевать', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `artefact`
-- 

CREATE TABLE `artefact` (
  `artefact_id` int(11) NOT NULL auto_increment,
  `artefact_bonus` float NOT NULL,
  `resource_id` int(11) NOT NULL,
  `artefact_size_id` int(11) NOT NULL,
  `artefact_type_id` int(11) NOT NULL,
  PRIMARY KEY  (`artefact_id`),
  KEY `resource_id` (`resource_id`,`artefact_size_id`,`artefact_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=211 ;

-- 
-- Dumping data for table `artefact`
-- 

INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (1, 0.05, 1, 1, 1);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (2, 0.08, 1, 1, 2);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (3, 0.11, 1, 1, 3);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (4, 0.14, 1, 1, 4);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (5, 0.17, 1, 1, 5);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (6, 0.2, 1, 1, 6);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (7, 0.23, 1, 1, 7);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (8, 0.26, 1, 2, 1);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (9, 0.29, 1, 2, 2);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (10, 0.32, 1, 2, 3);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (11, 0.35, 1, 2, 4);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (12, 0.38, 1, 2, 5);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (13, 0.41, 1, 2, 6);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (14, 0.44, 1, 2, 7);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (15, 0.47, 1, 3, 1);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (16, 0.5, 1, 3, 2);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (17, 0.53, 1, 3, 3);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (18, 0.56, 1, 3, 4);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (19, 0.59, 1, 3, 5);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (20, 0.62, 1, 3, 6);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (21, 0.65, 1, 3, 7);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (22, 0.68, 1, 4, 1);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (23, 0.71, 1, 4, 2);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (24, 0.74, 1, 4, 3);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (25, 0.77, 1, 4, 4);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (26, 0.8, 1, 4, 5);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (27, 0.83, 1, 4, 6);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (28, 0.86, 1, 4, 7);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (29, 0.89, 1, 5, 1);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (30, 0.92, 1, 5, 2);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (31, 0.95, 1, 5, 3);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (32, 0.98, 1, 5, 4);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (33, 1.01, 1, 5, 5);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (34, 1.04, 1, 5, 6);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (35, 1.07, 1, 5, 7);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (36, 1.1, 1, 6, 1);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (37, 1.13, 1, 6, 2);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (38, 1.16, 1, 6, 3);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (39, 1.19, 1, 6, 4);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (40, 1.22, 1, 6, 5);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (41, 1.25, 1, 6, 6);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (42, 1.28, 1, 6, 7);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (43, 0.025, 2, 1, 8);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (44, 0.045, 2, 1, 9);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (45, 0.065, 2, 1, 10);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (46, 0.085, 2, 1, 11);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (47, 0.105, 2, 1, 12);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (48, 0.125, 2, 1, 13);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (49, 0.145, 2, 1, 14);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (50, 0.165, 2, 2, 8);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (51, 0.185, 2, 2, 9);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (52, 0.205, 2, 2, 10);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (53, 0.225, 2, 2, 11);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (54, 0.245, 2, 2, 12);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (55, 0.265, 2, 2, 13);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (56, 0.285, 2, 2, 14);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (57, 0.305, 2, 3, 8);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (58, 0.325, 2, 3, 9);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (59, 0.345, 2, 3, 10);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (60, 0.365, 2, 3, 11);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (61, 0.385, 2, 3, 12);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (62, 0.405, 2, 3, 13);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (63, 0.425, 2, 3, 14);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (64, 0.445, 2, 4, 8);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (65, 0.465, 2, 4, 9);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (66, 0.485, 2, 4, 10);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (67, 0.505, 2, 4, 11);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (68, 0.525, 2, 4, 12);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (69, 0.545, 2, 4, 13);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (70, 0.565, 2, 4, 14);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (71, 0.585, 2, 5, 8);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (72, 0.605, 2, 5, 9);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (73, 0.625, 2, 5, 10);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (74, 0.645, 2, 5, 11);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (75, 0.665, 2, 5, 12);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (76, 0.685, 2, 5, 13);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (77, 0.705, 2, 5, 14);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (78, 0.725, 2, 6, 8);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (79, 0.745, 2, 6, 9);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (80, 0.765, 2, 6, 10);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (81, 0.785, 2, 6, 11);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (82, 0.805, 2, 6, 12);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (83, 0.825, 2, 6, 13);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (84, 0.845, 2, 6, 14);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (85, 0.01, 3, 1, 15);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (86, 0.02, 3, 1, 16);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (87, 0.03, 3, 1, 17);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (88, 0.04, 3, 1, 18);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (89, 0.05, 3, 1, 19);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (90, 0.06, 3, 1, 20);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (91, 0.07, 3, 1, 21);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (92, 0.08, 3, 2, 15);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (93, 0.09, 3, 2, 16);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (94, 0.1, 3, 2, 17);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (95, 0.11, 3, 2, 18);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (96, 0.12, 3, 2, 19);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (97, 0.13, 3, 2, 20);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (98, 0.14, 3, 2, 21);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (99, 0.15, 3, 3, 15);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (100, 0.16, 3, 3, 16);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (101, 0.17, 3, 3, 17);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (102, 0.18, 3, 3, 18);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (103, 0.19, 3, 3, 19);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (104, 0.2, 3, 3, 20);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (105, 0.21, 3, 3, 21);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (106, 0.22, 3, 4, 15);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (107, 0.23, 3, 4, 16);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (108, 0.24, 3, 4, 17);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (109, 0.25, 3, 4, 18);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (110, 0.26, 3, 4, 19);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (111, 0.27, 3, 4, 20);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (112, 0.28, 3, 4, 21);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (113, 0.29, 3, 5, 15);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (114, 0.3, 3, 5, 16);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (115, 0.31, 3, 5, 17);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (116, 0.32, 3, 5, 18);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (117, 0.33, 3, 5, 19);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (118, 0.34, 3, 5, 20);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (119, 0.35, 3, 5, 21);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (120, 0.36, 3, 6, 15);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (121, 0.37, 3, 6, 16);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (122, 0.38, 3, 6, 17);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (123, 0.39, 3, 6, 18);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (124, 0.4, 3, 6, 19);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (125, 0.41, 3, 6, 20);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (126, 0.42, 3, 6, 21);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (127, 0.1, 4, 1, 22);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (128, 0.15, 4, 1, 23);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (129, 0.2, 4, 1, 24);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (130, 0.25, 4, 1, 25);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (131, 0.3, 4, 1, 26);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (132, 0.35, 4, 1, 27);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (133, 0.4, 4, 1, 28);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (134, 0.45, 4, 2, 22);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (135, 0.5, 4, 2, 23);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (136, 0.55, 4, 2, 24);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (137, 0.6, 4, 2, 25);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (138, 0.65, 4, 2, 26);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (139, 0.7, 4, 2, 27);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (140, 0.75, 4, 2, 28);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (141, 0.8, 4, 3, 22);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (142, 0.85, 4, 3, 23);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (143, 0.9, 4, 3, 24);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (144, 0.95, 4, 3, 25);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (145, 1, 4, 3, 26);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (146, 1.05, 4, 3, 27);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (147, 1.1, 4, 3, 28);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (148, 1.15, 4, 4, 22);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (149, 1.2, 4, 4, 23);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (150, 1.25, 4, 4, 24);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (151, 1.3, 4, 4, 25);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (152, 1.35, 4, 4, 26);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (153, 1.4, 4, 4, 27);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (154, 1.45, 4, 4, 28);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (155, 1.5, 4, 5, 22);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (156, 1.55, 4, 5, 23);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (157, 1.6, 4, 5, 24);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (158, 1.65, 4, 5, 25);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (159, 1.7, 4, 5, 26);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (160, 1.75, 4, 5, 27);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (161, 1.8, 4, 5, 28);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (162, 1.85, 4, 6, 22);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (163, 1.9, 4, 6, 23);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (164, 1.95, 4, 6, 24);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (165, 2, 4, 6, 25);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (166, 2.05, 4, 6, 26);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (167, 2.1, 4, 6, 27);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (168, 2.15, 4, 6, 28);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (169, 0.1, 5, 1, 29);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (170, 0.15, 5, 1, 30);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (171, 0.2, 5, 1, 31);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (172, 0.25, 5, 1, 32);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (173, 0.3, 5, 1, 33);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (174, 0.35, 5, 1, 34);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (175, 0.4, 5, 1, 35);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (176, 0.45, 5, 2, 29);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (177, 0.5, 5, 2, 30);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (178, 0.55, 5, 2, 31);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (179, 0.6, 5, 2, 32);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (180, 0.65, 5, 2, 33);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (181, 0.7, 5, 2, 34);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (182, 0.75, 5, 2, 35);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (183, 0.8, 5, 3, 29);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (184, 0.85, 5, 3, 30);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (185, 0.9, 5, 3, 31);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (186, 0.95, 5, 3, 32);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (187, 1, 5, 3, 33);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (188, 1.05, 5, 3, 34);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (189, 1.1, 5, 3, 35);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (190, 1.15, 5, 4, 29);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (191, 1.2, 5, 4, 30);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (192, 1.25, 5, 4, 31);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (193, 1.3, 5, 4, 32);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (194, 1.35, 5, 4, 33);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (195, 1.4, 5, 4, 34);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (196, 1.45, 5, 4, 35);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (197, 1.5, 5, 5, 29);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (198, 1.55, 5, 5, 30);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (199, 1.6, 5, 5, 31);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (200, 1.65, 5, 5, 32);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (201, 1.7, 5, 5, 33);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (202, 1.75, 5, 5, 34);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (203, 1.8, 5, 5, 35);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (204, 1.85, 5, 6, 29);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (205, 1.9, 5, 6, 30);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (206, 1.95, 5, 6, 31);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (207, 2, 5, 6, 32);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (208, 2.05, 5, 6, 33);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (209, 2.1, 5, 6, 34);
INSERT INTO `artefact` (`artefact_id`, `artefact_bonus`, `resource_id`, `artefact_size_id`, `artefact_type_id`) VALUES (210, 2.15, 5, 6, 35);

-- --------------------------------------------------------

-- 
-- Table structure for table `artefact_size`
-- 

CREATE TABLE `artefact_size` (
  `artefact_size_id` int(11) NOT NULL auto_increment,
  `artefact_size_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`artefact_size_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `artefact_size`
-- 

INSERT INTO `artefact_size` (`artefact_size_id`, `artefact_size_name`) VALUES (1, 'крохотный');
INSERT INTO `artefact_size` (`artefact_size_id`, `artefact_size_name`) VALUES (2, 'малый');
INSERT INTO `artefact_size` (`artefact_size_id`, `artefact_size_name`) VALUES (3, 'средний');
INSERT INTO `artefact_size` (`artefact_size_id`, `artefact_size_name`) VALUES (4, 'крупный');
INSERT INTO `artefact_size` (`artefact_size_id`, `artefact_size_name`) VALUES (5, 'большой');
INSERT INTO `artefact_size` (`artefact_size_id`, `artefact_size_name`) VALUES (6, 'огромный');

-- --------------------------------------------------------

-- 
-- Table structure for table `artefact_type`
-- 

CREATE TABLE `artefact_type` (
  `artefact_type_id` int(11) NOT NULL auto_increment,
  `artefact_type_name` varchar(50) NOT NULL,
  `resource_id` int(11) NOT NULL,
  PRIMARY KEY  (`artefact_type_id`),
  KEY `resource_id` (`resource_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

-- 
-- Dumping data for table `artefact_type`
-- 

INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (1, 'сварки', 1);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (2, 'кузнечного дела', 1);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (3, 'ковки', 1);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (4, 'литья', 1);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (5, 'штамповки', 1);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (6, 'плавки', 1);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (7, 'закалки', 1);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (8, 'синтеза', 2);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (9, 'кристаллизации', 2);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (10, 'катализации', 2);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (11, 'дисперсии', 2);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (12, 'полимеризации', 2);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (13, 'охлаждения', 2);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (14, 'радиолиза', 2);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (15, 'плазмы', 3);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (16, 'высокого давления', 3);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (17, 'сверхпроводимости', 3);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (18, 'ядерного синтеза', 3);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (19, 'квантовой оптики', 3);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (20, 'сенсорики', 3);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (21, 'термодинамики', 3);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (22, 'удобрений', 4);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (23, 'генной инженерии', 4);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (24, 'поливки', 4);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (25, 'механизации', 4);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (26, 'комбикорма', 4);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (27, 'гидропоники', 4);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (28, 'клонирования', 4);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (29, 'атома', 5);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (30, 'ядерного деления', 5);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (31, 'квантовой механики', 5);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (32, 'утилизации', 5);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (33, 'обогащения', 5);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (34, 'транспортировки', 5);
INSERT INTO `artefact_type` (`artefact_type_id`, `artefact_type_name`, `resource_id`) VALUES (35, 'экологии', 5);

-- --------------------------------------------------------

-- 
-- Table structure for table `player`
-- 

CREATE TABLE `player` (
  `player_id` int(11) NOT NULL auto_increment,
  `player_nick` varchar(50) NOT NULL,
  `alliance_id` int(11) NOT NULL,
  PRIMARY KEY  (`player_id`),
  KEY `alliance_id` (`alliance_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `player`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `player_artefact`
-- 

CREATE TABLE `player_artefact` (
  `player_id` int(11) NOT NULL,
  `artefact_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `player_artefact`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `resource`
-- 

CREATE TABLE `resource` (
  `resource_id` int(11) NOT NULL auto_increment,
  `resource_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`resource_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `resource`
-- 

INSERT INTO `resource` (`resource_id`, `resource_name`) VALUES (1, 'кадериум');
INSERT INTO `resource` (`resource_id`, `resource_name`) VALUES (2, 'нано-кристаллы');
INSERT INTO `resource` (`resource_id`, `resource_name`) VALUES (3, 'продиум');
INSERT INTO `resource` (`resource_id`, `resource_name`) VALUES (4, 'еда');
INSERT INTO `resource` (`resource_id`, `resource_name`) VALUES (5, 'энергия');

-- --------------------------------------------------------

-- 
-- Table structure for table `sphere`
-- 

CREATE TABLE `sphere` (
  `sphere_id` int(11) NOT NULL auto_increment,
  `sphere_name` varchar(100) NOT NULL,
  `sphere_description` text NOT NULL,
  PRIMARY KEY  (`sphere_id`),
  FULLTEXT KEY `sphere_description` (`sphere_description`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `sphere`
-- 

INSERT INTO `sphere` (`sphere_id`, `sphere_name`, `sphere_description`) VALUES (1, 'Сфера Стрельца', 'Игровой мир, полный долгожданных нововведений, где боевые единицы потребляют еду и энергию, а расчёт боя идёт по новым формулам.\r\n\r\nИгровой мир, где все воюют против всех. Только участие в альянсах позволит вам не остаться в одиночестве.');
