$(document).ready(runApp);  // Executa aplicação quando documento estiver pronto

// Aplicação principal
function runApp() {

    $(document).on('click', '#menu', menuToggle);   // Monitora cliques no botão menu

    $(window).resize(menuChange);                   // Monitora mudanças na largura da tela

}

// Mostra / oculta menu responsivo
function menuToggle() {

    if ( $('#menulinks').is(':visible') ) {     // Se o menu responsivo é visível:
        menuHide('fast');                       // Oculta o menu responsivo
    } else {                                    // Senão:
        menuShow('fast');                       // Mostra o menu responsivo
    }

    return false;                               // Retorna ao documento sem fazer mais nada
}

// Oculta o menu responsivo
function menuHide(vel) {

    $('#menulinks').slideUp(vel);               // Esconde o menu responsivo
    $('#menu i').addClass('fa-bars');           // Mostra o ícone "☰" no botão do menu
    $('#menu i').removeClass('fa-times');       // Oculta o ícone de "X" no botão do menu
    $('#menu').removeClass('active');           // Remove a classe 'active'

}

// Mostra o menu responsivo
function menuShow(vel) {

    $('#menulinks').slideDown(vel);             // Mostra o menu responsivo
    $('#menu i').addClass('fa-times');          // Mostra o ícone "X" no botão do menu
    $('#menu i').removeClass('fa-bars');        // Oculta o ícone "☰" no botão do menu
    $('#menu').addClass('active');              // Adiciona a classe 'active'

}

// Ajusta o menu conforme a largura da viewport
function menuChange() {

    if (window.innerWidth > 574) {              // Se a viewport for maior que 640px:
        $('#menulinks').css('display','flex');  // Altera o "display" do elemento para "flex"
        menuShow(0);                            // Mostra o menu responsivo        
    } else {                                    // Senão:
        $('#menulinks').css('display','none');  // Altera o "display" do elemento para "none"
        menuHide(0);                            // Oculta o menu responsivo
        
    }

}