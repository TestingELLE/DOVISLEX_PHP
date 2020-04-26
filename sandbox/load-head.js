/* 
 *  Author: Anthea Jung
 *  Created: 10/20/2015
 *  Last modified: 11/18/2015
 *  
 *  This page provides common head tag elements to all pages
 *  To add a new js/css/meta, concatenate a new string to data */

var data =
        "<meta name='viewport' content='width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0'/>"
        +
        "<link rel='stylesheet' type='text/css' href='../css/main.css'/>"
        +
        "<link id='navigationId' rel='stylesheet' type='text/css'  href='navigation.css'/>"
        +
        "<link rel='stylesheet' type='text/css' href='../css/footer.css'/>"
        +
        "<link rel='stylesheet' type='text/css' href='button.css'/>"
        +
        "<link class='responsive_css'>"
        +
        "<link rel='stylesheet' type='text/css'  media='only screen and (min-width:737px) and (max-width:880px)' href='../css/screen_layout_medium.css'/>"
        +
        "<link rel='stylesheet' type='text/css'  media='only screen and (min-width:50px) and (max-width:736px)' href='../css/screen_layout_small.css'/>"
        +
        "<link rel='stylesheet' type='text/css'  media='only screen and (max-height:440px)' href='../css/screen_layout_small.css'/>"
        +
        "<script src='../js/jquery.cookie.js'></script>"
        +
        "<script src='../js/change-lang.js'></script>"
        +
        "<script src='../js/plus-minus.js'></script>"
        +
        "<script src='load-contents.js'></script>";

var head = document.head;
// adds the string above into head tag
$('head').append(data);