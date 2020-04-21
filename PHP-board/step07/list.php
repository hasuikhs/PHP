<?php
session_start();    // 추가(step03)

include __DIR__ . '/inc.common.php';    // 공통 부분 포함(step06)

if ($_SESSION['user_id'] == '') {    // 세션의 user_id가 공백이면 login.php로 이동(step03)
    header('Location: login.php');
    exit;
}

if (strpos($_SESSION['priv'], 'L') === false) {  // 세션의 priv에 L이 없다면 priv.php로 이동(step04)
    header('Location: priv.php');
    exit;
}

// inc.function.php로 이동 (step06)
// $query = " SELECT * FROM tb_boards ORDER BY no DESC ";  // 22 ~ 29 라인 땡겨옴 (step05)
// $result = mysqli_query($conn, $query);

// if ($result) {
//     while ($row = mysqli_fetch_assoc($result)) {
//         $aRet[] = $row;
//     }
//     mysqli_free_result($result);
// }
$aAssign['list'] = listBoard($conn);    // inc.function.php에서 불러옴
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
                    foreach ($aAssign['list'] as $row) {    // 로직 변경(step05)
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