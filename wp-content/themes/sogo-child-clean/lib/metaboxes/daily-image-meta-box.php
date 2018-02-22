<?php
	global $editor_options, $meta_boxes, $meta_prefix;

	$meta_boxes[] = array(
		'id'           => 'sogo_daily-image_strip_meta_box_1',
		'title'        => __ ( 'Daily Image Settings', 'sogoc' ),
		'object_types' => array( 'daily-image' ), // These fields should be placed on the USER object.
		'show_names'   => true,
		'priority'     => 'default',
		'fields'       => array(
			array(
				'name' => __ ( 'Gallery', 'sogoc' ),
				'id'   => $meta_prefix . 'gallery',
				'type' => 'group',
				'options'     => array(
					'group_title'   => __ ( 'Image {#}', 'sogoc' ),
					'add_button'    => __ ( 'Add Another Image', 'sogoc' ),
					'remove_button' => __ ( 'Remove Image', 'sogoc' ),
					'sortable'      => true, // beta
				),
				'fields' =>array(
					array(
						'name' => __ ( 'Image', 'sogoc' ),
						'id'   => 'image',
						'type' => 'file',
					),
					array(
						'name' => __ ( 'URL', 'sogoc' ),
						'id'   => 'url',
						'type' => 'text_url',
					),
                    array(
                        'name' => __ ( 'New Window', 'sogoc' ),
                        'id'   => 'new-window',
                        'type' => 'checkbox',
                    ),

				)

			),


		)
	);








