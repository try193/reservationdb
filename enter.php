<?php
$page_flag = 0;

if (!empty($_POST['comfirm'])) {
  $page_flag = 1;

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
} elseif (!empty($_POST['submit'])) {
  $page_flag = 2;

  $header = null;
  $subject = null;
  $text = null;
  $admin_subject = null;
  $admin_text = null;
  date_default_timezone_set('Asia/Tokyo');

  $header = "MIME-Version: 1.0\n";
  $header .= "From: HOTEL <uyan1931052@yahoo.co.jp>\n";
  $header .= "Reply-To: HOTEL <uyan1931052@gmail.com>\n";

  $subject = "予約ありがとうございます。";
  $text = "この度は、当宿泊施設にご予約頂き誠にありがとうございます。
    下記の内容で予約を受け付けました。\n\n";
  $text .= "予約日時：" . date("Y-m-d H:i") . "\n";
  $text .= "名前：" . $_POST['name'] . "\n";
  $text .= "住所：" . $_POST['add'] . "\n";
  $text .= "電話番号：" . $_POST['tell'] . "\n";
  $text .= "メールアドレス：" . $_POST['mail'] . "\n";
  $text .= "宿泊人数：" . $_POST['member'] . "\n";
  $text .= "宿泊日数：" . $_POST['day'];
  mb_send_mail($_POST['mail'], $subject, $text, $header);

  $admin_subject = "予約を受け付けました。";
  $admin_text = "下記の内容で予約を受け付けました。\n\n";
  $admin_text .= "予約日時：" . date("Y-m-d H:i") . "\n";
  $admin_text .= "名前：" . $_POST['name'] . "\n";
  $admin_text .= "住所：" . $_POST['add'] . "\n";
  $admin_text .= "電話番号：" . $_POST['tell'] . "\n";
  $admin_text .= "メールアドレス：" . $_POST['mail'] . "\n";
  $admin_text .= "宿泊人数：" . $_POST['member'] . "\n";
  $admin_text .= "宿泊日数：" . $_POST['day'];
  mb_send_mail('uyan1931052@gmail.com', $subject, $text, $header);
}

if (!empty($_POST['remake'])) {
  $page_flag = 0;
}
if (!empty($_POST['back'])) {
  $page_flag = 0;
  $_POST = null;
}

?>

<!DOCTYPE HTML>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>宿泊予約サイト</title>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/enterstyle.css">
  <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>

<body>
  <?php if ($page_flag === 2) : ?>
    <div confirm>
      <h1>予約が完了しました。</h1>
      <form method="post" action="">
        <input type="submit" name="back" value="予約画面に戻る">
      </form>
      <form method="post" action="enterdb.php">
        <input type="submit" value="データ参照">
      </form>

    </div>

  <?php elseif ($page_flag === 1) : ?>
    <h1>入力内容</h1>
    <form method="post" action="">

      <div class="confirm_contain">
        <div class="con">名前：<?php echo $_POST['name']; ?></div>
        <div class="con">住所：<?php echo $_POST['add']; ?></div>
        <div class="con">電話番号：<?php echo $_POST['tell']; ?></div>
        <div class="con">メールアドレス：<?php echo $_POST['mail']; ?></div>
        <div class="con">宿泊人数：<?php echo $_POST['member']; ?>人</div>
        <div class="con">宿泊日数：<?php echo $_POST['day']; ?>日</div>


      </div>
      <input type="submit" name="submit" value="予約">
      <input type="submit" name="remake" value="修正">

      <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
      <input type="hidden" name="add" value="<?php echo $_POST['add']; ?>">
      <input type="hidden" name="tell" value="<?php echo $_POST['tell']; ?>">
      <input type="hidden" name="mail" value="<?php echo $_POST['mail']; ?>">
      <input type="hidden" name="member" value="<?php echo $_POST['member']; ?>">
      <input type="hidden" name="day" value="<?php echo $_POST['day']; ?>">



    </form>

  <?php else : ?>
    <h1>予約フォーム</h1>

    <script>
      function check(form) {
        if (form.name.value == "") {
          alert("名前が入力されていません。");
          form.name.focus();
          return false;
        }
        if (form.add.value == "") {
          alert("住所が入力されていません。");
          form.add.focus();
          return false;
        }
        if (form.tell.value == "") {
          alert("電話番号が入力されていません。");
          form.tell.focus();
          return false;
        }

        if (form.mail.value == "") {
          alert("メールアドレスが入力されていません。");
          form.mail.focus();
          return false;
        }
        if (form.member.value == "") {
          alert("宿泊人数が選択されていません。");
          form.member.focus();
          return false;
        }
        if (form.day.value == "") {
          alert("宿泊日数が選択されていません。");
          form.day.focus();
          return false;
        }


        return true;
      }
    </script>

    <form method="POST" onsubmit="return check(this)" action="">

      <table>
        <tr>
          <th>名前</th>
          <th>
            <input type="text" name="name" value="<?php if (!empty($_POST['name'])) {
                                                    echo $_POST['name'];
                                                  } ?>">
          </th>
        </tr>
        <tr>
          <th>住所</th>
          <th>
            <input type="text" name="add" value="<?php if (!empty($_POST['add'])) {
                                                    echo $_POST['add'];
                                                  } ?>">
          </th>
        </tr>
        <tr>
          <th>電話番号</th>
          <th>
            <input type="text" name="tell" value="<?php if (!empty($_POST['tell'])) {
                                                    echo $_POST['tell'];
                                                  } ?>">
          </th>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <th>
            <input type="text" name="mail" value="<?php if (!empty($_POST['mail'])) {
                                                    echo $_POST['mail'];
                                                  } ?>">
          </th>
        </tr>
        <tr>
          <th>宿泊人数</th>
          <th>
            <select name="member">
              <option value="">選択してください</option>
              <?php for ($i = 1; $i <= 10; $i++) { ?>
                <option value="<?php echo $i ?>"><?php echo $i . '人' ?></option>
              <?php } ?>
            </select>
          </th>
        </tr>
        <tr>
          <th>宿泊日数</th>
          <th>
            <select name="day">
              <option value="">選択してください</option>
              <?php for ($i = 1; $i <= 10; $i++) { ?>
                <option value="<?php echo $i ?>"><?php echo $i . '日' ?></option>
              <?php } ?>
            </select>
          </th>
        </tr>

      </table>

      <div><input type="submit" name="comfirm" value="入力内容を確認"></div>
    </form>

  <?php endif; ?>
</body>

</html>