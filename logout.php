<?php
/**
 * Created by PhpStorm.
 * User: Elena Roncolino Id:14623
 * Date: 7/27/2019
 * Time: 10:28 PM
 */

//session_start();
$_SESSION['logged_in'] = false;
session_start();
$_SESSION = array();
session_destroy();
header("Location: home.php");
?>

