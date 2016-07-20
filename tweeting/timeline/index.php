<?php
session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>twitterを見てみる</title>
<link rel="stylesheet" href="reset.css">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css" />
<script src="./jquery-1.10.1.min.js"></script>
</head>

<body>

<?php
if(!isset($_SESSION['access_token'])):
	echo "<a href='login.php'>Twitterでログイン</a>";
?>
<?php else:
	echo '<div class="header clearfix">';
	echo "<p><a href='logout.php'><span class='glyphicon glyphicon-eject' aria-hidden='true'></span> ログアウト</a></p>";
?>

    <div class="title page-haeder">
        <h1>つい廃の部屋</h1>
    </div>
    
    <form action="." method="post">
        <div class="input-group">
            <input type="text" class="form-control" name="message" placeholder="つぶやく？">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-default">ツイート</button>
            </span>
        </div>
    </form>
<?php 
	if(isset($_POST['message'])){
		$_SESSION['message'] = $_POST['mesaage'];
	}
?>
    
    <div class="reload">
        <a href="."><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> リロード</a>
    </div>
    
</div>

<ul id="tweets" class="home-tl media-list">
</ul>

<div class="more">
	<p id="loading" style="display:none;">loading...</p>
	<button type="button" id="more" class="btn btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span> Read Tweet</button>
</div>

<?php endif; ?>

<script>

$(function() {

		var max_id;
	
		$('#more').on('click', function() {
			
			more();
			
		});

		$(window).scroll(function() {
			if ($(window).scrollTop() + $(window).height() == $(document).height()) {
				more();
			}
		});
	
		function more() {
			$("#loading").show();
			$('#more').hide();
	
			if ($('#tweets > li').length) {
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
		}
	more();

});

</script>

<style type="text/css">

body {position: relative;}

.clearfix {
	content:"";
	display: block;
	clear: both;
}

.header {
	width: 100%;
	height: 150px;
	padding: 25px;
	box-sizing: border-box;
}

.header p {float: left;}

.title {
	display: block;
	width: 250px;
	margin: 0 auto;
	text-align: center;
}
.title h1 {margin: 0;}
.reload {
	position: fixed;
	bottom: 50px;
	right: 5px;
}

.home-tl {
	padding: 20px;
}

.home-tl > li {
	margin-top: 30px;
	box-sizing: border-box;
	border-radius: 10px;
}
.home-tl > li:first {margin-top: 0;}
.home-tl p {color:#333;}

.mask {padding: 10px;}

.more {
	width: 100%;
}
.more p,
.more button {
	display: block;
	margin: 0 auto;
	text-align: center;
}
</style>

</body>
</html>
