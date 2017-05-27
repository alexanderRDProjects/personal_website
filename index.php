<?php
$url = $_GET["url"];
echo $url;
if ($url == "") {
	//index page 
	include("template.php");
	echo "<h1> index </h1> </body></html>";
} else {
	include("template.php");
	echo "<h1> Not found </h1> </body></html>";
?>