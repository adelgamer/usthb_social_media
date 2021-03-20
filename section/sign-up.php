<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sign-up.css">
    <title>sign-up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<header>
    <h1>Creating an account...</h1>
</header>
<?php
include "var.php";
$exist = false;
if (isset($_POST['first']) and isset($_POST['last']) and isset($_POST['gmail'])){
    session_start();
    $_SESSION["first"] =  $_POST["first"];
    $_SESSION["last"] = $_POST["last"];
    $_SESSION["gmail"] = $_POST["gmail"];
    $result =  db_select_all();
    while ($row =  $result->fetch_assoc()){
        if ($row["gmail"] == $_SESSION["gmail"]){
            $exist =  true;
        };
    };
    if ($exist == false){
        header("Location: sign-up2.php");
    }elseif($exist == true){
        echo "<p>You already have an account ! <a href='index.php'>Log in?</a></p>";
    }else{
        echo "<p>Unknown error ! </p>";
    };
};
?>
<body class="container">
    <div class="create1">
        <form action="" method="post" class="row">
            <label class="col-sm-12" for="name">Enter your first-name: </label>
            <br>
            <input class="col-sm-10" type="text" name="first" placeholder="Your name here" required>
            <p class="col-sm-2 req">required</p>
            <br>
            <label class="col-sm-12" for="last">Enter your last-name: </label>
            <br>
            <input class="col-sm-10" type="text" name="last" placeholder="last-name here" required>
            <p class="col-sm-2 req">required</p>
            <br>
            <label class="col-sm-12" for="username">Enter your gmail: </label>
            <br>
            <input class="col-sm-10 req" type="email" name="gmail" placeholder="gmail here" required>
            <p class="col-sm-2">required</p>
            <br><br>
            <input class="col-sm-12" type="submit" value="Next">
        </form>
        <p>Already have an account? <a href="index.php">Log in</a></p>
    </div>
</body>

</html>