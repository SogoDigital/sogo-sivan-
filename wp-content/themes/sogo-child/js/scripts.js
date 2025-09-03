(function ($) {



    var mobile = $('body').hasClass('mobile');
    var fix_floor = function fix_floor() {
        // console.log($(window).width());
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
                        $('a.scrollup').css('bottom','10vh');
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

        /*******************************************/
        /* BLOG */
        /*******************************************/

        $('.blog-cat').on('click', function () {
            $('.blog-cat').removeClass('current-cat');
            $(this).addClass('current-cat');
        })
        $('#post-category-select').on('change', function () {
            location = $(this).val();
        });


        //   $('#home-floor-3').parallax();
        $('.js_gallery_kobi').bxSlider({
            'mode': 'fade',
            // nextText: '<i class="fa fa-angle-right" aria-label="'+sogoc.next+'"></i>',
            // prevText: '<i class="fa fa-angle-left" aria-label="'+sogoc.prev+'"></i>',
            pager: true,
            controls:false,
            speed: 2000
        });

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

        $('.js-portfolio-slider').slick({
            rtl: true,
            arrows: true,
            dots: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            fade: true,
            cssEase: 'linear',
            // nextArrow: $('.homepage-slider-next.homepage-testimonial-next'),
            // prevArrow: $('.homepage-slider-prev.homepage-testimonial-prev'),
            nextArrow: '<i class="portfolio-slider-prev fa fa-angle-left"></i>',
            prevArrow: '<i class="portfolio-slider-next fa fa-angle-right"></i>',
        });

        $('.js-blog-cats-slider').slick({
            rtl: true,
            arrows: true,
            dots: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            centerMode: true,
            variableWidth: true,
            // nextArrow: $('.homepage-slider-next.homepage-testimonial-next'),
            // prevArrow: $('.homepage-slider-prev.homepage-testimonial-prev'),
            nextArrow: '<i class="blog-cat-slider-arrow blog-cat-next fa fa-angle-left"></i>',
            prevArrow: '<i class="blog-cat-slider-arrow blog-cat-prev fa fa-angle-right"></i>',
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
     //   $('a[rel="prettyPhoto"]').fancybox();


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

    $(document).on('click','.selectProjectType', function(){
       console.log($(this).attr('name'));
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
            if ($(window).width() > 992) {
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
    }

    // if ($(".menu .current-menu-item")[0]) {
    //     var leftPos, newWidth, $magicLine;
    //
    //     $('.desktop-menu .menu').append("<li id='magic-line'></li>");
    //     $magicLine = $('#magic-line');
    //     $magicLine.width($('.current-menu-item').width())
    //         .css('left', $('.current-menu-item a').position().left)
    //         .data('origWidth', $magicLine.width());
    //
    //     /*Magicline hover animation*/
    //     $('.desktop-menu .menu li').find('a').hover(function () {
    //         var $thisBar = $(this);
    //         console.log($thisBar)
    //         leftPos = $thisBar.position().left;
    //         console.log(leftPos)
    //         newWidth = $thisBar.parent().width();
    //         $magicLine.css({
    //             "left": leftPos,
    //             "width": newWidth
    //         });
    //     }, function () {
    //         $magicLine.css({
    //             "left": $('.current-menu-item').position().left,
    //             "width": $magicLine.data('origWidth')
    //         });
    //     });
    // }

    $('.nav-button').click(function(){
        $('body').toggleClass('nav-open');
    });

    // Smooth Scrolling

    $('a[href*="#"]')
        // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function(event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function() {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        };
                    });
                }
            }
        });

    /*******************************************/
    /* CF7 Validation */
    /*******************************************/

    function validatePhoneNumber(phoneValue) {
        if (!phoneValue) return true; // Пустое поле - пусть CF7 сам обрабатывает required

        const cleanPhone = phoneValue.replace(/\D/g, '');

        return cleanPhone.startsWith('05') && cleanPhone.length === 10;
    }

    function showPhoneError($phoneInput, message) {
        const $parent = $phoneInput.parent();

        $parent.find('.phone-validation-error').remove();

        $phoneInput.addClass('phone-invalid wpcf7-not-valid');

        $parent.append('<span class="phone-validation-error wpcf7-not-valid-tip" style="color: #e74c3c; font-size: 12px; display: block; margin-top: 5px;">' + message + '</span>');
    }

    function clearPhoneError($phoneInput) {
        const $parent = $phoneInput.parent();
        $parent.find('.phone-validation-error').remove();
        $phoneInput.removeClass('phone-invalid wpcf7-not-valid');
    }

    $(document).on('blur', 'input[type="tel"]', function() {
        const $phoneInput = $(this);
        const phoneValue = $phoneInput.val().trim();

        if (phoneValue && !validatePhoneNumber(phoneValue)) {
            showPhoneError($phoneInput, 'מספר טלפון חייב להתחיל ב-05 ולהכיל בדיוק 10 ספרות');
        } else {
            clearPhoneError($phoneInput);
        }
    });

    $(document).on('input', 'input[type="tel"]', function() {
        clearPhoneError($(this));
    });

    $(document).on('click', '.wpcf7-submit input[type="submit"]', function(e) {
        const $submitBtn = $(this);
        const $form = $submitBtn.closest('form.wpcf7-form');
        const $phoneInputs = $form.find('input[type="tel"]');
        let hasPhoneError = false;

        $phoneInputs.each(function() {
            const $phoneInput = $(this);
            const phoneValue = $phoneInput.val().trim();

            if (phoneValue && !validatePhoneNumber(phoneValue)) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                showPhoneError($phoneInput, 'מספר טלפון חייב להתחיל ב-05 ולהכיל בדיוק 10 ספרות');
                hasPhoneError = true;
                $phoneInput.focus();
            } else {
                clearPhoneError($phoneInput);
            }
        });

        if (hasPhoneError) {
            $form.addClass('invalid');
            return false;
        } else {
            $form.removeClass('invalid');
        }
    });

    $(document).on('submit', 'form.wpcf7-form', function(e) {
        const $form = $(this);
        const $phoneInputs = $form.find('input[type="tel"]');
        let hasPhoneError = false;

        $phoneInputs.each(function() {
            const $phoneInput = $(this);
            const phoneValue = $phoneInput.val().trim();

            if (phoneValue && !validatePhoneNumber(phoneValue)) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                showPhoneError($phoneInput, 'מספר טלפון חייב להתחיל ב-05 ולהכיל בדיוק 10 ספרות');
                hasPhoneError = true;
                $phoneInput.focus();
            }
        });

        if (hasPhoneError) {
            $form.addClass('invalid');
            return false;
        }
    });

    $(document).on('wpcf7beforesubmit', function(e) {
        const $form = $(e.target);
        const $phoneInputs = $form.find('input[type="tel"]');
        let hasPhoneError = false;

        $phoneInputs.each(function() {
            const $phoneInput = $(this);
            const phoneValue = $phoneInput.val().trim();

            if (phoneValue && !validatePhoneNumber(phoneValue)) {
                showPhoneError($phoneInput, 'מספר טלפון חייב להתחיל ב-05 ולהכיל בדיוק 10 ספרות');
                hasPhoneError = true;
                $phoneInput.focus();
            }
        });

        if (hasPhoneError) {
            e.preventDefault();
            return false;
        }
    });

    $(document).on('wpcf7mailsent', function(event) {
        const $form = $(event.target);
        $form.find('input[type="tel"]').each(function() {
            clearPhoneError($(this));
        });
        $form.removeClass('invalid');
    });

    $(document).on('wpcf7invalid wpcf7spam wpcf7mailfailed', function(event) {
        const $form = $(event.target);
        $form.removeClass('invalid');
    });


    // ===== Config =====
    var policyUrl   = "https://sogo.co.il/מדיניות-פרטיות";
    var consentId   = "form-field-privacy_consent";   // Elementor-friendly ID
    var consentName = "form_fields[privacy_consent]"; // Elementor-friendly name
    var errorText   = "יש לאשר את מדיניות הפרטיות לפני שליחת הטופס.";

    // Build checkbox markup
    function consentMarkup(){
        return `
      <div class="custom-privacy-consent elementor-field-group elementor-col-100 elementor-field-type-acceptance" data-inserted="yes">
        <label class="custom-privacy-label">
          <input type="checkbox" id="${consentId}" name="${consentName}" value="yes" required />
          <span>אני מאשר/ת את <a href="${policyUrl}" target="_blank" rel="noopener">מדיניות הפרטיות</a> ומסכים/ה שהמידע ישמש למענה לפנייה ולמטרות המפורטות בה</span>
        </label>
        <div class="custom-privacy-error" aria-live="polite" style="display:none; color: red; font-size: 14px; margin-top: 5px;"></div>
      </div>
    `;
    }

    // Inject checkbox before submit areas in common form plugins
    function addPrivacyUI(){
        var formSelectors = [
            'form.elementor-form',      // Elementor Pro
            'form.wpcf7-form',          // Contact Form 7
            'form.wpforms-form',        // WPForms
            'form.gform_wrapper form',  // Gravity Forms (inner form)
            'form.nf-form'              // Ninja Forms
        ];

        $(formSelectors.join(',')).each(function(){
            var $form = $(this);

            // avoid duplicates
            if ($form.data('privacy-injected')) return;

            // detect submit wrapper
            var $submitWrap = $form.find(
                '.elementor-field-type-submit, .gform_footer, .wpforms-submit-container, .nf-form-cont .submit-container'
            ).first();

            if (!$submitWrap.length){
                var $btn = $form.find('button[type="submit"], input[type="submit"]').last();
                $submitWrap = $btn.length ? $btn.parent() : $form;
            }

            // inject only if not present
            if ($form.find('#'+consentId+', [name="'+consentName+'"]').length === 0){
                $(consentMarkup()).insertBefore($submitWrap);
            }

            $form.data('privacy-injected', true);
        });
    }

    // More aggressive validation - blocks all form submission methods
    function bindValidation(){
        // Primary submit handler - highest priority
        $(document).on('submit','form',function(e){
            var $form = $(this);
            var $cb   = $form.find('#'+consentId+', [name="'+consentName+'"]').first();

            if (!$cb.length) return; // no checkbox in this form

            if (!$cb.is(':checked')){
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();

                showError($form, $cb);
                return false;
            } else {
                hideError($form);
            }
        });

        // Block button clicks before they trigger submit
        $(document).on('click','button[type="submit"], input[type="submit"]',function(e){
            var $form = $(this).closest('form');
            var $cb   = $form.find('#'+consentId+', [name="'+consentName+'"]').first();

            if ($cb.length && !$cb.is(':checked')){
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();

                showError($form, $cb);
                return false;
            }
        });

        // Handle AJAX form submissions (like Contact Form 7)
        $(document).on('wpcf7beforesubmit', function(e) {
            var $form = $(e.target);
            var $cb   = $form.find('#'+consentId+', [name="'+consentName+'"]').first();

            if ($cb.length && !$cb.is(':checked')){
                showError($form, $cb);
                return false;
            }
        });

        // Handle Elementor Pro forms
        $(document).on('elementor/forms/submit', function(e, $form) {
            var $cb = $form.find('#'+consentId+', [name="'+consentName+'"]').first();

            if ($cb.length && !$cb.is(':checked')){
                showError($form, $cb);
                return false;
            }
        });

        // Clear error on checkbox change
        $(document).on('change', '#'+consentId+', [name="'+consentName+'"]', function(){
            hideError($(this).closest('form'));
        });
    }

    // Show error message
    function showError($form, $cb) {
        var $err = $form.find('.custom-privacy-error').first();
        if (!$err.length){
            $err = $('<div class="custom-privacy-error" aria-live="polite" style="color: red; font-size: 14px; margin-top: 5px;"></div>')
                .insertAfter($cb.closest('.custom-privacy-consent'));
        }
        $err.text(errorText).show();

        // Scroll to checkbox with error
        $cb[0].scrollIntoView({behavior:'smooth', block:'center'});

        // Focus on checkbox for accessibility
        setTimeout(function() {
            $cb.focus();
        }, 500);
    }

    // Hide error message
    function hideError($form) {
        $form.find('.custom-privacy-error').hide().empty();
    }

    // Disable form submission programmatically if checkbox not checked
    function preventFormSubmission() {
        $('form').each(function() {
            var $form = $(this);
            var originalAction = $form.attr('action');
            var $cb = $form.find('#'+consentId+', [name="'+consentName+'"]').first();

            if ($cb.length) {
                // Override form action temporarily if checkbox not checked
                $form.on('submit', function(e) {
                    if (!$cb.is(':checked')) {
                        $form.attr('action', 'javascript:void(0);');
                        setTimeout(function() {
                            $form.attr('action', originalAction);
                        }, 100);
                    }
                });
            }
        });
    }

    // Init
    function initUI(){
        addPrivacyUI();
        preventFormSubmission();
    }

    // Initialize everything
    $(document).ready(function() {
        initUI();
        bindValidation();
    });

    // Re-run for dynamic loads/popups/AJAX
    $(window).on('load', function(){ setTimeout(initUI, 300); });
    $(document).ajaxComplete(function(){ setTimeout(initUI, 300); });
    $(document).on('elementor/popup/show', function(){ setTimeout(initUI, 300); });

    if (window.MutationObserver){
        var observer = new MutationObserver(function(muts){
            var add = muts.some(function(m){ return m.addedNodes && m.addedNodes.length; });
            if (add){ setTimeout(initUI, 200); }
        });
        observer.observe(document.body, {childList:true, subtree:true});
    }


})(jQuery);
