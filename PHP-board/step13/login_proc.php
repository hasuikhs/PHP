<?php
include __DIR__ . '/include/inc.common.php';

$user_id = $_GET['user_id'];

switch ($user_id) {
	case 'admin':
		$_SESSION['user_id'] = 'admin';
		$_SESSION['priv']    = 'LRW';	// 추가(step04) L : List, R : Read, W : Write
		break;

	case 'user':
		$_SESSION['user_id'] = 'user';
		$_SESSION['priv']	 = 'LR';	// 추가(step04)
		break;

	case 'guest':
		$_SESSION['user_id'] = 'guest';
		$_SESSION['priv']	 = 'L';		// 추가(step04)
		break;
}

Header('Location: ./');