<?php
/**
 * Created by PhpStorm.
 * User: Elena Roncolino ID: 14623
 * Date: 12/23/2018
 * Time: 5:40 PM
 */

?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="author" content="Elena Roncolino ID: 14623">
    <meta name="description" content="home of the accommodation Web page">
    <meta name="date" content="20/12/2018">
    <meta name="keywords" content="unibz, accommodation, rent">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UniBZ Accommodation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="custom.css">
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script type="text/javascript" src="functions.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


</head>

<body>

<!-- Login and signup side nav -->
<aside class="sidenav">
    <div class="sidenav-container">
        <header class="sidenav-header">
            <a href="" class="hide-button" onclick="move(); return false;">
                <img alt="Close icon" src="https://img.icons8.com/ultraviolet/32/000000/delete-sign.png"">
            </a>
        </header>


        <div>
            <div class="signin-container card card-signin my-5">
                <h5 class="card-title text-center">Sign In</h5>
                <hr class="my-4">
                <form name="signin-form" class="form-signin" action="userpage.php" onsubmit="let r = isLoginValid(retrieveUser); return !!r;">
                    <div class="form-label-group">
                        <input name="signinMail" type="email" id="inputEmail" class="form-control" placeholder="Email address" required>
                        <label for="inputEmail">Email address</label>
                    </div>

                    <div class="form-label-group">
                        <input name="signinPassword" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                        <label for="inputPassword">Password</label>
                    </div>

                    <div class="show-password">
                        <input type="checkbox" onclick="showPassword()">Show password
                    </div>

                    <div class="signup-link">
                        No account?
                        <a href="" onclick="showSignUp(); return false;">Create one!</a>
                    </div>
                    <button class="signup-button btn btn-lg btn-primary btn-block text-uppercase" type="submit">
                        Sign in
                    </button>
                </form>
            </div>

            <div class="signup-container card card-signup my-5">
                <h5 class="card-title text-center">Sign Up</h5>
                <hr class="my-4">
                <form name="signup-form" class="form-signup" action="userpage.php" onsubmit="let r = isSuccessfulSignUp(insertNewUser); return !!r">
                    <div class="form-label-group">
                        <input name='name' type="text" id="inputName" class="form-control" placeholder="Name" required>
                        <label for="inputName">Name</label>
                    </div>

                    <div class="form-label-group">
                        <input name='surname' type="text" id="inputSurname" class="form-control" placeholder="Surname" required>
                        <label for="inputSurname">Surname</label>
                    </div>

                    <div class="form-label-group">
                        <input name='phone' type="tel" pattern="[0-9]{10}" id="inputPhone" class="form-control" placeholder="Phone" required>
                        <label for="inputPhone">Phone</label>
                    </div>

                    <div class="form-label-group">
                        <input name='email' type="email" id="inputNewEmail" class="form-control" placeholder="Email address" required>
                        <label for="inputNewEmail">Email address</label>
                    </div>

                    <div class="form-label-group">
                        <input name='password' type="password" id="inputNewPassword" class="form-control" placeholder="Password"
                               required>
                        <label for="inputNewPassword">Password</label>
                    </div>

                    <div class="form-label-group">
                        <input type="password" id="confirmInputNewPassword" class="form-control"
                               placeholder="Confirm password" required>
                        <label for="confirmInputNewPassword">Confirm password</label>
                    </div>

                    <div class="show-password">
                        <input type="checkbox" onclick="showPassword()">Show password
                    </div>

                    <div class="signup-link">
                        Already have an account?
                        <a href="" onclick="showSignIn(); return false;">Sign in!</a>
                    </div>
                    <button id='signup_button' class="signup-button btn btn-lg btn-primary btn-block text-uppercase"
                            type="submit" disabled>
                        Sign up
                    </button>
                </form>
            </div>

            <!-- Div to check if password meets requirements. -->
            <div class="aro-pswd_info">
                <div id="pswd_info">
                    <h4>Password must be</h4>
                    <ul>
                        <li id="letter" class="invalid">At least <strong>one letter</strong></li>
                        <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
                        <li id="number" class="invalid">At least <strong>one number</strong></li>
                        <li id="length" class="invalid">At least <strong>8 characters</strong></li>
                        <li id="space" class="invalid">At least one character between <br>&emsp;<strong>[~,!,@,#,$,%,^,&,*,-,=,.,;,']</strong></li>
                    </ul>
                </div>
            </div>

            <!-- Div to check if password meets requirements. -->
            <div class="aro-confirmpswd_info">
                <div id="confirm_pswd_info">
                    <p id="areMatching" class="invalid">Passwords must match.</p>
                </div>
            </div>

        </div>
    </div>
</aside>

<!-- Validating password script-->
<script>
    var pswd, confirmpswd;

    $(document).ready(function(){

        $('#inputNewPassword').keyup(function() {
            pswd = $(this).val();

            //validate the length
            if ( pswd.length < 8 ) {
                $('#length').removeClass('valid').addClass('invalid');
            } else {
                $('#length').removeClass('invalid').addClass('valid');
            }

            //validate letter
            if ( pswd.match(/[A-z]/) ) {
                $('#letter').removeClass('invalid').addClass('valid');
            } else {
                $('#letter').removeClass('valid').addClass('invalid');
            }

            //validate capital letter
            if ( pswd.match(/[A-Z]/) ) {
                $('#capital').removeClass('invalid').addClass('valid');
            } else {
                $('#capital').removeClass('valid').addClass('invalid');
            }

            //validate number
            if ( pswd.match(/\d/) ) {
                $('#number').removeClass('invalid').addClass('valid');
            } else {
                $('#number').removeClass('valid').addClass('invalid');
            }

            //validate space
            if ( pswd.match(/[^a-zA-Z0-9\-\/]/) ) {
                $('#space').removeClass('invalid').addClass('valid');
            } else {
                $('#space').removeClass('valid').addClass('invalid');
            }

            changeSignupButtonVisibility();

        }).focus(function() {
            $('#pswd_info').show();
        }).blur(function() {
            $('#pswd_info').hide();
        });

        $('#confirmInputNewPassword').keyup(function() {
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
</script>

<div class="main-container">

