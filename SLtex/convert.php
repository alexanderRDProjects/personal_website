<?php
$content = urldecode($_GET["contents"]);
$output = [];
$input = array_filter(explode("\n",$content));
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
//header checks need to go here
if (strpos(implode(" ",$input),"\\begin{document}") == false){
	array_push($output,"\\begin{document}");
}
foreach($input as &$line) {
	if (strpos($line, '$$') !== false){
		$math_mode = !$math_mode;
	}
	//echo "<p> unformatted line :".$line."</p>";
	if ($math_mode){
		$line = str_replace("pi","\\pi",$line);
		$line = str_replace("phi","\\phi",$line);
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
	$line = str_replace("section","\\section",$line);
	$line = str_replace("subsection","\\subsection",$line);
	$line = str_replace("subsubsection","\\subsubsection",$line);
	//replace double //
	$line = str_replace("\\\\","\\",$line);
	if (strpos($line, "$\\$\\") !== false){
		$line = str_replace("$\\$\\","$\\",$line);
		$line = str_replace("$$","$",$line);
	}
	
	//echo "<p> formatted line:".$line."</p>";
	array_push($output,$line);
}
if (strpos(implode(" ",$input),"\\end{document}") == false){
	array_push($output,"\\end{document}");
}
//var_dump($output);
echo implode("\n",$output);
?>
	