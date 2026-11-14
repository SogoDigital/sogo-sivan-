<?php
/**
 * עמוד רגיל.
 */
if (!defined('ABSPATH')) {
    exit;
}
get_header();
?>
<?php while (have_posts()) : the_post(); ?>
    <section class="page-hero">
        <div class="wrap">
            <h1 class="page-hero__title"><?php the_title(); ?></h1>
        </div>
    </section>
    <article <?php post_class('wrap entry'); ?>>
        <div class="entry__content"><?php the_content(); ?></div>
    </article>
<?php endwhile; ?>
<?php
get_footer();
