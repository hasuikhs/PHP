<?php
function getClickData($conn)
{
    $query = " SELECT ad_date, click 
               FROM tb_amp_media_summary 
               WHERE media='total' 
               ORDER BY no ";
    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $aRet['date'][] = $row['ad_date'];
            $aRet['click'][] = $row['click'];
        }
        mysqli_free_result($result);
    }
    return $aRet;
}

function getPeriodClickData($conn, $ps, $pe)
{
    $query = " SELECT ad_date, click 
               FROM tb_amp_media_summary 
               WHERE media='total' 
                   AND ad_date BETWEEN " . $ps . " AND " . $pe . 
               " ORDER BY no";
    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $aRet['date'][] = $row['ad_date'];
            $aRet['click'][] = $row['click'];
        }
        mysqli_free_result($result);
    }
    return $aRet;
}
