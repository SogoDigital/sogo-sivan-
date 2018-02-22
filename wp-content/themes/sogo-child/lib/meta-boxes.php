<?php


function sogo_meta_box_all( array $meta_boxes = array() ) {
    global   $meta_boxes ;
    $sogo_includes = array();
    foreach (glob(dirname(__FILE__)."/metaboxes/*.php") as $filename) {
        $sogo_includes[] = "lib/metaboxes/".basename($filename);
    }
    // parent function.

    sogo_include($sogo_includes);
    return (array) $meta_boxes;
}

$meta_boxes[] = array(
    'id'               => 'sogo_home_meta_box_5',
    'title'            => __( 'Contact Map', 'sogoc' ),
    'object_types'     => array( 'page' ), // These fields should be placed on the USER object.
    'show_names'       => true,
    'show_on'      => array( 'key' => 'page-template', 'value' => 'page-contact.php' ),
    'context'       => 'normal',
    'priority' => 'default',
    'fields'           => array(
        array(
            'name' => __( 'parking first row title', 'sogoc' ),
            'id' => $prefix . 'parking_title',
            'type' => 'textarea'
        ),
        array(
            'name' => __( 'Parking Slider', 'sogoc' ),
            'id' => $prefix . 'parking_slider',
            'type' => 'file_list'
        ),
    )
);

add_filter( 'cmb2_meta_boxes', 'sogo_meta_box_all' );

