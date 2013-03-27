<?php
$companytitle = "Shoreline Shots";
$sqlhostname='localhost';
$sqlusername='shorelj0_public';
$sqlpassword='ftskMatw10';
mysql_connect($sqlhostname,$sqlusername, $sqlpassword) or die('Unable to connect to database! Please try again later.');
	mysql_select_db('shorelj0_shoreline');


require("includes/facebook.php"); 
$config = array();
$config['appId'] = '396526870372920';
$config['secret'] = '8298122ae467892ef61e1c27128b5280';
$config['fileUpload'] = false; // optional
$facebook = new Facebook($config);
  

// See if there is a user from a cookie
$user = $facebook->getUser();

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
	
	
	//Establish Profile
	$fbusername = mysql_real_escape_string($user_profile['username']);
	$fbfirstname = mysql_real_escape_string($user_profile['first_name']);
	$fblastname = mysql_real_escape_string($user_profile['last_name']);
	$fbemail = mysql_real_escape_string($user_profile['email']);
	$fbpassword = "FBpassword";
	$fbid = mysql_real_escape_string($user_profile['id']);
	if(strlen($fbusername)==0){
	$fbusername = mysql_real_escape_string($fbemail);
	}
	$time = time();
	//Make sure hi/she is in our profile as well

	$sqlQueryUsername = mysql_query("SELECT * FROM `users` WHERE `username` = '".$fbusername."' LIMIT 1") or die(mysql_error());
	
	if(mysql_num_rows($sqlQueryUsername) == 0){//Add user to db if not already there
		mysql_query("INSERT INTO `users` (`id` ,`username` ,`password` ,`email` ,`firstname` ,`lastname`,`admin`,`firstlogin`) VALUES ('$fbid',  '$fbusername',  '$fbpassword',  '$fbemail',  '$fbfirstname',  '$fblastname', '0', '$time');");
	}
	$sqlQueryUsername = mysql_query("SELECT * FROM `users` WHERE `username` = '".$fbusername."' LIMIT 1") or die(mysql_error());

	$userData = mysql_fetch_array($sqlQueryUsername);
	$userID = $userData['id'];
	$logoutUrl = $facebook->getLogoutUrl();
	
  } catch (FacebookApiException $e) {
    
    $user = null;
  }
}

?>