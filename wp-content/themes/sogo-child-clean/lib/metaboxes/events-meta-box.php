<?php
global $editor_options, $meta_boxes, $meta_prefix;

$meta_boxes[] = array(
        'id'               => 'sogo_events_meta_box_1',
        'title'            => __( 'Events Settings', 'sogoc' ),
        'object_types'     => array( 'events' ), // These fields should be placed on the USER object.
        'show_names'       => true,
        'context'       => 'normal',
        'priority' => 'default',
        'fields'           => array(
            array(
                'name' => __('Event Date','sogoc'),
                'id' => $meta_prefix . 'event_date',
                'type' => 'text_date_timestamp',
                 'date_format' => __( 'd-m-Y', 'cmb2' ), // use European date format
            ),
//            array(
//                'name' =>  __('End Date','sogoc'),
//                'id' => $meta_prefix . 'text_date_timestamp',
//                 'type' => 'text_date',
//                'date_format' => __( 'd-m-Y', 'cmb2' ), // use European date format
//            ),
            array(
                'name' =>  __('Time','sogoc'),
                'id' => $meta_prefix . 'event_time',
                'type' => 'text'
            ),
//            array(
//                'name' =>  __('End Time','sogoc'),
//                'id' => $meta_prefix . 'event_time_end',
//                'type' => 'text_time'
//            ),
            array(
                'name' =>  __('Event Adress','sogoc'),
                'id' => $meta_prefix . 'event_address',
                'type' => 'text'
            ),
            array(
                'name' =>  __('Event Link','sogoc'),
                'id' => $meta_prefix . 'event_link',
                'type' => 'text_url'
            ),
            array(
                'name' =>  __('Event Price','sogoc'),
                'id' => $meta_prefix . 'event_price',
                'type' => 'text'
            ),
            array(
                'name' =>  __('Event Map','sogoc'),
                'id' => $meta_prefix . 'event_map',
                'type' => 'textarea_code'
            ),
            array(
                'name' =>  __('Is free event?','sogoc'),
                'id' => $meta_prefix . 'free_event',
                'type' => 'checkbox'
            ),
            array(
                'name' =>  __('Event Area','sogoc'),
                'id' => $meta_prefix . 'event_area',
                'type' => 'text'
            ),
            array(
                'name' =>  __('Event Roof Title','sogoc'),
                'id' => $meta_prefix . 'roof',
                'type' => 'text'
            ),
        )
    );






