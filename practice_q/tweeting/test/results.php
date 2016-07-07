<?php

require "TwistOAuth.phar";

$ck = 'riqXgVrqXGIOEfH4AGvYEEOSo';
$cs = 'pcF4jU9Cq8gUt4ZAd7JYedovTNXTh7Mr0m9UP3hDppCnSq6OFq';
$at = '152981346-QZ2vdLUH6dg5L8dM9jcDWwS9MCdbzgI24NJhiZlW';
$ats = 'hCcAwWqCOotPRQW0rR5OujTVIcqmvror7ea9D7vutxcXk';


$to = new TwistOAuth($ck, $cs, $at, $ats);

$tweeting = $_POST['tweet'];


/*
$tweetnow = $to->post(
			"status/update",
			array("status" => $tweeting)
);
*/

$tweet_parms = array('count' => 200);
$search = $tweeting;

try{
	if($_REQUEST["user"] == "1") {	
		$res = $to->get('statuses/user_timeline', $tweet_parms);
	}else if($_REQUEST["user"] == "2") {
		$res = $to->get('statuses/home_timeline', $tweet_parms);
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
}
echo '<form action="search_tweet.php" method="post"><input type="submit" name="submit" value="もう一度検索"></form>';