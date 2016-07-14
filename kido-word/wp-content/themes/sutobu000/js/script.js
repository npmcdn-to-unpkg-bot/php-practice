(function($){
/*トップナビアニメーション*/
	var $topNav = $('.topnav');
	var $globalNav = $('.gnav')
	var navList = $topNav.find('li');
	
	navList.hover(function() {
	  $(this).find($globalNav).css({
		transform: 'scaleY(1)',
		'border-top': 'solid 5px #fff'
	  });
	}, function() {
	  $(this).find($globalNav).css({
		transform: 'scaleY(0)',
		'border-top': 'solid 0px #fff'
	  });
	});
	
	/*メインhoverアニメーション*/
	var $worksMain = $('.worksMain');
	var $worksBox = $('.worksBox');
	var mainList = $worksMain.find('li');
	
	mainList.hover(function() {
	  $(this).find($worksBox).css({
		transform: 'scaleX(0)',
		color: '#bbb'
	  });
	}, function() {
	  $(this).find($worksBox).css({
		transform: 'scaleX(1)',
		color: '#fff'
	  });
	});

})(jquery);