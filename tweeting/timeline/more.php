<?php

session_start();

require_once 'common.php';
require_once 'twitteroauth/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

$user_connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['access_token']['oauth_token'], $_SESSION['access_token']['oauth_token_secret']);
$user_info = $user_connection->get('account/verify_credentials');


$message = $_SESSION['message'];
$tweetup = $user_connection->post('statuses/update' , array( 'status' => $message));

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
//var_dump($tweets);
foreach ($tweets as $tweet) {
	echo '
<li id="tweet_'. $tweet->id_str .'" class="media" style="background-image:url(' . $tweet->user->profile_background_image_url_https . '); ">
	<div class="mask" style="background-color:rgba(255, 255, 255, 0.7)">
		<a class="media-left" href="https://twitter.com/' . $tweet->user->screen_name . '">
			<img src="' . $tweet->user->profile_image_url_https . '">
		</a>' . '
		<div class="media-body">
			<a href="https://twitter.com/' . $tweet->user->screen_name . '">
				<h4 class="media-heading">' . $tweet->user->name . ' : @' . $tweet->user->screen_name . '</h4>
			</a>
			<br><p>' . $tweet->text . '</p>
		</div>
	</div>
</li>';
}

echo "<br>";