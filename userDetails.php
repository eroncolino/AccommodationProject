<?php
/**
 * Created by PhpStorm.
 * User: Elena Roncolino Id:14623
 * Date: 2/23/2019
 * Time: 4:37 PM
 */

include('DBConnection.php');
?>

<section>

    <div class="container" style="margin-top: 30px;">
        <div class="profile-head">

            <div class="col-md-5 col-sm-5 col-xs-12">
                <h5><?php echo $_SESSION['name'] . ' ' . $_SESSION['surname'] ?> </h5>
                <ul>
                    <li id="user-phone"><span class="glyphicon glyphicon-phone"></span><?php echo $_SESSION["phone"] ?></li>
                    <li id="user-email"><span class="glyphicon glyphicon-envelope"></span><?php echo $_SESSION['email'] ?></li>
                    <li id="user-adverts"><span class="glyphicon glyphicon-pencil"></span> Open adverts:
                        <?php $adverts = DBConnection::getPropertiesNumberByUserId($_SESSION["userId"]); echo $adverts;?></li>
                </ul>
            </div>
        </div>
    </div>
</section>

s