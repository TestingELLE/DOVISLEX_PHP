<?php 
    $page = $_GET['page'];
    switch ($page) {
        case "USArealEstate":
            $page = "USArealEstate.html";
            $title = "Real Estate USA";
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
            $title = "Bibliography";
            break;
        case "biblios":
            $page = "biblios.html";
            $title = "Biblios";
            break;
        case "concorrenza":
            $page = "concorrenza.html";
            $title = "Competition";
            break;
        case "contact-us":
            $page = "contact-us.html";
            $title = "Contact Us";
            break;
        case "contenzioso":
            $page = "contenzioso.php";
            $title = "Cases";
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
            $title = "Germany 360";
            break;
        case "import-export":
            $page = "import-export.html";
            $title = "Import - Export";
            break;
        case "news":
            $page = "news.html";
            $title = "NEWS";
            break;
        case "penale-amministrativo":
            $page = "penale-amministrativo.html";
            $title = "Criminal and administrative";
            break;
        case "privacy_en":
            $page = "privacy_en.html";
            $title = "Privatezza";
        case "privatezza":
            $page = "privatezza.html";
            $title = "Privatezza";
            break;
        case "professionisti":
            $page = "professionisti.html";
            $title = "Professionals";
            break;
        case "scambi":
            $page = "scambi.html";
            $title = "Intra-EU trade";
            break;
        case "settori":
            $page = "settori.html";
            $title = "Agriculture, Fishing, Industry, Environment";
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
           $page = "index.html";
           $title = "Domus - About us";
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

    <body onload="loadSiteParts(); loadContents();">
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
                                                'professionisti_1.html', 
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