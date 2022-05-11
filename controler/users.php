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


 /**
 * This function is designed to redirect the user to the register form if no registerRequest is empty
 * If register request is not null, it will test the values, extract them and register the user
 * If the values aren't good to register the user, the user will be redirected to the register form with an error
 * @param $registerRequest containing result from a register request
 */
function register($registerRequest){
    //variable set
    if (isset($registerRequest['username']) && isset($registerRequest['email']) && isset($registerRequest['password']) && isset($registerRequest['confirm'])) {

        //extract register parameters
        $username = $registerRequest['username'];
        $email = $registerRequest['email'];
        $password = $registerRequest['password'];
        $confirm = $registerRequest['confirm'];
        if ($password == $confirm){

            try {
                $corr = registerNewUser($username, $email, $password);
            }catch (Exception $e){
                require "view/home.php";
                die;
            }
            if($corr){
                require "view/home.php";
            }
        }else{
            $_GET['registerError'] = true;
            $_GET['action'] = "register";
            require "view/register.php";
        }
    }else{
        $_GET['action'] = "register";
        require "view/register.php";
    }
}