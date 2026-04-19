<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>山本妃夏のポートフォリオ</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo $path; ?>assets/css/style.css">

  <?php if (file_exists(__DIR__ . '/../assets/img/favicon.png')): ?>
    <link rel="icon" href="<?php echo $path; ?>assets/img/favicon.png">
    <link rel="apple-touch-icon" href="<?php echo $path; ?>assets/img/favicon.png">
  <?php endif; ?>
  <meta name="robots" content="noindex, nofollow">
  <meta name="description" content="山本妃夏のポートフォリオ">
  <meta name="keywords" content="山本妃夏,ポートフォリオ,山本妃夏のポートフォリオ">
  <meta name="author" content="山本妃夏">
  <meta name="robots" content="index, follow">
  <meta name="google" content="notranslate">

</head>

<header class="header">
  <div class="header__inner">
    <button type="button" class="nav__toggle" aria-expanded="false" aria-controls="nav-menu" aria-label="メニューを開く">
      <span class="nav__toggle-bar"></span>
      <span class="nav__toggle-bar"></span>
      <span class="nav__toggle-bar"></span>
    </button>
    <nav id="nav-menu" class="nav__menu" aria-hidden="true">
      <ul>
        <li><a href="<?php echo $path; ?>index.php#top">Home</a></li>
        <li><a href="<?php echo $path; ?>index.php#about">About</a></li>
        <li><a href="<?php echo $path; ?>index.php#skills">Skills</a></li>
        <li><a href="<?php echo $path; ?>index.php#works">Works</a></li>
      </ul>
    </nav>
  </div>
</header>

<body>