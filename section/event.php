<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="school.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="event.css">
    <title>Add an event</title>
</head>

<?php

//Importing the file that has almost all the functions written on it var.php
include "var.php";
//starting session 
session_start();
$state = "";


//This is a normal txt foryou post
if (isset($_POST["submit"])){
    //The groups concerned about the event! note: @ is because sometimes the groups checkbuttons aren't pressed! so it return undefined variable
    $_SESSION["group1"] = @$_POST["group1"];
    $_SESSION["group2"] = @$_POST["group2"];
    $_SESSION["group3"] = @$_POST["group3"];
    $_SESSION["group4"] = @$_POST["group4"];
    //--------------------------------
    //If all the groups checkbuttons arent pressed press them all
    if ($_SESSION["group1"]=="" and $_SESSION["group2"]=="" and $_SESSION["group3"]=="" and $_SESSION["group4"]==""){
        $_SESSION["group1"] = "1";
        $_SESSION["group2"] = "2";
        $_SESSION["group3"] = "3";
        $_SESSION["group4"] = "4";
    };
    //Setting up post metadata and content
    $_SESSION["date"] = $_POST["date"];
    $_SESSION["content"] = $_POST["content"];
    //Saving foryou post , note: this function is written in var.php file
    save_foryou_post();
    //Sleep 2 seconds before leaving the page
    sleep(2);
    //Leave the page and go to profile.php
    header("Location: profile.php");
};


//This is a foryou post wuth a file
if (isset($_POST["submit2"])){
    //Setting up post metadata and content
    $_SESSION["date"] = date("Y-m-d");
    $_SESSION["content"] = $_POST["content2"];
    $_SESSION["file"]  = $_FILES["fileuploader"];
    //Saving foryou post , note: this function is written in var.php file
    upload();
    //Sleep 2 seconds before leaving the page
    sleep(2);
    //Leave the page and go to profile.php
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
            </form>

            <form class="file" action="event.php" method="POST" enctype="multipart/form-data">
                <label for="content2">Enter a description to the event:</label>
                <br>
                <textarea style="resize: none" name="content2" id="description" minlength="3" cols="90" rows="3" placeholder="What's the event?"></textarea>
                <br>
                <input id="fileuploader" name="fileuploader" type="file">
                <br>
                <input name="submit2" type="submit">
            </form>

        </div>
    </div>
</body>

</html>