<?php

include_once('DBConnection.php');

if (isset($_GET['extend']) && $_GET['extend'] == true) {

    $propertyId = $_GET['propertyId'];

    DBConnection::extendExpiration($propertyId);

    $_GET['extend'] = false;

    header("Location: userpage.php");
}
?>