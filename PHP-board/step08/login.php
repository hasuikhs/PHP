<?php
// session_start();
include __DIR__ . '/include/inc.common.php';
?>
<html>

<head>
    <link rel="stylesheet" href="../css/common.css">
</head>

<body>
    <div class="header">
        <h3>게시판 보기</h3>
    </div>

    <div class="topnav">
        <a href='../'>메뉴</a>
    </div>

    <div class="row">
        <div class="column side">
            <h2>Side</h2>
        </div>

        <div class="column middle">
            <form name='f1' action='login_proc.php' method='GET'>
                <select name='user_id'>
                    <option value=''>아이디를 선택</option>
                    <option value='admin'>관리자</option>
                    <option value='user'>사용자</option>
                    <option value='guest'>손님</option>
                </select>
                <input type='submit'>
            </form>
        </div>
    </div>

    <div class="footer">
        <p>Footer</p>
    </div>
</body>