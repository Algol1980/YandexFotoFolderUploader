<?php
header('Content-Type: text/html; charset=utf-8');
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 14.06.2016
 * Time: 14:47
 */

require_once("config.php");
require_once 'functions.php';


if (!isset($_SESSION['yandex_access_token'])) {
    header("Location: https://oauth.yandex.ru/authorize?response_type=code&client_id=" . YANDEX_CLIENT_ID);
} elseif (isset($_POST['sendAlbums']) && !empty($_POST['albums'])) {
    $albumsArray = explode(PHP_EOL, $_POST['albums']);
    $urlsArray = [];
    foreach ($albumsArray as $item) {
        if (!empty($item)) {
            $album = postAlbumInfo($item);
            $result = curlExec($album);
            $urlsArray[] = getPhotoUrl($result);

        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Результаты</title>
</head>
<body>
<div>
    <?php if (!empty($urlsArray)):
        foreach ($urlsArray as $value): ?>
            <p><?php echo $value; ?></p>
        <?php endforeach ?>
    <?php endif ?>
</div>
</body>
</html>
