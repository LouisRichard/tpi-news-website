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
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $categories = getCategories();

    switch ($action) {
        case 'home':
            require_once "controler/articles.php";
            $homeArticles = getHomeArticles();
            require "view/home.php";
            break;
        case 'showArticle':
            require_once "controler/articles.php";
            $article = getOneArticle($_GET['aid']);
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
                header('location: index.php?action=home');
            } catch (DatabaseException $e) {
                $_SESSION['errorMessage'] = $e->getMessage();
                header('location: index.php?action=home');
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
                header('location: index.php?action=home');
            } catch (DatabaseException $e) {
                $_SESSION['errorMessage'] = $e->getMessage();
                header('location: index.php?action=home');
            }
            break;
        case 'logout':
            require_once "controler/users.php";
            logout();
            break;
        case 'createArticle':
            if($_SESSION['admin'] == 1){
                $authors = getAuthors();
                require "view/createArticle.php";
            }
            else {
                $_SESSION['errorMessage'] = "Vous devez être connecté en tant qu'administrateur pour acceder à cette feature";
                header('location: index.php?action=home');
            }
            break;
        case 'addArticle':
            try {
                require_once "controler/articles.php";
                addArticle($_POST);
            } catch (ArticleException $e) {
                $_SESSION['errorMessage'] = $e->getMessage();
                header('location: index.php?action=createArticle');
            } catch (LoginException $e) {
                $_SESSION['errorMessage'] = $e->getMessage();
                header('location: index.php?action=home');
            }
            break;
        default:
            header('location: index.php?action=home');
    }
} else {
    header('location: index.php?action=home');
}
