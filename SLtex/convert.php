<?php
$content = urldecode($_GET["contents"]);
$output = [];
var_dump(array_filter(explode("\n",$content)));
foreach($input as &$line) {
	echo "<p> unformatted line :"+$line+"</p>";
	$line = str_replace("pi","\pi",$line);
	$line = str_replace("phi","\phi",$line);
	$line = str_replace("cite ","\cite",$line);
	$line = str_replace("date","\date",$line);
	$line = str_replace("footnote","\footnote",$line);
	echo "<p> formatted line:"+$line+"</p>";
	$output = explode("<>",implode("<>",output)+"<>"+$line);
}
echo implode("\n",$output);
?>
