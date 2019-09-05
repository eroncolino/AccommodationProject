<?php

include_once('DBConnection.php');
include_once('Property.php');

if (isset($_GET['edit']) && $_GET['edit'] == true) {
    $propertyId = $_GET['propertyId'];

    $property = DBConnection::getPropertyById($propertyId);

    echo '<script type="text/javascript">retrievePropertyToEdit(';
    echo $property->getTitle();
    echo ',';
    echo $property->getAddress();
    echo ',';
    echo $property->getDescription();
    echo ',';
    echo $property->getBathrooms();
    echo ',';
    echo $property->getParking();
    echo ',';
    echo $property->getArea();
    echo ',';
    echo $property->getBuildingYear();
    echo ',';
    echo $property->getPrice() . '); </script>';

    $_GET['edit'] = false;

    //header("Location: userpage.php");
}
?>
