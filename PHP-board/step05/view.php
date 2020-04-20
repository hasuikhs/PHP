<?php
session_start();

if ($_SESSION['user_id'] == '') {  // 추가(step03)
    header('Location: login.php');
    exit;
}

if (strpos($_SESSION['priv'], 'R') === false) { // 세션의 priv에 R이 없다면 priv.php로 이동(step04) 
    header('Location: priv.php');
    exit;
}

$db_host = "127.0.0.1";
$db_user = "root";
$db_pass = "root";
$db_name = "DB_SIM_TRK";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die('cannot connect to mysql.');
mysqli_set_charset($conn, "utf8");

$no = $_GET['no'];

$query = " SELECT * FROM tb_boards WHERE no = " . $no;  // 24 ~ 31 라인 땡겨옴(step05)
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
}

$aAssign['view'] = $row;
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
            <table border='1'>
                <thead>
                </thead>
                <tbody>
                    <tr>
                        <th>번호</th>
                        <td><?= $aAssign['view']['no'] ?></td>
                    </tr>
                    <tr>
                        <th>제목</th>
                        <td><?= $aAssign['view']['bd_title'] ?></td>
                    </tr>
                    <tr>
                        <th>작성자</th>
                        <td><?= $aAssign['view']['bd_writer'] ?></td>
                    </tr>
                    <tr>
                        <th>조회수</th>
                        <td><?= $aAssign['view']['bd_hit'] ?></td>
                    </tr>
                    <tr>
                        <th>작성일</th>
                        <td><?= $aAssign['view']['bd_rgst_dt'] ?></td>
                    </tr>
                    <tr>
                        <th>내용</th>
                        <td><?= $aAssign['view']['bd_content'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer">
        <p>Footer</p>
    </div>
</body>

</html>