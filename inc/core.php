<?php

	global $Db;

	$Db = mysqli_connect('localhost', 'root', 'P@55word');
	mysqli_select_db($Db, 'CookieBase');

	$tblFound = false;
	$tables   = mysqli_fetch_all(mysqli_query($Db, "SHOW TABLES"));

	foreach ($tables as $tbl) {
		if ($tbl[0] === 'clickdata') {
			$tblFound = true;

			break;
		}
	}

	if (!$tblFound) {
		mysqli_query($Db, <<<SQL
CREATE TABLE `clickdata` (
	`ID` int unsigned not null auto_increment,
	`RemoteAddress` varchar(255) not null,
	`Created` datetime not null,
	`Clicks` int unsigned not null default 0,
	primary key (`ID`)
);
SQL);
	}

	require('functions.php');

	session_start();
