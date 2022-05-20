<?php

/**
 * This php file is designed to manage all operation regarding users management
 * Author   : louis.richard@tutanota.com
 * Project  : tpi-news-websiter
 * Created  : MAY. 11 2022
 *
 * Source       :   https://github.com/tpi-news-website
 */

/**
 * This function is designed to redirect the user to the register form if no registerRequest is empty
 * If register request is not null, it will test the values, extract them and register the user
 * If the values aren't good to register the user, the user will be redirected to the register form with an error
 * @param array $registerRequest containing result from a register request
 * @throws UserAlreadyExistException
 * @throws FailedToRegisterUserException
 * @throws PasswordsDoNotMatchException
 * @throws InvalidEmailAddressException
 * @throws EmptyRegisterFormException
 */
function register($registerRequest)
{
    //variable set
    if ($registerRequest['username'] != "" && $registerRequest['email'] != "" && $registerRequest['password'] != "" && $registerRequest['confirm'] != "") {
        if (filter_var($registerRequest['email'], FILTER_VALIDATE_EMAIL)) {

            //extract register parameters
            $username = $registerRequest['username'];
            $email = $registerRequest['email'];
            $password = $registerRequest['password'];
            $confirm = $registerRequest['confirm'];
            if ($password == $confirm) {

                try {
                    require_once "model/usersManager.php";
                    $corr = registerNewUser($username, strtolower($email), $password);
                } catch (PDOException $e) {
                    require_once "model/exceptions/RegisterException.php";
                    throw new UserAlreadyExistsException("Cet utilisateur existe déjà");
                } catch (FailedToRegisterUserException $e) {
                    throw new FailedToRegisterUserException("Une erreur c'est produite lors de l'enregistrement de votre utilisateur. Veulliez réessayer");
                }
                if ($corr) {
                    require "view/confirm.php";
                }
            } else {
                require_once "model/exceptions/RegisterException.php";
                throw new PasswordsDoNotMatchException("Les mots de passes entrés ne sont pas identiques");
            }
        } else {
            require_once "model/exceptions/RegisterException.php";
            throw new InvalidEmailAddressException("L'adresse email entrée n'est pas valide");
        }
    } else {
        require_once "model/exceptions/RegisterException.php";
        throw new EmptyRegisterFormException("Un ou plusieurs des champs requis pour s'inscrire sont vides");
    }
}


/**
 * This function is designed to set a user to active using the verification code
 * @param string $code : Verification code
 * @throws RegisterException
 */
function verify($code)
{
    try {
        require_once "model/usersManager.php";
        $corr = activateUser($code);
        require "view/thankyou.php";
    } catch (PDOException $e) {
        throw new RegisterException("Une erreur c'est produite lors du procédé. Veulliez réessayer");
    }
}


/**
 * This function is designed to log in the user if the credentials are rights and if the user has confirmed their email address
 * @param array $loginDetails : Content of the login form sent via POST
 * @throws UserNotActivatedException
 * @throws WrongLoginOrPasswordException
 * @throws InvalidEmailAddressException
 * @throws EmptyLoginFormException
 */
function login($loginDetails)
{
    if (!empty($loginDetails['login']) && !empty($loginDetails['password'])) {
        if (filter_var($loginDetails['login'], FILTER_VALIDATE_EMAIL)) {
            $login = $loginDetails['login'];
            $password = $loginDetails['password'];

            require_once "model/usersManager.php";
            $corr = checkLogin($login, $password);
            $pswCorrect = $corr;
            if ($pswCorrect) {
                require_once "model/usersManager.php";
                $activated = checkActivated($login);
                if ($activated) {
                    require_once "model/usersManager.php";
                    createSession(getUserInfos($login));
                } else {
                    require_once "model/exceptions/LoginException.php";
                    throw new UserNotActivatedException("Vous n'avez pas encore confirmé votre email");
                }
            } else {
                require_once "model/exceptions/LoginException.php";
                throw new WrongLoginOrPasswordException("Identifiant out mot de passe incorrecte");
            }
        } else {
            require_once "model/exceptions/LoginException.php";
            throw new InvalidEmailAddressException("L'adresse email entrée n'est pas valide");
        }
    } else {
        require_once "model/exceptions/LoginException.php";
        throw new EmptyLoginFormException("Formulaire de connexion incomplet");
    }
    header('Location: index.php?action=home');
}


/**
 * This function is designed to add the user informations on the SESSION variable
 * @param array $infos=>'username' and $infos=>'admin'
 */
function createSession($infos)
{
    $_SESSION['name'] = $infos['name'];
    $_SESSION['admin'] = $infos['admin'];
}


/**
 * This function is designed to destroy the user's session
 */
function logout()
{
    $_SESSION = array();
    session_destroy();
    require "view/home.php";
}
