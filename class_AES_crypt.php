<?php
 /*
  Class_AES_crypt.php
  author: Carlos Servín R.
  email: carlos@servin.mx, www.servin.mx
  Create: 22/08/2019
  Update: 22/08/2019
  Valid for php  + 7.1
 */

class AES_crypt {

  protected $string;
  protected $keyencrypt;
  protected $length;

 function encrypt($string, $keyencrypt){
    $method = "AES-256-CBC";
    $key = hash('sha256', $keyencrypt, true);
    $iv = openssl_random_pseudo_bytes(16);
    $ciphertext = openssl_encrypt($string, $method, $key, OPENSSL_RAW_DATA, $iv);
    $hash = hash_hmac('sha256', $ciphertext, $key, true);
    return $iv . $hash . $ciphertext;
  }

  function decrypt($string, $keyencrypt){
    $method = "AES-256-CBC";
    $iv = substr($string, 0, 16);
    $hash = substr($string, 16, 32);
    $ciphertext = substr($string, 48);
    $key = hash('sha256', $keyencrypt, true);
    if (hash_hmac('sha256', $ciphertext, $key, true) !== $hash) return null;
    return openssl_decrypt($ciphertext, $method, $key, OPENSSL_RAW_DATA, $iv);

  }

  function generateRandomenkey($length) { //generateRandomenkey($length = 256)
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!$%&/()=|^';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }


}



 ?>
