<?php

include_once('DBConnection.php');

if (isset($_GET['delete']) && $_GET['delete'] == true) {
    $propertyId = $_GET['propertyId'];
    DBConnection::deleteAnnouncement($propertyId);

    $_GET['delete'] = false;

    header("Location: userpage.php");
}
?>