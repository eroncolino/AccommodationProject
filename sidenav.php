<?php
/**
 * Created by PhpStorm.
 * User: Elena Roncolino ID: 14623
 * Date: 12/23/2018
 * Time: 5:40 PM
 */
?>
<!-- Login and signup side nav -->
<aside class="sidenav">
    <div class="sidenav-container">
        <header class="sidenav-header">
            <a href="" class="hide-button" onclick="move(); return false;">
                <i class="fa fa-times" aria-hidden="true"></i>
            </a>
        </header>


        <div>
            <div class="signin-container card card-signin my-5">
                <h5 class="card-title text-center">Sign In</h5>
                <hr class="my-4">
                <form name="signin-form" class="form-signin" action="" method="post" onsubmit="isLoginValid(retrieveUser); return false;">
                        <div class="form-label-group">
                        <input name="signinMail" type="email" id="inputEmail" class="form-control" placeholder="Email address" required>
                            <label for="inputEmail">Email address</label>
                        </div>

                        <div class="form-label-group pass_show">
                            <label for="inputPassword">Password</label>
                        <input name="signinPassword" type="password" id="inputPassword" class="form-control" placeholder="Password" required>

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
                <form name="signup-form" class="form-signup" action="userpage.php" onsubmit="let r = isSuccessfulSignUp(insertNewUser); return r">
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

                    <div class="form-label-group pass_show">
                        <label for="inputNewPassword">Password</label>
                        <input name='password' type="password" id="inputNewPassword" class="form-control" placeholder="Password"required>
                    </div>

                    <div class="form-label-group pass_show">
                        <label for="confirmInputNewPassword">Confirm password</label>
                        <input type="password" id="confirmInputNewPassword" class="form-control"
                               placeholder="Confirm password" required>

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

<!-- Closed below the footer -->
<div class="main-container">
