# PHP 게시판 만들기

- DataBase 구성

  ```sql
  CREATE DATABASE DB_SIM_TRK;
  ```

- TABLE 생성

  ```sql
  CREATE TABLE tb_boards(
  	no int auto_increment primary key,
      bd_title varchar(200),
      bd_content varchar(2000),
      bd_writer varchar(200),
      bd_hit int(10),
      bd_rgst_dt date
  );
  ```

- 내용 생성

  ```sql
  INSERT INTO tb_boards(bd_title, bd_content, bd_writer, bd_hit, bd_rgst_dt) 
  VALUES('디자인제작', '내용', '조재원', 9, '2020-04-20 11:37');
  ```

  