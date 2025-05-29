<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {

    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Google Workspace SMTP
    $mail->SMTPAuth   = true;
    $mail->Username   = 'soumya@remitso.com'; // Your Google Workspace Email
    $mail->Password   = 'pfda mhhr cekq nfch'; // Use Google App Password (Not Normal Password)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;


    $mail->setFrom('soumya@remitso.com', 'social-remit');
    $mail->addAddress('soumya@accropolix.ai'); // Receiving email (your own email)

    $userEmail = $_POST['mail'] ?? 'No Email Provided';
    $mail->Subject = 'New Form Submission';
    $mail->Body    = "You're in! Every transfer matters. We’re thrilled to have you on board—big things are coming!. \nEmail: $userEmail";

    $mail->send();
    // echo 'Message has been sent successfully!';
    echo '<div style="max-width: 400px; margin: 50px auto; padding: 20px; border-radius: 10px; background-color: #f0f8ff; text-align: center; font-family: Arial, sans-serif; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);">
        <h2 style="color: #0075CF;">Success!</h2>
        <p style="color: #333;">Your message has been sent successfully.</p>
        <a href="index.html" style="text-decoration: none; padding: 10px 20px; background: #0075CF; color: white; border-radius: 5px;">Go Back</a>
      </div>';
} catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}";
}
