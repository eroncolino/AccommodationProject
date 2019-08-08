<?php
/**
 * Created by PhpStorm.
 * User: Elena Roncolino ID: 14623
 * Date: 12/26/2018
 * Time: 5:02 PM
 */
?>

<nav class="navbar navbar-static-top navbar-light">
    <div class="container-fluid main-menu">
        <div class="navbar-header" >
            <img class="logo" src="images/logo.png" alt="logo">
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="submitAdvert.php">Submit</a></li>
            <?php if($_SESSION['logged_in'] === true) {
                echo '<li><a id="login-button" href="" onclick="logOut(); return false;">Logout</a></li>';
            } else {
                echo '<li><a id="logout-button" href="" onclick="move(); return false;">Login</a></li>';
            }?>
        </ul>
    </div>
</nav>

<div class="main-image-container">
    <img id="main-slide" src="images/unibz_Bozen_Bolzano_Campus2.jpg" alt="main-slide">
</div>