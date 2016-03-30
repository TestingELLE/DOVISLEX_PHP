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
function plusminusProfessionisti(obj) {


    //var e = window.event || e;
    var text = $(obj).text();
    var parent = $(obj).parent().find('div');

    if (text === '« minus') {
        parent.css('overflow', 'hidden');
        parent.css('height', '200px');

    } else { //(text ===  '» plus')
        parent.css('overflow', 'visible');
        parent.css('height', '');
    }

    $(obj).text(function (_, value) {
        return value == '« minus' ? '» plus' : '« minus';
    });
}