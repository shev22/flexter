<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Session;

class FeedBackController extends Controller
{
    public function sendEmail(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'shevytv@gmail.com';                     //SMTP username
            $mail->Password   = 'ivcdyvuvkrwxtenf';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;
            $mail->setFrom($request->input('email'), $request->input('name'));
            $mail->addAddress('shevy2k2@yahoo.com');     //Add a recipient

            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $request->input('subject');
            $mail->Body    =  $request->input('message') . '<br><br> <b> Name: </b> ' . $request->input('name') . '<br> <b> Email: </b> ' . $request->input('email');

            $mail->send();
            Session::flash('message', 'Your message has been sent. Thank you!');
            Session::flash('alert-class', 'alert-success');
        } catch (Exception $e) {


            // $status['email_sever_errors'] = $mail->ErrorInfo;
            Session::flash('message', 'Unidentified error! please try again');
            Session::flash('alert-class', 'alert-error');
        }


        return redirect()->back();
    }

    public function feedback()
    {
        return view('feedback');
    }
}
