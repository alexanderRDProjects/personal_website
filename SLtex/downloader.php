<?php
//echo 'hello wolrd';
$x = "jsdfdflkjdf"
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.basename($x).'"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($x));
echo $x;
exit;
?>