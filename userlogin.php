<?php
$username = $_GET["username"];
$db = pg_connect("host=ec2-54-217-243-228.eu-west-1.compute.amazonaws.com dbname=d5rp8t24likiqk user=shozqbxwvyjkrp port=5432 password=5YW1EECQcJb5-9RGbr4gHX9_Pz");
$sql = 'SELECT GoogleID FROM userdetails WHERE GoogleID = "cool_beans";';
$ret = pg_query($db, $sql);
if(!$ret){
	echo pg_last_error($db);
	exit;
} 
   var_dump(pg_fetch_all($ret));
?>