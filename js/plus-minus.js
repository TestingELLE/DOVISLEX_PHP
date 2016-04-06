/* 
 *  Author: Anthea Jung
 *  Created: 11/18/2015
 *  Last modified: 11/18/2015
 *  
 *  shows/hides text, changes "plus" to "minus"
 */

/*  This function is used in 
 *      azioni_UE.html
 *      bibliografia.html
 *      index.html
 *      professionisti.html  */
function plusminusGeneral() {
    $(event.target).next().toggle('fast');
    $(event.target).text(function (_, value) {
        return value == '« minus' ? '» plus' : '« minus';
    });
}

/*  This function is used in 
 *      professionisti.html
 *      professionisti_2.html  */

/*function plusminusProfessionisti(e) {
 
 
 var e = window.event || e;
 var text = $(e.target).text();
 var parent = $(e.target).parent().find('div');
 
 if (text === '« minus') {
 parent.css('overflow', 'hidden');
 parent.css('height', '200px');
 
 } else { //(text ===  '» plus')
 parent.css('overflow', 'visible');
 parent.css('height', '');
 }
 
 $(e.target).text(function (_, value) {
 return value == '« minus' ? '» plus' : '« minus';
 });
 }*/


function plus(Obj) {

    var collapse_content_selector = $(Obj).attr('data-href');
    var toggle_switch = $(Obj);

    $(collapse_content_selector).toggle(function () {
        if ($(this).css('display') == 'none') {
            toggle_switch.html('&raquo; plus');
        } else {
            toggle_switch.html('&raquo; minus');
        }
    });
}

function minus(Obj) {

    var button_to_control = $(Obj).attr('aria-controls');
    var collapse_content_selector = $(Obj).attr('data-href');
    $(collapse_content_selector).hide(500);

    var firstbutton = document.getElementById(button_to_control);
    $(firstbutton).html('&raquo; plus');

}
