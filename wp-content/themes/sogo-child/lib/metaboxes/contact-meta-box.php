<?php


global $editor_options, $meta_boxes, $meta_prefix;

$meta_boxes[] = array(
  'id' => 'sogo_contact_meta_box_1',
  'title' => __('Section 1', 'sogoc'),
  'object_types' => array('page'), // These fields should be placed on the USER object.
  'show_names' => true,
  'show_on' => array('key' => 'page-template', 'value' => 'page-contact.php'),
  'context' => 'normal',
  'closed' => true,
  'priority' => 'default',
  'fields' => array(
    array(
      'name' => 'Form Shortcode',
      'id' => $meta_prefix . "section-1-form",
      'type' => 'text',
    ),
    array(
      'name' => 'Map address',
      'id' => $meta_prefix . "google-map",
      'type' => 'textarea_code',
    ),
  )
);