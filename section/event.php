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
    <link rel="stylesheet" href="event.css">
    <title>Add an event</title>
</head>

<?php
include "var.php";
session_start();
$state = "";

if (isset($_POST["submit"])){
    $_SESSION["group1"] = @$_POST["group1"];
    $_SESSION["group2"] = @$_POST["group2"];
    $_SESSION["group3"] = @$_POST["group3"];
    $_SESSION["group4"] = @$_POST["group4"];
    //--------------------------------
    if ($_SESSION["group1"]=="" and $_SESSION["group2"]=="" and $_SESSION["group3"]=="" and $_SESSION["group4"]==""){
        $_SESSION["group1"] = "1";
        $_SESSION["group2"] = "2";
        $_SESSION["group3"] = "3";
        $_SESSION["group4"] = "4";
    };
    $_SESSION["date"] = $_POST["date"];
    $_SESSION["content"] = $_POST["content"];
    save_foryou_post();
    $state = "Posted!";
    sleep(2);
    header("Location: profile.php");
};

?>
<body class="container">
    <div class="event">
        <div class="row">
            <h1>Add event:</h1>
            <p>Add an event like exams, additionell courses...</p>
        </div>

        <div class="row">
            <form action="event.php" method="POST">
                <b>Add the concerned groups: </b>
                <p>If you don't choose any group all the groups will be selected automatically.</p>
                <label for="group1">Group 1</label>
                <input name="group1" type="checkbox" value="1">

                <label for="group2">Group 2</label>
                <input name="group2" type="checkbox" value="2">

                <label for="group3">Group 3</label>
                <input name="group3" type="checkbox" value="3">

                <label for="group4">Group 4</label>
                <input name="group4" type="checkbox" value="4">
                <br>
                <label for="date5">Enter when the event is going to happen:</label>
                <input name="date" type="date" required>
                <br>
                <label for="content">Enter a description to the event:</label>
                <br>
                <textarea style="resize: none" name="content" id="description" minlength="3" cols="90" rows="3" placeholder="What's the event?"></textarea>
                <br>
                <input name="submit" type="submit">
                <b><?= $state?></b>
            </form>

        </div>
    </div>
</body>

</html>