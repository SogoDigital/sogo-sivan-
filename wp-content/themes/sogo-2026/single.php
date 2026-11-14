<?php
/**
 * פוסט בודד.
 */
if (!defined('ABSPATH')) {
    exit;
}
get_header();
?>
<?php while (have_posts()) : the_post(); ?>
    <section class="page-hero">
        <div class="wrap">
            <p class="page-hero__meta"><?php echo esc_html(get_the_date()); ?></p>
            <h1 class="page-hero__title"><?php the_title(); ?></h1>
        </div>
    </section>
    <article <?php post_class('wrap entry'); ?>>
        <?php if (has_post_thumbnail()) : ?>
            <figure class="entry__thumb"><?php the_post_thumbnail('large'); ?></figure>
        <?php endif; ?>
        <div class="entry__content"><?php the_content(); ?></div>
    </article>
<?php endwhile; ?>
<?php
get_footer();
