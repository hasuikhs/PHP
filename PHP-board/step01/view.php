<?php
$db_host = "127.0.0.1";
$db_user = "root";
$db_pass = "root";
$db_name = "DB_SIM_TRK";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die('cannot connect to mysql.');
mysqli_set_charset($conn, "utf8");

$no = $_GET['no'];
?>
<html>

<head>
    <link rel="stylesheet" href="../css/common.css">
</head>

<body>
    <h3>목록</h3>
    <a href="./phpdev/">메뉴</a>
    <table border="1">
        <?php
        $query = " SELECT * FROM tb_boards WHERE no = " . $no;
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
        ?>
            <thead>
            </thead>
            <tbody>
                <tr>
                    <th>번호</th>
                    <td><?= $row['no'] ?></td>
                </tr>
                <tr>
                    <th>제목</th>
                    <td><?= $row['bd_title'] ?></td>
                </tr>
                <tr>
                    <th>작성자</th>
                    <td><?= $row['bd_writer'] ?></td>
                </tr>
                <tr>
                    <th>조회수</th>
                    <td><?= $row['bd_hit'] ?></td>
                </tr>
                <tr>
                    <th>작성일</th>
                    <td><?= $row['bd_rgst_dt'] ?></td>
                </tr>
                <tr>
                    <th>내용</th>
                    <td><?= $row['bd_content'] ?></td>
                </tr>
        <?php
            mysqli_free_result($result);
        }
        ?>
            </tbody>
    </table>
</body>

</html>