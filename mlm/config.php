<?php

/////////////////////////////////////////////////
//          MULTI LANGUAGE MANAGER
//           A script by damares86 
//      (https://github.com/damares86)
/////////////////////////////////////////////////

// set the root of the website
$root="http://boots.local/multilang/";


// set the main language and an array with the other languages
// NOTE: keep the same pattern, using the first 2 letters of the
// languages; that will be also the name of the subfolder

$main_lang="en";
$arr_lang=array('it','es');


// catch the name of the page file
// this will allow to translate it using the json file

$path=explode('/',$_SERVER['PHP_SELF']);
$file = basename($_SERVER['PHP_SELF']);
$page_name = pathinfo($file, PATHINFO_FILENAME);
$path=explode('/',$_SERVER['PHP_SELF']);
$idx=count($path)-2;
$folder=$path[$idx];




