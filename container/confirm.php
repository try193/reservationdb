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
