<?php
$duck = $_GET["duck"];
if ($duck == "true"){
	echo "hello ducky user";
}else {
header("HTTP/1.0 404 Not Found");
}
?>