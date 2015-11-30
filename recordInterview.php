<?php
/**
 * RECORD INTERVIEW VIDEO
 * /interview/index.php
 *
 * Created by Mike Sperone
 * c - 2014-2015
 *
 * This file allows anyone to record their own self-interview
 * Date: 10/16/15
 * Time: 4:38 PM
 */

session_start();
$name = $_GET['name'];
?>

    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <title>Once Only</title>
        <meta charset="UTF-8" />
        <link rel="icon" type="image/png" href="../favicon.ico" />
        <link rel="stylesheet" type="text/css" href="../css/brain.css" />
        <link rel="stylesheet" type="text/css" href="../css/menu.css" />
        <link rel="stylesheet" type="text/css" href="../css/animate.min.css" />
        <!--<link href='https://fonts.googleapis.com/css?family=Roboto:300,900' rel='stylesheet' type='text/css' />-->
        <link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'/>
        <link rel="stylesheet" href="//assets-cdn.ziggeo.com/css/ziggeo-v1.css" />
        <script src="//assets-cdn.ziggeo.com/js/ziggeo-v1.js"></script>
        <script>ZiggeoApi.token = "aa822fa2614333c2c6981dd788ff5908";</script>
        <script>ZiggeoApi.Config.webrtc = true;</script>

        <script>
            var iName = "<?php echo $name; ?>";
            ZiggeoApi.Events.on("submitted", function (data) {
                // Triggered when a video has been recorded, uploaded, and processed
                var recordInfo = new FormData();
                var videoData = data.video.token;
                recordInfo.append("token", videoData);
                recordInfo.append("name", iName);
                //console.log(recordInfo);
                xhr('moveVideo.php', recordInfo, function (fileURL) { window.location = fileURL; });
            });
            function xhr(url, data, callback) {
                var request = new XMLHttpRequest();
                request.onreadystatechange = function () {
                    if (request.readyState == 4 && request.status == 200) {
                        callback(request.responseText);
                    }
                };
                request.open('POST', url);
                request.send(data);
            }
            ZiggeoApi.Events.on("error_recorder", function (data, error) {
                // Triggered when the video recorder encounters an error
                // TODO: reload page with error message
            });
        </script>
    </head>

    <body>
    <div class="site-wrapper">
        <br />
        <div class="box">
            <header>Once Only</header>
        </div>
        <br /> <br />
        <div class="content-area">
            <ziggeo id="ziggeoVideo"
                    ziggeo-recording_width="1280"
                    ziggeo-recording_height="720"></ziggeo>
        </div>

<?php require("../footer.php"); ?>