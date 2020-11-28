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