<?php

/////////////////////////////////////////////////
//          MULTI LANGUAGE MANAGER
//           A script by damares86 
//      (https://github.com/damares86)
/////////////////////////////////////////////////

require "config.php";

$subfolder="";
$oldLang="";

// checking the browser language
$langServer=$_SERVER['HTTP_ACCEPT_LANGUAGE'];
$langArr=preg_split('/[,|;]/',$langServer);
$langArrSelected=$langArr[0];
$langArrFinal=explode('-',$langArrSelected);
$langBrowser=$langArrFinal[0];

// set the cookie with the browser language
setcookie("lang",$langBrowser, time()+(10 * 365 * 24 * 60 * 60),"/");

// catch the language of the page from we arrived here
// and the page name
$page=filter_input(INPUT_GET,"page");
$start_lang=filter_input(INPUT_GET,"lang");

if(in_array($start_lang,$arr_lang)){
    $oldLang=$start_lang;
}else{
    $oldLang=$main_lang;
}

header('Location: ../mlm/translate.php?lang='.$oldLang.'&new_lang='.$langBrowser.'&page='.$page.'');
exit;

