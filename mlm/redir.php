<?php

/////////////////////////////////////////////////
//          MULTI LANGUAGE MANAGER
//           A script by damares86 
//      (https://github.com/damares86)
/////////////////////////////////////////////////


// catch the name of the page file
// this will allow to translate it using the json file

$file = basename($_SERVER['PHP_SELF']);
$page_name = pathinfo($file, PATHINFO_FILENAME);

// check if exist a language cookie
// otherwise redirect to init.php to create one

if(!isset($_COOKIE['lang'])){
    header("Location: ".$root."mlm/init.php?page=$page_name&lang=$actual_lang");
    exit;
}


// if exist a cookie, this will check if the position in the website
// match with the language, otherwise redirect to translate.php
if($_COOKIE['lang']!=$actual_lang){
    if(in_array($actual_lang,$arr_lang)){
        header('Location: '.$root.'mlm/translate.php?lang='.$actual_lang.'&new_lang='.$_COOKIE['lang'].'&page='.$page_name.'');
        exit;
    }else{
        if($_COOKIE['lang']!=$main_lang){
            header('Location: '.$root.'mlm/translate.php?lang='.$main_lang.'&new_lang='.$_COOKIE['lang'].'&page='.$page_name.'');
            exit;
        }
    }
}