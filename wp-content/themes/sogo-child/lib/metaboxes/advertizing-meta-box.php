<?php


global $editor_options, $meta_boxes, $meta_prefix;


/* section 1*/
$meta_boxes[] = array(
    'id' => 'sogo_advertising_meta_box_1',
    'title' => __('Section 1', 'sogoc'),
    'object_types' => array('page'), // These fields should be placed on the USER object.
    'show_names' => true,
    'show_on' => array('key' => 'page-template', 'value' => 'page-advertaizing.php'),
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


$meta_boxes[] = array(
    'id' => 'sogo_advertising_meta_box_2' ,
    'title' => __('Section 2', 'sogoc'),
    'object_types' => array('page'), // These fields should be placed on the USER object.
    'show_names' => true,
    'show_on' => array('key' => 'page-template', 'value' => 'page-advertaizing.php'),
    'context' => 'normal',
    'priority' => 'default',
    'fields' => array(
        array(
            'name' => 'Title',
            'id' => $meta_prefix . "section-2-title",
            'type' => 'text',
        ),
        array(
            'name' => 'Text',
            'id' => $meta_prefix . "section-2-text",
            'type' => 'textarea',
        ),
    )
);
$meta_boxes[] = array(
    'id' => 'sogo_advertising_meta_box_3' ,
    'title' => __('Section 3', 'sogoc'),
    'object_types' => array('page'), // These fields should be placed on the USER object.
    'show_names' => true,
    'show_on' => array('key' => 'page-template', 'value' => 'page-advertaizing.php'),
    'context' => 'normal',
    'priority' => 'default',
    'fields' => array(
        array(
            'name' => 'Title',
            'id' => $meta_prefix . "section-3-title",
            'type' => 'text',
        ),
        array(
            'name' => 'Text',
            'id' => $meta_prefix . "section-3-text",
            'type' => 'textarea',
        ),
        array(
            'name' => 'Services',
            'id' => $meta_prefix . 'services',
            'type' => 'group',
            'options' => array(
                'group_title' => __('Service {#}', 'sogoc'), // {#} gets replaced by row number
                'add_button' => __('Add Another Service', 'sogoc'),
                'remove_button' => __('Remove Service', 'sogoc'),
                'sortable' => true, // beta
            ),
            'fields' => array(
                array(
                    'name' => 'Icon',
                    'id' => 'icon',
                    'type' => 'text_small',
                ),
                array(
                    'name' => 'Name',
                    'id' => 'name',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Description',
                    'id' => 'description',
                    'type' => 'textarea',
                ),
            )
        )
    )
);

$meta_boxes[] = array(
    'id' => 'sogo_advertising_meta_box_4' ,
    'title' => __('Section 4', 'sogoc'),
    'object_types' => array('page'), // These fields should be placed on the USER object.
    'show_names' => true,
    'show_on' => array('key' => 'page-template', 'value' => 'page-advertaizing.php'),
    'context' => 'normal',
    'priority' => 'default',
    'fields' => array(
        array(
            'name' => 'Title',
            'id' => $meta_prefix . "section-4-title",
            'type' => 'text',
        ),
        array(
            'name' => 'Text',
            'id' => $meta_prefix . "section-4-text",
            'type' => 'textarea',
        ),
    )
);
$meta_boxes[] = array(
    'id' => 'sogo_advertising_meta_box_5' ,
    'title' => __('Section 5', 'sogoc'),
    'object_types' => array('page'), // These fields should be placed on the USER object.
    'show_names' => true,
    'show_on' => array('key' => 'page-template', 'value' => 'page-advertaizing.php'),
    'context' => 'normal',
    'priority' => 'default',
    'fields' => array(
        array(
            'name' => 'Title Left',
            'id' => $meta_prefix . "section-5-title-left",
            'type' => 'text',
        ),
        array(
            'name' => 'Text Left',
            'id' => $meta_prefix . "section-5-text-left",
            'type' => 'wysiwyg',
        ),
        array(
            'name' => 'Title Right',
            'id' => $meta_prefix . "section-5-title-right",
            'type' => 'text',
        ),
        array(
            'name' => 'Text Right',
            'id' => $meta_prefix . "section-5-text-right",
            'type' => 'wysiwyg',
        ),
    )
);

$meta_boxes[] = array(
    'id' => 'sogo_advertising_meta_box_6' ,
    'title' => __('Section 6', 'sogoc'),
    'object_types' => array('page'), // These fields should be placed on the USER object.
    'show_names' => true,
    'show_on' => array('key' => 'page-template', 'value' => 'page-advertaizing.php'),
    'context' => 'normal',
    'priority' => 'default',
    'fields' => array(
        array(
            'name' => 'Title',
            'id' => $meta_prefix . "section-6-title",
            'type' => 'text',
        ),

        array(
            'name' => 'Targets left',
            'id' => $meta_prefix . 'targets_left',
            'type' => 'group',
            'options' => array(
                'group_title' => __('Target {#}', 'sogoc'), // {#} gets replaced by row number
                'add_button' => __('Add Another Target', 'sogoc'),
                'remove_button' => __('Remove Target', 'sogoc'),
                'sortable' => true, // beta
            ),
            'fields' => array(
                array(
                    'name' => 'Icon',
                    'id' => 'icon',
                    'type' => 'text_small',
                ),
                array(
                    'name' => 'Title',
                    'id' => 'title',
                    'type' => 'text',
                ),

            )
        ),
        array(
            'name' => 'Targets Right',
            'id' => $meta_prefix . 'targets_right',
            'type' => 'group',
            'options' => array(
                'group_title' => __('Target {#}', 'sogoc'), // {#} gets replaced by row number
                'add_button' => __('Add Another Target', 'sogoc'),
                'remove_button' => __('Remove Target', 'sogoc'),
                'sortable' => true, // beta
            ),
            'fields' => array(
                array(
                    'name' => 'Icon',
                    'id' => 'icon',
                    'type' => 'text_small',
                ),
                array(
                    'name' => 'Title',
                    'id' => 'title',
                    'type' => 'text',
                ),

            )
        )

    )
);

$meta_boxes[] = array(
    'id' => 'sogo_advertising_meta_box_7' ,
    'title' => __('Section 7', 'sogoc'),
    'object_types' => array('page'), // These fields should be placed on the USER object.
    'show_names' => true,
    'show_on' => array('key' => 'page-template', 'value' => 'page-advertaizing.php'),
    'context' => 'normal',
    'priority' => 'default',
    'fields' => array(
        array(
            'name' => 'Title',
            'id' => $meta_prefix . "section-7-title",
            'type' => 'text',
        ),

        array(
            'name' => 'Strategy left',
            'id' => $meta_prefix . 'strategy_left',
            'type' => 'group',
            'options' => array(
                'group_title' => __('Strategy  {#}', 'sogoc'), // {#} gets replaced by row number
                'add_button' => __('Add Another Strategy', 'sogoc'),
                'remove_button' => __('Remove Strategy', 'sogoc'),
                'sortable' => true, // beta
            ),
            'fields' => array(

                array(
                    'name' => 'Title',
                    'id' => 'title',
                    'type' => 'text',
                ),

            )
        ),
        array(
            'name' => 'Strategy Right',
            'id' => $meta_prefix . 'strategy_right',
            'type' => 'group',
            'options' => array(
                'group_title' => __('Strategy {#}', 'sogoc'), // {#} gets replaced by row number
                'add_button' => __('Add Another Strategy', 'sogoc'),
                'remove_button' => __('Remove Strategy', 'sogoc'),
                'sortable' => true, // beta
            ),
            'fields' => array(
                array(
                    'name' => 'Title',
                    'id' => 'title',
                    'type' => 'text',
                ),

            )
        )

    )
);