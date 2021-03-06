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

$output = [];
$input = array_filter(explode("\n",$contents));
//var_dump($input);
$math_mode = false;
$input[0] = str_replace("documentclass{article}","\\documentclass{article}",$input[0]);
//replace double //
$input[0] = str_replace("\\\\","\\",$input[0]);
if ($input[0] !== "\\documentclass{article}" ){
	if (strpos($input[0],"\\documentclass{article}") == false){
		array_push($output,"\\documentclass{article}");
	}
} 
function read_math (&$line) {
	$line = str_replace("pi","\\pi",$line);
	$line = str_replace("phi","\\phi",$line);
}
$meta = false;
foreach($input as &$line) {
	$meta = false;
	//consider first word
	$words = array_filter(explode(" ",$line));
	if ($words[0] == "author"){
		$meta = true;
		$words[0] = "\\author{";
		array_push($words,"}");
	}
	if ($words[0] == "title"){
		$meta = true;
		$words[0] = "\\title{";
		array_push($words,"}");
	}
	if ($meta == true){
		$head = implode(" ",$words);
		$head = str_replace("{ ","{",$head);
		$head = str_replace(" }","}",$head);
		$line = "";
		array_push($output,$head);
	}
}
//header checks need to go here
if (strpos(implode(" ",$input),"\\begin{document}") == false){
	array_push($output,"\\begin{document}");
}
$input = array_filter($input);
foreach($input as &$line) {
	//first check if header
	//consider first word
	$words = array_filter(explode(" ",$line));

	if ($words[0] == "section"){
		$words[0] = "\section{";
		array_push($words,"}");
	}
	if ($words[0] == "subsection"){
		$words[0] = "\subsection{";
		array_push($words,"}");
	}
	$line = implode(" ",$words);
	if (strpos($line, '$$') !== false){
		$math_mode = !$math_mode;
	}
	//echo "<p> unformatted line :".$line."</p>";
	if ($math_mode){
		read_math($line);
	}
	else{
		$line = str_replace("pi","$\\pi$",$line);
		$line = str_replace("phi","$\\phi$",$line);
	}
	$line = str_replace("cite ","\\cite",$line);
	$line = str_replace("date","\\date",$line);
	$line = str_replace("dot","\\dot",$line);
	$line = str_replace("ddot","\\ddot",$line);
	$line = str_replace("footnote","\\footnote",$line);
	$line = str_replace("frac","\\frac",$line);
	$line = str_replace("latex","\\latex",$line);
	$line = str_replace("dfrac","\\dfrac",$line);
	$line = str_replace("ref","\\ref",$line);
	$line = str_replace("label","\\label",$line);
	//$line = str_replace("section","\\section",$line);
	$line = str_replace("subsection","\\subsection",$line);
	$line = str_replace("subsubsection","\\subsubsection",$line);
	$line = str_replace("{ ","{",$line);
	$line = str_replace(" }","}",$line);
	//replace double //
	$line = str_replace("\\\\","\\",$line);
	if (strpos($line, "$\\$\\") !== false){
		$line = str_replace("$\\$\\","$\\",$line);
		$line = str_replace("$$","$",$line);
	}
	if (strpos($line, "$*") !== false){
		$line = explode(" ",$line);
		foreach ($line as &$word){
			if (strpos($word, "$*") !== false){
				$word = str_replace("$*","",$word);
				$word = str_replace("$\\","",$word);
			}
		}
		$line = implode(" ",$line);
	}
	if (strpos($line, "*" !== false)) {
		if ($math_mode == false) {
			$line = explode(" ",$line);
			foreach ($line as &$word){
				if (strpos($word, "*") !== false){
					$word = str_replace("*","",$word);
					$word = str_replace("\\","",$word);
				}
			}
			$line = implode(" ",$line);
		}
	}



	
	//echo "<p> formatted line:".$line."</p>";
	array_push($output,$line);
}
if (strpos(implode(" ",$input),"\\end{document}") == false){
	array_push($output,"\\end{document}");
}
//var_dump($output);
echo implode("\n",$output);

exit;
?>