<?php
// $templete = 'form';
// session_start() は index.php の先頭で実行済み（ヘッダー送信前に必要）

$token = sha1(uniqid(rand(), true));
$_SESSION['key'] = $token;

?>

<div class="form">

  <form method="post" class="validationForm" id="the-form" enctype="multipart/form-data">
    <div class="form__flex">
      <div class="form-box hissu">
        <div class="form-box-ttl">
          <label>お名前(仮名も可)</label>
        </div>
        <div class="form-box-content">
          <input type="text" name=" name" value="" class="maxlength required" data-maxlength="10">
        </div>
      </div>

      <div class="form-box hissu">
        <div class="form-box-ttl">
          <label>メールアドレス</label>
        </div>
        <div class="form-box-content form-box-content-mail">
          <input type="email" name=" email" value="" size="40" id="email" class="required email" placeholder="">
        </div>
      </div>

      <div class="form-box textbox">
        <div class="form-box-ttl">
          <label class="title">お問い合わせ内容</label>
        </div>
        <div class="form-box-content form-box-content-text">
          <textarea name="text" rows="11"></textarea>
        </div>
      </div>
    </div>
    <div class="form-submit">
      <input type="submit" value="送信する" class="submit-btn" id="submit">
      <input type="hidden" name="token" value="<?= $token ?>">
      <input type="hidden" name="recaptchaToken" id="recaptchaToken" value="">
    </div>
    <div class="space"></div>
  </form>



  <div id="form-load">
    <div class="load">
    </div>
    <div class="load1">
      <br>
      <div class="loader"></div>
      <p>送信中</p>
    </div>
  </div>
</div>

<!-- 結果メッセージ -->
<div id="result"></div><!-- /#result -->

<script src="https://www.google.com/recaptcha/api.js?render=6Le5LrgiAAAAAJJp2fncKXfGy8LqQ5bIYjDG0SKn"></script>
<script type="module" src="php_mailer/js/form.js"></script>