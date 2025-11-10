<?php

get_header();
//the_post();
$is_mobile = wp_is_mobile();

?>

    <section id="floor1" class="relative"
             style="background: url('<?php echo get_field('_sogo_ver3_floor1_bg'); ?>'); background-repeat: no-repeat;
                     background-size: cover; background-position: center right">
        <div class="container-fluid">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-12 col-lg-6 floor1-right"></div>
                <div class="col-12 col-lg-6 floor1-left">
                    <div class="row d-flex align-items-center">
                        <div class="col-12 col-lg-8 position-relative">
                            <?php $floor1_title_color = (get_field('_sogo_ver3_floor1_title_desktop_color')) ? get_field('_sogo_ver3_floor1_title_desktop_color') : '#fdfdfc'; ?>
                            <h1 style="color: <?php echo ($is_mobile) ? '#fdfdfc' : $floor1_title_color; ?>" class="h1 font-weight-bold floor1-title position-relative">
                                <?php echo get_field('_sogo_ver3_floor1_title') ?>
                                <img class="position-absolute horizontal-line position-absolute" src="<?php echo get_stylesheet_directory_uri() . '/images/horizental_line.png' ?>">
                            </h1>
                            <div class="floor1-text" style="color: <?php echo $floor1_text_color; ?>"><?php echo get_field('_sogo_ver3_floor1_text') ?></div>
                        </div>
                        <img class="position-absolute vertical-line position-absolute" src="<?php echo get_stylesheet_directory_uri() . '/images/vertical_line.png' ?>">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="floor1-mobile">
        <div class="container-fluid">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-12 position-relative">
                    <img class="position-absolute mobile-line" src="<?php echo get_stylesheet_directory_uri() . '/images/mobile_line.png' ?>">
                    <div style="color: <?php echo get_field('_sogo_ver3_floor1_text_color') ?>; background-color: <?php echo get_field('_sogo_ver3_floor1_text_bg') ?>" class="floor1-text"><?php echo get_field('_sogo_ver3_floor1_text') ?></div>
                </div>
            </div>
        </div>
    </section>
    <section id="floor2" class="relative text-center">
        <?php
            $floor2_image_desktop = get_field('_sogo_ver3_floor2_image');
            $floor2_image_mobile = (get_field('_sogo_ver3_floor2_image_mobile')) ? get_field('_sogo_ver3_floor2_image_mobile') : $floor2_image_desktop;
        ?>
        <?php $floor2_image = ($is_mobile) ? $floor2_image_mobile : $floor2_image_desktop; ?>
        <?php echo wp_get_attachment_image($floor2_image, 'full', false, array('class'=> 'img-fluid')) ; ?>
    </section>
    <section id="floor3" class="relative">
        <div class="continer-fluid">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-xs-12 col-lg-6 text-center">
                    <?php $floor3_text_color = (get_field('_sogo_ver3_floor3_text_color')) ? get_field('_sogo_ver3_floor3_text_color') : '#274c8c' ?>

                    <h2 class="" style="color: <?php echo $floor3_text_color ?>"><?php echo get_field('_sogo_ver3_floor3_title') ?></h2>
                    <?php $floor3_image = get_field('_sogo_ver3_floor3_line'); ?>
                    <?php if($floor3_image) : ?>
                        <?php echo wp_get_attachment_image($floor3_image, 'full', false, array('class'=> 'img-fluid')) ; ?>
                    <?php else: ?>
                        <img src="<?php echo get_stylesheet_directory_uri();?>/images/floor3-divider.png">
                    <?php endif; ?>
                    <div><?php echo get_field('_sogo_ver3_floor3_text') ?></div>
                </div>
            </div>
        </div>
    </section>
    <?php while (have_rows('_sogo_ver3_floor_repeater')): the_row(); ?>
        <section class="relative floor-repeater">
            <?php if (get_sub_field('one_image')) : ?>
                <div class="container-fluid">
                    <div class="row d-flex align-items-center justify-content-center">
                        <div class="col-xs-12 text-center p-0">
                            <?php
                            $desktop_one_image = get_sub_field('one_image');
                            $mobile_one_image = (get_sub_field('one_image_mobile')) ? get_sub_field('one_image_mobile') : get_sub_field('one_image');
                            ?>
                            <?php echo wp_get_attachment_image(($is_mobile) ? $mobile_one_image : $desktop_one_image, 'full', false, array('class'=> 'img-fluid one-image')) ; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (get_sub_field('left_image') && get_sub_field('right_image')) : ?>
                <div class="container-fluid">
                    <div class="row d-flex align-items-center justify-content-center images2 flex-column flex-lg-row">
                        <div class="col-xs-12 col-lg-6 p-0">
                            <?php echo wp_get_attachment_image(get_sub_field('left_image'), 'full', false, array('class'=> 'img-fluid w-100')) ; ?>
                        </div>
                        <div class="col-xs-12 col-lg-6 p-0">
                            <?php echo wp_get_attachment_image(get_sub_field('right_image'), 'full', false, array('class'=> 'img-fluid w-100')) ; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (get_sub_field('icons')) : ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex align-items-center justify-content-center flex-wrap">
                                <?php while (have_rows('icons')): the_row(); ?>
                                    <?php echo wp_get_attachment_image(get_sub_field('icon'), 'full', false, array('class'=> 'img-fluid p-2 floor-icon')) ; ?>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endif; ?>
        </section>
    <?php endwhile; ?>

<div class="campaigne-floor5 container-fluid">

    <div class="row justify-content-center">
        <div class="col-12 col-lg-12">
            <div class="row justify-content-center d-flex">
                <div class="col-12 col-lg-8">
                    <h2 class="campaigne-floor5-title text-center"><?php echo get_field('_sogo_project_faq_title')?></h2>
                    <h3 class="campaigne-floor5-subtitle text-center"><?php echo get_field('_sogo_project_faq_subtitle')?></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center d-flex">
<!--        <div class="col-12 col-lg-6">-->
<!--            <div class="row justify-content-center d-flex">-->
<!--                <div class="col-12 col-lg-8">-->
<!--                    <p class="campaigne-floor5-title text-center">--><?php //echo get_field('_sogo_home_faq_title')?><!--</p>-->
<!--                    <p class="campaigne-floor5-subtitle text-center">--><?php //echo get_field('_sogo_home_faq_subtitle')?><!--</p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        <div class="col-12 col-lg-8">
            <?php
            $questions = array();
            if (have_rows('_sogo_project_faq')):
                $counter = 0;
                while (have_rows('_sogo_project_faq')): the_row(); ?>
                    <div class="faq-content">
                        <div class="accordion panel-group h-100 questions-accord rounded">
                            <div class="panel" data-target="#panelBody<?= $counter ?>" data-toggle="collapse"
                                 data-parent=".accordion">
                                <div class="panel-heading cursor-pointer">
                                    <h4 class="panel-title mb-0 d-flex align-items-center justify-content-start">
                                        <i class="fa fa-close ms-3"></i>
                                        <a class="font-weight-semibold accordion-toggle collapsed jobs-custom-icon-style text-color-1">
                                            <?php the_sub_field('question') ?>
                                        </a>

                                    </h4>
                                </div>
                                <div id="panelBody<?php echo $counter; ?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="">
                                            <?php the_sub_field('answer'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $counter++;
                endwhile;
            endif; ?>
        </div>
    </div>
</div>

<?php $category = get_the_terms( $post->ID, 'project-cat' )[0]; ?>
<?php if($category): ?>
    <?php $related = get_field('_sogo_related_projects', $category->taxonomy . '_' . $category->term_id)?>
    <?php if($related): ?>
        <?php unset($related[array_search($post->ID, $related)]);?>
        <?php shuffle($related); ?>
        <?php $related =  array_slice($related, 0, 4); // get first four only; ?>
    <?php endif; ?>
<?php endif; ?>

<?php if($related) : ?>
    <div class="container-fluid">
        <div class="row projects_grid_con">
            <div class="col-md-11">
                <h2 class="page-title text-center margin-top-60">פרויקטים נוספים</h2>
                <div class="row d-flex archive-projects">
                    <?php foreach ($related as $post_id) { ?>
                        <?php set_query_var( 'post_id', $post_id );; ?>
                        <?php echo get_template_part('template-arcive-project'); ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


<?php
$prev_post = get_previous_post();
if($prev_post) {
    $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
    ?>
    <a rel="prev" href="<?php echo get_permalink($prev_post->ID) ?>" title="<?php echo $prev_title ?>" class="d-none d-md-block btnControl prev-single-project">
        <span class="position-relative w-100 h-100 displayTable">
            <span class="prev-single-project-bottom">
                <?php echo get_the_post_thumbnail( $prev_post->ID, 'thumbnail', array( 'class' => 'alignleft' ) ); ?>
            </span>
            <span class="prev-single-project-top"><?php echo $prev_title ?></span>
        </span>
    </a>
<?php
}

$next_post = get_next_post();
if($next_post) {
    $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
?>
    <a rel="next" href="<?php echo get_permalink($next_post->ID) ?>" title="<?php echo $next_title ?>" class="d-none d-md-block btnControl next-single-project">
        <span class="position-relative w-100 h-100 displayTable">
            <span class="next-single-project-top"><?php echo $next_title ?></span>
            <span class="next-single-project-bottom">
                <?php echo get_the_post_thumbnail( $next_post->ID, 'thumbnail', array( 'class' => 'alignleft' ) ); ?>
            </span>
        </span>
    </a>
<?php
}
?>
<?php get_footer() ?>
