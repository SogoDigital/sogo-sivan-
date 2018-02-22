<?php


global $editor_options, $meta_boxes, $meta_prefix;


/* section 1*/
$meta_boxes[] = array(
    'id' => 'sogo_metho_meta_box_1',
    'title' => __('Section 1', 'sogoc'),
    'object_types' => array('page'), // These fields should be placed on the USER object.
    'show_names' => true,
    'show_on' => array('key' => 'page-template', 'value' => 'page-methodology.php'),
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

for ($i = 2; $i <= 9; $i++) {
    $meta_boxes[] = array(
        'id' => 'sogo_metho_meta_box_' . $i,
        'title' => __('Section ' . $i, 'sogoc'),
        'object_types' => array('page'), // These fields should be placed on the USER object.
        'show_names' => true,
        'show_on' => array('key' => 'page-template', 'value' => 'page-methodology.php'),
        'context' => 'normal',
        'priority' => 'default',
        'fields' => array(
            array(
                'name' => 'Title',
                'id' => $meta_prefix . "section-$i-title",
                'type' => 'text',
            ),
            array(
                'name' => 'Text',
                'id' => $meta_prefix . "section-$i-text",
                'type' => 'textarea',
            ),
            array(
                'name' => 'Vertical Align',
                'id' => $meta_prefix . "section-$i-align",
                'type' => 'select',
                'options' => array('-1'=>'','vertical-top'=>'top','vertical-middle'=>'middle', 'vertical-bottom'=>'bottom'),
            ),
        )
    );
}