<?php
//  /de/index.php
if (isset($_GET['accept-cookies'])) {
    // Set cookie to indicate acceptance of cookies banner for a certain duration
    setcookie('accept-cookies', 'cookies-notice-banner-accepted', time() + 16000000);
    header('Location: ./index.php'); // Refresh the page
    exit;
}

$page = isset($_GET['page']) ? $_GET['page'] : 'de_nobis.php';
switch ($page) {
    case "USArealEstate":
        $page = "../commonHTML/USArealEstate.html";
        $title = "Real Estate USA";
        break;
    case "arbitration":
        $page = "../commonHTML/arbitration.html";
        $title = "ADR";
        break;
    case "azioni_UE":
        $page = "../commonHTML/azioni_UE.html";
        $title = "azioni_UE";
        break;
    case "bibliografia":
        $page = "../commonHTML/bibliografia.html";
        $title = "Bibliography";
        break;
    case "biblios":
        $page = "../commonHTML/biblios.html";
        $title = "Biblios";
        break;
    case "concorrenza":
        $page = "../commonHTML/concorrenza.html";
        $title = "Competition";
        break;
    case "contact-us":
        $page = "../commonHTML/contact-us.php";
        $title = "Contact Us";
        break;
    case "contenzioso":
        $page = "../commonHTML/contenzioso.php";
        $title = "Cases";
        break;
    case "contracts":
        $page = "../commonHTML/contracts.html";
        $title = "Contracts";
        break;
    case "document_form":
        $page = "../commonHTML/document_form.html";
        $title = "Document Form";
        break;
    case "germania360":
        $page = "../commonHTML/germania360.html";
        $title = "Germany 360";
        break;
    case "import-export":
        $page = "../commonHTML/import-export.html";
        $title = "Import - Export";
        break;
    case "news":
        $page = "../commonHTML/news.html";
        $title = "NEWS";
        break;
    case "penale-amministrativo":
        $page = "../commonHTML/penale-amministrativo.html";
        $title = "Criminal and administrative";
        break;
    case "privacy_en":
        $page = "../commonHTML/privacy_en.html";
        $title = "Privacy Policy";
        break;
    case "privatezza":
        $page = "../commonHTML/privatezza.html";
        $title = "Privatezza";
        break;
    case "professionisti":
        $page = "../commonHTML/professionisti.php";
        $title = "Professionals";
        break;
    case "scambi":
        $page = "../commonHTML/scambi.html";
        $title = "Intra-EU trade";
        break;
    case "settori":
        $page = "../commonHTML/settori.html";
        $title = "Agriculture, Fishing, Industry, Environment";
        break;
    case "sitemap":
        $page = "../commonHTML/sitemap.html";
        $title = "Site Map";
        break;
    case "terms_en":
        $page = "../commonHTML/terms_en.html";
        $title = "Terms";
        break;
    case "terms_it":
        $page = "../commonHTML/terms_it.html";
        $title = "Terms";
        break;
    case "trademarks":
        $page = "../commonHTML/trademarks.html";
        $title = "Trademarks";
        break;
    case "uffici":
        $page = "../commonHTML/uffici.html";
        $title = "Uffici";
        break;
    default:
        $page = "../commonHTML/de_nobis.php";
        $title = "De Nobis - About us";
}
?>

<!DOCTYPE html>
<html>
    <head>
       <meta charset="UTF-8">
       <title><?php print $title; ?></title>
        
        <link rel="stylesheet" href="navigation.css"> <!-- Include language-specific navigation CSS --
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

        <!--All page specific code goes above this line which loads the common head-->
        <?php include('../commonHTML/commonHead.html'); ?>
        <script src="load-contents.js" defer></script>
    </head>

    <body onload="loadContents();">
        <div id="supra-header"></div>
        <div id="page">
            <div id="header"> 
                <?php include('header.php'); ?> 
            </div>
            <div id="main-container" class="clear"> 
                <div id="tableDiv">
                    <?php include($page); ?>

                    <?php
                    $noButtonList = array('../commonHTML/USArealEstate.html',
                        '../commonHTML/bibliografia.html',
                        '../commonHTML/contenzioso.php',
                        '../commonHTML/sitemap.html',
                        '../commonHTML/uffici.html',
                        '../commonHTML/professionisti.php');
                    if (!in_array($page, $noButtonList)) {
                        echo "<div id='buttons-container'>";
                        include('../commonHTML/buttons.html');
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>

            <nav id="navigation"> 
                <?php include('../commonHTML/navigation.html'); ?> 
            </nav>
            <footer id="colophon" class="clearfix notranslate"> 
                <?php include('../commonHTML/footer.html'); ?> 
            </footer>
        </div>
    </body>
</html>