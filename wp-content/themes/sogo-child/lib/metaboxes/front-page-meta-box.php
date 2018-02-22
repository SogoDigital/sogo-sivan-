<?php


global $editor_options, $meta_boxes, $meta_prefix;


/* section 1*/
$meta_boxes[] = array(
  'id' => 'sogo_home_meta_box_1',
  'title' => __('Section 1', 'sogoc'),
  'object_types' => array('page'), // These fields should be placed on the USER object.
  'show_names' => true,
  'show_on' => array('key' => 'page-template', 'value' => 'front-page.php'),
  'context' => 'normal',
  'priority' => 'default',
  'closed' => true,
  'fields' => array(
    array(
      'name' => 'Text',
      'id' => $meta_prefix . 'text',
      'type' => 'textarea',
    ),
    array(
      'name' => 'Pop up Form Shortcode',
      'id' => $meta_prefix . 'modal_form',
      'type' => 'text',
    ),
//        array(
//            'name' => 'Call To Action Text',
//            'id' => $meta_prefix . 'cta_text',
//            'type' => 'text',
//        ),
//        array(
//            'name' => 'Call To Action Link',
//            'id' => $meta_prefix . 'cta_link',
//            'type' => 'text',
//        ),
  )
);

$meta_boxes[] = array(
  'id' => 'sogo_home_meta_box_floors',
  'title' => __('Section 2 (floors)', 'sogoc'),
  'object_types' => array('page'), // These fields should be placed on the USER object.
  'show_names' => true,
  'show_on' => array('key' => 'page-template', 'value' => 'front-page.php'),
  'context' => 'normal',
  'priority' => 'default',
  'closed' => true,
  'fields' => array(
    array(
      'name' => 'floors',
      'id' => $meta_prefix . 'floors',
      'type' => 'group',
      'options' => array(
        'group_title' => __('floor {#}', 'sogoc'), // {#} gets replaced by row number
        'add_button' => __('Add Another floor', 'sogoc'),
        'remove_button' => __('Remove floor', 'sogoc'),
        'sortable' => true, // beta
      ),
      'fields' => array(
        array(
          'name' => 'ID',
          'id' => 'id',
          'type' => 'text',
        ),
        array(
          'name' => 'background',
          'id' => 'background',
          'type' => 'file',
        ),
        array(
          'name' => 'Background size',
          'id' => "background-size",
          'type' => 'radio',
          'options' => array('' => 'None', 'cover' => 'Cover', 'contain' => 'Contain'),
        ),
        array(
          'name' => 'overlay image',
          'id' => 'overlay-image',
          'type' => 'file',
        ),
        array(
          'name' => 'overlay animation',
          'id' => 'overlay-animation',
          'type' => 'text',
        ),
        array(
          'name' => 'Overlay size',
          'id' => "overlay-size",
          'type' => 'radio',
          'options' => array('' => 'None', 'cover' => 'Cover', 'contain' => 'Contain'),
        ),
        array(
          'name' => 'col class',
          'id' => 'col',
          'type' => 'text',
        ),

        array(
          'name' => 'title',
          'id' => 'title',
          'type' => 'text',
        ),
        array(
          'name' => 'text',
          'id' => 'text',
          'type' => 'textarea',
        ),
        array(
          'name' => 'Vertical Align',
          'id' => "align",
          'type' => 'select',
          'options' => array('-1' => '', 'vertical-top' => 'top', 'vertical-middle' => 'middle', 'vertical-bottom' => 'bottom'),
        ),


      )
    ),
  )
);
//
//for ($i = 2; $i < 6; $i++) {
//    $meta_boxes[] = array(
//        'id' => 'sogo_home_meta_box_' . $i,
//        'title' => __('Section ' . $i, 'sogoc'),
//        'object_types' => array('page'), // These fields should be placed on the USER object.
//        'show_names' => true,
//        'show_on' => array('key' => 'page-template', 'value' => 'front-page.php'),
//        'context' => 'normal',
//        'priority' => 'default',
//        'fields' => array(
//            array(
//                'name' => 'background',
//                'id' => $meta_prefix . "section-$i-bg",
//                'type' => 'text',
//            ),
//            array(
//                'name' => 'Title',
//                'id' => $meta_prefix . "section-$i-title",
//                'type' => 'text',
//            ),
//            array(
//                'name' => 'Call To Action Text',
//                'id' => $meta_prefix . "section-$i-text",
//                'type' => 'textarea',
//            ),
//            array(
//                'name' => 'Vertical Align',
//                'id' => $meta_prefix . "section-$i-align",
//                'type' => 'select',
//                'options' => array('-1'=>'','vertical-top'=>'top','vertical-middle'=>'middle', 'vertical-bottom'=>'bottom'),
//            ),
//        )
//    );
//}


$meta_boxes[] = array(
  'id' => 'sogo_home_meta_box_3',
  'title' => __('Section 3', 'sogoc'),
  'object_types' => array('page'), // These fields should be placed on the USER object.
  'show_names' => true,
  'show_on' => array('key' => 'page-template', 'value' => 'front-page.php'),
  'context' => 'normal',
  'priority' => 'default',
  'closed' => true,
  'fields' => array(
    array(
      'name' => 'Title',
      'id' => $meta_prefix . "section-5-title",
      'type' => 'text',
    ),
    array(
      'name' => 'Text',
      'id' => $meta_prefix . "section-5-text",
      'type' => 'textarea',
    ),

  )
);
$meta_boxes[] = array(
  'id' => 'sogo_home_meta_box_4',
  'title' => __('Section 4', 'sogoc'),
  'object_types' => array('page'), // These fields should be placed on the USER object.
  'show_names' => true,
  'show_on' => array('key' => 'page-template', 'value' => 'front-page.php'),
  'context' => 'normal',
  'priority' => 'default',
  'closed' => true,
  'fields' => array(
    array(
      'name' => 'Title Left',
      'id' => $meta_prefix . "section-6-title-1",
      'type' => 'text',
    ),
    array(
      'name' => 'Call To Action Text Right',
      'id' => $meta_prefix . "section-6-text-1",
      'type' => 'textarea',
    ),
    array(
      'name' => 'Title Right',
      'id' => $meta_prefix . "section-6-title-2",
      'type' => 'text',
    ),
    array(
      'name' => 'Call To Action Text Left',
      'id' => $meta_prefix . "section-6-text-2",
      'type' => 'textarea',
    ),
  )
);

$meta_boxes[] = array(
  'id' => 'sogo_home_meta_box_5',
  'title' => __('Section 5', 'sogoc'),
  'object_types' => array('page'), // These fields should be placed on the USER object.
  'show_names' => true,
  'show_on' => array('key' => 'page-template', 'value' => 'front-page.php'),
  'context' => 'normal',
  'priority' => 'default',
  'closed' => true,
  'fields' => array(
    array(
      'name' => 'Title',
      'id' => $meta_prefix . "section-7-title",
      'type' => 'text',
    ),
//        array(
//            'name' => 'Call To Action Text',
//            'id' => $meta_prefix . "section-7-text",
//            'type' => 'textarea',
//        ),
    array(
      'name' => 'Call To Action Link',
      'id' => $meta_prefix . "portfolio-page",
      'type' => 'text',
    ),
    array(
      'name' => 'Portfolio Gallery',
      'id' => $meta_prefix . "section-7-gallery",
      'type' => 'file_list',
    ),
  )
);

$meta_boxes[] = array(
  'id' => 'sogo_home_meta_box_6',
  'title' => __('Section 6', 'sogoc'),
  'object_types' => array('page'), // These fields should be placed on the USER object.
  'show_names' => true,
  'show_on' => array('key' => 'page-template', 'value' => 'front-page.php'),
  'context' => 'normal',
  'closed' => true,
  'priority' => 'default',
  'fields' => array(
    array(
      'name' => 'Background',
      'id' => $meta_prefix . "section-8-bg",
      'type' => 'file',
    ),
    array(
      'name' => 'Title',
      'id' => $meta_prefix . "section-8-title",
      'type' => 'text',
    ),
    array(
      'name' => 'Call To Action Text',
      'id' => $meta_prefix . "section-8-text",
      'type' => 'textarea',
    ),
    array(
      'name' => 'Form Shortcode',
      'id' => $meta_prefix . "section-8-form",
      'type' => 'text',
    ),
  )
);







