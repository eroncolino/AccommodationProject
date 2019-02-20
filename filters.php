<?php
/**
 * Created by PhpStorm.
 * User: Elena Roncolino ID: 14623
 * Date: 12/23/2018
 * Time: 5:43 PM
 */

?>

<div class="filters">
    <form id="filters-form" action="" method="POST">
    </form>

    <div class="filters-parameter">
        <div class="city-filter">
            <div class="city">
                City
                <select class="form-control" name="city" form="filters-form">
                    <option value="any">Any</option>
                    <option value="bolzano">Bolzano</option>
                    <option value="bressanone">Bressanone</option>
                    <option value="brunico">Brunico</option>
                </select>
            </div>
        </div>

        <div class="price-filter">
            <div class="price">
                Price
                <select class="form-control" name="city" form="filters-form">
                    <option value="any">Any</option>
                    <option value="low">0€-500€</option>
                    <option value="medium">501€-1000€</option>
                    <option value="high">More than 1000€</option>
                </select>
            </div>
        </div>

        <div class="type-filter">
            <div class="type">
                Type
                <select class="form-control" name="city" form="filters-form">
                    <option value="any">Any</option>
                    <option value="monolocale">Studio apartment</option>
                    <option value="bilocale">Two-bedroom apartment</option>
                    <option value="shared">Multiple-bedroom apartment</option>
                </select>
            </div>
        </div>
    </div>


    <div class="search-filter">
        <button class="search-button" type="submit"><i class="material-icons search-icon">search</i><span>Search</span></button>
    </div>
</div>

