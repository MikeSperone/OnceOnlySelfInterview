<?php
/**
 * INTERVIEW VIDEO FORM INFO
 * /interview/index.php
 *
 * Created by Mike Sperone
 * c - 2014-2015
 *
 * This file allows anyone to record their own self-interview
 * Date: 11/17/15
 * Time: 4:00 PM
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
    <br />
    <div class="box">
        <header>Once Only</header>
    </div>
    <br />
    <div class="content-area">
        <form id="interviewForm" action="interviewFormProcess.php">
            <div class="formLine">
                <div class="formSection">
                    <!--  input full name  -->
                    First Name<br/>
                    <input id="nameInput" type="text" name="firstname" required autofocus>
                </div>
                <div class="formSection">
                    Last Name<br/>
                    <input id="nameInput" type="text" name="lastname" required>
                </div>
                <div class="spacer"></div>
            </div><br/>
            <div class="formLine">
                <!--  input bio  -->
                Bio<br/>
                <textarea name="bio" rows="8" required></textarea>
                <div class="spacer"></div>
            </div><br/>

            <!--  input personal links  -->
            <div id="personalLinks">
                Personal Links<br/>
                <script> addPersonalLink(a);</script>
                <!--  + to input more  -->
            </div>
            <input class="btn" type="button" value="add link" onclick="addPersonalLink(a);">
            <br/><br/>
            <!--  input talks  link, where, year -->
            <div id="lectureLinks">
                Talks, Lectures, Speeches, etc...<br/>
                <script> addLecture(b); </script>
            </div>
            <input class="btn" type="button" value="add link" onclick="addLecture(b);">
            <br/><br/>
            <!--  input publications, where, year -->
            <div id="publicationLinks">
                Publications<br/>
                <script> addPublication(c); </script>
            </div>
            <input class="btn" type="button" value="add link" onclick="addPublication(c);">
            <br/><br/>
            <!--  onsubmit, make bio page, make ziggeo visible to start recording  -->
            <input class="btn" type="submit" value="submit" formmethod="post">
            <br/><br/><br/><br/><br/><br/><br/><br/>
        </form>
        <br/><br/>
    </div>
    <br/><br/>
    <?php require("../footer.php"); ?>