<?php

session_start();

require_once 'common.php';
require_once 'twitteroauth/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

//セッションに入れておいたさっきの配列
$access_token = $_SESSION['access_token'];

//OAuthトークンとシークレットも使って TwitterOAuth をインスタンス化
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

//ユーザー情報をGET
$user = $connection->get("account/verify_credentials");
//(ここらへんは、Twitter の API ドキュメントをうまく使ってください)

if(isset($_SESSION['tweet'])) {
	$search = $_SESSION['tweet'];
}
$params = array();

if(isset($search)) {

	try{
		if(isset($_GET['max_id'])) {
			$params['max_id'] = $_GET['max_id'];
			$params['count'] = 51;
			if($_SESSION["user"] == "1") {	
				$res = (array )$connection->get('statuses/user_timeline', $params);
			}else if($_SESSION["user"] == "2") {
				$res = (array )$connection->get('statuses/home_timeline', $params);
			}
			array_shift($res);
		}else{
			if($_SESSION["user"] == "1") {	
				$res = (array )$connection->get('statuses/user_timeline', $params);
			}else if($_SESSION["user"] == "2") {
				$res = (array )$connection->get('statuses/home_timeline', $params);
			}
		}
	
	} catch (TwistException $e) {
		echo $e->getMessage();
	}
	
	
	array_pop($res);
	
	foreach ($res as $tweet) {
		$TLuser = $tweet->id_str;
		$TLtweet = $tweet->text;
		if(strstr($TLtweet, $search)) {
			echo '<li id="tweet_' . $TLuser . '">' . $TLtweet . '</li>';
		}
	}

}
