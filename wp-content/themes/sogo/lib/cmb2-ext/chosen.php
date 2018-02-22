<?php
	/*
	 * Plugin Name: CMB2 Custom Field Type - Autocomplete
	 * Description: Makes available an autocomplete custom field type.
	 * Author: johnsonpaul1014
	 * Version: 1.0.0
	 */
	/**
	 *
	 * It is a little complex but is very flexible, and it is a great option when you have
	 * way too many things to put in a select.
	 *
	 * It uses a hidden field for the CMB2 data, and puts the value from the input used for the
	 * autocomplete in the hidden field on blur of the autocomplete field so it always gets populated.
	 *
	 * There are two types available: options pre-built and one that uses a remote source.
	 * To use the first option, simply build it like a select with the standard CMB2 "options" argument.
	 * For a remote source, you will use the "source" argument that corresponds to an AJAX function.
	 * Then, you pass in a "matching_function" to look up the selected autocomplete value using the
	 * CMB2 field value.
	 *
	 * It can also be used as a repeatable field if a "repeatable_class" argument is passed when
	 * constructing the field. This argument is necessary to allow for mapping the autocomplete
	 * jQuery UI calls to the appropriate field.
	 *
	 * The example fields in this plugin demonstrate all types: pre-built single field,
	 * pre-built repeatable field, remote single field and remote repeatable field.
	 *
	 */
	/**
	 * Define the metabox and field configurations.
	 */

	function chosen_autoadd_scripts () {
		wp_enqueue_script ( 'jquery' );
		wp_enqueue_style ( 'chosen-css', get_template_directory_uri () . '/admin/js/chosen/chosen.css', false, '1.0.0' );
		wp_enqueue_script ( 'chosen-js', get_template_directory_uri () . '/admin/js/chosen/chosen.jquery.js', false,
			'1.0.0' );
		wp_enqueue_script ( 'chosen-t-js', get_template_directory_uri () . '/admin/js/chosen/chosen-init.js', false,
			'1.0.0' );
		wp_register_style ( 'jquery-ui-styles',
			'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css' );
		wp_enqueue_style ( 'jquery-ui-styles' );
		wp_enqueue_style ( 'sogo-admin-meta', get_template_directory_uri () . '/admin/css/admin.css' );

	}

	add_action ( 'admin_enqueue_scripts', 'chosen_autoadd_scripts' );
