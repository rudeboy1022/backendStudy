<?php

require_once('values.php');

session_start();

$data = isset($_SESSION['data']) ? $_SESSION['data'] : [];
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];

$prefectures = getPrefectures();
$jobCategories = getJobCategories();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>転職・就職サービスに関するお申し込み｜COMPASS</title>
  <meta name="description" content="転職・就職サービスに関するお申し込みのページです。｜求職者と企業のベストマッチを。経験豊富な人事コンサルタントがサポート。">
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
  <div class="flex_center" id="p_form_consumer_kv">
    <div class="p_form_consumer_kv_text">
      <h2>転職・就職サービスに関するお申し込み</h2>
      <p3>Compassのサービスにご関心をお寄せいただき、ありがとうございます。<br>下記フォームに内容をご記入の上、送信してください。担当アドバイザーよりご連絡いたします。</p3>
    </div>
  </div>
  <div class="flex_center" id="p_form">
    <form name="lpForm" action="confirm.php" method="POST" accept-charset="" data-form="concierge">
      <dl class="form_block">
        <dt class="form_ttl">
          <label for="name">お名前</label>
          <div class="require">必須</div>
        </dt>
        <dd class="form_content">
          <input class="form_text" id="name" type="text" name="name" placeholder="　例）山田　太郎" value="<?php echo !empty($data['name']) ? $data['name'] : ''; ?>">
          <span class="error"><?php echo !empty($errors['name']) ? $errors['name'] : ''; ?></span>
        </dd>
      </dl>
      <dl class="form_block">
        <dt class="form_ttl">
          <label>フリガナ</label>
          <div class="require">必須</div>
        </dt>
        <dd class="form_content">
          <input class="form_text" type="text" name="kana" placeholder="　例）ヤマダ　タロウ" value="<?php echo !empty($data['kana']) ? $data['kana'] : ''; ?>">
          <span class="error"><?php echo !empty($errors['kana']) ? $errors['kana'] : ''; ?></span>
        </dd>
      </dl>
      <dl class="form_block">
        <dt class="form_ttl">
          <label>性別</label>
          <div class="require">必須</div>
        </dt>
        <dd class="form_content">
          <div class="form_radio_box">
            <input type="hidden" name="q1" value="">
            <input type="radio" name="q1" value="1" <?php if (isset($data['q1']) && $data['q1'] == "1") echo "checked"; ?>> 男性
          </div>
          <div class="form_radio_box">
            <input type="radio" name="q1" value="2" <?php if (isset($data['q1']) && $data['q1'] == "2") echo "checked"; ?>> 女性
          </div>
          <span class="error"><?php echo !empty($errors['q1']) ? $errors['q1'] : ''; ?></span>
        </dd>
      </dl>
      <dl class="form_block">
        <dt class="form_ttl">
          <label>生年月日</label>
          <div class="require">必須</div>
        </dt>
        <dd class="form_birth">
          <div class="form_birth01">
            <select class="form_birth_box" name="birthday_year" data-trigger-selectbox="select">
              <option value="">--</option>
              <?php for ($i = 2000; $i <= 2024; $i++) : ?>
                <option value="<?= $i; ?>" <?php echo (isset($data['birthday_year']) && $data['birthday_year'] == $i) ? 'selected' : ''; ?>><?php echo $i . '年' ?></option>
              <?php endfor; ?>
            </select>
          </div>
          <div class="form_birth01">
            <select class="form_birth_box" name="birthday_month" data-trigger-selectbox="select">
              <option value="">--</option>
              <?php for ($i = 1; $i <= 12; $i++) : ?>
                <option value="<?= $i; ?>" <?php echo (isset($data['birthday_month']) && $data['birthday_month'] == $i) ? 'selected' : ''; ?>><?php echo $i . '月' ?></option>
              <?php endfor; ?>
            </select>
          </div>
          <div class="form_birth01">
            <select class="form_birth_box" name="birthday_day" data-trigger-selectbox="select">
              <option value="">--</option>
              <?php for ($i = 1; $i <= 31; $i++) : ?>
                <option value="<?= $i; ?>" <?php echo (isset($data['birthday_day']) && $data['birthday_day'] == $i) ? 'selected' : ''; ?>><?php echo $i . '日' ?></option>
              <?php endfor; ?>
            </select>
          </div>

          <span class="error"><?php echo !empty($errors['birthday']) ? $errors['birthday'] : ''; ?></span>
        </dd>
      </dl>
      <dl class="form_block">
        <dt class="form_ttl">
          <label>メールアドレス</label>
          <div class="require">必須</div>
        </dt>
        <dd class="form_content">
          <input class="form_text" type="email" name="mail" placeholder="　例）taro@compass.jp" value="<?php echo !empty($data['mail']) ? $data['mail'] : ''; ?>">
          <span class="error"><?php echo !empty($errors['mail']) ? $errors['mail'] : ''; ?></span>
        </dd>
      </dl>
      <dl class="form_block">
        <dt class="form_ttl">
          <label>電話番号</label>
          <div class="require">必須</div>
        </dt>
        <dd class="form_content">
          <input class="form_text" type="tel" name="phone" placeholder="　例）01234567890" value="<?php echo !empty($data['phone']) ? $data['phone'] : ''; ?>">
          <span class="error"><?php echo !empty($errors['phone']) ? $errors['phone'] : ''; ?></span>
        </dd>
      </dl>
      <dl class="form_block">
        <dt class="form_ttl">
          <label>希望勤務地</label>
          <div class="require">必須</div>
        </dt>
        <dd class="form_wish">
          <div class="form_wish01">
            <select class="form_wish_box" name="place" data-trigger-selectbox="select">
              <option value="">選択してください</option>
              <?php foreach ($prefectures as $prefecture) {
                $selected = ($prefecture->id == $data['place']) ? ' selected' : '';
                echo '<option value=' . $prefecture->id . $selected . '>' . $prefecture->name . '</option>';
              } ?>
            </select>
          </div>
          <span class="error"><?php echo !empty($errors['place']) ? $errors['place'] : ''; ?></span>
        </dd>
      </dl>
      <dl class="form_block">
        <dt class="form_ttl">
          <label>希望職種</label>
          <div class="require">必須</div>
        </dt>
        <dd class="form_wish">
          <div class="form_wish01">
            <select class="form_wish_box" name="jobType" data-trigger-selectbox="select">
              <option value="">選択してください</option>
              <?php foreach ($jobCategories as $jobCategory) {
                $selected = ($jobCategory->id == $data['jobType']) ? ' selected' : '';
                echo '<option value=' . $jobCategory->id . $selected . '>' . $jobCategory->name . '</option>';
              } ?>
            </select>
          </div>
          <span class="error"><?php echo !empty($errors['jobType']) ? $errors['jobType'] : ''; ?></span>
        </dd>
      </dl>
      <dl class="form_block_plus">
        <dt class="form_ttl">
          <label>ご質問・ご要望など</label>
        </dt>
        <dd class="form_content">
          <textarea class="form_text_plus" name="body" placeholder="ご相談したい内容や、希望の条件などがあればご記入ください。"><?php echo !empty($data['body']) ? $data['body'] : ''; ?></textarea>
        </dd>
      </dl>
      <div class="personal_info textcenter">
        <p class="personal_info_text"><a href="http://012grp.co.jp/policy/" target="_blank">個人情報の取扱いについて</a>をご一読頂き、同意の上送信ください。</p>
        <label class="agreement-checkbox-label" for="agreement">
          <input type="hidden" name="agreement" value="">
          <input class="agreement-checkbox error" id="agreement" type="checkbox" name="agreement" value="1" <?php echo isset($data['agreement']) && $data['agreement'] === '1' ? 'checked' : ''; ?>><span>個人情報の取り扱いに同意する</span>
        </label>

      </div>
      <div class="form_btn flex_center">
        <button class="btn05" type="submit">
          <p class="mail_icon">
            <p3>確認画面へ進む</p3>
          </p>
        </button>
      </div>
      <span class="error"><?php echo !empty($errors['agreement']) ? $errors['agreement'] : ''; ?></span>
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