<?php
$filename = $_get["name"];
$contents = $_get["contents"];
$myfile = fopen($filename.".tex","w");
fwrite($myfile,$contents);
fclose($myfile);
?>