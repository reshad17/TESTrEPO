<?php
	session_start();

	require_once "Facebook/autoload.php";

	$FB = new \Facebook\Facebook([
		'app_id' => '379168652966265',  //Enter your facebook app id
		'app_secret' => 'c9b3614ab63957bc35327219e80e2467', //Enter your app secret key
		'default_graph_version' => 'v2.10'
	]);

	$helper = $FB->getRedirectLoginHelper();
?>

