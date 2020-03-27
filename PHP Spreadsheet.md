# PHP Spreadsheet

## 0. 사전 준비

### 0.1 Composer 설치

- [Composer 다운로드 및 설치](http://getcomposer.org/download )
  - **Install Shell Menus** 선택

### 0.2 php.ini 수정

- `세미콜론(;)` 제거

  ```
  extension=fileinfo
  extension=gd2
  extension=mbstring
  extension=openssl
  ```

## 1. 시작하기

### 1.1 설치

```bash
$ composer require phpoffice/phpspreadsheet
```

### 1.2 사용

```php
require_once '설치 경로/vendor/autoload.php';	// 위의 설치 경로 불러오기
```

## 2. Parsing

![image-20200327163351324](PHP Spreadsheet.assets/image-20200327163351324.png)

- 예제 Excel 파일은 위와 같음

### 2.1 File Load

```php
$excelFileName = 'test.xlsx';
$oSpreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($excelFileName);
```

### 2.2 Sheet Count

```php
$sheetsCount = $oSpreadsheet->getSheetCount();
```

### 2.3 Sheet 정보

```php
for ($sheet = 0; $sheet < $sheetsCount; $sheet++){
	$oSpreadsheet->setActiveSheetIndex($sheet);
	$oSheet = $oSpreadsheet->getActiveSheet();
	$sheetName = $oSheet->getTitle();
	$sheetState = $oSheet->getSheetState();
    
    echo $sheet . "\t" . $sheetName . "\t" . $sheetState . PHP_EOL;
}
```

- **setActivateSheetIndex(`$Sheetnumber`)** - Sheet 활성화

  ```php
  $oSpredsheet->setActivateSheetIndex($sheetnumber);
  ```

- **getActiveSheet()** - 활성화된 Sheet 가져오기

  ```php
  $oSheet = $oSpreadsheet->getActiveSheet();
  ```

- **getTitle()** - Sheet명

  ```php
  $sheetName = $oSheet->getTitle();
  ```

- **getSheetState()** - Sheet 상태

  ```php
  $sheetState = $oSheet->getSheetState();
  ```

### 2.4 마지막 행과 열 구하기

```php
$highestRow     = $oSheet->getHighestRow(); // 마지막 행
$highestColumn  = $oSheet->getHighestColumn(); // 마지막 컬럼

echo "highestRow : " . $highestRow ."\t highestColumn : ". $highestColumn. PHP_EOL;
// highestRow : 34	highestColumn : D
```

- **getHighestRow()** - 마지막 행

  ```php
  $highestRow = $oSheet->getHighestRow();
  ```

- **getHighestColumn()** - 마지막 열

  ```php
  $highestColumn = $oSheet->getHighestColumn();
  ```

### 2.5 표 데이터 Header 구하기

- Excel의 열은 숫자가 아닌 영문자이므로 변환을 해주어야 함

  - 사전 준비 함수

    ```php
    function makeColumns() {
        $aColumns = array();
        for ($i = 0; $i < 26; $i++){
            $aColumns[] = chr(65 + $i);
        }
    
        return $aColumns;
    }
    ```

  - 준비

    ```php
    $aColumns = makeColumns();
    /* 
    	array(0 => "A", 1 => "B", 2 => "C", ... , 25 => "Z")
    */
    $hColumns = array_flip($aColumns);
    /*
    	array('A' => 0, 'B' => 1, 'C' => 2, ... , 'Z' => 25)
    */
    ```

- Header 읽어오기

  ```php
  $aDataHeader = array();
  
  $maxIndex = $hColumns[$highestColumn];
  $curRow = 3;	// 예제 Excel 파일 표 데이터의 header가 존재하는 행
  
  for($i = 1; $i <= $maxIndex; $i++){
      $strCellPos = $aColumns[$i].$curRow;	// B3, C3, D3
      $val = $oSheet->getCell($strCellPos)->getValue();	// 해당 Cell의 값
      $aDataHeader[] = $val;
  }
  
  var_dump($aDataHeader);
  ```

  ```
  array(3) {
    [0] =>
    string(4) "Date"
    [1] =>
    string(7) "필드1"
    [2] =>
    string(7) "필드2"
  }
  ```



```php
<?php
/**
 * @FileName : class.LenovoBrandParserV1.php
 * @Date : 2020-03-12
 * @작성자 : Young
 * @변경이력 :
 * @프로그램 설명 : 
    2020-03-23: 201901 ~ 201906 처리
 */

ini_set('memory_limit', '-1');

require_once __DIR__ . '/../vendor/autoload.php';

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
    for($i = 1; $i <= $maxIndex; $i++){
        $strCellPos = $aColumns[$i].$curRow;
        $val = $oSheet->getCell($strCellPos)->getValue();
        $aDataHeader[] = $val;
    }
    var_dump($aDataHeader);
}

function makeColumns() {
    $aColumns = array();
    for ($i = 0; $i < 26; $i++)
        $aColumns[] = chr(65 + $i);

    return $aColumns;
}
?>
```

```php
<?php
/**
 * @FileName : class.LenovoBrandParserV1.php
 * @Date : 2020-03-12
 * @작성자 : Young
 * @변경이력 :
 * @프로그램 설명 : 
    2020-03-23: 201901 ~ 201906 처리
 */

ini_set('memory_limit', '-1');

require_once __DIR__ . '/../vendor/autoload.php';
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
    echo $strField ."\t" . implode(',', $arrValues) . PHP_EOL;
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
```





