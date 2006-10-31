-- phpMyAdmin SQL Dump
-- version 2.9.0.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Oct 30, 2006 at 01:38 AM
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
  `alliance_name` varchar(100) character set utf8 NOT NULL,
  `alliance_code` varchar(50) character set utf8 NOT NULL,
  `alliance_description` varchar(255) character set utf8 NOT NULL,
  PRIMARY KEY  (`alliance_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

-- 
-- Table structure for table `artefact`
-- 

CREATE TABLE `artefact` (
  `artefact_id` int(11) NOT NULL auto_increment,
  `artefact_bonus` float NOT NULL,
  `resource_id` int(11) NOT NULL,
  `artefact_size_id` int(11) NOT NULL,
  `artefact_name` varchar(50) character set cp1251 NOT NULL,
  PRIMARY KEY  (`artefact_id`),
  KEY `resource_id` (`resource_id`,`artefact_size_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

-- 
-- Table structure for table `artefact_size`
-- 

CREATE TABLE `artefact_size` (
  `artefact_size_id` int(11) NOT NULL auto_increment,
  `artefact_size_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`artefact_size_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

-- 
-- Table structure for table `player`
-- 

CREATE TABLE `player` (
  `player_id` int(11) NOT NULL auto_increment,
  `player_nick` varchar(50) NOT NULL,
  PRIMARY KEY  (`player_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

-- 
-- Table structure for table `player_artefact`
-- 

CREATE TABLE `player_artefact` (
  `player_id` int(11) NOT NULL,
  `artefact_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

-- 
-- Table structure for table `resource`
-- 

CREATE TABLE `resource` (
  `resource_id` int(11) NOT NULL auto_increment,
  `resource_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`resource_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
