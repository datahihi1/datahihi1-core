<?php
// Include the configuration file
require 'config/MailSenderConfig.php';

try {
    // Setup mailer from the configuration
    $mail = setupMailer();

    // Check if the mailer was successfully created
    if ($mail === null) {
        throw new Exception("Mailer setup failed.");
    }

    //Recipients
    $mail->setFrom('datahihi1100@gmail.com', 'Datahihi1-core Web');    // From address
    $mail->addAddress('anh077688@gmail.com', 'receiver');          // To address

    // Content
    $mail->isHTML(true);                                               // Set email format to HTML
    $mail->Subject = 'Email Subject';
    $mail->Body    = 'This is a test email sent via PHPMailer!';
    $mail->AltBody = 'This is the plain text version of the email content';

    // Send the email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Error: {$e->getMessage()}";
}
