<?php

/////////////////////////////////////////////////
//          MULTI LANGUAGE MANAGER
//           A script by damares86 
//      (https://github.com/damares86)
/////////////////////////////////////////////////

require "config.php";

$lang=filter_input(INPUT_GET,"lang");
$new_lang=filter_input(INPUT_GET,"new_lang");
$page=filter_input(INPUT_GET,"page");

$json_file = 'pages.json';
$data = file_get_contents($json_file);
$json_arr = json_decode($data, true);

$new_page="";

// cycle the json file to find the page from we arrive
// and then take the new page name, based on language
for($i=0;$i<count($json_arr);$i++){
    
    if($json_arr[$i][$lang]=="$page"){
        $new_page=$json_arr[$i][$new_lang];
        setcookie("lang",$new_lang, time()+ (3600),"/");
        $subfolder="";
        
        // if it's not the main lang, we need to add its subfolder to the url
        if(in_array($new_lang,$arr_lang)){
            $oldLang=$folder;
            $subfolder=$new_lang."/";
        }else{
            $oldLang=$main_lang;
        }
        
        header("Location: ../".$subfolder.$new_page.".php");
        exit;
    }
}

?>
