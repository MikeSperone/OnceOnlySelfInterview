<?php
/**
 * INTERVIEW VIDEO FINISHING PAGE
 * /interview/thankyou.php
 *
 * Created by Mike Sperone
 * c - 2014-2015
 *
 * This page is the confirmation and approval page
 * Date: 11/30/15
 * Time: 12:41 AM
 */
?>

    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <title>Once Only</title>
        <meta charset="UTF-8" />
        <link rel="icon" type="image/png" href="../favicon.ico" />
        <link rel="stylesheet" type="text/css" href="../css/brain.css" />
        <link rel="stylesheet" type="text/css" href="../css/menu.css" />
        <link rel="stylesheet" type="text/css" href="interviewPage.css" />
        <link rel="stylesheet" type="text/css" href="../css/animate.min.css" />
        <!--<link href='https://fonts.googleapis.com/css?family=Roboto:300,900' rel='stylesheet' type='text/css' />-->
        <link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'/>
        <script src="interviewFormValidation.js"></script>
    </head>

<body>
<div class="site-wrapper">
    <?php require("../menu.php"); ?>
    <br />
    <div class="box" id="main-content">
        <?php
        $fullname = htmlspecialchars($_GET['name']);
        $interview_link = "https://onceonly.org/videos/" . $fullname . ".mp4";
        $info_link = "https://onceonly.org/o/info/" . $fullname . ".php";
        echo "<p>Thank you for submitting your interview to Once Only!</p>";
        if (isset($_GET['error'])) {
            echo "<p>I'm sorry, but there seems to have been an error when recording your video!  Please check the links below to confirm.  If you find your video and info page there, then this error came up by mistake.  If there is indeed no video, please follow the link at the bottom to resubmit.</p>";
        }
        echo "<p>Your video can be found here: <a href='".$interview_link."'>$interview_link</a></p>";
        echo "<p>Your info page can be found here: <a href='".$info_link."'>$info_link</a></p>";
        echo "<p>If you are satisfied with your interview and info page, you may close your browser window now or continue browsing Once Only.  Your submission will be reviewed and then updated to the website.  If there are any issues, you will receive an email from Marie or Michael.</p>";
        echo "<p>If you are not satisfied, you may resubmit.<br/>  To resubmit, please go to <a href='index.php'>https://onceonly.org/interview/</a>";
        ?>
        <br/><br/>
    </div>
    <br/><br/>
<?php require("../footer.php"); ?>