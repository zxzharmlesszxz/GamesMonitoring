CREATE DATABASE IF NOT EXISTS `gamesmonitoring` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gamesmonitoring`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminid` int(10) UNSIGNED NOT NULL,
  `login` varchar(30) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(120) DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `gameid` int(11) NOT NULL,
  `shortname` varchar(32) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `modes`
--

CREATE TABLE `modes` (
  `modeid` int(11) NOT NULL,
  `shortname` varchar(32) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `servers`
--

CREATE TABLE `servers` (
  `serverid` mediumint(5) UNSIGNED NOT NULL,
  `servername` varchar(50) DEFAULT NULL,
  `addr` varchar(255) NOT NULL DEFAULT '0.0.0.0:00000',
  `status` tinyint(1) DEFAULT NULL,
  `regdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `game` varchar(32) DEFAULT NULL,
  `mode` varchar(32) DEFAULT NULL,
  `map` varchar(255) DEFAULT NULL,
  `players` tinyint(3) DEFAULT NULL,
  `maxplayers` varchar(2) DEFAULT NULL,
  `location` varchar(10) DEFAULT NULL,
  `steam` int(1) DEFAULT NULL,
  `new` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `site` varchar(255) DEFAULT NULL,
  `about` text,
  `vip` tinyint(1) DEFAULT NULL,
  `top` tinyint(5) DEFAULT NULL,
  `secureServer` tinyint(1) DEFAULT NULL,
  `passwordProtected` tinyint(1) DEFAULT NULL,
  `operatingSystem` varchar(32) DEFAULT NULL,
  `botNumber` tinyint(4) DEFAULT NULL,
  `version` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(10) UNSIGNED NOT NULL,
  `login` varchar(30) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(120) DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminid`) USING BTREE,
  ADD UNIQUE KEY `login` (`login`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`gameid`),
  ADD UNIQUE KEY `shortname` (`shortname`),
  ADD UNIQUE KEY `fullname` (`fullname`);

--
-- Indexes for table `modes`
--
ALTER TABLE `modes`
  ADD PRIMARY KEY (`modeid`),
  ADD UNIQUE KEY `shortname` (`shortname`),
  ADD UNIQUE KEY `fullname` (`fullname`);

--
-- Indexes for table `servers`
--
ALTER TABLE `servers`
  ADD PRIMARY KEY (`serverid`),
  ADD KEY `players` (`players`),
  ADD KEY `vip` (`vip`),
  ADD KEY `top` (`top`),
  ADD KEY `new` (`new`),
  ADD KEY `steam` (`steam`),
  ADD KEY `location` (`location`),
  ADD KEY `mode` (`mode`),
  ADD KEY `game` (`game`),
  ADD KEY `regdate` (`regdate`),
  ADD KEY `status` (`status`),
  ADD UNIQUE `top` (`top`);
ALTER TABLE `servers` ADD FULLTEXT KEY `addr` (`addr`);
ALTER TABLE `servers` ADD FULLTEXT KEY `map` (`map`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`) USING BTREE,
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `gameid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `modes`
--
ALTER TABLE `modes`
  MODIFY `modeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `servers`
--
ALTER TABLE `servers`
  MODIFY `serverid` mediumint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;