<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

function sendSMTPMail($email, $name, $body, $subject)
{

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    //try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'fyndsupplier.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'info@fyndsupplier.com';
    //$mail->Password   = 'k5}1C^^T0Ul{';
    $mail->Password   = 'Fyndsupplier@123';

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('info@fyndsupplier.com', $name);
    $mail->addAddress($email, $name);     //Add a recipient
    //$mail->addAddress('ellen@example.com');                   //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('khizeranwer2002@gmail.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');             //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');        //Optional name


    //Content
    $mail->isHTML(true);                                        //Set email format to HTML
    $mail->Subject = $subject;

    //$branchLogo = get_root() . "assets/img/" . $imageArr['filename'];
    //$mail->AddEmbeddedImage($branchLogo, $imageArr['cid'], $imageArr['cid']);
    $mail->Body = html_entity_decode($body);
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    return ($mail->send()) ? true : false;
    //} catch (Exception $e) {
    //}
}
