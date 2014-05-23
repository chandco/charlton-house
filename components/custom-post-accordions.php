<div class="home-section" id="about-us">

    <h3 class="section-title"><?= get_the_title( $content_ids['page_about_us'] ) ?></h3>

    <div class="custom-post-accordions">

        <div class="container">

            <div class="panel-group" id="accordion">   
                <?php
                $pages = get_pages('sort_column=menu_order&parent=' . $content_ids['page_about_us']);
                foreach($pages as $i => $post) {
                    setup_postdata($post);
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= get_the_ID() ?>" class="<?= $i > 0 ? 'collapsed' : '' ?>">
                                    <?php the_title() ?>
                                    <span class="fa fa-chevron-right fa-2x"></span>
                                    <span class="fa fa-chevron-down fa-2x"></span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse<?= get_the_ID() ?>" class="panel-collapse collapse <?= $i == 0 ? 'in' : '' ?>">
                            <div class="panel-body">
                                <?php the_content() ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>

        </div>

    </div><!-- end custom-post-accordions -->

</div>