<?php
include __DIR__ . '/include/inc.common.php';

checkLogin();
checkPriv('R');

$no = $_GET['no'];

$aAssign['view'] = getBoard($conn, $no);    // inc.function.php에서 불러옴

include __DIR__ . '/template/page.view.php';