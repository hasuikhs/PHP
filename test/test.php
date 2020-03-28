<?php

ini_set('memory_limit', '-1');

require_once __DIR__ . '/vendor/autoload.php';

$excelFileName = 'test01.xlsx';
$oSpreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($excelFileName);

$sheetsCount = $oSpreadsheet->getSheetCount();

for ($sheet = 0 ; $sheet < $sheetsCount; $sheet++) {
    $oSpreadsheet->setActiveSheetIndex($sheet);
    $oSheet = $oSpreadsheet->getActiveSheet();
    $sheetName = $oSheet->getTitle();
    $sheetState = $oSheet->getSheetState();

    echo $sheet . "\t" . $sheetName . "\t" . $sheetState . PHP_EOL;

    $highestRow     = $oSheet->getHighestRow();
    $highestColumn  = $oSheet->getHighestColumn();

    echo "Parse:" . $highestRow ."\t". $highestColumn. PHP_EOL;
 
    $aColumns = makeColumns();
    $hColumns = array_flip($aColumns);

    $aDataHeader = array();

    $maxIndex = $hColumns[$highestColumn];
    
    $curRow = 3;
    for($i = 1; $i <= $maxIndex; $i++) {
        $strCellPos = $aColumns[$i].$curRow;
        $val = $oSheet->getCell($strCellPos)->getValue();
        $aDataHeader[] = $val;
    }

    $aDataValues = array();
    $curRow++;

    while ($curRow <= $highestRow) {
        $aData = array();
        for ($i = 1; $i <= $maxIndex; $i++) {
            $strCellPos = $aColumns[$i].$curRow;
            $val = $oSheet->getCell($strCellPos)->getValue();
            
            if ($i == 1) {  // 첫번째 열에는 날짜가 들어 있으로 처리
                $val = fromExcelToLinux($val);
                $val = date('Y-m-d', $val);
            }
            $aData[] = $val;
        }
        $aDataValues[] = $aData;
        $curRow++;
    }

    

}

function makeColumns() {
    $aColumns = array();
    for ($i = 0; $i < 26; $i++)
        $aColumns[] = chr(65 + $i);

    return $aColumns;
}

function fromExcelToLinux($excel_time){
    return ($excel_time - 25569) * 86400;
}
?>