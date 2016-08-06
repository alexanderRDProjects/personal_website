<?php
$name = $_GET["name"];
$comment = $_GET["comment"];
$db = pg_connect("host=ec2-54-217-243-228.eu-west-1.compute.amazonaws.com dbname=d5rp8t24likiqk user=shozqbxwvyjkrp port=5432 password=5YW1EECQcJb5-9RGbr4gHX9_Pz");
//userid
$query = "select userID from userdetails where name = '$name'";
$res = pg_query($db,$query);

echo "<p>".$name." says ".$comment."</p>";
echo "<p> finding userID </p>";
echo var_dump(pg_fetch_all($res));
$userid = pg_fetch_all($res)[0]["userid"];
echo "<p>userid is".$userid."</p>";
//project id
$pquery = "select projectid from project where name = 'This Website'";
$pres = pg_query($db,$pquery);

echo "<p>".$name." says ".$comment."</p>";
echo "<p> finding projectID </p>";
echo var_dump(pg_fetch_all($pres));
$projectid = pg_fetch_all($pres)[0]["projectid"];
echo "<p>projectid is".$projectid."</p>";
$sql =<<<EOF
	insert into usercomments (userID,Comment,ProjectId)
	values ($userid,'$comment',$projectid);
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