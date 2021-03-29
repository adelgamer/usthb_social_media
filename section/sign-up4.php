<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up</title>
    <link rel="icon" href="school.png">
    <link rel="stylesheet" href="sign-up4.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<?php
include "var.php";

session_start();
if (isset($_POST["group"])) {
    $_SESSION["group"] = $_POST["group"];
    $_SESSION["code"] = rand(100000, 999999);

    send_gmail();
    header("Location: verify.php");
};
?>
<header>
    <h1>Enter your group: </h1>
</header>

<body class="contrainer">
    <div class="group">
        <form class="row" action="sign-up4.php" method="post">
            <label class="col-sm-12" for="group">Enter your group: </label>
            <br>
            <input class="col-sm-10" type="number"  min="1" max="4" maxlength="1" name="group" placeholder="Group number here " required>
            <p class="col-sm-2 req">required</p>
            <input type="submit" value="enter">
        </form>
    </div>
</body>

</html>