<?php
  $page_flag = 0;

  if (!empty($_POST['comfirm'])) {
    $page_flag = 1;
  } elseif (!empty($_POST['submit'])) {
    $page_flag = 2;
    include('container/mail_setting.php');
    include('container/data_setting.php');
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/enterstyle.css">

  <title>宿泊予約サイト</title>
</head>
<body>
  <?php if ($page_flag === 2) : ?>
    <?php include('container/complete.php'); ?>

  <?php elseif ($page_flag === 1) : ?>
    <?php include('container/confirm.php'); ?>

  <?php else : ?>
   <?php include('container/enter.php'); ?>

  <?php endif; ?>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>