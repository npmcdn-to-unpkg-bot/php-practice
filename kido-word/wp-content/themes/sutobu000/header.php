<!DOCTYPE html>
<html<?php language_attributes(); ?>>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="sutobu000">
<meta name="keywords" content="KidoYuta,キドユウタ,sutobu000,BeBeans,BeNuts">
<title><?php bloginfo('title'); ?></title>
<link href='https://fonts.googleapis.com/css?family=Quicksand:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/earlyaccess/notosansjapanese.css' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/reset.css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/Dotmame.png">
<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
<?php wp_head(); ?>

</head>

<body>
 <div class="header">
    <ul class="topnav">
      <li>
        <a class="gnav top00" href="<?php echo esc_url( home_url() ); ?>">home</a>
      </li>
      <li>
        <a class="gnav top01" href="<?php echo esc_url( home_url() ); ?>/profile">profile</a>
      </li>
      <li>
        <a class="gnav top02" href="<?php echo esc_url( home_url() ); ?>/work">works</a>
      </li>
      <li>
        <a class="gnav top03" href="<?php echo esc_url( home_url() ); ?>/diary">diary</a>
      </li>
      <li>
        <a class="gnav top04" href="<?php echo esc_url( home_url() ); ?>/contact">contact</a>
      </li>
      <li>
        <a class="gnav top05" href="http://kyworks.tumblr.com/">blog</a>
      </li>
    </ul>
  </div>
