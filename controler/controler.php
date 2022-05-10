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

/**
 * temporary function to display the article page
 */
function article()
{
    require "view/article.php";
}

/**
 * temporary function 
 */
function categories()
{
    require "view/category.php";
}

/**
 * temporary function
 */
function search()
{
    require 'view/search-result.php';
}

/**
 * temporary function
 */
function about()
{
    require 'view/about.php';
}

/**
 * temporary function
 */
function contact()
{
    require 'view/contact.php';
}


/**
 * This function is designed to redirect the user to the register form if no registerRequest is empty
 * If register request is not null, it will test the values, extract them and register the user
 * If the values aren't good to register the user, the user will be redirected to the register form with an error
 * @param $registerRequest containing result from a register request
 */
function register($registerRequest)
{
    if (!empty($registerRequest['username']) && !empty($registerRequest['password']) && !empty($registerRequest['confirm']) && !empty($registerRequest['email'])) {
        $username = $registerRequest['username'];
        $email = $registerRequest['email'];
        $password = $registerRequest['password'];
        $confirm = $registerRequest['confirm'];

        if ($password == $confirm) {
            require_once "model/userManager.php";
            $corr = registerNewUser($username, $email, $password);
            if ($corr) {
                require "view/home.php";
            } else {
                require_once "model/exception/RegisterException.php";
                throw new FailedToRegisterUserException("Une erreur c'est produite lors de l'execution de la requête");
            }
        } else {
            require_once "model/exception/RegisterException.php";
            throw new PasswordsDoNotMatchException("Les mots de passes entrés ne sont pas identiques");
        }
    } else {
        require_once "model/exceptions/RegisterException.php";
        throw new RegisterException();
    }
}
