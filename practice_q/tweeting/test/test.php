<?php

require "TwistOAuth.phar";

$ck = 'riqXgVrqXGIOEfH4AGvYEEOSo';
$cs = 'pcF4jU9Cq8gUt4ZAd7JYedovTNXTh7Mr0m9UP3hDppCnSq6OFq';
$at = '152981346-QZ2vdLUH6dg5L8dM9jcDWwS9MCdbzgI24NJhiZlW';
$ats = 'hCcAwWqCOotPRQW0rR5OujTVIcqmvror7ea9D7vutxcXk';

$to = new TwistOAuth($ck, $cs, $at, $ats);

$result = $to->post(
		"status/update",
		["status" => "てｓｔ"]);

