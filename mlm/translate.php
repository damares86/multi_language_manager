<!-- <script>
    
    var queryString = window.location.search;
    var urlParams = new URLSearchParams(queryString);
    var lang = urlParams.get('lang');
    var new_lang = urlParams.get('new_lang');
    var page = urlParams.get('page');

    console.log(lang);
    console.log(new_lang);
    console.log(page);
</script> -->

<?php

$lang=filter_input(INPUT_GET,"lang");
$new_lang=filter_input(INPUT_GET,"new_lang");
$page=filter_input(INPUT_GET,"page");

$json_file = 'pages.json';
$data = file_get_contents($json_file);
$json_arr = json_decode($data, true);

$new_page="";

for($i=0;$i<count($json_arr);$i++){

    if($json_arr[$i][$lang]=="$page"){
        $new_page=$json_arr[$i][$new_lang];
        ?>

        <script>
            // take the new_lang param and change the cookie value
            var queryString = window.location.search;
            var urlParams = new URLSearchParams(queryString);
            var newLang=urlParams.get('new_lang');
            var CookieDate = new Date, tmp;
            CookieDate.setFullYear(CookieDate.getFullYear() +10);
            document.cookie = "lang="+newLang+"; expires=" + CookieDate.toUTCString() + "; path=/";
            console.log("new lang: "+newLang);
        </script>

        <?php
        $folder="";

        if(filter_input(INPUT_GET,"main")){
            $folder="$new_lang/";
        }

        header("Location: ../".$folder.$new_page.".php");
        exit;
    
    }
}



?>