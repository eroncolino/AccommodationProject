<?php
/**
 * Created by PhpStorm.
 * User: Elena Roncolino ID: 14623
 * Date: 12/27/2018
 * Time: 3:01 PM
 */
?>

<div class="main-houses">

    <h3>Properties</h3>

    <div class="properties-container">

        <?php
            include 'DBConnection.php';
            $properties_per_page = 6;
            $result = DBConnection::getInstance()->getAllProperties();
            //todo make dynamic pagination
        ?>

        <article class="property">
            <div>
                <figure>
                    <img>//here goes the image

                </figure>
            </div>
        </article>

        <article class="property">

        </article>

        <article class="property">

        </article>

        <article class="property">

        </article>
        <article class="property">

        </article>
        <article class="property">

        </article>
    </div>
</div>
