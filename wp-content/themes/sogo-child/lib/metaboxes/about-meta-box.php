<?php


global $editor_options, $meta_boxes, $meta_prefix;


/* section 1*/
$meta_boxes[] = array(
    'id' => 'sogo_about_meta_box_1',
    'title' => __('Section 1', 'sogoc'),
    'object_types' => array('page'), // These fields should be placed on the USER object.
    'show_names' => true,
    'show_on' => array('key' => 'page-template', 'value' => 'page-about.php'),
    'context' => 'normal',
    'priority' => 'default',
    'fields' => array(
        array(
            'name' => 'Sub Title',
            'id' => $meta_prefix . 'sub_title',
            'type' => 'textarea',
        ),
    )
);

// section 2
$meta_boxes[] = array(
    'id' => 'sogo_about_meta_box_2',
    'title' => __('Section 1', 'sogoc'),
    'object_types' => array('page'), // These fields should be placed on the USER object.
    'show_names' => true,
    'show_on' => array('key' => 'page-template', 'value' => 'page-about.php'),
    'context' => 'normal',
    'priority' => 'default',
    'fields' => array(
        array(
            'name' => 'Left Title',
            'id' => $meta_prefix . 'left_title',
            'type' => 'text',
        ),
        array(
            'name' => 'Left Text',
            'id' => $meta_prefix . 'left_text',
            'type' => 'wysiwyg',
        ),
        array(
            'name' => 'Right Title',
            'id' => $meta_prefix . 'right_title',
            'type' => 'text',
        ),
        array(
            'name' => 'Right Text',
            'id' => $meta_prefix . 'right_text',
            'type' => 'group',
            'options' => array(
                'group_title' => __('Entry {#}', 'cmb2'), // {#} gets replaced by row number
                'add_button' => __('Add Another Entry', 'cmb2'),
                'remove_button' => __('Remove Entry', 'cmb2'),
                'sortable' => true, // beta
            ),
            'fields' => array(
                array(
                    'name' => 'Icon',
                    'id' => 'icon',
                    'type' => 'file',
                ),
                array(
                    'name' => 'Title',
                    'id' => 'title',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Text',
                    'id' => 'text',
                    'type' => 'text',
                ),
            )
        ),
    )
);


// section 3 (employees)
$meta_boxes[] = array(
    'id' => 'sogo_about_meta_box_3',
    'title' => __('Section 3 (employees)', 'sogoc'),
    'object_types' => array('page'), // These fields should be placed on the USER object.
    'show_names' => true,
    'show_on' => array('key' => 'page-template', 'value' => 'page-about.php'),
    'context' => 'normal',
    'priority' => 'default',
    'fields' => array(
        array(
            'name' => 'Title',
            'id' => $meta_prefix . 'section_3_title',
            'type' => 'text',
        ),
        array(
            'name' => 'Text',
            'id' => $meta_prefix . 'section_3_text',
            'type' => 'textarea',
        ),

        array(
            'name' => 'Team',
            'id' => $meta_prefix . 'team',
            'type' => 'group',
            'options' => array(
                'group_title' => __('Member {#}', 'sogoc'), // {#} gets replaced by row number
                'add_button' => __('Add Another Member', 'sogoc'),
                'remove_button' => __('Remove Member', 'sogoc'),
                'sortable' => true, // beta
            ),
            'fields' => array(
                array(
                    'name' => 'avatar',
                    'id' => 'avatar',
                    'type' => 'file',
                ),
                array(
                    'name' => 'Name',
                    'id' => 'name',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Job Title',
                    'id' => 'job_title',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Description',
                    'id' => 'description',
                    'type' => 'textarea',
                ),
            )
        ),
    )
);

// section 4 (testimonials)
$meta_boxes[] = array(
    'id' => 'sogo_about_meta_box_4',
    'title' => __('Section 4 (testimonials)', 'sogoc'),
    'object_types' => array('page'), // These fields should be placed on the USER object.
    'show_names' => true,
    'show_on' => array('key' => 'page-template', 'value' => 'page-about.php'),
    'context' => 'normal',
    'priority' => 'default',
    'fields' => array(
        array(
            'name' => 'Title',
            'id' => $meta_prefix . 'section_4_title',
            'type' => 'text',
        ),
        array(
            'name' => 'Text',
            'id' => $meta_prefix . 'section_4_text',
            'type' => 'textarea',
        ),

        array(
            'name' => 'testimonials',
            'id' => $meta_prefix . 'testimonials',
            'type' => 'group',
            'options' => array(
                'group_title' => __('testimonial {#}', 'sogoc'), // {#} gets replaced by row number
                'add_button' => __('Add Another testimonial', 'sogoc'),
                'remove_button' => __('Remove testimonial', 'sogoc'),
                'sortable' => true, // beta
            ),
            'fields' => array(
                array(
                    'name' => 'avatar',
                    'id' => 'avatar',
                    'type' => 'file',
                ),
                array(
                    'name' => 'Name',
                    'id' => 'name',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Company',
                    'id' => 'company',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Job Title',
                    'id' => 'job_title',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Description',
                    'id' => 'description',
                    'type' => 'textarea',
                ),
            )
        ),
    )
);
// section 5 (Customers)
$meta_boxes[] = array(
    'id' => 'sogo_about_meta_box_5',
    'title' => __('Section 5 (customers)', 'sogoc'),
    'object_types' => array('page'), // These fields should be placed on the USER object.
    'show_names' => true,
    'show_on' => array('key' => 'page-template', 'value' => 'page-about.php'),
    'context' => 'normal',
    'priority' => 'default',
    'fields' => array(
        array(
            'name' => 'Title',
            'id' => $meta_prefix . 'section_5_title',
            'type' => 'text',
        ),

        array(
            'name' => 'logos',
            'id' => $meta_prefix . 'logos',
            'type' => 'file_list',
        ),

    )
);