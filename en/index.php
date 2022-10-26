<!-- <script>
    var home="../";
</script>
<script src="../mlm/mngLang.js"></script> -->
<?php
session_start();
unset($_SESSION['refresh']);
$path=explode('/',$_SERVER['PHP_SELF']);

print_r($path);
exit;

require "../mlm/config.php";
?>
<?php
    $file = basename($_SERVER['PHP_SELF']);
    $page_name = pathinfo($file, PATHINFO_FILENAME);

    print_r("Cookie: ".$_COOKIE['lang']);
?>
<br>
<br>
<br>
<a href="../mlm/translate.php?lang=en&page=<?=$page_name?>&new_lang=it">it</a>
