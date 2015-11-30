<?php
session_start();

require_once('../../php/ziggeo/Ziggeo.php');

$token_or_key = htmlspecialchars($_POST['token']);
$fullname = htmlspecialchars($_POST['name']);

$ziggeo = new Ziggeo('aa822fa2614333c2c6981dd788ff5908', '314275bc45ec5f80cc1c24534fc50af7', '30d3611ae9852968a0297d9698a57898');

try {
    // move video to onceonly.org/videos/
    $file_name = $_SERVER['DOCUMENT_ROOT'] . "/videos/" . $fullname . ".mp4";
    $file_data = $ziggeo->videos()->download_video($token_or_key);
    if (!file_put_contents($file_name, $file_data)) {
        throw new Exception();
    }

    // get image from file
    $photo_name = $_SERVER['DOCUMENT_ROOT']."/o/image/" . $fullname . ".jpg";
    $photo_data = $ziggeo->videos()->download_image($token_or_key);
    file_put_contents($photo_name, $photo_data);

    // delete video from Ziggeo server
    $ziggeo->videos()->delete($token_or_key);
} catch (Exception $e) {
    echo "thankyou.php?name=$fullname&error=true";
}

echo "thankyou.php?name=$fullname";

?>

