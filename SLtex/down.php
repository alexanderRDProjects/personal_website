<?php

$str = "Some pseudo-random
text spanning
multiple lines";

header('Content-Disposition: attachment; filename="sample.txt"');
header('Content-Type: text/plain'); # Don't use application/force-download - it's not a real MIME type, and the Content-Disposition header is sufficient
header('Content-Length: ' . strlen($str));
header('Connection: close');


echo $str;
exit;
?>