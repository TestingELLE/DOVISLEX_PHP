<?php
if (isset($_GET['accept-cookies'])) {
    /* cookie notice banner accepted for one year or untill they clear history */
    setcookie('accept-cookies', 'cookies-notice-banner-accepted', time() + 31556925);
    header('Location: ./index.php'); /* refresh this page */
}
?>

<?php 
    $page = $_GET['page'];
    switch ($page) {
        case "Servizi":
            $page = "Servizi.html";
            $title = "Servizi";
            break;
        case "USA360":
            $page = "USA360.html";
            $title = "USA-360°";
            break;
        case "USArealEstate":
            $page = "USArealEstate.html";
            $title = "Real Estate USA";
            break;
        case "about-us":
            $page = "about-us.html";
            $title = "About us";
            break;
        case "arbitration":
            $page = "arbitration.html";
            $title = "ADR";
            break;
        case "azioni_UE":
            $page = "azioni_UE.html";
            $title = "azioni_UE";
            break;
        case "bibliografia":
            $page = "bibliografia.html";
            $title = "Bibliografia";
            break;
        case "biblios":
            $page = "biblios.html";
            $title = "Biblios";
            break;
        case "concorrenza":
            $page = "concorrenza.html";
            $title = "Concorrenza";
            break;
        case "contact-us":
            $page = "contact-us.php";
            $title = "Contact Us";
            break;
        case "contenzioso":
            $page = "contenzioso.php";
            $title = "Contenzioso";
            break;
        case "contracts":
            $page = "contracts.html";
            $title = "Contracts";
            break;
        case "document_form":
            $page = "document_form.html";
            $title = "Document Form";
            break;
        case "germania360":
            $page = "germania360.html";
            $title = "Consulenza 360° in Germania";
            break;
        case "import-export":
            $page = "import-export.html";
            $title = "Import - Export";
            break;
        case "news":
            $page = "news.html";
            $title = "NOVAE";
            break;
        case "news_1":
            $page = "news_1.html";
            $title = "NOVAE";
            break;
        case "penale-amministrativo":
            $page = "penale-amministrativo.html";
            $title = "Penale & Doganale";
            break;
        case "privacy_en":
            $page = "privacy_en.html";
            $title = "Privatezza";
            break;
        case "privatezza":
            $page = "privatezza.html";
            $title = "Privatezza";
            break;
        case "professionisti":
            $page = "professionisti.php";
            $title = "Professionisti";
            break;
        case "professionisti_1":
            $page = "professionisti_1.html";
            $title = "Professionisti";
            break;
        case "professionisti_2":
            $page = "professionisti_2.html";
            $title = "Professionisti";
            break;
        case "scambi":
            $page = "scambi.html";
            $title = "Scambi Intra EU";
            break;
        case "settori":
            $page = "settori.html";
            $title = "Agricoltura, Pesca, Industria, Ambiente";
            break;
        case "sitemap":
            $page = "sitemap.html";
            $title = "Site Map";
            break;
        case "terms_en":
            $page = "terms_en.html";
            $title = "Terms";
            break;
        case "terms_it":
            $page = "terms_it.html";
            $title = "Terms";
            break;
        case "trademarks":
            $page = "trademarks.html";
            $title = "Trademarks";
            break;
        case "uffici":
            $page = "uffici.html";
            $title = "Uffici";
            break;
        default:
           $page = "de_nobis.php";
           $title = "De Nobis - About us";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php print $title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>

        <!--All page specific code goes above this line which loads the common head-->
        <script src="../js/load-head.js"></script>
    </head>

    <body>
        
        <?php
        /* show banner if cookies is not accepted */
        if (!isset($_COOKIE['accept-cookies'])) {

            include ('../cookie-notice-banner/cookie-notice-banner.html');
            /* JQuery so the banner slides down and css for cookie notice banner */
            echo '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>'
               . '<script src="../cookie-notice-banner/cookie-notice-banner.js"></script>';
        }
        ?>
        
        <div id="supra-header"></div>
        <div id="page">
            <div id="header"> 
                <?php include('header.html'); ?> 
            </div>
            <div id="main-container" class="clear"> 
                <div id="tableDiv">
                    <?php include($page); ?>

                    <?php 
                        $noButtonList = array(  'Servizi.html',
                                                'USArealEstate.html',
                                                'bibliografia.html', 
                                                'contenzioso.php', 
                                                'professionisti.php', 
                                                'sitemap.html',
                                                'uffici.html');
                        if (!in_array($page, $noButtonList)) {
                           echo "<div id='buttons-container'>";
                           include('buttons.html');
                           echo "</div>";
                        }
                    ?>
                </div>
            </div>
          
            <nav id="navigation"> 
                <?php include('navigation.html'); ?> 
            </nav>
            <footer id="colophon" class="clearfix notranslate"> 
                <?php include('footer.html'); ?> 
            </footer>
        </div>
    </body>
</html>