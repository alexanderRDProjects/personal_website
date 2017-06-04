<?php
//echo "m".$_GET["duck"]."m";
      // select column_name, data_type, character_maximum_length
// from INFORMATION_SCHEMA.COLUMNS where table_name = 'usercomments'; 
	// insert into usercomments (commentID,GoogleID,Name,Comment,ProjectName)
	// values (1,1,'Alexander Roberts Dunn','Does this work','website dev');
$duck = $_GET["duck"];
if ($duck == "true"){
	echo "hello ducky user";
}else {
	echo "<html><head><title>404 Not Found</title></head><body><h1>Not Found</h1><p>The requested URL /manage.php was not found on this server.</p></body></html>";
	die();
}
$db = pg_connect("host=ec2-54-217-243-228.eu-west-1.compute.amazonaws.com dbname=d5rp8t24likiqk user=shozqbxwvyjkrp port=5432 password=5YW1EECQcJb5-9RGbr4gHX9_Pz");
$sql =<<<EOF
	select * from usercomments
EOF;

   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
      exit;
   } 
   echo $ret;
   echo "Operation done successfully\n";
   var_dump(pg_fetch_all($ret));
   pg_close($db);
?>