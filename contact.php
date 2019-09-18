<?php
/**
 * Created by PhpStorm.
 * User: Elena
 * Date: 12/20/2018
 * Time: 8:31 PM
 */

require_once('head.php');
require_once ('sidenav.php');
require_once('mainSlide.php');
?>

<div>
    <div class="row" id="contatti">
        <div class="container mt-5" >

            <div class="row" style="height:550px;">
                <div class="col-md-6 maps" >
                    <iframe src="https://maps.google.com/maps?q=viale%20druso%20299%2Fb%20bolzano&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="col-md-6">
                    <h2 class="text-uppercase mt-3 font-weight-bold text-white">CONTATTACI</h2>
                    <div>The unibz accommodation site was realized by Elena Roncolino, a student of Computer Science and Engineering
                    at the Free University of Bolzano. The aim of this site is to facilitate the students in the search for apartments in the
                    area of Bolzano.</div>
                    <div class="text-white">
                        <h2 class="text-uppercase mt-4 font-weight-bold">dove siamo</h2>

                        <i class="fas fa-phone mt-3"></i> <a href="tel:+">(+39) 3497477738</a><br>
                        <i class="fa fa-envelope mt-3"></i> <a href="">eroncolino@unibz.it</a><br>
                        <i class="fas fa-globe mt-3"></i> Viale Druso, 299/B, 39100, Bolzano<br>
                        <div class="my-4">
                            <a href="https://www.facebook.com/elena.roncolino"><i class="fab fa-facebook fa-3x pr-4"></i></a>
                            <a href="https://www.linkedin.com/in/elena-roncolino-177908159/"><i class="fab fa-linkedin fa-3x"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer footer-contatti">
        © 2019 Copyright: Elena Roncolino
    </div>
</div>


<script>
    $(document).ready(function () {
        var x = document.getElementsByClassName("main-image-container");
        x[0].style.display = 'none';
    });


</script>
