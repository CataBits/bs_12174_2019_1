var num = 94;                   // Altura do menu em relação ao topo da página

$(document).ready(runApp);      // Quando o documento estiver pronto, inicia a aplicação JavaScript

// Aplicação principal
function runApp() {

    $(document).on('click', '#navbtn', menuToggle);     // Monitora cliques no botão do menu

    $(window).resize(menuChange);                       // Monitora redimensionamento da tela

    $(window).bind('scroll', rolando);                  // Monitora rolagem da tela

}

// Mostra / oculta menu
function menuToggle() {

    if ( $('#navlinks').is(':visible') ) {      // Se o menu está visível:
        menuHide('fast');                       // Oculta o menu
    } else {                                    // Se não:
        menuShow('fast');                       // Mostra o menu
    }

}

// Oculta o menu
function menuHide(vel) {

    $('#navbtn').removeClass('active');         // Remove a classe 'active' do botão do menu
    $('#navbtn i').addClass('fa-bars');         // Mostra "☰" no botão do menu
    $('#navbtn i').removeClass('fa-times');     // Oculta "X" no botão do menu
    $('#navlinks').slideUp(vel);                // Oculta o menu

}

// Mostra o menu
function menuShow(vel) {

    $('#navbtn').addClass('active');            // Adiciona a classe 'active' ao botão do menu
    $('#navbtn i').addClass('fa-times');        // Mostra "X" no botão do menu
    $('#navbtn i').removeClass('fa-bars');      // Oculta "☰" no botão do menu
    $('#navlinks').slideDown(vel);              // Mostra o menu

}

// Controla o menu ao redimensionar a tela
function menuChange() {

    menuHide(0);                                // Oculta menu
    if (window.innerWidth > 674) {              // Se a 'viewport' é maior que 674px:
        menuShow(0);                            // Mostra o menu
    }

}

// Controla o menu ao rolar a tela
function rolando() {

    if ($(window).scrollTop() > num) {          // Se o menu atingiu o topo da tela:
        $('nav').addClass('fixed');             // Aplica a classe que fixa o menu
        $('main').css('margin-top', '3rem');    // Adiciona a altura do menu ao conteúdo
    } else {                                    // Se não:
        $('nav').removeClass('fixed');          // Remove a classe que fixa o menu
        $('main').css('margin-top', '0');       // Remove a altura adicional do menu no conteúdo central
    }

}