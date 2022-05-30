<?php

/**
 * This file is designed to manage everything regarding emails (verifications, etc)
 * Authors  : Louis Richard, Michael Pedroletti
 * Project  : tpi-news-website
 * Created  : DEC. 26 2021
 *
 * Source       :   https://github.com/tpi-news-website
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/Exception.php';
require './phpmailer/PHPMailer.php';
require './phpmailer/SMTP.php';

/**
 * This function is designed to create the email that will be sent to the user for confirmation
 * @param string $username
 * @param string $email
 * @param string $code - Confirmation code
 */
function verifyEmail($username, $email, $code)
{
    $subject = $username . " - Confirm you email address";

    $message =
        "<html>
            <body>" .
                $username . ", <br/> 
                Merci d'avoir créé un compte chez nous.<br/>
                Avant de pouvoir vous connecter, vous devez confirmer votre adresse email.<br/><br/>
                
                Pour ce faire, vous pouvez utiliser <a href='tpi.wewfamily.ch/index.php?action=verify&v=" . $code . "'>ce liens</a>
                <br/>Ou vous pouvez utiliser le liens si dessous :<br/>
                <a href='https://tpi.wewfamily.ch/index.php?action=verify&v=" . $code . "'>https://tpi.wewfamily.ch/index.php?action=verify&v=" . $code . "</a>
            </body>
        </html>";

    sendEmail($email, $username, $subject, $message);
}


/**
 * This function is designed to send the verification email to the user
 * @param string $email
 * @param string $username
 * @param string $subject
 * @param string $message - Message in HTML format
 */
function sendEmail($email, $username, $subject, $message)
{
	
	$username = 'valid.email.for@your.domain';
	$psw = 'YourPasswordHere';
	
    // Gets SMTP user password from .psw file
	// Used only during developpement
    // $pswFileName = ".psw";
    // $pswFile = fopen("$pswFileName", "r");
    // $psw = fread($pswFile, fileSize($pswFileName));

    $mail = new PHPMailer(true);
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = 'mail.infomaniak.ch';
    //$mail->SMTPSecure   = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 587;
    $mail->SMTPOptions = array( //Requierd by infomaniak's SMTP server
        'ssl' => array(
            'verify_peer'         => false,
            'verify_peer_name'    => false,
            'allow_self_signed'   => true
        )
    );
    //authentication to the SMTP server
    $mail->Username = $username;
    $mail->Password = $psw;

    //Recipients
    $mail->setFrom('noreply@wewfamily.ch', 'NoReply - WeW Family');
    $mail->addAddress($email, $username);

    //content
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();
}
