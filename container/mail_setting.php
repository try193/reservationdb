<?php 

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

?>