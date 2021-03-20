<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="settings.css">
    <title>Settings</title>
</head>
<?php
include "var.php";
$msg = "";
session_start();
$row = db_select_spicific($_SESSION["gmail"]);
if (isset($_POST["submit1"])){
    db_update("first", $_POST["first"], $_SESSION["gmail"]);
    $msg = show_message("Updated succesfully!");
};
if (isset($_POST["submit2"])){
    db_update("last", $_POST["last"], $_SESSION["gmail"]);
    $msg = show_message("Updated succesfully!");
};
if (isset($_POST["submit3"])){
    db_update("password", $_POST["password"], $_SESSION["gmail"]);
    $msg = show_message("Updated succesfully!");
};
if (isset($_POST["submit4"])){
    db_update("phone", $_POST["number"], $_SESSION["gmail"]);
    $msg = show_message("Updated succesfully!");
};
if (isset($_POST["submit5"])){
    db_update("fb", $_POST["fb"], $_SESSION["gmail"]);
    $msg = show_message("Updated succesfully!");
};
if (isset($_POST["submit6"])){
    db_update("instagram", $_POST["instagram"], $_SESSION["gmail"]);
    $msg = show_message("Updated succesfully!");
};
if (isset($_POST["submit7"])){
    db_update("grp", $_POST["group"], $_SESSION["gmail"]);
    $msg = show_message("Updated succesfully!");
};
if (isset($_POST["submit8"])){
    db_update("gender", $_POST["gender"], $_SESSION["gmail"]);
    $msg = show_message("Updated succesfully!");
};
if (isset($_POST["submit9"])){
    db_update("birthday", $_POST["birthday"], $_SESSION["gmail"]);
    $msg = show_message("Updated succesfully!");
};
if (isset($_POST["submit10"])){
    db_update("matricule", $_POST["matricule"], $_SESSION["gmail"]);
    $msg = show_message("Updated succesfully!");
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
    <div class="settings">
        <div class="welcome row content">
            <h1 class="">Settings: </h1>
        </div>
    <div class="">
        <form action="settings.php" method="POST" class="">
            <label for="first">First Name:   <?= $row[0]?></label>
            <input name="first" type="text" required>
            <input name="submit1" type="submit" value="Save">
        </form>
        <form action="settings.php" method="POST" class="">
            <label for="last">Last Name:   <?= $row[1]?></label>
            <input name="last" type="text" required>
            <input name="submit2" type="submit" value="Save">
        </form>
        <form action="settings.php" method="POST" class="">
            <label for="password">Password:</label>
            <input name="password" minlength="6" type="password" required>
            <input name="submit3" type="submit" value="Save">
        </form>
        <form action="settings.php" method="POST" class="">
            <label for="number">Number:   <?= $row[5]?></label>
            <input name="number" type="text" required>
            <input name="submit4" type="submit" value="Save">
        </form>
        <form action="settings.php" method="POST" class="">
            <label for="fb">Your facebook link: <?= $row[6]?></label>
            <input name="fb" type="text" required>
            <input name="submit5" type="submit" value="Save">
        </form>
        <form action="settings.php" method="POST" class="">
            <label for="instagram">Your instagram username: <?= $row[7]?></label>
            <input name="instagram" type="text" required>
            <input name="submit6" type="submit" value="Save">
        </form>
        <form action="settings.php" method="POST" class="">
            <label for="group">Your group:   <?= $row[8]?></label>
            <input name="group" minlength="1" maxlength="1" min="1" max="4" type="number" required>
            <input name="submit7" type="submit" value="Save">
        </form>
        <form action="settings.php" method="POST" class="">
            <label for="gender">Your gender: <?= $row[10]?></label>
            <select name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <input name="submit8" type="submit" value="Save">
        </form>
        <form action="settings.php" method="POST" class="">
            <label for="birthday">Your birthday: <?= $row[9]?></label>
            <input name="birthday" type="date" required>
            <input name="submit9" type="submit" value="Save">
        </form>
        <form action="settings.php" method="POST" class="">
            <label for="matricule">Your matricule: <?= $row[11]?></label>
            <input name="matricule" type="text" minlength="4" maxlength="12" required>
            <input name="submit10" type="submit" value="Save">
        </form>
        <p>You have to re login in order for the changes to appear!</p>
    </div>
    </div>
    <div id="msg"><?= $msg ?></div>
</body>
</html>