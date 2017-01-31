<?php 

/*
 * 0. хранилище ID приложения и пароля
 */

ini_set('default_charset', "utf-8");
define("YANDEX_CLIENT_ID", "debb4afce85245869d8f26bddd7edce6");
define("YANDEX_CLIENT_PASSWORD", "7a00a2c07a314e718997958b96ae0e73");
define("OAUTH_CALLBACK", "http://YandexFotoFolderUploader/callback.php");
define("USER_LOGIN", "vam-book");
define("PARENT_ALBUM", "519310");
session_start();