<?php


global $editor_options, $meta_boxes, $meta_prefix;

$object_id = isset($_REQUEST['post_ID']) ? $_REQUEST['post_ID'] : '-1';
$object_id = isset($_REQUEST['post']) ? $_REQUEST['post'] : $object_id;
$format = isset($_REQUEST[$meta_prefix . 'home-row-1-format']) ?
    $_REQUEST[$meta_prefix . 'home-row-1-format'] :
    get_post_meta($object_id, $meta_prefix . 'home-row-1-format', true);
$main_cat_4 = get_post_meta($object_id, $meta_prefix . 'main_category_section_4', true);
$sub_cat_4 = get_post_meta($object_id, $meta_prefix . 'sub_category_section_4', true);

$main_cat_5 = get_post_meta($object_id, $meta_prefix . 'main_category_section_5', true);
$sub_cat_5 = get_post_meta($object_id, $meta_prefix . 'sub_category_section_5', true);

$main_cat_6 = get_post_meta($object_id, $meta_prefix . 'main_category_section_6', true);
$sub_cat_6 = get_post_meta($object_id, $meta_prefix . 'sub_category_section_6', true);

$main_cat_7 = get_post_meta($object_id, $meta_prefix . 'main_category_section_7', true);
$sub_cat_7 = get_post_meta($object_id, $meta_prefix . 'sub_category_section_7', true);
$no = 3;
switch ($format) {
    case "1":
        $no = 1;
        break;
    case "2":
    case "3":
    case "4":
        $no = 3;
        break;
    case "5":
    case "7":
        $no = 2;
        break;
    case "6":
        $no = 6;
        break;
    default:
        break;
}
$arr = array();
$arr[] = array(
    'name' => 'Select Header Format',
    'id' => $meta_prefix . 'home-row-1-format',
    'type' => 'radio_inline',
    'options' => array(
        '1' => '1',
        '2' => '3 same',
        '3' => '3 left big',
        '4' => '3 right big',
        '5' => '2 left big',
        '7' => '2 right big',
        '6' => '6 same'
    )
);

for ($i = 1; $i <= $no; $i++) {
    //$row = $i == 1? '<div class="flex wrap-3">': '';
    $arr[] = array(
        'name' => __('Article - ' . $i, 'sogoc'),
        'desc' => __('Start typing for auto complete', 'sogoc'),
        'id' => $meta_prefix . 'home-row-1-' . $i,
        'type' => 'autocomplete',
        'source' => 'get_post_options',
        'mapping_function' => 'autocomplete_cmb2_get_post_title_from_id',
        'before_row' => '<div class="flex-item flex-' . $format . ' ">', // callback
        'after_row' => '</div>',
    );
}


$meta_boxes['sogo_front_page_meta_box_1'] = array(
    'id' => 'sogo_front_page_meta_box_1',
    'title' => __('Row 1 Settings', 'sogoc'),
    'object_types' => array('page'), // These fields should be placed on the USER object.
    'show_names' => true,
    'show_on' => array('key' => 'page-template', 'value' => 'front-page.php'),
    'context' => 'normal',
    'priority' => 'default',


);

$meta_boxes['sogo_front_page_meta_box_1']['fields'] = $arr;


$meta_boxes[] = array(
    'id' => 'sogo_home_meta_box_2',
    'title' => __('Category settings Section 4', 'sogoc'),
    'object_types' => array('page'), // These fields should be placed on the USER object.
    'show_names' => true,
    'show_on' => array('key' => 'page-template', 'value' => 'front-page.php'),
    'context' => 'normal',
    'priority' => 'default',
    'fields' => array(
        array(
            'name' => 'Select Main Category',
            'id' => $meta_prefix . 'main_category_section_4',
            'taxonomy' => 'category', //Enter Taxonomy Slug
            'type' => 'select',
            'options' => cmb2_get_term_options('category'),
            'before_row' => '<div class="flex-item flex-5 ">', // callback
            'after_row' => '</div>',
        ),
        array(
            'name' => 'Select Main Category',
            'id' => $meta_prefix . 'sub_category_section_4',
            'type' => 'multicheck',
            'options' => cmb2_get_term_options('category', array('parent' => $main_cat_4)),
            'before_row' => '<div  class="flex-item flex-5  ">', // callback
            'after_row' => '</div>',


        ),


    )
);


$meta_boxes[] = array(
    'id' => 'sogo_home_meta_box_3',
    'title' => __('Category settings Section 5', 'sogoc'),
    'object_types' => array('page'), // These fields should be placed on the USER object.
    'show_names' => true,
    'show_on' => array('key' => 'page-template', 'value' => 'front-page.php'),
    'context' => 'normal',
    'priority' => 'default',
    'fields' => array(
        array(
            'name' => 'Select Main Category',
            'id' => $meta_prefix . 'main_category_section_5',
            'taxonomy' => 'category', //Enter Taxonomy Slug
            'type' => 'select',
            'options' => cmb2_get_term_options('category'),
            'before_row' => '<div class="flex-item flex-5 ">', // callback
            'after_row' => '</div>',
        ),
        array(
            'name' => 'Select Main Category',
            'id' => $meta_prefix . 'sub_category_section_5',
            'type' => 'multicheck',
            'options' => cmb2_get_term_options('category', array('parent' => $main_cat_5)),
            'before_row' => '<div  class="flex-item flex-5  ">', // callback
            'after_row' => '</div>',


        ),


    )
);
$meta_boxes[] = array(
    'id' => 'sogo_home_meta_box_4',
    'title' => __('Category settings Section 6', 'sogoc'),
    'object_types' => array('page'), // These fields should be placed on the USER object.
    'show_names' => true,
    'show_on' => array('key' => 'page-template', 'value' => 'front-page.php'),
    'context' => 'normal',
    'priority' => 'default',
    'fields' => array(
        array(
            'name' => 'Select Main Category',
            'id' => $meta_prefix . 'main_category_section_6',
            'taxonomy' => 'category', //Enter Taxonomy Slug
            'type' => 'select',
            'options' => cmb2_get_term_options('category'),
            'before_row' => '<div class="flex-item flex-5 ">', // callback
            'after_row' => '</div>',
        ),
        array(
            'name' => 'Select Main Category',
            'id' => $meta_prefix . 'sub_category_section_6',
            'type' => 'multicheck',
            'options' => cmb2_get_term_options('category', array('parent' => $main_cat_6)),
            'before_row' => '<div  class="flex-item flex-5  ">', // callback
            'after_row' => '</div>',


        ),


    )
);

$meta_boxes[] = array(
    'id' => 'sogo_home_meta_box_7',
    'title' => __('Category settings Section 7', 'sogoc'),
    'object_types' => array('page'), // These fields should be placed on the USER object.
    'show_names' => true,
    'show_on' => array('key' => 'page-template', 'value' => 'front-page.php'),
    'context' => 'normal',
    'priority' => 'default',
    'fields' => array(
        array(
            'name' => 'Select Main Category',
            'id' => $meta_prefix . 'main_category_section_7',
            'taxonomy' => 'category', //Enter Taxonomy Slug
            'type' => 'select',
            'options' => cmb2_get_term_options('category'),
            'before_row' => '<div class="flex-item flex-5 ">', // callback
            'after_row' => '</div>',
        ),
        array(
            'name' => 'Select Main Category',
            'id' => $meta_prefix . 'sub_category_section_7',
            'type' => 'multicheck',
            'options' => cmb2_get_term_options('category', array('parent' => $main_cat_7)),
            'before_row' => '<div  class="flex-item flex-5  ">', // callback
            'after_row' => '</div>',


        ),


    )
);



