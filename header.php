<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */

// Set content IDs to be used throughout Theme
$default_content_ids = array(
                        'cat_fresh_ideas' => 3,
                        'cat_news' => 1,
                        'cat_csr' => 7,
                        'page_about_us' => 2);
global $content_ids;
$content_ids = apply_filters('set_content_ids', $default_content_ids);

?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="utf-8">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png" />

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/normalize.css" />

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css" />

    <!--[if lt IE 9]>
    <script src="js/vendor/respond.min.js"></script>
    <![endif]-->

    <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.6.2.min.js"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!--[if lt IE 8]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<header id="top-section">
    <nav class="navbar navbar-default" role="navigation">

        <div class="container">

            <div class="navbar-header clearfix">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#charlton-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand ir" href="./">Charlton House</a>
            </div>

            <div class="collapse navbar-collapse" id="charlton-navbar-collapse">
                <ul class="nav navbar-nav nav-justified">
                    <li class="logo-desktop"><a href="<?= is_front_page() ? '#' : home_url( '/' ) ?>" class="ir">Charlton House</a></li>      
                    <?php
                    $args = array(
			        'order'                  => 'ASC',
			        'orderby'                => 'menu_order',
			        'post_type'              => 'nav_menu_item',
			        'post_status'            => 'publish',
			        'output'                 => ARRAY_A,
			        'output_key'             => 'menu_order',
			        'nopaging'               => true,
			        'update_post_term_cache' => false );
                    $items = wp_get_nav_menu_items( 'main-menu', $args );

                    foreach($items as $item) {                        
                        $link = $item->url;

                        if (!is_front_page())
                            $link = home_url( '/' ) . $link;

                    	echo '<li class="menu-link ' . ( (is_front_page() && $item->title == 'Home') ? 'active' : '') . '">
                                <a href="' . $link . '" class="visualNav">' . $item->title . '</a>
                            </li>'."\n";
                    }
                    ?>
                </ul>
            </div><!-- /.navbar-collapse -->

        </div><!-- end container -->
    </nav>
</header>

<?php get_template_part('components/flyout-menu'); ?>

<div id="main" role="main">