<?php


session_start();


if (!isset($_SESSION['logged_in'])) {
    $_SESSION['logged_in'] = false;
}

require_once('head.php');
require_once ('sidenav.php');
require_once('mainSlide.php');
require_once('filters.php');
require_once('body.php');
require_once ("footer.php");
?>

