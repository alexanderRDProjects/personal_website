<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
var SignedIn = False
function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  SignedIn = True;
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
sutff
<?php 

$host = "localhost"; 
$user = "user12"; 
$pass = "34klq*"; 
$db = "testdb"; 

$con = pg_connect("host=localhost dbname=testdb user=user12 password=34klq*")
    or die ("Could not connect to server\n"); 

$query = "SELECT VERSION()"; 
$rs = pg_query($con, $query) or die("Cannot execute query: $query\n"); 
$row = pg_fetch_row($rs);

echo $row[0] . "\n";
echo "test"."\n";
pg_close($con); 

?>
stufff
</body>
</html>