<?php

/*
Plugin Name: Matat Animated Image Grid Menu
Plugin URI: http://dev.matat.co.il/
Description:
Version: 1
Author: amit matat
Author URI:
Author Email: amit@matat.co.il
*/

/*
 *	assign global variables
*/

$plugin_url=WP_PLUGIN_URL.'/matat-Animated-Image-Grid';
$options=array();

/*
 *	Add a link to our plugin in the admin menu
 *	under 'Settings > matat Badges'
 *
*/
function wpmatat_Animated_Image_Grid(){

    /*
     * use the add_option_page function
     * add_optin_page($page_title,$menu_title,$capability,$menu-slug, $function)
     */

    add_options_page(
        'Official Matat plugin',
        'Matat Animated Image Grid',
        'manage_options',
        'wpmatat_animated_image',
        'matat_Animated_Image_Grid_options_page'
    );
}
add_action('admin_menu','wpmatat_Animated_Image_Grid');

function matat_Animated_Image_Grid_options_page(){


    if (!current_user_can('manage_options')) {
        wp_die('your not a admin');
    }
    global $plugin_url;
    global $options;

    if (isset($_FILES['matat_galery'])) {
        // the name of the input name
        $file_meta = 'matat_galery';
        $img_id = manage_media_upload($file_meta, null);

    }

    // Update Gallery setting
    // @todo Update all resolotion
    // @todo Update default value
    if(isset($_POST['settings'])){
        $r_1024=$_POST['r_1024'];
        $c_1024=$_POST['c_1024'];
        $settings=array(
            '1024_row'=>$r_1024,
            '1024_columns'=>$c_1024
        );
        update_option('_matat_gallery_plugin_settings',$settings);
    }

    require('inc/options-page-wrapper.php');

}

function wpmatat_Animated_Image_Grid_style(){
    wp_enqueue_script('AnimatedGallery_modern', plugins_url('matat-Animated-Image-Grid/inc/modernizr.custom.26633.js'), array('jquery'), true);
    wp_enqueue_script('AnimatedGallery_js', plugins_url('matat-Animated-Image-Grid/inc/jquery.gridrotator.js'), array('jquery'), true);
    wp_enqueue_style('AnimatedGallery_fallback',  plugins_url('matat-Animated-Image-Grid/inc/fallback.css'));
    wp_enqueue_style('AnimatedGallery_css', plugins_url('matat-Animated-Image-Grid/inc/style.css'));
}
add_action('wp_enqueue_scripts','wpmatat_Animated_Image_Grid_style');

function wpmatat_Animated_Image_Grid_style_admin(){
    wp_enqueue_style('wpmatat_badges_style',plugins_url('matat-Animated-Image-Grid/wpmatat_animation.css'));
    wp_enqueue_script('matat_sctipt', plugins_url('matat-Animated-Image-Grid/matat_sctipt.js'), array('jquery'), true);

}
add_action('admin_head','wpmatat_Animated_Image_Grid_style_admin');


//class wpmatat_Animated_Image_Grid{
//
//    private $r_1024, $c_1024;
//
//    public function __construct(){
//
//    }
//
//
//}


function manage_media_upload($file_input_name, $post_id, $thumb = false){
    $files = $_FILES[$file_input_name];

    $ids = array();
    if ($files) {

        foreach ($files['name'] as $key => $value) {
            if ($files['name'][$key]) {
                $file = array(
                    'name' => $files['name'][$key],
                    'type' => $files['type'][$key],
                    'tmp_name' => $files['tmp_name'][$key],
                    'error' => $files['error'][$key],
                    'size' => $files['size'][$key]
                );
                $_FILES = array($file_input_name => $file);
                foreach ($_FILES as $file => $array) {
                    $ids[] = handle_attachment($file, null);
                   ;
                }
            }
        }
    }
    // Get the image ID'S
    $imgae= get_option('_matat_gallery_plugin');

    // merge the array
    if($imgae){
        $ids= array_merge($imgae,$ids);
    }


    // update the id's
    return update_option('_matat_gallery_plugin', $ids);
}

function handle_attachment($file_handler, $post_id, $set_thu = false){

    // check to make sure its a successful upload
    if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();

    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');

    $attach_id = media_handle_upload($file_handler, $post_id);
    // If you want to set a featured image frmo your uploads.
    if ($set_thu) set_post_thumbnail($post_id, $attach_id);
    return $attach_id;
}

function wpmatat_Animated_Image_Grid_shorcode( $atts ){
$img = get_option('_matat_gallery_plugin', false);

?>

<section class="main">
    <div id="ri-grid" class="ri-grid ri-grid-size-2 ">
        <ul>
            <?php
            foreach ($img as $src) {
                ?>
                <li><a href="#"><img src="<?php echo wp_get_attachment_url($src); ?>" alt="SOGO Customers Logos" /></a></li>
                <?php
            }
            ?>
        </ul>
    </div>
    <?php
    $settings= get_option('_matat_gallery_plugin_settings');
    ?>
    <script>

        jQuery( '#ri-grid' ).gridrotator( {

            // up to 1024px
            rows			: 3,
            columns			: 7,

            w1024			: {
                rows	: <?php echo $settings['1024_row'] ?>,
                columns	: <?php echo $settings['1024_columns'] ?>
            },
            w768			: {
                rows	: 3,
                columns	: 3
            },

            w480			: {
                rows	: 2,
                columns	: 2
            },

            w320			: {
                rows	: 2,
                columns	: 2
            },

            w240			: {
                rows	: 2,
                columns	: 2
            },
            step			: 'random',
            maxStep			: 2,
            interval		: 1500

        } );

    </script>
    </section>
<?php
}
add_shortcode( 'My_Galerry', 'wpmatat_Animated_Image_Grid_shorcode' );

add_action('wp_ajax_matat_img_delete', 'matat_img_delete');

function matat_img_delete(){

   echo $id=$_POST['id'];

    $img = get_option('_matat_gallery_plugin', false);
    $img=array_diff($img, array($id));
    update_option('_matat_gallery_plugin',$img);

}



