<?php
/*
Template Name: Landing page
*/

get_header('landing');
?>

<div id="landing">
    <?php if(get_field('_sogo_landing_floor1_show_hide') !== false): ?>
        <div class="landing-floor1">
        <div class="p-3">
            <div class="landing-floor1-wrapper" style="background-image: url('<?php echo get_field('_sogo_landing_floor1_bg')?>')">
                <div class="landing-floor1-nofluid h-100">
                    <div class="container-fluid position-relative h-100">
                        <div class="row justify-content-center h-100">
                            <div class="col-12 h-100 m-0">
                                <div class="row justify-content-center h-100">
                                    <div class="col-11 col-lg-6">
                                        <div class="landing-floor1-info h-100 d-flex flex-column justify-content-center">
                                            <div class="">
                                                <div class="landing-floor1-logo">
                                                    <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor1_logo'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                                </div>
                                                <p class="landing-floor1-top-text"><?php echo get_field('_sogo_landing_floor1_top_text')?></p>
                                                <p class="landing-floor1-title"><?php echo get_field('_sogo_landing_floor1_title')?></p>
                                                <p class="landing-floor1-subtitle"><?php echo get_field('_sogo_landing_floor1_subtitle')?></p>
                                                <a class="gradient-btn" href="<?php echo get_field('_sogo_landing_floor1_button_link')?>">
                                                    <span class="gradient-btn-text">
                                                        <?php echo get_field('_sogo_landing_floor1_button_text')?>
                                                    </span>
                                                    <span class="gradient-btn-arrow">
                                                        <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor1_button_arrow'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                                    </span>

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-none d-xl-block col-6">
                                        <div class="landing-floor1-ronit-wrapper h-100 d-flex align-items-end">
                                            <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor1_ronit'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if(get_field('_sogo_landing_floor2_show_hide') !== false): ?>
        <div class="landing-floor2">
        <div class="container-fluid position-relative">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="landing-floor2-top-section text-center">
                        <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor2_top_image'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                        <p class="landing-section-title mb-0"><?php echo get_field('_sogo_landing_floor2_title')?></p>
                        <p class="landing-floor2-subtitle mb-0"><?php echo get_field('_sogo_landing_floor2_subtitle')?></p>
                    </div>
                    <div class="row">
                        <?php while (have_rows('_sogo_landing_floor2_items')) : the_row(); ?>
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="landing-floor2-item position-relative">
                                    <div class="landing-floor2-item-icon">
                                        <?php echo wp_get_attachment_image(get_sub_field('icon'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                    </div>
                                    <p class="landing-floor2-item-title"><?php echo get_sub_field('title')?></p>
                                    <p class="landing-floor2-item-text mb-0"><?php echo get_sub_field('text')?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="text-center">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="landing-floor2-right-arrow">
                                <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor2_button_right_arrow'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                            </div>
                            <div class="landing-button">
                                <a class="gradient-btn" href="<?php echo get_field('_sogo_landing_floor2_button_link')?>">
                                    <span class="gradient-btn-text">
                                        <?php echo get_field('_sogo_landing_floor2_button_text')?>
                                    </span>
                                    <span class="gradient-btn-arrow">
                                        <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor1_button_arrow'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                    </span>
                                </a>
                            </div>
                            <div class="landing-floor2-left-arrow">
                                <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor2_button_left_arrow'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if(get_field('_sogo_landing_floor3_show_hide') !== false): ?>
        <div class="landing-floor3" style="background-image: url('<?php echo get_field('_sogo_landing_floor3_bg')?>')">
        <div class="container-fluid">
            <div class="landing-floor3-wrapper">
                <div class="landing-floor3-bg-lines" style="background-image: url('<?php echo get_field('_sogo_landing_floor3_bg_lines')?>'); ">
                    <div class="landing-floor3-top-section text-center">
                        <p class="landing-floor3-title mb-0"><?php echo get_field('_sogo_landing_floor3_title')?></p>
                        <p class="landing-floor3-subtitle mb-0"><?php echo get_field('_sogo_landing_floor3_subtitle')?></p>
                    </div>
                    <div class="row justify-content-center">
                        <div class="d-none d-xl-flex col-6 landing-image-column">
                            <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor3_image'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                        </div>
                        <div class="col-11 col-xl-6 landing-items-column">
                            <div class="landing-floor3-items landing-items-scrollable">
                                <?php while (have_rows('_sogo_landing_floor3_items')) : the_row(); ?>
                                    <div class="landing-floor3-item position-relative bg-white mb-4">
                                        <div class="d-flex gap-4">
                                            <div class="landing-floor3-item-icon">
                                                <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor3_item_image'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                            </div>
                                            <p class="landing-floor3-item-text mb-0"><?php echo get_sub_field('text')?></p>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if(get_field('_sogo_landing_floor4_show_hide') !== false): ?>
        <div class="landing-floor4 py-4">
        <div class="landing-floor4-wrapper">
            <div class="container-fluid position-relative">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="landing-floor4-top-section text-center">
                            <p class="landing-section-top-text mb-3"><?php echo get_field('_sogo_landing_floor4_top_text')?></p>
                            <p class="landing-section-title mb-0"><?php echo get_field('_sogo_landing_floor4_title')?></p>
                        </div>
                        <div class="row">
                            <?php while (have_rows('_sogo_landing_floor4_items')) : the_row(); ?>
                                <div class="col-6 col-lg-4">
                                    <div class="landing-floor4-item position-relative">
                                        <div class="landing-floor4-item-icon">
                                            <?php echo wp_get_attachment_image(get_sub_field('icon'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                        </div>
                                        <p class="landing-floor4-item-title"><?php echo get_sub_field('title')?></p>
                                        <p class="landing-floor4-item-text mb-0"><?php echo get_sub_field('text')?></p>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="text-center">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="landing-floor2-right-arrow">
                                    <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor2_button_right_arrow'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                </div>
                                <div class="landing-button">
                                    <a class="gradient-btn" href="<?php echo get_field('_sogo_landing_floor4_button_link')?>">
                                        <span class="gradient-btn-text">
                                            <?php echo get_field('_sogo_landing_floor4_button_text')?>
                                        </span>
                                        <span class="gradient-btn-arrow">
                                            <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor1_button_arrow'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                        </span>
                                    </a>
                                </div>
                                <div class="landing-floor2-left-arrow">
                                    <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor2_button_left_arrow'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if(get_field('_sogo_landing_floor5_show_hide') !== false): ?>
        <div class="landing-floor5 py-4">
        <div class="landing-floor5-bg d-none d-lg-block">
            <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor5_bg'), 'full', false, array('class'=> 'img-fluid w-100')) ; ?>
        </div>
        <div class="landing-floor5-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div>
                            <p class="landing-floor5-title"><?php echo get_field('_sogo_landing_floor5_title')?></p>
                            <p class="landing-floor5-subtitle"><?php echo get_field('_sogo_landing_floor5_subtitle')?></p>
                            <a class="gradient-btn" href="<?php echo get_field('_sogo_landing_floor5_button_link')?>">
                                <span class="gradient-btn-text">
                                    <?php echo get_field('_sogo_landing_floor5_button_text')?>
                                </span>
                                <span class="gradient-btn-arrow">
                                    <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor1_button_arrow'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if(get_field('_sogo_landing_floor6_show_hide') !== false): ?>
        <div class="landing-floor6 py-4" style="background-image: url('<?php echo get_field('_sogo_landing_floor6_bg')?>')">
        <div class="landing-floor6-wrapper">
            <div class="container-fluid position-relative">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="landing-floor6-top-section text-center">
                            <p class="landing-section-top-text mb-3"><?php echo get_field('_sogo_landing_floor6_top_text')?></p>
                            <p class="landing-section-title mb-0"><?php echo get_field('_sogo_landing_floor6_title')?></p>
                        </div>
                        <div class="row">
                            <?php while (have_rows('_sogo_landing_floor6_items')) : the_row(); ?>
                                <?php $landing_floor6_item_video = get_sub_field('video'); ?>
                                <?php $landing_floor6_item_video_poster = get_sub_field('poster'); ?>
                                <?php $landing_floor6_item_video_title = get_sub_field('title'); ?>
                                <?php $iframe_youtube = sogo_get_youtube_iframe_from_text($landing_floor6_item_video); ?>
                                <div class="col-12 col-sm-6 col-lg-3 mb-0">
                                    <div class="landing-floor6-item position-relative">
                                        <div class="cubic video-cubic embed-container position-relative border-radius-1"
                                             data-iframe="<?php echo esc_attr($iframe_youtube) ?>"
                                             style="height: auto; background: url(<?php echo $landing_floor6_item_video_poster ?>)  center; background-size: cover ; ">
                                            <div class="play-icon position-absolute"></div>
                                        </div>
                                        <div class="bg-white p-3 text-center">
                                            <p class="landing-floor6-item-title mb-0"><?php echo $landing_floor6_item_video_title; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if(get_field('_sogo_landing_floor7_show_hide') !== false): ?>
        <div class="landing-floor7 py-4" style="background-image: url('<?php echo get_field('_sogo_landing_floor7_bg')?>')">
        <div class="landing-floor7-wrapper">
            <div class="container-fluid position-relative">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="landing-floor7-top-section text-center">
                            <p class="landing-section-top-text mb-3"><?php echo get_field('_sogo_landing_floor7_top_text')?></p>
                            <p class="landing-section-title mb-0"><?php echo get_field('_sogo_landing_floor7_title')?></p>
                        </div>
                        <div class="masonry-container">
                            <?php while (have_rows('_sogo_landing_floor7_items')) : the_row(); ?>
                                <div class="testimonial-card">
                                    <div class="d-flex justify-content-start align-items-center mb-4">
                                        <div class="testimonial-image">
                                            <?php echo wp_get_attachment_image(get_sub_field('image'), 'full', false, array('class'=> 'stars-image')); ?>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="testimonial-name"><?php echo get_sub_field('name'); ?></span>
                                            <span class="testimonial-role"><?php echo get_sub_field('role'); ?></span>
                                        </div>
                                    </div>
                                    <div class="mb-4 testimonial-text">
                                        <?php echo get_sub_field('text'); ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="text-center">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="landing-floor2-right-arrow">
                                    <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor2_button_right_arrow'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                </div>
                                <div class="landing-button">
                                    <a class="gradient-btn" href="<?php echo get_field('_sogo_landing_floor7_button_link')?>">
                                    <span class="gradient-btn-text">
                                        <?php echo get_field('_sogo_landing_floor7_button_text')?>
                                    </span>
                                        <span class="gradient-btn-arrow">
                                        <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor1_button_arrow'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                    </span>
                                    </a>
                                </div>
                                <div class="landing-floor2-left-arrow">
                                    <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor2_button_left_arrow'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if(get_field('_sogo_landing_floor8_show_hide') !== false): ?>
        <div class="landing-floor8 py-4" style="background-image: url('<?php echo get_field('_sogo_landing_floor8_left_bg')?>')">
        <div class="landing-floor8-wrapper">
            <div class="container-fluid">
                <div class="row justify-content-between flex-column-reverse flex-lg-row">
                    <div class="col-12 col-lg-5 offset-lg-1">
                        <p class="landing-floor8-title mb-0"><?php echo get_field('_sogo_landing_floor8_title')?></p>
                        <?php
                        if (have_rows('_sogo_faq_questions')):
                            $counter = 0;
                            ?>
                            <div class="accordion accordion-flush" id="faqAccordion">
                                <?php
                                while (have_rows('_sogo_faq_questions')): the_row();
                                    // Проверяем, является ли это первым элементом
                                    $isFirst = ($counter === 0);
                                    ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button <?= $isFirst ? '' : 'collapsed' ?>" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapse<?= $counter ?>" aria-expanded="<?= $isFirst ? 'true' : 'false' ?>"
                                                    aria-controls="flush-collapse<?= $counter ?>">
                                                <span><?php the_sub_field('question') ?></span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse<?php echo $counter; ?>" class="accordion-collapse collapse <?= $isFirst ? 'show' : '' ?>"
                                             data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                <?php the_sub_field('answer'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $counter++;
                                endwhile;
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="d-none d-lg-block col-12 col-lg-6 mb-4 mb-lg-0">
                        <div class="landing-floor8-image-wrapper">
                            <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor8_image'), 'full', false, array('class'=> 'img-fluid w-100')) ; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if(get_field('_sogo_landing_floor9_show_hide') !== false): ?>
        <div class="landing-floor9 py-4" style="background-image: url('<?php echo get_field('_sogo_landing_floor9_right_bg')?>'), url('<?php echo get_field('_sogo_landing_floor9_left_bg')?>')">
        <div class="landing-floor9-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="landing-floor9-top-section text-center">
                            <p class="landing-section-top-text mb-3"><?php echo get_field('_sogo_landing_floor9_top_text')?></p>
                            <p class="landing-section-title mb-0"><?php echo get_field('_sogo_landing_floor9_title')?></p>
                        </div>

                        <div class="landing-floor9-team">
                            <?php while (have_rows('_sogo_landing_floor9_items')) : the_row(); ?>
                                <div class="landing-floor9-item d-flex flex-column flex-md-row">
                                    <div class="landing-floor9-item-image-wrapper">
                                        <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor9_bg'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                        <?php echo wp_get_attachment_image(get_sub_field('image'), 'full', false, array('class'=> 'img-fluid landing-floor9-item-image')) ; ?>
                                    </div>
                                    <div class="landing-floor9-item-info">
                                        <div class="landing-floor9-item-names d-flex align-items-center">
                                            <span class="landing-floor9-item-name"><?php echo get_sub_field('name'); ?></span>
                                            <span class="landing-floor9-item-role"><?php echo get_sub_field('role') ? ' / ' . get_sub_field('role') : ''; ?></span>
                                        </div>
                                        <div class="landing-floor9-item-text">
                                            <?php echo get_sub_field('text'); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>

                        <div class="text-center">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="landing-floor2-right-arrow">
                                    <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor2_button_right_arrow'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                </div>
                                <div class="landing-button">
                                    <a class="gradient-btn" href="<?php echo get_field('_sogo_landing_floor9_button_link')?>">
                                    <span class="gradient-btn-text">
                                        <?php echo get_field('_sogo_landing_floor9_button_text')?>
                                    </span>
                                        <span class="gradient-btn-arrow">
                                        <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor1_button_arrow'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                    </span>
                                    </a>
                                </div>
                                <div class="landing-floor2-left-arrow">
                                    <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor2_button_left_arrow'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if(get_field('_sogo_landing_floor10_show_hide') !== false): ?>
        <div class="landing-floor10 py-4">
        <div class="landing-floor10-wrapper">
            <div class="container-fluid position-relative">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="landing-floor10-top-section text-center">
                            <p class="landing-section-top-text mb-3"><?php echo get_field('_sogo_landing_floor10_top_text')?></p>
                            <p class="landing-section-title mb-0"><?php echo get_field('_sogo_landing_floor10_title')?></p>
                        </div>
                        <div class="row">
                            <?php while (have_rows('_sogo_landing_floor10_items')) : the_row(); ?>
                                <div class="col-6 col-lg-4">
                                    <div class="landing-floor10-item position-relative">
                                        <div class="landing-floor10-item-icon">
                                            <?php echo wp_get_attachment_image(get_sub_field('icon'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                        </div>
                                        <p class="landing-floor10-item-title"><?php echo get_sub_field('title')?></p>
                                        <p class="landing-floor10-item-text mb-0"><?php echo get_sub_field('text')?></p>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="text-center">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="landing-floor2-right-arrow">
                                    <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor2_button_right_arrow'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                </div>
                                <div class="landing-button">
                                    <a class="gradient-btn" href="<?php echo get_field('_sogo_landing_floor10_button_link')?>">
                                        <span class="gradient-btn-text">
                                            <?php echo get_field('_sogo_landing_floor10_button_text')?>
                                        </span>
                                        <span class="gradient-btn-arrow">
                                            <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor1_button_arrow'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                        </span>
                                    </a>
                                </div>
                                <div class="landing-floor2-left-arrow">
                                    <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor2_button_left_arrow'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if(get_field('_sogo_landing_floor11_show_hide') !== false): ?>
        <div class="landing-floor11 py-4" style="background-image: url('<?php echo get_field('_sogo_landing_floor11_bg')?>')">
        <div class="landing-floor11-wrapper">
            <div class="container-fluid">
                <div class="row justify-content-between flex-column-reverse flex-lg-row">
                    <div class="col-12">
                        <div class="landing-floor11-top-section text-center">
                            <p class="landing-section-top-text mb-3"><?php echo get_field('_sogo_landing_floor11_top_text')?></p>
                            <p class="landing-section-title mb-0"><?php echo get_field('_sogo_landing_floor11_title')?></p>
                        </div>
                        <?php
                        if (have_rows('_sogo_landing_floor11_faq')):
                            $floor11_counter = 0;
                            ?>
                            <div class="accordion accordion-flush" id="landingFloor11Faq">
                                <?php
                                while (have_rows('_sogo_landing_floor11_faq')): the_row();
                                    // Проверяем, является ли это первым элементом
                                    $isFirst = ($floor11_counter === 0);
                                    ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button <?= $isFirst ? '' : 'collapsed' ?>" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapse<?= $floor11_counter ?>" aria-expanded="<?= $isFirst ? 'true' : 'false' ?>"
                                                    aria-controls="flush-collapse<?= $floor11_counter ?>">
                                                <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor11_plus'), 'full', false, array('class'=> 'img-fluid accordion-header-plus')) ; ?>
                                                <span class="pe-3 text-end"><?php the_sub_field('question') ?></span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse<?php echo $floor11_counter; ?>" class="accordion-collapse collapse <?= $isFirst ? 'show' : '' ?>"
                                             data-bs-parent="#landingFloor11Faq">
                                            <div class="accordion-body">
                                                <?php the_sub_field('answer'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $floor11_counter++;
                                endwhile;
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if(get_field('_sogo_landing_floor12_show_hide') !== false): ?>
        <div class="landing-floor12">
        <div class="p-3">
            <div class="landing-floor12-wrapper" style="background-image: url('<?php echo get_field('_sogo_landing_floor12_bg')?>')">
                <div class="landing-floor12-nofluid h-100">
                    <div class="container-fluid position-relative h-100">
                        <div class="row justify-content-center h-100">
                            <div class="col-12 h-100 m-0">
                                <div class="row h-100 justify-content-between">
                                    <div class="d-none d-lg-block col-6">
                                        <div class="landing-floor12-ronit-wrapper h-100 d-flex align-items-end">
                                            <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor12_ronit'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-10 col-md-6 col-lg-5 m-0 d-flex justify-content-center align-items-center align-items-lg-end">
                                        <div class="landing-floor12-form mb-lg-5">
                                            <?php echo do_shortcode('[contact-form-7 id="' . get_field('_sogo_landing_floor12_form') . '" title="landing form"]')?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>


<?php function sogo_get_youtube_iframe_from_text($url, $autoplay = 1){

    $src = str_replace('watch?v=', 'embed/', $url);

    // add extra params to iframe src
    $params = array(
        'feature'        => 'oembed',
        'controls'       => 1,
        'hd'             => 1,
        'autohide'       => 1,
        'enablejsapi'    => 1,
        'autoplay'       => $autoplay,
        'rel'            => 0,
        'cc_load_policy' => 1
    );

    $new_src = add_query_arg($params, $src);

    $iframe = '<iframe width="100%" src="' . $new_src . '"></iframe>';

    // add extra attributes to iframe html
    $attributes = 'frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen';

    $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

    return $iframe;
} ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<script>
    (function ($) {
        'use strict';
        $(document).ready(function () {
            $('.video-cubic').click(function () {
                $(this).html($(this).data('iframe')).css('background', 'none');
            });
        });
    })(jQuery);
</script>

<?php get_footer('landing') ?>
