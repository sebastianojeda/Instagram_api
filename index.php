<?php
//Configuration for our php Server
set_time_limit(0);
ini_set('default_socket_timeout', 300);
session_start();

//Make Constants using define
define('clientID', '2ed2f28ebcd2490582a39012eaa4fa4c');
define('clientSecret', 'f6c872ea0bdf4e36b05fb9287b6b8f7d');
define('redirectURI', 'http://localhost/LearningAPI/index.php');
define('ImageDirectory ', 'pics/');

?>

 <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="author" href="humans.txt">
	</head>
	<body>
	<!-- Creating a login for people to go and give approval for our web app to access their instagram account
			After getting approval we are going to have the info so that we can play with it
	-->
		<a href="https://api.instagram.com/oauth/authorize/?client_id=<?php echo clientID; 
		?>&redirect_uri=<?php echo redirectURI; ?>&response_type=code">Login</a>
		<script type="text/javascript" src="js/main.js"></script>
	</body>
</html>


