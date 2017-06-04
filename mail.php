<?php
$to      = 'contact@alexanderrdprojects.com';
$subject = 'Automated Email';
$message = 'This is a automated email please do not reply';
$headers = 'contact@alexanderrdprojects.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

var_dump(mail($to, $subject, $message $headers));

?>
