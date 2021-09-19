<?php


global $editor_options, $meta_boxes, $meta_prefix;


/* section 1*/
$meta_boxes[] = array(
  'id' => 'sogo_project_meta_box_0',
  'title' => __('Section 1', 'sogoc'),
  'object_types' => array('project','case-study'), // These fields should be placed on the USER object.
  'show_names' => true,
  'context' => 'normal',
  'priority' => 'default',
  'fields' => array(
    array(
      'name' => 'Template',
      'id' => $meta_prefix . 'template',
      'type' => 'select',
      'options' => array(
        'template-single-1.php' => 'Single Project',
        'single-page-case-dukim.php' => 'Dukim Template',
        'template-single-2.php' => 'Version 2',
        'template-single-3.php' => 'Version 3',
      )
    ),
    array(
      'name' => 'Background',
      'id' => $meta_prefix . 'bg',
      'type' => 'file',
    ),
      array(
          'name' => 'Image',
          'id' => $meta_prefix . 'image',
          'type' => 'file',
      ),
      array(
          'name' => 'Background Mobile',
          'id' => $meta_prefix . 'bg-mobile',
          'type' => 'file',
      ),
      array(
          'name' => 'Image Mobile',
          'id' => $meta_prefix . 'image-mobile',
          'type' => 'file',
      ),

    array(
      'name' => 'Sub Title',
      'id' => $meta_prefix . 'sub_title',
      'type' => 'text',
    ),
    array(
      'name' => 'Left Title',
      'id' => $meta_prefix . 'left_title',
      'type' => 'text',
    ),
    array(
      'name' => 'Left Text',
      'id' => $meta_prefix . 'left_text',
      'type' => 'textarea',
    ),

  )
);

$meta_boxes[] = array(
  'id' => 'sogo_project_meta_box_1',
  'title' => __('Section 2 (floors)', 'sogoc'),
  'object_types' => array('project','case-study'), // These fields should be placed on the USER object.
  'show_names' => true,
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
          'name' => 'title-class',
          'id' => 'title-class',
          'type' => 'text',
        ),
        array(
          'name' => 'text',
          'id' => 'text',
          'type' => 'wysiwyg',
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

$meta_boxes[] = array(
  'id' => 'sogo_project_meta_box_3',
  'title' => __('Section 3', 'sogoc'),
  'object_types' => array('project','case-study'), // These fields should be placed on the USER object.
  'show_names' => true,
  'context' => 'normal',
  'priority' => 'default',
  'fields' =>
    array(
      array(
        'name' => 'avatar',
        'id' => $meta_prefix . 'customer_avatar',
        'type' => 'file',
      ),
      array(
        'name' => 'Name',
        'id' => $meta_prefix . 'customer_name',
        'type' => 'text',
      ),
      array(
        'name' => 'Company',
        'id' => $meta_prefix . 'customer_company',
        'type' => 'text',
      ),
      array(
        'name' => 'Job Title',
        'id' => $meta_prefix . 'customer_job_title',
        'type' => 'text',
      ),
      array(
        'name' => 'Description',
        'id' => $meta_prefix . 'customer_description',
        'type' => 'textarea',
      ),

    )


);
