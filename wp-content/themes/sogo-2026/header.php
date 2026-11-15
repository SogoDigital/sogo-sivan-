<?php
/**
 * כותרת עליונה: כרטיס צף עם לוגו, כפתור פעולה ותפריט מסך מלא.
 */
if (!defined('ABSPATH')) {
    exit;
}
$cta_text = sogo26_option('header_cta_text', 'בואו נדבר');
$cta_url  = sogo26_option('header_cta_url', '#contact');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <?php wp_head(); ?>
</head>
<body <?php body_class('sogo26'); ?>>
<?php wp_body_open(); ?>

<?php if (sogo26_preloader_on()) : ?>
<div class="preloader" id="preloader" aria-hidden="true">
    <div class="preloader__inner">
        <div class="preloader__logo"><?php echo sogo26_logo_svg(true); // phpcs:ignore WordPress.Security.EscapeOutput ?></div>
        <div class="preloader__counter"><span data-preloader-count>0</span><b>%</b></div>
        <div class="preloader__bar"><i data-preloader-bar></i></div>
    </div>
</div>
<?php endif; ?>

<a class="skip-link" href="#main"><?php echo esc_html(sogo26_option('text_skip', 'דלג לתוכן')); ?></a>

<header class="site-header" id="site-header">
    <a class="site-header__logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="סוגו, לעמוד הבית">
        <?php echo sogo26_logo_svg(true); // phpcs:ignore WordPress.Security.EscapeOutput ?>
    </a>

    <div class="site-header__card">
        <a class="btn btn--ghost btn--small" href="<?php echo esc_url($cta_url); ?>"><?php echo esc_html($cta_text); ?></a>
        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="fullscreen-menu">
            <span class="menu-toggle__label screen-reader-text"><?php echo esc_html(sogo26_option('text_menu', 'תפריט')); ?></span>
            <span class="menu-toggle__bars" aria-hidden="true"><i></i><i></i></span>
        </button>
    </div>
</header>

<div class="fullscreen-menu" id="fullscreen-menu" aria-hidden="true">
    <div class="fullscreen-menu__inner">
        <nav class="fullscreen-menu__nav" aria-label="תפריט ראשי">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'fullscreen-menu__list',
                'fallback_cb'    => function () {
                    echo '<ul class="fullscreen-menu__list">';
                    wp_list_pages(['title_li' => '', 'depth' => 1, 'number' => 8, 'sort_column' => 'menu_order']);
                    echo '</ul>';
                },
            ]);
            ?>
        </nav>
        <div class="fullscreen-menu__contact">
            <?php if ($mail = sogo26_option('contact_email')) : ?>
                <a href="mailto:<?php echo esc_attr($mail); ?>"><?php echo esc_html($mail); ?></a>
            <?php endif; ?>
            <?php if ($tel = sogo26_option('contact_phone')) : ?>
                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $tel)); ?>"><?php echo esc_html($tel); ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_template_part('template-parts/social-rail'); ?>

<main id="main" class="site-main">
