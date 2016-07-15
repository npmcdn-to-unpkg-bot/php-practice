<?php
/*
Template Name: top
*/
?>

<?php get_header(); ?>

  <div class="wrapper">
    <div class="title">
      <h1 class="titlename">
        <a class="titlelink" href="<?php echo esc_url( get_template_directory_uri() ); ?>">Kido Yuta</a>
      </h1>
      <p class="caption">MovieCreater / Engineer / <br>Designer / Evangelist...?</p>
        <img class="logo" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/Backmame.jpg" width=80% height=auto alt="Be beans, Be nuts.">
    </div>

    <div class="topmain">
      <div class="inner">
        <p class="item01"><img class="itemimg" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/dotmame.png" width=30% height=auto alt="pic"></p>
        <p class="item02"><img class="itemimg" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/dotmame3.png" width=30% height=auto alt="pic"></p>
        <p class="item03"><img class="itemimg" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/tto.png" width=60% height=auto alt="pic"></p>
        <p class="item04"><img class="itemimg" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/dotmame2.png" width=30% height=auto alt="pic"></p>
        <p class="item05"><img class="itemimg" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/dotmame.png" width=30% height=auto alt="pic"></p>
      </div>
    </div>
  </div>

<?php get_footer(); ?>