<?php
require_once 'DotenvConfig.php';
require './vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function setupMailer(): ?PHPMailer {
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = env('MAIL_HOST');                       // Specify main SMTP server
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = env('MAIL_USER');               // SMTP username (your email)
        $mail->Password   = env('MAIL_PASS');                     // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption
        $mail->Port       = env('MAIL_PORT');                                    // TCP port to connect to
              
        // Return the configured mailer instance
        return $mail;

    } catch (Exception $e) {
        // Display error and return null in case of failure
        echo "Mailer Error: {$e->getMessage()}";
        return null;
    }
}
