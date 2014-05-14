<?php
/**
 * The template for displaying Category pages
 */

get_header(); 

$currentCat = get_category($cat);
?>

	<?php include("components/fullscreen-slider.php"); ?>


    <div class="blog-index">

        <div class="container">

            <div class="blog-index-summary">
                <?php if ($currentCat->parent !== 0) { ?>
                	<h1>
                		<?php
                		if (get_field('icon', 'category_' . $cat)) {
	                        $catImg = get_field('icon', 'category_' . $cat);
	                        $catImgUrl = $catImg['url'];
	                    } else
	                        $catImgUrl = get_template_directory_uri() . '/img/cat-icon-default.png';

                		if (!empty($catImgUrl)) {
                		?>
                			<span><img src="<?= $catImgUrl ?>" alt="" /></span>
                		<?php } ?>
                		<?= single_cat_title( '', false ) ?></h1>
                <?php } ?>
                <?= category_description(); ?>
            </div>

            <section class="blog-index-posts">


            	<?php if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							$thumbURL = $url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
							?>
							<article class="summary">
			                    <div class="row">
			                        <div class="col-sm-6">

			                            <a class="blog-summary-link" href="<?php the_permalink() ?>">
			                                <img src="<?= $thumbURL[0] ?>" alt="" />
			                                <div class="overlay"><span class="read-more">Read More</span></div>
			                            </a>

			                        </div>
			                        <div class="col-sm-6">

			                            <div class="excerpt-wrapper">
			                                <div class="excerpt-cell">
			                                    <div class="blog-summary-excerpt">
			                                        <h2 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
			                                        <span class="date"><?php echo get_the_date( 'j F Y' ); ?></span>
			                                        <?php the_excerpt() ?>
			                                    </div>
			                                </div>
			                            </div>

			                        </div>
			                    </div>
			                </article><!-- end summary -->
							<?php

						endwhile;

					else :
						// If no content, include the "No posts found" template.
						get_template_part( 'content', 'none' );

					endif;
				?> 

            </section><!-- end blog-index-posts -->

            <?php 
            global $wp_query;
            $current_page = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
            $num_pages = $wp_query->max_num_pages;
            ?>
            <ul class="paginate">
                <li><?= get_previous_posts_link('Previous') ?></li>
                <li class="page-num"><span>Page <?= $current_page ?> of <?= $num_pages ?></span></li>
                <li><?= get_next_posts_link('Next') ?></li>
            </ul>

        </div>

    </div><!-- end blog-index -->

<?php
get_footer();
