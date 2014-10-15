<?php
	require_once('config.php');
	require_once 'google-api-php-client/src/Google_Client.php';
	require_once 'google-api-php-client/src/contrib/Google_DriveService.php';
	require_once 'google-api-php-client/autoload.php';
	
	$client = new Google_Client();
	// Get your credentials from the console
	$client->setClientId($oauth2_client_id);
	$client->setClientSecret($oauth2_secret);
	$client->setRedirectUri($oauth2_redirect);
	$client->setScopes(array('https://www.googleapis.com/auth/drive.readonly'));
	$client->setApplicationName("Itcslive");
	
	$service = new Google_DriveService($client);
	
	$authUrl = $client->createAuthUrl();
	header('Location: ' . $authUrl);
	
?>
