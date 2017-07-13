<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Template</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"/>
	<style>
	html{
		overflow-x: hidden;
	};
	</style>
</head>
<body>
<div class="row">
<br>
</div>
<span class = "container-fluid">
<nav class="navbar navbar-default">
<div class="row justify-content-center">
	<div class="col-1" id="space_one"><br></div>
	<div class="col" id="img"><img alt="" src="menu.png" /></div>
	<div class="col-3" id = "text">Alexander Roberts Dunn Projects</div>
	<div class="col" id="home" >Home</div>
	<div class="col" id="about">About</div>
	<div class="col" id="blog">Blog</div>
	<div class="col" id="projects">Projects</div>
	<div class="col" id="more">More</div>
	<div class="col" id="space_two" ><br></div>
	<div class="col" id="login">Login</div>
	<div class="col" id="signup">Signup</div>

</div>
</nav>
</span>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity=
"sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<div>Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
<script>
function resize_window(jQuery) {
if ($(window).width() < 920){
	 $("#about").hide();
	 console.log("About Hidden");
  }
  if ($(window).width() < 820){
	 $("#space_two").hide();
	 console.log("space two Hidden");
  }
  if ($(window).width() < 770){
	 $("#rand").hide();
	 console.log("rand Hidden");
  }
  if ($(window).width() < 650){
	 $("#text").hide();
	 $("#img").show();
	 console.log("text Hidden");
  }
  if ($(window).width() < 470){
	console.log("switch to mobile design");
	$("#img").show();
	//$("#space_one").hide();
	$("#space_two").show();
	$("#projects").hide();
	$("#login").hide();
	$("#signup").hide();
	$("#blog").hide();
	$("#more").hide();
  }
  if ($(window).width() > 920){
	 $("#about").show();
	 console.log("About Shown");
  }
  if ($(window).width() > 470){
	console.log("switch to mobile design");
	$("#img").hide();
	$("#space_two").hide();
	//$("#space_two").show();
	$("#projects").show();
	$("#login").show();
	$("#signup").show();
	$("#blog").show();
	$("#more").show();
  }
  if ($(window).width() > 820){
	 $("#space_two").show();
	 console.log("space two shown");
  }
  if ($(window).width() > 770){
	 $("#rand").show();
	 console.log("rand Shown");
  }
  if ($(window).width() > 650){
	 $("#text").show();
	 console.log("text Shown");
  } 
  else  {
	console.log("width is "+$(window).width())
  }
}
$(window).resize(resize_window);
$(document).ready(resize_window);
</script>
<link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >
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
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity=
"sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script>
function resize_window(jQuery) {
if ($(window).width() < 920){
	 $("#about").hide();
	 console.log("About Hidden");
  }
  if ($(window).width() < 820){
	 $("#space_two").hide();
	 console.log("space two Hidden");
  }
  if ($(window).width() < 770){
	 $("#rand").hide();
	 console.log("rand Hidden");
  }
  if ($(window).width() < 650){
	 $("#text").hide();
	 $("#img").show();
	 console.log("text Hidden");
  }
  if ($(window).width() < 470){
	console.log("switch to mobile design");
	$("#img").show();
	//$("#space_one").hide();
	$("#space_two").show();
	$("#projects").hide();
	$("#login").hide();
	$("#signup").hide();
	$("#blog").hide();
	$("#more").hide();
  }
  if ($(window).width() > 920){
	 $("#about").show();
	 console.log("About Shown");
  }
  if ($(window).width() > 470){
	console.log("switch to mobile design");
	$("#img").hide();
	$("#space_two").hide();
	//$("#space_two").show();
	$("#projects").show();
	$("#login").show();
	$("#signup").show();
	$("#blog").show();
	$("#more").show();
  }
  if ($(window).width() > 820){
	 $("#space_two").show();
	 console.log("space two shown");
  }
  if ($(window).width() > 770){
	 $("#rand").show();
	 console.log("rand Shown");
  }
  if ($(window).width() > 650){
	 $("#text").show();
	 console.log("text Shown");
  } 
  else  {
	console.log("width is "+$(window).width())
  }
}
$(window).resize(resize_window);
$(document).ready(resize_window);
</script>