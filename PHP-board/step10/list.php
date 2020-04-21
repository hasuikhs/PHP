<?php
include __DIR__ . '/include/inc.common.php';    // step08

checkLogin();
checkPriv('L');

$aAssign['list'] = listBoard($conn);    // inc.function.php에서 불러옴

// include __DIR__ . '/template/page.list.php';
$templateFile = 'content.list.php';
include __DIR__ . '/template/layout.default.php';