<?php
    $category = get_term($cat_ID, 'homepage-section');
    $catTitle = $category->name;
   $alternateTitle = get_field('alternate_title', 'homepage-section_' . $cat_ID);
   if (!empty($alternateTitle))
    $catTitle = $alternateTitle;
?>

<div class="csr-posts-slider home-section" id="<?= $category->slug ?>">

    <h3 class="section-title"><?= $catTitle ?></h3>
    
    <div class="flexslider csrslider">
        <ul class="slides">
            <?php
$args = array(
				'posts_per_page' => 6,
				'tax_query' => array(
								'relation' => 'and',
								array (
									'taxonomy' => 'homepage-section',
									'field' => 'id',
									'terms' => array($cat_ID)
									)
									)
								
				);
                $posts = get_posts($args);
				
				
				            foreach($posts as $i => $post) {
                setup_postdata($post);
                $thumbURL = $url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
                ?>
                <li>
                    <a href="<?php the_permalink() ?>" class="crs-image-link">
                        <img src="<?= $thumbURL[0] ?>" alt="" />
                        <div class="overlay"><span class="read-more">Read More</span></div>
                    </a>
                    <a class="post-title" href="<?php the_permalink() ?>"><?php the_title() ?></a>
                    <p class="post-excerpt"><?php the_excerpt() ?></p>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>

</div>