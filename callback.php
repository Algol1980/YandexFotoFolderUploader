<?php

/*
 * 2. Скрипт получающий токен
 */

require_once("config.php");

if (isset($_GET['code']))
  {
    $query = array(
      'grant_type' => 'authorization_code',
      'code' => $_GET['code'],
      'client_id' => YANDEX_CLIENT_ID,
      'client_secret' => YANDEX_CLIENT_PASSWORD
    );
    $query = http_build_query($query);

    $header = "Content-type: application/x-www-form-urlencoded";

    $opts = array('http' =>
      array(
      'method'  => 'POST',
      'header'  => $header,
      'content' => $query
      ) 
    );
    $context = stream_context_create($opts);
    $result = file_get_contents('https://oauth.yandex.ru/token', false, $context);
    $result = json_decode($result);


    if( isset($result->access_token) )
    {
        $_SESSION['yandex_access_token'] = $result->access_token;
        header("Location: index.php");
        exit();
    }    
    
  }
  else 
  {
      header("Location: https://oauth.yandex.ru/authorize?response_type=code&client_id=".YANDEX_CLIENT_ID);
  }