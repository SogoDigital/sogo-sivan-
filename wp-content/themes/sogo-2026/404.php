<?php
/**
 * עמוד שגיאה 404.
 */
if (!defined('ABSPATH')) {
    exit;
}
get_header();
?>
<section class="page-hero page-hero--404">
    <div class="wrap">
        <p class="page-hero__meta">שגיאה 404</p>
        <h1 class="page-hero__title"><?php echo esc_html(sogo26_option('text_404_title', 'העמוד שחיפשתם לא נמצא.')); ?></h1>
        <p><a class="btn" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(sogo26_option('text_404_button', 'חזרה לעמוד הבית')); ?></a></p>
    </div>
</section>
<?php
get_footer();
