
<?
/**
 * This file is designed to manage all operation regarding user's management
 * Author   : louis.richard@tutanota.com
 * Project  : tpi-news-website
 * Created  : MAR. 14 2022
 * Info     : This file is directly adapted from another project : PreTPI-MathGames
 *
 * Source       :   https://github.com/LouisRichard/tpi-news-website
 */



/**
 * This function is designed to register a new account
 * @param string $username
 * @param string $email
 * @param string $password : password in clear - Not encrypted yet
 * @return bool|null
 */
function registerNewUser($username, $email, $password)
{
    $result = false;
    $strSeparator = '\'';
    $userHashPsw = password_hash($password, PASSWORD_DEFAULT);

    $registerQuery = 'INSERT INTO users (name, email, password, enabled, admin, activationCode) VALUES 
    (' . $strSeparator . $username . $strSeparator . ',' . $strSeparator . $email . $strSeparator . ',' . $strSeparator . $userHashPsw . $strSeparator . ',0,0,' . $strSeparator . "whatever at this point" . $strSeparator . ")";

    require_once 'model/dbConnector.php';
    $queryResult = executeQueryInsert($registerQuery);
    if ($queryResult === null) {
        //require_once "exception/RegisterException.php";
        //throw new FailedToRegisterUserException();
    } else {
        if ($queryResult) {
            $result = $queryResult;
        }
    }
    return $result;
}
