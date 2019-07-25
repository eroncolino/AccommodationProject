let isOpen = false;

//Function to log out
function logOut() {
    var r = confirm("Do you really want to log out?");
    if (r) {
        window.location.href = 'logout.php';
    }
}

//Function to move the mail slide and show the log in panel
function move() {
    let sidenav = document.getElementsByClassName("sidenav")[0];
    let main_container = document.getElementsByClassName("main-container")[0];
    let button = document.getElementsByClassName("hide-button")[0];
    let footer = document.getElementsByClassName("footer")[0];
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
    } else {
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

function showSignIn() {
    let signin_div = document.getElementsByClassName("signin-container")[0];
    let signup_div = document.getElementsByClassName("signup-container")[0];
    signin_div.style.visibility = "visible";
    signin_div.style.display = "block";
    signup_div.style.display = "none";
}

function showSignUp() {
    let signin_div = document.getElementsByClassName("signin-container")[0];
    let signup_div = document.getElementsByClassName("signup-container")[0];
    signin_div.style.display = "none";
    signup_div.style.display = "block";
    signup_div.style.visibility = "visible";
}

function insertNewUser(result) {

    if (isEmailAvailable(checkAvailableEmail)) {
        if (result) {
            alert("Registration completed successfully!");
            return true;
        } else {
            alert("Problem with the registration. Please try again.");
            return false;
        }
    }
}

function isSuccessfulSignUp(insertNewUser) {

    let signupForm = document.forms["signup-form"];
    let email = signupForm.email.value;
    let password = signupForm.password.value;
    let name = signupForm.name.value;
    let surname = signupForm.surname.value;
    let phone = signupForm.phone.value;

    $.ajax({
        url: 'DBConnection.php',
        data: {
            functionToCall: 'insertNewUserIntoDB',
            emailAddress: email,
            passwordValue: password,
            nameValue: name,
            surnameValue: surname,
            phoneValue: phone
        },
        type: 'POST',
        success: insertNewUser
    });
}

//Function that wait for the asynchronous ajax existing mail request
function checkAvailableEmail(mailExists) {

    if (mailExists == 1) {
        alert('An account is already registered with this email. Please sign in or another email address.');
        return false;
    } else {
        return true;
    }
}

//Ajax request to database to check if email is available
function isEmailAvailable(checkAvailableEmail) {
    let signupForm = document.forms["signup-form"];
    let email = signupForm.email.value;

    $.ajax({
        url: 'DBConnection.php',
        data: {functionToCall: 'checkIfMailAlreadyExists', emailAddress: email},
        type: 'POST',
        success: checkAvailableEmail
    });
}

/* Begin login check */
//Function that waits for the asynchronous ajax valid login request
function retrieveUser(valid) {
    if (valid) {
        alert('Welcome back!');
        window.location.href = 'userpage.php';
    } else {
        alert('User not found. Please check your credentials or sign up.');
        window.location.href = "index.php";
    }
}

//Ajax request to database to check if the entered username and password correspond to an existing user
function isLoginValid(retrieveUser) {
    let signinForm = document.forms["signin-form"];
    let email = signinForm.signinMail.value;
    let password = signinForm.signinPassword.value;

    $.ajax({
        url: 'DBConnection.php',
        data: {functionToCall: 'validSignIn', emailAddress: email, passwordValue: password},
        type: 'POST',
        success: retrieveUser
    });
}
/* End login check */


/*passcode_input.setCustomValidity("Wrong. It's 'Ivy'."); Elena16!*/
