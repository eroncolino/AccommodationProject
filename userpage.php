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

?>


