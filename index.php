<?php
header('Content-Type: text/html; charset=utf-8');

require_once("config.php");
require_once 'functions.php';


if (!isset($_SESSION['yandex_access_token'])) {
    header("Location: https://oauth.yandex.ru/authorize?response_type=code&client_id=" . YANDEX_CLIENT_ID);
}
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>VambookUploader</title>
</head>
<body>
<form action="result.php" method="post">
    <label for="albums"></label>e
    <textarea name="albums" id="" cols="30" rows="10"></textarea>
    <input type="submit" value="Send" name="sendAlbums">
</form>
</body>
</html>



