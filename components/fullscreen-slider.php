<?php

$sliderImages = array();

if (is_front_page()) {
    $args = "media_tags=homepage-carousel&orderby=menu_order";
    $attachments = get_attachments_by_media_tags($args);

    foreach($attachments as $attachment) {
        $sliderImages[] = array('url' => $attachment->guid, 'text' => '<h2>' . $attachment->post_excerpt . '</h2>');
    }

} else if ($single_user_slider) {
     if (get_cupp_meta($single_user_slider, 'original')) {
        $url = get_cupp_meta($single_user_slider, 'original');
        $sliderImages[] = array('url' => $url, 'text' => '<h2>Our People<br />' . $userdata->first_name . ' ' . $userdata->last_name . '</h2>');
    } else {
        // we're in a page, so get the page feat image
        $url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'original' );
        $sliderImages[] = array('url' => $url[0], 'text' => '<h1 class="category-slide-title">' . get_the_title() . '</h1>');
    }


} else if (is_category()) {    
    $catID = $cat;
    $catInfo = $currentCat;
    if (category_has_parent($cat)) {
        $catID = $catInfo->parent;
        $catInfo = get_category($catID);
    }
    $img = get_field('large_image', 'category_' . $catID);
    if (get_field('large_image', 'category_' . $catID)) {
        $catImg = get_field('large_image', 'category_' . $catID);
        $catImgUrl = $catImg['url'];
        $sliderImages[] = array('url' => $catImgUrl, 'text' => '<h1 class="category-slide-title">' . $catInfo->name . '</h1>');
    }
} else if (is_author()){
    if (get_cupp_meta(get_the_author_meta('ID'), 'original')) {
        $url = get_cupp_meta(get_the_author_meta('ID'), 'original');
        $sliderImages[] = array('url' => $url, 'text' => '');
    }
} else if (is_page()) {
    $url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'original' );
    $sliderImages[] = array('url' => $url[0], 'text' => '<h1 class="category-slide-title">' . get_the_title() . '</h1>');
}

if ($sliderImages) { 
?>
    <div class="slider">
        <div class="flexslider fullscreenslider content">  
            <ul class="slides"> 
                <?php    
                foreach($sliderImages as $image) {
                    ?>
                    <li style="background-image: url(<?= $image['url'] ?>);">
                        <div class="container">
                            <div class="slides-content">
                                <?= $image['text'] ?>
                            </div>
                        </div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div><!-- end slider -->
<?php } ?>