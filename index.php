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

//function that is goinig to connect to instagram
function connectToInsatgram($url){
	$ch = curl_init();

	curl_setopt_array($ch, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_SSL_VERIFYHOST => 2,
	));
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}

	if (isset($_GET['code'] )){
		$code = ($_GET['code'] );
		$url = 'https://api.instagram.com/oauth/access_token';
		$access_token_settings = array('client_id' => clientID,
																	 'client_secret' => clientSecret,
																	 'grant_type' => 'authorization_code',
																	 'redirect_uri' => redirectURI,
																	 'code' => $code);
		//cURL is what we use in php
$curl = curl_init($url);//setting a curl session and we put in a $url because that's where we are getting the data from
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $access_token_settings);//setting POSTFIELDS to the array setup that we created
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//setting it equal to 1 because we are getting strings back
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//but in live work-production we want to set this to true

$result = curl_exec($curl);
curl_close($curl);

$result = json_decode($result, true);
echo $result['user']['username'];
}	else{

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
<?php
}
?>


