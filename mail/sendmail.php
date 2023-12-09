<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/POP3.php';

class Mailer{
    public function maildathang($tieu_de, $noi_dung, $email) {
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'mail9216.maychuemail.com';              // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'contact@khanhnhat.id.vn';          // SMTP username
            $mail->Password = 'khanhnhat2002';                    // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to
    
            // Recipients
            $mail->setFrom('contact@khanhnhat.id.vn', 'Mailer');
            $mail->addAddress($email);                            // Add a recipient
    
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $tieu_de;
            $mail->Body    = $noi_dung;

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}