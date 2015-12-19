-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 12, 2012 at 02:30 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `pr`
--

-- --------------------------------------------------------

--
-- Table structure for table `cou`
--

CREATE TABLE IF NOT EXISTS `cou` (
  `id` text NOT NULL,
  `name` text NOT NULL,
  `dept` text NOT NULL,
  `sem` text NOT NULL,
  `div` text NOT NULL,
  `subcode` text NOT NULL,
  `prog` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cou`
--


-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `username` varchar(65) NOT NULL DEFAULT '',
  `password` varchar(65) NOT NULL DEFAULT '',
  `name` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`username`, `password`, `name`) VALUES
('admin', 'admin', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `num`
--

CREATE TABLE IF NOT EXISTS `num` (
  `num` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `num`
--

INSERT INTO `num` (`num`, `name`) VALUES
('0', 'sub');
