<?php

$str1 = "kk";
$str2 = "kp";
if (strpos($str1, $str2) !== false){//Exist
    echo "Here1";
}elseif(strpos($str1, $str2) === false){//Doesn't exist
    echo "Here2";
};