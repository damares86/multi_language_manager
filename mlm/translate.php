<?php

session_start();
$lang=filter_input(INPUT_GET,"lang");
$new_lang=filter_input(INPUT_GET,"new_lang");
$page=filter_input(INPUT_GET,"page");
$main="";
if(filter_input(INPUT_GET, "main")){
    $main="&main=no";
}

$json_file = 'pages.json';
$data = file_get_contents($json_file);
$json_arr = json_decode($data, true);

$new_page="";

for($i=0;$i<count($json_arr);$i++){
    
    if($json_arr[$i][$lang]=="$page"){
        $new_page=$json_arr[$i][$new_lang];
        setcookie("lang",$new_lang, time()+ (3600),"/");
        if(empty($_SESSION['refresh'])){
            $_SESSION['refresh']=1;
            ?>

            <script>
                window.location.reload();
            </script>

        <?php
                }
        $folder="";


        if(filter_input(INPUT_GET,"main")){
            $folder=$new_lang."/";
        }

        header("Location: ../".$folder.$page.".php");
        exit;
    }
}
                ?>
