<?php
$content = urldecode($_GET["contents"]);
$output = [];
$input = array_filter(explode("\n",$content));
var_dump($input);
foreach($input as &$line) {
	echo "<p> unformatted line :".$line."</p>";
	$line = str_replace("pi","\pi",$line);
	$line = str_replace("phi","\phi",$line);
	$line = str_replace("cite ","\cite",$line);
	$line = str_replace("date","\date",$line);
	$line = str_replace("dot","\dot",$line);
	$line = str_replace("ddot","\ddot",$line);
	$line = str_replace("footnote","\footnote",$line);
	$line = str_replace("frac","\frac",$line);
	$line = str_replace("latex","\latex",$line);
	$line = str_replace("dfrac","\dfrac",$line);
	$line = str_replace("ref","\ref",$line);
	$line = str_replace("label","\label",$line);
	$line = str_replace("section","\section",$line);
	$line = str_replace("subsection","\subsection",$line);
	$line = str_replace("subsubsection","\subsubsection",$line);
	//replace double //
	$line = str_replace("\\\\","\\");
	
	echo "<p> formatted line:".$line."</p>";
	array_push($output,$line);
}
var_dump($output)
echo implode("\n",$output);
?>
	