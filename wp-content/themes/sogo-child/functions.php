<?php
define('USE_FONTAWSOME', true);
define('USE_ANIMATION', false);


function sogo_class_autoload()
{

    $sogo_includes = array();
    $sogo_includes =  sogo_main_class_autoload($sogo_includes);
    foreach (glob(dirname(__FILE__) . "/lib/class/*.php") as $filename) {
        $sogo_includes[] = "lib/class/" . basename($filename);
    }
    // parent function.
    sogo_include($sogo_includes);

}

function sogo_child_theme_setup()
{
    // load child text domain
    load_child_theme_textdomain('sogoc', get_stylesheet_directory() . '/languages');
    // load external files
    $sogo_includes = array(
        'admin/options.php',   // Utility functions
        'lib/widget.php',   // Utility functions
        'lib/post-type-init.php',   // Utility functions
        'lib/meta-boxes.php',        // Utility functions
        'lib/tax-boxes.php',        // Utility functions
    );
    //parent function.
    sogo_include($sogo_includes);
    sogo_class_autoload();
}

add_action('after_setup_theme', 'sogo_child_theme_setup');



function sogo_child_scripts()
{
    if (!is_admin()) {
        wp_enqueue_script('aos-script', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array('jquery'), '', true);
        wp_enqueue_style( 'aos-style', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), uniqid() );

        add_action( 'wp_enqueue_scripts', 'sogo_load_bxslider' );
//        add_action( 'wp_enqueue_scripts', 'sogo_load_slickslider' );
        add_action( 'wp_enqueue_scripts', 'sogo_load_fancybox' );
        add_action( 'wp_enqueue_scripts', 'sogo_load_fullPage' );
        add_action( 'wp_enqueue_scripts', 'sogo_load_parallax' );
        wp_enqueue_script('sogo-child-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'),'', true);


        wp_localize_script('sogo-child-scripts', 'sogoc', array(
                'next' => __("click to move to next slide","sogoc"),
                'prev' => __("click to move to previous slide","sogoc"),

        ));
	    wp_enqueue_style( 'sogo-style', get_stylesheet_uri(), array(), uniqid() );
        wp_enqueue_style('slickslider-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '', 'all');
        wp_enqueue_script('slickslider', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '', true);

    }
}


add_action('wp_enqueue_scripts', 'sogo_child_scripts', 2);

function sogo_extra_class($key){
    $val = sogo_meta($key);
    if($val != -1){
        echo $val;
    }
}

/**
 * remove editor from pages
 */
function hide_editor () {

    // Get the Post ID.
    if ( isset ( $_GET[ 'post' ] ) ) $post_id = $_GET[ 'post' ]; else if ( isset ( $_POST[ 'post_ID' ] ) ) $post_id = $_POST[ 'post_ID' ];

    if ( !isset ( $post_id ) || empty ( $post_id ) ) return;

    // Get the name of the Page Template file.
    $template_file = get_post_meta ( $post_id, '_wp_page_template', true );
    $arr = array( 'front-page.php');

    if ( in_array($template_file ,$arr) ) { // edit the template name
        remove_post_type_support ( 'page', 'editor' );
    }

}
add_action('admin_init', 'hide_editor');




function sogo_single_cpt_template( $templates = '' ){
    $single = get_queried_object();

    $template = sogo_meta('template', $single->ID);
    $arr = array('project','case-study');
    if(in_array($single->post_type,$arr) && $template != '')
        $templates = locate_template( $template, false );

    return $templates;
}
//add_filter( 'single_template', 'sogo_single_cpt_template' );


add_filter('next_post_link','add_css_class_to_next_post_link');
function add_css_class_to_next_post_link($link) {
    $link = str_replace("<a ", "<a class='btn-link margin next-btn'  ", $link);
    return $link;
}

add_filter('previous_post_link','add_css_class_to_previous_post_link');
function add_css_class_to_previous_post_link($link) {
    $link = str_replace("<a ", "<a class='btn-link margin previews-btn'", $link);

//    $link = str_replace(">", "><i class=\"fa fa-angle-left\"></i>", $link);
    return $link;
}




function sogo_redirect_en(){
    if(is_main_site() && !isset($_COOKIE['sogo-eng'])){
        setcookie('sogo-eng',true, 0,'/');
       global $wpdb;

        $sql = 'SELECT
	            country
	        FROM
	            ip2nation
	        WHERE
	            ip < INET_ATON("'.$_SERVER['REMOTE_ADDR'].'")
	        ORDER BY
	            ip DESC
	        LIMIT 0,1';

        $country  = $wpdb->get_results($sql);
        if($country){
            if($country[0]->country != 'il'){
                wp_redirect(site_url('en'));
                exit;
            }
        }



    }
}
//add_action('init', 'sogo_redirect_en');




//function sogo_save_lead($cf7) {
//
//$submission = WPCF7_Submission::get_instance();
//if ( $submission ) {
//    $formdata = $submission->get_posted_data();
//
//
//    $name = isset($formdata['your-name'])?$formdata['your-name']: $formdata['contact-name'];
//    $email = isset($formdata['your-email'])?$formdata['your-email']: $formdata['contact-email'];
//    $phone = isset($formdata['your-phone'])?$formdata['your-phone'] : $formdata['contact-phone'];
//    $comments = isset($formdata['message'])?  $formdata['message']: '';
//
//
//
//    $arr = array(
//        'add_remote_lead' => 'doit',
//        'id' => null,
//        'title' =>$name,
//        'comments' =>$comments,
//        'oh_start_date' =>'',
//        'oh_contact' =>'',
//        'oh_other_contact' =>$name,
//        'oh_email' =>$email,
//        'oh_phone_number' =>$phone,
//    );
//    $response = wp_remote_post( 'http://pm.sogo.co.il/', array(
//            'method' => 'POST',
//            'timeout' => 45,
//            'redirection' => 5,
//            'httpversion' => '1.0',
//            'blocking' => true,
//            'headers' => array(),
//            'body' => $arr,
//            'cookies' => array()
//        )
//    );
//}
//
//}
//
//add_action( 'wpcf7_mail_sent', 'sogo_save_lead' );




// contact form 7 thanks page after submitting the form

function mycustom_wp_footer() {
    ?>
    <script type="text/javascript">
        document.addEventListener( 'wpcf7mailsent', function( event ) {
            if ( '618' == event.detail.contactFormId ) {
                location = 'https://sogo.co.il/תודה-רבה/';
            }
            else if ( '125' == event.detail.contactFormId ) {
                location = 'https://sogo.co.il/תודה-רבה/';
            }
            else if ( '134' == event.detail.contactFormId ) {
                location = 'https://sogo.co.il/תודה-רבה/';
            }
            else if ( '2304' == event.detail.contactFormId ) {
                location = 'https://sogo.co.il/תודה-רבה/';
            }
            else if ( '4171' == event.detail.contactFormId ) {
                location = 'https://sogo.co.il/thanks_landing/';
            }
            else if ( '5418' == event.detail.contactFormId ) {
                location = 'https://sogo.co.il/thanks-startup/';
            }
            else if ( '2748' == event.detail.contactFormId ) {
                location = 'https://sogo.co.il/תודה-רבה/';
            }
            else if ( '124' == event.detail.contactFormId ) {
                location = 'https://sogo.co.il/en/thank-you/';
            }
            else if ( '381' == event.detail.contactFormId ) {
                location = 'https://sogo.co.il/en/thank-you/';
            }
            else if ( '31' == event.detail.contactFormId ) {
                location = 'https://sogo.co.il/en/thank-you/';
            }

        }, false );
    </script>
    <?php
}

add_action( 'wp_footer', 'mycustom_wp_footer' );

function utfOrd($c) {
    return intval(array_pop(unpack('H*', $c)),16);
}

function utfChr($c) {
    return pack('H*', base_convert("$c", 10, 16));
}

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';

    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

add_filter('wp_video_shortcode', function ($output) {
    if (!is_page_template('page-champion-toolkit.php')) {
        $output = str_replace('controls="controls"', 'playsinline', $output);
        return $output;
    }
    $output = str_replace('<video', '<video playsinline', $output);
    return $output;
});

function disable_feeds() {
    wp_die(__('RSS feeds are disabled on this site.'));
}

add_action('do_feed', 'disable_feeds', 1);
add_action('do_feed_rdf', 'disable_feeds', 1);
add_action('do_feed_rss', 'disable_feeds', 1);
add_action('do_feed_rss2', 'disable_feeds', 1);
add_action('do_feed_atom', 'disable_feeds', 1);
add_action('do_feed_rss2_comments', 'disable_feeds', 1);
add_action('do_feed_atom_comments', 'disable_feeds', 1);

// Удаляем RSS ссылки из head
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);

// Перенаправляем RSS запросы
function redirect_feeds_to_home() {
    if (is_feed()) {
        wp_redirect(home_url());
        exit;
    }
}
add_action('template_redirect', 'redirect_feeds_to_home');

add_action('admin_init', function() {
    if (isset($_POST['action']) && $_POST['action'] === 'editpost' && isset($_POST['post_ID'])) {
        add_action('wp_loaded', function() {
            if (isset($_POST['post_ID'])) {
                $post_id = $_POST['post_ID'];
                wp_safe_redirect(admin_url("post.php?post={$post_id}&action=edit&message=1"));
                exit;
            }
        });
    }
});