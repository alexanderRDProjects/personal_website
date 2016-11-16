<?php
$googleID = $_GET["googleID"];
$name = $_GET["Name"];
$url = $_GET["url"];
$db = pg_connect("host=ec2-54-217-243-228.eu-west-1.compute.amazonaws.com dbname=d5rp8t24likiqk user=shozqbxwvyjkrp port=5432 password=5YW1EECQcJb5-9RGbr4gHX9_Pz");
$sql = "SELECT GoogleID FROM userdetails WHERE GoogleID = '".$googleID."';";
$ret = pg_query($db, $sql);
if(!$ret){
	//echo pg_last_error($db);
	exit;
} 
//echo "<p>fetched :",var_dump(pg_fetch_all($ret)),"ASDF;</p>";
$found = false;
foreach (pg_fetch_all($ret) as $val) {
	if ($val["googleid"] == $googleID) {
		$found = true;
		//echo "found";
	}
	//echo "<p>".$val["googleid"]."</p>";
};
if ($found == false){
	//
	// get user details
	$sqli = "INSERT INTO userdetails(name,googleid,url) VALUES ('".$name."','".$googleID.",".$url."');";
	//echo "sql:",$sqli,"sqlie";
	$reti = pg_query($db,$sqli);
	//echo "success";
} else {
	//echo "already here";
}
?>
