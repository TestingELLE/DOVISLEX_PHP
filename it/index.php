<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// /it/index.php

// Function to determine if we are in a production environment
function isProduction() {
    $serverName = $_SERVER['SERVER_NAME'];
    return !strstr($serverName, 'localhost') && !strstr($serverName, '127.0.0.1');
}

// Determine the correct domain for cookie setting
$cookieDomain = isProduction() ? '.dovislex.eu' : '';

// Read the page parameter or default to "de_nobis.php"
$page = isset($_GET['page']) ? filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS) : "de_nobis.php";
$title = "De Nobis - About us";  // You might want to also make this dynamic based on the page
//
////// Check if the cookies acceptance cookie is set
////if (!isset($_COOKIE['accept-cookies'])) {
////    $cookie_name = 'accept-cookies';
////    $cookie_value = 'cookies-notice-banner-accepted';
////    $expiration = time() + 16000000; // Set for a future expiration
////
////    setcookie($cookie_name, $cookie_value, $expiration, '/', $cookieDomain, isset($_SERVER['HTTPS']), true);
////
////    // Redirect to prevent displaying the banner again without the cookie being acknowledged
////    if (!isset($_GET['accept-cookies'])) {
////        header('Location: ./index.php?accept-cookies=1&page=' . urlencode($page));
////        exit;
////    }
////}

// Adjust title based on the page - example
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
    <meta charset="UTF-8">
    <title><?php print $title; ?></title>
        
     <link rel="stylesheet" href="navigation.css"> <!-- Include language-specific navigation CSS -->
     <link rel="stylesheet" href="buttons.css"> <!-- Include language-specific side buttons CSS -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <!-- All page-specific code goes above this line which loads the common head -->
    <?php include('../commonHTML/commonHead.html'); ?>
    <script src='load-contents.js' defer></script>
</head>
<body>
    <?php
//    /* Show banner if cookies have not been accepted */
//    if (!isset($_COOKIE['accept-cookies'])) {
//        include('../cookie-notice-banner/cookie-notice-banner.html');
//        /* Include jQuery for banner functionality */
//        echo '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>';
//        echo '<script src="../cookie-notice-banner/cookie-notice-banner.js"></script>';
//    }
//    ?>

    <div id="supra-header"></div>
    <div id="page">
        <div id="header"> 
            <?php include('header.php'); ?> 
        </div>
        <div id="main-container" class="clear"> 
            <div id="tableDiv">
                <?php include($page); ?>

                <?php
                $noButtonList = array('bibliografia.html', 'contenzioso.php', 'privatezza.html', 'professionisti.php', 'Servizi.html', 'sitemap.html', 'uffici.html', 'USArealEstate.html');
                if (!in_array($page, $noButtonList)) {
                    echo "<div id='buttons-container'>";
                    include('buttons.html');
                    echo "</div>";
                }
                ?>
            </div> <!-- tableDiv -->

        </div> <!-- main-container -->

        <nav id="navigation"> 
            <?php include('navigation.html'); ?> 
        </nav>
        <footer id="colophon" class="clearfix notranslate"> 
            <?php include('footer.html'); ?> 
        </footer>
    </div>
</body>
</html>
