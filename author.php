<?php
/**
 * The template for displaying Author archive pages
 */

get_header(); ?>
	

	
	<?php include("components/fullscreen-slider.php"); ?>


    <div class="author-index">

        <div class="container">

            <div class="author-index-summary">
                <h1><?= get_the_author() ?></h1>

                <?php 
                if ( get_the_author_meta( 'description' ) ) {
                	echo get_the_author_meta( 'description' );
                } 
                ?>
            </div>

            <section class="author-index-posts">
            	<h3><?= add_possession(get_the_author_meta( 'first_name' )) ?> Posts</h3>

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
