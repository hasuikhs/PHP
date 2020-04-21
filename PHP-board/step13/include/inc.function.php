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

function checkLogin() {
    if ($_SESSION['user_id'] == '') {
        header('Location: ./?mode=login');
        exit;
    }
}

function checkPriv($priv) {
    if (strpos($_SESSION['priv'], $priv) === false) {
        header('Location: ./?mode=priv');
        exit;
    }
}

function addDebug($msg) {
    global $aDebugMsg;

    $aDebugMsg[] = $msg;
}