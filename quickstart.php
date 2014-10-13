<?php
	require_once 'google-api-php-client/src/Google_Client.php';
	require_once 'google-api-php-client/src/contrib/Google_DriveService.php';
	
	$client = new Google_Client();
	// Get your credentials from the console
	$client->setClientId('YOUR_CLIENT_ID');
	$client->setClientSecret('YOUR_CLIENT_SECRET');
	$client->setRedirectUri('urn:ietf:wg:oauth:2.0:oob');
	$client->setScopes(array('https://www.googleapis.com/auth/drive'));
	
	$service = new Google_DriveService($client);
	
	$authUrl = $client->createAuthUrl();
	
	//Request authorization
	print "Please visit:\n$authUrl\n\n";
	print "Please enter the auth code:\n";
	$authCode = trim(fgets(STDIN));
	
	// Exchange authorization code for access token
	$accessToken = $client->authenticate($authCode);
	$client->setAccessToken($accessToken);
	
	//Insert a file
	$file = new Google_DriveFile();
	$file->setTitle('My document');
	$file->setDescription('A test document');
	$file->setMimeType('text/plain');
	
	$data = file_get_contents('document.txt');
	
	$createdFile = $service->files->insert($file, array(
		  'data' => $data,
		  'mimeType' => 'text/plain',
		));
	
	print_r($createdFile);
?>
<?php
  require_once 'google-api-php-client/autoload.php'; // or wherever autoload.php is located
  $client = new Google_Client();
  $client->setApplicationName("Client_Library_Examples");
  $client->setDeveloperKey("YOUR_APP_KEY");
  $service = new Google_Service_Books($client);
  $optParams = array('filter' => 'free-ebooks');
  $results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);

  foreach ($results as $item) {
    echo $item['volumeInfo']['title'], "<br /> \n";
  }
  ?>
