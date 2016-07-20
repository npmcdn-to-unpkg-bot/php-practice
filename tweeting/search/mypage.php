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
<p><a href='logout.php'>ログアウト</a></p>
<form action="mypage.php" method="post">
    <input type="radio" name="radio" value="1">自分のツイート
    <input type="radio" name="radio" value="2">自分のTL
    <input type="search" name="tweet" placeholder="キーワード">
    <input type="submit" name="button" value="検索">
</form>

<?php
if(isset($_POST['radio'])){
	$_SESSION['radio'] = $_POST['radio'];
	$_SESSION['tweet'] = $_POST['tweet'];
}
?>

<ul id="tweets" class="tweet-list">
</ul>

<p id="loading" style="display:none;">loading...</p>
<!-- <input type="button" id="more" value="もっと読む"> -->
<script>
/*
$(function() {

	var max_id;

	$('#more').click(function() {
		$('#loading').show();

		if ($('#tweets > li ').length) {
			max_id = $('#tweets > li:last').attr('id').replace(/^tweet_/, '');
		}
	console.log(max_id);
		$.get('myresult.php', {
			max_id: max_id
		}, function(rs) {
			$('#loading').hide();
			$(rs).appendTo('#tweets');
		});

	});
});

*/
$(function() {

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
		$.get('myresult.php', {
			'max_id': max_id
		}, function(rs) {
			$('#loading').hide();
			$(rs).appendTo('#tweets').hide().fadeIn(800);
		});
	}

	more();

});



</script>

<style type="text/css">

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
