<?php 
session_start();
?> 
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>twitterを見てみる</title>
<script src="./jquery-1.9.1.min.js"></script>
</head>

<body>
<?php
 
if(!isset($_SESSION['access_token'])){
	echo "<a href='login.php'>Twitterでログイン</a>";
}else{	
	echo "<p><a href='logout.php'>ログアウト</a></p>";
	
//	$statuses = $_SESSION['statuses'];
//	echo '<ul id="tweets">';
//	if (isset($statuses) && empty($statuses->errors)) {
//		foreach ($statuses as $val) {
//			echo '<li>' . $val->user->name . ' : @' . $val->user->screen_name . '<br>';
//			echo $val->text .'<br><br></li>';
//		}
//		if (isset($_POST['reload'])) {
//			include_once 'callback.php';
//		}
//	} else {
//		echo 'つぶやきはありません。';
//	}
//	echo '</ul>';
echo '
	<ul id="tweets">
	</ul>
	
	<p id="loading" style="display:none;">loading...</p>
	<input type="button" id="more" value="もっと読む">';
}
?>

<script type="text/javascript">

$(function() {
	var max_id;

	$('#more').click(function() {
		$('#loading').show();

		if ($('#tweets > li ').length) {
			max_id = $('#tweets > li:last').attr('id').replace(/^tweet_/, '');
		}
		console.log(max_id);
		
		$.get('background.php', {
			max_id: max_id
		}, function(rs) {
			$('#loading').hide();
			$(rs).appendTo('#tweets');
		});

	});
});

</script>


</body>
</html>