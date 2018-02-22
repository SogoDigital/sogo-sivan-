<?php
/*
 *  This file handle only enqueue scripts and style for the parent theme
 * expose:
 *  add_action( 'wp_enqueue_scripts', 'sogo_load_fancybox' );
 *  add_action( 'wp_enqueue_scripts', 'sogo_load_bxslider' );
 *  add_action( 'wp_enqueue_scripts', 'sogo_load_lightbox' );
 * */
function sogo_scripts()
{
    if (!is_admin()) {
        // enqueue to header
        wp_enqueue_script('jquery');
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '', true);

        // Enable threaded comments
        if ((!is_admin()) && is_singular() && comments_open() && get_option('thread_comments'))
            wp_enqueue_script('comment-reply');

        wp_localize_script('bootstrap', 'sogo', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
        ));

    }
}

add_action('wp_enqueue_scripts', 'sogo_scripts');


/*
  Engeue styles
--------------------------------------------*/

function sogo_styles()
{
    if (!is_admin()) {
        wp_enqueue_style('bootstrap-responsive', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '', 'all');
        if(USE_FONTAWSOME){
            wp_enqueue_style('fontawsome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', array(), '', 'all');
        }
        if(USE_ANIMATION){
            wp_enqueue_style('sogo-animation',  get_template_directory_uri() . '/assets/css/animate.min.css', array(), '', 'all');
        }
    }
}

add_action('get_footer', 'sogo_styles', 1);

/*
 * load fancybox script
 * usage: add_action( 'wp_enqueue_scripts', 'sogo_load_fancybox' );
*/
function sogo_load_fancybox()
{
    if (!is_admin()) {
        wp_enqueue_style('fancybox-css', get_template_directory_uri() . '/assets/js/fancybox/jquery.fancybox.min.css', array(), '', 'all');
        wp_enqueue_script('fancybox', get_template_directory_uri() . '/assets/js/fancybox/jquery.fancybox.pack.js', array('jquery'), '', true);
        wp_enqueue_script('fancybox-media', get_template_directory_uri() . '/assets/js/fancybox/helpers/jquery.fancybox-media.min.js', array('jquery'), '', true);
    }
}

/*
 * load fancybox script
 * usage: add_action( 'wp_enqueue_scripts', 'sogo_load_bxslider' );
*/
function sogo_load_bxslider()
{
    if (!is_admin()) {
        wp_enqueue_script('fitvids', get_template_directory_uri() . '/assets/js/bxslider/plugins/jquery.fitvids.min.js', array('jquery'), '', true);
        wp_enqueue_script('bxslider', get_template_directory_uri() . '/assets/js/bxslider/jquery.bxslider.min.js', array('jquery'), '', true);
    //    wp_enqueue_style('bxslider.css', get_template_directory_uri() . '/assets/js/bxslider/jquery.bxslider.css', array(), '', 'all');
    }
}

/*
 * load fancybox script
 * usage: add_action( 'wp_enqueue_scripts', 'sogo_load_lightbox' );
*/
function sogo_load_lightbox()
{
    wp_enqueue_script('sogolight', get_template_directory_uri() . '/assets/js/lightbox/ekko-lightbox.min.js', array('jquery'), '', true);
    wp_enqueue_style('sogolightcss', get_template_directory_uri() . '/assets/js/lightbox/ekko-lightbox.min.css', array(), '', 'all');
}


/*
 * load fancybox script
 * usage: add_action( 'wp_enqueue_scripts', 'sogo_load_lightbox' );
*/
function sogo_load_fullPage()
{
    //wp_enqueue_script('slimscroll', get_template_directory_uri() . '/assets/js/fullpage/jquery.slimscroll.min.js', array('jquery'), '',true);
    wp_enqueue_script('fullPage', 'https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.7.5/jquery.fullPage.min.js', array('jquery'), '', true);
    wp_enqueue_style('fullPagecss', get_template_directory_uri() . '/assets/js/fullpage/jquery.fullPage.css', array(), '', 'all');

}
/*
 * load ScrollMagic script
 * usage: add_action( 'wp_enqueue_scripts', 'sogo_load_lightbox' );
*/
function sogo_load_ScrollMagic()
{
    //wp_enqueue_script('slimscroll', get_template_directory_uri() . '/assets/js/fullpage/jquery.slimscroll.min.js', array('jquery'), '',true);
    wp_enqueue_script('ScrollMagic', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js', array('jquery'), '', true);
    wp_enqueue_script('TweenMax', '//cdnjs.cloudflare.com/ajax/libs/gsap/1.14.2/TweenMax.min.js', array('jquery'), '', true);

}

/*
 * load fancybox script
 * usage: add_action( 'wp_enqueue_scripts', 'sogo_load_lightbox' );
*/
function sogo_load_parallax()
{
    wp_enqueue_script('parallax', get_template_directory_uri() . '/assets/js/parallax/jquery.parallax.min.js',array('jquery'), '', true);

}