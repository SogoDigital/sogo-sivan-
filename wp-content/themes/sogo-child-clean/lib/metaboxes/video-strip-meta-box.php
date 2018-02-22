<?php
global $editor_options, $meta_boxes, $meta_prefix;

$meta_boxes[] = array(
        'id'               => 'sogo_video_strip_meta_box_1',
        'title'            => __( 'Video Settings', 'sogoc' ),
        'object_types'     => array( 'video-strip' ), // These fields should be placed on the USER object.
        'show_names'       => true,
        'priority' => 'default',
        'fields'           => array(
            array(
                'name' => __('Video','sogoc'),
                'id' => $meta_prefix . 'video',
                'type' => 'oembed',
            ),
            array(
                'name' => __('URL','sogoc'),
                'id' => $meta_prefix . 'url',
                'type' => 'text_url',
            ),

        )
    );

$meta_boxes[] = array(
    'id'               => 'sogo_video_strip_meta_box_2',
    'title'            => __( 'Video Settings', 'sogoc' ),
    'object_types'     => array( 'post' ), // These fields should be placed on the USER object.
    'show_on'          => array('key'=> 'post_format', 'value'=> 'video'),
    'show_names'       => true,
    'priority' => 'default',
    'fields'           => array(
        array(
            'name' => __('Video','sogoc'),
            'id' => $meta_prefix . 'video',
            'type' => 'oembed',
        ),
        array(
            'name' => __('URL','sogoc'),
            'id' => $meta_prefix . 'url',
            'type' => 'text_url',
        ),

    )
);







