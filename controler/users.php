<?php

/**
 * This php file is designed to manage all operation regarding users management
 * Author   : louis.richard@tutanota.com
 * Project  : Projet WEB + BDD
 * Created  : MAY. 11 2022
 *
 * Source       :   https://github.com/tpi-news-website
 */

require 'model/usersManager.php';
require 'model/exceptions/RegisterException.php';

/**
 * This function is designed to redirect the user to the register form if no registerRequest is empty
 * If register request is not null, it will test the values, extract them and register the user
 * If the values aren't good to register the user, the user will be redirected to the register form with an error
 * @param $registerRequest containing result from a register request
 */
function register($registerRequest)
{
    //variable set
    if (isset($registerRequest['username']) && isset($registerRequest['email']) && isset($registerRequest['password']) && isset($registerRequest['confirm'])) {

        //extract register parameters
        $username = $registerRequest['username'];
        $email = $registerRequest['email'];
        $password = $registerRequest['password'];
        $confirm = $registerRequest['confirm'];
        if ($password == $confirm) {

            try {
                $corr = registerNewUser($username, $email, $password);
            } catch (PDOException $e) {
                throw new UserAlreadyExistsException();
            }
            if ($corr) {
                require "view/home.php";
            }
        } else {
            throw new PasswordsDoNotMatchException();
        }
    } else {
        throw new EmptyRegisterFormException();
    }
}


/**
 * This function is designed to set a user to active using the verification code
 * @param string $code : Verification code
 */
function verify($code)
{
    try {
        if (activateUser($code)) {
            echo "<script>console.log('working')</script>";
            require "view/home.php";
        }
    } catch (PDOException $e) {
        throw new RegisterException();
    }
}
