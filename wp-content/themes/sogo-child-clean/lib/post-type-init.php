<?php

function sogo_get_post_types(){
    return array(

        // declare events
        array(
            'type'   => 'events',
            'label'  => __('Events','sogoc'),
            'taxonomies' => array( 'category'),
            'hierarchical'       => true,
            'rewrite'            => array( 'slug' =>  __('event','sogoc') ),
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail',
            )
        ),
        // declare business
        array(
            'type'   => 'business',
            'label'  => __('Business','sogoc'),
            'rewrite'            => array( 'slug' => __('business','sogoc') ),
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail',
            )
        ),

        // declare survey
        array(
            'type'   => 'surveys',
            'label'  => __('Surveys','sogoc'),
            'rewrite'            => array( 'slug' => __('survey','sogoc') ),
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail',
            )
        ),
        // declare survey
        array(
            'type'   => 'birthdays',
            'label'  => __('Birthdays','sogoc'),
            'public' => false,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
            )
        ),
        array(
            'type'   => 'notifications',
            'label'  => __('Notifications','sogoc'),
            'rewrite'  => array( 'slug' => __('notifications','sogoc') ),
            'supports' => array(
                'title',
                'editor',
            )
        ),
        array(
            'type'   => 'naim-links',
            'label'  => __('Naim Links','sogoc'),
            'supports' => array(
                'title',
                'thumbnail'
            )
        ),
        array(
            'type'   => 'video-strip',
            'label'  => __('Video Strip','sogoc'),
            'supports' => array(
                'title',
                'thumbnail',
            )
        ),
        array(
            'type'   => 'daily-image',
            'label'  => __('Daily Image','sogoc'),
            'taxonomies' => array( 'category'),
            'supports' => array(
                'title',
            )
        ),

    );

}


function sogo_get_taxonomies(){

    return array(
        array(
            'label' => __('Job Type','sogoc'),
            'slug' => 'position-type',
            'post_type' => 'training'
        ),
        array(
            'label' => __('Events Type','sogoc'),
            'slug' => 'events-type',
            'post_type' => 'events'
        ),

        array(
            'label' => __('Business Category','sogoc'),
            'slug' => 'business-cat',
            'post_type' => 'business'
        ),
      array(
        'label' => __('City','sogoc'),
        'slug' => 'business-city',
        'post_type' => 'business'
      ),
//        array(
//            'label' => __('Case Study Category','sogoc'),
//            'slug' => 'cs-group',
//            'post_type' => 'case-study'
//        ),
    );
}


