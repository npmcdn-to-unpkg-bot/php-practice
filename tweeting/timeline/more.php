<?php

session_start();

require_once 'common.php';
require_once 'twitteroauth/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

$user_connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['access_token']['oauth_token'], $_SESSION['access_token']['oauth_token_secret']);
$user_info = $user_connection->get('account/verify_credentials');

$params = [ 'count' => 21 ];

	
try{
	if(isset($_GET['max_id'])) {
		$params['max_id'] = $_GET['max_id'];
		$tweets = (array)$user_connection->get('statuses/home_timeline', $params);
		array_shift($tweets);
	} else {
		$tweets = (array)$user_connection->get('statuses/home_timeline',$params);
	}
} catch (TwistException $e) {
	echo $e->getMessage();
}

array_pop($tweets);

foreach ($tweets as $tweet) {
	echo '<li id="tweet_' . $tweet->id_str . '">'. $tweet->user->name . ' : @' . $tweet->user->screen_name . '<br>' . $tweet->text . '</li>';
}

echo "<br>";