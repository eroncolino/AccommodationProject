<?php
/**
 * Created by PhpStorm.
 * User: Elena Roncolino ID 14623
 * Date: 2/20/2019
 * Time: 11:39 PM
 */

if(!isset($_SESSION))
{
    session_start();
}

if (!isset($_SESSION['logged_in'])) {
    $_SESSION['logged_in'] = false;
}

require_once('head.php');
require_once('mainSlide.php');
require_once ('userDetails.php');
require_once ("personalPosts.php");
require_once ("footer.php");


if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $bedrooms = $_POST['bedrooms'];
    $bathrooms = $_POST['bathrooms'];
    $parking = $_POST['parking'];
    $area = $_POST['area'];
    $year = $_POST['year'];
    $price = $_POST['price'];

    $userId = $_SESSION['userId'];

    date_default_timezone_set('Europe/Rome');
    $date = date('m/d/Y', time());

    DBConnection::insertAnnouncement($userId, $title, $address, $description, $bedrooms, $bathrooms, $parking, $area, $year, $date, $price);
}

?>


