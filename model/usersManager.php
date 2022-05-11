
<?php
/**
 * This file is designed to manage all operation regarding user's management
 * Author   : louis.richard@tutanota.com
 * Project  : tpi-news-website
 * Created  : MAY. 11 2022
 * Info     : This file is directly adapted from another project : PreTPI-MathGames
 *
 * Source       :   https://github.com/LouisRichard/tpi-news-website
 */


/**
 * This function is designed to register a new account
 * @param mixed $username
 * @param mixed $email
 * @param mixed $password : password in clear - Not encrypted yet
 * @return bool|null
 */
function registerNewUser($username, $email, $password)
{
    $result = false;

    $str = '\'';

    $userHashPsw = password_hash($password, PASSWORD_DEFAULT);

    $registerQuery = 'INSERT INTO Users (name, email, password, activationCode) VALUES
    (' . $str . $username . $str . ',' . $str . $email . $str . ',' . $str . $userHashPsw . $str . ',' . $str . "whatever" . $str . ')';

    require_once 'model/dbConnector.php';
    $queryResult = executeQueryInsert($registerQuery);
    if ($queryResult === null) {
        throw new Exception();
    } else {
        if ($queryResult) {
            $result = $queryResult;
        }
        return $result;
    }
}
