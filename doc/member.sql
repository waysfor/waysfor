-- phpMyAdmin SQL Dump
-- version 3.5.0-dev
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2011 at 11:06 上午
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `waysfor`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id号',
  `username` varchar(60) NOT NULL COMMENT '账户名',
  `password` char(32) NOT NULL COMMENT '账户密码',
  `realname` varchar(60) NOT NULL COMMENT '真实姓名',
  `email` varchar(60) NOT NULL COMMENT '电子邮箱',
  `mobile` varchar(60) NOT NULL COMMENT '手机号码',
  `tel` varchar(60) NOT NULL COMMENT '座机号码',
  `address` varchar(60) NOT NULL COMMENT '常住地址',
  `homeaddress` varchar(60) NOT NULL COMMENT '家乡地址',
  `hometel` varchar(60) NOT NULL COMMENT '家庭联系电话',
  `linkman` varchar(20) NOT NULL COMMENT '联系人',
  `linkinfo` varchar(60) NOT NULL COMMENT '联系人联系方式',
  `role` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '权限角色 0普通用户 1初级管理用户 2高级管理用户 3超级管理用户',
  `addtm` int(10) unsigned NOT NULL COMMENT '用户创建时间',
  `lasttm` int(10) unsigned NOT NULL COMMENT '用户最后登录时间',
  `lastip` int(11) NOT NULL COMMENT '用户最后登录ip',
  `lastact` varchar(60) NOT NULL COMMENT '用户最后动作',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `realname`, `email`, `mobile`, `tel`, `address`, `homeaddress`, `hometel`, `linkman`, `linkinfo`, `role`, `addtm`, `lasttm`, `lastip`, `lastact`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '管理员', 'admin@waysfor.dev', '13888888888', '021-88888888', '上海周浦万达广场', '上海周浦万达广场', '021-88886666', '张强', '13666666666', 3, 1320916773, 1320916773, 2130706433, 'manage,index');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
