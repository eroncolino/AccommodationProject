let isOpen = false;
/*let signin_div = document.getElementsByClassName("signin-container")[0];
let signup_div = document.getElementsByClassName("signup-container")[0];
*/

function move() {
    let sidenav = document.getElementsByClassName("sidenav")[0];
    let main_container = document.getElementsByClassName("main-container")[0];
    let button = document.getElementsByClassName("hide-button")[0];
    let footer = document.getElementsByClassName("copyright")[0];
    let navbar = document.getElementsByClassName("navbar")[0];
    let image = document.getElementById("main-slide");

    if (isOpen === false) {
        isOpen = true;
        sidenav.style.opacity = "1";
        footer.style.display = "none";
        sidenav.style.height = "100%";
        main_container.style.height = "99.6%";
        main_container.style.borderRadius = "8px";
        navbar.style.borderRadius = "8px";
        image.style.borderRadius = "8px";
        main_container.style.boxShadow = "-2px 10px 70px 0 rgba(0,0,0,0.8)";
        main_container.style.left = "-330px";
        main_container.style.transform = "scale(0.9) translateZ(0)";
        main_container.style.transition = ".5s transform ease-in-out,.5s left ease-in-out";
        main_container.style.position = "relative";
        main_container.style.zIndex = "100";
        button.style.visibility = "visible";
        button.style.opacity = "1";
        button.style.transition = "opacity 2s linear";
    }

    else {
        isOpen = false;
        main_container.style.height = "100%";
        main_container.style.borderRadius = "0";
        navbar.style.borderRadius = "0";
        image.style.borderRadius = "0";
        main_container.style.boxShadow = "none";
        main_container.style.left = "0";
        main_container.style.transform = "scale(1.0) translateZ(0)";
        main_container.style.transition = ".5s transform ease-in-out,.5s left ease-in-out";
        main_container.style.position = "relative";
        main_container.style.zIndex = "100";
        button.style.visibility = "hidden";
        button.style.opacity = "0";
        button.style.transition = "visibility 0s 2s, opacity 2s linear";
        footer.style.display = "block";
    }
}

function showPassword() {
    var x = document.getElementById("input-password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function showSignIn() {
    var signin_div = document.getElementsByClassName("signin-container")[0];
    var signup_div = document.getElementsByClassName("signup-container")[0];
    signin_div.style.visibility = "visible";
    signin_div.style.display = "block";
    signup_div.style.display = "none";
}

function showSignUp() {
    var signin_div = document.getElementsByClassName("signin-container")[0];
    var signup_div = document.getElementsByClassName("signup-container")[0];
    signin_div.style.display = "none";
    signup_div.style.display = "block";
    signup_div.style.visibility = "visible";
}


/*function validatePassword(){
    var password = document.getElementById("inputNewPassword");
    var confirm_psssword = document.getElementById("confirmInputNewPassword");

    if ( password.value.length < 8 || !password.value.match(/[A-z]/) || !password.value.match(/\d/) || !password.value.match(/[^a-zA-Z0-9\-\/]/) ) {
        password.setCustomValidity("Invalid password!");
        return false;
    } else {
        password.setCustomValidity("");

        if (password.value !== confirm_psssword.value) {
            confirm_psssword.setCustomValidity("Password do not match!");
            return false;
        } else {
            confirm_psssword.setCustomValidity('');
            return true;
        }
    }
}

var password = document.getElementById("inputNewPassword");
var confirm_psssword = document.getElementById("confirmInputNewPassword");

password.onchange = validatePassword;
confirm_psssword.onkeyup = validatePassword; */