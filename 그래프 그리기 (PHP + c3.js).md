# 그래프 그리기 (PHP + c3.js)

## 1. `inc.common.php`

- `include/inc.common.php` 

  ```php
  <?php
  
  $db_host = "127.0.0.1";
  $db_user = "root";
  $db_pass = "root";
  $db_name = "DB_SIM_TRK";
  
  $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die('cannot connect to mysql.');
  mysqli_set_charset($conn, "utf8");
  
  include __DIR__ . '/inc.function.php';
  
  $aData = getClickData($conn);
  ```

## 2. `inc.function.php`

- `include/inc.function.php`

  ```php
  <?php
  // ps : 기간시작, pe : 기간마지막
  function getClickData($conn, $ps = 0, $pe = 0)
  {
      $query = " SELECT ad_date, click 
                 FROM tb_amp_media_summary 
                 WHERE media='total'";
  
      // ps, pe가 들어올 경우 실행되는 부분
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
      return unshiftLabel($aRet);
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
  
  function unshiftLabel($aData)
  {
      array_unshift($aData['date'], "x");
      array_unshift($aData['click'], "click");
  
      return $aData;
  }
  ```
  
  - `function($value1, $value2 = 0, $value3 = 0)`
    - 매개 변수를 선택적으로 지정하려면 해당 변수에서 `$변수 = 0`으로 처리
  - `array_unshift($array, value)`
    - `$array`배열의 맨 앞에 `value`를 넣을 수 있다.
    - `c3.js`에서는 데이터 배열의 처음에 라벨을 받음으로 처리 필요
## 3. `graph.php`

```php
<?php

include __DIR__ . '/./include/inc.common.php';

?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=EUC-KR">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<title>stat</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.11/c3.min.css" />

<body>
    <script src="https://d3js.org/d3.v3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.11/c3.min.js"></script>

    <input type="date" id="ps" />

    <input type="date" id="pe" />
    <button onclick="search()">검색</button>

    <div id="chart" />
    <script src="function.js"></script>
    <script>
    	// <?=는 <?php echo로 인식
    	// PHP에서 java 스크립트로 내올때는 echo를 붙여야지 원하는 데이터를 받을 수 있음
        var x_data = <?= json_encode($aData['date']); ?>;
        var click_data = <?= json_encode($aData['click']); ?>;

        chart(x_data, click_data)
    </script>
</body>
```

## 4. `function.js`

- c3에 들어가는 데이터의 형태는 다음과 같음

  ```json
  {
      "x" : ["x", "2020-01-01", "2020-01-02"],
      "impr" : ["impr", "1000", "2000"],
      "click" : ["click", "500", "1000"],
      ...
  }
  ```

- chart를 그려주는 함수

  ```javascript
  function chart(x_data, click_data) {
      var chart = c3.generate({
          bindto: '#chart',
          data: {
              x: 'x',
              columns: [
                  x_data,
                  click_data
              ],
              type: 'spline',
              connectNull: false
          },
          point: {
              show: false
          },
          axis: {
              x: {
                  type: 'timeseries',
                  tick: {
                      format: '%m-%d'
                  }
              }
          },
          zoom: {
              enabled: true
          }
      })
  }
  ```

- ajax로 기간이 입력될 때 데이터를 받아서 새로 그래프를 그리는 함수

  ```javascript
  function search() {
      $.ajax({
          url: "ajax.php",
          type: "get",
          data: {
              ps: $("#ps").val(),
              pe: $("#pe").val(),
          }
      }).done(function(data) {
          const obj = JSON.parse(data)
  
          x_data = obj.date
          click_data = obj.click
  
          chart(x_data, click_data)
  
      }).fail(function() {
          alert("올바르지 않은 요청")
      })
  }
  ```

  - `url` : 해당 페이지로 data를 파라미터 형태로 보냄
  
    ​         위 코드에서는 `ajax.php?ps=2020-04-01&pe=2020-04-04` 같은 형태
  
  - 성공시 해당 `ajax.php`에서 `echo`되는 `data` 를 받음

## 5. `ajax.php`

```php
<?php
$ps = $_GET['ps'];
$pe = $_GET['pe'];

include __DIR__ . "/include/inc.common.php";

$aData = getClickData($conn, $ps, $pe);

echo json_encode($aData);
```

- 위의 `ajax`에서 보낸 파라미터들을 `$_GET`으로 받음
- 결과를 `echo`로  `ajax`의 `done`으로 `data`로 보냄

