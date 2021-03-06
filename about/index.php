<!DOCTYPE html>
<html>
<head>
<title>About Me </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
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
		<li><a href="/">Home</a></li>
		<li class="active"><a href = "/about/">About</a></li>
		<li><a href = "/blog/">Blog</a></li>
		<li><a href = "/projects/">Projects</a></li>
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
<h1> About </h1>
<div class="row">
    <div class="col-sm-2"><br></div>
    <div class="col-sm-6">
	<p>
	I am a computer science enthusiast how enjoys working of software project. 
	I am a maths undergraduate currently in the first year of a mathematics degree. 
	I enjoy web design as a main area of computing mainly specialising in PHP 
	(which this website is built in) but enjoy other aspects of computer science,
	such as building a primitive engine of programming language (in a lexical then syntax analysis method).
	However, I sometimes delve into hardware programming for example I collaborated with some of my friends in Year 13 and we built a robot for PiWars 2015.
	</p>
	</div>
	<div class="col-sm-2">
	<img src="me.png" style="
    width: 100%;
    /* height: 100%; */
">
	</div>
	<div class="col-sm-2"><br></div>
	
</div>
</div>
</span>
<div style='position:absolute;z-index:-15;left:0;top:0;width:100%;height:100%'>
  <img src='about.jpg' style='width:100%;height:100%' alt='[]' />
</div>
</body>
</html>