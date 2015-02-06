<?php
/**
 * The Template for displaying all single posts
 */

get_header(); ?>

	
    <div class="article-wrapper">

        <section class="single-article">

            <div class="container">

                <article class="entry">

                	<?php while ( have_posts() ) : the_post(); ?>

	                    <h1 class="post-title"><?php the_title() ?></h1>
	                    
	                    <?php if (get_post_format() != 'video' ): ?>
		                    <?php	
							$imageArgs = array(
								'post_type' => 'attachment',
								'post_mime_type' => 'image',
								'numberposts' => null,
								'post_status' => null,
								'post_parent' => get_the_ID(),
								'orderby' => 'menu_order'
							);
							$images = get_posts($imageArgs);

							$imagesArr = array();
	                    	if (get_post_thumbnail_id()) {
	                    		$imagesArr[get_post_thumbnail_id()] = get_post(get_post_thumbnail_id());
	                    	}
	                    	foreach($images as $image) { 
	                    		$imagesArr[$image->ID] = $image;
	                    	}

							if ($imagesArr) {
	                    	?>
		                    <div class="single-gallery-slider">
		                        <div class="flexslider singleslider">
		                            <ul class="slides">
		                            	<?php	
		                            	foreach($imagesArr as $image) { 
		                            		$img_src = wp_get_attachment_image_src( $image->ID, 'large');
		                            		?>
			                                <li>
			                                    <span><img src="<?= $img_src[0] ?>" alt="" /></span>
			                                    <?php if ($image->post_excerpt) { ?>
			                                    	<p class="caption"><?= $image->post_excerpt ?></p>
			                                    <?php } ?>
			                                </li>
		                                <?php } ?>
		                            </ul>
		                        </div>
		                    </div>
		                    <?php } ?>

	                	<?php endif; ?>

	                    <?php the_content() ?>

	                </article><!-- end entry -->

	                <div class="author-box">
	                    <div class="row">
	                        <div class="col-sm-4">
	                        	<?php if (get_cupp_meta(get_the_author_meta('ID'), 'thumbnail')) { ?>
		                            <a href="<?= get_author_posts_url(get_the_author_meta('ID')) ?>" class="author-image">
		                              <img src="<?= get_cupp_meta(get_the_author_meta('ID'), 'thumbnail') ?>" alt="" />
		                            </a>
	                            <?php } ?>
	                            <p class="date"><?php echo get_the_date( 'jS F Y' ); ?><br /> Written by</p>
	                            <p class="author"><?php the_author_posts_link(); ?></p>
	                        </div>
	                        <div class="col-sm-4">
	                            <?php yarpp_related(); ?>
	                        </div>
	                        <div class="col-sm-4">
	                        	<h5>See more posts about:</h5>
	                        	<ul class="cat-list">
	                            <?php
	                            function get_cat_info($cat) {
	                            	if (get_field('icon', 'category_' . $cat->term_id)) {
				                        $catImg = get_field('icon', 'category_' . $cat->term_id);
				                        $catImgUrl = $catImg['url'];
				                    } else
				                        $catImgUrl = get_template_directory_uri() . '/img/cat-icon-default.png';

				                    $catTitle = $cat->name;
								    $alternateTitle = get_field('alternate_title', 'category_' . $cat->term_id);
								    if (!empty($alternateTitle))
								        $catTitle = $alternateTitle;

								    return array('title' => $catTitle, 'img' => $catImgUrl, 'url' => get_category_link($cat->term_id));
	                            }

	                            $cats = get_the_category();
	                            $catsArr = array();

	                            foreach($cats as $cat) {
								    // Add the Fresh Ideas category if it hasnt been tagged
								    if ($cat->parent == $content_ids['cat_fresh_ideas'] && !has_category($content_ids['cat_fresh_ideas']) && !in_array($content_ids['cat_fresh_ideas'], $catsArr)) {
								    	$catsArr[$content_ids['cat_fresh_ideas']] = get_cat_info(get_category($content_ids['cat_fresh_ideas']));
								    }

								    $catsArr[$cat->term_id] = get_cat_info($cat);
                            	}

                            	foreach($catsArr as $cat) {
                            		?>
                            		<li>
                            			<a href="<?= $cat['url'] ?>">
                            				<span class="cat-li-img" style="background-image:url(<?= $cat['img'] ?>);"></span> <?= $cat['title'] ?>
                            			</a>
                            		</li>
                            		<?php
                            	}
	                            ?>
	                        	</ul>
	                        </div>
	                    </div>
	                </div><!-- end author-box -->

            	<?php endwhile; ?>

            </div><!-- end container -->

        </section><!-- single-article -->

    </div>

<?php
get_footer();
