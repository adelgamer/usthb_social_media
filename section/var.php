<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$servername = "localhost";
$username = "root";
$password = "";
$database = "section";
$mail = new PHPMailer();

function db_select_all()
{
    //This function returns all the records of MySql
    global $servername, $username, $password, $database;
    $link =  mysqli_connect($servername, $username, $password, $database);
    $sql = "SELECT * FROM users";
    $result = mysqli_query($link, $sql);
    return $result;
};

function db_select_spicific($gmail)
{
    //This function returns all the records of MySql
    global $servername, $username, $password, $database;
    $link =  mysqli_connect($servername, $username, $password, $database);
    $sql = "SELECT * FROM users WHERE gmail='$gmail';";
    $result = mysqli_query($link, $sql);
    $list = $result->fetch_row();
    return $list;
};

function db_insert()
{
    //This function insert a record into the users table
    global $servername, $username, $password, $database;
    $sql = "INSERT INTO users (first, last, gmail, username, password, phone, fb, instagram, grp) VALUES('" . $_SESSION["first"] . "', '" . $_SESSION["last"] . "', '" . $_SESSION["gmail"] . "', '" . $_SESSION["username"] . "', '" . $_SESSION["password"] . "', '" . $_SESSION["phone"] . "', '" . $_SESSION["fb"] . "', '" . $_SESSION["instagram"] . "', '" . $_SESSION["group"] . "');";
    $link = mysqli_connect($servername, $username, $password, $database);
    mysqli_query($link, $sql);
    mysqli_close($link);
};

function db_update($column, $value, $gmail)
{
    //This function update a column
    global $servername, $username, $password, $database;
    $sql = "UPDATE users SET $column='$value' WHERE gmail='$gmail';";
    $link = mysqli_connect($servername, $username, $password, $database);
    mysqli_query($link, $sql);
    mysqli_close($link);
};

function send_gmail()
{
    //This function send gmail with verification code
    //$mail = new PHPMailer();
    global $mail;
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = "465";
    $mail->isHTML(true);
    $mail->Username = 'usthb.dz1@gmail.com';
    $mail->Password = 'usthb2021';
    $mail->setFrom('usthb.dz1@gmail.com', 'usthb');
    $mail->Subject = 'Verify your gmail !';
    $mail->Body = '<p>This is your verification code : <b>' . $_SESSION["code"] . "</b></p>";
    $mail->addAddress($_SESSION["gmail"]);
    if ($mail->send()) {
        return "sent";
    } else {
        return $mail->ErrorInfo;
    };
};

function who_signed_up()
{
    //This function inform me who signed up
    global $mail;
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '465';
    $mail->isHTML();
    $mail->Username = 'usthb.dz1@gmail.com';
    $mail->Password = 'usthb2021';
    $mail->setFrom('usthb.dz1@gmail.com');
    $mail->Subject = "Someone signed up!";
    $mail->Body = $_SESSION["first"] . " " . $_SESSION["last"] . " just signed up!";
    $mail->addAddress("adelgamer814@gmail.com");

    $mail->Send();
};

function send_gmail2($isHTML, $Subject, $Body, $to)
{
    //This function send gmail with content
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '465';
    $mail->isHTML($isHTML);
    $mail->Username = 'usthb.dz1@gmail.com';
    $mail->Password = 'usthb2021';
    $mail->setFrom('usthb.dz1@gmail.com');
    $mail->Subject = $Subject;
    $mail->Body = $Body;
    $mail->addAddress($to);

    $mail->Send();
};

function show_message($msg)
{
    return "<b>" . $msg . "</b>";
};

function filter_for_you($x, $list)
{
    $element = explode(";", $list[$x]);
    $groups = $element[1];
    $user_group = db_select_spicific($_SESSION["gmail"])[8];
    if (strpos($groups, $user_group) !== false) {
        $to_show = "<div class='borders'><b><u>" . $element[2] . "</u></b><p>" . str_replace("\n", "<br>", $element[3]) . "</p></div>";
        return $to_show;
    };
};

function gmail_sent_to($x)
{
    $post = scandir("post")[$x];
    if (str_contains($post, "foryou")) {
        $dir = "post//" . $post;
        $file = fopen($dir, "r");
        $post_content = fread($file, filesize($dir));
        fclose($file);
        $gmail_text = strtolower(explode(";", $post_content)[4]);
        return $gmail_text;
    } else {
        return "pass";
    }
};

function add_sent_gmail($x, $gmail)
{
    $post = scandir("post")[$x];
    $dir = "post//" . $post;
    $file = fopen($dir, "a");
    fwrite($file, ($gmail . "\n"));
    fclose($file);
};

function post_content($x)
{
    $post_name = scandir("post")[$x];
    $dir = "post//" . $post_name;
    $file = fopen($dir, "r");
    $content_text = fread($file, filesize($dir));
    $content = explode(";", $content_text);
    $text = $content[2] . "<br>" . $content[3];
    fclose($file);
    return $text;
};

function post_group($x)
{
    $post = scandir("post")[$x];
    if (str_contains($post, "foryou")) {
        $post_name = scandir("post")[$x];
        $dir = "post//" . $post_name;
        $file = fopen($dir, "r");
        $content_text = fread($file, filesize($dir));
        $content = explode(";", $content_text);
        $text = $content[1];
        fclose($file);
        return $text;
    } else {
        return "pass";
    };
};

function vip($gmail)
{
    $vip = db_select_spicific($gmail)[12];
    if ($vip == "on") {
        return true;
    } elseif ($vip == false) {
        return false;
    } else {
        return "error";
    };
};
