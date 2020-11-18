<!DOCTYPE HTML>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>予約データ</title>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/enterstyle.css">

</head>

<body>
  <?php
  $dsn = 'mysql:dbname=reservation;host=localhost';
  $user = 'root';
  $password = 'agito127@';
  $dbh = new PDO($dsn, $user, $password); //MySQLのデータベースに接続

  if (!$dbh) {
    exit('データベースに接続できませんでした。');
  }

  $result = mysql_select_db('reservation', $dbh);
  if (!$result) {
    exit('データベースを選択できませんでした。');
  }

  $result = mysql_query('SET NAMES utf8', $dbh);
  if (!$result) {
    exit('文字コードを指定できませんでした。');
  }

  $result = mysql_query('SELECT * FROM guestinfo', $dbh);
  while ($data = mysql_fetch_row($result)) {
    echo $data['name'];
  }

  $dbh = mysql_close($dbh);
  if (!$dbh) {
    exit('データベースとの接続を閉じられませんでした。');
  }
  // わわ

  ?>
</body>

</html>'