<?php

function sogo_get_post_types(){
    return array(

        // declare events
        array(
            'type'   => 'project',
            'label'  => __('Projects','sogoc'),
            'menu_icon'       => 'dashicons-groups',
            'hierarchical'       => true,
            'rewrite'            => array( 'slug' =>'projects' ),
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail',
            )
        ),
        array(
            'type'   => 'case-study',
            'label'  => __('Case Study','sogoc'),
            'menu_icon'       => 'dashicons-groups',
            'hierarchical'       => true,
            'rewrite'            => array( 'slug' =>'case-study' ),
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail',
            )
        ),
        array(
            'type'   => 'plugin',
            'label'  => __('Plugins','sogoc'),
            'menu_icon'       => 'dashicons-nametag',
            'hierarchical'       => true,
            'rewrite'            => array( 'slug' =>  'plugins' ),
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail',
            )
        ),
        // declare business
    );

}


function sogo_get_taxonomies(){

    return array(
        array(
            'label' => __('Categories','sogoc'),
            'slug' => 'plugin-cat',
            'post_type' => 'plugin'
        ),
        array(
            'label' => __('Project Type','sogoc'),
            'slug' => 'project-cat',
            'post_type' => 'project'
        ),

    );
}


