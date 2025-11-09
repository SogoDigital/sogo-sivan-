<?php // Template Name: front page ?>
<?php

get_header();
?>

    <section id="homepage-floor1">

        <div class="homepage-floor1-slider js-homepage-floor1-slider h-100">
            <?php while ( have_rows( '_sogo_mainpage_floor1_slider' ) ) : the_row(); ?>
                <div class="homepage-floor1-slide-wrapper h-100 position-relative">
                    <div class="homepage-floor1-slide-info">
                        <h2 class="homepage-floor1-slide-title"><?php echo get_sub_field('title')?></h2>
                        <h3 class="homepage-floor1-slide-subtitle"><?php echo get_sub_field('subtitle')?></h3>
                        <div class="homepage-floor1-slide-button">
                            <a class="" href="<?php echo get_sub_field('button_link')?>"><?php echo get_sub_field('button_text')?></a>
                            <?php echo wp_get_attachment_image(get_field('_sogo_mainpage_floor1_slider_arrow'), 'full', false, array('class'=> 'img-fluid')) ; ?>

                        </div>
                    </div>
                    <?php echo wp_get_attachment_image(get_sub_field('image'), 'full', false, array('class'=> 'img-fluid homepage-floor1-image')) ; ?>
                    <?php echo wp_get_attachment_image(get_sub_field('image_mobile'), 'full', false, array('class'=> 'img-fluid homepage-floor1-image-mobile')) ; ?>

                </div>
            <?php endwhile; ?>
        </div>
    </section>


<!--    <section id="home-floor-1" class="section floor active vertical-middle d-flex justify-content-center align-items-center">-->
<!---->
<!---->
<!---->
<!--        <div class="">-->
<!--            --><?php //if (!wp_is_mobile()): ?>
<!--                <video loop muted autoplay class="home-floor1-video hidden-xs hidden-sm">-->
<!--                    <source src="--><?php //echo get_stylesheet_directory_uri() ?><!--/images/main-video.mp4" type="video/mp4">-->
<!--                </video>-->
<!--            --><?php //else: ?>
<!--                <video playsinline loop muted autoplay class="home-floor1-video">-->
<!--                    <source src="--><?php //echo get_stylesheet_directory_uri() ?><!--/images/main-video-mobile.mp4" type="video/mp4">-->
<!--                </video>-->
<!--            --><?php //endif; ?>
<!--        </div>-->
<!--        <a href="#home-floor-7" style="cursor: pointer;" class="call-to-action hidden-xs hidden-sm">-->
<!--            <span class="scroll-to animated bounce infinite">-->
<!--                <span class="fa fa-angle-down" aria-hidden="true"></span>-->
<!--            </span>-->
<!--        </a>-->
<!---->
        <footer id="customers-logos" class="hidden-xs hidden-sm">
            <ul class="flex-slider">
                <?php
                $logos = sogo_option('customers_logos');
                if ($logos) {
                    foreach ($logos as $id => $logo) {
                        echo "<li>";
                        sogo_print_image($id, $logo);
                        echo "</li>";
                    }
                }
                ?>
            </ul>
        </footer>
<!---->
<!--    </section>-->
    <!-- #home-floor-1 -->

    <section id="home-floor-7"
             class="section floor text-center cover fp-auto-height vertical-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <header class="floor-header">
                        <h1 class="floor-title"><?php echo sogo_meta('section-7-title') ?></h1>
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
                        foreach( $homepage_projects as $post ){
                            setup_postdata( $post );
                            set_query_var('post_id', $post->ID);
                            echo get_template_part('template-arcive-project');
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
        <!--        <div class="continue-down hidden-xs hidden-sm">-->
        <!--         <span class="scroll-to continue" data-target="end">-->
        <!--             <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>-->
        <!--         </span>-->
        <!--        </div>-->
    </section> <!-- #home-floor-7 -->


<div class="home-desktop-floors">
    <?php $counter = 0; ?>
    <?php while (have_rows("_sogo_home_desktop_floors")) : the_row(); ?>
        <section class="home-desktop-floor" style="background-image: url('<?php echo get_sub_field('background_image')?>')">
            <div class="container-fluid h-100">
                <div class="row h-100">
                    <div class="h-100 d-flex align-items-center <?php echo ($counter%2) ? 'col-md-5 col-lg-4 col-md-offset-7' : 'col-md-5 col-lg-4 col-md-offset-1'; ?>">
                        <div class="home-desktop-floor-info <?php echo (get_sub_field('dark_light')) ? 'dark' : 'light'; ?>">
                            <h2 class="home-desktop-floor-title"><?php echo get_sub_field('title')?></h2>
                            <h4 class="home-desktop-floor-subtitle"><?php echo get_sub_field('subtitle')?></h4>
                            <div class="d-flex align-items-center justify-content-start">
                                <a class="campaigne-floor-button m-auto" href="<?php echo get_sub_field('gradient_button_link')?>">
                                    <span><?php echo get_sub_field('gradient_button_text')?></span>
                                    <?php echo wp_get_attachment_image(get_field('_sogo_home_mobile_arrow'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                </a>
                                <a class="home-whatsapp-button m-auto" href="<?php echo get_sub_field('whatsapp_button_link')?>">
                                    <span><?php echo get_sub_field('whatsapp_button_text')?></span>
                                    <?php echo wp_get_attachment_image(get_field('_sogo_home_mobile_arrow'), 'full', false, array('class'=> 'img-fluid')) ; ?>
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
            <?php echo wp_get_attachment_image(get_sub_field('image'), 'full', false, array('class'=> 'img-fluid homepage-mobile-floor-image')) ; ?>
            <div class="home-mobile-floor-button">
                <a class="d-flex justify-content-center align-items-center" href="<?php echo get_sub_field('button_link')?>">
                    <span><?php echo get_sub_field('button_text')?></span>
                    <?php echo wp_get_attachment_image(get_field('_sogo_home_mobile_arrow'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                </a>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<!--<div class="campaigne-floor4">-->
<!--    <div class="campaigne-floor4-wraper">-->
<!--        <div class="container-fluid">-->
<!--            <div class="row justify-content-center">-->
<!--                <div class="col-12 col-lg-12">-->
<!--                    <div class="row justify-content-center d-flex">-->
<!--                        <div class="col-12 col-lg-8">-->
<!--                            <p class="campaigne-floor4-title text-center">--><?php //echo get_field('_sogo_home_chess_title')?><!--</p>-->
<!--                            <p class="campaigne-floor4-subtitle text-center">--><?php //echo get_field('_sogo_home_chess_subtitle')?><!--</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    --><?php //$counter = 0; ?>
<!--                    --><?php //while (have_rows("_sogo_home_chess_services")) : the_row(); ?>
<!--                        <div class="row campaigne-floor4-service-wrapper flex-column-reverse flex-lg-row--><?php //echo ($counter%2) ? '-reverse' : ''; ?><!--">-->
<!--                            <div class="col-12 col-lg-5">-->
<!--                                <div class="campaigne-floor4-service">-->
<!--                                    <div class="campaigne-floor4-service-top-wrapper position-relative">-->
<!--                                        <p class="campaigne-floor4-service-top">--><?php //echo get_sub_field('top_text')?><!--</p>-->
<!--                                        --><?php //if(get_sub_field('gift')): ?>
<!--                                            --><?php //echo wp_get_attachment_image(get_sub_field('gift'), 'full', false, array('class'=> 'img-fluid position-absolute campaigne-floor4-service-gift')) ; ?>
<!--                                        --><?php //endif; ?>
<!---->
<!--                                    </div>-->
<!--                                    <div class="campaigne-floor4-service-title">-->
<!--                                        --><?php //echo get_sub_field('title')?>
<!--                                    </div>-->
<!--                                    <div class="campaigne-floor4-service-text">-->
<!--                                        --><?php //echo get_sub_field('text')?>
<!--                                    </div>-->
<!---->
<!--                                    <a class="campaigne-floor4-service-link d-flex justify-content-start align-items-center" href="#footer-form">-->
<!--                                        <span>דברו איתנו</span>-->
<!--                                        --><?php //echo wp_get_attachment_image(get_field('_sogo_home_chess_arrow'), 'full', false, array('class'=> 'img-fluid')) ; ?>
<!--                                    </a>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-1 d-none d-lg-block"></div>-->
<!--                            <div class="col-12 col-lg-6 px-lg-0">-->
<!--                                <div class="campaigne-floor4-service-image-wrapper mb-4 mb-lg-0 position-relative">-->
<!--                                    --><?php //echo wp_get_attachment_image(get_sub_field('image'), 'full', false, array('class'=> 'img-fluid campaigne-floor4-service-image')) ; ?>
<!--                                    --><?php //if(get_sub_field('lamp')): ?>
<!--                                        --><?php //echo wp_get_attachment_image(get_sub_field('lamp'), 'full', false, array('class'=> 'img-fluid position-absolute campaigne-floor4-service-lamp')) ; ?>
<!--                                    --><?php //endif; ?>
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        --><?php //$counter++; ?>
<!--                    --><?php //endwhile; ?>
<!--                </div>-->
<!--            </div>-->
<!--            <div class="d-flex justify-content-center align-items-center">-->
<!--                --><?php //echo wp_get_attachment_image(get_field('_sogo_home_chess_man'), 'full', false, array('class'=> 'img-fluid')) ; ?>
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
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
            if (have_rows('_sogo_home_faq')):
                $counter = 0;
                while (have_rows('_sogo_home_faq')): the_row(); ?>
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
                                            foreach( $related as $item ) :
                                                setup_postdata($item);
                                                set_query_var( 'post_id', $item->ID );
                                                get_template_part('content', 'excerpt');
                                                ?>
                                            <?php endforeach;
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