<!DOCTYPE html>
<html <? language_attributes(); ?>>
<head>
<meta charset="<? bloginfo( 'charset' ); ?>">

  <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/stylesheets/css/screen.css" type="text/css" media="screen">

  <link href="<?php bloginfo( 'stylesheet_directory' ); ?>/favicon.ico" rel="shortcut icon" type="image/x-icon">

  <script src="http://code.jquery.com/jquery-1.6.4.min.js" type="text/javascript"></script>
  <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/javascripts/theroost.js" type="text/javascript"></script>
  
  <title><? is_front_page() ? bloginfo('description') : wp_title(''); ?> – <? bloginfo('name'); ?></title>
  
  <meta name="description" content="">  
  <link rel="pingback" href="<? bloginfo( 'pingback_url' ); ?>">
  
  <script type="text/javascript" src="http://use.typekit.com/amo0egj.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
  
	<? wp_head(); ?>
</head>                                                                                              
<body <? body_class(); ?>>    
  <header class="main">
    <div id="player">player</div>
    <h1 id="logo"><a href="<?= home_url( '/' ); ?>"><? bloginfo( 'name' ); ?></a></h1>
    <nav>    
      <? wp_nav_menu( array( 'container' => false, 'theme_location' => 'header-menu' ) ); ?>
    </nav>
    <div class="social">
      follow us on <a href="#/">Facebook</a> <span class="ampersand">&amp;</span> <a href="#/">Twitter</a>
    </div>    
  </header>    
  <section class="main">
  <!-- end header.php -->