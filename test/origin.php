<?php

ini_set('memory_limit', '-1');

require_once __DIR__ . '/vendor/autoload.php';
$excelFileName = 'test01.xlsx';

$oSpreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($excelFileName);

$sheetsCount = $oSpreadsheet->getSheetCount();
echo 'sheetsCount:' . $sheetsCount .PHP_EOL;
$aColumns = makeColumns();

$hColumns = array_flip($aColumns);
$aDictionary = array(
    'Date' =>'ad_date',
    '필드1'=>'f1',
    '필드2'	=>'f2'
);
for ($sheet = 0; $sheet < $sheetsCount; $sheet++) {
    $oSpreadsheet->setActiveSheetIndex($sheet);
    $oSheet = $oSpreadsheet->getActiveSheet();
    $sheetName = $oSheet->getTitle();
    $sheetState = $oSheet->getSheetState(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet::SHEETSTATE_HIDDEN);

    echo $sheet . "\t" . $sheetName . "\t" . $sheetState . PHP_EOL;

    parse($oSheet);
}

function parse($oSheet) {
    global $aColumns, $hColumns;
    $aDataColumns = array();
    $highestRow     = $oSheet->getHighestRow(); // 마지막 행
    $highestColumn  = $oSheet->getHighestColumn(); // 마지막 컬럼

    echo "Parse:" . $highestRow ."\t". $highestColumn. PHP_EOL;
    $maxIndex = $hColumns[$highestColumn];
    // Date
    $curRow=3;
    for($i=1;$i<=$maxIndex;$i++) 
    {
        $strCellPos = $aColumns[$i].$curRow;
        $val = $oSheet->getCell($strCellPos)->getValue();
        $aDataColumns[] = $val;
    }
    
    $aDataValues =array();
    $curRow++;
    while($curRow<=$highestRow) {
        $aData = array();
        for($i=1;$i<=$maxIndex;$i++) 
        {
            $strCellPos = $aColumns[$i].$curRow;
            $val = $oSheet->getCell($strCellPos)->getValue();
            if ($i==1) {
                $val = fromExcelToLinux($val);
                $val = date('Y-m-d', $val);
            }
            $aData[] = $val;
        }
        $aDataValues[] = $aData;
        $curRow++;
    }
    
    printSQLData($aDataColumns, $aDataValues);
}

function printData($aDataColumns, $aDataValues)
{
    echo implode("\t", $aDataColumns) . PHP_EOL;

    foreach ($aDataValues as $row)
        echo implode("\t", $row) . PHP_EOL;
}

function printSQLData($aDataColumns, $aDataValues)
{
    global $aDictionary;
    echo implode("\t", $aDataColumns) . PHP_EOL;
    $aFields = array();
    foreach ($aDataColumns as $f)
        $aFields[] = $aDictionary[$f];
    
    $strField = implode(',', $aFields);
    $arrValues = array();
    foreach ($aDataValues as $row) 
    {
        $strValue = "'" . implode("', '", $row) . "'";
        //echo $strField ."\t" . $strValue . PHP_EOL;
        $arrValues[] = "(" . $strValue . ")";
    }
    var_dump($strField ."\t" . implode(',', $arrValues) . PHP_EOL);
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