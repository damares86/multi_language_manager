
<script src="mlm/mngLang.js"></script>
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
<a href="mlm/translate.php?lang=it&main=no&page=<?=$page_name?>&new_lang=en">en</a>