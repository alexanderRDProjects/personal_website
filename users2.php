<?php 

$host = "ec2-54-217-243-228.eu-west-1.compute.amazonaws.com"; 
$user = "shozqbxwvyjkrp"; 
$pass = "5YW1EECQcJb5-9RGbr4gHX9_Pz"; 
$db = "d5rp8t24likiqk"; 
$port = 5432;

$con = pg_connect("host=ec2-54-217-243-228.eu-west-1.compute.amazonaws.com dbname=d5rp8t24likiqk user=shozqbxwvyjkrp password=5YW1EECQcJb5-9RGbr4gHX9_Pz port=5432")
    or die ("Could not connect to server\n"); 

$query = "SELECT VERSION()"; 
$rs = pg_query($con, $query) or die("Cannot execute query: $query\n"); 
$row = pg_fetch_row($rs);

echo $row[0] . "\n";
echo "test"."\n";
pg_close($con);

?>
stufff