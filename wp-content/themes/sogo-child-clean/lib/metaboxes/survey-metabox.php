<?php
	global $editor_options, $meta_boxes, $meta_prefix;
	$meta_boxes[] = array(
		'id'           => 'sogo_survey_meta_box_1',
		'title'        => __ ( 'Title', 'sogoc' ),
		'object_types' => array( 'surveys' ), // These fields should be placed on the USER object.
		'show_names'   => true,
		'context'      => 'normal',
		'priority'     => 'default',
		'fields'       => array(
			array(
				'name' => 'End Date',
				'id'   => $meta_prefix . 'end_date',
				'type' => 'text_datetime_timestamp',
				'date_format' => __( 'd-m-Y', 'cmb2' ), // use European date format
			),
			array(
				'id'   => $meta_prefix . 'votes',
				'type'        => 'group',
				'description' => __ ( 'Votes', 'sogoc' ),
				'options'     => array(
					'group_title'   => __ ( 'Vote {#}', 'sogoc' ),
					'add_button'    => __ ( 'Add Another Entry', 'sogoc' ),
					'remove_button' => __ ( 'Remove Entry', 'sogoc' ),
					'sortable'      => true, // beta
				),
					'fields' => array(
						array(
							'name' => __('Image', 'sogoc'),
							'id'   => 'image',
							'type' => 'file'
						),
						array(
							'name' => __('Text', 'sogoc'),
							'id'   => 'txt',
							'type' => 'text'
						),
						array(
							'name' => __('Vote', 'sogoc'),
							'id'   => 'vote',
							'type' => 'text',
							'default'=> '0'
						)

				),
			)

		)
	);