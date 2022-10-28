<?php
// COPY FROM THIS LINE 

/////////////////////////////////////////////////
//          MULTI LANGUAGE MANAGER
//           A script by damares86 
//      (https://github.com/damares86)
/////////////////////////////////////////////////

// set the language of the page
$actual_lang="en";

require "mlm/config.php";
require "mlm/redir.php";

// TO THIS LINE AND PASTE AT THE TOP OF EVERY PAGE

?>

<!-- SAMPLE LINK (MAIN LANGUAGE PAGE IN WEBSITE ROOT)-->
<a class="dropdown-item" href="mlm/translate.php?lang=<?=$actual_lang?>&page=<?=$page_name?>&new_lang=it">Italian</a>
