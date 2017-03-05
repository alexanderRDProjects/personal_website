<?php
$content = urldecode($_GET["contents"]);
$output = [];
var_dump(array_filter(explode("\n",$content)));
echo implode("\n",$output);
?>
