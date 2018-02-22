<?php // Template Name: about page ?>
<?php get_header() ?>
<?php the_post(); ?>
    <!-- #about-floor-1 -->
    <section id="about-floor-1" class="section floor cover">
        <div itemscope itemtype="https://schema.org/WebPage"  class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <header itemprop="mainEntityOfPage" itemscope itemtype="https://schema.org/AboutPage"  class="page-header mobile-middle">
                        <h1  itemprop="headline"  class="page-title color-red"><?php the_title() ?></h1>

                        <p itemprop="description" class="page-sub-title">
                            <?php echo nl2br(sogo_meta('sub_title')) ?>
                        </p>
                    </header>
                    <!-- .page-header -->
                </div>
            </div>
        </div>
    </section>
    <!-- #about-floor-2 -->
    <section id="about-floor-2" class="section floor cover">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 text-center">
                    <div itemscope itemtype="https://schema.org/AboutPage" class="about-two-sections">
                        <header class="page-header">
                            <h2 itemprop="headline"
                              class="floor-title extra-margin color-white ipad-margin-100"><?php echo sogo_meta('left_title') ?></h2>
                        </header>
                        <div class="side-padding entry-content-white" itemprop="description">
                            <?php echo apply_filters('the_content', sogo_meta('left_text')) ?>
                        </div>
                    </div>

                    <!-- .page-header -->
                </div>
                <div class="col-md-6 text-center">
                    <div class="about-two-sections">
                        <header class="page-header">
                            <h2
                              class="floor-title extra-margin color-white ipad-margin-100"><?php echo sogo_meta('right_title') ?></h2>
                        </header>
                        <div class="achievements-slider-wrapper">
                            <ul class="achievements-slider text-center">
                                <?php

                                $list = sogo_meta('right_text');
                                foreach ((array)$list as $l):
                                    ?>
                                    <li>
                                        <?php sogo_print_image($l['icon_id'], $l['icon'], null, 'margin-bottom-75') ?>
                                        <span
                                          class="block uppercase bold font-38 color-white"><?php echo $l['title'] ?></span>
                                        <span
                                          class="block color-white font-38 weight-100"><?php echo $l['text'] ?></span>
                                    </li>
                                    <?php
                                endforeach;
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!-- .page-header -->
                </div>
            </div>
        </div>
    </section>
    <!-- #about--floor-3 -->


    <section id="about-floor-3" class="section floor cover vertical-middle">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-center">
                    <header class="floor-header team-header">
                        <h2 class="floor-title"><?php echo sogo_meta('section_3_title') ?></h2>

                        <p class="padding-bottom-50">
                            <?php echo sogo_meta('section_3_text') ?>
                        </p>
                    </header>
                    <div class="team-slider-wrapper">
                        <div class="team-wrapper">
                            <?php

                            $list = sogo_meta('team');
                            foreach ((array)$list as $l):
                                ?>
                                <div class="box-team zoom-in-effect">
                                    <div class="thumbnail-wrapper img-box">
                                        <?php sogo_print_image($l['avatar_id'], $l['avatar']) ?>
                                    </div>
                                    <h3 class="color-green bold"><?php echo $l['name'] ?></h3>
                                    <h6><?php echo $l['job_title'] ?></h6>

                                    <div class="hidden-text info-box">
                                        <p class="info-content color-white font-16">
                                            <?php echo $l['description'] ?>
                                        </p>
                                    </div>
                                </div>
                                <?php
                            endforeach;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #about-floor-4 -->
    <section id="about-floor-4" class="section floor cover vertical-middle">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-push-1 text-left">
                    <div class="testimonials-wrapper">
                        <header class="floor-header">
                            <h2 class="page-title floor-title"><?php echo sogo_meta('section_4_title') ?></h2>

                            <p class="">
                                <?php echo sogo_meta('section_4_text') ?>
                            </p>
                        </header>
                        <div class="testimonials-slider-wrapper">
                            <ul class="testimonials-slider text-left">
                                <?php

                                $list = sogo_meta('testimonials');
                                foreach ((array)$list as $l):
                                    ?>

                                    <li>
                                        <div class="client-img full-radius inline-block margin-15">
                                            <?php sogo_print_image($l['avatar_id'], $l['avatar']) ?>
                                        </div>
                                        <div class="inline-block top-relative" id="client-name">
                                            <p class=" bold uppercase margin-bottom-0">
                                                <?php echo $l['name'] ?>
                                            </p>

                                            <p class="">
                                                <?php echo $l['job_title'] ?>, <span
                                                  class="bold"><?php echo $l['company'] ?></span>
                                            </p>
                                        </div>
                                        <p class="italic padding-bottom-100" id="client-desc">
                                            <?php echo nl2br($l['description']) ?>
                                        </p>

                                    </li>

                                    <?php
                                endforeach;


                                ?>

                            </ul>
                        </div>
                        <div/>

                        <!-- .page-header -->
                    </div>
                </div>
            </div>
    </section>
    <!-- #about-floor-5 -->
    <section id="about-floor-5" class="section floor vertical-middle">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-center">
                    <header class="floor-header">
                        <h2 class="black floor-title"><?php echo sogo_meta('section_5_title') ?></h2>
                    </header>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="clients-logo-wrapper">
                                <?php
                               echo do_shortcode('[My_Galerry]');
//                                $logos = sogo_meta('logos');
//                                if ($logos) {
//                                    foreach ($logos as $id => $logo) {
//                                        ?>
<!--                                        <div class="col-md-2 col-xs-6">-->
<!--                                            <div class="client-thumbnail-wrapper">-->
<!--                                                --><?php //sogo_print_image($id, $logo); ?>
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        --><?php
//                                    }
//                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- .page-header -->
                </div>
            </div>
        </div>
    </section>
<?php get_footer() ?>