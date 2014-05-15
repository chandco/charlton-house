<div class="stories-accordions clearfix">

    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <?php
                $posts = get_posts('posts_per_page=3');
                foreach($posts as $i => $post) {
                    setup_postdata($post);

                    // Get direct category
                    $cats = get_the_category();
                    foreach($cats as $cat) {
                        if ($cat->term_id != $content_ids['cat_fresh_ideas'])
                            $subCatID = $cat->term_id;
                    }

                    if (get_field('icon', 'category_' . $subCatID)) {
                        $catImg = get_field('icon', 'category_' . $subCatID);
                        $catImgUrl = $catImg['url'];
                    } else
                        $catImgUrl = get_template_directory_uri() . '/img/cat-icon-default.png';                  
                    ?>
                    <div class="col-sm-4">
                        <div class="story-holder">
                            <a class="story-cta <?= $i % 2 ? 'grey-block' : 'red-block' ?>" href="<?= get_permalink( $post->ID ) ?>">
                                <div class="story-header clearfix">
                                    <span class="icon"><img src="<?= $catImgUrl ?>" alt="" /></span>
                                    <h3><?php the_title() ?></h3>
                                    <span class="fa fa-play-circle fa-2x"></span>
                                </div>
                                <div class="story-content">
                                    <?php the_excerpt() ?>
                                </div>
                                <div class="story-bottom">
                                    <p class="link-title"><?php 
									
									$ctaTitle = get_field('cta_title');
									if ($ctaTitle)
									{
										echo $ctaTitle;
									} else {
										// no CTA title so let's get a category
										$categories = wp_get_post_categories(get_the_ID());
										$count = 0;
										foreach($categories as $c) {
											if ($count < 2) {
											$cat = get_category( $c );
											echo $cat->name;
											$count++;
											
												if ($count <= 1)
												{
													echo ", ";
												}
											
											}
										}
									}
									
									
									
									
									
									?> <span class="fa fa-play-circle fa-2x"></span></p>
                                </div>
                            </a>
                        </div>
                    </div>                    
                    <?php
                }
                ?>
            </div>
        </div>

    </div>

</div><!-- end stories-accordions -->