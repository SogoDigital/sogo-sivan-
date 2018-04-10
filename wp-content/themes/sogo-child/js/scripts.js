(function ($) {
    var mobile = $('body').hasClass('mobile');
    var fix_floor = function fix_floor() {
        console.log($(window).width());
        if ($(window).width() < 992) {
            if ($('.split-floor-2').length === 0) {
                var f = $('.split-floor');
                if (f.length === 0) {
                    return false;
                }
                var n = f.clone();

                n.attr('id', 'home-floor-6-2');
                n.addClass('split-floor-2');
                n.find('#man').remove();
                n.find('.col-md-6:first-child').remove();
                n.insertAfter(f);
                f.find('#woman').remove();
                f.find('.col-md-6:last-child').remove();
            }

        }

    };
    var moving_bg = function moving(obj) {
        obj.mousemove(function (e) {
            var amountMovedX = (e.pageX * -1 / 40);
            var amountMovedY = (e.pageY * -1 / 40);
            //       $(this).css('transform', "translate3d("+amountMovedX+"px, "+amountMovedY+"px, 0px)");
            $(this).find('.moving-bg').css('transform', "translate3d(" + amountMovedX + "px, " + amountMovedY + "px, 0px)");
        });
    };

    var set_screen = function setScreen() {
        if ($(window).width() < 992) {
            $('#main-header').appendTo($('body'));
            // move social to nav
            // $('#social-navigation').insertAfter('#menu-primary-menu');
        } else {
            $('.fullpage #page').fullpage({

            //    fixedElements: '#main-header',
                navigation: true,
                navigationPosition: 'right',
                onLeave: function (index, nextIndex, direction) {
                    var leavingSection = $(this);

                    // leavingSection.find('.ani').removeClass('animated');
                    //after leaving section 2
                    if (direction == 'down') {
                        $('body').addClass('scrollActive');
                        //  $('.scrollup').fadeIn();
                    }

                    else if (index == 2 && direction == 'up') {
                        $('body').removeClass('scrollActive');
                        //  $('.scrollup').fadeOut();
                    }

                }, afterLoad: function (anchorLink, index) {
                    var loadedSection = $(this);
                    if ($("#site-footer").hasClass("active")) {
                        $('a.scrollup').css('bottom','90px');
                    }else{
                        $('a.scrollup').css('bottom','10px');
                    }

                    //     loadedSection.find('.ani').addClass(myclass);
                }

                // sectionsColor: ['#f2f2f2', '#4BBFC3', '#7BAABE', 'whitesmoke', '#000'],
            });

            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('.scrollup').fadeIn();
                }
                else {
                    $('.scrollup').fadeOut();
                }
            });
            $('.scrollup').click(function () {
                $.fn.fullpage.moveTo(1);
            });

            moving_bg($('#home-floor-3'));
            moving_bg($('.moving-bg'));
        }
    };


    $(document).ready(function () {

        if($("body").is(":not('.fullpage')")){
            $('a.scrollup').css('bottom','90px');
        }

        if (navigator.userAgent.indexOf('iPhone OS 8_1') > -1 ||
            navigator.userAgent.indexOf('iPhone OS 8_4') > -1 ||
            navigator.userAgent.indexOf('iPhone OS 6_') > -1) {
            $('body').addClass('os82');
        }
        $(window).on('orientationchange', function (event) {
            location.reload();
        });
        //fix_floor();
        $('#search-id').click(function () {
            $(this).closest('form').submit();
        });
        set_screen();
        // set_screen();
        // mobile menu

        //jQuery('[data-target=".primary-navigation-collapse"]').click(function (){
        //    jQuery('body').toggleClass('push-nav');
        //    return true;
        //});
        jQuery('[data-target="#primary-navigation"]').click(function (e) {
            jQuery('body').toggleClass('push-nav');
            e.preventDefault();
        });

        $('.thank-you-header .close').click(function () {
            $('.thank_you').hide();
        });


        $('.facebook-share').click(function (e) {
            e.preventDefault();
            FB.ui({
                method: 'share',
                href: $(this).attr('href')
            }, function (response) {
            });
        });


        //   $('#home-floor-3').parallax();


        $('.portfolio-slider').bxSlider({
            'mode': 'fade',
            nextText: '<i class="fa fa-angle-right" aria-label="'+sogoc.next+'"></i>',
            prevText: '<i class="fa fa-angle-left" aria-label="'+sogoc.prev+'"></i>',
            pager: false,
            speed: 2000
        });
        if($(window).width() < 767){
            $('.principles-icon-wrapper').bxSlider({
                'mode': 'fade',
                pager: true,
                speed: 2000,
                controls: false,
                touchEnabled: true
            });
        }
        // fix bx controls
        $(window).resize(function () {
            fix_portfolio_controls();
            fix_floor();

        });
        $('.achievements-slider').bxSlider({
            controls: false,
            minSlides: 1,
            maxSlides: 1
        });

        $('.testimonials-slider').bxSlider({
            controls: false,
            minSlides: 1,
            maxSlides: 1
        });
        var windowWidth = $(window).width(),
            min = 3, max = 4, aaa;
        if (windowWidth <= 767) {
            min = 1;
            max = 1;
        }
        else if (windowWidth > 767 && windowWidth < 1200) {
            min = 3;
            max = 3;
            aaa = 305;

        }
        else if (windowWidth >= 1200) {
            min = 1;
            max = 5;
            aaa = 353;
        }
        $('.team-wrapper').bxSlider({
            controls: false,
            minSlides: min,
            maxSlides: max,
            pager: true,
            slideWidth: aaa,
            slideMargin: 30,
            moveSlides: 1,
            infiniteLoop: false
        });

        $("form :input").focus(function () {
            $("label[for='" + this.id + "']").addClass("labelfocus");
        }).blur(function () {
            if ($(this).val() === '') {
                $("label[for='" + this.id + "']").removeClass("labelfocus");
            }

        });


        // scroll to section
        $('.continue').click(function (e) {
            e.preventDefault();
            $.fn.fullpage.moveSectionDown();
        });

        // this is for the city page
        $('a[rel="prettyPhoto"]').fancybox();


        /*
         *  do header fixed animation on scroll
         * */

        //// header container
        //var mainHeader = $('#main-header');
        //
        //// add admin bar extra height
        //var admin_bar = $('body').hasClass('admin-bar') ? 32 : 0;
        //
        //// get header height (without border)
        //var getHeaderHeight = mainHeader.outerHeight();
        //
        //// border height value (make sure to be the same as in your css)
        //var borderAmount = 0;
        //
        //// shadow radius number (make sure to be the same as in your css)
        //var shadowAmount = 8;
        //
        //// init variable for last scroll position
        //var lastScrollPosition = 0;

        // set negative top position to create the animated header effect
        // mainHeader.css('top', '-' + (getHeaderHeight + shadowAmount + borderAmount) + 'px');

        //$(window).scroll(function () {
        //    var currentScrollPosition = $(window).scrollTop();
        //
        //    if ($(window).scrollTop() > 2 * (getHeaderHeight + shadowAmount + borderAmount)) {
        //
        //        $('body').addClass('scrollActive');//.css('padding-top', getHeaderHeight);
        //        mainHeader.css('top', admin_bar);
        //
        //        if (currentScrollPosition < lastScrollPosition) {
        //            mainHeader.css('top', '-' + (getHeaderHeight + shadowAmount + borderAmount) + 'px');
        //        }
        //        lastScrollPosition = currentScrollPosition;
        //
        //    } else {
        //        $('body').removeClass('scrollActive');//.css('padding-top', 0);
        //        mainHeader.css('top', admin_bar);
        //    }
        //});
        /* End animation scroll*/

    });
    $(window).load(function () {
        // load finish

        $(window).resize();
    });

    function fix_portfolio_controls() {
        var img = $('.portfolio-slider img');
        if (img.length > 0) {
            var w;
            // found it continue.
            $('.portfolio-slider img').each(function () {
                if ($(this).width() > 0)
                    w = $(this).width() + 100;
            });

            var controls = $('.portfolio-slider-wrapper').find('.bx-controls');

            controls.css(
                {
                    'width': w,
                    'left': '50%',
                    'margin-left': "-" + w / 2 + "px"
                }
            );
        }
    }
})(jQuery);



