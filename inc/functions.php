<?php

	function hasActiveUser(mysqli $Db) : bool {
		$user = mysqli_query($Db, "SELECT * FROM `clickdata` WHERE `Created` > DATE_SUB(NOW(), INTERVAL 5 MINUTE)");

		return mysqli_num_rows($user) > 0;
	}

	function getActiveUser(mysqli $Db) : array {
		$user = mysqli_query($Db, "SELECT * FROM `clickdata` WHERE `Created` > DATE_SUB(NOW(), INTERVAL 5 MINUTE)");

		return mysqli_fetch_assoc($user);
	}

	function addUser(mysqli $Db, string $remoteAddr) : void {
		mysqli_query($Db, "INSERT INTO `clickdata` (`RemoteAddress`, `Created`) VALUES ('{$remoteAddr}', NOW())");

		return;
	}

	function setActiveUserClicks(mysqli $Db, int $clicks, int $id) : void {
		mysqli_query($Db, "UPDATE `clickdata` SET `Clicks` = {$clicks} WHERE `ID` = {$id}");

		return;
	}
