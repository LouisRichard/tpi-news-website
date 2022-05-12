<?php

/**
 * Author : Louis Richard, Michael Pedroletti
 * Creation Date : 26.DEC.2021
 * Last modification : 26.DEC.2021 :
 *      Created the file and modified the credentials
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/Exception.php';
require './phpmailer/PHPMailer.php';
require './phpmailer/SMTP.php';

/**
 * This function is designed to send the verification email to the user
 * @param string $username : username of the user
 * @param string $email : email address of the new user
 * @param string $code verification code
 */
function verifyemail($username, $email, $code)
{
    $pswFileName = ".psw";
    $pswFile = fopen("$pswFileName", "r");
    $psw = fread($pswFile, fileSize($pswFileName));

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
    $mail->Subject = $username . " Confirm you email address";
    $mail->Body = $message;

    $mail->send();
    $msg = "message sent";
}
