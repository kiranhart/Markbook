<?php

session_start();

function isLoggedIn() {
	if (isset($_SESSION['user_id'])) {
		return true; 
	} else {
		return false;
	}
}

function userAccountType() {
	if (isLoggedIn()) {
		return $_SESSION['user_data']->accountype;
	} else {
		return -1;
	}
}

?>