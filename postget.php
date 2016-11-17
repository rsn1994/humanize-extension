<?php
session_start();

require_once __DIR__ . '/src/Facebook/autoload.php';
require "connect.php";
$id=$_POST["id"];
$fb = new Facebook\Facebook([
  'app_id' => '352671538404366',
  'app_secret' => '748406f31213e2ff22afd268c6220ba0',
  'default_graph_version' => 'v2.4',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['manage_pages', 'publish_pages']; // optional
	
try {
	if (isset($_SESSION['facebook_access_token'])) {
		$accessToken = $_SESSION['facebook_access_token'];
	} else {
  		$accessToken = $helper->getAccessToken();
	}
} catch(Facebook\Exceptions\FacebookResponseException $e) {
 	// When Graph returns an error
 	echo 'Graph returned an error: ' . $e->getMessage();

  	exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
 	// When validation fails or other local issues
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
  	exit;
 }

if (isset($accessToken)) {
	if (isset($_SESSION['facebook_access_token'])) {
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	} else {
		// getting short-lived access token
		$_SESSION['facebook_access_token'] = (string) $accessToken;

	  	// OAuth 2.0 client handler
		$oAuth2Client = $fb->getOAuth2Client();

		// Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);

		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

		// setting default access token to be used in script
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}

	// redirect the user back to the same page if it has "code" GET variable
	if (isset($_GET['code'])) {
		header('Location: ./');
	}

	// getting basic info about user
	try {
		$profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
		$profile = $profile_request->getGraphNode()->asArray();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		echo 'Graph returned an error: ' . $e->getMessage();
		session_destroy();
		// redirecting user back to app login page
		header("Location: ./");
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}

$sql = "SELECT postids FROM user_url WHERE ID='$id'";
$result = $conn->query($sql);
 if ($result->num_rows > 0) {
   // post on behalf of page
$row = $result->fetch_assoc();
          $pst=$row["postids"];
}
$pages = $fb->get('/me/accounts');
	$pages = $pages->getGraphEdge()->asArray();
	foreach ($pages as $key) {
		if ($key['name'] == 'Humanize') {
$getcomment= $fb->get('/'.$pst.'?fields=comments{message,like_count}', $key['access_token']);
	$getcomment = $getcomment->getGraphNode()->asArray();
			
		}
	}

$like=0;
for ($x = 0; $x <= 10; $x++) {
  if($getcomment['comments'][$x]['like_count']>=$like)
{
$like=$getcomment['comments'][$x]['like_count'];
$message=$getcomment['comments'][$x]['message'];
}
}
print_r($message);
$sql = "UPDATE user_url SET description='$message' where ID='$id'";
$test=$conn->query($sql);
} else {
	
            
	$loginUrl = $helper->getLoginUrl('http://www.humanize.gq/postget.php/', $permissions);
	echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
}
?>