<?php // enter php code here ?>


<div class= "btn">
    <!--Created an id for all links below following the 
        'lang-change-xx' pattern that already existed for EN and ES,
        Changed the class name so that all links share the same class 
        name, and changed href attributes to call a function -->
    <a id ="lang-change-en" class="btn_language" 
       href="javascript:changeLang('lang-change-en');">EN</a>
    <a id= "lang-change-es" class="btn_language" 
       href="javascript:changeLang('lang-change-es');">ES</a>
      <!-- this was for control-click oncontextmenu="javascript:window.location.href = '../sp/index.php?page=index';" href="javascript:changeLang('lang-change-es');">SP</a>
      -->
    <a id= "lang-change-fr" class="btn_language" 
      href="javascript:changeLang('lang-change-fr');">FR</a>
    <a id= "lang-change-de" class="btn_language" 
       href="javascript:changeLang('lang-change-de');">DE</a>
    <a id= "lang-change-it" class="btn_language" 
       href="javascript:changeLang('lang-change-it');">IT</a>
  </div>

