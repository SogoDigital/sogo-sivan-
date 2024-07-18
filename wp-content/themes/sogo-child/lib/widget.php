<?php
/**
 * Register sidebars
 */
    function sogo_widgets_init()
    {



        register_sidebar(array(
            'name' => __('Blog', 'sogoc'),
            'id' => 'blog_sidebar',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="black bold widget-title">',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => __('Plugin Sidebar', 'sogoc'),
            'id' => 'plugins_sidebar',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="black bold widget-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar( array(
            'name'          => __( 'Footer column 1', 'sogoc' ),
            'id'            => 'footer-col-1',
            'before_widget' => '<aside>',
            'after_widget'  => '</div></aside>',
            'before_title'  => '<div class=""><p class="footer-widget-title">',
            'after_title'   => '</p></div><div class="widget-content">'
        ) );
        register_sidebar( array(
            'name'          => __( 'Footer column 2', 'sogoc' ),
            'id'            => 'footer-col-2',
            'before_widget' => '<aside class="">',
            'after_widget'  => '</div></aside>',
            'before_title'  => '<div class=""><p class="footer-widget-title">',
            'after_title'   => '</p></span></div><div class="widget-content">'
        ) );
        register_sidebar( array(
            'name'          => __( 'Footer column 3', 'sogoc' ),
            'id'            => 'footer-col-3',
            'before_widget' => '<aside class="">',
            'after_widget'  => '</div></aside>',
            'before_title'  => '<div class=""><p class="footer-widget-title">',
            'after_title'   => '</p></div><div class="widget-content">'
        ) );
        register_sidebar( array(
            'name'          => __( 'Footer column 4', 'sogoc' ),
            'id'            => 'footer-col-4',
            'before_widget' => '<aside class="">',
            'after_widget'  => '</div></aside>',
            'before_title'  => '<div class=""><p class="footer-widget-title">',
            'after_title'   => '</p></div><div class="widget-content">'
        ) );

    }
add_action('widgets_init', 'sogo_widgets_init');

