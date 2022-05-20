<?php

/**
 * Contains every errors regarding adding an article.
 * Author   : louis.richard@tutanota.com
 * Project  : PreTPI - Maths games
 * Created  : APR. 11 2022
 * Info     : This file has been adapted from another project : https://github.com/Havachi/ProjetWEB-DB-LJACorp
 *
 * Source       :   https://github.com/LouisRichard/PreTPI-MathGames
 */

class ArticleException extends Exception
{
    protected $message = "An error occured during the process";
}

class InvalidFileExtensionException extends ArticleException
{
    protected $message = "Only PNG, JPG and JPEG files are supported";
}

class FileTooHeavyException extends ArticleException
{
    protected $message = "The file can only be a maximum of 5MB";
}

class CouldNotSaveFileException extends ArticleException
{
    protected $message = "The file couldn't be saved. Maybe it's name is invalid or the file already exists";
}