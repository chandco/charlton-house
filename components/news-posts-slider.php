<?php
    $category = get_category($cat_ID);
    $catTitle = $category->name;
    $alternateTitle = get_field('alternate_title', 'category_' . $cat_ID);
    if (!empty($alternateTitle))
        $catTitle = $alternateTitle;
?>

<div class="news-posts-slider home-section" id="<?= $category->slug ?>">

    <h3 class="section-title"><?= $catTitle ?></h3>

    <div class="flexslider newsslider">
        <ul class="slides">
            <?php
            $posts = get_posts('posts_per_page=-1&cat=' . $cat_ID);
            foreach($posts as $i => $post) {
                setup_postdata($post);
                $thumbURL = $url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
                ?>
                <li>
                    <a href="<?php the_permalink() ?>">
                        <img src="<?= $thumbURL[0] ?>" alt="" />
                        <div class="overlay">
                            <h3 class="post-title"><?php the_title() ?></h3>
                            <span class="date"><?php echo get_the_date( 'j F Y' ); ?></span>
                        </div>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>

</div><!-- end news-posts-slider -->