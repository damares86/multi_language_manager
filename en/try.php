<?php

// require '../phpDebug/src/Debug/Debug.php';   			// if not using composer

// $debug = new \bdk\Debug(array(
//     'collect' => true,
//     'output' => true,
// ));

require "../mlm/config.php";



    print_r("Cookie: ".$_COOKIE['lang']);
?>
<br>
<br>
<br>
<a href="../mlm/translate.php?lang=en&page=<?=$page_name?>&new_lang=it">it</a>
