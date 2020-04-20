<?php
session_start();

$user_id = $_GET['user_id'];

switch ($user_id) {
	case 'admin':
		$_SESSION['user_id'] = 'admin';
		break;

	case 'user':
		$_SESSION['user_id'] = 'user';
		break;

	case 'guest':
		$_SESSION['user_id'] = 'guest';
		break;
}

Header('Location: ./');