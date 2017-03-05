<?php
$name = $_GET["name"];
$contents = urldecode($_GET["contents"]);

//$str = "Some pseudo-random
//text spanning
//multiple lines";

header('Content-Disposition: attachment; filename="'.$name.'.tex"');
header('Content-Type: text/plain'); # Don't use application/force-download - it's not a real MIME type, and the Content-Disposition header is sufficient
header('Content-Length: ' . strlen($contents));
header('Connection: close');


echo $contents;
exit;
?>