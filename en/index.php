<?php
// print_r("New cookie: ".$_COOKIE['lang']);
// exit;
?>
<script src="../mlm/mngLang.js"></script>
<?php
session_start();

unset($_SESSION['refresh']);
?>
<?php
    $file = basename($_SERVER['PHP_SELF']);
    $page_name = pathinfo($file, PATHINFO_FILENAME);

    echo "Cookie: ".$_COOKIE['lang'];
    // print_r($_COOKIE['language']);
    // exit;
?>
<br>
<br>
<br>
<a href="../mlm/translate.php?lang=en&page=<?=$page_name?>&new_lang=it">it</a>
