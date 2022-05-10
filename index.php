<?php

/**
 * Index file for the project. Redirects to the desired page.
 * Author   : louis.richard@tutanota.com
 * Project  : tpi-news-website
 * Created  : MAY. 09 2022
 * Info     : This file has been adapted from another project : https://github.com/Havachi/ProjetWEB-DB-LJACorp
 *
 * Source       :   https://github.com/LouisRichard/tpi-news-website
 */

session_start();
require "controler/controler.php";

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'home':
            home();
            break;
        case 'article':
            article();
            break;
        case 'categories':
            categories();
            break;
        case 'search':
            search();
            break;
        case 'about':
            about();
            break;
        case 'contact':
            contact();
            break;

        case 'register':
            register($_POST);
            break;
        default:
            home();
    }
} else {
    home();
}
