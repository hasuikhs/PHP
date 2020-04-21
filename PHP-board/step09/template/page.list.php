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