<?php
// $new_lang=filter_input(INPUT_GET,"new_lang");
// $page=filter_input(INPUT_GET,"page");
// $main="";

// // print_r($_COOKIE['lang']);
// // exit;

// $folder="";


// if(filter_input(INPUT_GET,"main")){
//     $folder=$new_lang;
// }

// header("Location: ../".$folder."/".$page.".php");
// exit;
$new_lang=$_POST["new_lang"];
setcookie("lang",$new_lang, time()+ (3600));
