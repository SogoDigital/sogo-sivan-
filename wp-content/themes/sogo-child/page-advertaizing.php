<?php // Template Name: advertising page ?>
<?php get_header() ?>

<section id="advertising-floor-1" class="section floor cover d-flex justify-content-center align-items-center">
    <div class="container-fluid w-100">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center animated fadeInUp">
                <header class="floor-header mobile-middle">
                    <h1 class="page-title color-white mobile-margin-top-100"><?php the_title() ?></h1>

                    <h2 class="page-sub-title color-white">
                        <?php echo sogo_meta('sub_title') ?>
                    </h2>
                </header>
                <!-- .page-header -->
            </div>
        </div>
    </div>
</section> <!-- #advertising-floor-1 -->
<section id="advertising-floor-2" class="section floor cover d-flex justify-content-center align-items-center">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <div id="d1" class="circle bg-red full-radius animated fadeInDownBig hidden-xs hidden-sm">
                    <span class="bold uppercase">Share</span>
                </div>
            </div>
            <div class="col-md-8 text-center">
                <div id="d2" class="circle bg-red full-radius animated fadeInDownBig hidden-xs hidden-sm">
                    <span class="bold uppercase">Share</span>
                </div>
            </div>
            <div class="col-md-2 text-left hidden">
                <div id="d3" class="circle bg-green full-radius animated fadeInDownBig hidden-xs hidden-sm">
                    <span class="bold uppercase">Like</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 col-md-push-1 text-left mobile-text-align-center">
                <header class="page-header gray">
                    <h2 class="floor-title"><?php echo sogo_meta('section-2-title') ?></h2>

                    <p class="gray"><?php echo nl2br(sogo_meta('section-2-text')) ?></p>
                </header>
                <!-- .page-header -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-md-offset-3">
                <div id="d4" class="circle bg-red full-radius animated fadeInDownBig hidden-xs hidden-sm">
                    <span class="bold uppercase">Like</span>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <div id="d5" class="circle bg-green full-radius animated fadeInDownBig hidden-xs hidden-sm">
                    <span class="bold uppercase">Repost</span>
                </div>
            </div>

        </div>
    </div>
</section> <!-- #advertising-floor-2 -->

<section id="advertising-floor-3" class="section floor cover d-flex justify-content-center align-items-center">
    <div class="container-fluid w-100">
        <div class="row">
            <div class="col-md-12 text-center">
                <header class="floor-header">
                    <h2 class="floor-title"><?php echo sogo_meta('section-3-title') ?></h2>

                    <p class="">
                        <?php echo sogo_meta('section-3-text') ?>
                    </p>
                </header>
                <div class="services-icon-wrapper">
                    <?php

                    $list = sogo_meta('services');
                    foreach ((array)$list as $l):
                        ?>
                        <div class="col-md-2 col-sm-6">
                            <div class="icon-box">
                                <i class="fa <?php echo $l['icon'] ?> color-green round-green font-60"></i>
                                <h6 class="color-green uppercase bold">
                                    <?php echo $l['name'] ?>
                                </h6>

                                <div class="hidden-icon-box bg-green hidden-xs">
                                    <i class="fa <?php echo $l['icon'] ?> round-white font-30 color-white"></i>
                                    <h6 class="color-white uppercase bold ">
                                        <?php echo $l['name'] ?>
                                    </h6>

                                    <p class="color-white">
                                        <?php echo nl2br($l['description']) ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <?php
                    endforeach;
                    ?>

                </div>
                <!-- .page-header -->
            </div>
        </div>
    </div>
</section> <!-- #advertising-floor-3 -->

<section id="advertising-floor-4" class="section floor cover d-flex justify-content-center align-items-center">
    <div class="container-fluid w-100">
        <div class="row">
            <div class="col-md-4 col-md-push-7">
                <header class="page-header">
                    <h2 class="floor-title mobile-margin-top-60"><?php echo sogo_meta('section-4-title') ?></h2>

                    <p class="gray mobile-margin-top-100">
                        <?php echo nl2br(sogo_meta('section-4-text')) ?>
                    </p>
                </header>
                <!-- .page-header -->
            </div>
        </div>
    </div>
</section> <!-- #advertising-floor-4 -->

<section id="advertising-floor-5" class="section floor cover d-flex justify-content-center align-items-center">
    <div class="container-fluid w-100">
        <div class="row">
            <div class="col-md-6 text-center">
                <div class="adv-two-sections">
                    <div class="side-padding color-white">
                        <h2 class="floor-title mobile-margin-top-60"><?php echo sogo_meta('section-5-title-left') ?></h2>
                        <?php echo apply_filters('the_content', sogo_meta('section-5-text-left')) ?>
                    </div>
                </div>

                <!-- .page-header -->
            </div>
            <div class="col-md-6 text-center">
                <div class="adv-two-sections">
                    <div class="side-padding color-white">
                        <h2 class="floor-title mobile-margin-top-60"><?php echo sogo_meta('section-5-title-right') ?></h2>
                        <?php echo apply_filters('the_content', sogo_meta('section-5-text-right')) ?>
                    </div>
                </div>

                <!-- .page-header -->
            </div>
        </div>
    </div>
</section> <!-- #advertising--floor-5 -->

<section id="advertising-floor-6" class="section floor cover vertical-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <header class="floor-header">
                    <h2 class="floor-title"><?php echo sogo_meta('section-6-title') ?></h2>
                </header>
                <!-- .page-header -->
            </div>

                <div class="icon-text-wrapper">
                    <div class="col-md-3 col-md-push-1 col-lg-push-2 col-sm-6">
                        <?php
                        $list = sogo_meta('targets_left');
                        foreach ((array)$list as $l):
                            ?>
                            <div class="box-icon-text margin-bottom-75">
                                <i class="fa <?php echo $l['icon'] ?> round-gray gray inline-block font-25"></i>
                                <h6 class="inline-block">
                                    <?php echo $l['title'] ?>
                                </h6>
                            </div>
                        <?php endforeach; ?>


                    </div>
                    <div class="col-md-3 col-md-push-5">
                        <?php
                        $list = sogo_meta('targets_right');
                        foreach ((array)$list as $l):
                            ?>
                            <div class="box-icon-text margin-bottom-75">
                                <i class="fa <?php echo $l['icon'] ?> round-gray gray inline-block font-25"></i>
                                <h6 class="inline-block">
                                    <?php echo $l['title'] ?>
                                </h6>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

        </div>
    </div>
</section> <!-- #advertising-floor-6 -->


<?php get_footer() ?>
