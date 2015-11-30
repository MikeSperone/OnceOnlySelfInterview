<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 11/21/15
 * Time: 4:32 PM
 */
$firstname = strtolower(htmlspecialchars($_POST['firstname']));
$lastname = strtolower(htmlspecialchars($_POST['lastname']));

$firstname = ucfirst($firstname);
$lastname = ucfirst($lastname);
// $photo = ??
$bio = htmlspecialchars($_POST['bio']);

//Personal Links
$i = 1;
$linkArray = array();
while (isset($_POST["link$i"])) {
    $linkArray[htmlspecialchars($_POST["link$i"])] = htmlspecialchars($_POST["linkText$i"]);
    $i++;
}

function getLinks($l_Arr) {
    $returnValue = "";
    foreach ($l_Arr as $key => $value) {
        $returnValue .= "<a class='contentLink' href='$key' target='_blank'>$value</a><br />";
    }
    return $returnValue;
}

//Talks
$j = 1;
$Talk_Array = array();
$Talk_subArray = array();
while (isset($_POST["talk_Link$j"])) {
    $Talk_subArray[0] = htmlspecialchars($_POST["talk_Link$j"]);
    $Talk_subArray[1] = htmlspecialchars($_POST["talk_LinkText$j"]);
    $Talk_subArray[2] = htmlspecialchars($_POST["talk_location$j"]);
    $Talk_subArray[3] = htmlspecialchars($_POST["talk_year$j"]);

    $Talk_Array[$j] = $Talk_subArray;
    $j++;
}

function getTalkLinks($t_Arr) {
    $returnValue = "";
    foreach ($t_Arr as $subArr) {
        $returnValue .= "<a class='contentLink' href='$subArr[0]' target='_blank'>$subArr[1]</a>, $subArr[2], $subArr[3]<br/>";
    }
    return $returnValue;
}

//Publications
$k = 1;
$Pub_Array = array();
$Pub_subArray = array();
while (isset($_POST["pub_Link$k"])) {
    $Pub_subArray[0] = htmlspecialchars($_POST["pub_Link$k"]);
    $Pub_subArray[1] = htmlspecialchars($_POST["pub_LinkText$k"]);
    $Pub_subArray[2] = htmlspecialchars($_POST["pub_year$k"]);

    $Pub_Array[$k] = $Pub_subArray;
    $k++;
}
function getPubLinks($p_Arr) {
    $returnValue = "";
    foreach ($p_Arr as $subArr) {
        $returnValue .= "<a class='contentLink' href='$subArr[0]' target='_blank'>$subArr[1]</a>, $subArr[2]<br/>";
    }
    return $returnValue;
}

echo $firstname." ".$lastname;
//TODO: after page is generated, go to Ziggeo recording page
//Generate onceonly.org/o/info/FirstLast.php  -  bio/info page
$infoPage = "<?php session_start(); ?>
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <title>Once Only - $firstname $lastname</title>
                <meta charset='utf-8'>
                <meta name='author' content='Mike Sperone Auto Generated'>
                <script src='../../js/lib/jquery-1.11.3.min.js'></script>
                <link rel='stylesheet' type='text/css' href='../../css/brain.css' />
                <link rel='stylesheet' type='text/css' href='../../css/menu.css' />
                <link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' />
            </head>".
            "<body>
            <div class='site-wrapper'>
                <?php require('../../menu.php'); ?>
                <div class='back'>
                    <a class='contentLink' href='http://onceonly.org/o/'><< back</a>
                </div>
                <div class='box' id='main-content'>
                    <header id='interview-header'>$firstname $lastname</header><br />
                    <div>
                        <div class='information' id='bio'>
                            $bio
                        </div>
                        <h2>Personal Links</h2>
                        <div class='information' id='links'>
                            <p>";
$infoPage .= getLinks($linkArray);
$infoPage .= "</p>
                        </div>
                        <h2>Talks</h2>
                        <div class='information' id='talks'>";

$infoPage .= getTalkLinks($Talk_Array);
$infoPage .=           "
                        </div>
                        <h2>Publications</h2>
                        <div class='information'>";
 $infoPage .= getPubLinks($Pub_Array);
 $infoPage .=           "</div>
                         <div class='spacer'>
                            <br/><br/><br/><br/><br/><br/><br/><br/>
                        </div>
                    </div>
                </div>
                <?php require('../../footer.php'); ?>";

//write bio/info page
$newInfo = fopen("../o/info/".$firstname.$lastname.".php", "w");
fwrite($newInfo, $infoPage);

header("Location:https://onceonly.org/interview/recordInterview.php?name=$firstname$lastname");
?>