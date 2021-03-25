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
    <link rel="stylesheet" href="home.css">
    <script src="home-search.js"></script>
    <title>Home</title>
</head>
<?php
session_start();
include "var.php";
$posts = scandir("post/");
$post_number = sizeof($posts);
$show = "";
global $list, $count;
$list = array();
for ($x = 0; $x < $post_number; $x++) {
    $post_name = $posts[$x];
    if (strpos($post_name, "foryou") !== false) {
        $dir = "post/" . $post_name;
        $file = fopen($dir, "r");
        $content = fread($file, filesize($dir));
        $show = $content;
        array_push($list, $show);
    };
};
$count = sizeof($list);

if ($show == "") {
    $show = "There is nothing for you!";
};

if (isset($_POST["search"])) {
    $_SESSION["search"] = $_POST["search"];
    header("Location: found.php");
};

if (isset($_POST["user-post"])) {
    $_SESSION["post-content"] = $_POST["upload"];
    save_userpost();
};

$user_posts = scandir("post2");
$user_post_number = sizeof($user_posts);
$show2 = "";
global $list2, $count2;
$list2 = array();
for ($x = 0; $x < $user_post_number; $x++) {
    $user_post_name = $user_posts[$x];
    if (str_contains($user_post_name, "post")) {
        $dir2 = "post2/" . $user_post_name;
        $file2 = fopen($dir2, "r");
        $content2 = fread($file2, filesize($dir2));
        $show2 = $content2;
        array_push($list2, $show2);
    };
};
$count2 = sizeof($list2);

?>

<body class="container">
    <div class="row pages">
        <a class="col-sm-4" href="home.php">Home</a>
        <a class="col-sm-2" href="profile.php"><?= $_SESSION["first"] . " " . $_SESSION["last"] ?></a>
        <a class="col-sm-2" href="lessons.php">Lessons</a>
        <a class="col-sm-2" href="settings.php">Settings</a>
        <a class="col-sm-2" href="index.php">Log out</a>
    </div>
    <div class="row menu">
        <form action="found.php" method="POST">
            <input id="search" class="col-sm-8" type="text" name="search" placeholder="Search here" required>
            <!-- <input type="submit" class="col-sm-3" value="Search"> -->
            <button class="col-sm-3">Search</button>
        </form>
        <button class="col-sm-1">Notification</button>
    </div>
    <div class="content row">

        <div class="posts col-sm-7">
            <h1>Posts: </h1>
            <?php
            global $list2, $count2;
            $list2 =  array_reverse($list2);
            for ($x = 0; $x < $count2; $x++) {
                echo filter_user_post($x, $list2);
            };
            ?>
        </div>

        <div class="foryou col-sm-5">
            <h1>For you: </h1>
            <b>Today's date : <?= date("Y-m-d") ?></b>
            <br>
            <br>
            <?php
            global $list, $count;
            $list =  array_reverse($list);
            for ($x = 0; $x < $count; $x++) {
                echo filter_for_you($x, $list);
            };
            ?>
        </div>
    </div>

    <div class="row">
        <div class="upload">
            <h1>What's on your mind?</h1>
            <form action="home.php" method="post">
                <textarea style="resize: none" name="upload" id="upload" minlength="3" cols="90" rows="2" placeholder="type here"></textarea>
                <br>
                <button name="user-post">Post</button>
            </form>
        </div>
    </div>
</body>

</html>