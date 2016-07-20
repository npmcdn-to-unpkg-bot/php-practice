<?php
session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>twitterを見てみる</title>
<script src="./jquery-1.10.1.min.js"></script>
</head>

<body>
<?php

if(!isset($_SESSION['access_token'])):
	echo "<a href='login.php'>Twitterでログイン</a>";
?>
<?php else:
	echo "<p><a href='logout.php'>ログアウト</a></p>";
?>

<h1>TLを読む</h1>
<ul id="tweets" class="home-tl">
</ul>
<ul id="tweets" class="my-tl">
</ul>

<p id="loading" style="display:none;">loading...</p>
<input type="button" id="more" value="もっと読む">

<?php endif; ?>

<script>

$(function() {

		$('#homebtn').on('click', function() {
			$('.home-tl').css('display', 'block');
			$('.my-tl').css('display', 'none');
		});
		$('#mybtn').on('click', function() {
			$('.home-tl').css('display', 'none');
			$('.my-tl').css('display', 'block');
		});


		var max_id;
	
		$('#more').on('click', function() {
			$('#loading').show();
			$('#more').hide();
	
			if ($('#tweets > li ').length) {
				max_id = $('#tweets > li:last').attr('id').replace(/^tweet_/, '');
			}
		console.log(max_id);
			$.get('more.php', {
				max_id: max_id
			}, function(rs) {
				$('#loading').hide();
				$('#more').show();
				$(rs).appendTo('#tweets').hide().fadeIn(800);
			});
	
		});
	
	
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
			$.get('more.php', {
				max_id: max_id
			}, function(rs) {
				$('#loading').hide();
				$(rs).appendTo('#tweets').hide().fadeIn(800);
			});
		}


});

</script>


</body>
</html>
