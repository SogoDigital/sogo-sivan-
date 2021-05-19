<?php
global $fullpage;
$fullpage = '';
get_header();
the_post();
$bg = wp_is_mobile() ? sogo_meta('bg-mobile') : sogo_meta('bg');
$col = wp_is_mobile() ? 'col-md-12' : 'col-md-4';
?>
    <section id="single_project_info_row" class="relative margin-bottom-50"
             style="background-color: <?php echo get_field('sogo_info_sec_color'); ?>">
        <div class="continer-fluid">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="centered_project_info col-md-7 col-sm-10 col-xs-12">
                    <h1 class="h1 font-weight-bold"><?php echo get_field('sogo_info_sec_title') ?></h1>
                    <div class="project_seperator"></div>
                    <p><?php echo get_field('sogo_info_sec_text') ?></p>
                </div>
            </div>
            <div class="middle_line_down"></div>
        </div>
    </section>

<?php
while (have_rows('_sogo_project_repeater')): the_row();
    $i = get_row_index(); ?>

    <section class="switching_col_sec container-fluid margin-bottom-50">
        <div class="row <?php echo ($i % 2 === 0) ? 'flex-column-reverse' : 'block-on-mob'; ?>">

            <div class="col-md-6 d-flex align-items-center justify-content-center mob_xy_align">
                <div class="col-md-8 col-sm-10 col-xs-11">
                    <h2 class="h1 font-weight-bold"><?php echo the_sub_field('_sogo_rep_title') ?></h2>
                    <p><?php echo the_sub_field('_sogo_rep_text') ?></p>
                </div>
            </div>

            <div class="col-md-6 <?php echo ($i % 2 === 0) ? 'pr-0' : 'pl-0'; ?>">
                <img class="img-responsive" src="<?php the_sub_field('_sogo_rep_img') ?>" alt="">
            </div>

        </div>
    </section>

<?php endwhile; ?>

<?php while (have_rows('_sogo_gallery_repeater')): the_row(); ?>

    <?php $is_gallery = count(get_sub_field('_sogo_gallery')) > 1; ?>

    <section class="single_project_gallery_row container-fluid margin-bottom-50">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-sm-11 col-xs-11 px-0">
                <div class='contain_100'>
                    <div class="gallery_con <?php echo ($is_gallery) ? 'js_gallery_kobi gallery' : 'single'; ?>">
                        <?php foreach (get_sub_field('_sogo_gallery') as $gallery) : ?>
                            <div><img class="img-responsive" src="<?php echo $gallery['url']; ?>"></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endwhile; ?>

<?php

$get_term_id = wp_get_object_terms(get_the_ID(), 'project-cat');

$relevant = new WP_Query(array(
    'post_type' => 'project',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'post__not_in' => array(get_the_ID()),
    'tax_query' => array(
        array(
            'taxonomy' => 'project-cat',
            'field' => 'term_id',
            'terms' => $get_term_id[0]->term_id
        )
    )

)); ?>

    <div class="container-fluid">
        <section class="more_projects_grid row d-flex justify-content-center margin-bottom-50">
            <div class="col-md-11">
                <h2 class="more_posts_title">לצפייה בעוד פרויקטים דומים</h2>
                <?php while ($relevant->have_posts()): $relevant->the_post(); ?>

                    <div class="col-md-4 col-sm-6">
                        <div class="project-box zoom-in-effect">
                            <div itemscope itemtype="http://schema.org/CreativeWork" class="thumbnail-wrapper img-box">

                                <a itemprop="url" href="<?php the_permalink() ?>"
                                   title="<?php echo esc_attr(get_the_title()) ?>">
                                    <figure>
                                        <img itemprop="image"
                                             src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>"
                                             alt="<?php echo esc_attr(get_the_title()) ?>">
                                        <div class="project-small-title text-right">
                                            <span itemprop="sub_title"><?php echo get_field('sogo_subtitle_main_page') ?></span>
                                        </div>
                                        <div class="project-title text-right">
                                            <span itemprop="name"><?php the_title() ?></span>
                                        </div>
                                    </figure>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php //the_title();
                endwhile;
                ?>
            </div>
        </section>
    </div>

<?php get_footer() ?>