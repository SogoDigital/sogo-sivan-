<?php
/**
 * רשימת פוסטים (בלוג, ארכיון, חיפוש).
 */
if (!defined('ABSPATH')) {
    exit;
}
get_header();
?>
<section class="page-hero">
    <div class="wrap">
        <h1 class="page-hero__title">
            <?php
            if (is_home() && !is_front_page()) {
                single_post_title();
            } elseif (is_archive()) {
                the_archive_title();
            } elseif (is_search()) {
                printf('תוצאות חיפוש: %s', esc_html(get_search_query()));
            } else {
                echo 'הבלוג';
            }
            ?>
        </h1>
    </div>
</section>

<section class="wrap posts">
    <?php if (have_posts()) : ?>
        <div class="posts__grid">
            <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class('post-card'); ?>>
                    <a class="post-card__link" href="<?php the_permalink(); ?>">
                        <span class="post-card__media">
                            <?php if (has_post_thumbnail()) : the_post_thumbnail('large', ['loading' => 'lazy']); else : ?>
                                <i class="post-card__dot" aria-hidden="true"></i>
                            <?php endif; ?>
                        </span>
                        <span class="post-card__date"><?php echo esc_html(get_the_date()); ?></span>
                        <h2 class="post-card__title"><?php the_title(); ?></h2>
                        <span class="post-card__excerpt"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 24)); ?></span>
                    </a>
                </article>
            <?php endwhile; ?>
        </div>
        <div class="pagination"><?php the_posts_pagination(['prev_text' => 'הקודם', 'next_text' => 'הבא']); ?></div>
    <?php else : ?>
        <p class="posts__empty">לא נמצא תוכן להצגה.</p>
    <?php endif; ?>
</section>
<?php
get_footer();
