<?php
//echo 'hello wolrd';
$x = 'example.tex';
if (file_exists($x)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($x).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($x));
    readfile($x);
    exit;
}

echo $x;
?>