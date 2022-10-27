<?php

require 'phpDebug/src/Debug/Debug.php';   			// if not using composer

$debug = new \bdk\Debug(array(
    'collect' => true,
    'output' => true,
));

require "mlm/config.php";

$file = basename($_SERVER['PHP_SELF']);
$page_name = pathinfo($file, PATHINFO_FILENAME);
$path=explode('/',$_SERVER['PHP_SELF']);
$idx=count($path)-2;
$folder=$path[$idx];

if(!isset($_COOKIE['lang'])){
    header("Location: mlm/init.php?page=$page_name&folder=$folder");
    exit;
}

print_r("Cookie: ".$_COOKIE['lang']);
?>
<br>
<br>
<br>
<a href="mlm/translate.php?lang=it&main=no&page=<?=$page_name?>&new_lang=en">en</a><br>
