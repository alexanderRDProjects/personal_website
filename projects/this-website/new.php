<?php
$name = $_GET["name"];
$comment = $_GET["comment"];
$db = pg_connect("host=ec2-54-217-243-228.eu-west-1.compute.amazonaws.com dbname=d5rp8t24likiqk user=shozqbxwvyjkrp port=5432 password=5YW1EECQcJb5-9RGbr4gHX9_Pz");

$query = "select userID from userdetails where name = '$name'";
$res = pg_query($db,$query);

echo "<p>".$name." says ".$comment."</p>";
echo "<p> finding userID </p>";
echo var_dump(pg_fetch_all($res));
$userid = pg_fetch_all($res)["userid"];
$sql =<<<EOF
	insert into usercomments (userID,Comment,ProjectId)
	values ('$userid','$comment','website dev');
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