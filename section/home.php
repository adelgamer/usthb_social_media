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
    <title>Home</title>
</head>
<?php
session_start();
$posts = scandir("post/");
$post_number = sizeof($posts);
$show = "";
global $list, $count;
$list = array();
for ($x=0; $x<$post_number; $x++){
    $post_name = $posts[$x];
    if  (strpos($post_name, "foryou") !== false){
        $dir = "post/".$post_name;
        $file = fopen($dir, "r");
        $content = fread($file, filesize($dir));
        $show = $content;
        array_push($list, $show);
    };
};
$count = sizeof($list);
if ($show == ""){$show = "There is nothing for you!";};
?>
<body class="container">
<div class="row pages">
        <a class="col-sm-4" href="home.php">Home</a>
        <a class="col-sm-2" href="profile.php">Profile</a>
        <a class="col-sm-2" href="lessons.php">Lessons</a>
        <a class="col-sm-2" href="settings.php">Settings</a>
        <a class="col-sm-2" href="index.php">Log out</a>
    </div>
    <div class="row menu">
        <input class="col-sm-8" type="text" name="search" placeholder="Search here" required>
        <button class="col-sm-3" >Search</button>
        <button class="col-sm-1">Notification</button>
    </div>
    <div class="content row">

        <div class="posts col-sm-7">
            <h1>Posts: </h1>
        </div>

        <div class="foryou col-sm-5">
            <h1>For you: </h1>
            <br>
            <br>
            <?php
            global $list, $count;
            for ($x=0; $x<$count; $x++){
                echo "<b>".$list[$x]."</b><br>";
            };
            ?>
        </div>
    </div>
    
    <div class="row">
        <div class="upload">
            <h1>What's on your mind?</h1>
            <textarea style="resize: none" name="upload" id="upload" minlength="3" cols="90" rows="2" placeholder="type here"></textarea>
            <br>
            <button>Post</button>
        </div>
    </div>
</body>
</html>