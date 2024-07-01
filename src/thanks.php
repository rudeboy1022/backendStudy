<?php
session_start();


unset($_SESSION['formData']);
unset($_SESSION['errData']);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>送信完了｜COMPASS</title>
  <meta name="description" content="送信完了のページです。｜求職者と企業のベストマッチを。経験豊富な人事コンサルタントがサポート。">
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width,initial-scale=1.0 maximum-scale=1.0,user-scalable=no">
  <link rel="stylesheet" href="./css/app.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>

<body>
  <header class="gnavi flex_center" id="header">
    <div class="gnavi_box flex_wrap">
      <div class="logo_box"><a href="./index.html"><img class="logo" src="./img/compasslogo.svg"></a>
        <p4 class="logotext">求職者と企業のベストマッチを。<br>経験豊富な人事コンサルタントがサポート。</p4>
      </div>
    </div>
  </header>
  <div class="flex_center" id="p_form_confirmation_fix_kv">
    <div class="p_form_confirmation_fix_kv_text">
      <h2>送信完了</h2>
      <p3>
        メールの送信が完了しました。ありがとうございました。受付確認のメールが届かない場合は、お客様にご⼊⼒いただいたメールアドレスに誤りがある可能性が考えられます。
        ご確認の上、再度送信してください。
        お問い合わせいただいた内容につきましては、近日中にお返事をさせていただきます。
      </p3>
    </div>
    <div class="p_form_confirmation_fix_kv_btn flex_center"><a class="btn02" href="./">
        <p class="mail_icon">
          <p3>トップへ戻る</p3>
        </p>
      </a></div>
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