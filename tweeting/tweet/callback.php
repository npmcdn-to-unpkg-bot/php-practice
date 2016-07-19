<?php
session_start();

require_once 'common.php';
require_once 'twitteroauth/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

//oauth_tokenとoauth_verifierを取得
if($_SESSION['oauth_token'] == $_GET['oauth_token'] and $_GET['oauth_verifier']){
	
	//Twitterからアクセストークンを取得する
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
	$access_token = $connection->oauth('oauth/access_token', array('oauth_verifier' => $_GET['oauth_verifier'], 'oauth_token'=> $_GET['oauth_token']));

	//取得したアクセストークンでユーザ情報を取得
	$user_connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	
	$_SESSION['access_token'] = $access_token; //ログイン確認用
	
	$_SESSION['connection'] = $user_connection;
	
	$params = ['count' => 21];
	

	if(isset($_GET['max_id'])) {
		$params['max_id'] = $_GET['max_id'];
		
		// TL情報を取得
		$statuses = $user_connection->get('statuses/home_timeline', $params);
		// 自分のツイート情報を取得
		$user_timeline = $user_connection->get('statuses/user_timeline', $params);
		
		array_shift($tweets);
		
	} else {
		
		// TL情報を取得
		$statuses = $user_connection->get('statuses/home_timeline', $params);
		// 自分のツイート情報を取得
		$user_timeline = $user_connection->get('statuses/user_timeline', $params);
		

	}
	array_pop($tweets);
	
	$_SESSION['statuses'] = $statuses;	//json確認用
	$_SESSION['user_timeline'] = $user_timeline;	//json確認用
	
	
	foreach ($tweets as $tweet) {
		echo '<li id="tweet_' . $tweet->id_str . '">' . $tweet->text . '</li>';
	}
		
	header('Location: index.php');
	exit();
}else{
	header('Location: index.php');
	exit();
}
