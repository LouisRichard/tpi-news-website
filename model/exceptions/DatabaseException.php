<?php

/**
 * Contains every errors regarding the database connection.
 * Author   : louis.richard@tutanota.com
 * Project  : tpi-news-website
 * Created  : MAY. 10 2022
 * Info     : This file has been adapted from another project : https://github.com/Havachi/ProjetWEB-DB-LJACorp
 *
 * Source       :   https://github.com/LouisRichard/tpi-news-website
 */

class DatabaseException extends Exception
{
    protected $message = "Connection to the database failed. Please try again later.";
}

class FailedToReachDatabaseException extends DatabaseException
{
    protected $message = "Failed to reach the database. Try again later";
}
