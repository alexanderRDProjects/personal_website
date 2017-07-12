<?php
$url = $_GET["url"];
//echo $url;
if ($url == "") {
	//index page 
	include("template.php");
	//TODO 
	// write content for webpages
	echo "<h1> index </h1> </body></html>";
} else {
	// generate 404
	include("template.php"); // insert nav bar
	include("not_found.php"); // insert seagull
}
?>