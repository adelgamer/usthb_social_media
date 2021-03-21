<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify your account</title>
</head>
<?php
include "var.php";
session_start();
if (isset($_POST["code"]) and $_POST["code"] == $_SESSION["code"]) {
    db_insert();
    who_signed_up();
    $name = $_SESSION["first"];
    $body = "<h1>Congratulation! you are signed up now!</h1>
    <p>You can go now set up your account like adding birthday, gender...</p>
    <br><p>It's up to you you can do it anytime you want.</p>";
    send_gmail2(true, "Congratulation you just signed up successfully", $body, $_SESSION["gmail"]);
    header("Location: profile.php");
}elseif(isset($_POST["code"]) and $_POST["code"] != $_SESSION["code"]){
    echo "<p>Code is incorrect !</p>";
};
?>

<body>
    <h1>Enter the code:</h1>
    <p>A code with 6 digit is sent to your gmail copy/paste here.</p>
    <p>Note: If you don't verify your gmail your account won't be saved.</P>
    <form action="verify.php" method="POST">
        <label for="code">Enter the code :</label>
        <input type="text" name="code"  minlength="6" maxlength="6" placeholder="xxxxxx">
        <input type="submit">
    </form>
</body>

</html>