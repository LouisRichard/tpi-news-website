<?php

/**
 * Contains every errors regarding the register process.
 * Author   : louis.richard@tutanota.com
 * Project  : PreTPI - Maths games
 * Created  : MAY. 10 2022
 * Info     : This file has been adapted from another project : https://github.com/Havachi/ProjetWEB-DB-LJACorp
 *
 * Source       :   https://github.com/LouisRichard/tpi-news-website
 */

class RegisterException extends Exception
{
    protected $message = "An error occured during the Register Process";
}

class PasswordsDoNotMatchException extends RegisterException
{
    protected $message = "The confirm password does not match the first password";
}

class UserAlreadyExistsException extends RegisterException
{
    protected $message = "The user already exists";
}

class FailedToRegisterUserException extends RegisterException
{
    protected $message = "An error occured and the user could not be registered";
}

class EmptyRegisterFormException extends RegisterException
{
    protected $message = "The register form is empty. Please fill it out and try again";
}
