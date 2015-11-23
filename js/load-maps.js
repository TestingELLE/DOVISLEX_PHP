
function loadMaps() {
    $(function () {
        $('#slides').slidesjs({
            width: 740,
            height: 493,
            navigation: false
        });
        $('a').click(function () {
            $(this).addClass('selected');
            $(this).siblings().removeClass('selected');
        });
    });
}
