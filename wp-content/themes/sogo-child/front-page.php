<?php // Template Name: front page ?>
<?php

get_header();
?>
    <section id="home-floor-1" class="section floor active vertical-middle d-flex justify-content-center align-items-center">
        <div class="fullscreen-bg">
            <?php if (!wp_is_mobile()): ?>
                <video loop muted autoplay class="fullscreen-bg__video hidden-xs hidden-sm">
                    <source src="<?php echo get_stylesheet_directory_uri() ?>/images/home-video.mp4" type="video/mp4">
                </video>
            <?php endif; ?>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 text-center animated fadeInUp">
                    <header class="floor-header mobile-middle">
                        <h1 class="page-title color-white" lang="en">Welcome to Sogo</h1>
                    </header>
                    <!-- .page-header -->
                    <p class="sub-title">
                        <?php echo nl2br(sogo_meta('text')) ?>
                    </p>
                </div>
            </div>
        </div>

        <span style="cursor: pointer;"
           class="continue call-to-action hidden-xs hidden-sm">
            <span class="scroll-to continue animated bounce infinite">
                        <span class="fa fa-angle-down" aria-hidden="true"></span>
                    </span>
        </span>

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
    </section> <!-- #home-floor-1 -->
<?php
$floors = sogo_meta('floors');

if ($floors) {
    foreach ($floors as $key => $floor) {
        ?>
        <section id="<?php echo $floor['id'] ?>"
                 class="d-flex justify-content-start <?php echo ($floor['id'] != 'home-floor-4') ? 'align-items-center' : ''; ?> section floor <?php echo $floor['align'] . " " . $floor['background-size'] ?>">
            <div
              class="bg-image hidden-xs hidden-sm moving-bg  <?php echo $floor['align'] . " " . $floor['background-size'] ?>"
              style="background-image: url('<?php echo $floor['background'] ?>')">
            </div>

            <?php
            if ($floor['overlay-image'] != '') {
                echo '<div class="overlay-image hidden-xs hidden-sm layer contain ' . $floor['overlay-animation'] . ' animated' . $floor['overlay-size'] . '"
                        style="background-image: url(\'' . $floor['overlay-image'] . '\');"></div>';
            }
            ?>
            <div class="container-fluid w-100">
                <div class="row">
                    <div class="<?php echo $floor['col'] ?>">
                        <header class="floor-header">
                            <h2 class="floor-title"><?php echo $floor['title'] ?></h2>
                        </header>
                        <!-- .floor-header -->
                        <p>
                            <?php echo nl2br($floor['text']) ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="continue-down hidden-xs hidden-sm">
                     <span class="scroll-to continue" aria-hidden="true">
                         <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                     </span>
            </div>
        </section> <!-- /floor- -->
        <?php
    }
}
?>
    <section id="home-floor-5" class="section floor vertical-top cover">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-md-offset-1">
                    <div id="c1" class="circle bg-red full-radius animated grow hidden-xs hidden-sm">
                        <span class="bold uppercase">CSS</span>
                    </div>
                </div>
                <div class="col-md-6  text-center">
                    <header class="floor-header">
                        <h2 class="floor-title"><?php echo sogo_meta('section-5-title') ?></h2>
                    </header>
                    <!-- .floor-header -->
                    <p>
                        <?php echo nl2br(sogo_meta('section-5-text')) ?>
                    </p>

                </div>
                <div class="col-md-2">
                    <div id="c2" class="circle bg-green full-radius animated grow hidden-xs hidden-sm">
                        <span class="bold uppercase">WordPress</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5  col-md-offset-4 text-right">
                    <div id="c3" class="circle bg-red full-radius animated grow hidden-xs hidden-sm small-font">
                        <span class="bold uppercase">Angular</span>
                    </div>

                </div>
                <div class="col-md-12 text-center">
                    <div id="c4" class="circle bg-green full-radius animated grow hidden-xs hidden-sm">
                        <span class="bold uppercase">HTML</span>
                    </div>

                </div>
            </div>
        </div>
        <div class="continue-down hidden-xs hidden-sm">
         <span class="scroll-to continue">
             <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
         </span>
        </div>
    </section> <!-- #home-floor-5 -->

<!--    <section id="home-floor-6" class="split-floor section floor cover vertical-top">-->
<!--        <div id="man" class="fadeInLeftBig animated hidden-xs hidden-sm"><img-->
<!--              src="--><?php //echo get_stylesheet_directory_uri() ?><!--/images/bgs/man.png" alt="man image"/></div>-->
<!--        <div id="woman" class="fadeInRightBig animated hidden-xs hidden-sm"><img-->
<!--              src="--><?php //echo get_stylesheet_directory_uri() ?><!--/images/bgs/woman.png" alt="woman image"/></div>-->
<!---->
<!--        <div class="container-fluid">-->
<!--            <div class="row">-->
<!--                <div class="side-padding-text">-->
<!--                    <div class="col-md-6 text-center">-->
<!--                        <div class="fadeInLeftBig animated">-->
<!--                            <header class="floor-header">-->
<!--                                <p class="floor-title color-white">--><?php //echo sogo_meta('section-6-title-1') ?><!--</p>-->
<!--                            </header>-->
                            <!-- .floor-header -->
<!--                            <p class="color-white">-->
<!--                                --><?php //echo nl2br(sogo_meta('section-6-text-1')) ?>
<!--                            </p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-md-6 text-center">-->
<!--                        <div class="fadeInRightBig animated">-->
<!--                            <header class="floor-header">-->
<!--                                <p class="floor-title color-white">--><?php //echo sogo_meta('section-6-title-2') ?><!--</p>-->
<!--                            </header>-->
                            <!-- .floor-header -->
<!--                            <p class="color-white">-->
<!--                                --><?php //echo nl2br(sogo_meta('section-6-text-2')) ?>
<!--                            </p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="continue-down hidden-xs hidden-sm">-->
<!--         <span class="scroll-to continue">-->
<!--             <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>-->
<!--         </span>-->
<!--        </div>-->
<!--    </section>
 #home-floor-6 -->
    <section id="home-floor-7"
             class="section floor text-center cover fp-auto-height vertical-middle">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12  text-center">
                    <header class="floor-header">
                        <h2 class="floor-title"><?php echo sogo_meta('section-7-title') ?></h2>
                    </header>
                    <!-- .floor-header -->
                    <p>
                        <?php echo nl2br(sogo_meta('section-7-text')) ?>
                    </p>
                </div>
                <div class="col-md-12 hidden-xs">
                    <div class="portfolio-slider-wrapper">
                        <ul class="portfolio-slider">
                            <?php
                            $portfolio = sogo_meta('section-7-gallery');
                            if ($portfolio) {
                                foreach ($portfolio as $id => $image) {
                                    echo "<li>";
                                    sogo_print_image($id, $image);
                                    echo "</li>";
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <a class="btn-link see_all" href="<?php echo esc_url(sogo_meta('portfolio-page')) ?>"><?php _e("see full portfolio", 'sogoc') ?></a>
            </div>
        </div>
        <div class="continue-down hidden-xs hidden-sm">
         <span class="scroll-to continue" data-target="end">
             <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
         </span>
        </div>
    </section> <!-- #home-floor-7 -->


<?php get_footer() ?>