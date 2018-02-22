<?php
global $editor_options, $meta_boxes, $meta_prefix;

$meta_boxes[] = array(
        'id'               => 'sogo_naim_links_meta_box_1',
        'title'            => __( 'Second Title', 'sogoc' ),
        'object_types'     => array( 'naim-links' ), // These fields should be placed on the USER object.
        'show_names'       => true,
        'priority' => 'default',
        'fields'           => array(
            array(
                'name' => __('Second Title','sogoc'),
                'id' => $meta_prefix . 'title_2',
                'type' => 'text',

            ),
            array(
                'name' => __('Link','sogoc'),
                'id' => $meta_prefix . 'link',
                'type' => 'text_url',

            ),


        )
    );






