<?php 
  try {
      $dsn = 'mysql:dbname=reservation;host=localhost';
      $user = 'root';
      $password = 'agito127@';
      $dbh = new PDO($dsn, $user, $password); //MySQLのデータベースに接続
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示

      $sql = "INSERT INTO guestinfo (name,address,tell,mail,member,day) VALUES (:name,:address,:tell,:mail,:member,:day)";
      $stmt = $dbh->prepare($sql);
      $params = array(':name' => $_POST['name'], ':address' => $_POST['add'], ':tell' => $_POST['tell'], ':mail' => $_POST['mail'], ':member' => $_POST['member'], ':day' => $_POST['day']);
      $stmt->execute($params);
    } catch (PDOException $e) {
      exit('データベースに接続できませんでした。' . $e->getMessage());
    }

?>
