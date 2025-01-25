<?php

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;
use \PHPMailer\PHPMailer\SMTP;
function mailSend($email,$code){

    require 'Plugins/PHPMailer/src/Exception.php';
    require 'Plugins/PHPMailer/src/PHPMailer.php';
    require 'Plugins/PHPMailer/src/SMTP.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'akptl014@gmail.com';                     //SMTP username
        $mail->Password   = 'oeec ovpy srdd ubdz';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('akptl014@gmail.com', 'Team Pixo');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Forgot Password Confirmation Mail .';
        $mail->Body    = 'Hey greetings from the binaryUser, <br><br> 
                            Your confirmation code is : <b>'.$code.'</b>';

        $mail->send();

        //checking for errors
        $status = 'ok';
        return $status;
    } 
    catch (Exception $e) {
        return print_r("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
    }


}

?>