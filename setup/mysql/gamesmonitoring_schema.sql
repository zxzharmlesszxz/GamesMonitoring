--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `adminid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(120) DEFAULT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`adminid`) USING BTREE,
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `mon_servers`
--

DROP TABLE IF EXISTS `servers`;
CREATE TABLE `servers` (
  `serverid` mediumint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `servername` varchar(50) NOT NULL DEFAULT 'unknow',
  `game` varchar(32) NOT NULL DEFAULT 'cs16',
  `mode` varchar(32) NOT NULL DEFAULT 'UNKNOWN',
  `addr` varchar(255) NOT NULL DEFAULT '0.0.0.0:00000',
  `map` varchar(255) NOT NULL DEFAULT 'no_image',
  `players` varchar(2) NOT NULL DEFAULT '0',
  `maxplayers` varchar(2) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `location` varchar(10) NOT NULL DEFAULT 'undefined',
  `steam` int(1) NOT NULL DEFAULT '0',
  `regdate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `new` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `site` varchar(255) NOT NULL DEFAULT '',
  `about` text NOT NULL,
  PRIMARY KEY (`serverid`),
  FULLTEXT KEY `map` (`map`),
  FULLTEXT KEY `addr` (`addr`),
  FULLTEXT KEY `players` (`players`),

) ENGINE=MyISAM DEFAULT CHARSET=utf8;

