<?php
global $editor_options, $meta_boxes, $meta_prefix;

$meta_boxes[] = array(
    'id'               => 'contact-title',
    'title'            => __( 'Contact Title', 'sogoc' ),
    'object_types'     => array( 'page' ), // These fields should be placed on the USER object.
    'show_on' => array('key' => 'page-template', 'value' => 'page-contact.php'),
    'show_names'       => true,
    'priority' => 'default',
    'fields'           => array(
        array(
            'name' => __('Contact Title','sogoc'),
            'id' => $meta_prefix . 'contact-title',
            'type' => 'text',
        ),
    )
);