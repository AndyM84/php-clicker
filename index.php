<?php

	require('inc/core.php');

	global $Db;

	if (isset($_POST['action'])) {
		switch ($_POST['action']) {
			case 'increment':
				if (!hasActiveUser($Db)) {
					$msg = "Nobody here yet!";

					break;
				}

				$_SESSION['clicks']++;

				setActiveUserClicks($Db, $_SESSION['clicks'], $_SESSION['userId']);

				break;

			case 'capture':
				if (!hasActiveUser($Db)) {
					addUser($Db, $_SERVER['REMOTE_ADDR']);
					$user = getActiveUser($Db);

					$_SESSION['userId'] = $user['ID'];
					$_SESSION['clicks'] = $user['Clicks'];
				} else {
					$msg = 'You cannot click yet, wait your turn.';

					break;
				}

				break;
		}
	}

	require('templates/index.php');
