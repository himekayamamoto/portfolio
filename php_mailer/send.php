<?php
$store = '山本妃夏のポートフォリオ';  // ここにサイト名

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

session_start();
error_log('Form submission started');

if (!isset($_POST['token'])) {
  error_log('Token missing');
  echo '不正なアクセスの可能性があります';
  exit;
}

if (!isset($_SESSION['key'])) {
  error_log('Session key missing');
  echo 'セッションエラーです';
  exit;
}

if ($_SESSION['key'] !== $_POST['token']) {
  error_log('Token mismatch');
  echo '不正なアクセスの可能性があります';
  exit;
}

error_log('Token validation passed');
error_log('POST data: ' . print_r($_POST, true));

$name = $_POST['name'];
$email = $_POST['email'];
$text = $_POST['text'];

require 'vendor/autoload.php';
require 'vendor/phpmailer/phpmailer/language/phpmailer.lang-ja.php';

// .envファイルが存在する場合のみ読み込み
if (file_exists(__DIR__ . '/.env')) {
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  $dotenv->load();
}

mb_language('japanese');
mb_internal_encoding('UTF-8');

$mail = new PHPMailer(true);
$mail->CharSet = 'iso-2022-jp';
$mail->Encoding = '7bit';
$mail->setLanguage('ja', 'vendor/phpmailer/phpmailer/language/');

try {
  $mail->isSMTP();
  $mail->Host = $_ENV['MAIL_HOST'] ?? 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = $_ENV['MAIL_USER'] ?? 'test@example.com';
  $mail->Password = $_ENV['MAIL_PASSWORD'] ?? '';
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port = 587;
  $mail->setFrom($_ENV['MAIL_USER'] ?? 'test@example.com', mb_encode_mimeheader('送信専用アドレス'));
  // 受信者アドレス, 受信者名（受信者名はオプション）
  $mail->addAddress($_ENV['SEND_TO'] ?? 'admin@example.com', mb_encode_mimeheader($store));

  $mail->isHTML(true);
  $mail->Subject = mb_encode_mimeheader(($_ENV['SEND_TO_NAME'] ?? 'システム') . 'からお問い合わせが届きました');
  $mail->Body = mb_convert_encoding("
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━<br>
【 お名前 】<br>
{$name}<br>
<br>
【 メール 】<br>
{$email}<br>
<br>
【 お問い合わせ内容 】<br>
{$text}<br>
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━", 'JIS', 'UTF-8');

  $mail->send();  // 送信

  echo '<div class="form">
  <div class="box">
    <div class="form-confirm">
      <h4>お問い合わせ完了</h4>
      <p>お問い合わせありがとうございました。<br>
      折り返しの連絡をお待ちください。</p>
    </div> 
  </div>
</div>';
} catch (Exception $e) {
  echo "メール送信に失敗しました. Mailer Error: {$mail->ErrorInfo}";
}
?>