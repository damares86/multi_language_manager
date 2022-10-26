<?php

session_start();
$lang=filter_input(INPUT_GET,"lang");
$new_lang=filter_input(INPUT_GET,"new_lang");
$page=filter_input(INPUT_GET,"page");
$main="";
if(filter_input(INPUT_GET, "main")){
    $main="&main=no";
}
// print_r("Sessione: ".$_SESSION['refresh']);
// exit;
$json_file = 'pages.json';
$data = file_get_contents($json_file);
$json_arr = json_decode($data, true);

$new_page="";

for($i=0;$i<count($json_arr);$i++){
    
    if($json_arr[$i][$lang]=="$page"){
        $new_page=$json_arr[$i][$new_lang];
        echo "Old: ".$_COOKIE['lang'];
        setcookie("lang",$new_lang, time()+ (3600));
        if(empty($_SESSION['refresh'])){
            $_SESSION['refresh']=1;
            ?>

            <script>
                window.location.reload();
            </script>

        <?php
                }
            
                // echo "New: ".$_COOKIE['lang'];
                // exit;
        $folder="";


        if(filter_input(INPUT_GET,"main")){
            $folder=$new_lang."/";
        }

        header("Location: ../".$folder.$page.".php");
        exit;
                ?>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


        <script>
            var queryString = window.location.search;
            var urlParams = new URLSearchParams(queryString);
            var newLang=urlParams.get('new_lang');
            console.log(newLang);
            function changeCookie(newLang)
            {
                data = 'new_lang='+newLang;
                $.ajax({
                    type: "POST",
                    url: 'change.php',
                    data: data,
                    dataType: 'html'
                    });
            }

            changeCookie(newLang);
        </script> -->
<?php
        
        header("Location: change.php?new_lang=$new_lang&page=$new_page".$main."");
        exit;
        
    }
}
        ?>


<!--  -->

        <!-- <script>
            // take the new_lang param and change the cookie value
            var queryString = window.location.search;
            var urlParams = new URLSearchParams(queryString);
            var newLang=urlParams.get('new_lang');
            var CookieDate = new Date, tmp;
            CookieDate.setFullYear(CookieDate.getFullYear() +10);
            document.cookie = "lang="+newLang+"; expires=" + CookieDate.toUTCString() + "; path=/";
            
        </script> -->

        <?php
        // $folder="";


        // if(filter_input(INPUT_GET,"main")){
        //     $folder="$new_lang/";
        // }

        // header("Location: ../".$folder.$new_page.".php");
        // exit;
    



?>