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

  // UPDATE文を変数に格納
  $sql = "UPDATE guestinfo SET name=:name, address=:address, tell=:tell, mail=:mail member=:member, day=:day WHERE id=:id";

  // 更新する値と該当のIDは空のまま、SQL実行の準備をする
  $stmt = $dbh->prepare($sql);
 
  // 更新する値と該当のIDを配列に格納する
  $params = array(':name' => $_POST['name'],':address' => $_POST['address'],':tell' => $_POST['tell'],':mail' => $_POST['mail'],':member' => $_POST['member'],':day'=>$_POST['day'], ':id' => $_POST['id']);
 
  // 更新する値と該当のIDが入った変数をexecuteにセットしてSQLを実行
  $stmt->execute($params);
  
  // 更新完了のメッセージ
  echo '更新完了しました';
?>

<form method="post" action="admin_reservation.php">
  <input type="submit" value="データ管理画面に戻る">
</form>

