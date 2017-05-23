<?php
$db = pg_connect("host=ec2-54-217-243-228.eu-west-1.compute.amazonaws.com dbname=d5rp8t24likiqk user=shozqbxwvyjkrp port=5432 password=5YW1EECQcJb5-9RGbr4gHX9_Pz");
?>
<!DOCTYPE html>
<html>
<head>
<title>Alexander Projects</title>
<link rel='shortcut icon' href='https://alexander-rd.herokuapp.com/favicon.ico' type='image/x-icon'/ >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
var SignedIn = false
function onSignIn(googleUser) {
	var profile = googleUser.getBasicProfile();
	SignedIn = true;
	console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
	console.log('Name: ' + profile.getName());
	console.log('Image URL: ' + profile.getImageUrl());
	console.log('Email: ' + profile.getEmail());
	//alert("signed in ajax call here");
	var xmlhttp = new XMLHttpRequest();
	console.log("userlogin.php?googleID=" +profile.getId()+"&Name="+profile.getName()+"&url="+profile.getImageUrl());
	xmlhttp.open("GET", "userlogin.php?googleID=" +profile.getId()+"&Name="+profile.getName()+"&url="+profile.getImageUrl(), true);
	xmlhttp.send();
	console.log("login_request sent");
}
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
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
		<li class="active"><a href="/">Home</a></li>
		<li><a href = "/about/">About</a></li>
		<li><a href = "/blog/">Blog</a></li>
		<li><a href = "/projects/">Projects</a></li>	
		<li><a href = "/projects/random/">Random Project</a></li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
	<li><a href="#"><div class="g-signin2" data-onsuccess="onSignIn"></div></a></li> 
	</ul>
  </div>
</nav>
<div class="jumbotron text-center" style="
    background-color: rgba(238,238,238,0.5);
">
<h1> Coding, Web Design and More </h1>
<h4><br></h4>
<p><br></p>
<h2> Built With </h2>
<p><br></p>
<div class="row">
    <div class="col-sm-4">
	<a href="https://www.heroku.com/">
	<img src="heroku-logo.jpg" style="
    width: 100%;
    height: 100%;
"></a>
	</div>
    <div class="col-sm-4">
	<a href = "http://www.php.net/">
	<img src="php-logo.gif" style="
    width: 60%;
    /* height: 100%; */
"></a>
	</div>
	
    <div class="col-sm-4">
	<a href="http://getbootstrap.com/">
	<img src="bootstrap-logo.png"/>
	</a></div>
  </div>
</div>
</span>
<div style='position:absolute;z-index:-15;left:0;top:0;width:100%;height:100%'>
  <img src='background.jpg' style='width:100%;height:100%' alt='[]' />
</div>
</body>
</html>
