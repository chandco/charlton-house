<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 */
?>

</div><!-- end main -->

<?php if (!is_single()) { ?>

<div class="<?= is_front_page() ? 'home-section' : '' ?>" id="contact">
	
    <?php if (is_front_page()) { ?>
    <h3 class="section-title">CONTACT</h3>
    <?php } ?>

	<footer>
        <div class="flexslider footerslider">
            <ul class="slides">
                <li style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/caroline-footerslide.jpg);" data-bgcolor="#8E939B">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="address">
                                    <h1>HEAD OFFICE</h1>
                                    <p>Bryants Farm, Kiln Road,<br />Dunsden, Reading,<br />Berkshire RG4 9PB</p>
                                    <p>T <a href="tel:+441189466300" class="tel">01189 466 300</a><br />
                                       F 01189 466 301
                                    </p>
                                    <h2>
                                        MEDIA ENQUIRIES
                                    </h2>
                                    <p>Epicurus 0207 420 4480</p>

                                    <h2>
                                        SALES
                                    </h2>
                                    <p><a href="mailto:sales@charltonhouse.co.uk">sales@charltonhouse.co.uk</a></p>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="contacts">
                                    <h1>EXECUTIVE TEAM</h1>
                                    <ul class="contacts-list">
                                        <li>
                                            <a href="mailto:caroline.fry@charltonhouse.co.uk" class="active">
                                                <span class="name">CAROLINE FRY</span><br />
                                                <span class="email">EMAIL CAROLINE</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="mailto:paul.honey@charltonhouse.co.uk">
                                                <span class="name">PAUL HONEY</span><br />
                                                <span class="email">EMAIL PAUL</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="mailto:diane.rollinson@charltonhouse.co.uk">
                                                <span class="name">DIANE ROLLINSON</span><br />
                                                <span class="email">EMAIL DIANE</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <p><img src="<?php echo get_template_directory_uri(); ?>/img/caroline-signature.png" alt="" class="signature" /><br />
                                        <span class="company-role">Chief Executive</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                            </div>
                        </div>
                    </div><!-- end container -->
                </li>
                <li style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/paul-footerslide.jpg);" data-bgcolor="#BD910C">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="address">
                                    <h1>HEAD OFFICE</h1>
                                    <p>Bryants Farm, Kiln Road,<br />Dunsden, Reading,<br />Berkshire RG4 9PB</p>
                                    <p>T <a href="tel:+441189466300" class="tel">01189 466 300</a><br />
                                        F 01189 466 301
                                    </p>
                                    <h2>
                                        MEDIA ENQUIRIES
                                    </h2>
                                    <p>Epicurus 0207 420 4480</p>

                                    <h2>
                                        SALES
                                    </h2>
                                    <p><a href="mailto:sales@charltonhouse.co.uk">sales@charltonhouse.co.uk</a></p>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="contacts">
                                    <h1>EXECUTIVE TEAM</h1>
                                    <ul class="contacts-list">
                                        <li>
                                            <a href="mailto:carline@charltonhouse.co.uk">
                                                <span class="name">CAROLINE FRY</span><br />
                                                <span class="email">EMAIL CAROLINE</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="mailto:paul@charltonhouse.co.uk" class="active">
                                                <span class="name">PAUL HONEY</span><br />
                                                <span class="email">EMAIL PAUL</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="mailto:diane@charltonhouse.co.uk">
                                                <span class="name">DIANE ROLLINSON</span><br />
                                                <span class="email">EMAIL DIANE</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <p><img src="<?php echo get_template_directory_uri(); ?>/img/paul-signature.png" alt="" class="signature" /><br />
                                        <span class="company-role">Managing Director</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                            </div>
                        </div>
                    </div><!-- end container -->
                </li>
                <li style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/diane-footerslide.jpg);" data-bgcolor="#1B1004">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="address">
                                    <h1>HEAD OFFICE</h1>
                                    <p>Bryants Farm, Kiln Road,<br />Dunsden, Reading,<br />Berkshire RG4 9PB</p>
                                    <p>T <a href="tel:+441189466300" class="tel">01189 466 300</a><br />
                                        F 01189 466 301
                                    </p>
                                    <h2>
                                        MEDIA ENQUIRIES
                                    </h2>
                                    <p>Epicurus 0207 420 4480</p>

                                    <h2>
                                        SALES
                                    </h2>
                                    <p><a href="mailto:sales@charltonhouse.co.uk">sales@charltonhouse.co.uk</a></p>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="contacts">
                                    <h1>EXECUTIVE TEAM</h1>
                                    <ul class="contacts-list">
                                        <li>
                                            <a href="mailto:carline@charltonhouse.co.uk">
                                                <span class="name">CAROLINE FRY</span><br />
                                                <span class="email">EMAIL CAROLINE</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="mailto:paul@charltonhouse.co.uk">
                                                <span class="name">PAUL HONEY</span><br />
                                                <span class="email">EMAIL PAUL</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="mailto:diane@charltonhouse.co.uk" class="active">
                                                <span class="name">DIANE ROLLINSON</span><br />
                                                <span class="email">EMAIL DIANE</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <p><img src="<?php echo get_template_directory_uri(); ?>/img/diane-signature.png" alt="" class="signature" /><br />
                                        <span class="company-role">Sales Director</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                            </div>
                        </div>
                    </div><!-- end container -->
                </li>
            </ul>
        </div>

    </footer>

</div> <!-- .home-section -->

<?php } // END is not single article ?>

<?php wp_footer(); ?>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    ( (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-377113-2', 'auto');
  ga('send', 'pageview');
</script>
</body>
</html>