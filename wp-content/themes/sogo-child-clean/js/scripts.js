(function ($) {

    $(document).ready(function () {


        // scroll to section
        $('.section-scroll').click(function () {
            $('html, body').animate({
                scrollTop: $(this).offset().top + 80
            }, 2000);
        });

        // this is for the city page
        $('a[rel="prettyPhoto"]').fancybox();


        // move to top
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            }
            else {
                $('.scrollup').fadeOut();
            }
        });
        $('.scrollup').click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });

    });


    $(window).load(function () {
        // load finish

    });

})(jQuery);




