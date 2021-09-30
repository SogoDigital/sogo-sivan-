<?php
global $fullpage;
$fullpage = '';
get_header();
the_post();
$is_mobile = wp_is_mobile();
$bg_desktop = get_field('_sogo_ver3_floor1_bg');
$bg_mobile = (get_field('_sogo_ver3_floor1_bg_mobile'));
$bg = $is_mobile ? $bg_mobile : $bg_desktop;
$col = $is_mobile ? 'col-md-12' : 'col-md-4';

?>
    <section id="floor1" class="relative"
             style="background: url('<?php echo $bg; ?>'); background-repeat: no-repeat;
                     background-size: cover;">

        <div class="container-fluid">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-12 col-lg-6 floor1-right"></div>
                <div class="col-12 col-lg-6 floor1-left">
                    <div class="row d-flex align-items-center">
                        <div class="col-12 col-lg-8 position-relative">
                            <h1 class="h1 font-weight-bold floor1-title position-relative">
                                <?php echo get_field('_sogo_ver3_floor1_title') ?>
                                <img class="position-absolute horizontal-line position-absolute" src="<?php echo get_stylesheet_directory_uri() . '/images/horizental_line.png' ?>">
                            </h1>
                            <div class="floor1-text"><?php echo get_field('_sogo_ver3_floor1_text') ?></div>
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
        <?php echo wp_get_attachment_image(get_field('_sogo_ver3_floor2_image'), 'full', false, array('class'=> 'img-fluid')) ; ?>
    </section>
    <section id="floor3" class="relative">
        <div class="continer-fluid">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-xs-12 col-lg-6 text-center">
                    <h2 class=""><?php echo get_field('_sogo_ver3_floor3_title') ?></h2>
                    <img src="<?php echo get_stylesheet_directory_uri();?>/images/floor3-divider.png">
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
                            <?php echo wp_get_attachment_image(($is_mobile) ? $mobile_one_image : $desktop_one_image, 'full', false, array('class'=> 'img-fluid')) ; ?>
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
                                    <?php echo wp_get_attachment_image(get_sub_field('icon'), 'full', false, array('class'=> 'img-fluid p-2 ')) ; ?>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endif; ?>
        </section>
    <?php endwhile; ?>

<?php get_footer() ?>
