<?php 

/**
 * Template Name: Authors-Page
 * Description: Display specific author types, and show an individual page if it's in the slug.
 */
	
get_header(); 


// get user data first so we can take over the fullscreen-slider
$user = get_query_var('person');
$userdata = get_user_by('slug', $user); 
$uid = $userdata->ID;

if ($user) $single_user_slider = $uid; else $single_user_slider = $false;

?>
	

	
	<?php include("components/fullscreen-slider.php"); ?>


<?php

if ($user): // we have a user in the URI, so let's get their information.  Otherwise (below) we show the grid of authors
?>
    <div class="author-index">
        <div class="container">
            <div class="author-index-summary">
           		<?= '<h1>' . $userdata->first_name . ' ' . $userdata->last_name . '</h1>'; ?>

                <?php 
                if ( get_the_author_meta( 'description', $uid ) ) {
                	echo get_the_author_meta( 'description', $uid );
                } 
                ?>
            </div>

            <section class="author-index-posts">
            	<?php // get author's posts
            	
            	$the_query = new WP_Query( 'author=' . $uid );

            	if ( $the_query->have_posts() ) : ?>
            	<h3><?= add_possession(get_the_author_meta( 'first_name', $uid )) ?> Posts</h3>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post();
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

						
            
			            $current_page = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
			            $num_pages = $wp_query->max_num_pages;
			            ?>
			            <ul class="paginate">
			                <li><?= get_previous_posts_link('Previous') ?></li>
			                <li class="page-num"><span>Page <?= $current_page ?> of <?= $num_pages ?></span></li>
			                <li><?= get_next_posts_link('Next') ?></li>
			            </ul>

						<?php

					else :
						// If no content, we'll just do nothing!
						

					endif;
				?> 

            </section><!-- end blog-index-posts -->

<a href='/our-people/' class='more-people'>See more of Our People</a>            

        </div>

    </div><!-- end blog-index -->
<?php else: // show the grid of authors based on certain users groups ?>


	<div class="author-index">
        <div class="container">
            <div class="author-index-summary">
            	<?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
            	<?php
            	//global $wp_roles;
            	
            	foreach ($wp_roles->roles as $role => $role_data) {
            		
            		if (substr($role,0,3) == "ch_"): ?>
            		<section class='people-group'>
            		<h2><?= $role_data["name"]; ?></h2>
					
					<ul class='author-grid'>
            		<?php
            		// get the users in this group
$args = array (
'role' => $role
);

$users = get_users( $args );
foreach ($users as $user):

$user_info = get_userdata($user->ID); 

if (get_cupp_meta($user->ID, 'thumbnail')) $url = get_cupp_meta($user->ID, 'thumbnail'); else $url = false;
        

?>

<li>
	<a href='<?php echo get_author_posts_url($user->ID); ?>'>
		<div class='author-image'>
			<?php if ($url) { ?><img src="<?= $url; ?>" alt='<?= $user->display_name; ?>' /><?php } ?>
			<div class="overlay"><span class="read-more">Read More</span></div>
		</div>
		<h3><?= $user->display_name; ?></h3>
		<?php echo get_the_author_meta( 'job-title', $user->ID ); ?>
	</a>

</li>



<?php
endforeach;

				?>	</ul>
					</section>

            		<?php endif; // not a Ch_ role i..e not to be used
            	}
?>





            </div>
        </div>
    </div>


<?php endif; //if ($user): ?>

<?php
get_footer();
