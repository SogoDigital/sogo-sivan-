<?php

/*
 * debug a given object in a nice way
 *
 * */
function debug($obj)
{
    echo "<pre dir='lrt' style='text-align:left'>";
    var_dump($obj);
    echo "</pre>";
}


$sogo_includes = array(

    'admin/admin.php',                              // Admin functions
    'admin/CMB2/init.php',                          // CMB2
    'lib/cmb2-ext/meta_filters.php',                // CMB2
    'lib/cmb2-ext/autocomplete.php',                // CMB2
//    'lib/cmb2-ext/chosen.php',                      // CMB2
    'lib/cmb2-ext/meta_box_additional_fields.php',  // CMB2
    'lib/init.php',                                 // register items
    'lib/enqueue.php',                              // load scripts
    'lib/post-types.php',                           // register post type
    'lib/extras.php',                               // Sogo custom functions
    'lib/excerpt.php',                              // Initial theme setup and constants
    'lib/widget.php',                               // Initial theme setup and constants
);
sogo_include($sogo_includes);


function sogo_main_class_autoload($sogo_includes)
{

    foreach (glob(dirname(__FILE__) . "/lib/class/*.php") as $filename) {
        $sogo_includes[] = "lib/class/" . basename($filename);
    }
  // parent function.
    return $sogo_includes;
}





function sogo_include($sogo_includes)
{

    foreach ($sogo_includes as $file) {
        if (!$filepath = locate_template($file)) {
            trigger_error(sprintf(__('Error locating %s for include', 'sogo'), $file), E_USER_ERROR);
        }
        require_once $filepath;
    }
    unset($file, $filepath);
}


function sogo_theme_setup()
{
    // load text domain
    load_theme_textdomain('sogo', get_template_directory() . '/languages');

}

add_action('after_setup_theme', 'sogo_theme_setup');

