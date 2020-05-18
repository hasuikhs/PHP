# TUI GRID

- [튜토리얼](https://github.com/nhn/tui.grid/tree/master/packages/toast-ui.grid/docs/ko)

## 0. 사전 준비

- npm을 이용한 설치 방법

  ```bash
  $ npm install --save tui-grid
  ```

- CDN 이용방법

  ```html
  <link rel="stylesheet" href="https://uicdn.toast.com/tui-grid/latest/tui-grid.css" />
  ...
  <script src="https://uicdn.toast.com/tui-grid/latest/tui-grid.js"></script>
  ```


## 1. Grid 기본

### 1.1 생성하기

- HTML

  - TOAST UI Grid가 생성될 컨테이너 엘리먼트 생성

  ```html
  <div id="grid"></div>
  ```

- JavaScript

  - 생성자를 이용해 Grid 인스턴스 생성

  - **브라우저 환경에서 이용**

    ```javascript
    var Grid = tui.Grid
    ```

  - **Node 환경의 모듈 포멧 이용**

    ```javascript
    import Grid from 'tui-grid'; // ES6+
    ```

### 1.2 필수 옵션

- `el` : 그리드가 생성될 컨테이너 HTML 엘리먼트
- `columns` : 데이터의 이름, 헤더, 에디터 등의 컬럼 정보 배열

```javascript
import Grid from 'tui-grid'

const grid = new Grid({
    el : document.getElementById('grid'),	// 위의 HTML div ID
    columns: [
        // ...
    ],
    // ...
})
```

### 1.3 컬럼 모델 정의

- `setColumns()`

  - `header` : 컬럼 헤더에 사용
  - `name` : 필수 속성으로 로우 데이터의 키로 사용
  - `editor` : 컬럼의 인풋 타입을 결정

  ```javascript
  grid.setColumns([
      {
          header: 'ID',
          name: 'id'
      },
      {
          header: 'CITY',
          name: 'city',
          editor: 'text'
      }
  ])
  ```

  ```javascript
  const grid = new Grid({
  	el: document.getElementById('wrapper'),
  	columns: [
  		{
  			header: 'ID',
  			name: 'id'
  		},
          // ...
        ],
        // ...
  })
  ```

### 1.4 데이터 입력

- 컬럼 모델을 정의했다면 Grid에 데이터를 입력 가능

```javascript
const gridData = [
	{
		id: '10012',
        city: 'Seoul',
        country: 'South Korea'
	},
	{
		id: '10013',
        city: 'Tokyo',
        country: 'Japan'    
	},
	{
    	id: '10014',
    	city: 'London',
    	country: 'England'
	},
	{
    	id: '10015',
    	city: 'Ljubljana',
    	country: 'Slovenia'
	},
	{
		id: '10016',
    	city: 'Reykjavik',
    	country: 'Iceland'
	}
]
```

- `data` 옵션 사용

  ```javascript
  const grid = new Grid({
    el: document.getElementById('wrapper'),
    data,
    ...
  });
  ```

- `resetData()` 이용

  ```javascript
  grid.resetData(data)
  ```

### 1.5 소스 코드

```html
<head>
    <!-- grid -->
    <link rel="stylesheet" href="https://uicdn.toast.com/tui-grid/latest/tui-grid.css" />
    <script src="https://uicdn.toast.com/tui-grid/latest/tui-grid.js"></script>
</head>

<body>
    <div id="grid"></div>
</body>
<script>
    const gridData = [
        {
            id: '10012',
            city: 'Seoul',
            country: 'South Korea'
        },
        {
            id: '10013',
            city: 'Tokyo',
            country: 'Japan'
        },
        {
            id: '10014',
            city: 'London',
            country: 'England'
        },
        {
            id: '10015',
            city: 'Ljubljana',
            country: 'Slovenia'
        },
        {
            id: '10016',
            city: 'Reykjavik',
            country: 'Iceland'
        }
    ];

    const grid = new tui.Grid({
        el: document.getElementById('grid'),
        data: gridData,
        scrollX: false,
        scrollY: false,
        columns: [{
                header: 'ID',
                name: 'id'
            },
            {
                header: 'CITY',
                name: 'city'
            },
            {
                header: 'COUNTRY',
                name: 'country'
            }
        ]
    });
</script>
```

## 2. 복합 컬럼

- `header.complexColumns` : 여러 컬럼을 하나의 부모 헤더로 그룹 지음
  - `name`, `header` 외 추가로 `childNames` 옵션을 가져 기존의 컬럼을 추가

```javascript
const grid = new tui.Grid({
    el: document.getElementById('grid'),
    columns:[
        {
            header: 'col1',
            name: 'col1'
        },
        {
            header: 'col2',
            name: 'col2'
        },
        {
            header: 'col3',
            name: 'col3'
        }
    ],
    header: {
        complexColumns:[
            {
                header:'col1 + col2',
                name: 'parent1',
                childNames: ['col1', 'col2']
            },
            {
                header: 'col1 + col2 + col3',
                name: 'parent2',
                childNames: ['parent1', 'col3']
            }
        ]
    }
})
```

![image-20200516165541158](TUI_GRID.assets/image-20200516165541158.png)