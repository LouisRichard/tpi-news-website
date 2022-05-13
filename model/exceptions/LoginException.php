<?php

use LoginException as GlobalLoginException;

/**
 * Contains every errors regarding the login process.
 * Author   : louis.richard@tutanota.com
 * Project  : PreTPI - Maths games
 * Created  : APR. 11 2022
 * Info     : This file has been adapted from another project : https://github.com/Havachi/ProjetWEB-DB-LJACorp
 *
 * Source       :   https://github.com/LouisRichard/PreTPI-MathGames
 */

class LoginException extends Exception
{
    protected $message = "An error occured during the Login Process";
}

class WrongLoginOrPasswordException extends LoginException
{
    protected $message = "Wrong login or password";
}

class FailedToReachDatabaseException extends LoginException
{
    protected $message = "Failed to reach the database. Try again later";
}

class EmptyLoginFormException extends LoginException
{
    protected $message = "The login form isn't complete. Please complete the form and try again";
}

class UserNotActivatedException extends LoginException
{
    protected $message = "This user hasn't confirmed their email yet";
}
