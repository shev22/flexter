<?php

namespace App\Http\Controllers;

use PHPMailer\PHPMailer\Exception;

class FeedBackController extends Controller
{
    public function sendEmail($data)
    {
        
       
    //     try {
    //         $mail = new PHPMailer(true);
    //         $mail->isSMTP();                                            //Send using SMTP
    //         $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    //         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    //         $mail->Username   = 'shevytv@gmail.com';                     //SMTP username
    //         $mail->Password   = 'ivcdyvuvkrwxtenf';                               //SMTP password
    //         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    //         $mail->Port       = 465;
    //         $mail->setFrom($data['email'], $data['name']);
    //         $mail->addAddress('shevy2k2@yahoo.com');     //Add a recipient

    //         $mail->isHTML(true);                                  //Set email format to HTML
    //         $mail->Subject = $data['subject'];
    //         $mail->Body    =  $data['message'] . '<br><br> <b> Name: </b> ' . $data['name'] .'<br> <b> Email: </b> '. $data['email'];

    //         $mail->send();
    //         $status['success'] = 'Your message has been sent. Thank you!';
    //         echo  json_encode($status);
    //     } catch (Exception $e) {

    //         $status['email_sever_errors'] = $mail->ErrorInfo;
    //         echo  json_encode($status);
    //     }
     }
}
