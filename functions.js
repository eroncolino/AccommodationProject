let isOpen = false;

//Function to show the pop up form to insert an announcement
function openForm() {
    document.getElementById("announcementForm").style.display = "block";
}

//Function to close the pop up form to insert an announcement
function closeForm() {
    document.getElementById("announcementForm").style.display = "none";
}

//Function to log out
function logOut() {
    var r = confirm("Do you really want to log out?");
    if (r) {
        window.location.href = 'logout.php';
    }
}

function redirectToProfile(allowed) {
    if (allowed) {
        window.location.href = 'userpage.php';
    } else {
        alert("You are not logged in. Please sign up or login to access your profile.");
    }
}

// Function to load data of a selected property in homepage
function loadData(id) {
    $.ajax({
        url: "DBConnection.php",
        method: "POST",
        data: {get_data: 1, id: id},
        success: function (response) {
            console.log(response);
            response = JSON.parse(response);
            console.log(response);

            var html = "";

            // Displaying details
            html += "<div class='row'>";
            html += "<div class='col-md-2'>Property ID:</div>";
            html += "<div class='col-md-10'>" + response.propertyid + "</div>";
            html += "</div>";

            html += "<div class='row'>";
            html += "<div class='col-md-2'>Title:</div>";
            html += "<div class='col-md-10'>" + response.title + "</div>";
            html += "</div>";

            html += "<div class='row'>";
            html += "<div class='col-md-2'>Address:</div>";
            html += "<div class='col-md-10'>" + response.address + "</div>";
            html += "</div>";

            html += "<div class='row'>";
            html += "<div class='col-md-2'>Description:</div>";
            html += "<div class='col-md-10'>" + response.description + "</div>";
            html += "</div>";

            html += "<div class='row'>";
            html += "<div class='col-md-1'><i class='fa fa-bed'></i></div>";
            html += "<div class='col-md-2'>" + response.bedrooms + "</div>";
            html += "<div class='col-md-1'><i class='fa fa-bath'></i></div>";
            html += "<div class='col-md-2'>" + response.bathrooms + "</div>";
            html += "<div class='col-md-1'><i class='fa fa-car'></i></div>";
            html += "<div class='col-md-2'>" + response.parking + "</div>";
            html += "</div>";

            html += "<div class='row'>";
            html += "<div class='col-md-2'>Area</div>";
            html += "<div class='col-md-10'>" + response.area + "</div>";
            html += "</div>";

            html += "<div class='row'>";
            html += "<div class='col-md-2'>Price</div>";
            html += "<div class='col-md-10'>" + response.price + "</div>";
            html += "</div>";

            // And now assign this HTML layout in pop-up body
            $("#modal-body").html(html);

            // And finally you can this function to show the pop-up/dialog
            $("#myModal").modal();
        }
    });

}

//Function to show pop up form to edit a property
function editProperty(title) {
    document.getElementById("announcementForm").style.display = "block";
    document.forms['propertyForm']['title'].value = title;
}

//Function that extends the expiration date by 30 days
function extendExpiration(propertyId) {
    var r = confirm("You will extend the expiration by 30 days. Do you want to proceed?");

    if (r) {
        window.location.href = 'expirationExtension.php?extend=yes&propertyId=' + propertyId;
    }
}

//Function to delete a property
function deleteProperty(propertyId) {
    var r = confirm("Are you sure you want to permanently delete this announcement?");

    if (r) {
        window.location.href = 'propertyDeletion.php?delete=true&propertyId=' + propertyId;
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
        window.location.href = "home.php";
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


$(document).ready(function () {

    // Validating password script
    var pswd, confirmpswd;

    $(document).ready(function () {

        $('#inputNewPassword').keyup(function () {
            pswd = $(this).val();

            //validate the length
            if (pswd.length < 8) {
                $('#length').removeClass('valid').addClass('invalid');
            } else {
                $('#length').removeClass('invalid').addClass('valid');
            }

            //validate letter
            if (pswd.match(/[A-z]/)) {
                $('#letter').removeClass('invalid').addClass('valid');
            } else {
                $('#letter').removeClass('valid').addClass('invalid');
            }

            //validate capital letter
            if (pswd.match(/[A-Z]/)) {
                $('#capital').removeClass('invalid').addClass('valid');
            } else {
                $('#capital').removeClass('valid').addClass('invalid');
            }

            //validate number
            if (pswd.match(/\d/)) {
                $('#number').removeClass('invalid').addClass('valid');
            } else {
                $('#number').removeClass('valid').addClass('invalid');
            }

            //validate space
            if (pswd.match(/[^a-zA-Z0-9\-\/]/)) {
                $('#space').removeClass('invalid').addClass('valid');
            } else {
                $('#space').removeClass('valid').addClass('invalid');
            }

            changeSignupButtonVisibility();

        }).focus(function () {
            $('#pswd_info').show();
        }).blur(function () {
            $('#pswd_info').hide();
        });

        $('#confirmInputNewPassword').keyup(function () {
            confirmpswd = $(this).val();

            if (pswd.localeCompare(confirmpswd) !== 0) {
                $('#areMatching').removeClass('valid').addClass('invalid');
            } else {
                $('#areMatching').removeClass('invalid').addClass('valid');
            }

            changeSignupButtonVisibility();

        }).focus(function () {
            $('#confirm_pswd_info').show();
        }).blur(function () {
            $('#confirm_pswd_info').hide();
        });

        function changeSignupButtonVisibility() {

            if ($('#length').hasClass('valid') && $('#letter').hasClass('valid') &&
                $('#capital').hasClass('valid') && $('#number').hasClass('valid') &&
                $('#space').hasClass('valid') && $('#areMatching').hasClass('valid')) {

                $('.signup-button').removeAttr('disabled');
            } else {
                $('.signup-button').css('disabled', '');
            }
        }
    });
    // Validating password script end

    //Appends 'Show" to password fields
    $('.pass_show').append('<span class="ptxt">Show</span>');
});

//Shows 'Show' and 'Hide' buttons on passwords fields
$(document).on('click', '.pass_show .ptxt', function () {
    $(this).text($(this).text() == "Show" ? "Hide" : "Show");
    $(this).prev().attr('type', function (index, attr) {
        return attr == 'password' ? 'text' : 'password';
    });
});

