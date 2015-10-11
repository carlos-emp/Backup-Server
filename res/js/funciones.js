var actual = "#inicio";
var menuEstado = "off";
$(document).ready(function () {

    $(function () {
        $('#slider div:gt(0)').hide();
        setInterval(function () {
            $('#slider div:first-child').fadeOut(0)
         .next('div').fadeIn(1000)
         .end().appendTo('#slider');
        }, 4000);
    });

    $('#inicio').fadeIn(500);
    $(window).scroll(function () {
        if ($(this).scrollTop() > 0) {
            $('.boton-top').fadeIn();
        } else {
            $('.boton-top').fadeOut();
        }
    });
    $('.boton-top').click(function () {
        $('body,html').animate({ scrollTop: 0 }, 500);
        return false;
    });
    $('#itemInicio').on('click', function () {
        $(actual).fadeOut(300);
        $('#inicio').fadeIn(500);
        actual = "#inicio";
    });
    $('#itemEntrada').on('click', function () {
        $(actual).fadeOut(300);
        $('#entradas').fadeIn(500);
        actual = "#entradas";
    });
    $('#itemProyecto').on('click', function () {
        $(actual).fadeOut(300);
        $('#proyecto').fadeIn(500);
        actual = "#proyecto";
    });
    $('#itemApps').on('click', function () {
        $(actual).fadeOut(300);
        $('#apps').fadeIn(500);
        actual = "#apps";
    });
    $('#botonMenu').on('click', function () {
        if (menuEstado == "off") {
            $('#menue').fadeOut(300);
            menuEstado = "on";
        }
        else {
            $('#menue').fadeIn(300);
            menuEstado = "off";
        }

    });
    $(window).bind("orientationchange", function (event) {
        $('#menue').fadeIn(300);
            menuEstado = "off";
    });
});