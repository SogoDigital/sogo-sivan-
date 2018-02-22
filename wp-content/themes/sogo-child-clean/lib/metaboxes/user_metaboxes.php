<?php
	global $editor_options, $meta_boxes, $meta_prefix;

	$user_cats = array();
	$user_id = isset( $_GET[ 'user_id' ] ) ? $_GET[ 'user_id' ] : get_current_user_id ();

	$user_cats = get_user_meta ( $user_id, '_sogo_allowed_cats', true );


	$meta_boxes[] = array(
		'id'               => 'sogo_birthday_meta_box_1',
		'title'            => __ ( 'Birthday Day', 'sogoc' ),
		'object_types'     => array( 'user' ), // These fields should be placed on the USER object.
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
		'fields'           => array(

			array(
				'name'     => __ ( 'Tz', 'sogoc' ),
				'id'       => $meta_prefix . 'tz',
				'type'     => 'text',
			),
			array(
				'name'     => __ ( 'Address', 'sogoc' ),
				'id'       => $meta_prefix . 'address',
				'type'     => 'textarea',
			),
			array(
				'name'     => __ ( 'Phone', 'sogoc' ),
				'id'       => $meta_prefix . 'phone',
				'type'     => 'text',
			),
			array(
				'name'     => __ ( 'Select Taxonomy', 'sogoc' ),
//        'desc'     => 'Description Goes Here',
				'id'       => $meta_prefix . 'allowed_cats',
				'taxonomy' => 'category', //Enter Taxonomy Slug
				'type'     => 'multicheck',
				'options'  => cmb2_get_term_options ( 'category' )
			),

		)
	);






