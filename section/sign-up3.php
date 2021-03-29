<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up</title>
    <link rel="icon" href="school.png">
    <link rel="stylesheet" href="sign-up3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<?php
if (isset($_POST["phone"]) and isset($_POST["fb"]) and isset($_POST["instagram"])){
    session_start();
    $_SESSION["phone"] = $_POST["phone"];
    $_SESSION["fb"] = $_POST["fb"];
    $_SESSION["instagram"] = $_POST["instagram"];
    header("Location: sign-up4.php");
};
?>
<header>
    <h1>Your contact info: </h1>
    <p>This feild is optionel</p>
</header>
<body class="container">
<div class="contact">
        <form class="row" action="sign-up3.php" method="POST">
            <label class="col-sm-12" for="Phone">Enter your phone number: </label>
            <br>
            <input class="col-sm-12" type="text" name="phone" placeholder="phone number here">
            <br>
            <label class="col-sm-12" for="fb">Enter your facebook link: </label>
            <br>
            <input class="col-sm-12" type="url" name="fb" placeholder="fb link here">
            <br>
            <label class="col-sm-12" for="instagram">Enter your instagram username: </label>
            <br>
            <input class="col-sm-12" type="text" name="instagram" placeholder="instagram username here">
            <br>
            <input type="submit" value="enter">
        </form>
    </div>
</body>
</html>