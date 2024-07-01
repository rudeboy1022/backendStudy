<?php

require_once('values.php');
require_once('validation.php');

session_start();

$prefectures = getPrefectures();
$jobCategories = getJobCategories();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $_SESSION['data'] = getSanitizedData($_POST);
  $data = $_SESSION['data'];

  $validation = new Validation($_SESSION['data']);
  $_SESSION['errors'] = $validation->validateData();

  $errors = $_SESSION['errors'];

  if (!empty(array_filter($errors))) {
    header('Location:http://localhost:8080');
  }
}

function getSanitizedData($post)
{
  $data = [];
  if (!empty($post)) {
    foreach ($post as $key => $value) {
      $data[$key] = sanitize($value);
    }
    $data['birthday'] = ['year' => $data['birthday_year'], 'month' => $data['birthday_month'], 'day' => $data['birthday_day']];
    return $data;
  }
}

function sanitize($data)
{
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>入力内容確認画面｜COMPASS</title>
  <meta name="description" content="入力内容確認画面のページです。｜求職者と企業のベストマッチを。経験豊富な人事コンサルタントがサポート。">
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width,initial-scale=1.0 maximum-scale=1.0,user-scalable=no">
  <link rel="stylesheet" href="./css/app.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>

<body>
  <?php


  ?>
  <header class="gnavi flex_center" id="header">
    <div class="gnavi_box flex_wrap">
      <div class="logo_box"><a href="./index.html"><img class="logo" src="./img/compasslogo.svg"></a>
        <p4 class="logotext">求職者と企業のベストマッチを。<br>経験豊富な人事コンサルタントがサポート。</p4>
      </div>
    </div>
  </header>
  <div class="flex_center" id="p_form_confirmation_kv">
    <div class="p_form_confirmation_kv_text">
      <h2>入力内容確認画面</h2>
      <p3>入力内容をご確認いただき、お間違いなければ送信ボタンを押してください。</p3>
    </div>
  </div>
  <div class="flex_center" id="p_form">
    <form name="lpForm" action="thanks.php" method="POST" accept-charset="">
      <dl class="form_block_cofirm">
        <dt class="form_ttl_confirm">
          <div>お名前</div>
        </dt>
        <dd class="form_content_confirm">
          <div class="lpForm-name"><?php echo $data['name'] ?></div>
        </dd>
      </dl>
      <dl class="form_block_cofirm">
        <dt class="form_ttl_confirm">
          <div>ふりがな</div>
        </dt>
        <dd class="form_content_confirm">
          <div class="lpForm-kana"><?php echo $data['kana'] ?></div>
        </dd>
      </dl>
      <dl class="form_block_cofirm">
        <dt class="form_ttl_confirm">
          <div>性別</div>
        </dt>
        <dd class="form_content_confirm">
          <div class="lpForm-q1"><?php echo $data['q1'] === '1' ? '男' : '女' ?></div>
        </dd>
      </dl>
      <dl class="form_block_cofirm">
        <dt class="form_ttl_confirm">
          <div>生年月日</div>
        </dt>
        <dd class="form_content_confirm">
          <div>
            <span class="lpForm-birthday_year">
              <?php echo $data['birthday_year'] . '年' ?>
            </span>
            <span class="lpForm-birthday_month">
              <?php echo $data['birthday_month'] . '月' ?>
            </span>
            <span class="lpForm-birthday_day">
              <?php echo $data['birthday_day'] . '日' ?>
            </span>
          </div>
        </dd>
      </dl>
      <dl class="form_block_cofirm">
        <dt class="form_ttl_confirm">
          <div>メールアドレス</div>
        </dt>
        <dd class="form_content_confirm">
          <div class="lpForm-mail"><?php echo $data['mail'] ?></div>
        </dd>
      </dl>
      <dl class="form_block_cofirm">
        <dt class="form_ttl_confirm">
          <div>電話番号</div>
        </dt>
        <dd class="form_content_confirm">
          <div class="lpForm-phone"><?php echo $data['phone'] ?></div>
        </dd>
      </dl>
      <dl class="form_block_cofirm">
        <dt class="form_ttl_confirm">
          <div>希望勤務地</div>
        </dt>
        <dd class="form_content_confirm">
          <div class="lpForm-place">
            <?php foreach ($prefectures as $prefecture) {
              if ($prefecture->id == $data['place']) {
                echo $prefecture->name;
              }
            } ?>
          </div>
        </dd>
      </dl>
      <dl class="form_block_cofirm">
        <dt class="form_ttl_confirm">
          <div>希望職種</div>
        </dt>
        <dd class="form_content_confirm">
          <div class="lpForm-jobType">
            <?php
            foreach ($jobCategories as $category) {
              if ($category->id == $data['jobType']) {
                echo $category->name;
              }
            }
            ?>
          </div>
        </dd>
      </dl>
      <dl class="form_block_cofirm">
        <dt class="form_ttl_confirm">
          <div>ご質問・ご要望など</div>
        </dt>
        <dd class="form_content_confirm">
          <div class="lpFormBr-body"><?php echo $data['body'] ?></div>
        </dd>
      </dl>
      <div class="flex_center">
        <div class="form_btn_comfirm"><a class="btn04 btn_mar" href="/">
            <p class="mail_icon">
              <p3>修正する</p3>
            </p>
          </a>
          <button class="btn05" type="submit" name="submit_type" value="send">
            <p class="mail_icon">
              <p3>送信する</p3>
            </p>
          </button>
        </div>
      </div>
    </form>
  </div>
  <footer>
    <div class="f_back_wrap"><a href="#header" data-trigger-totop="trigger">
        <div class="f_back flex_center"><i class="fa fa-angle-up fa-2x" aria-hidden="true"></i></div>
      </a></div>
    <div class="f_blue">
      <div class="f_blue_wrap flex_wrap">
        <div class="f_logo_box">
          <div class="f_logo_box_logo"><img class="f_logo" src="./img/compasslogo_w.svg">
            <div class="f_logo_box_text">
              <p4>求職者と企業のベストマッチを。<br>経験豊富な人事コンサルタントがサポート。</p4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="f_black flex_center">
      <p4>© 2017 株式会社Compass　All Rights Reserved.</p4>
    </div>
  </footer>
</body>

</html>