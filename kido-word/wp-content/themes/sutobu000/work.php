<?php
/*
Template Name: work
*/
?>

<?php get_header(); ?>
<div class="wrapper">
  <div class="worksSub">
    <h1>Works</h1>
    <p>click to the link</p>
  </div>
  <ul class="worksMain">
  </ul>
</div>
<?php get_footer(); ?>


<script type="text/javascript">
jQuery(document).ready(function($){
	/*ajaxのworksのやーつ*/
	$.ajax({
		url:"<?php echo esc_url( get_template_directory_uri() ); ?>/js/works.json"
		}).done(function(works) {
			var htmlStr = "";
			var worksArr = works.worksArray;
			for(var i = 0; i < worksArr.length; i++) {
				htmlStr += '<li style="background-image: url(<?php echo esc_url( get_template_directory_uri() ); ?>/img/'+worksArr[i].img+');"><a href="' +worksArr[i].url+ '" class="worksBoxlink"><div class="worksBox"><h1>' +worksArr[i].title+ '</h1></div></a></li>';
			}
			$(".worksMain").html(htmlStr);
		});
});
</script>