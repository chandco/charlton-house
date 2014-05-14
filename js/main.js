jQuery(document).ready(function($){

    var s,
        charlton = {

            // settings & vars
            settings: {
                theWindow:           $(window),
                modBgSize:           (Modernizr.backgroundsize),
                modHistory:          (Modernizr.history),
                localStore:          (Modernizr.localstorage),
                modRetina:           $('html').hasClass('highresdisplay') == true ? true : false,
                ie8:                 $('html').hasClass('ie8') == true ? true : false,
                mobile:              jQuery.browser.mobile == true ? true : false,
                flyoutMenu:          $('.flyout-menu'),
                flexSlider:          $('.flexslider'),
                fullScreenSlider:    $('.fullscreenslider'),
                newsSlider:          $('.newsslider'),
                csrSlider:           $('.csrslider'),
                singleSlider:        $('.singleslider'),
                footerSlider:        $('.footerslider'),
                logoDesktop:         $('.logo-desktop').find('a'),
                footer:              $('footer'),
                storiesAccordions:   $('.stories-accordions'),
                blogIndexPosts:      $('.blog-index-posts'),
                authorBox:           $('.author-box'),
                scrollSpeed:     1000,
                fadeSpeed:       1200,

                easeType:        'easeInOutExpo'

            },

            // init function
            init:function() {

                s = this.settings;
                this.generic();
                if (s.flyoutMenu.length)           { this.flyoutmenu(); }
                if (s.flexSlider.length)           { this.slideshow(); }

            },

            generic: function() {

                // add open class to mobile nav menu
                $('.navbar-collapse').on('show.bs.collapse', function () {
                    $('.navbar-toggle').addClass('open');
                });
                $('.navbar-collapse').on('hide.bs.collapse', function () {
                    $('.navbar-toggle').removeClass('open');
                });

                // scroll to open element after opening an accordion (mobile only)
                if (s.mobile) {
                    $(".collapse").on("shown.bs.collapse", function () {
                        var selected = $(this).parent();
                        $('html, body').animate({
                            scrollTop: selected.offset().top
                        }, 400);
                    });
                }

                // check scroll position - reset logo
                function checkScrollTopPos() {
                    if (s.theWindow.scrollTop() >= 45) {
                        s.logoDesktop.addClass('up');
                    } else {
                        s.logoDesktop.removeClass('up');
                    }
                }
                checkScrollTopPos();

                s.theWindow.scroll(function() {
                    checkScrollTopPos();
                });

                // Highlight menu on scroll
                if ($('body.home').length) {
                    $('#charlton-navbar-collapse').visualNav({
                        selectedClass     : 'active',
                        contentClass       : 'home-section'
                    });
                }
                

            },

            flyoutmenu:function() {

                var flyout      = s.flyoutMenu;
                var trigger     = s.flyoutMenu.find('.flyout-trigger');

                trigger.click(function(event) {
                    event.preventDefault();
                    flyout.toggleClass('open');
					
					if (flyout.hasClass('open')) {
						var flyoutOverlay = $("<div class='flyout-overlay'></div>");
						flyoutOverlay.insertBefore(s.flyoutMenu);
						flyoutOverlay.fadeIn();
					} else {
						flyoutOverlay.fadeOut( function() {
							flyoutOverlay.remove();
						});
					}
					
					$("div.flyout-overlay").on("click",function() {
						$(this).fadeOut( function() {
							$(this).remove();
							flyout.toggleClass('open');
						});
					});

					
					
                });
				
				
            },

            slideshow: function() {

                // home slideshow
                if (s.fullScreenSlider.length) {

                    $( "<ul class='custom-controls'></ul>" ).insertAfter(s.fullScreenSlider.parent());

                    var numFSSlides = s.fullScreenSlider.find('.slides li').length;
                    if (numFSSlides > 1) {
                        s.fullScreenSlider.find('.slides li').each(function() {
                            var slideNum = ($(this).index() + 1);
                            $(".custom-controls").append( "<li><a href='#'>"+slideNum+"</a></li>" );

                        });
                    }
                    
                    s.fullScreenSlider.flexslider({
                        animation: "fade",
                        controlNav: numFSSlides > 1 ? true: false,
                        directionNav: numFSSlides > 1 ? true: false,
                        //controlsContainer: '.fs-controls',
                        manualControls: '.custom-controls li a',
                        slideshowSpeed: 7000,
                        animationSpeed: s.fadeSpeed
                    });
                }

                // news posts slider
                if (s.newsSlider.length) {

                    s.newsSlider.flexslider({
                        animation: "slide",
                        easing : s.easeType,
                        animationLoop: true,
                        slideshow: false,
                        controlNav: false,
                        itemWidth: 294,
                        maxItems: 3,
                        minItems:1,
                        itemMargin: 0,
                        prevText: "",
                        nextText: "",
                        start: function(){
                            // Vertical align News Slider nav
                            $('.newsslider a').css({'line-height': $('.newsslider').height()  + 'px'});
                        }
                    });

                    // change maxitems on resize
                    s.theWindow.resize(function() {

                        var windowWidth = $(this).width();
                        var newsslider  = s.newsSlider.data('flexslider');
                        var slideWidth  = s.newsSlider.width();

                        // set max items
                        switch( true ){
                            case windowWidth >= 960 :
                                newsslider.vars.maxItems = 3;
                                newsslider.vars.itemWidth = (slideWidth / newsslider.vars.maxItems);
                                break;
                            case (windowWidth >= 768 && windowWidth < 960 ) :
                                newsslider.vars.maxItems = 3;
                                newsslider.vars.itemWidth = (slideWidth / newsslider.vars.maxItems);
                                break;
                            case (windowWidth >= 480 && windowWidth < 768 ) :
                                newsslider.vars.maxItems = 2;
                                newsslider.vars.itemWidth = (slideWidth / newsslider.vars.maxItems);
                                break;
                            case windowWidth < 480 :
                                newsslider.vars.maxItems = 1;
                                newsslider.vars.itemWidth = (slideWidth / newsslider.vars.maxItems);

                                break;
                        }
                        // update slider
                        newsslider.flexAnimate(0);
                        newsslider.update();

                    }).trigger("resize");
                }

                // csr posts slider
                if (s.csrSlider.length) {

                    s.csrSlider.flexslider({
                        animation: "slide",
                        easing : s.easeType,
                        animationLoop: true,
                        slideshow: false,
                        controlNav: false,
                        directionNav: true,
                        itemWidth: 290,
                        itemMargin: 40,
                        maxItems: 3,
                        minItems:1,
                        prevText: "",
                        nextText: ""
                    });

                    // change maxitems on resize
                    s.theWindow.resize(function() {

                        var windowWidth   = $(this).width();
                        var csrslider     = s.csrSlider.data('flexslider');
                        var slideWidth    = (s.csrSlider.width() - 80);

                        // set max items
                        switch( true ){
                            case windowWidth >= 960 :
                                csrslider.vars.maxItems = 3;
                                csrslider.vars.itemWidth = (slideWidth / csrslider.vars.maxItems);
                                break;
                            case (windowWidth >= 480 && windowWidth < 960 ) :
                                csrslider.vars.maxItems = 2;
                                csrslider.vars.itemWidth = (slideWidth / csrslider.vars.maxItems);
                                break;
                            case windowWidth < 480 :
                                csrslider.vars.maxItems = 1;
                                csrslider.vars.itemWidth = (slideWidth / csrslider.vars.maxItems);

                                break;
                        }

                        // update slider
                        csrslider.flexAnimate(0);
                        csrslider.update();

                    }).trigger("resize");

                }

                // single post gallery slider
                if (s.singleSlider.length) {

                    s.singleSlider.flexslider({
                        animation: "fade",
                        controlNav: true,
                        directionNav: true,
                        slideshowSpeed: 7000,
                        animationSpeed: s.fadeSpeed
                    });

                }

                // footer slider
                if (s.footerSlider.length) {

                    // set initial bg color of footer
                    var firstBGcolor  = s.footer.find('.slides li:first-child').data('bgcolor');
                    if (firstBGcolor != "" || firstbgcolor != 'undefined'){
                        s.footer.css({"background-color":""+firstBGcolor+""});
                    };

                    s.footerSlider.flexslider({
                        animation: "fade",
                        controlNav: false,
                        directionNav: false,
                        slideshowSpeed: 7000,
                        animationSpeed: s.fadeSpeed,
                        selector: ".slides > li",
                        before: function() {
                            var $next = s.footerSlider.find('.flex-active-slide').next();
                            // If there wasn't a next one, go back to the first.
                            if( $next.length == 0 ) {
                                $next = s.footerSlider.find('li:first');
                            }
                            var newBGcolor = $next.data('bgcolor');
                            s.footer.animate({backgroundColor: ''+newBGcolor+''}, 600);
                        }
                    });

                }

            },

            globalresize: function() {


                // blog index - set height of summary
                if (s.blogIndexPosts.length) {

                    var summary = s.blogIndexPosts.find('.summary');

                    summary.each(function() {
                       var imgHeight      = $(this).find('.blog-summary-link img').height();
                       var excerptWrapper = $(this).find('.excerpt-wrapper');
                        excerptWrapper.css({"height":imgHeight+"px"});
                    });
                }

                // Vertical align News Slider nav
                $('.newsslider a').css({'line-height': $('.newsslider').height()  + 'px'});

            }


    };  // end charlton

    charlton.init();

    // on resize
    $(window).resize( function(){
        charlton.globalresize();
    }).trigger('resize');

}); // doc ready