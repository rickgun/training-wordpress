<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php wp_title(''); ?></title>

    <?php wp_head(); ?>
  </head>

  <body>

	<header id="masthead" class="site-header" role="banner">

		<?php wp_nav_menu( array( 'theme_location' => 'my-custom-menu' ) ); ?>

	</header><!-- #masthead -->
	<nav class="navbar navbar-light bg-light static-top">
	  <div class="container">
	    <a class="navbar-brand" href="#"><?php bloginfo('name'); ?></a>
	  </div>
	</nav>