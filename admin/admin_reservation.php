<?php
  include('../reservation_data_info.php');
  try {
    // PDOインスタンスを生成
    $dbh = new PDO($dsn, $user, $password);
  // エラー（例外）が発生した時の処理を記述
  } catch (PDOException $e) {
    // エラーメッセージを表示させる
    echo 'データベースにアクセスできません！' . $e->getMessage();
    // 強制終了
    exit;
  }

  // idの降順でSELECT文を変数に格納
  $sql = "SELECT * FROM guestinfo ORDER BY id desc";
  // SQLステートメントを実行し、結果を変数に格納
  $stmt = $dbh->query($sql);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    table{
      border-collapse:collapse;
    }

    td,th{
      border:1px solid #000;
    }
  </style>
  <title>宿泊予約データ管理</title>
</head>
<body>
    <table>
      <tr>
        <th>id</th>
        <th>名前</th>
        <th>住所</th>
        <th>電話番号</th>
        <th>メールアドレス</th>
        <th>宿泊人数</th>
        <th>宿泊日数</th>
      </tr>
      
      <!-- foreach文で配列の中身を一行ずつ出力 -->
      <?php foreach ($stmt as $row) { ?>
      <!-- データベースのフィールド名で出力 -->
      <tr>
        <form method="post" action="modify_reservation.php">
          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
          <th><?php echo $row['id']; ?></th>
          <th><input type="text" name="name" value="<?php echo $row['name']; ?>"></th>
          <th><input type="text" name="address" value="<?php echo $row['address']; ?>"></th>
          <th><input type="text" name="tell" value="<?php echo $row['tell']; ?>"></th>
          <th><input type="text" name="mail" value="<?php echo $row['mail']; ?>"></th>
          <th><input type="text" name="member" value="<?php echo $row['member']; ?>"></th>
          <th><input type="text" name="day" value="<?php echo $row['day']; ?>"></th>
          <th><input type="submit" value="変更"></th>
        </form>
        <form method="post" action="delite_reservation.php">
          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
          <th><input type="submit" value="削除"></th>
        </form>
      </tr>
    
      <?php } ?>
    
    </table>
  
</body>
</html>


