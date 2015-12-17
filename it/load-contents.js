/* 
 *  Author: Anthea Jung
 *  Created: 10/27/2015
 *  Last modified: 10/28/2015
 *  
 *  Instead of using css (traduzioni.css) to fill the elements with new manual 
 *  tranlsation, loadContents() function is used to place the given value to the 
 *  element with the given id. Depending on if the element is empty or not, value 
 *  is either appended or replaced */

/* For Italian this is just an empty file to avoid errors*/


function loadContents() {    
    //professionisti

}


/* If an element is empty, then appends value.
 * If an element is not empty, then replaces the innerHTML with a given value */
function appendORreplace(id, value) {
    if ($(id).html() === "") {
        $(id).append(value);
    } else {
        $(id).text(value);
    }
}