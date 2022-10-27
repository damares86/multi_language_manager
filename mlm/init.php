<?php
require '../phpDebug/src/Debug/Debug.php';   			// if not using composer

$debug = new \bdk\Debug(array(
    'collect' => true,
    'output' => true,
));

session_start();

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
$folder=filter_input(INPUT_GET,"folder");

if(in_array($folder,$arr_lang)){
    $oldLang=$folder;
}else{
    $oldLang=$main_lang;
}

header('Location: ../mlm/translate.php?lang='.$oldLang.'&new_lang='.$langBrowser.'&page='.$page.'');
exit;

