
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
    $activationCode = md5($email);

    $registerQuery = 'INSERT INTO Users (name, email, password, activationCode) VALUES (' . $str . $username . $str . ',' . $str . $email . $str . ',' . $str . $userHashPsw . $str . ',' . $str . $activationCode . $str . ')';

    require_once 'model/dbConnector.php';
    $queryResult = executeQueryInsert($registerQuery);
    if ($queryResult === null) {
        throw new FailedToRegisterUserException();
    } else {
        if ($queryResult) {
            require_once "model/emailsManager.php";
            verifyEmail($username, $email, $activationCode);
            $result = $queryResult;
        }
        return $result;
    }
}


/**
 * Activate a user within the database
 * @param string $code : Verification code
 * @return array : users infos now that the account is activated
 */
function activateUser($code)
{
    $verificationQuery = 'UPDATE Users SET enabled = 1 WHERE activationCode = "' . $code . '"';
    require_once 'model/dbConnector.php';
    $result = executeQueryUpdate($verificationQuery);
    return $result;
}
