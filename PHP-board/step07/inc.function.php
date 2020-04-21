<?php
function listBoard($conn) {
    $query = "SELECT * FROM tb_boards ORDER BY no DESC ";
    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $aRet[] = $row;
        }
        mysqli_free_result($result);
    }
    return $aRet;
}

function getBoard($conn, $no) {
    $query = " SELECT * FROM tb_boards WHERE no = " . $no;
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
    }
    return $row;
}

function addDebug($msg) {
    global $aDebugMsg;

    $aDebugMsg[] = $msg;
}