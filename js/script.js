document.addEventListener('DOMContentLoaded', function () {
    var navbar = document.getElementById('navbar-container');

    if (navbar) {
        
        var navbarHeight = navbar.offsetHeight;

        var homeContainer = document.getElementById("Home");
        if (homeContainer) {
            homeContainer.style.marginTop = navbarHeight + 'px';
        }

        var loginContainer = document.getElementById("login-container");
        if (loginContainer) {
            loginContainer.style.marginTop = navbarHeight + 'px';
        }

        var registerContainer = document.getElementById("register-container");
        if (registerContainer) {
            registerContainer.style.marginTop = navbarHeight + 'px';
        }
    }

    //Atravesm de uma variavel do url, verifica se é para apresentar a pagina de Login ou registo primeiro
    var urlParams = new URLSearchParams(window.location.search);
    var triggerShowRegister = urlParams.get('triggerShowRegister');
    if(triggerShowRegister === 'true'){
        showRegister();
    }
    else{
        showLogin();
    }
});

function showLogin(){
    var loginContainer = document.getElementById('login-container');
    var registerContainer = document.getElementById('register-container');

    registerContainer.style.display= 'none';
    loginContainer.style.display= 'block';
}

function showRegister(){
    var registerContainer = document.getElementById('register-container');
    var loginContainer = document.getElementById('login-container');

    loginContainer.style.display = 'none';
    registerContainer.style.display = 'block';
}
  