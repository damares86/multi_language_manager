// setting main language (root folder) and the other languages
var mainLang;
let arrLang=["en","fr"];

// var config = require('mlm/configJson');

fetch('mlm/config.json')
.then(response => {
   return response.json();
})
.then(jsondata => mainLang=jsondata[0].mainLang);

console.log("test "+mainLang);

// catch page name and if we are in a subfolder
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

// checking th language browser
var browserLanguage = window.navigator.userLanguage || window.navigator.language;


if (document.cookie.indexOf("lang=") >= 0) {
    
    // checking if exist get value "l" (it means that we passed from the translate file)
    // in case it exists, we change the cookie value
    var queryString = window.location.search;
    var urlParams = new URLSearchParams(queryString);
    if(urlParams.has('l')){
        var langGet=urlParams.get('l');
        var CookieDate = new Date, tmp;
        CookieDate.setFullYear(CookieDate.getFullYear() +10);
        document.cookie = "lang="+langGet+"; expires=" + CookieDate.toUTCString() + "; path=/";
    }

    // reading the cookie value
    langStr = document.cookie.indexOf("lang=");
    langStr = document.cookie.substring(langStr + 5, langStr + 7);
    
    console.log("lingua cookie: "+langStr);
    console.log("lingua get: "+langGet);
    console.log("cartella: "+folder);
    console.log("nome pagina: "+pagename);

    if(langStr!=folder){
        if(arrLang.includes(folder)){
            oldLang=folder;
        }else{
            oldLang=mainLang;
        }
       
        // window.location.href = 'mlm/translate.php?lang='+oldLang+'&new_lang='+langStr+'&page='+pagename;

    }
} else {
    // devo intercettare la lingua come variabile 'langStr'
    
    var browserLanguage = window.navigator.userLanguage || window.navigator.language;
    console.log("lingua browser: "+browserLanguage);
    var CookieDate = new Date, tmp;
    CookieDate.setFullYear(CookieDate.getFullYear() +10);
    document.cookie = "lang="+browserLanguage+"; expires=" + CookieDate.toUTCString() + "; path=/";

    if(browserLanguage!="it"||browserLanguage!="it-IT"){
        window.location.href = 'en/index.php?l=en';
    }
}
console.log("lingua cookie da browser: "+browserLanguage);