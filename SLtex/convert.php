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
		//need to check if dependancies are actually needed
		array_push($output,"\\usepackage{amsthm}");
		array_push($output,"\\usepackage{amsmath}");
		array_push($output,"\\usepackage{graphicx}");
		array_push($output,"\\usepackage{fullpage}");
		array_push($output,"\\usepackage{cite}");
		array_push($output,"\\usepackage{url}");
		array_push($output,"\\usepackage{titling}");	
	}
}
function read_math (&$line) {
	//$line = preg_replace('/\pi\b/', '\\pi', $line);
	//$line = preg_replace('/\phi\b/', '\\phi', $line);
	$line = str_replace("pi","\\pi",$line);
	$line = str_replace("phi","\\phi",$line);
	$line = str_replace("sigma","\\sigma",$line);
	$line = str_replace("alpha","\\alpha",$line);
	$line = str_replace("beta","\\beta",$line);
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
		$words[0] = "\\section{";
		array_push($words,"}");
	}
	if ($words[0] == "subsection"){
		$words[0] = "\\subsection{";
		array_push($words,"}");
	}
	if ($words[0] == "equation"){
		$words[0] = "\\begin{equation}\n";
		// put check for label in here
		array_push($words,"\n\\end{equation}");
	}
	if ($words[0] == "expression"){
		$words[0] = "$$\n";
		array_push($words,"\n$$");
	}
	if ($words[0] == "figure") {
		$path = "";
		for ($path_index = 1;$path_index < count($words);$path_index++) {
			if ($path_index == 1){
				$path = $words[1];
			} else {
				$path = $path."_".$words[$path_index];
			}
		}
		array_push($words,"}\n\\end{figure}");
		$words = implode("_",$words);
		$words = explode("_",$words);
		$words[0] = "\\begin{figure}[h!]\n\\includegraphics[scale=0.39]{".$path.".png}\n\\label{".$path."}\n\\caption{";
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
		//$line = preg_replace('/\bpi\b/', '$\\pi$', $line);
		$line = preg_replace('/\bphi\b/', '$\\phi$', $line);
		//$line = str_replace("phi","$\\phi$",$line);
		$line = str_replace("sigma","$\\sigma$",$line);
		$line = str_replace("alpha","$\\alpha$",$line);
		$line = str_replace("beta","$\\beta$",$line);
		
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
	//$line = str_replace("subsection","\\subsection",$line);
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
?>
	