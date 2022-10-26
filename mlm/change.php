<?php
$new_lang=filter_input(INPUT_GET,"new_lang");
$page=filter_input(INPUT_GET,"page");
$main="";

// print_r($_COOKIE['lang']);
// exit;

$folder="";


if(filter_input(INPUT_GET,"main")){
    $folder=$new_lang;
}

header("Location: ../".$folder."/".$page.".php");
exit;

