<?php
/**
 * תחתית האתר: משפט גדול, פרטי קשר, ניווט ורשתות.
 */
if (!defined('ABSPATH')) {
    exit;
}

$email    = sogo26_option('contact_email');
$phone    = sogo26_option('contact_phone');
$tagline  = sogo26_option('footer_tagline', 'אנחנו בונים אתרים, קמפיינים ומותגים שקשה להתעלם מהם.');
$bg       = sogo26_option('footer_bg');
$bg_url   = is_array($bg) && !empty($bg['url']) ? $bg['url'] : '';
$privacy  = function_exists('get_privacy_policy_url') ? get_privacy_policy_url() : '';

$arrow = '<svg class="arrow" viewBox="0 0 24 24" width="22" height="22" aria-hidden="true" focusable="false"><path d="M7 17 17 7M8 7h9v9" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
?>
</main>

<?php $footer_video = sogo26_option('footer_video'); ?>
<footer class="site-footer" id="contact" data-footer<?php echo $bg_url ? ' style="--footer-bg:url(' . esc_url($bg_url) . ')"' : ''; ?>>
    <?php if ($footer_video) : ?>
        <video class="site-footer__video" muted playsinline preload="auto" aria-hidden="true" data-scrub-video>
            <source src="<?php echo esc_url($footer_video); ?>">
        </video>
    <?php endif; ?>
    <div class="site-footer__inner">
        <div class="site-footer__brand">
            <div class="site-footer__logo"><?php echo sogo26_logo_svg(true); // phpcs:ignore WordPress.Security.EscapeOutput ?></div>
            <p class="site-footer__tagline"><?php echo esc_html($tagline); ?></p>
        </div>

        <div class="site-footer__contact">
            <?php if ($email) : ?>
                <a class="big-link" href="mailto:<?php echo esc_attr($email); ?>"><span><?php echo esc_html($email); ?></span><?php echo $arrow; // phpcs:ignore ?></a>
            <?php endif; ?>
            <?php if ($phone) : ?>
                <a class="big-link" href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>"><span><?php echo esc_html($phone); ?></span><?php echo $arrow; // phpcs:ignore ?></a>
            <?php endif; ?>
            <?php if (!$email && !$phone && current_user_can('edit_posts')) : ?>
                <p class="site-footer__hint">פרטי יצירת הקשר מוזנים ב"הגדרות האתר" בלוח הבקרה.</p>
            <?php endif; ?>

            <nav class="site-footer__nav" aria-label="תפריט תחתית">
                <?php
                wp_nav_menu([
                    'theme_location' => 'footer',
                    'container'      => false,
                    'menu_class'     => 'site-footer__list',
                    'depth'          => 1,
                    'fallback_cb'    => function () {
                        echo '<ul class="site-footer__list">';
                        wp_list_pages(['title_li' => '', 'depth' => 1, 'number' => 8, 'sort_column' => 'menu_order']);
                        echo '</ul>';
                    },
                ]);
                ?>
            </nav>
        </div>
    </div>

    <div class="site-footer__bottom">
        <small><?php echo esc_html(str_replace('{year}', date_i18n('Y'), sogo26_option('text_copyright', '© {year} סוגו'))); ?></small>
        <?php if ($privacy) : ?>
            <a href="<?php echo esc_url($privacy); ?>"><?php echo esc_html(sogo26_option('text_privacy', 'מדיניות פרטיות')); ?></a>
        <?php endif; ?>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
