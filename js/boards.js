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

        var BoardContainer = document.getElementById("BoardContainer");
        if (BoardContainer) {            
            BoardContainer.style.marginTop = navbarHeight + 'px';
        }


        var urlParams = new URLSearchParams(window.location.search);
        var BoardInfo = urlParams.get('showInfoBoard');
        if (BoardInfo && parseInt(BoardInfo) > 0){ 
            console.log(BoardInfo)
            var showBoardInfo = document.getElementById("showBoardInfo");
            var modalModalInfo = document.getElementById("modalBoardInfo");

            showBoardInfo.addEventListener("click", function(event) {
                event.preventDefault();
                $(modalModalInfo).modal('show');
            });
        }
        
    }


    // controlador dos modais do perfil
    var modalTrigger = document.getElementById("showProfile");
    var modal = document.getElementById("modalProfile");

    modalTrigger.addEventListener("click", function(event) {
        event.preventDefault();
        $(modal).modal('show');
    });

    //controlador dos modais de editar o perfil
    var editusername = document.getElementById("editUsername");
    var editemail = document.getElementById("editEmail");
    var editpassword = document.getElementById("editPassword");

    var modalUsername = document.getElementById("modalUsername");
    var modalEmail = document.getElementById("modalEmail");
    var modalPassword = document.getElementById("modalPassword");

    editusername.addEventListener("click", function(event) {
        event.preventDefault();
        $(modalUsername).modal('show');
    });

    editemail.addEventListener("click", function(event) {
        event.preventDefault();
        $(modalEmail).modal('show');
    });

    editpassword.addEventListener("click", function(event) {
        event.preventDefault();
        $(modalPassword).modal('show');
    });

    //controlador modal convites
    var showInvites = document.getElementById("showInvites");
    var modalInvites = document.getElementById("modalInvites");

    showInvites.addEventListener("click", function(event) {
        event.preventDefault();
        $(modalInvites).modal('show');
    });
});


