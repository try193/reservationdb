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
  $sql = "UPDATE guestinfo SET member=:member, day=:day WHERE id=:id";

  // 更新する値と該当のIDは空のまま、SQL実行の準備をする
  $stmt = $dbh->prepare($sql);
 
  // 更新する値と該当のIDを配列に格納する
  $params = array(':member' => '3',':day'=>'2', ':id' => '21');
 
  // 更新する値と該当のIDが入った変数をexecuteにセットしてSQLを実行
  $stmt->execute($params);
  
  // 更新完了のメッセージ
  echo '更新完了しました';
?>

<form method="post" action="">
  <input type="submit" name="back" value="データ管理画面に戻る">
</form>

