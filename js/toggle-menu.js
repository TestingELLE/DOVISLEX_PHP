/**
 * Created with IntelliJ IDEA.
 * User: danielabecker
 * Date: 2/19/15
 * Time: 7:15 PM
 * To change this template use File | Settings | File Templates.
 */
 $(function () {

    $('.menu-item span').click(function () {
        console.log('click');
        $(this).parent().find('ul').toggle('fast');
        $(this).select('span').text(function(_, value) {
            return value == '-' ? '+' : '-';
        });
    });
});