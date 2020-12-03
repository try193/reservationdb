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
// DELETE文を変数に格納
  $sql = "DELETE FROM guestinfo WHERE id = :id";
// 削除するレコードのIDは空のまま、SQL実行の準備をする
  $stmt = $dbh->prepare($sql);
// 削除するレコードのIDを配列に格納する
$params = array(':id'=>$_POST['id']);
// 削除するレコードのIDが入った変数をexecuteにセットしてSQLを実行
$stmt->execute($params);
// 削除完了のメッセージ
echo '削除完了しました';

?>

<form method="post" action="admin_reservation.php">
  <input type="submit" value="データ管理画面に戻る">
</form>
