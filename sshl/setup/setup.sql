-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1:3306
-- 生成日期: 2013 年 06 月 27 日 03:21
-- 服务器版本: 5.1.28
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `cql`
--

-- --------------------------------------------------------

--
-- 表的结构 `setup`
--

CREATE TABLE IF NOT EXISTS `setup` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `site_title` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `site_key` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `site_des` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `site_bot` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `site_email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `wtime` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 导出表中的数据 `setup`
--

INSERT INTO `setup` (`id`, `site_title`, `site_key`, `site_des`, `site_bot`, `site_email`, `ip`, `wtime`) VALUES
(1, '海淘村', '海淘村', '海淘村', '版权所有（C）海淘村 2013-2020 粤ICP备0903729号\r\nGuangdong ICP prepared 0903729', '123456789@qq.com', '', 0);
