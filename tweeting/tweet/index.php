<?php 
session_start();
 
header("Content-type: text/html; charset=utf-8");
 
if(!isset($_SESSION['access_token'])){
	echo "<a href='login.php'>Twitterでログイン</a>";
}else{	
	echo "<p><a href='logout.php'>ログアウト</a></p>";
	
	$statuses = $_SESSION['statuses'];
	
	if (isset($statuses) && empty($statuses->errors)) {
		foreach ($statuses as $val) {
			echo $val->user->name . ' : @' . $val->user->screen_name . '<br>';
			echo $val->text .'<br><br>';
		}
	} else {
		echo 'つぶやきはありません。';
	}
	
	echo "<pre>";
	var_dump($statuses);
	echo "</pre>";
}