<?php
/**
 * Created by PhpStorm.
 * User: Amit Matat
 * Date: 12/31/2015
 * Time: 11:46 AM
 */

// @todo FIx category for custom post type
$args=array(
    'post_type' => $post_type,
    'posts_per_page' => $post_per_page,
    'post__not_in' => array(get_the_ID())
);

if($title !=''){
    echo $before_title. $title. $after_title;
}
// The Query
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {

    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        ?>
        <div class="plugin-box">
            <a href="<?php the_permalink() ?>">
                <div class="thumbnail-wrapper">
                    <?php the_post_thumbnail() ?>
                </div>
            </a>
            <div class="publish-wrapper">
                <span class="float-left"><?php _e('Publish in','sogoc') ?>: <?php the_category(' , '); ?></span>
                <span class="float-right"><?php echo get_the_date(get_option('date_format')) ?></span>
            </div>
            <a href="<?php the_permalink() ?>">
                <div class="plugin-title green text-center">
                    <span><?php  the_title(); ?></span>
                </div>
            </a>

            <div class="plugin-description text-center">
               <?php the_excerpt() ?>
            </div>
        </div>
        <?php
    }

} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();




