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
        foreach ($aAssign['list'] as $row) {
        ?>
            <tr>
                <td><?= $row['no'] ?></td>
                <td><a href="?mode=view&no=<?=$row['no']?>"><?=$row['bd_title']?></a></td>
                <td><?= $row['bd_writer'] ?></td>
                <td><?= $row['bd_hit'] ?></td>
                <td><?= $row['bd_rgst_dt'] ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>