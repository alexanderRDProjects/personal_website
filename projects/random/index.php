this will redirect you to a random project in the mean time take this link to the projects to decided for your self <a href="/projects/"> link </a>
<?php

$db = pg_connect("host=ec2-54-217-243-228.eu-west-1.compute.amazonaws.com dbname=d5rp8t24likiqk user=shozqbxwvyjkrp port=5432 password=5YW1EECQcJb5-9RGbr4gHX9_Pz");
$sql =<<<EOF
	select name from project offset random() * (select count(*) from project) limit 1 ;
EOF;

   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
      exit;
   } 
   //echo $ret;
   //echo "Operation done successfully\n";
   pg_close($db);
   echo var_dump(pg_fetch_all($ret));
   echo "<p>"."url: /".implode("-",explode(" ",pg_fetch_all($ret)[0]["name"]))."</p>";
   
?>
