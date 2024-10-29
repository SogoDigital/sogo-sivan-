<?php
// Template Name: Campaigne page
$rtl = is_rtl();
?>

<?php get_header() ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<main class="campaigne-page" style="margin-top: 72px; ">
    <div class="campaigne-floor1 container-fluid">
        <div class="row flex-column-reverse flex-lg-row justify-content-center">
            <div class="d-none d-lg-block col-lg-1"></div>
            <div class="col-12 col-lg-3">
                <p class="mb-0 campaigne-floor1-top"><?php echo get_field('campaigne_floor1_top')?></p>
                <p class="campaigne-floor1-title"><?php echo get_field('campaigne_floor1_title')?></p>
                <div class="campaigne-floor1-text"><?php the_content(); ?></div>
                <a class="campaigne-floor1-button d-flex justify-content-center align-items-center" href="#footer-form">
                    <span><?php echo get_field('campaigne_floor1_button_text')?></span>
                    <?php echo wp_get_attachment_image(get_field('campaigne_floor1_arrow'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                </a>
            </div>
            <div class="col-12 col-lg-8">
                <div class="text-center">
                    <div class="video-container">
                        <?php
                        $attr =  array(
                            'src'         => get_field('campaigne_floor1_video'),
                            'autoplay'    => true,
                            'loop'        => true,
                            'muted'       => true,
                            'class'       => 'full-width-video',
                        );
                        echo wp_video_shortcode(  $attr );
                        ?>
                    </div>
                </div>
    <!--            --><?php //if (!wp_is_mobile()): ?>
    <!--                <video loop muted autoplay class="home-floor1-video hidden-xs hidden-sm">-->
    <!--                    <source src="--><?php //echo get_stylesheet_directory_uri() ?><!--/images/main-video.mp4" type="video/mp4">-->
    <!--                </video>-->
    <!--            --><?php //else: ?>
    <!--                <video playsinline loop muted autoplay class="home-floor1-video">-->
    <!--                    <source src="--><?php //echo get_stylesheet_directory_uri() ?><!--/images/main-video-mobile.mp4" type="video/mp4">-->
    <!--                </video>-->
    <!--            --><?php //endif; ?>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="campaigne-logos-gradient"></div>
            </div>
        </div>
    </div>
    <div class="campaigne-floor2 container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <p class="campaigne-floor2-title text-center"><?php echo get_field('campaigne_floor2_title')?></p>

                <div class="row">
                    <?php while (have_rows("campaigne_floor2_logos")) : the_row(); ?>
                        <div class="col-4 col-md-2 text-center mb-5 campaigne-floor2-logos-item">
                            <?php echo wp_get_attachment_image(get_sub_field('image'), 'full', false, array('class'=> 'img-fluid px-3')) ; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="campaigne-floor3 container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <p class="campaigne-floor3-title text-center"><?php echo get_field('campaigne_floor3_title')?></p>
                <div class="row">
                    <?php while (have_rows("campaigne_floor3_projects")) : the_row(); ?>
                        <div class="col-6 mb-5">
                            <a class="campaigne-floor3-project" href="<?php echo get_sub_field('link'); ?>">
                                <?php echo wp_get_attachment_image(get_sub_field('image'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="campaigne-floor4 container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <p class="campaigne-floor4-title text-center"><?php echo get_field('campaigne_floor4_title')?></p>
                <?php $counter = 0; ?>
                <?php while (have_rows("campaigne_floor4_services")) : the_row(); ?>
                        <div class="row campaigne-floor4-service-wrapper flex-column-reverse flex-lg-row<?php echo ($counter%2) ? '-reverse' : ''; ?>">
                            <div class="col-12 col-lg-5">
                                <div class="campaigne-floor4-service">
                                    <div class="campaigne-floor4-service-top-wrapper">
                                        <p class="campaigne-floor4-service-top"><?php echo get_sub_field('top_text')?></p>

                                    </div>
                                    <p class="campaigne-floor4-service-title"><?php echo get_sub_field('title')?></p>
                                    <p class="campaigne-floor4-service-text"><?php echo get_sub_field('text')?></p>
                                    <a class="campaigne-floor4-service-link d-flex justify-content-start align-items-center" href="#footer-form">
                                        <span>דברו איתנו</span>
                                        <?php echo wp_get_attachment_image(get_field('campaigne_floor4_arrow'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                    </a>
                                </div>
                            </div>
                            <div class="col-1"></div>
                            <div class="col-12 col-lg-6 px-lg-0">
                                <div class="campaigne-floor4-service-image mb-4 mb-lg-0">
                                    <?php echo wp_get_attachment_image(get_sub_field('image'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                </div>
                            </div>
                        </div>
                    <?php $counter++; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <div class="campaigne-floor5 container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <p class="campaigne-floor5-title text-center"><?php echo get_field('campaigne_floor5_title')?></p>

                <?php
                $questions = array();
                if (have_rows('campaigne_floor5_questions')):
                    $counter = 0;
                    while (have_rows('campaigne_floor5_questions')): the_row(); ?>
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
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                $(document).click(function (e) {
                    if (!$(e.target).is('.panel-body')) {
                        $('.collapse').collapse('hide');
                    }
                });
                $('#faq').keyup(function () {
                    var text = $(this).val();
                    $('.faq-content').hide();
                    $('.faq-content:contains("' + text + '")').show();
                });
            });
        })(jQuery);

    </script>

</main>

<?php get_footer() ?>
