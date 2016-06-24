<?php
/**
 * Template name: test email
 */
$to      = 'ketan.patel@wwindia.com';             // give to email address
$subject = 'Email template sample PHP';  //change subject of email
$from    = 'ketan.patel@wwindia.com';                           // give from email address
$message ='hi';

// mandatory headers for email message, change if you need something different in your setting.
$headers  = "From: " . $from . "\r\n";
$headers .= "Reply-To: ". $from . "\r\n";
$headers .= "CC: test@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

// Remember, mail function may not work in PHP localhost setup but the email template can be used anywhere like (PHPmailer, swiftmailer, PHPMail classes etc.)
// Sending mail
if(mail($to, $subject, $message, $headers))
{
echo 'HTML email sent successfully!';
}
else
{
echo 'Problem sending HTML email!';
} 
?>