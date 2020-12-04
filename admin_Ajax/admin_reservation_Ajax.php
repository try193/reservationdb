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
        <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
        <th><?php echo $row['id']; ?></th>
        <th><input type="text" id="name" name="name" value="<?php echo $row['name']; ?>"></th>
        <th><input type="text" id="address" name="address" size='30' value="<?php echo $row['address']; ?>"></th>
        <th><input type="text" id="tell" name="tell" value="<?php echo $row['tell']; ?>"></th>
        <th><input type="text" id="mail" name="mail" size='30' value="<?php echo $row['mail']; ?>"></th>
        <th><input type="text" id="member" name="member" size='5' value="<?php echo $row['member']; ?>"></th>
        <th><input type="text" id="day" name="day" size='5' value="<?php echo $row['day']; ?>"></th>
        <th><input type="button" id="modify-btn" value="変更"></th>
        <th><input type="button" id="delete-btn" value="削除"></th>
      </tr>
      <?php } ?>
    </table>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(function(){
  $('#modify-btn').on('click',function(){
    var id=$('#id').val();
    var name=$('#name').val();
    var address=$('#address').val();
    var tell=$('#tell').val();
    var mail=$('#mail').val();
    var member=$('#member').val();
    var day=$('#day').val();

    $.ajax({
      type:'POST',
      url:"modify_reservation_Ajax.php",
      data:{
        id:id,
        name:name,
        address:address,
        tell:tell,
        mail:mail,
        member:member,
        day:day
      },
      success:function(data){
        if(data.match(/success/)){
          alert("予約内容を変更しました。");
          location.href="admin_reservation_Ajax.php";
        }
      },
      error:function(){
        alert("予期せぬエラーが発生しました。");
      }
    });
  });

  $('#delete-btn').on('click',function(){
    var id=$('#id').val();
    var name=$('#name').val();
    var address=$('#address').val();
    var tell=$('#tell').val();
    var mail=$('#mail').val();
    var member=$('#member').val();
    var day=$('#day').val();

    $.ajax({
      type:'POST',
      url:"delete_reservation_Ajax.php",
      data:{
        id:id,
        name:name,
        address:address,
        tell:tell,
        mail:mail,
        member:member,
        day:day
      },
      success:function(data){
        if(data.match(/success/)){
          alert("予約内容を変更しました。");
          location.href="admin_reservation_Ajax.php";
        }
      },
      error:function(){
        alert("予期せぬエラーが発生しました。");
      }
    });
  });

});
</script>

