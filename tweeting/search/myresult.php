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
$tweet =  $_SESSION['tweet'];
if(isset($tweet)){
	$search = htmlspecialchars($tweet);
	var_dump($search);
}

	$max_id = htmlspecialchars($_GET['max_id']);
	var_dump($max_id);

$params = array();


if(isset($search)) {

	try{
		if(isset($max_id)) {
			$params['max_id'] = $max_id;
			$params['count'] = 51;
			if($_SESSION["radio"] == "1") {
				$tweets = (array )$connection->get('statuses/user_timeline', $params);
			} else if($_SESSION["radio"] == "2") {
				$tweets = (array )$connection->get('statuses/home_timeline', $params);
			}
			array_shift($tweets);
		} else {
			if($_SESSION["radio"] == "1") {
				$tweets = (array )$connection->get('statuses/user_timeline', $params);
			} else if($_SESSION["radio"] == "2") {
				$tweets = (array )$connection->get('statuses/home_timeline', $params);
			}
		}

	} catch (TwistException $e) {
		echo $e->getMessage();
	}

	array_pop($tweets);

	foreach ($tweets as $tweeting) {
		$TLid = $tweeting->id_str;
		$TLname = $tweeting->user->name;
		$TLscreen = $tweeting->user->screen_name;
		$TLtweet = $tweeting->text;
		if(strstr($TLtweet, $search)) {
			echo '<li id="tweet_' . $TLid . '">' .$TLname . " : @". $TLscreen ."<br>" . $TLtweet . '</li>';
		}
	}

}
