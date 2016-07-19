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

	// TL情報を取得
	$statuses = $user_connection->get('statuses/home_timeline', ['count' => '20', 'max_id' => $max_id]);
	
	$_SESSION['statuses'] = $statuses;	//json確認用
	
	
	// 自分のツイート情報を取得
	$user_timeline = $user_connection->get('statuses/user_timeline', ['count' => '20', 'max_id' => $max_id]);
	
	$_SESSION['user_timeline'] = $user_timeline;	//json確認用
	
	header('Location: index.php');
	exit();
}else{
	header('Location: index.php');
	exit();
}
