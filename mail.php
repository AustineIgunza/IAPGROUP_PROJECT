<?php
// Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer (from Plugins folder)
require __DIR__ . '/Plugins/PHPMailer/src/Exception.php';
require __DIR__ . '/Plugins/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/Plugins/PHPMailer/src/SMTP.php';

class Mailer {
    public static function send($mailCnt) {
        $mail = new PHPMailer(true);

        try {
            // Server settings (for Gmail)
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'ayiekoaudrey2@gmail.com';     // your Gmail
            $mail->Password   = 'peny frlm ubpe prof';      // 16-char App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Recipients
            $mail->setFrom($mailCnt['mail_from'], $mailCnt['name_from']);
            $mail->addAddress($mailCnt['mail_to'], $mailCnt['name_to']);

            // Content
            $mail->isHTML(true);
            $mail->Subject = $mailCnt['subject'];
            $mail->Body    = $mailCnt['body'];

            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Mailer Error: {$mail->ErrorInfo}");
            return false;
        }
    }
}
