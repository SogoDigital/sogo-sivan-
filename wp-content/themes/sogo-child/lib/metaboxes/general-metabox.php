<?php


global $editor_options, $meta_boxes, $meta_prefix;


/* section 1*/
$meta_boxes[] = array(
    'id' => 'sogo_general_1',
    'title' => __('Page Settings', 'sogoc'),
    'object_types' => array('page'), // These fields should be placed on the USER object.
    'show_names' => true,
    'context' => 'side',
    'priority' => 'default',
    'fields' => array(
        array(
            'name' => __('Disable FullPage','sogoc'),
            'id' => $meta_prefix . 'disable_fullpage',
            'type' => 'checkbox',
        ),

    )
);
