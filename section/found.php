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
    <link rel="stylesheet" href="found.css">
    <title>Search</title>
</head>
<?php
include "var.php";
session_start();
$result = db_select_all();
$list = array();
while ($row = $result->fetch_row()) {
    $full_name  = $row["0"] . " " . $row["1"];
    if (str_contains(strtolower($full_name), strtolower($_POST["search"])) == true) {
        $username = $row["3"];
        $a = "<div class='found'>
        <a href=user-profile.php?id=$username>$full_name</a>
        </div>";
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
        $count = sizeof($list);
        for ($x = 0; $x < $count; $x++) {
            echo $list[$x];
        };
        ?>
    </div>
</body>

</html>