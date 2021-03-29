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
    <link rel="stylesheet" href="found.css">
    <title>Search</title>
</head>
<?php
//Importing the file that has almost all the functions written on it var.php
include "var.php";

//starting session
session_start();

//If the user isn't logged in redirect him to login page, if the logging var is set then the user is logged in
if (!isset($_SESSION["is-logged"])){
    header("Location: index.php");
};


//Select everything from the database
$result = db_select_all();

//This array will contain the matches of thee search
$list = array();

//Fetching the row of the db which is stored in $result variable
while ($row = $result->fetch_row()) {

    //Name and family name to show in the search result
    $full_name  = $row["0"] . " " . $row["1"];

    //Checking if this name matchs the search
    if (strpos(strtolower($full_name), strtolower($_POST["search"])) !== false) {

        //Definin the username to use it in profile link
        $username = $row["3"];

        //The final result that's gonna be shown in search result
        $a = "<div class='found'>
        <a href=user-profile.php?id=$username>$full_name</a>
        </div>";

        //Storing all the final result result in $list
        array_push($list, $a);
    };
};
?>

<body class="container">
    <div class="row title">
        <a href="home.php">Home</a>
        <h1>Search:</h1>
    </div>
    <div class="row search">
        <form action="found.php" method="post">
            <input name="search" type="text" placeholder="Enter a user name here !" value=<?= $_POST["search"] ?> required>
            <input type="submit" value="Search">
        </form>
    </div>

    <div class="row result">
        <p>Results:</p>
        <?php
        //This variable holds the number of matches to use it in for loop
        $count = sizeof($list);

        //Itirate throught matches in $list and print them, note : Matches html is already ready and in the $list
        for ($x = 0; $x < $count; $x++) {
            echo $list[$x];
        };
        ?>
    </div>
</body>

</html>