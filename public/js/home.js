var boton = $(".boton-login").first(),
    login = $(".login-form").first(),
    flecha = $('.flecha-abajo').first(),
    menu = $('.menu').first();
    mensaje = $('.mensaje-f').first();

function showForm() {
    login.slideToggle(300);
    boton.toggleClass("active");
}

function showMenu() {
    menu.fadeToggle(100);
    flecha.toggleClass("rotate");
}

function fade() {
  mensaje.fadeToggle(100);
}

setTimeout(fade, 5000);

$(boton).click(showForm);
$(flecha).click(showMenu);
