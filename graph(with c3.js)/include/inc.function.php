<?php
function getClickData($conn, $ps = 0, $pe = 0)
{
    $query = " SELECT ad_date, click 
               FROM tb_amp_media_summary 
               WHERE media='total'";

    if ($ps != null && $pe != null) {
        $query = $query . " AND ad_date BETWEEN '" . $ps . "' AND '" . $pe . "' ";
    }
    $query = $query . " ORDER BY no";
    $result = mysqli_query($conn, $query);


    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $aRet['date'][] = $row['ad_date'];
            $aRet['click'][] = $row['click'];
        }
        mysqli_free_result($result);
    }

    $aRet['mal03'] = drawMAL($aRet['click'], 3);
    $aRet['mal05'] = drawMAL($aRet['click'], 5);

    return unshiftLabel($aRet);
}

function unshiftLabel($aData)
{
    array_unshift($aData['date'], "x");
    array_unshift($aData['click'], "click");
    array_unshift($aData['mal03'], "mal03");
    array_unshift($aData['mal05'], "mal05");

    return $aData;
}

function drawMAL($aRet, $day = 0)
{
    $aSize = count($aRet);
    for ($i = 0; $i < $aSize - ($day - 1); $i++) {
        $aTmp = array_slice($aRet, $i, $day);
        $aMAL[] = round(array_sum($aTmp) / $day);
    }

    for ($i = 0; $i < $day - 1; $i++) {
        array_unshift($aMAL, null);
    }
    
    return $aMAL;
}
