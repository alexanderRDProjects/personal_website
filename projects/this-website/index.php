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
	 window.location = "/projects/this-website/new.php?name="+Name+"&comment="+document.getElementById("comment").value;
 };
</script>
<meta name="google-signin-client_id" content="434726568124-obcv7f1fmpqse2gard1nh55513av5vff.apps.googleusercontent.com">
</head>
<body style="
    background-image: url(http://alexander-rd.herokuapp.com/projects/This-Website/background.jpg);
">
<span class = "container-fluid">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">Alexander Roberts Dunn Projects</a>
    </div>
    <ul class="nav navbar-nav">
		<li><a href="/">Home</a></li>
		<li><a href = "/about/">About</a></li>
		<li><a href = "/blog/">Blog</a></li>
		<li class="active"><a href = "/projects/">Projects</a></li>
		<li><a href = "/projects/random">Random Project</a></li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
	<li><a href="#"><div class="g-signin2" data-onsuccess="onSignIn"></div></a></li> 
	</ul>
  </div>
</nav>
<div class="jumbotron text-center" style="
    background-color: rgba(238,238,238,0.5);
">
<h1> This Website </h1>
<p>This website is written using bootstrap for the front end and php for the back end. Its purpose is to show the projects that I am working on and projects that I have completed there will be github repositories in the description of each project as all the projects I currently release are open source. I would like the website to show the project allow people to comment on the projects asking for features or showing support or guidance although I think this website will not be a wide accessed website though it might get a DOS attack. finally, it will provide interesting project for other people to work on with the guidance of the github solution that I will be developing </p>
</div>
<div class="jumbotron" style="padding-top: 24px;background-color: rgba(238,238,238,0.5);">
<h2 style="text-align: center;">
comments
</h2>
<p>
<?php
// this is the extraction and formating of the user comments

// first each of the comments omust be extracted
$commentsql ="SELECT userid,comment FROM usercomments WHERE itemid = '1'; ";
$comment_results = pg_fetch_all(pg_query($db, $commentsql));
   if(!$comment_results){
      echo pg_last_error($db);
      exit;
   }
//var_dump($comment_results);
//then extract the userdetails so we can see who make each comment
$usersql = "SELECT * FROM userdetails";
$user_results = pg_fetch_all(pg_query($db,$usersql));
   if(!$comment_results){
      echo pg_last_error($db);
      exit;
   }
//var_dump($user_results);
//then matching them up into a multi dimension array and echo
$comments = [];
$comment = [];
foreach ($comment_results as &$comment_result)
{
	$comment= [];
	foreach($user_results as &$user_result)
	{
		if ($user_result["userid"] == $comment_result["userid"])
		{
			array_push($comment,$user_result["userid"],$user_result["url"]);
		}
		
		
	}
	array_push($comment,$comment_result["comment"]);
	array_push($comments,$comment);
}
var_dump($comments)
 
?>
</p>


<p>add new comment <input type="text" id="comment"/><input type="submit" onclick="newcomment()"/></p>
</div>
</span>
<?php 
pg_close($db);
?>
</body>
</html>
