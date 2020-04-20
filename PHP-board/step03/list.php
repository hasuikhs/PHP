<?php
session_start();

if ($_SESSION['user_id'] == ''){
    header('Location: login.php');
    exit;
}

$db_host = "127.0.0.1";
$db_user = "root";
$db_pass = "root";
$db_name = "DB_SIM_TRK";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die('cannot connect to mysql.');
mysqli_set_charset($conn, "utf8");
?>
<html>

<head>
    <link rel="stylesheet" href="../css/common.css">
</head>

<body>
    <div class="header">
        <h3>게시판 목록</h3>
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
                    <tr>
                        <th>번호</th>
                        <th>제목</th>
                        <th>작성자</th>
                        <th>조회수</th>
                        <th>작성일</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = " SELECT * FROM tb_boards ORDER BY no DESC ";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td><?= $row['no'] ?></td>
                                <td><a href="view.php?no=<?= $row['no'] ?>"><?= $row['bd_title'] ?></a></td>
                                <td><?= $row['bd_writer'] ?></td>
                                <td><?= $row['bd_hit'] ?></td>
                                <td><?= $row['bd_rgst_dt'] ?></td>
                            </tr>
                    <?php
                        }
                        mysqli_free_result($result);
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer">
        <p>Footer</p>
    </div>

</body>

</html>