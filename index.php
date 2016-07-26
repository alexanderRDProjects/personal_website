<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="http://apis.google.com/js/platform.js" async defer></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
<style type="text/css">
::-webkit-scrollbar {
  width: 6px;
  height: 6px;
}
::-webkit-scrollbar-button {
  width: 3px;
  height: 3px;
}
::-webkit-scrollbar-thumb {
  background: #e1e1e1;
  border: 0px none #ffffff;
  border-radius: 84px;
}
::-webkit-scrollbar-thumb:hover {
  background: #ffffff;
}
::-webkit-scrollbar-thumb:active {
  background: #000000;
}
::-webkit-scrollbar-track {
  background: #666666;
  border: 0px none #ffffff;
  border-radius: 92px;
}
::-webkit-scrollbar-track:hover {
  background: #666666;
}
::-webkit-scrollbar-track:active {
  background: #333333;
}
::-webkit-scrollbar-corner {
  background: transparent;
}
</style>
<meta name="google-signin-client_id" content="434726568124-obcv7f1fmpqse2gard1nh55513av5vff.apps.googleusercontent.com">
</head>
<body>
<span class = "container-fluid">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li> 
      <li><a href="#">Page 3</a></li> 
    </ul>
	<ul class="nav navbar-nav navbar-right">
	<li>sign in with google <div class="g-signin2" data-onsuccess="onSignIn"></div></li>
	</ul>
  </div>
</nav>
<ul>
<li><a href = "/">home</a></li>
<li><a href = "/about/">about</a></li>
<li><a href = "/projects/view/">projects</a></li>
<li><a href = "/projects/">random projects</a></li>
</ul>
<p>sign in with google</p>

<a href="#" onclick="signOut();">Sign out</a>
</span>
</body>
</html>