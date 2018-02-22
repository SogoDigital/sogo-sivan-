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
    /*
     * configure your meta box
     */
    $config = array(
        'id' => 'product_meta_box',            // meta box id, unique per meta box
        'title' => 'Product Meta Box',            // meta box title
        'pages' => array('category'),          // taxonomy name, accept categories, post_tag and custom taxonomies
        'context' => 'normal',               // where the meta box appear: normal (default), advanced, side; optional
        'fields' => array(),                // list of meta fields (can be added by field arrays)
        'local_images' => false,              // Use local or hosted images (meta box images for add/remove)
        'use_with_theme' => $path_url          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
    );


    /*
     * Initiate your meta box
     */
    $my_meta = new Tax_Meta_Class($config);
    //	$my_meta->addCheckbox ( $prefix . 'hide_category', array( 'name' => __ ( 'Hide Category', 'sogoc' ) ) );

    //Image field
    $my_meta->addImage($prefix . 'feature_image', array('name' => __('Category Banner', 'sogoc')));
    $my_meta->addImage($prefix . 'bg_image', array('name' => __('Category Background Image', 'sogoc')));
    $my_meta->addImage($prefix . 'thumbnail', array('name' => __('Category thumbnail Image', 'sogoc')));
    $my_meta->addText($prefix . 'top-advertising-by-cat', array('name' => __('Top Banner ID On Category', 'sogoc')));
    $my_meta->addText($prefix . 'roof_title', array('name' => __('Roof Title', 'sogoc')));
    $my_meta->addColor($prefix . 'color_picker', array('name' => __('Color Picker', 'sogoc')));

//		$my_meta->addSelect ( $prefix . 'color',
//			array(
//				'bc-light-blue'  => 'light-blue',
//				'bc-dark-blue'   => 'dark-blue',
//				'bc-dark-green'  => 'dark-green',
//				'bc-light-green' => 'light-green',
//				'bc-orange'      => 'orange',
//				'bc-purple'      => 'purple',
//
//
//			),
//			array( 'name' => __ ( 'Category Class', 'sogoc' ) ) );
//		set sub category of main cat

    $term_id = (isset($_GET['tag_ID'])) ? $_GET['tag_ID'] : '';

    $my_meta->addText($prefix . 'short-cat-name', array('name' => __('Short Category Name', 'sogoc')));
    $my_meta->addCheckbox($prefix . 'show_bubble', array('name' => __('Show Comments Bubble?', 'sogoc')));
    for ($i = 1; $i < 4; $i++):
        $my_meta->addTaxonomy(
            $prefix . 'main_category_section_' . $i,
            array(
                'show_option_all' => 'asdfasdf',
                'taxonomy' => 'category',
                'type' => 'select',
                'args' => array('parent' => $term_id
                )),
            array('name' => __('Sub Cat', 'sogoc')));

    endfor;
    $my_meta->addCheckbox($prefix . 'is_city', array('name' => __('city?', 'sogoc')));
    //if ( 'on' === get_tax_meta ( $term_id, $prefix . 'is_city', true ) ) {
    $my_meta->addText($prefix . 'mayor', array('name' => __('Mayor', 'sogoc')));
    $my_meta->addImage($prefix . 'logo', array('name' => __('City Logo', 'sogoc')));
    $my_meta->addImage($prefix . 'city-image', array('name' => __('City Image', 'sogoc')));
    $my_meta->addText($prefix . 'county', array('name' => __('County', 'sogoc')));
    $my_meta->addText($prefix . 'foundation-date', array('name' => __('Foundation Date', 'sogoc')));
    $my_meta->addText($prefix . 'website', array('name' => __('Website', 'sogoc')));
    $my_meta->addTextarea($prefix . 'city-map', array('name' => __('City Map', 'sogoc')));
    $my_meta->addtext($prefix . 'service-link', array('name' => __('Service link', 'sogoc')));
    $my_meta->addText($prefix . 'info-link', array('name' => __('Information Link', 'sogoc')));
    //}


    /*
     * Don't Forget to Close up the meta box decleration
     */
    //Finish Meta Box Decleration
    $my_meta->Finish();

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
