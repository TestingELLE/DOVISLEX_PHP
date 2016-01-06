/* 
 *  Author: Anthea Jung
 *  Created: 10/09/2015
 *  Last modified: 10/14/2015
 *  
 *  Redirects the current page to the selected language.  
 */

/*  Takes one parameter: the id of the element
 *  Creates a new path and navigates the page to the new path */
function changeLang(id) {
    //  URL of the current page
    var currentPath = window.location.href.split('/');
    //  Splits the URL into an array
    var currentPage = currentPath[currentPath.length - 1];
    //  Empty string to hold the new path to navigate to
    var newPath = "";
    
    /*  depending on the id, different langauge is chosen to be use 
        when creating a new path */
    switch(id) {
        case "lang-change-en": 
            selectedLanguage = "en"; 
            break;
        case "lang-change-es": 
            selectedLanguage = "en"; 
            break;
        case "lang-change-fr": 
            selectedLanguage = "fr"; 
            break;
        case "lang-change-de": 
            selectedLanguage = "de"; 
            break;
        default:
            selectedLanguage = "it"; 
    }
    
    /*  constructs the new path by adding new language
        and the current page name at the end */
    for (i = 0; i < currentPath.length - 1; i++) {
        /*  currentPath.length - 2 is where language element is 
         *  located in the URL  */
        if(i === currentPath.length - 2) {
            newPath += selectedLanguage;
        } else {
            newPath += currentPath[i];
        }
        newPath += "/";
    }
    newPath += currentPage;
    
    // redirects the page to the new path
    window.location.href = newPath;
}

