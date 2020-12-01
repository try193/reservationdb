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

<?php
  $page_flag = 0;
  if (!empty($_POST['data_modify'])) {
    $page_flag = 1;
  }
  if (!empty($_POST['back'])) {
    $page_flag = 0;
  }
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
      <form method="post" action="">
            <input type="submit" name="data_modify" value="データ修正">
      </form>
      
      <?php if ($page_flag === 1) : ?>
        <?php include('modify_reservation.php'); ?>
      
      <?php else : ?>
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
            <th><?php echo $row['id']; ?></th>
            <th><?php echo $row['name']; ?></th>
            <th><?php echo $row['address']; ?></th>
            <th><?php echo $row['tell']; ?></th>
            <th><?php echo $row['mail']; ?></th>
            <th><?php echo $row['member']; ?></th>
            <th><?php echo $row['day']; ?></th>
          </tr>
        
          <?php } ?>
        
        </table>
        
      
      <?php endif; ?>
  
</body>
</html>


