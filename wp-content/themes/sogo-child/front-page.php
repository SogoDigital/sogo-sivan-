<?php // Template Name: front page ?>
<?php

get_header();
?>


    <section id="homepage-floor1">
        <?php
        $slides = get_field('_sogo_mainpage_floor1_slider');
        if ($slides) : ?>
            <div class="homepage-floor1-slider js-homepage-floor1-slider">
                <?php foreach ($slides as $i => $slide) :
                    // First slide is the LCP: real H1, loaded eagerly with high priority. The rest load after window load.
                    $first     = (0 === $i);
                    $title_tag = $first ? 'h1' : 'h2';
                    $alt       = get_post_meta($slide['image'], '_wp_attachment_image_alt', true) ?: wp_strip_all_tags($slide['title']);
                    $mobile    = $slide['image_mobile'] ? (wp_get_attachment_image_srcset($slide['image_mobile'], 'full') ?: wp_get_attachment_image_url($slide['image_mobile'], 'full')) : '';
                    ?>
                    <div class="homepage-floor1-slide-wrapper position-relative<?php echo $first ? ' is-active' : '' ?>"<?php echo $first ? '' : ' inert' ?>>
                        <picture>
                            <?php if ($mobile) : ?>
                                <source media="(max-width: 991px)" srcset="<?php echo esc_attr($mobile) ?>" sizes="100vw">
                            <?php endif; ?>
                            <?php echo wp_get_attachment_image($slide['image'], 'full', false, array(
                                'class'         => 'homepage-floor1-picture',
                                'alt'           => $alt,
                                'sizes'         => '100vw',
                                'loading'       => $first ? 'eager' : 'lazy',
                                'fetchpriority' => $first ? 'high' : 'low',
                            )); ?>
                        </picture>
                        <div class="homepage-floor1-slide-info">
                            <<?php echo $title_tag ?> class="homepage-floor1-slide-title"><?php echo wp_kses_post($slide['title']) ?></<?php echo $title_tag ?>>
                            <?php if ($slide['subtitle']) : ?>
                                <p class="homepage-floor1-slide-subtitle"><?php echo wp_kses_post($slide['subtitle']) ?></p>
                            <?php endif; ?>
                            <?php if ($slide['button_text'] && $slide['button_link']) : ?>
                                <a class="homepage-floor1-slide-button" href="<?php echo esc_url($slide['button_link']) ?>">
                                    <span><?php echo esc_html($slide['button_text']) ?></span>
                                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <?php echo do_shortcode('[rev_slider alias="slider-1"][/rev_slider]'); // fallback until the slides are filled in ?>
        <?php endif; ?>
        <?php if ( ! wp_is_mobile() ) : // hidden on mobile anyway, skip loading the logos ?>
        <footer id="customers-logos" class="hidden-xs hidden-sm">
            <ul class="flex-slider">
                <?php
                $logos = sogo_option('customers_logos');
                if ($logos) {
                    foreach ($logos as $id => $logo) {
                        echo "<li>";
                        // width/height attributes reserve the space (no layout shift when the logos load)
                        $logo_img = wp_get_attachment_image($id, 'full', false, array('loading' => false, 'decoding' => 'async')); // visible in the first screen: no lazy
                        if ($logo_img) {
                            echo $logo_img;
                        } else {
                            sogo_print_image($id, $logo);
                        }
                        echo "</li>";
                    }
                }
                ?>
            </ul>
        </footer>
        <?php endif; ?>
    </section>

    <section id="home-floor-7"
             class="section floor text-center cover fp-auto-height vertical-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <header class="floor-header">
                        <h2 class="floor-title"><?php echo sogo_meta('section-7-title') ?></h2>
                    </header>
                    <!-- .floor-header -->
                    <p>
                        <?php echo nl2br(sogo_meta('section-7-text')) ?>
                    </p>
                </div>
            </div>

            <div class="row projects_grid_con">
                <div class="col-md-11">
                    <div class="row d-flex archive-projects">

                        <?php
                        $homepage_projects = get_posts( array(
                            'numberposts' => 20,
                            'post_type'   => 'project',
                            'suppress_filters' => true,
                        ) );
                        global $post;
                        $counter = 0;
                        foreach( $homepage_projects as $post ){
                            setup_postdata( $post );
                            set_query_var('post_id', $post->ID);
                            set_query_var('counter', $counter); ?>
                                <?php echo get_template_part('template-arcive-project'); ?>
                            <?php $counter++;
                        }

                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-12 text-center">
                <a class="homepage-all-projects" href="<?php echo esc_url(sogo_meta('portfolio-page')) ?>">
                    <span>צפו בפרויקטים</span>
                </a>
            </div>
        </div>
    </section> <!-- #home-floor-7 -->


    <div class="home-desktop-floors">
        <?php $counter = 0; ?>
        <?php while (have_rows("_sogo_home_desktop_floors")) : the_row(); ?>
            <section class="home-desktop-floor" data-lazy-bg="<?php echo esc_url(get_sub_field('background_image'))?>" style="z-index: <?php echo $counter + 1; ?>;">
            <div class="container-fluid h-100">
                <div class="row h-100">
                    <div class="h-100 d-flex align-items-center <?php echo ($counter%2) ? 'col-md-5 col-lg-4 col-md-offset-7' : 'col-md-5 col-lg-4 col-md-offset-1'; ?>">
                        <div class="home-desktop-floor-info <?php echo (get_sub_field('dark_light')) ? 'dark' : 'light'; ?>">
                            <h2 class="home-desktop-floor-title" data-aos="fade-up" data-aos-duration="1000"><?php echo get_sub_field('title')?></h2>
                            <p class="home-desktop-floor-subtitle" data-aos="fade-up" data-aos-duration="1000"><?php echo get_sub_field('subtitle')?></p>
                            <div class="d-flex align-items-center justify-content-start" data-aos="fade-up" data-aos-duration="1000">
                                <a class="campaigne-floor-button m-auto" href="<?php echo get_sub_field('gradient_button_link')?>">
                                    <span><?php echo get_sub_field('gradient_button_text')?></span>
                                    <?php echo wp_get_attachment_image(get_field('_sogo_home_mobile_arrow'), 'full', false, array('class'=> 'img-fluid', 'loading' => 'lazy')) ; ?>
                                </a>
                                <a class="home-whatsapp-button m-auto" href="<?php echo get_sub_field('whatsapp_button_link')?>">
                                    <span><?php echo get_sub_field('whatsapp_button_text')?></span>
                                    <?php echo wp_get_attachment_image(get_field('_sogo_home_mobile_arrow'), 'full', false, array('class'=> 'img-fluid', 'loading' => 'lazy')) ; ?>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php $counter++; ?>
    <?php endwhile; ?>
</div>

<div class="home-mobile-floors">
    <?php while ( have_rows( '_sogo_home_mobile_floors' ) ) : the_row(); ?>
        <div class="home-mobile-floor position-relative">
            <div class="home-mobile-floor-info">
                <p class="home-mobile-floor-title"><?php echo get_sub_field('title')?></p>
                <p class="home-mobile-floor-subtitle"><?php echo get_sub_field('subtitle')?></p>
            </div>
            <?php
            // alt from the media library, falling back to the floor title
            $floor_alt = get_post_meta(get_sub_field('image'), '_wp_attachment_image_alt', true) ?: wp_strip_all_tags(get_sub_field('title'));
            echo wp_get_attachment_image(get_sub_field('image'), 'full', false, array('class'=> 'img-fluid homepage-mobile-floor-image', 'loading' => 'lazy', 'alt' => $floor_alt)) ; ?>
            <div class="home-mobile-floor-button">
                <a class="d-flex justify-content-center align-items-center" href="<?php echo get_sub_field('button_link')?>">
                    <span><?php echo get_sub_field('button_text')?></span>
                    <?php echo wp_get_attachment_image(get_field('_sogo_home_mobile_arrow'), 'full', false, array('class'=> 'img-fluid', 'loading' => 'lazy')) ; ?>
                </a>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<div class="campaigne-floor5 container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-12">
            <div class="row justify-content-center d-flex">
                <div class="col-12 col-lg-8">
                    <h2 class="campaigne-floor5-title text-center"><?php echo get_field('_sogo_home_faq_title')?></h2>
                    <h3 class="campaigne-floor5-subtitle text-center"><?php echo get_field('_sogo_home_faq_subtitle')?></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center d-flex">
        <div class="col-12 col-lg-8">
            <?php
            $questions = array();
            if (have_rows('_sogo_home_faq')):
                $counter = 0;
                $delay = ($counter % 4) * 200;

                while (have_rows('_sogo_home_faq')): the_row(); ?>
                    <div class="faq-content" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                        <div class="accordion panel-group h-100 questions-accord rounded">
                            <div class="panel" data-target="#panelBody<?= $counter ?>" data-toggle="collapse"
                                 data-parent=".accordion">
                                <div class="panel-heading cursor-pointer">
                                    <h3 class="panel-title mb-0 d-flex align-items-center justify-content-start">
                                        <i class="fa fa-close ms-3"></i>
                                        <a class="font-weight-semibold accordion-toggle collapsed jobs-custom-icon-style text-color-1">
                                            <?php the_sub_field('question') ?>
                                        </a>

                                    </h3>
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

<section id="recents-posts" class="section vertical-top cover position-relative" style="background-color: #f7fafe">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-8">
                <?php
                $related = get_posts(
                    array(
                        'numberposts'  => 4,
                    )
                );
                ?>

                <section class="container-fluid pt-2 single-recent">
                    <div class="row justify-content-center">
                        <h2 class="single-recent-title col-12 text-center font-weight-bold uppercase">כל מה שחדש בתחום בניית אתרים</h2>
                        <div class="col-12 col-xl-8 position-relative mt-4">
                            <div class="container-fluid mb-0 mb-lg-4">
                                <div class="row related-posts">
                                    <?php if( $related ) :
                                        $counter = 0;
                                        foreach( $related as $item ) :
                                            setup_postdata($item);
                                            set_query_var( 'post_id', $item->ID );
                                            set_query_var( 'counter', $counter );
                                            get_template_part('content', 'excerpt');
                                            $counter++;
                                        endforeach;
                                        wp_reset_postdata();
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>

      <section id="more-info" class="section vertical-top cover position-relative">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="more-info-text">
                         <?php echo get_field('_sogo_home_more_info') ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer() ?>
