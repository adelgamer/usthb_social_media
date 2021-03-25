<?php 
include "var.php";
ignore_user_abort(true);
set_time_limit(0);

while (true){
    $result = db_select_all();
    $files = scandir("post");
    $length = count($files);
    while ($row = $result->fetch_assoc()){
        for ($x = 0; $x < $length; $x++){
            $gmails = gmail_sent_to($x);
            $post_group = post_group($x);
            if ($gmails != "pass"){
            if (!str_contains($gmails ,  strtolower($row["gmail"]) and str_contains($post_group, $row["grp"]))){
                send_gmail2(true, "For you !", post_content($x), $row["gmail"]);
                add_sent_gmail($x, $row["gmail"]);
            };
        };
        };
    };
    sleep(1800);
};