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

        add_action( 'wp_enqueue_scripts', 'sogo_load_bxslider' );
        add_action( 'wp_enqueue_scripts', 'sogo_load_fancybox' );
        add_action( 'wp_enqueue_scripts', 'sogo_load_fullPage' );
        add_action( 'wp_enqueue_scripts', 'sogo_load_parallax' );
        wp_enqueue_script('sogo-child-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'),'', true);


        wp_localize_script('sogo-child-scripts', 'sogo', array(

        ));

        wp_enqueue_style('sogo-style', get_stylesheet_uri()  );

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
add_filter( 'single_template', 'sogo_single_cpt_template' );


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
        setcookie('sogo-eng',true, time()+ 60*60,'/');
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

        $country  = $wpdb->query($sql);

        if(!$country){
            wp_redirect(site_url('en'));
            exit;
        }

    }
}
add_action('init', 'sogo_redirect_en');