<?php


global $editor_options, $meta_boxes, $meta_prefix;


/* section 1*/
$meta_boxes[] = array(
  'id' => 'sogo_access_meta_box_1',
  'title' => __('Section 1', 'sogoc'),
  'object_types' => array('page'), // These fields should be placed on the USER object.
  'show_names' => true,
  'show_on' => array('key' => 'page-template', 'value' => 'page-accessibility.php'),
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
  'id' => 'sogo_access_meta_box_2',
  'title' => __('Section 2', 'sogoc'),
  'object_types' => array('page'), // These fields should be placed on the USER object.
  'show_names' => true,
  'show_on' => array('key' => 'page-template', 'value' => 'page-accessibility.php'),
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
      'name' => 'Left Icon',
      'id' => $meta_prefix . 'left_icon',
      'type' => 'file',
    ),
    array(
      'name' => 'Right Title',
      'id' => $meta_prefix . 'right_title',
      'type' => 'text',
    ),
    array(
      'name' => 'Right Text',
      'id' => $meta_prefix . 'right_text',
      'type' => 'wysiwyg',
    ),
    array(
      'name' => 'Right Icon',
      'id' => $meta_prefix . 'right_icon',
      'type' => 'file',
    )
  )
);
// section 3
$meta_boxes[] = array(
  'id' => 'sogo_access_meta_box_3',
  'title' => __('Section 3', 'sogoc'),
  'object_types' => array('page'), // These fields should be placed on the USER object.
  'show_names' => true,
  'show_on' => array('key' => 'page-template', 'value' => 'page-accessibility.php'),
  'context' => 'normal',
  'priority' => 'default',
  'fields' => array(
    array(
      'name' => 'Left Picture',
      'id' => $meta_prefix . 'sec-3-picture',
      'type' => 'file',
    ),
    array(
      'name' => 'Title',
      'id' => $meta_prefix . 'sec-3-title',
      'type' => 'text',
    ),
    array(
      'name' => 'List Items',
      'id' => $meta_prefix . 'floor-3-li',
      'type' => 'group',
      'options' => array(
        'group_title' => __('items {#}', 'sogoc'), // {#} gets replaced by row number
        'add_button' => __('Add Another list item', 'sogoc'),
        'remove_button' => __('Remove list item', 'sogoc'),
        'sortable' => true, // beta
      ),
      'fields' => array(
        array(
          'name' => 'Item Heading',
          'id' => 'item_heading',
          'type' => 'text',
        ),
        array(
          'name' => 'Item-text',
          'id' => 'item_text',
          'type' => 'text',
        ),
      )
    )
  )
);
// section 4
$meta_boxes[] = array(
  'id' => 'sogo_access_meta_box_4' ,
  'title' => __('Section 4', 'sogoc'),
  'object_types' => array('page'), // These fields should be placed on the USER object.
  'show_names' => true,
  'show_on' => array('key' => 'page-template', 'value' => 'page-accessibility.php'),
  'context' => 'normal',
  'priority' => 'default',
  'fields' => array(
    array(
      'name' => 'Title',
      'id' => $meta_prefix . "section-4-title",
      'type' => 'text',
    ),

    array(
      'name' => 'Principles',
      'id' => $meta_prefix . 'principles',
      'type' => 'group',
      'options' => array(
        'group_title' => __('Principle {#}', 'sogoc'), // {#} gets replaced by row number
        'add_button' => __('Add Another principle', 'sogoc'),
        'remove_button' => __('Remove principle', 'sogoc'),
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
// section 5
$meta_boxes[] = array(
  'id' => 'sogo_access_meta_box_5',
  'title' => __('Section 5', 'sogoc'),
  'object_types' => array('page'), // These fields should be placed on the USER object.
  'show_names' => true,
  'show_on' => array('key' => 'page-template', 'value' => 'page-accessibility.php'),
  'context' => 'normal',
  'priority' => 'default',
  'fields' => array(
    array(
      'name' => 'Title',
      'id' => $meta_prefix . 'sec-5-title',
      'type' => 'text',
    ),
    array(
      'name' => 'List Items',
      'id' => $meta_prefix . 'floor-5-li',
      'type' => 'group',
      'options' => array(
        'group_title' => __('items {#}', 'sogoc'), // {#} gets replaced by row number
        'add_button' => __('Add Another list item', 'sogoc'),
        'remove_button' => __('Remove list item', 'sogoc'),
        'sortable' => true, // beta
      ),
      'fields' => array(
        array(
          'name' => 'Item Heading',
          'id' => 'item_heading',
          'type' => 'text',
        ),
        array(
          'name' => 'Item-text',
          'id' => 'item_text',
          'type' => 'text',
        ),
      )
    )
  )
);
// section 6
$meta_boxes[] = array(
  'id' => 'sogo_access_meta_box_6',
  'title' => __('Section 6', 'sogoc'),
  'object_types' => array('page'), // These fields should be placed on the USER object.
  'show_names' => true,
  'show_on' => array('key' => 'page-template', 'value' => 'page-accessibility.php'),
  'context' => 'normal',
  'priority' => 'default',
  'fields' => array(
    array(
      'name' => 'Title',
      'id' => $meta_prefix . 'section-6-title',
      'type' => 'text',
    ),
    array(
      'name' => 'Text',
      'id' => $meta_prefix . 'section-6-text',
      'type' => 'wysiwyg',
    ),
  )
);
