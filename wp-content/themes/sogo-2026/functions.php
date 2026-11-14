<?php
/**
 * Sogo 2026 – הגדרות ערכת הנושא.
 */

if (!defined('ABSPATH')) {
    exit;
}

define('SOGO26_VERSION', '0.1.0');
define('SOGO26_DIR', get_template_directory());
define('SOGO26_URI', get_template_directory_uri());

/**
 * הגדרות בסיס: כותרת, תמונות ממוזערות, תפריטים, HTML5.
 */
add_action('after_setup_theme', function () {
    load_theme_textdomain('sogo2026', SOGO26_DIR . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('responsive-embeds');
    add_theme_support('custom-logo', ['height' => 100, 'width' => 320, 'flex-width' => true, 'flex-height' => true]);

    register_nav_menus([
        'primary' => 'תפריט ראשי (גם בתפריט המסך המלא)',
        'footer'  => 'תפריט תחתית',
    ]);
});

/**
 * קבצי CSS ו-JS. הספריות נטענות מקומית מתוך הערכה, לא מ-CDN.
 */
add_action('wp_enqueue_scripts', function () {
    $css = SOGO26_DIR . '/assets/css/main.css';
    $js  = SOGO26_DIR . '/assets/js/main.js';

    wp_enqueue_style('sogo26-main', SOGO26_URI . '/assets/css/main.css', [], file_exists($css) ? filemtime($css) : SOGO26_VERSION);

    wp_enqueue_script('sogo26-gsap', SOGO26_URI . '/assets/vendor/gsap.min.js', [], '3.13.0', true);
    wp_enqueue_script('sogo26-scrolltrigger', SOGO26_URI . '/assets/vendor/ScrollTrigger.min.js', ['sogo26-gsap'], '3.13.0', true);
    wp_enqueue_script('sogo26-lenis', SOGO26_URI . '/assets/vendor/lenis.min.js', [], '1.3.25', true);
    wp_enqueue_script('sogo26-main', SOGO26_URI . '/assets/js/main.js', ['sogo26-gsap', 'sogo26-scrolltrigger', 'sogo26-lenis'], file_exists($js) ? filemtime($js) : SOGO26_VERSION, true);
});

/**
 * מסמן שיש JavaScript, כדי שמצבי ההתחלה של האנימציות יופעלו רק כשהן באמת ירוצו.
 */
add_action('wp_head', function () {
    echo "<script>document.documentElement.classList.add('js');</script>\n";
}, 0);

/**
 * טעינה מוקדמת של הפונט כדי למנוע הבהוב.
 */
add_action('wp_head', function () {
    printf(
        '<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n",
        esc_url(SOGO26_URI . '/assets/fonts/rubik-hebrew-wght-normal.woff2')
    );
}, 1);

/**
 * קורא שדה ACF (בעמוד או באפשרויות האתר) ומחזיר ערך ברירת מחדל אם ריק.
 * כך האתר נראה תקין גם לפני שמילאו את השדות.
 */
function sogo26_field($name, $default = '', $source = false)
{
    if (!function_exists('get_field')) {
        return $default;
    }
    $value = get_field($name, $source);
    if ($value === null || $value === '' || $value === false || $value === []) {
        return $default;
    }
    return $value;
}

/** שדה מתוך "הגדרות האתר" (עמוד האפשרויות). */
function sogo26_option($name, $default = '')
{
    return sogo26_field($name, $default, 'option');
}

/**
 * הופך "שלום, *אנחנו סוגו*" לטקסט עם המילים המודגשות בתוך <em>.
 * כל מילה עטופה ב-<span class="w"> כדי שהאנימציה תוכל לחשוף אותן אחת-אחת.
 */
function sogo26_reveal_words($text)
{
    $text = trim((string) $text);
    if ($text === '') {
        return '';
    }
    $out       = '';
    $highlight = false;
    // מפצל לפי כוכביות כדי לזהות קטעים מודגשים.
    $parts = preg_split('/(\*)/u', $text, -1, PREG_SPLIT_DELIM_CAPTURE);
    foreach ($parts as $part) {
        if ($part === '*') {
            $highlight = !$highlight;
            continue;
        }
        $words = preg_split('/\s+/u', $part, -1, PREG_SPLIT_NO_EMPTY);
        foreach ($words as $word) {
            $class = $highlight ? 'w w--hl' : 'w';
            $out  .= '<span class="' . $class . '">' . esc_html($word) . '</span> ';
        }
    }
    return trim($out);
}

/** קישור לוגו: עמוד הבית. */
function sogo26_logo_svg($static = true)
{
    $file = SOGO26_DIR . '/assets/img/' . ($static ? 'logo-static.svg' : 'logo-animated.svg');
    if (!file_exists($file)) {
        return esc_html(get_bloginfo('name'));
    }
    return file_get_contents($file); // phpcs:ignore WordPress.WP.AlternativeFunctions
}

/**
 * עריכת עמוד הבית: במקום עורך הבלוקים ושדה תוכן, מוצגות רק הלשוניות של השדות.
 * כך הממשק פשוט וברור, גם למי שלא מכיר את וורדפרס.
 */
function sogo26_is_front_page_edit($post = null)
{
    $front = (int) get_option('page_on_front');
    if (!$front) {
        return false;
    }
    if ($post && !empty($post->ID)) {
        return (int) $post->ID === $front;
    }
    $id = isset($_GET['post']) ? (int) $_GET['post'] : (isset($_POST['post_ID']) ? (int) $_POST['post_ID'] : 0); // phpcs:ignore WordPress.Security.NonceVerification
    return $id === $front;
}
add_filter('use_block_editor_for_post', function ($use, $post) {
    return sogo26_is_front_page_edit($post) ? false : $use;
}, 10, 2);
add_action('admin_init', function () {
    if (sogo26_is_front_page_edit()) {
        remove_post_type_support('page', 'editor');
    }
});

require_once SOGO26_DIR . '/inc/acf-fields.php';
