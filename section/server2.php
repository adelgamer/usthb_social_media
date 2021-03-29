<?php
include "var.php";

$result = db_select_all();
while ($row = $result->fetch_assoc()) {
    $unfilled_detailes = array();
    if ($row["phone"] == "") {
        array_push($unfilled_detailes, "phone number");
    };

    if ($row["fb"] == "") {
        array_push($unfilled_detailes, "Facebook link");
    };

    if ($row["instagram"] == "") {
        array_push($unfilled_detailes, "Instagram username");
    };

    if ($row["birthday"] == "") {
        array_push($unfilled_detailes, "birhtday");
    };

    if ($row["gender"] == "") {
        array_push($unfilled_detailes, "gender");
    };

    if ($row["matricule"] == "") {
        array_push($unfilled_detailes, "matricule");
    };
    if (!empty($unfilled_detailes)) {
        $unfilled = array_rand($unfilled_detailes, 1);
        $unfilled_value = $unfilled_detailes[$unfilled];
        $body = "<p>Your <b>$unfilled_value</b> isn't set in your account ! <br>Do you wanna <a href='usthb.epizy.com'>add it?</a></p>";
        send_gmail2(true, "Set up profile", $body, $row["gmail"]);
    };
};
