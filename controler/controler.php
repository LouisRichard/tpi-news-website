<?php

/**
 * Redirects to the desired page using either a view or the model to access data.
 * Author   : louis.richard@tutanota.com
 * Project  : tpi-news-website
 * Created  : MAY. 09 2022
 * Info     : This file is directly adapted from the template at https://bootstrapmade.com/zenblog-bootstrap-blog-template/
 *
 * Source       :   https://github.com/LouisRichard/tpi-news-website
 */

/**
 * This function is designed to display the home page
 */
function home()
{
    $_GET['action'] = "home";
    require "view/home.php";
}