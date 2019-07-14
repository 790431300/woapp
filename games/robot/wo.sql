SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `robot`;
CREATE TABLE `robot` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `uid` int(16) DEFAULT NULL,
  `i` text,
  `time` text,
  `ip` text,
  `robot` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `robotmsg`;
CREATE TABLE `robotmsg` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `i` text,
  `robot` text,
  `class` text,
  `qt` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `robotmsg` (`id`, `i`, `robot`, `class`, `qt`) VALUES
(1,	'你好',	'我还好',	'text',	NULL),
(2,	'在干嘛',	'在和你聊天呀',	'text',	NULL),
(3,	'你叫什么名字',	'我叫人工智障',	'text',	NULL);