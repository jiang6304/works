-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2026-04-01 13:19:26
-- 服务器版本： 10.10.2-MariaDB
-- PHP 版本： 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `mydb`
--

-- --------------------------------------------------------

--
-- 表的结构 `ally`
--

DROP TABLE IF EXISTS `ally`;
CREATE TABLE IF NOT EXISTS `ally` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '姓名',
  `tell` bigint(80) NOT NULL COMMENT '电话',
  `address` varchar(50) NOT NULL COMMENT '地址',
  `budget` varchar(30) NOT NULL COMMENT '预算',
  `content` varchar(200) DEFAULT NULL COMMENT '留言',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `ally`
--

INSERT INTO `ally` (`id`, `name`, `tell`, `address`, `budget`, `content`) VALUES
(1, '姜', 11111111111, '天津', '10990', ''),
(3, 'Mandy ', 13233333333, '湖南', '20万', '无'),
(4, 'hr', 33445566778, '纽约', '130万', '无');

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` int(11) NOT NULL,
  `content` text NOT NULL,
  `time` date NOT NULL DEFAULT current_timestamp(),
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`id`, `username`, `content`, `time`, `uid`) VALUES
(1, 3, '第一次来就被治愈了。环境很安静，工具也齐全，老师会一步步带着做，成品比想象中好看太多！', '2023-11-22', 3),
(2, 1, '周末想找个不吵的地方放空，这家手工馆太合适了。做了个香薰蜡烛，过程很解压，拍照也出片。', '2023-11-22', 3),
(3, 3, '体验感拉满！从选材料到上色都很自由，工作人员不会催，做完还会帮你包装，送人很体面。', '2023-11-22', 2),
(8, 222, '今天做的陶瓷盆真的超级好看，下次要跟朋友一起来', '2023-12-23', 222),
(9, 222, '才发现店里还有绒花发簪制作体验，可惜今天来不及了', '2023-12-23', 222),
(10, 222, '带娃来的，孩子特别喜欢。老师很有耐心，会教孩子安全用工具，家长也能一起参与。', '2023-12-24', 222);

-- --------------------------------------------------------

--
-- 表的结构 `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `tell` bigint(80) NOT NULL COMMENT '电话',
  `address` text NOT NULL COMMENT '地址',
  `wechat` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `contact`
--

INSERT INTO `contact` (`id`, `name`, `tell`, `address`, `wechat`) VALUES
(1, '新华总店', 1111111111, '00省0市0区0街0号', '闲云野鹤手工馆'),
(3, '嘉禾店', 1244567899, '1省1市1区1路1号', '嘉禾1234');

-- --------------------------------------------------------

--
-- 表的结构 `login_logs`
--

DROP TABLE IF EXISTS `login_logs`;
CREATE TABLE IF NOT EXISTS `login_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) DEFAULT NULL COMMENT '用户ID',
  `ip` varchar(50) NOT NULL COMMENT 'IP地址',
  `status` tinyint(1) NOT NULL COMMENT '登录状态：1成功 0失败',
  `message` varchar(255) DEFAULT NULL COMMENT '消息',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '登录时间',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `ip` (`ip`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='登录日志表';

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `username` text DEFAULT NULL COMMENT '用户名',
  `tell` bigint(200) DEFAULT NULL COMMENT '电话',
  `passwd` varchar(200) NOT NULL COMMENT '密码',
  `isadmin` tinyint(4) NOT NULL DEFAULT 0 COMMENT '角色',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=246483 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`uid`, `username`, `tell`, `passwd`, `isadmin`) VALUES
(1, 'admin', 0, 'bd497aaa6386126c4e1e2d7914c5f879', 1),
(3, '3', 33, '1a100d2c0dab19c4430e7d73762b3423', 0),
(4, '4', 44444, '73882ab1fa529d7273da0db6b49cc4f3', 0),
(11, '11', 11, 'bd497aaa6386126c4e1e2d7914c5f879', 1),
(55, '6666', 12345678901, '5b1b68a9abf4d2cd155c81a9225fd158', 0),
(112, '0112', 15673211557, '07aeb18febbdbf77511a10fd4aa49942', 0),
(222, '222', 222222, 'e3ceb5881a0a1fdaad01296d7554868d', 0),
(333, '333', 33333333333, '1a100d2c0dab19c4430e7d73762b3423', 0),
(401, '0401', 111, 'bd497aaa6386126c4e1e2d7914c5f879', 0),
(666, '6', 55677, 'f379eaf3c831b04de153469d1bec345e', 0);

-- --------------------------------------------------------

--
-- 表的结构 `user_tokens`
--

DROP TABLE IF EXISTS `user_tokens`;
CREATE TABLE IF NOT EXISTS `user_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) NOT NULL COMMENT '用户ID',
  `token` varchar(64) NOT NULL COMMENT '登录Token',
  `expire` int(11) NOT NULL COMMENT '过期时间戳',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`),
  KEY `token` (`token`),
  KEY `expire` (`expire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='用户自动登录Token表';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
