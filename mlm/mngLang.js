/////////////////////////////////////////////////
//          MULTI LANGUAGE MANAGER
//           A script by damares86 
//      (https://github.com/damares86)
/////////////////////////////////////////////////


// MAIN SETTINGS
// setting main language and the other languages

var mainLang = "it";
let arrLang=["en","fr"];

////////////////////////////////

// catch page name and the path position
var url = window.location.pathname;
var path = url.split("/");
var folder = path.at(-2);
var page = url.split("/").pop();
var pagename = page.split(".").shift();
if(!pagename){
    pagename="index";
}

// var for cookie language
var langStr;

// var for page language
var oldLang;
var main="";

if (document.cookie.indexOf("lang=") >= 0) {
    
    // reading the cookie value
    langStr = document.cookie.indexOf("lang=");
    langStr = document.cookie.substring(langStr + 5, langStr + 7);
   
    // now we will check if the language set match with the language folder
    // otherwise we will translate the page name and redirect the user
    if(langStr!=folder){
        if(arrLang.includes(folder)){
            oldLang=folder;
            main="&main=no";
            window.location.href = '../mlm/translate.php?lang='+oldLang+'&new_lang='+langStr+'&page='+pagename+main;
        }
    }

} else {
  
    // this will read the browser language and create a cookie with it    
    var browserLanguage = window.navigator.userLanguage || window.navigator.language;
    console.log("lingua browser: "+browserLanguage);
    var CookieDate = new Date, tmp;
    CookieDate.setFullYear(CookieDate.getFullYear() +10);
    var language = browserLanguage.split("-").shift(); 

    document.cookie = "lang="+language+"; expires=" + CookieDate.toUTCString() + "; path=/";

    // now we will check if the language set match with the language folder
    // otherwise we will translate the page name and redirect the user
    if(langStr!=folder){
        if(arrLang.includes(folder)){
            oldLang=folder;
        }else{
            oldLang=mainLang;
        }
       
        window.location.href = 'mlm/translate.php?lang='+oldLang+'&new_lang='+langStr+'&page='+pagename;
    }
}