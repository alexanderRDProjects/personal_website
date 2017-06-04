<?php
$to      = 'contact@alexanderrdprojects.com';
$subject = 'Automated Email';
$message = 'This is a automated email please do not reply';
$headers = 'From: no-reply@alexanderrdprojects.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
echo "mail sent"
?>
