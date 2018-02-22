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
add_filter( 'cmb2_meta_boxes', 'sogo_meta_box_all' );

