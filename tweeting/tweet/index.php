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
}
?>

<script type="text/javascript" src="jquery-1.9.1.min.js">

$(function(){
		var max_id;

	$(window).scroll(function() {
		if ($(window).scrollTop() + $(window).height() == $(document).height()) {
			more();
		}
	});

	function more() {
		$("#loading").show();

		if ($('#tweets > li').length) {
			max_id = $('#tweets > li:last').attr('id').replace(/^tweet_/, '');
		}

	console.log(max_id);
		$.get('callback.php', {
			max_id: max_id
		}, function(rs) {
			$('#loading').hide();
			$(rs).appendTo('#tweets').hide().fadeIn(800);
		});
	}

	more();
	
});

</script>