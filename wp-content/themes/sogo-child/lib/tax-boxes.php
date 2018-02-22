<?php
/*
Plugin Name: Demo Tax meta class
Plugin URI: http://en.bainternet.info
Description: Tax meta class usage demo
Version: 1.9.9
Author: Bainternet, Ohad Raz
Author URI: http://en.bainternet.info
*/

//include the main class file
$parent_dir = get_template_directory() . '/admin/tax-meta-class';
require_once($parent_dir . '/Tax-meta-class.php');
$path_url = get_template_directory_uri() . '/admin/tax-meta-class';


if (is_admin()) {
    /*
     * prefix of meta keys, optional
     */
    $prefix = '_sogo_';


    $config2 = array(
        'id' => 'events_meta_box_2',            // meta box id, unique per meta box
        'title' => 'Events Meta Box',            // meta box title
        'pages' => array('events-type'),          // taxonomy name, accept categories, post_tag and custom taxonomies
        'context' => 'normal',               // where the meta box appear: normal (default), advanced, side; optional
        'fields' => array(),                // list of meta fields (can be added by field arrays)
        'local_images' => false,              // Use local or hosted images (meta box images for add/remove)
        'use_with_theme' => $path_url          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
    );
    $my_meta2 = new Tax_Meta_Class($config2);
    $my_meta2->addImage($prefix . 'event-cat-image', array('name' => __('Event Cat Img', 'sogoc')));
    $my_meta2->Finish();
}
