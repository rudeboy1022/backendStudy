<?php

class Validation
{
  private array $data = [];

  // NOTE: 優先したいバリデーションを先に書く
  const VALIDATION_SET = [
    'name' => ['required'],
    'kana' => ['required', 'katakana'],
    'q1' => ['required'],
    'birthday_year' => ['required'],
    'birthday_month' => ['required'],
    'birthday_day' => ['required'],
    'birthday' => ['date'],
    'mail' => ['required', 'mail'],
    'phone' => ['required', 'phone'],
    'place' => ['required'],
    'jobType' => ['required'],
    'agreement' => ['required'],
  ];

  // NOTE: 優先したいバリデーションを先に書く
  const MESSAGE_SET = [
    'required' => '必須入力です',
    'katakana' => 'カタカナで入力してください',
    'date' => '正しい日付を入力してください',
    'mail' => '正しいメールアドレスの形式で入力してください',
    'phone' => '正しい電話番号の形式で入力してください',
  ];

  public function __construct($data)
  {
    $this->data = $data;
  }


  public function validateData()
  {
    $errors = [];
    if (!empty($this->data)) {
      foreach ($this->data as $key => $value) {
        $errors += $this->validate($key, $value);
      }
    }

    return $errors;
  }


  private function validate($key, $value)
  {
    $errors = [];

    $validationSet = array_map('array_reverse', self::VALIDATION_SET);

    if (!empty(self::VALIDATION_SET[$key])) {
      $validations = $validationSet[$key];

      foreach ($validations as $validation) {
        $errors[$key] = match ($validation) {
          'required' => empty($value) ? $validation : '',
          'katakana' => !preg_match("/\A\p{Katakana}+\z/u", $value) ? $validation : '',
          'mail' => !preg_match("/\A([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+\z/", $value) ? $validation : '',
          'phone' => !preg_match('/^[0-9]+$/', $value) ? $validation : '',
          'date' => !checkdate((int) $value['month'], (int) $value['day'], (int) $value['year']) ? $validation : '',
          default => null,
        };
      }
    }

    return [$key => !empty($errors[$key]) && !empty(self::MESSAGE_SET[$errors[$key]]) ? self::MESSAGE_SET[$errors[$key]] : ''];
  }
}
