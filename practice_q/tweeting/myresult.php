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

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>twitterを見てみる</title>
</head>

<body>
<h1>自分のツイートを検索</h1>
<p>直近200件のツイートから探したいワードで検索！</p>
<form action="myresult.php" method="post">
    <input type="radio" name="user" value="1"{$checked["test_c"][1]}>自分のツイート
    <input type="radio" name="user" value="2"{$checked["test_c"][2]}>自分のTL
    
    <input type="text" name='tweet'>
    <input type="submit" value="検索">
</form>

<?php
$user_tweets = $user->statuses_count;
$tweetNum = ceil($user_tweets / 200);

$endtweet = 0;

$tweeting = $_POST['tweet'];

$tweet_parms = array('count' => 200);
$search = $tweeting;

try{
	if($_REQUEST["user"] == "1") {	
		$res = $connection->get('statuses/user_timeline', $tweet_parms);
	}else if($_REQUEST["user"] == "2") {
		$res = $connection->get('statuses/home_timeline', $tweet_parms);
	}

} catch (TwistException $e) {
	echo $e->getMessage();
}

foreach ($res as $tweet) {
	$TLuser = $tweet->user->screen_name.PHP_EOL;
	$TLtweet = $tweet->text.PHP_EOL;
	if(strstr($TLtweet, $search)) {
		echo $TLuser;
		echo " : ";
		echo $TLtweet;
		echo "<br>";
	}
	if($tweet === end($res)){
		$endtweet = $tweet->id;
	}
}

?>

</body>
</html>

