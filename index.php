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
require_once("controler/articles.php");
$categories = getCategories();
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'home':
            require "view/home.php";
            break;
        case 'article':
            require "view/article.php";
            break;
        case 'categories':
            require "view/category.php";
            break;
        case 'search':
            require "view/search-result.php";
            break;
        case 'about':
            require "view/about.php";
            break;
        case 'contact':
            require "view/contact.php";
            break;
        case 'register':
            require_once "controler/users.php";
            try {
                register($_POST);
            } catch (RegisterException $e) {
                $_SESSION['errorMessage'] = $e->getMessage();
                require "view/home.php";
            } catch (DatabaseException $e) {
                $_SESSION['errorMessage'] = $e->getMessage();
                require "view/home.php";
            }
            break;
        case 'verify':
            require_once "controler/users.php";
            verify($_GET['v']);
            break;
        case 'login':
            require_once "controler/users.php";
            try {
                login($_POST);
            } catch (LoginException $e) {
                $_SESSION['errorMessage'] = $e->getMessage();
                require "view/home.php";
            } catch (DatabaseException $e) {
                $_SESSION['errorMessage'] = $e->getMessage();
                require "view/home.php";
            }
            break;
        case 'logout':
            require_once "controler/users.php";
            logout();
            break;
        case 'createArticle':
            $authors = getAuthors();
            require "view/createArticle.php";
            break;
        case 'addArticle':
            require_once "controler/articles.php";
            addArticle($_POST);
            break;
        default:
            require "view/home.php";
    }
} else {
    require "view/home.php";
}
