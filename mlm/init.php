<?php

session_start();

require "config.php";

// checking the browser language
$langServer=$_SERVER['HTTP_ACCEPT_LANGUAGE'];
$langArr=preg_split('/[,|;]/',$langServer);
$langArrSelected=$langArr[0];
$langArrFinal=explode('-',$langArrSelected);
$langBrowser=$langArrFinal[0];


setcookie("lang",$langBrowser, time()+ (3600),"/");
if(empty($_SESSION['refresh'])){
    $_SESSION['refresh']=1;
    ?>

    <script>
        window.location.reload();
    </script>

<?php
        }
