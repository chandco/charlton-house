<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 */

get_header(); ?>

<?php include("components/fullscreen-slider.php"); ?>

<div class="blog-index">
        <div class="container">
        	<?php
        		// Start the Loop.
				while ( have_posts() ) : the_post();
					?>
		            <section class="blog-index-posts">
					<?php the_content(); ?>
					</section><!-- end blog-index-posts -->
					<?php
				endwhile;
        	?>
        </div>
    </div><!-- end blog-index -->
<?php
get_footer();
