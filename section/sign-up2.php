<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sign-up2.css">
    <title>Sign-up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<?php
include "var.php";
$exist = false;
if (isset($_POST["username"]) and $_POST["password"]){
    session_start();
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["password"] = $_POST["password"];
    $result =  db_select_all();
    while ($row =  $result->fetch_assoc()){
        if ($row["username"] == $_SESSION["username"]){
            $exist =  true;
        };
    };
    if ($exist == false){
        header("Location: sign-up3.php");
    }elseif($exist == true){
        echo "<p>This username is already used ! Plaise choose another one</p>";
    }else{
        echo "<p>Unknown error!</p>";
    };
};
?>
<header>
    <h1>Create a username</h1>
</header>
<body class="container">
    <div class="username">
        <form class="row" action="sign-up2.php" method="POST">
            <label class="col-sm-12" for="username">Create a username: </label>
            <br>
            <input class="col-sm-10" type="text" name="username" placeholder="username here" required>
            <p class="col-sm-2" class="req">required</p>
            <br>
            <label class="col-sm-12" for="password">Create a password: </label>
            <br>
            <input class="col-sm-10" minlength="6" type="password" name="password" placeholder="Password here" required>
            <p class="col-sm-2 req">required</p>
            <br>
            <input type="submit" value="enter">
        </form>
    </div>
</body>

</html>