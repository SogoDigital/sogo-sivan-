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

    }
add_action('widgets_init', 'sogo_widgets_init');

