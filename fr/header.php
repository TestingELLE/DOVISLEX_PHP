<script>
  /*  Google translator uses a cookie called 'googtrans' to track which 
   *  language is selected. By setting googtrans cookie to '/en/it', translator 
   *  will use that information to translate the current page into Italian.
   *   
   *  Google translator is a client-side language translator that provides
   *  client a way to choose a different language using the Google translator 
   *  widget. Because the widget is hidden from the client, a cookie must 
   *  be used to tell the translator to what language it should translate to. 
   *  
   *  This seems to work just as well
   *  Cookies.set('googtrans', '/en/fr', {path: ''});
   */

 Cookies.set('googtrans', '/en/fr', {expires: 3, path: ''});
 Cookies.set('googtrans', '/en/fr', {expires: 3, path: '/'});
 // it seems that if we don't set this second one explicitly, the browser (or at least Chrome) sets it automatically.
 Cookies.set('googtrans', '/en/fr', {domain: '.localhost', path: ''}); //needed for safari or localhost ?!
 
  
 /*  Function below is provided by Google, needed to translate the page */
  function googleTranslateElementInit() {
      new google.translate.TranslateElement({
          pageLanguage: 'en',
          includedLanguages: 'de,en,es,fr,it,la,ru',
          autoDisplay: false,
          multilanguagePage: true
      }, 'google_translate_element');
  }
</script>

<style>
  /*  Changes the color of the button selected to indicate that current page is
   *  in English */
  #lang-change-fr {
    background-color: #B09B4C;
  }
</style>

<!-- Script below is provided by Google, needed to translate the page -->
<script type='text/javascript' src='//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'></script>        

<div class="notranslate">
  <div id="stars">
    <!-- creates a hidden div on top of the page where the stars are displayed
         right clicking on the div will lead to a new page -->
    <div oncontextmenu="javascript:window.location.href = '../privato/index.php';" 
         style="opacity: 0; width: 50px; height:50px; left: 23px; cursor:default; 
         background-color:red; position: absolute;"></div>
    <h1>Donà Viscardini </h1>
  </div>
  <h4> Studio legale • Cabinet d'Avocats • International Law Firm • Anwaltskanzlei • Abogados</h4>

  <?php include '../commonHTML/commonHeader.php'; ?>

  <div class="middle-bar"></div>
</div>