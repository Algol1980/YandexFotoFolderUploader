<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 14.06.2016
 * Time: 13:00
 */

function object2array($object)
{
    return @json_decode(@json_encode($object), 1);
}

function postAlbumInfo($album) {

    return '<entry xmlns="http://www.w3.org/2005/Atom" xmlns:f="yandex:fotki">
          <title>' . $album . '</title>
          <summary>' . $album . '</summary>
          <link href="http://api-fotki.yandex.ru/api/users/'. USER_LOGIN .'/album/'. PARENT_ALBUM. '/" rel="album" />
        </entry>';
}

function curlExec($album) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/atom+xml; charset=utf-8; type=entry",
        "Authorization: OAuth " . $_SESSION['yandex_access_token'],
    ));
    curl_setopt($curl, CURLOPT_URL, "https://api-fotki.yandex.ru/api/users/" . USER_LOGIN . "/albums/");
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $album);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}

function getPhotoUrl($result) {
    $replaceStr = 'https://fotki.yandex.ru/users/vam-book/album/';
    $xml = simplexml_load_string($result);
    $xml_array = object2array($xml);
    return  str_replace($replaceStr, '', $xml_array['link'][4]['@attributes']['href']) . ':Фото';
}