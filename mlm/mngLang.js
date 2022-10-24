var url = window.location.pathname;
var path = url.split("/");
var folder = path.at(-2);
var page = url.split("/").pop();
var pagename = page.split(".").shift();
if(!pagename){
    pagename="index";
}
var langStr;
var browserLanguage = window.navigator.userLanguage || window.navigator.language;

var queryString = window.location.search;
var urlParams = new URLSearchParams(queryString);

if (document.cookie.indexOf("lang=") >= 0) {

    // verifico se sono stato reindirizzato qui dal translate
    if(urlParams.has('l')){
        var langGet=urlParams.get('l');
        var CookieDate = new Date, tmp;
        CookieDate.setFullYear(CookieDate.getFullYear() +10);
        document.cookie = "lang="+langGet+"; expires=" + CookieDate.toUTCString() + "; path=/";
    }

    langStr = document.cookie.indexOf("lang=");
    langStr = document.cookie.substring(langStr + 5, langStr + 7);
    
    console.log("lingua cookie: "+langStr);
    console.log("lingua get: "+langGet);
    console.log("cartella: "+folder);
    console.log("nome pagina: "+pagename);

    if(langStr!="it"){
        window.location.href = 'mlm/translate.php?lang=it&new_lang=en&page='+pagename;
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