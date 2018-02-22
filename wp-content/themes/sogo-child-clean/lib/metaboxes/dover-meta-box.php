<?php
	global $editor_options, $meta_boxes, $meta_prefix;

	/**
	 * Register the form and fields for our front-end submission form
	 */


	$user_cats = get_user_meta ( get_current_user_id (), '_sogo_allowed_cats', true );

	$meta_boxes[] = array(
		'id'           => 'dover_metabox',
		'object_types' => array( 'page' ),
		'hookup'       => false,
		'save_fields'  => false,
		'fields'       => array(
			array(
				'name'    => __ ( 'Post Type', 'sogoc' ),
				'id'      => 'submitted_post_type',
				'type'    => 'select',
				'options'    =>array(
					'post'=> __('post', 'sogoc'),
					'events'=> __('events', 'sogoc'),
				),
			),
			array(
				'name'    => __ ( 'Post Title, Of your choose, Mandatory field', 'sogoc' ),
				'id'      => 'submitted_post_title',
				'type'    => 'text',
				'desc'    => __ ( 'Kfar Saaba, this is the title', 'sogoc' ),
			),
			array(
				'name'    => __ ( 'Recommended Post Title, Name of city will appear automatically', 'sogoc' ),
				'id'      => 'submitted_post_recommended_title',
				'type'    => 'title',
			),
			array(
				'name'    => __ ( 'Key words for google, as default by category name', 'sogoc' ),
				'id'      => 'submitted_post_google_key_words',
				'type'    => 'text',
			),
			array(
				'name'    => __ ( 'Article Excerpt, Mandatory Field', 'sogoc' ),
				'id'      => 'submitted_post_excerpt',
				'type'    => 'textarea',
			),
			array(
				'name'    => __ ( 'Roof Title, Not Mandatory', 'sogoc' ),
				'id'      => $meta_prefix . 'roof',
				'type'    => 'text',
			),
			array(
				'name'    => __ ( 'insert the content of the article, mandatory field', 'sogoc' ),
				'id'      => 'submitted_post_content',
				'type'    => 'wysiwyg',
				'options' => array(
					'textarea_rows' => 12,
					'media_buttons' => false,
				),
			),


			array(
				'name' => __ ( 'Post Country wide', 'sogoc' ),
//        'desc' => 'field description (optional)',
				'id'   => $meta_prefix.'post_country_wide',
				'type' => 'checkbox'
			),
			array(
				'name'     => __ ( 'Select Taxonomy', 'sogoc' ),
//        'desc'     => 'Description Goes Here',
				'id'       => 'submitted_post_category_select',
				'taxonomy' => 'category', //Enter Taxonomy Slug
				'type'     => 'select',
				'options'  => cmb2_get_term_options ( 'category', array( 'include' => (array)$user_cats ) )
			),

			array(
				'name'       => __ ( 'I agree i have read the terms of use', 'sogoc' ),
				'id'         => 'submitted_post_terms_of_use',
				'type'       => 'checkbox',
				'attributes' => array(
					'placeholder' => '',
					'required'    => 'required',
				),
			),
			array(
				'name'       => __ ( 'Featured Image for New Post', 'wds-post-submit' ),
				'id'         => 'submitted_post_thumbnail',
				'type'       => 'text',
				'attributes' => array(
					'type' => 'file', // Let's use a standard file upload field
				)
			),
			array(
				'name' => __ ( 'Gallery Image  ', 'wds-post-submit' ),
				'id'   => $meta_prefix .'article_slider',
				'type' => 'file_list',

			)

		)
	);


	function wds_frontend_form_register () {


		$cmb = new_cmb2_box ( array(
			'id'           => 'dover_metabox',
			'object_types' => array( 'page' ),
			'hookup'       => false,
			'save_fields'  => false,
		) );

//    $cmb->add_field( array(
//        'name' => __('Post Title, Of your choose, Mandatory field','sogoc'),
//        'id'      => 'submitted_post_title',
//        'type'    => 'text',
//        'default' => __( 'Title', 'sogoc' ),
//    ) );

//    $cmb->add_field( array(
//        'name' => __('Recommended Post Title, Name of city will appear automatically','sogoc'),
//        'id'      => 'submitted_post_recommended_title',
//        'type'    => 'text',
//        'default' => __( 'Title Description', 'sogoc' ),
//    ) );
//    $cmb->add_field( array(
//        'name' => __('Key words for google, as default by category name','sogoc'),
//        'id'      => 'submitted_post_google_key_words',
//        'type'    => 'text',
//        'default' => __( 'City Hall Kfar-Saba, Kfar-Saba ', 'sogoc' ),
//    ) );
//    $cmb->add_field( array(
//        'name' => __('Article Excerpt, Mandatory Field','sogoc'),
//        'id'      => 'submitted_post_excerpt',
//        'type'    => 'textarea',
//        'default' => __( 'Article Excerpt', 'sogoc' ),
//    ) );
//    $cmb->add_field( array(
//        'name' => __('Roof Title, Not Mandatory','sogoc'),
//        'id'      => 'submitted_post_roof_title',
//        'type'    => 'text',
//        'default' => __( 'Roof Title', 'sogoc' ),
//    ) );

//    $cmb->add_field( array(
//        'name'    => __( 'insert the content of the article, mandatory field', 'sogoc' ),
//        'id'      => 'submitted_post_content',
//        'type'    => 'wysiwyg',
//        'options' => array(
//            'textarea_rows' => 12,
//            'media_buttons' => false,
//        ),
//    ) );

//    $cmb->add_field( array(
//        'name' => __('Date For Start Time','sogoc'),
//        'id'      => 'submitted_post_date',
//        'type'    => 'text_date_timestamp',
//    ) );
//    $cmb->add_field( array(
//        'name'    => __('Test Multi Checkbox', 'sogoc'),
////        'desc'    => 'field description (optional)',
//        'id'      => 'submitted_post_location',
//        'type'    => 'multicheck',
//        'options' => array(
//            'check1' => __( 'Main Article - Top Part', 'sogoc') ,
//            'check2' => __( 'Article in Category', 'sogoc' ),
//            'check3' => __( 'Excerpt Article in 6 squares of sub-category', 'sogoc' ),
//        )
//    ) );
//    $cmb->add_field( array(
//        'name' => __('Save as draft, dont show article', 'sogoc'),
////        'desc' => 'field description (optional)',
//        'id'   => 'submitted_post_hide_post',
//        'type' => 'checkbox'
//    ) );

		// $cmb->add_field( array(
//        'name' => __('Post Country wide', 'sogoc'),
////        'desc' => 'field description (optional)',
//        'id'   => 'submitted_post_country_wide',
//        'type' => 'checkbox'
//    ) );

//    $cmb->add_field( array(
//        'name'     => __('Select Taxonomy', 'sogoc'),
////        'desc'     => 'Description Goes Here',
//        'id'       => 'submitted_post_category_select',
//        'taxonomy' => 'category', //Enter Taxonomy Slug
//        'type'     => 'taxonomy_select',
//    ) );
//    $cmb->add_field( array(
//        'name'     => __('Select Sub Taxonomy', 'sogoc'),
////        'desc'     => 'Description Goes Here',
//        'id'       => 'submitted_post_sub_category_select',
//        'taxonomy' => 'category', //Enter Taxonomy Slug
//        'type'     => 'taxonomy_select',
//    ) );

//    $cmb->add_field( array(
//        'name'        => __('I agree i have read the terms of use', 'sogoc'),
//        'id'          => 'submitted_post_terms_of_use',
//        'type'        => 'checkbox',
//        'attributes'  => array(
//            'placeholder' => '',
//            'required'    => 'required',
//        ),
//    ) );


//    $cmb->add_field( array(
//        'name'       => __( 'Featured Image for New Post', 'wds-post-submit' ),
//        'id'         => 'submitted_post_thumbnail',
//        'type'       => 'text',
//        'attributes' => array(
//            'type' => 'file', // Let's use a standard file upload field
//        ),
//    ) );
//
//    $cmb->add_field( array(
//        'name' => __( 'Your Name', 'wds-post-submit' ),
//        'desc' => __( 'Please enter your name for author credit on the new post.', 'wds-post-submit' ),
//        'id'   => 'submitted_author_name',
//        'type' => 'text',
//    ) );
//
//    $cmb->add_field( array(
//        'name' => __( 'Your Email', 'wds-post-submit' ),
//        'desc' => __( 'Please enter your email so we can contact you if we use your post.', 'wds-post-submit' ),
//        'id'   => 'submitted_author_email',
//        'type' => 'text_email',
//    ) );

	}

//add_action( 'cmb2_init', 'wds_frontend_form_register' );

	/**
	 * Register the form and fields for our front-end submission form
	 *
	 * /**
	 * Gets the front-end-post-form cmb instance
	 *
	 * @return CMB2 object
	 */
	function wds_frontend_cmb2_get () {
		// Use ID of metabox in wds_frontend_form_register
		$metabox_id = 'dover_metabox';
		// Post/object ID is not applicable since we're using this form for submission
		$object_id = 'dover_metabox';

		// Get CMB2 metabox object
		return cmb2_get_metabox ( $metabox_id, $object_id );
	}

	/**
	 * Handle the cmb-frontend-form shortcode
	 *
	 * @param  array $atts Array of shortcode attributes
	 * @return string       Form html
	 */
	function wds_do_frontend_form_submission_shortcode ( $atts = array() ) {

		// Get CMB2 metabox object
		$cmb = wds_frontend_cmb2_get ();
		// Get $cmb object_types
		//   $post_types = $cmb->prop( 'object_types' );
		// Current user
		$user_id = get_current_user_id ();
		// Parse attributes
		$atts = shortcode_atts ( array(
			'post_author' => $user_id ? $user_id : 1, // Current user, or admin
			'post_status' => 'pending',
			'post_type'   => 'page', // Only use first object_type in array
		), $atts, 'cmb-frontend-form' );
		/*
		 * Let's add these attributes as hidden fields to our cmb form
		 * so that they will be passed through to our form submission
		 */
		foreach ( $atts as $key => $value ) {
			$cmb->add_hidden_field ( array(
				'field_args' => array(
					'id'      => "atts[$key]",
					'type'    => 'hidden',
					'default' => $value,
				),
			) );
		}
		// Initiate our output variable
		$output = '';
		// Get any submission errors
		if ( ( $error = $cmb->prop ( 'submission_error' ) ) && is_wp_error ( $error ) ) {
			// If there was an error with the submission, add it to our ouput.
			$output .= '<h3>' . sprintf ( __ ( 'There was an error in the submission: %s', 'wds-post-submit' ),
					'<strong>' . $error->get_error_message () . '</strong>' ) . '</h3>';
		}
		// If the post was submitted successfully, notify the user.
		if ( isset( $_GET[ 'post_submitted' ] ) && ( $post = get_post ( absint ( $_GET[ 'post_submitted' ] ) ) ) ) {
			// Get submitter's name
			$name = get_post_meta ( $post->ID, 'submitted_author_name', 1 );
			$name = $name ? ' ' . $name : '';
			// Add notice of submission to our output
			$output .= '<h3>' . sprintf ( __ ( 'Thank you%s, your new post has been submitted and is pending review by a site administrator.',
					'wds-post-submit' ), esc_html ( $name ) ) . '</h3>';
		}
		// Get our form
		$output .= cmb2_get_metabox_form ( $cmb, 'fake-oject-id',
			array( 'save_button' => __ ( 'Submit Post', 'wds-post-submit' ) ) );

		return $output;
	}

//	add_shortcode ( 'cmb-frontend-form', 'wds_do_frontend_form_submission_shortcode' );
	/**
	 * Handles form submission on save. Redirects if save is successful, otherwise sets an error message as a cmb property
	 *
	 * @return void
	 */
	function wds_handle_frontend_new_post_form_submission () {
		// If no form submission, bail
		if ( empty( $_POST ) || !isset( $_POST[ 'submit-cmb' ], $_POST[ 'object_id' ] ) ) {
			return false;
		}
		// Get CMB2 metabox object
		$cmb = wds_frontend_cmb2_get ();

		$post_data = array();
		// Get our shortcode attributes and set them as our initial post_data args
		if ( isset( $_POST[ 'atts' ] ) ) {
			foreach ( (array)$_POST[ 'atts' ] as $key => $value ) {
				$post_data[ $key ] = sanitize_text_field ( $value );
			}
			unset( $_POST[ 'atts' ] );
		}
		// Check security nonce
		if ( !isset( $_POST[ $cmb->nonce () ] ) || !wp_verify_nonce ( $_POST[ $cmb->nonce () ], $cmb->nonce () ) ) {
			return $cmb->prop ( 'submission_error', new WP_Error( 'security_fail', __ ( 'Security check failed.' ) ) );
		}
		// Check title submitted
		if ( empty( $_POST[ 'submitted_post_title' ] ) ) {
			return $cmb->prop ( 'submission_error',
				new WP_Error( 'post_data_missing', __ ( 'New post requires a title.' ) ) );
		}
		// And that the title is not the default title
		if ( $cmb->get_field ( 'submitted_post_title' )->default () == $_POST[ 'submitted_post_title' ] ) {
			return $cmb->prop ( 'submission_error', new WP_Error( 'post_data_missing', __ ( 'Please enter a new title.' ) ) );
		}
		/**
		 * Fetch sanitized values
		 */
		$sanitized_values = $cmb->get_sanitized_values ( $_POST );

		// Set our post data arguments
		$category  = get_category($sanitized_values[ 'submitted_post_category_select' ] );
		if(!is_wp_error($category)){
			$title = $category->name . ": ". $sanitized_values[ 'submitted_post_title' ];
		}else{
			$title = $sanitized_values[ 'submitted_post_title' ];
		}
		$post_data[ 'post_title' ] = $title;
		unset( $sanitized_values[ 'submitted_post_title' ] );
		$post_data[ 'post_content' ] = $sanitized_values[ 'submitted_post_content' ];
		$post_data[ 'post_excerpt' ] = $sanitized_values[ 'submitted_post_excerpt' ];
		$post_data[ 'post_type' ] = $sanitized_values[ 'submitted_post_type' ];

		unset( $sanitized_values[ 'submitted_post_content' ] );
		// Create the new post
		$new_submission_id = wp_insert_post ( $post_data, true );

		// If we hit a snag, update the user
		if ( is_wp_error ( $new_submission_id ) ) {
			return $cmb->prop ( 'submission_error', $new_submission_id );
		}

		// save category
		wp_set_post_categories ( $new_submission_id, $sanitized_values[ 'submitted_post_category_select' ] );


	//	$gallery_ids = array_keys ($sanitized_values['_sogo_article_slider']);
//		update_post_meta ( $new_submission_id, '_sogo_article_slider', $gallery_ids );
		/**
		 * Other than post_type and post_status, we want
		 * our uploaded attachment post to have the same post-data
		 */
		unset( $post_data[ 'post_type' ] );
		unset( $post_data[ 'post_status' ] );
		unset( $post_data[ 'post_content' ] );
		unset( $post_data[ 'post_excerpt' ] );
	//	unset( $post_data[ '_sogo_article_slider' ] );
		// Try to upload the featured image
		$img_id = wds_frontend_form_photo_upload ( $new_submission_id, $post_data );
		// If our photo upload was successful, set the featured image
		if ( $img_id && !is_wp_error ( $img_id ) ) {
			set_post_thumbnail ( $new_submission_id, $img_id );
		}

		// manage gallery upload
		//$ids = \sogo\helper::manage_media_upload('_sogo_post_images',$new_submission_id);
	//	if($ids){
	//		update_post_meta($new_submission_id,'_sogo_post_images',implode(',', (array)$ids));
	//	}


		// Loop through remaining (sanitized) data, and save to post-meta
		foreach ( $sanitized_values as $key => $value ) {

			if ( is_array ( $value ) ) {
				$value = array_filter ( $value );
				if ( !empty( $value ) ) {

					update_post_meta ( $new_submission_id, $key, $value );
				}
			} else {
				update_post_meta ( $new_submission_id, $key, $value );
			}
		}
		/*
		 * Redirect back to the form page with a query variable with the new post ID.
		 * This will help double-submissions with browser refreshes
		 */
		wp_redirect ( esc_url_raw ( add_query_arg ( 'post_submitted', $new_submission_id ) ) );
		exit;
	}

	add_action ( 'cmb2_after_init', 'wds_handle_frontend_new_post_form_submission' );
	/**
	 * Handles uploading a file to a WordPress post
	 *
	 * @param  int $post_id                Post ID to upload the photo to
	 * @param  array $attachment_post_data Attachement post-data array
	 */
	function wds_frontend_form_photo_upload ( $post_id, $attachment_post_data = array(),
	                                          $input_name = 'submitted_post_thumbnail' ) {
		// Make sure the right files were submitted
		if (
			empty( $_FILES )
			|| !isset( $_FILES[ $input_name ] )
			|| isset( $_FILES[ $input_name ][ 'error' ] ) && 0 !== $_FILES[ $input_name ][ 'error' ]
		) {
			return;
		}
		// Filter out empty array values
		$files = array_filter ( $_FILES[ $input_name ] );
		// Make sure files were submitted at all
		if ( empty( $files ) ) {
			return;
		}
		// Make sure to include the WordPress media uploader API if it's not (front-end)
		if ( !function_exists ( 'media_handle_upload' ) ) {
			require_once ( ABSPATH . 'wp-admin/includes/image.php' );
			require_once ( ABSPATH . 'wp-admin/includes/file.php' );
			require_once ( ABSPATH . 'wp-admin/includes/media.php' );
		}

		// Upload the file and send back the attachment post ID
		return media_handle_upload ( $input_name, $post_id, $attachment_post_data );
	}