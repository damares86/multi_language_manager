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

print_r($lang);
echo "<br>";
print_r($new_lang);
echo "<br>";
print_r($page);

$json_file = 'pages.json';
$data = file_get_contents($json_file);
$json_arr = json_decode($data, true);

$new_page="";

for($i=0;$i<count($json_arr);$i++){

    if($json_arr[$i][$lang]=="$page"){
        $new_page=$json_arr[$i][$new_lang];
        if($new_lang=="it"){
            header("Location: ../../$new_page.php?l=$new_lang");
            exit;
        }else{
            header("Location: ../../$new_lang/$new_page.php?l=$new_lang");
            exit;
        }
    }
}



?>