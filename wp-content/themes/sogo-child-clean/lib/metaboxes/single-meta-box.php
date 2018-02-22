<?php
	global $editor_options, $meta_boxes, $meta_prefix;

	$meta_boxes[] = array(
		'id'           => 'sogo_single-article-slider',
		'title'        => __ ( 'Article Slider', 'sogoc' ),
		'object_types' => array( 'post' ), // These fields should be placed on the USER object.
		'show_names'   => true,
		'priority'     => 'default',
		'fields'       => array(
			array(
				'name' => __ ( 'Article Slider', 'sogoc' ),
				'id'   => $meta_prefix . 'article_slider',
				'type' => 'file_list',
			),
		)
	);

$meta_boxes[] = array(
    'id'           => 'sogo_single-business-info',
    'title'        => __ ( 'Single Business Info', 'sogoc' ),
    'object_types' => array( 'business' ), // These fields should be placed on the USER object.
    'show_names'   => true,
    'priority'     => 'default',
    'fields'       => array(
        array(
            'name' => __ ( 'Business Info', 'sogoc' ),
            'id'   => $meta_prefix . 'business_info',
            'type' => 'group',
            'options'     => array(
                'group_title'   => __ ( 'Image {#}', 'sogoc' ),
                'add_button'    => __ ( 'Add Another Image', 'sogoc' ),
                'remove_button' => __ ( 'Remove Image', 'sogoc' ),
                'sortable'      => true, // beta
            ),
            'fields' =>array(
                array(
                    'name' => __ ( 'Phone', 'sogoc' ),
                    'id'   => 'phone',
                    'type' => 'text',
                ),
                array(
                    'name' => __ ( 'WebSite URL', 'sogoc' ),
                    'id'   => 'website',
                    'type' => 'text_url',
                ),
                array(
                    'name' => __ ( 'Open Hours', 'sogoc' ),
                    'id'   => 'hours',
                    'type' => 'text',
                ),
                array(
                    'name' => __ ( 'Address', 'sogoc' ),
                    'id'   =>  'address',
                    'type' => 'textarea_small',
                ),
            )

        ),


    )
);


	$meta_boxes[] = array(
		'id'           => 'sogo_single-business-slider',
		'title'        => __ ( 'Business Slider', 'sogoc' ),
		'object_types' => array( 'business' ), // These fields should be placed on the USER object.
		'show_names'   => true,
		'priority'     => 'default',
		'fields'       => array(

			array(
				'name' => __ ( 'Slogan', 'sogoc' ),
				'id'   => $meta_prefix . 'slogan',
				'type' => 'text',
			),


			array(
				'name' => __ ( 'Video', 'sogoc' ),
				'id'   => $meta_prefix . 'video',
				'type' => 'oembed',
			),
			array(
				'name' => __ ( 'Map', 'sogoc' ),
				'id'   => $meta_prefix . 'map',
				'type' => 'textarea_code',
			),
			array(
				'name' => __ ( 'Business Slider', 'sogoc' ),
				'id'   => $meta_prefix . 'business_slider',
				'type' => 'file_list',
			),
		)
	);
	$meta_boxes[] = array(
		'id'           => 'sogo_single-events-slider',
		'title'        => __ ( 'Business Slider', 'sogoc' ),
		'object_types' => array( 'events' ), // These fields should be placed on the USER object.
		'show_names'   => true,
		'priority'     => 'default',
		'fields'       => array(
			array(
				'name' => __ ( 'Business Slider', 'sogoc' ),
				'id'   => $meta_prefix . 'events_slider',
				'type' => 'file_list',
			),
		)
	);