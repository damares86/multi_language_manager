<script>
    
    var queryString = window.location.search;
    var urlParams = new URLSearchParams(queryString);
    var lang = urlParams.get('lang');
    var new_lang = urlParams.get('new_lang');
    var page = urlParams.get('page');

    console.log(lang);
    console.log(new_lang);
    console.log(page);
</script>