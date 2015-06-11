var boton = $(".boton-login").first(),
    login = $(".login-form").first(),
    flecha = $('.icono-menu').first(),
    menu_control = $('.menu-top').first(),
    menu = $('.menu-navegacion').first();
    mensaje = $('.mensaje-f').first();

function showForm() {
    login.slideToggle(300);
    boton.toggleClass("active");
}

function toggleMenu() {
    if(menu.hasClass( "colapsado" ))
    {
    	menu.removeClass("colapsado");
    	menu.addClass("expandido");
    	flecha.toggleClass("rotate");
    }
    else if(menu.hasClass( "expandido" ))
    {
    	menu.removeClass("expandido");
    	menu.addClass("colapsado");
    	flecha.toggleClass("rotate");
    }
}

function fade() {
  mensaje.fadeToggle(100);
}

setTimeout(fade, 5000);

$(boton).click(showForm);
$(menu_control).click(toggleMenu);
