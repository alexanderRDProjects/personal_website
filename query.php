<?php
$db = pg_connect("host=ec2-54-217-243-228.eu-west-1.compute.amazonaws.com dbname=d5rp8t24likiqk user=shozqbxwvyjkrp port=5432 password=5YW1EECQcJb5-9RGbr4gHX9_Pz");
$sql = "";
   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
      exit;
   } 
   echo "Operation done succes sfully\n";
   var_dump(pg_fetch_all($ret));
   pg_close($db); 
?>