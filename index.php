<?php

/////////////////////////////////////////////////
//          MULTI LANGUAGE MANAGER
//           A script by damares86 
//      (https://github.com/damares86)
/////////////////////////////////////////////////

// COPY FROM THIS LINE 
require "mlm/config.php";
require "mlm/redir.php";


// TO THIS LINE AND PASTE AT THE TOP OF THE PAGE

print_r("Cookie: ".$_COOKIE['lang']);
?>
<br>
<br>
<br>
<a href="mlm/translate.php?lang=it&main=no&page=<?=$page_name?>&new_lang=en">en</a><br>
