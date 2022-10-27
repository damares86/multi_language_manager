# Multi Language Manager
A simple script to manage user browser language and user language choice using cookies. Automatically redirect user on the page of his language using a json legend.

## Download
Simpy download the latest release from this repository (menu on the right).

## How to use
You need to understand the structure that works with this script:
* the website root must contain the pages in the main language (es. english)
* the pages of the other languages must be in subfolders named as the first two letters of the language (es. "it" for "italian")
* you must define the main language and the other languages in the config file (see below)

Now we can go deeper and begin to setup the script (no panic, it will be easy).

## Configuration
This is the basic structure of a website using Multi Language Manager

![image](https://user-images.githubusercontent.com/85158984/198281247-d99c693d-7784-485a-8621-a54e5e9f6c55.png)

The root folder contains the pages in the main language (which is english in this case). The "it" and "es" contains the pages in italian and spanish.
The "mlm" folder is where there's the script, let's have a look:

![image](https://user-images.githubusercontent.com/85158984/198281965-845d50f9-4738-4eca-b219-167cb0b351a8.png)


### Step-by-step

Open the `config.php` file and change the default settings with the language that you use
```php
// set the root of the website 
$root="http://boots.local";


// set the main language and an array with the other languages
// NOTE: keep the same pattern, using the first 2 letters of the
// languages; that will be also the name of the subfolder

$main_lang="en";
$arr_lang=array('it','es');
```
---
The next step is to create a dictionary, so the script will know that, for example, the italian version of the english page "test_page.php" is "pagina_di_prova.php".
I used a json file for this purpose (ps if you don't know what is it don't panic, just follow the pattern of the example)
```json
[
{
    "en" : "index",
    "es" : "index",
    "it" : "index"

},
{
    "en" : "test_page",
    "es" : "pagina_de_prueba",
    "it" : "pagina_di_prova"
}
]
```

As you can see, every element of the json contains the name of the file (without the extension) of the same pages in every language, so the script can redirect the user to the correct page when he decide to change language.

---

Now you have to copy and paste (and adapt) these few lines of code (ps when you will download the latest release of the script you will aleady find this code on the top of the pages)
```php
<?php
/////////////////////////////////////////////////
//          MULTI LANGUAGE MANAGER
//           A script by damares86 
//      (https://github.com/damares86)
/////////////////////////////////////////////////

// set the language of the page
$actual_lang="en";

require "mlm/config.php";
require "mlm/redir.php";
?>
```
The only thing you have to do (and it's very important) is that in every page you assign the right language to the variable `$actual_lang`. The code in this example arrives from an english page.

---

The last thing you need to know is how to create link for the language selection and the page translation. When you download the latest release you will find a dropdown menu with the available languages.
You can choose your own way to manage the language selection, the only thing that is important is to use this link structure:
```html
<a href="mlm/translate.php?lang=<?=$actual_lang?>&page=<?=$page_name?>&new_lang=en">English</a>

<!-- if you are in a subfolder, you must adapt the relative path, so use the one below

<a href="../mlm/translate.php?lang=<?=$actual_lang?>&page=<?=$page_name?>&new_lang=en">English</a>

-->
```
At the end of the url you will change `en` with the language you need (e.g. "it") and the label of the link (e-g- "Italiano").

### And now?
We have finished!

From now on, every time you add a new page in your website and you add also the translation for the other languages, just keep in mind these simple things:
* copy and paste the code on the top of the page
* set the correct language in the variable `$actual_lang`
* update the dictionary `pages.json` with the names of the page in the various languages
* if you add a new language, create the subfolder with the pages and add the language name ("it") in the `$arr_lang` array in `config.php` files

#### If you have question or you find bugs, just open an issue, otherwise... Enjoy!

