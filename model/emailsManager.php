<?php

/**
 * This file is designed to manage everything regarding emails (verifications, etc)
 * Authors  : Louis Richard, Michael Pedroletti
 * Project  : tpi-news-website
 * Created  : 26.DEC.2021
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
        Thank you for creating an account with us.<br/>
        Before you can log in, you need to verify your email address.<br/><br/>
        
        You can do so using <a href='tpi.wewfamily.ch/index.php?action=verify&v=" . $code . "'>this link</a>
        <br/>Or you can use the link below :<br/>
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
    // Gets SMTP user password from .psw file 
    $pswFileName = ".psw";
    $pswFile = fopen("$pswFileName", "r");
    $psw = fread($pswFile, fileSize($pswFileName));

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
    $mail->Username = 'confirm@wewfamily.ch';
    $mail->Password = $psw;

    //Recipients
    $mail->setFrom('noreply@wewfamily.ch', 'NoReply - WeW Family');
    $mail->addAddress($email, $username);

    //content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();
}
