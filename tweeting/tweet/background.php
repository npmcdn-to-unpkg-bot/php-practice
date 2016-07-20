<?php
session_start();

require_once 'common.php';
require_once 'twitteroauth/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

$connection = $_SESSION['connection'];
$user_info = $_SESSION['user_info'];
$screen_name = $user_info->screen_name;
	
$params = [
	'screen_name' => $screen_name,
	'count' => 21
	];


if(isset($_GET['max_id'])) {
	$params['max_id'] = $_GET['max_id'];
	
	// TL情報を取得
	$statuses = (array)$connection->get('statuses/home_timeline', $params);
	// 自分のツイート情報を取得
	$user_timeline = (array)$connection->get('statuses/user_timeline', $params);
	
	array_shift($statuses);
	
} else {

	// TL情報を取得
	$statuses = (array)$connection->get('statuses/home_timeline', $params);
	// 自分のツイート情報を取得
	$user_timeline = (array)$connection->get('statuses/user_timeline', $params);
	
}
array_pop($statuses);

$_SESSION['statuses'] = $statuses;	//json確認用
$_SESSION['user_timeline'] = $user_timeline;	//json確認用


foreach ($statuses as $tweet) {
	echo '<li id="tweet_' . $tweet->id_str . '">' . $tweet->text . '</li>';
}
