<?php
/**
 * Home Page Template
 *
 */

get_header(); ?>

<div class="home-section" id="home">
    <?php include('components/fullscreen-slider.php'); ?>
</div>

<?php include("components/stories-accordions.php"); ?>

<?php include("components/custom-post-accordions.php"); ?>

<div class="news-csr-wrapper">

    <div class="container">
        <?php
        $cat_ID = $content_ids['cat_fresh_ideas'];
		include("components/csr-posts-slider.php");

		$cat_ID = $content_ids['cat_news'];
        include("components/news-posts-slider.php");

       	$cat_ID = $content_ids['cat_csr'];
        include("components/csr-posts-slider.php");
        ?>
    </div>

</div>

<?php
get_footer();
