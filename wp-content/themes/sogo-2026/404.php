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
        <h1 class="page-hero__title">העמוד שחיפשתם לא נמצא.</h1>
        <p><a class="btn" href="<?php echo esc_url(home_url('/')); ?>">חזרה לעמוד הבית</a></p>
    </div>
</section>
<?php
get_footer();
