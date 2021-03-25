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
    <title><?= $_GET["id"]?></title>
</head>
<?php
session_start();
include "var.php";
//$instagram = str_replace("@", "", $_SESSION["instagram"]);
$username = $_GET["id"];
$row = db_select_spicific2($username);
$phone = $row[0];
$matricule = $row[11];

if ($row[6] == ""){
    $fb = "No facebook";
}else{
    $fb = "<a href= \"". $row[6]."\" target='_blank'>here</a>";
};
if ($row[7] == ""){
    $instagram = "No instagram";
}else{
    $instagram = "<a href=http://instagram.com/".$row[7]." target='_blank'>here</a>";
};
?>
<body class="container">
<a href="home.php">Home</a>
    <div class="row content">
        <div class="col-sm-5 basic">
            <img src="profile_logo.jpg" alt="profile logo" width="250" height="250">
            <br>
            <h1>Basic info: </h1>
            <br>
            <h2><b><?=$row[0] . " " .$row[1] ?></b></h2>
            <br>
            <b><?="Gender: ".$row[10] ?></b>
            <br>
            <b><?="Group: ".$row[8] ?></b>
            <br>
            <b id="birthday"><?="Birthday: ".$row[9] ?></b>
            <br>
            <b id="matricule"><?="Matricule: ".$row[11] ?></b>
        </div>

        <div class="col-sm-7 more">
            <h1>Contact info:</h1>
            <br>
            <b><?= "Number: ".$row[5]?></b>
            <br>
            <b><?= "Email: ".$row[2]?></b>
            <br><br>
            <h1>Social media: </h1>
            <br>
            <b>Facebook: </b>
            <b><?= $fb?></b>
            <br>
            <b>Instagram: </b>
            <b><?= $instagram?></b>
            <br>
            <br>
        </div>
    </div>
</body>

</html>