
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
 * @return bool|null returns true if the register was successfull
 */
function registerNewUser($username, $email, $password)
{
    $result = false;

    $str = '\'';

    $userHashPsw = password_hash($password, PASSWORD_DEFAULT);
    $activationCode = md5($email);

    $registerQuery = 'INSERT INTO users (name, email, password, activationCode) VALUES (' . $str . $username . $str . ',' . $str . $email . $str . ',' . $str . $userHashPsw . $str . ',' . $str . $activationCode . $str . ')';

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
    $verificationQuery = 'UPDATE users SET enabled = 1 WHERE activationCode = "' . $code . '"';
    require_once 'model/dbConnector.php';
    $result = executeQueryUpdate($verificationQuery);
    return $result;
}




/**
 * This fucntion is designed to check the user password upon login
 * @param string $login : The username for the login
 * @param string $userPsw : The password used for the login
 * @return bool $result : true if correct
 * @throws WrongLoginOrPasswordException
 */
function checkLogin($login, $userPsw)
{
    $result = false;

    $strSeparator = '\'';
    $loginQuery = 'SELECT password FROM users WHERE email = ' . $strSeparator . $login . $strSeparator;

    require_once 'model/dbConnector.php';
    $queryResult = executeQuerySelect($loginQuery);
    if ($queryResult === null) {
        require_once "exception/LoginException.php";
        throw new WrongLoginOrPasswordException();
    } else {
        if (count($queryResult) == 1) {
            $userHashPsw = $queryResult[0]['password'];
            $result = password_verify($userPsw, $userHashPsw);
        }
        return $result;
    }
}


/**
 * This function is designed to check wether or not the user has confirmed their email address
 * @param string $email
 * @return int 1 if activated, 0 if not
 * @throws LoginException
 */
function checkActivated($email)
{
    $result = false;

    $strSeparator = '\'';
    $activatedQuery = 'SELECT enabled FROM users WHERE email = ' . $strSeparator . strtolower($email) . $strSeparator;

    require_once 'model/dbConnector.php';
    $queryResult = executeQuerySelect($activatedQuery);
    if ($queryResult === null) {
        require_once "exception/LoginException.php";
        throw new LoginException();
    } else {
        if (count($queryResult) == 1) {
            $result = $queryResult[0][0];
        }
        return $result;
    }
}


/**
 * This function is designed to get the user's type and name on login
 * @param string email
 * @return array name=>username, 'admin'=>usertype : 1 if admin 
 * @throws LoginException
 */
function getUserInfos($email)
{
    $strSeparator = '\'';
    $infosQuery = 'SELECT id, name, admin FROM users WHERE email = ' . $strSeparator . strtolower($email) . $strSeparator;

    require_once 'model/dbConnector.php';
    $queryResult = executeQuerySelect($infosQuery);
    if ($queryResult === null) {
        require_once "exception/LoginException.php";
        throw new LoginException();
    } else {
        if (count($queryResult) == 1) {
            $result = array('id' => $queryResult [0][0], 'name' => $queryResult[0][1], 'admin' => $queryResult[0][2]);
        }
        return $result;
    }
}
