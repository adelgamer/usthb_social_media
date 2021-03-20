<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USTHB</title>
    <link rel="stylesheet" href="index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<?php
include "var.php";
$useremail = "";
session_start();
if (isset($_POST["gmail"]) and $_POST["password"]){
    $row = db_select_spicific($_POST["gmail"]);
    if ($row != ""){
        if ($row[4] == $_POST["password"]){
            $_SESSION["first"] = $row[0];
            $_SESSION["last"] = $row[1];
            $_SESSION["gmail"] = $row[2];
            $_SESSION["username"] = $row[3];
            $_SESSION["password"] = $row[4];
            $_SESSION["number"] = $row[5];
            $_SESSION["fb"] = $row[6];
            $_SESSION["instagram"] = $row[7];
            $_SESSION["group"] = $row[8];
            $_SESSION["birthday"] = $row[9];
            $_SESSION["gender"] = $row[10];
            header("Location: profile.php");
        }else{
            echo "<b>Password is incorrect!</b>";
        };
    }else{
        echo "<b>No user with this gmail!</b>";
    };
};
?>
<body class="container">
    <div class="welcome row">
        <h1 class="">Welcome to usthb Geology</h1>
    </div>
    <div class="login">
        <form action="index.php" method="POST" class="loginform">
            <label for="gmail">Enter your gmail: </label>
            <br>
            <input class="entry" type="email" name="gmail" placeholder="Gmail here" required>
            <br>
            <label for="password">Enter your password: </label>
            <br>
            <input class="entry" type="password" name="password" placeholder="Password here" required>
            <br>
            <br>
            <input type="submit" value="Login">
        </form>
        <p>Don't you have an account? <a href="sign-up.php">sign-up</a></p>
    </div>

</body>

</html>