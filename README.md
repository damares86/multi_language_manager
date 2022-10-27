# Multi Language Manager
A simple script to manage user browser language and user language choice using cookies. Automatically redirect user on the page of his language using a json legend.

## Download
Simpy download the latest release from this repository (menu on the right).

## How to use
You need to understand the structure that works with this script:
* the website root will contain the pages in the main language (es. english)
* the pages of every other language must be in subfolders name as the first letters of the language (es. "it" for "italian")
* you must define the main language and the other languages in the config file
Now we can go deeper and begin to setup the script (no panic, it will be easy).

## Configuration
This is the basic structure of a website using Multi Language Manager

![image](https://user-images.githubusercontent.com/85158984/198281247-d99c693d-7784-485a-8621-a54e5e9f6c55.png)

The root folder contains the pages in english, which is the main language. The "it" and "es" contains the pages in italian and spanish.
The "mlm" folder is where there's the script, let's have a look:

![image](https://user-images.githubusercontent.com/85158984/198281965-845d50f9-4738-4eca-b219-167cb0b351a8.png)


### Step-by-step
* open the `config.php` file and change the default settings with the language that you use
```php
// set the root of the website 
$root="http://boots.local";


// set the main language and an array with the other languages
// NOTE: keep the same pattern, using the first 2 letters of the
// languages; that will be also the name of the subfolder

$main_lang="en";
$arr_lang=array('it','es');
```

* the next step is to create a dictionary, so the script will know that, for example, the italian versione of "test_page.php" in english is "pagina_di_prova.php".
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
As you can see, every element of the json contains the name of the file of the same pages in every language, so the script can redirest the user to the correct page when he decide to change language.
