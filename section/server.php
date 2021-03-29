<?php
include "var.php";
// ignore_user_abort(true);
// set_time_limit(0);
$result = db_select_all();
$files = scandir("post");
$length = count($files);
while ($row = $result->fetch_assoc()) {
    for ($x = 0; $x < $length; $x++) {
        $gmails = gmail_sent_to($x);
        $post_group = post_group($x);
        if ($gmails != "pass") {
            if (strpos($gmails,  strtolower($row["gmail"])) === false and strpos($post_group, $row["grp"]) !== false) {
                send_gmail2(true, "For you !", post_content($x), $row["gmail"]);
                add_sent_gmail($x, $row["gmail"]);
            };
        };
    };
};
