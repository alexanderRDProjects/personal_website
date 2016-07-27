<?php
//echo "m".$_GET["duck"]."m";
$duck = $_GET["duck"];
if ($duck == "true"){
	echo "hello ducky user";
}else {
	echo "<html><head><title>404 Not Found</title></head><body><h1>Not Found</h1><p>The requested URL /manage.php was not found on this server.</p></body></html>";
	die();
}
$sql =<<<EOF
      \dt;
EOF;

   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
      exit;
   } 
   echo $ret;
   echo "Operation done successfully\n";
   pg_close($db);
?>