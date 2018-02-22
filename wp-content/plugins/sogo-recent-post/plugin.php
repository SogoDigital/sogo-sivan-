<?php
/*
Plugin Name: Sogo Recent Post
Plugin URI: http://sogo.co.il/plugins/sogo-calendar-widget
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=Z5H7VVZLSPYUE
Description: Display Recent post
Version: 0.1
Author: Oren Havshush
Author URI: http://sogo.co.il
Author Email: oren@sogo.co.il
License:

  Copyright 2011 Sogo Recent Entries (support@sogo.co.il)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


class sogo_recent_post_widget extends WP_Widget
{
    private $plugin_name, $plugin_slug, $loc, $post_type, $category, $post_date, $post_title, $excerpt , $post_per_page , $image;
    /*--------------------------------------------------*/
    /* Constructor
    /*--------------------------------------------------*/

    /**
     * The widget constructor. Specifies the classname and description, instantiates
     * the widget, loads localization files, and includes necessary scripts and
     * styles.
     */
    function sogo_recent_post_widget()
    {

        // Define constants used throughout the plugin
        $this->init_plugin_constants();
        load_textdomain($this->loc, dirname(__FILE__) . '/lang/' . get_locale() . '.mo');
        $widget_opts = array(
            'classname' => $this->plugin_slug,
            'description' => __("This is a simple plugin, that allows you to choose one of your blog's authors (or a random pick),and display its latest posts (as many posts as you'dd like).", $this->loc)
        );
        parent::__construct(
            $this->plugin_slug, // Base ID
            __($this->plugin_name, $this->loc), // Name
            array(__('Sogo Recent Post Widget', $this->loc), 'classname' => $this->plugin_slug,) // Args
        );


        // Load JavaScript and stylesheets
        $this->register_scripts_and_styles(); //no need for that

    } // end constructor

    /*--------------------------------------------------*/
    /* API Functions
    /*--------------------------------------------------*/

    /**
     * Initializes constants used for convenience throughout
     * the plugin.
     */
    private function init_plugin_constants()
    {
        $this->loc = 'sogo';
        $this->plugin_name = 'Sogo Recent Post Widget';
        $t = __('Sogo Recent Post Widget', $this->loc); // we do that so the poedit will scan this
        $this->plugin_slug = 'sogo_recent_post_widget';


    } // end widget

    /**
     * Registers and enqueues stylesheets for the administration panel and the
     * public facing site.
     */
    private function register_scripts_and_styles()
    {
        if (is_admin()) {
            $this->load_file($this->plugin_name, 'css/admin.css');
        } else {
            $url = plugins_url(__FILE__);
            wp_enqueue_script($this->plugin_slug, plugins_url('js/scripts.js', __FILE__), array('jquery'), '1.0', true);
            wp_enqueue_style($this->plugin_slug, plugins_url('css/cal.css', __FILE__), '1.0');
        }

    }

    /**
     * Helper function for registering and enqueueing scripts and styles.
     *
     * @name    The    ID to register with WordPress
     * @file_path        The path to the actual file
     * @is_script        Optional argument for if the incoming file_path is a JavaScript source file.
     */
    private function load_file($name, $file_path, $is_script = false)
    {
        $url = plugins_url($file_path, __FILE__);
        $file = dirname(__FILE__) . '/' . $file_path;
        if (file_exists($file)) {
            if ($is_script) {
                wp_register_script($name, $url);
                wp_enqueue_script($name);
            } else {
                wp_register_style($name, $url);
                wp_enqueue_style($name);
            } // end if
        } // end if

    } // end widget

    /**
     * Outputs the content of the widget.
     *
     * @args            The array of form elements
     * @instance
     */
    function widget($args, $instance)
    {

        extract($args, EXTR_SKIP);

        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        $post_per_page = empty($instance['post_per_page']) ? '' : $instance['post_per_page'];
        $post_date = empty($instance['post_date']) ? 'false' : 'true';
        $post_type = empty($instance['post_type']) ? '' : $instance['post_type'];
        $category = empty($instance['category']) ? 'false' : 'true';
        $excerpt = empty($instance['excerpt']) ? 'false' : 'true';
        $post_title = empty($instance['post_title']) ? 'false' : 'true';
        $image = empty($instance['image']) ? 'false' : 'true';



        $this->post_type = $post_type;
        $this->post_date = $post_date;
        $this->category = $category;
        $this->post_title = $post_title;
        $this->excerpt = $excerpt;
        $this->post_per_page=$post_per_page;
        $this->image=$image;

        // Display the admin form

        echo $before_widget;
        include(dirname(__FILE__) . '/views/widget.php');
        echo $after_widget;

    } // end form





    // end load_file

    /**
     * Processes the widget's options to be saved.
     *
     * @new_instance    The previous instance of values before the update.
     * @old_instance    The new instance of values to be generated via the update.
     */

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags(stripslashes($new_instance['title']));
        $instance['post_type'] = strip_tags(stripslashes($new_instance['post_type']));
        $instance['category'] = strip_tags(stripslashes($new_instance['category']));
        $instance['post_date'] = strip_tags(stripslashes($new_instance['post_date']));
        $instance['post_title'] = strip_tags(stripslashes($new_instance['post_title']));
        $instance['excerpt'] = strip_tags(stripslashes($new_instance['excerpt']));
        $instance['post_per_page'] = strip_tags(stripslashes($new_instance['post_per_page']));
        $instance['image'] = strip_tags(stripslashes($new_instance['image']));


        return $instance;

    }

    /**
     * Generates the administration form for the widget.
     *
     * @instance    The array of keys and values for the widget.
     */
    function form($instance)
    {

        $instance = wp_parse_args(
            (array)$instance,
            array(
                'title' => '',
                'post_title' => '',
                'post_type' => '',
                'category' => '',
                'post_date' => '',
                'excerpt' => '',
                'post_per_page' => '',
                'image' => '',
            )
        );

        $title = strip_tags(stripslashes($instance['title']));
        $post_title = strip_tags(stripslashes($instance['post_title']));
        $post_type = strip_tags(stripslashes($instance['post_type']));
        $category = strip_tags(stripslashes($instance['category']));
        $post_date = strip_tags(stripslashes($instance['post_date']));
        $cf = strip_tags(stripslashes($instance['cf']));
        $excerpt = $instance['excerpt'];
        $post_per_page = $instance['post_per_page'];
        $image = $instance['image'];


        // Display the admin form
        include(dirname(__FILE__) . '/views/admin.php');


    }




} // end class
add_action('widgets_init', create_function('', 'register_widget("sogo_recent_post_widget");'));

