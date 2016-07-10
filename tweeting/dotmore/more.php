<?php

session_start();

require_once 'common.php';
require_once 'twitteroauth/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

$params = array(
	'screen_name' => 'sutobu000',
	'include_rts' => true
);

if(isset($_GET['max_id'])) {
	$params['max_id'] = $_GET['max_id'];
	$params['count'] = 21;
	$tweets = (array)$connection->get('statuses/user_timeline', $params);
	array_shift($tweets);
} else {
	$tweets = (array)$connection->get('statuses/user_timeline',$params);
}

array_pop($tweets);

foreach ($tweets as $tweet) {
	echo '<li id="tweet_' . $tweet->id_str . '">' . $tweet->text . '</li>';
}
