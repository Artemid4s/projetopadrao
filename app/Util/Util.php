<?php
namespace App\Util;

class Util
{
  public static function validarRecaptcha($token)
  {
    $secret = '6LfT44kkAAAAAIn8wpOsjHlU7MT3o_YQoZyQQJZE';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt(
        $ch,
        CURLOPT_POSTFIELDS,
        "secret=" . $secret . "&response=" . $token
    );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    $responseData = json_decode($result, TRUE);
    curl_close($ch);

    return $responseData['success'];
  }
}