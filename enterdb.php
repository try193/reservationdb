<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>予約データ</title>
  <style>
    table,
    td,
    th {
      border: 1px solid #000;
      padding: 5px;
      text-align: center;
    }
  </style>
</head>

<body>
  <form name="myForm" method="post" action="">
    <select id="code_selection" name="code">
      <option value="1">テーブル作成</option>
      <option value="2">テーブル一覧</option>
      <option value="3">テーブル削除</option>
    </select>
    <p><label>テーブル名</label><input type="text" name="name" placeholder="guestinfo" pattern="^[0-9A-Za-z]+$"></p>
    <p><input type="submit" value="実行"></p>
  </form>
  <?php
  try {
    if (isset($_POST['code']) == true) { //処理コードがあるか

      //データベースにアクセス
      $dsn = 'mysql:dbname=reservation;host=localhost';
      $user = 'root';
      $password = 'agito127@';
      $dbh = new PDO($dsn, $user, $password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      switch ($_POST['code']) { //処理コード別に処理
        case 1:            //データベースにテーブルを作成する処理
          if (isset($_POST['name']) == true) {
            //データベースに対して実行するSQL文を作成
            $sql = 'CREATE TABLE IF NOT EXISTS ' . $_POST['name'] . ' (id INT(11) NOT NULL auto_increment PRIMARY KEY,hogehoge TEXT) DEFAULT CHARSET="utf8"';
            //SQL文を実行
            $result = $dbh->query($sql);
          }
          break;
        case 2:            //データベースのテーブルを表示する処理
          print '<table><tr><th>№</th><th>テーブル名</th></tr>';
          if (isset($_POST['name']) == true) {
            //データベースに対して実行するSQL文を作成
            $sql = 'SHOW TABLES FROM test';
            //SQL文を実行
            $table_stmt = $dbh->prepare($sql);
            $table_stmt->execute();
            //行番号用変数を用意
            $i = 1;
            //データベースのテーブルすべて読み出すまでループ
            while ($table_rec = $table_stmt->fetch(PDO::FETCH_ASSOC)) {
              //連想配列すべてを読み出すまでループ
              foreach ($table_rec as $key => $val) {
                //番号とテーブル名とキーを表示
                print '<tr><td>' . $i . '</td><td>' . $val . '(' . $key . ')</td></tr>';
                $i += 1;
              }
            }
          }
          print '</table>';
          break;
      }
    }
  } catch (Exception $e) { //処理でエラーが発生した時はこちらを実行する
    print $e->getMessage();
  }
  ?>
</body>

</html>