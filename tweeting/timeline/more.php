<?php

session_start();
ini_set('display_errors', 0);
require_once 'common.php';
require_once 'twitteroauth/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

$user_connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['access_token']['oauth_token'], $_SESSION['access_token']['oauth_token_secret']);
$user_info = $user_connection->get('account/verify_credentials');

if(isset($_SESSION['message'])) {
	$message = $_SESSION['message'];
	$tweetup = $user_connection->post('statuses/update' , array( 'status' => $message));
}
$params = [ 'count' => 21 ];
if (isset($_POST["index"])) {
	$index = $_POST["index"];
}

try{
	if(isset($_GET['max_id'])) {
		$params['max_id'] = $_GET['max_id'];
		switch ($index) {
			case(0):
				$tweets = (array)$user_connection->get('statuses/home_timeline', $params);
			break;
			case(1):
				$tweets = (array)$user_connection->get('statuses/user_timeline', $params);
			break;
			case(2):
				$tweets = (array)$user_connection->get('statuses/mentions_timeline', $params);
			break;
			default:
				$tweets = (array)$user_connection->get('statuses/user_timeline', $params);
			break;
		}
		array_shift($tweets);
	} else {
		switch ($index) {
			case(0):
				$tweets = (array)$user_connection->get('statuses/home_timeline', $params);
			break;
			case(1):
				$tweets = (array)$user_connection->get('statuses/user_timeline', $params);
			break;
			case(2):
				$tweets = (array)$user_connection->get('statuses/mentions_timeline', $params);
			break;
			default:
				$tweets = (array)$user_connection->get('statuses/user_timeline', $params);
			break;
		}
	}
} catch (TwistException $e) {
	echo $e->getMessage();
}

array_pop($tweets);
//var_dump($tweets);
//var_dump($index);

foreach ($tweets as $tweet) {
	if(isset($tweet->entities->media[0]->media_url)){
		
		$img = $tweet->entities->media[i]->media_url;
	}
	
	$created_at = $tweet->created_at;
	$datetime = date('Y-m-d H:i:s', $created_at);
	
	echo '
<li id="tweet_'. $tweet->id_str .'" class="media" style="background-image:url(' . $tweet->user->profile_banner_url . ');  background-size:contain;">
	<div class="mask" style="background-color:rgba(255, 255, 255, 0.7);">
	<p class="pull-right"><span>' . $datetime . '</span></p>
		<a class="media-left" href="https://twitter.com/' . $tweet->user->screen_name . '">
			<img src="' . $tweet->user->profile_image_url_https . '">
		</a>
		<div class="media-body">
			<a href="https://twitter.com/' . $tweet->user->screen_name . '">
				<h4 class="media-heading" style="display:inline;">' . $tweet->user->name . ' : @' . $tweet->user->screen_name . '</h4>
			</a>
			<br><p>' . $tweet->text . '</p>
		</div>
	</div>
</li>
<a href="https://twitter.com/' . $tweet->user->screen_name . '/status/' . $tweet->id . '"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span></a>';
}

echo "<br>";