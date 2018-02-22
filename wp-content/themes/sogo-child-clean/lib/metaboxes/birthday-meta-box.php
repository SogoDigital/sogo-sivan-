<?php
global $editor_options, $meta_boxes, $meta_prefix;

$meta_boxes[] = array(
        'id'               => 'sogo_birthday_meta_box_1',
        'title'            => __( 'Birthday Day', 'sogoc' ),
        'object_types'     => array( 'birthdays' ), // These fields should be placed on the USER object.
        'hookup'       => false,
        'save_fields'  => false,
        'show_names'       => true,
        'context'       => 'side',
        'priority' => 'default',
        'fields'           => array(
            array(
                'name' => __('Day','sogoc'),
                'id' => $meta_prefix . 'birthday_day',
                'type' => 'select',
                'options' => array(
                    '',1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31
                )
            ),
            array(
                'name' => __('Month','sogoc'),
                'id' => $meta_prefix . 'birthday_month',
                'type' => 'select',
                'options' => array(
                    '',1,2,3,4,5,6,7,8,9,10,11,12
                )
            ),
            array(
                'name' => __('year','sogoc'),
                'id' => $meta_prefix . 'birthday_year',
                'type' => 'text',

            ),

        )
    );






