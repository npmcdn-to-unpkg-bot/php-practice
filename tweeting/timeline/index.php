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
<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
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

    <div class="title page-haeder text-center center-block">
        <h1>部屋</h1>
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
		$_SESSION['message'] = $_POST['message'];
	}
?>
    <ul class="nav nav-tabs">
        <li class="nav-item active"><a href="#home" data-toggle="tab">HOME</a></li>
        <li class="nav-item"><a href="#mytweets" data-toggle="tab">MyTweets</a></li>
        <li class="nav-item"><a href="#mentions" data-toggle="tab">Mention</a></li>
        <li class="nav-item"><a href="#about" data-toggle="tab">About</a></li>
    </ul>

    <div class="reload">
        <a href="."><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> リロード</a>
    </div>
    
    <div class="tab-content">
    	<div id="home" class="tab-pane active">
        	<ul id="tweets" class="timeline media-list">
        	</ul>
        </div>
        <div id="mytweets" class="tab-pane hidden">
        	<ul id="tweets" class="timeline media-list">
        	</ul>
        </div>
        <div id="mentions" class="tab-pane hidden">
        	<ul id="tweets" class="timeline media-list">
        	</ul>
        </div>
        <div id="about" class="tab-pane hidden">
        	<ul id="tweets" class="timeline media-list">
        	</ul>
        </div>
	</div>
    <div class="more">
        <p id="loading" class="center-block text-center" style="display:none;">loading...</p>
        <button type="button" id="more" class="btn btn-default center-block text-center" aria-label="Left Align"><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span> Read Tweet</button>
	</div>

<?php endif; ?>

<script type="text/javascript">

$(function() {

	var max_id;

//--------------------------------------------------------
	var timeline = '';
	var moreBtn = '';
	var index = 0;
	
	$('li.nav-item').on('click', function() {
		$index = $('li.nav-item').index(this);
		$.post("more.php", $('li.nav-item').index(this));
		
		switch($index) {
			case(0):
				timeline = 'home';
				moreBtn = 'more';
			break;
			case(1):
				timeline = 'mytweets';
				moreBtn = 'mymore';
			break;
			case(2):
				timeline = 'mensions';
				moreBtn = 'menmore';
			break;
			case(3):
				timeline = 'about';
				moreBtn = 'aboutmore';
			break;
			default:
				timeline = 'home';
				moreBtn = 'more';
			break;
		}
		$(".more button").attr('id', moreBtn);
		$(".tab-content div").removeClass('active').addClass('hidden');
		$(".tab-content div").eq($index).removeClass('hidden').addClass('active');
		
		$.ajax({
			type:"POST",
			url:"more.php",
			data:{"index":$index}
		});
	});

	
//--------------------------------------------------------
	var busy = 0;

	$(".more button").on('click', function() {
		more();
	});

	$(window).scroll(function() {
		if ($(window).scrollTop() + $(window).height() == $(document).height()) {
			if (busy == 1) return false;
			
			more();
			
			busy = 1;
			setTimeout(function() { busy = 0; }, 500);
		}
	});
//--------------------------------------------------------

	function more() {

		$('#loading').show();
		$('.more button').hide();

		if ($('#tweets > li').length) {
			newmax_id = $('#tweets > li:last').attr('id').replace(/^tweet_/, '');
			if(newmax_id !== max_id) {
				max_id = newmax_id;
			}
		}

	console.log(max_id);
		$.get('more.php', {
			max_id: max_id
		}, function(rs) {
			$('#loading').hide();
			$('.more button').show();
			$(rs).appendTo('#tweets').hide().fadeIn(800);
		});
	}

});

</script>

<style type="text/css">

body {position: relative;}


.header {
	width: 100%;
	height: 150px;
	padding: 25px;
	box-sizing: border-box;
}

.header p {float: left;}

.title {
	width: 250px;
}
.title h1 {margin: 0;}
.reload {
	position: fixed;
	top: 110px;
	right: 25px;
}

.timeline {
	padding: 20px;
}

.timeline > li {
	margin-top: 20px;
	box-sizing: border-box;
	border-radius: 10px;
}
.timeline > li:first {margin-top: 0;}
.timeline p {color:#333;}

.mask {padding: 10px;}

.more {
	width: 100%;
}

</style>

</body>
</html>
