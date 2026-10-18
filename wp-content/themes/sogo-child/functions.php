<?php
define('USE_FONTAWSOME', true);
define('USE_ANIMATION', false);


function sogo_class_autoload()
{

    $sogo_includes = array();
    $sogo_includes =  sogo_main_class_autoload($sogo_includes);
    foreach (glob(dirname(__FILE__) . "/lib/class/*.php") as $filename) {
        $sogo_includes[] = "lib/class/" . basename($filename);
    }
    // parent function.
    sogo_include($sogo_includes);

}

function sogo_child_theme_setup()
{
    // load child text domain
    load_child_theme_textdomain('sogoc', get_stylesheet_directory() . '/languages');


    // load external files
    $sogo_includes = array(
        'admin/options.php',   // Utility functions
        'lib/widget.php',   // Utility functions
        'lib/post-type-init.php',   // Utility functions
        'lib/meta-boxes.php',        // Utility functions
        'lib/tax-boxes.php',        // Utility functions
    );
    //parent function.
    sogo_include($sogo_includes);
    sogo_class_autoload();
}

add_action('after_setup_theme', 'sogo_child_theme_setup');





function sogo_child_scripts()
{
    if (!is_admin()) {
        $dir = get_stylesheet_directory();
        $uri = get_stylesheet_directory_uri();
        wp_enqueue_script('aos-script', $uri . '/vendor/aos/aos.js', array('jquery'), '2.3.1', true);
        wp_enqueue_style( 'aos-style', $uri . '/vendor/aos/aos.css', array(), '2.3.1' );

        add_action( 'wp_enqueue_scripts', 'sogo_load_bxslider' );
//        add_action( 'wp_enqueue_scripts', 'sogo_load_slickslider' );
        add_action( 'wp_enqueue_scripts', 'sogo_load_fancybox' );
        add_action( 'wp_enqueue_scripts', 'sogo_load_fullPage' );
        add_action( 'wp_enqueue_scripts', 'sogo_load_parallax' );
        wp_enqueue_script('sogo-child-scripts', $uri . '/js/scripts.js', array('jquery'), filemtime($dir . '/js/scripts.js'), true);


        wp_localize_script('sogo-child-scripts', 'sogoc', array(
                'next' => __("click to move to next slide","sogoc"),
                'prev' => __("click to move to previous slide","sogoc"),

        ));
	    wp_enqueue_style( 'sogo-style', get_stylesheet_uri(), array(), filemtime( $dir . '/style.css' ) );
        wp_enqueue_style('slickslider-css', $uri . '/vendor/slick/slick.css', array(), '1.8.1', 'all');
        wp_enqueue_script('slickslider', $uri . '/vendor/slick/slick.min.js', array('jquery'), '1.8.1', true);

    }
}


add_action('wp_enqueue_scripts', 'sogo_child_scripts', 2);

function sogo_extra_class($key){
    $val = sogo_meta($key);
    if($val != -1){
        echo $val;
    }
}

/*
 * remove editor from pages
 *
function hide_editor () {

    // Get the Post ID.
    if ( isset ( $_GET[ 'post' ] ) ) $post_id = $_GET[ 'post' ]; else if ( isset ( $_POST[ 'post_ID' ] ) ) $post_id = $_POST[ 'post_ID' ];

    if ( !isset ( $post_id ) || empty ( $post_id ) ) return;

    // Get the name of the Page Template file.
    $template_file = get_post_meta ( $post_id, '_wp_page_template', true );
    $arr = array( 'front-page.php');

    if ( in_array($template_file ,$arr) ) { // edit the template name
        remove_post_type_support ( 'page', 'editor' );
    }

}
add_action('admin_init', 'hide_editor');
*/




function sogo_single_cpt_template( $templates = '' ){
    $single = get_queried_object();

    $template = sogo_meta('template', $single->ID);
    $arr = array('project','case-study');
    if(in_array($single->post_type,$arr) && $template != '')
        $templates = locate_template( $template, false );

    return $templates;
}
//add_filter( 'single_template', 'sogo_single_cpt_template' );


add_filter('next_post_link','add_css_class_to_next_post_link');
function add_css_class_to_next_post_link($link) {
    $link = str_replace("<a ", "<a class='btn-link margin next-btn'  ", $link);
    return $link;
}

add_filter('previous_post_link','add_css_class_to_previous_post_link');
function add_css_class_to_previous_post_link($link) {
    $link = str_replace("<a ", "<a class='btn-link margin previews-btn'", $link);

//    $link = str_replace(">", "><i class=\"fa fa-angle-left\"></i>", $link);
    return $link;
}




function sogo_redirect_en(){
    if(is_main_site() && !isset($_COOKIE['sogo-eng'])){
        setcookie('sogo-eng',true, 0,'/');
       global $wpdb;

        $sql = 'SELECT
	            country
	        FROM
	            ip2nation
	        WHERE
	            ip < INET_ATON("'.$_SERVER['REMOTE_ADDR'].'")
	        ORDER BY
	            ip DESC
	        LIMIT 0,1';

        $country  = $wpdb->get_results($sql);
        if($country){
            if($country[0]->country != 'il'){
                wp_redirect(site_url('en'));
                exit;
            }
        }



    }
}
//add_action('init', 'sogo_redirect_en');




//function sogo_save_lead($cf7) {
//
//$submission = WPCF7_Submission::get_instance();
//if ( $submission ) {
//    $formdata = $submission->get_posted_data();
//
//
//    $name = isset($formdata['your-name'])?$formdata['your-name']: $formdata['contact-name'];
//    $email = isset($formdata['your-email'])?$formdata['your-email']: $formdata['contact-email'];
//    $phone = isset($formdata['your-phone'])?$formdata['your-phone'] : $formdata['contact-phone'];
//    $comments = isset($formdata['message'])?  $formdata['message']: '';
//
//
//
//    $arr = array(
//        'add_remote_lead' => 'doit',
//        'id' => null,
//        'title' =>$name,
//        'comments' =>$comments,
//        'oh_start_date' =>'',
//        'oh_contact' =>'',
//        'oh_other_contact' =>$name,
//        'oh_email' =>$email,
//        'oh_phone_number' =>$phone,
//    );
//    $response = wp_remote_post( 'http://pm.sogo.co.il/', array(
//            'method' => 'POST',
//            'timeout' => 45,
//            'redirection' => 5,
//            'httpversion' => '1.0',
//            'blocking' => true,
//            'headers' => array(),
//            'body' => $arr,
//            'cookies' => array()
//        )
//    );
//}
//
//}
//
//add_action( 'wpcf7_mail_sent', 'sogo_save_lead' );




// contact form 7 thanks page after submitting the form

function mycustom_wp_footer() {
    ?>
    <script type="text/javascript">
        document.addEventListener( 'wpcf7mailsent', function( event ) {
            if ( '618' == event.detail.contactFormId ) {
                location = 'https://sogo.co.il/תודה-רבה/';
            }
            else if ( '125' == event.detail.contactFormId ) {
                location = 'https://sogo.co.il/תודה-רבה/';
            }
            else if ( '134' == event.detail.contactFormId ) {
                location = 'https://sogo.co.il/תודה-רבה/';
            }
            else if ( '2304' == event.detail.contactFormId ) {
                location = 'https://sogo.co.il/תודה-רבה/';
            }
            else if ( '4171' == event.detail.contactFormId ) {
                location = 'https://sogo.co.il/thanks_landing/';
            }
            else if ( '5418' == event.detail.contactFormId ) {
                location = 'https://sogo.co.il/thanks-startup/';
            }
            else if ( '2748' == event.detail.contactFormId ) {
                location = 'https://sogo.co.il/תודה-רבה/';
            }
            else if ( '124' == event.detail.contactFormId ) {
                location = 'https://sogo.co.il/en/thank-you/';
            }
            else if ( '381' == event.detail.contactFormId ) {
                location = 'https://sogo.co.il/en/thank-you/';
            }
            else if ( '31' == event.detail.contactFormId ) {
                location = 'https://sogo.co.il/en/thank-you/';
            }

        }, false );
    </script>
    <?php
}

add_action( 'wp_footer', 'mycustom_wp_footer' );

function utfOrd($c) {
    return intval(array_pop(unpack('H*', $c)),16);
}

function utfChr($c) {
    return pack('H*', base_convert("$c", 10, 16));
}

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';

    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

add_filter('wp_video_shortcode', function ($output) {
    if (!is_page_template('page-champion-toolkit.php')) {
        $output = str_replace('controls="controls"', 'playsinline', $output);
        return $output;
    }
    $output = str_replace('<video', '<video playsinline', $output);
    return $output;
});

function disable_feeds() {
    wp_die(__('RSS feeds are disabled on this site.'));
}

add_action('do_feed', 'disable_feeds', 1);
add_action('do_feed_rdf', 'disable_feeds', 1);
add_action('do_feed_rss', 'disable_feeds', 1);
add_action('do_feed_rss2', 'disable_feeds', 1);
add_action('do_feed_atom', 'disable_feeds', 1);
add_action('do_feed_rss2_comments', 'disable_feeds', 1);
add_action('do_feed_atom_comments', 'disable_feeds', 1);

// Удаляем RSS ссылки из head
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);

// Перенаправляем RSS запросы
function redirect_feeds_to_home() {
    if (is_feed()) {
        wp_redirect(home_url());
        exit;
    }
}
add_action('template_redirect', 'redirect_feeds_to_home');

add_action('admin_init', function() {
    if (isset($_POST['action']) && $_POST['action'] === 'editpost' && isset($_POST['post_ID'])) {
        add_action('wp_loaded', function() {
            if (isset($_POST['post_ID'])) {
                $post_id = $_POST['post_ID'];
                wp_safe_redirect(admin_url("post.php?post={$post_id}&action=edit&message=1"));
                exit;
            }
        });
    }
});
// Performance: load Google reCAPTCHA (CF7) only when the visitor interacts with a form.
// A stub grecaptcha queues ready() callbacks via Google's documented ___grecaptcha_cfg.fns,
// and execute() (called by CF7 on change/submit) triggers the real api.js load.
add_filter('script_loader_tag', function ($tag, $handle, $src) {
    if ($handle !== 'google-recaptcha' || is_admin()) {
        return $tag;
    }
    ob_start(); ?>
    <script id="google-recaptcha-lazy">
        (function (w, d, src) {
            var cfg = w.___grecaptcha_cfg = w.___grecaptcha_cfg || {};
            cfg.fns = cfg.fns || [];
            var loaded = false;
            function load() {
                if (loaded) return;
                loaded = true;
                var s = d.createElement('script');
                s.src = src;
                s.async = true;
                d.head.appendChild(s);
            }
            var stubExecute = function (key, opts) {
                load();
                return new Promise(function (resolve, reject) {
                    cfg.fns.push(function () {
                        if (w.grecaptcha.execute === stubExecute) {
                            return reject(new Error('reCAPTCHA failed to load'));
                        }
                        w.grecaptcha.execute(key, opts).then(resolve, reject);
                    });
                });
            };
            w.grecaptcha = {
                ready: function (cb) { cfg.fns.push(cb); },
                execute: stubExecute
            };
            function onInteract(e) {
                var t = e.target;
                if (t && t.closest && t.closest('form.wpcf7-form, [data-target="#popup-form"]')) {
                    load();
                }
            }
            ['focusin', 'pointerdown', 'touchstart'].forEach(function (type) {
                d.addEventListener(type, onInteract, {passive: true, capture: true});
            });
        })(window, document, <?php echo wp_json_encode($src); ?>);
    </script>
    <?php
    return ob_get_clean();
}, 10, 3);

// Performance: Simple Floating Menu loads 5 icon fonts, only icofont (WhatsApp icon) is used.
add_action('wp_enqueue_scripts', function () {
    // icofont too: 112 KB of CSS + 538 KB font for one icon. The WhatsApp glyph comes from Font Awesome (see below).
    foreach (array('fontawesome-6.3.0', 'eleganticons', 'essentialicon', 'materialdesignicons', 'sfm-fonts', 'iconfont') as $handle) {
        wp_dequeue_style($handle);
    }

    // Performance: Font Awesome 4 (sogo-accessibility / parent theme) from the theme instead of maxcdn.
    // Always enqueued now: it also draws the floating WhatsApp button icon instead of icofont.
    wp_deregister_style('fontawsome');
    wp_enqueue_style('fontawsome', get_stylesheet_directory_uri() . '/vendor/font-awesome/css/font-awesome.min.css', array(), '4.6.3');
    wp_add_inline_style('fontawsome', '.sfm-floating-menu .icofont-whatsapp:before{content:"\f232";font-family:FontAwesome;font-style:normal;font-weight:normal;line-height:1;-webkit-font-smoothing:antialiased}'
        // Tooltip font: the plugin sets "Open Sans" (its Google font, dequeued above, had Hebrew).
        // The theme's own "Open Sans" @font-face is Latin-only, so use the site's Hebrew font.
        . ".sfm-floating-menu .sfm-button .sfm-tool-tip a{font-family:'Open Sans Hebrew Regular',Arial,sans-serif}");
}, 100);

// A11y: the plugin's floating WhatsApp link has only an icon, give it an accessible name.
add_action('wp_footer', function () { ?>
    <script>
        document.querySelectorAll('.sfm-floating-menu a.sfm-shape-button:not([aria-label])').forEach(function (a) {
            a.setAttribute('aria-label', 'שליחת הודעה בוואטסאפ');
        });
    </script>
<?php }, 100);

// Performance: WordPress emoji script (the site uses no emoji, browsers render them natively).
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Performance: no share buttons on the home page, skip ShareThis there (53 KB + tracking request).
add_action('wp_enqueue_scripts', function () {
    if (is_front_page()) {
        wp_dequeue_script('share-this-share-buttons-mu');
        wp_dequeue_style('share-this-share-buttons-sticky');
    }
}, 100);

// Performance: ShareThis is render-blocking in <head>, load it deferred.
add_filter('script_loader_tag', function ($tag, $handle) {
    if ($handle === 'share-this-share-buttons-mu' && strpos($tag, ' defer') === false) {
        $tag = str_replace('<script ', '<script defer ', $tag);
    }
    return $tag;
}, 10, 2);

// Performance: lazy background images. Elements with data-lazy-bg get their background
// only when they come within 300px of the viewport (desktop floors, footer form).
add_action('wp_footer', function () { ?>
    <script>
        (function () {
            var els = document.querySelectorAll('[data-lazy-bg]');
            function show(el) {
                var url = el.getAttribute('data-lazy-bg');
                if (url) {
                    el.style.backgroundImage = 'url("' + url + '")';
                }
                el.removeAttribute('data-lazy-bg');
            }
            if (!('IntersectionObserver' in window)) {
                Array.prototype.forEach.call(els, show);
                return;
            }
            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        io.unobserve(entry.target);
                        show(entry.target);
                    }
                });
            }, {rootMargin: '300px 0px'});
            Array.prototype.forEach.call(els, function (el) { io.observe(el); });
        })();

        // Portfolio videos (preload="none", no autoplay): download and play only while on screen.
        (function () {
            var videos = document.querySelectorAll('.js-lazy-video');
            if (!videos.length) return;
            var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (reduce || !('IntersectionObserver' in window)) return; // poster only
            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    var v = entry.target;
                    if (entry.isIntersecting) {
                        var p = v.play();
                        if (p && p.catch) p.catch(function () {});
                    } else if (!v.paused) {
                        v.pause();
                    }
                });
            }, {rootMargin: '100px 0px'});
            Array.prototype.forEach.call(videos, function (v) { io.observe(v); });
        })();
    </script>
<?php }, 5);

// SEO: FAQPage schema from the ACF FAQ on the home page and on campaign (service) pages.
add_action('wp_head', function () {
    $post_id = get_queried_object_id();
    if (is_front_page()) {
        $rows = get_field('_sogo_home_faq', $post_id);
    } elseif (is_page_template('page-campaigne.php')) {
        $rows = get_field('campaigne_floor5_questions', $post_id);
    } else {
        return;
    }
    if (empty($rows) || !is_array($rows)) {
        return;
    }
    $items = array();
    foreach ($rows as $row) {
        $q = trim(wp_strip_all_tags($row['question'] ?? ''));
        $a = trim(wp_kses($row['answer'] ?? '', array('a' => array('href' => true), 'br' => array(), 'p' => array(), 'strong' => array(), 'b' => array(), 'ul' => array(), 'ol' => array(), 'li' => array())));
        if ($q && $a) {
            $items[] = array(
                '@type'          => 'Question',
                'name'           => $q,
                'acceptedAnswer' => array('@type' => 'Answer', 'text' => $a),
            );
        }
    }
    if ($items) {
        echo '<script type="application/ld+json">' . wp_json_encode(array(
            '@context'   => 'https://schema.org',
            '@type'      => 'FAQPage',
            'mainEntity' => $items,
        ), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "</script>\n";
    }
}, 20);

// A11y: the CF7 forms show their field names as text next to the inputs, not as <label>, so screen readers get no name.
add_filter('wpcf7_form_elements', function ($html) {
    $labels = array(
        'your-name'    => 'שם מלא',
        'your-email'   => 'אימייל',
        'your-phone'   => 'טלפון',
        'your-company' => 'שם החברה',
        'your-message' => 'הודעה',
    );
    foreach ($labels as $name => $label) {
        $html = preg_replace('/<(input|textarea)(?![^>]*aria-label)([^>]*\bname="' . preg_quote($name, '/') . '")/', '<$1 aria-label="' . esc_attr($label) . '"$2', $html);
    }
    return $html;
});

// Performance: stylesheets not needed for the first paint load without blocking render (media=print, then all).
// Matched by URL because some come from plugins. Kept blocking: bootstrap, style.css, rtl.css, fullPage
// (desktop layout), consent + accessibility (visible UI on load).
add_filter('style_loader_tag', function ($tag, $handle, $href) {
    if (is_admin()) {
        return $tag;
    }
    $async = array(
        '/vendor/aos/aos.css',
        '/vendor/slick/slick.css',
        '/vendor/font-awesome/',
        '/catch-scroll-progress-bar/',
        '/contact-form-7/',
        '/simple-floating-menu/',
        '/fancybox/',
    );
    foreach ($async as $part) {
        if (false !== strpos($href, $part)) {
            $noscript = '<noscript>' . trim($tag) . '</noscript>';
            $tag = preg_replace('/media=([\x27"])[^\x27"]*\1/','media="print" onload="this.media=\'all\';this.onload=null"', $tag, 1);
            return $tag . $noscript . "\n";
        }
    }
    return $tag;
}, 10, 3);
