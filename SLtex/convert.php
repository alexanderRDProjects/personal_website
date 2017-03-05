<?php
$content = urldecode($_GET["contents"]);
$output = [];
var_dump(explode("\n",$content));
echo implode("\n",$output);
?>
