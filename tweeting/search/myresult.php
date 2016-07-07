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
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>twitterを見てみる</title>
<script src="jquery-3.0.0.min.js"></script>
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

<ul class="tweet-list">

<?php
foreach ($res as $tweet) {
	$TLuser = $tweet->user->screen_name.PHP_EOL;
	$TLtweet = $tweet->text.PHP_EOL;
	if(strstr($TLtweet, $search)) {
		echo "<li>@".$TLuser;
		echo " <br> ";
		echo $TLtweet;
		echo "</li>";
	}
	if($tweet === end($res)){
		$endtweet = $tweet->id;
	}
}

$_SESSION['endtweet'] = $endtweet;

?>

</ul>
t/css">

.tweet-list {
	width: 80%;
	margin: 20px auto;
	padding: 0;
	list-style: none;
}

.tweet-list > li {
	margin-bottom: 10px;
	padding: 10px;
	line-height: 1.4;
	background-color: #C8F0F7;
	border-radius: 20px;
}

</style>

</body>
</html>

