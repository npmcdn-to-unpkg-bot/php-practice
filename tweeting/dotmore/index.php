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
<form action="index.php" method="post">
    <input type="radio" name="user" value="1"{$checked["test_c"][1]}>自分のツイート
    <input type="radio" name="user" value="2"{$checked["test_c"][2]}>自分のTL
    
    <input type="text" name='tweet'>
    <input type="submit" value="検索">
</form>



<h1>もっと読む</h1>
<ul id="tweets">
</ul>

<p id="loading" style="display:none;">loading...</p>
<!--<input type="button" id="more" value="もっと読む">-->
<script>

$(function() {
/*
	var max_id;

	$('#more').click(function() {
		$('#loading').show();
		
		if ($('#tweets > li ').length) {
			max_id = $('#tweets > li:last').attr('id').replace(/^tweet_/, '');
		}
	console.log(max_id);
		$.get('more.php', {
			max_id: max_id
		}, function(rs) {
			$('#loading').hide();
			$(rs).appendTo('#tweets');
		});

	});
});
*/
	var max_id;
	
	$(window).scroll(function() {
		if ($(window).scrollTop() + $(window).height() == $(document).height()) {
			more();
		}
	});
	
	function more() {
		$('#loading').show();
		
		if ($('#tweets > li').length) {
			max_id = $('#tweets > li:last').attr('id').replace(/~tweet_/, '');
		}
		
		$.get('more.php', {
			max_id: max_id
		}, function(rs) {
			$('#loading').hide();
			$(rs).appendTo('#tweets').hide().fadeIn(800);
		});
	}
	
	more();
	
});

</script>


</body>
</html>