<?php
global $editor_options, $meta_boxes, $meta_prefix;

$meta_boxes[] = array(
    'id'               => 'sogo_post_meta_box_1',
    'title'            => __( 'Daily Image Settings', 'sogoc' ),
    'object_types'     => array( 'post' ), // These fields should be placed on the USER object.
    'show_names'       => true,
    'priority' => 'default',
    'fields'           => array(
        array(
            'name' => __('Roof Title','sogoc'),
            'id' => $meta_prefix . 'roof',
            'type' => 'text',
        ),
      array(
        'name' => __('Credit','sogoc'),
        'id' => $meta_prefix . 'credit',
        'type' => 'text',
      ),
      array(
        'name' => __('Author Request To show on Home page','sogoc'),
        'id' => $meta_prefix . 'post_country_wide',
        'type' => 'checkbox',
      ),


    )
);



$meta_boxes[] = array(
    'id'               => 'sogo_post_meta_box_111',
    'title'            => __( 'Daily Image Settings', 'sogoc' ),
    'object_types'     => array( 'page' ), // These fields should be placed on the USER object.
    'show_on'      => array( 'key' => 'page-template', 'value' => 'page-mivzakim.php' ),
    'show_names'       => true,
    'priority' => 'default',
    'fields'           => array(
        array(
            'name' => 'Select Mivzakim Category',
            'id' => $meta_prefix . 'show_cats',
            'taxonomy' => 'category', //Enter Taxonomy Slug
            'type' => 'multicheck',
            'options' => cmb2_get_term_options('category'),
            'before_row' => '<div class="flex-item flex-5 ">', // callback
            'after_row' => '</div>',
        ),



    )
);


