<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
function check_sign(bool){
	if (bool) {
		console.log("Signed In")
	} else {
		console.log("Not Signed In")
	}
}
function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
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
<p>sign in with google</p>
<div class="g-signin2" data-onsuccess="onSignIn"></div>
<a href="#" onclick="signOut();">Sign out</a>
</body>
</html>