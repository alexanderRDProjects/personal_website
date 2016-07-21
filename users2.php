<?php 

$host = "ec2-54-217-243-228.eu-west-1.compute.amazonaws.com"; 
$user = "shozqbxwvyjkrp"; 
$pass = "5YW1EECQcJb5-9RGbr4gHX9_Pz"; 
$db = "d5rp8t24likiqk"; 
$port = 5432;

$con = pg_connect("host=ec2-54-217-243-228.eu-west-1.compute.amazonaws.com dbname=d5rp8t24likiqk user=shozqbxwvyjkrp password=5YW1EECQcJb5-9RGbr4gHX9_Pz port=5432")
    or die ("Could not connect to server\n"); 

$query = <<<EOF
      CREATE TABLE USER
      (ID INT PRIMARY KEY     NOT NULL,
	  GKEY           TEXT     NOT NULL,
      NAME           TEXT     NOT NULL,
      EMAIL          TEXT     NOT NULL);
EOF;
$ret = pg_query($con, $sql);
   if(!$ret){
      echo pg_last_error($con);
   } else {
      echo "Table created successfully\n";
   }
pg_close($con);

?>
stufff