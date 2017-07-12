<?php
$url = $_GET["url"];
//echo $url;
if ($url == "") {
	//index page 
	include("template.php");
	include("home.php");
} else {
	// generate 404
	include("template.php"); // insert nav bar
	include("not_found.php"); // insert seagull
}
?>