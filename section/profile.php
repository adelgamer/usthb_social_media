<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="profile.css" type="text/css">
    <link rel="icon" href="school.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Profile</title>
</head>
<?php
session_start();
include "var.php";
$_SESSION["instagram"] = str_replace("@", "", $_SESSION["instagram"]);
$row = db_select_spicific($_SESSION["gmail"]);
$_SESSION["phone"] = $row[5];
$_SESSION["matricule"] = $row[11];
    if ($row[9] == "0000-00-00"){
        $_SESSION["birthday"] = "Not defined <a href='settings.php'>Add your birthday?</a>";
    };
    if ($row[5] == ""){
        $_SESSION["phone"] = "Not defined <a href='settings.php'>Add your number?</a>";
    };
    if ($row[6] == ""){
        $fb = "Not defined <a href='settings.php'>Add your Facebook?</a>";
    }else{
        $fb = "<a href= \"". $_SESSION["fb"]."\" target='_blank'>here</a>";
    };
    if ($row[7] == ""){
        $instagram = "Not defined <a href='settings.php'>Add your Instagram?</a>";
    }else{
        $instagram = "<a href=http://instagram.com/".$_SESSION['instagram']." target='_blank'>here</a>";
    };
    if ($row[10] == ""){
        $_SESSION["gender"] = "Not defined <a href='settings.php'>Add your gender?</a>";
    };
    if ($row[11] == ""){
        $_SESSION["matricule"] = "Not defined <a href='settings.php'>Add your matricule?</a>";
    };
?>
<body class="container">
    <div class="row pages">
        <a class="col-sm-4" href="home.php">Home</a>
        <a class="col-sm-2" href="profile.php">Profile</a>
        <a class="col-sm-2" href="lessons.php">Lessons</a>
        <a class="col-sm-2" href="settings.php">Settings</a>
        <a class="col-sm-2" href="index.php">Log out</a>
    </div>
    <div class="row content">
        <div class="col-sm-5 basic">
            <img src="profile_logo.jpg" alt="profile logo" width="250" height="250">
            <br>
            <h1>Basic info: </h1>
            <br>
            <h2><b><?=$_SESSION["first"] . " " .$_SESSION["last"] ?></b></h2>
            <br>
            <b><?="Gender: ".$_SESSION["gender"] ?></b>
            <br>
            <b><?="Group: ".$_SESSION["group"] ?></b>
            <br>
            <b id="birthday"><?="Birthday: ".$_SESSION["birthday"] ?></b>
            <br>
            <b id="matricule"><?="Matricule: ".$_SESSION["matricule"] ?></b>
        </div>

        <div class="col-sm-7 more">
            <h1>Contact info:</h1>
            <br>
            <b><?= "Number: ".$_SESSION["phone"]?></b>
            <br>
            <b><?= "Email: ".$_SESSION["gmail"]?></b>
            <br><br>
            <h1>Social media: </h1>
            <br>
            <b>Facebook: </b>
            <b><?= $fb?></b>
            <br>
            <b>Instagram: </b>
            <b><?= $instagram?></b>
            <br>
        </div>
    </div>
</body>

</html>