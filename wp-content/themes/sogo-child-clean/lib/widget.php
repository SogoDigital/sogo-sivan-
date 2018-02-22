<?php
/**
 * Register sidebars
 */
    function sogo_widgets_init()
    {



        register_sidebar(array(
            'name' => __('header-right', 'sogoc'),
            'id' => 'header-right',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('home-row-2-right', 'sogoc'),
            'id' => 'home-row-2-right',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('home-row-2-middle', 'sogoc'),
            'id' => 'home-row-2-middle',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('home-row-2-left', 'sogoc'),
            'id' => 'home-row-2-left',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('Home - row - 3 - right', 'sogoc'),
            'id' => 'home-row-3-right',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('Home - row - 3 - left', 'sogoc'),
            'id' => 'home-row-3-left',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('Home - row - 3 - middle bottom', 'sogoc'),
            'id' => 'home-row-3-middle',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('Home - row - 4 - right', 'sogoc'),
            'id' => 'home-row-4-right',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('Home - row - 4 - middle - right', 'sogoc'),
            'id' => 'home-row-4-middle-right',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('Home - row - 4 - middle - left', 'sogoc'),
            'id' => 'home-row-4-middle-left',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('Home - row - 5 - right', 'sogoc'),
            'id' => 'home-row-6-right',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('Home - row - 5 - middle', 'sogoc'),
            'id' => 'home-row-6-middle',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('Home - row - 5 - left', 'sogoc'),
            'id' => 'home-row-5-left',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('Home - row - 6 - middle', 'sogoc'),
            'id' => 'home-row-7-middle',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title outside roof-red">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('home-daily-right-row-7', 'sogoc'),
            'id' => 'daily-right',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title outside roof-blue font-14">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('Home - row - 8 - right', 'sogoc'),
            'id' => 'home-row-8-right',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('Home - row - 8 - middle', 'sogoc'),
            'id' => 'home-row-8-middle',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('Home - row - 8 - left', 'sogoc'),
            'id' => 'home-row-8-left',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('Home - row - 9 - right', 'sogoc'),
            'id' => 'home-row-9-right',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('Home - row - 10 - right', 'sogoc'),
            'id' => 'home-row-10-right',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('Home - row - 10 - middle', 'sogoc'),
            'id' => 'home-row-10-middle',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('Home - row - 10 - left', 'sogoc'),
            'id' => 'home-row-10-left',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => __('Home - row - 11', 'sogoc'),
            'id' => 'before-footer',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title outside roof-red">',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => __('Home - row - 12', 'sogoc'),
            'id' => 'home-row-12-left',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title outside roof-red">',
            'after_title' => '</h3>',
        ));





        register_sidebar(array(
            'name' => __('red-mail-right', 'sogoc'),
            'id' => 'red-mail-right',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('red-mail-left', 'sogoc'),
            'id' => 'red-mail-left',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('movies-right', 'sogoc'),
            'id' => 'movies-right',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('movies-left', 'sogoc'),
            'id' => 'movies-left',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('movies-every-four', 'sogoc'),
            'id' => 'movies-every-four',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => __('single-right', 'sogoc'),
            'id' => 'single-right',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('single-left', 'sogoc'),
            'id' => 'single-left',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('single-event-top', 'sogoc'),
            'id' => 'single-event-top',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('single-event-bottom', 'sogoc'),
            'id' => 'single-event-bottom',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('events-every-four', 'sogoc'),
            'id' => 'events-every-four',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('mivzakim-every-four', 'sogoc'),
            'id' => 'mivzakim-every-four',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
        'name' => __('single-right-to-content', 'sogoc'),
        'id' => 'single-right-to-content',
        'before_widget' => '<aside class="widget %1$s %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="roof-title">',
        'after_title' => '</h3>',
    ));
        register_sidebar(array(
            'name' => __('contact-right', 'sogoc'),
            'id' => 'contact-right',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('contact-left', 'sogoc'),
            'id' => 'contact-left',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('contact-bottom', 'sogoc'),
            'id' => 'contact-bottom',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('city-info-left', 'sogoc'),
            'id' => 'city-info',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('city-info-right', 'sogoc'),
            'id' => 'city-info-right',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => __('city-info-bottom-right', 'sogoc'),
            'id' => 'city-info-bottom-right',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('city-info-bottom-left', 'sogoc'),
            'id' => 'city-info-bottom-left',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => __('category-left-1', 'sogoc'),
            'id' => 'category-left-1',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('category-right-1', 'sogoc'),
            'id' => 'category-right-1',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('category-left-3', 'sogoc'),
            'id' => 'category-left-3',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('category-right-4', 'sogoc'),
            'id' => 'category-left-4',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('category-right-4-middle-right', 'sogoc'),
            'id' => 'category-left-4-middle',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('category-right-4-middle-left', 'sogoc'),
            'id' => 'category-left-4-left',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('category-right-5-middle-right', 'sogoc'),
            'id' => 'category-left-5-middle-right',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('category-right-5-middle-left', 'sogoc'),
            'id' => 'category-left-5-middle-left',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('category-left-6', 'sogoc'),
            'id' => 'category-left-5',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => __('category - twitter', 'sogoc'),
            'id' => 'category-twitter',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '<i class="fa fa-twitter"></i></h3>',
        ));

        register_sidebar(array(
            'name' => __('category-row-6', 'sogoc'),
            'id' => 'category-row-6',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title outside roof-red">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('Category-with-children-row-7', 'sogoc'),
            'id' => 'category-with-children-row-7',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('category-row-8', 'sogoc'),
            'id' => 'category-row-7',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => __('category-last-left-top', 'sogoc'),
            'id' => 'category-last-left-top',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => __('category-last-right-top', 'sogoc'),
            'id' => 'category-last-right-top',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('business-center', 'sogoc'),
            'id' => 'business-center',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('business-left', 'sogoc'),
            'id' => 'business-left',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('business-right', 'sogoc'),
            'id' => 'business-right',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('business-bottom-right', 'sogoc'),
            'id' => 'business-bottom-right',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('business-bottom-middle', 'sogoc'),
            'id' => 'business-bottom-middle',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('business-bottom-left', 'sogoc'),
            'id' => 'business-bottom-left',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
          'name' => __('survey right', 'sogoc'),
          'id' => 'survey-right',
          'before_widget' => '<aside class="widget %1$s %2$s">',
          'after_widget' => '</aside>',
          'before_title' => '<h3 class="roof-title">',
          'after_title' => '</h3>',
        ));
        register_sidebar(array(
        'name' => __('survey left', 'sogoc'),
        'id' => 'survey-left',
        'before_widget' => '<aside class="widget %1$s %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="roof-title">',
        'after_title' => '</h3>',
    ));
        register_sidebar(array(
            'name' => __('survey every four', 'sogoc'),
            'id' => 'survey-every-four',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('Primary', 'sogoc'),
            'id' => 'sidebar-primary',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('Notification', 'sogoc'),
            'id' => 'sidebar-notification',
            'before_widget' => '<section class="widget %1$s %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('Recent Posts', 'sogoc'),
            'id' => 'sidebar-home-recent-posts',
            'before_widget' => '<aside class="widget %1$s %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="roof-title outside roof-red">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('Footer', 'sogoc'),
            'id' => 'sidebar-footer',
            'before_widget' => '<section class="widget %1$s %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('form-naim-right-top', 'sogoc'),
            'id' => 'form-naim-right-top',
            'before_widget' => '<section class="widget %1$s %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('form-naim-right-bottom', 'sogoc'),
            'id' => 'form-naim-right-bottom',
            'before_widget' => '<section class="widget %1$s %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('form-naim-left', 'sogoc'),
            'id' => 'form-naim-left',
            'before_widget' => '<section class="widget %1$s %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('form-naim-center', 'sogoc'),
            'id' => 'form-naim-center',
            'before_widget' => '<section class="widget %1$s %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('mivzakim right', 'sogoc'),
            'id' => 'mivzakim-right',
            'before_widget' => '<section class="widget %1$s %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => __('mivzakim left', 'sogoc'),
            'id' => 'mivzakim-left',
            'before_widget' => '<section class="widget %1$s %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="roof-title">',
            'after_title' => '</h3>',
        ));
    }
add_action('widgets_init', 'sogo_widgets_init');

