<?php

session_start();

require_once 'common.php';
require_once 'twitteroauth/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

//セッションに入れておいたさっきの配列
$access_token = $_SESSION['access_token'];

//OAuthトークンとシークレットも使って TwitterOAuth をインスタンス化
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

$params = array(
	'screen_name' => 'taguchi',
	'include_rts' => true
);

if(isset($_GET['max_id'])) {
	$params['max_id'] = $_GET['max_id'];
	$params['count'] = 21;	
	$tweets = (array )$connection->get('statuses/user_timeline', $params);
	array_shift($tweets);
}else{
$tweets = (array )$connection->get('statuses/user_timeline', $params);
}

array_pop($tweets);

foreach ($tweets as $tweet) {
	echo'<li id="tweet_' . $tweet->id_str . '">' . $tweet->text . '</li>';
}