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
 * @throws PasswordsDoNotMatchException
 * @throws EmptyRegisterFormException
 */
function register($registerRequest)
{
    //variable set
    if (isset($registerRequest['username']) && isset($registerRequest['email']) && isset($registerRequest['password']) && isset($registerRequest['confirm'])) {

        //extract register parameters
        $username = $registerRequest['username'];
        $email = $registerRequest['email'];
        $password = $registerRequest['password'];
        $confirm = $registerRequest['confirm'];
        if ($password == $confirm) {

            try {
                require_once "model/usersManager.php";
                $corr = registerNewUser($username, $email, $password);
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
        if (isset($corr) && $corr != null) {
            require "view/thankyou.php";
        }
    } catch (PDOException $e) {
        throw new RegisterException("Une erreur c'est produite lors du procédé. Veulliez réessayer");
    }
}
