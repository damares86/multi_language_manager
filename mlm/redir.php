<?php

/////////////////////////////////////////////////
//          MULTI LANGUAGE MANAGER
//           A script by damares86 
//      (https://github.com/damares86)
/////////////////////////////////////////////////


// check if exist a language cookie
// otherwise redirect to init.php to create one

if(!isset($_COOKIE['lang'])){
    header("Location: '.$root.'mlm/init.php?page=$page_name&folder=$folder");
    exit;
}


// if exist a cookie, this will check if the position in the website
// match with the language, otherwise redirect to translate.php
if($_COOKIE['lang']!=$folder){
    if(in_array($folder,$arr_lang)){
        header('Location: '.$root.'mlm/translate.php?lang='.$folder.'&new_lang='.$_COOKIE['lang'].'&page='.$page_name.'');
        exit;
    }else{
        if($_COOKIE['lang']!=$main_lang){
            header('Location: '.$root.'mlm/translate.php?lang='.$main_lang.'&new_lang='.$_COOKIE['lang'].'&page='.$page_name.'');
            exit;
        }
    }
}