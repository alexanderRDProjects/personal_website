<?php
$db = pg_connect("host=ec2-54-217-243-228.eu-west-1.compute.amazonaws.com dbname=d5rp8t24likiqk user=shozqbxwvyjkrp port=5432 password=5YW1EECQcJb5-9RGbr4gHX9_Pz");
$sql =<<<EOF
	select * from usercomments
EOF;

   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
      exit;
   } 
   //echo $ret;
   //echo "Operation done successfully\n";
   pg_close($db);
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
var SignedIn = false
var Name = "None"
function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  SignedIn = true;
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  Name = profile.getName();
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail());
};
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  };
function newcomment () {
	 window.location = "/projects/this/new.php?name="+Name+"&comment="+document.getElementById("comment").value;
 };
</script>
<meta name="google-signin-client_id" content="434726568124-obcv7f1fmpqse2gard1nh55513av5vff.apps.googleusercontent.com">
</head>
<body>
<span class = "container-fluid">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">Alexander Roberts Dunn Projects</a>
    </div>
    <ul class="nav navbar-nav">
		<li><a href="/">Home</a></li>
		<li><a href = "/about/">About</a></li>
		<li class="active"><a href = "/projects/">Projects</a></li>
		<li><a href = "/projects/random">Random Project</a></li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
	<li><a href="#"><div class="g-signin2" data-onsuccess="onSignIn"></div></a></li> 
	</ul>
  </div>
</nav>
<div class="jumbotron text-center">
<h1> This Website </h1>
<p>This website is written using bootstrap for the front end and php for the back end.Its purpose is to show the projects that i am working on and projects that i have completed there will be github repositrys in the decription of each project as all the projects i currently release are open source. i would like the website to show the porject allow poeple to comment on the projects asing for features or showing support or guidance although i think this website will not be a wide accessed website though it might get a DOS attack. finally it will provide interesting project for other people to work on wiht the guidance of the github solution that i will be developing</p>
<h2>
comments
</h2>
<p>
<?php
//var_dump(pg_fetch_all($ret));
while($row = pg_fetch_row($ret)){
      echo "Name = ". $row[2] . "\n";
      echo "Comment =  ".$row[3] ."\n\n";
   }
?>
</p>
<p>add new comment <input type="text" id="comment"/><input type="submit" onclick="newcomment()"/></p>
</div>
</span>
</body>
</html>