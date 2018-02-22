<?php // Template Name: accessibility page ?>
<?php get_header() ?>
<!-- #accessibility-floor-1 -->
<section id="accessibility-floor-1" class="section floor cover <?php sogo_extra_class('section-1-align') ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 col-md-offset-4 text-center">
                <header class="floor-header mobile-middle">
                    <h1 class="page-title color-white"><?php the_title() ?></h1>

                    <h2 class="access-sub-title color-white">
                        <?php echo sogo_meta('sub_title') ?>
                    </h2>
                </header>
                <!-- .page-header -->
            </div>
        </div>
    </div>
</section>
<!-- #accessibility-floor-2 -->
<section id="accessibility-floor-2" class="section floor cover">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 text-center">
                <div class="accessibility-two-sections">
                    <header class="page-header">
                        <h2
                          class="floor-title extra-margin color-white"><?php echo sogo_meta('left_title') ?></h2>
                    </header>
                    <div class="side-padding entry-content-white">
                        <?php echo apply_filters('the_content', sogo_meta('left_text')) ?>
                    </div>
                    <div class="text-center icon-access">
                        <img src="<?php echo sogo_meta('left_icon') ?>"/>
                    </div>
                </div>

                <!-- .page-header -->
            </div>
            <div class="col-md-6 text-center">
                <div class="accessibility-two-sections">
                    <header class="page-header">
                        <h2
                          class="floor-title extra-margin color-white"><?php echo sogo_meta('right_title') ?></h2>
                    </header>
                    <div class="side-padding entry-content-white">
                        <?php echo apply_filters('the_content', sogo_meta('right_text')) ?>
                    </div>
                    <div class="text-center icon-access">
                        <img src="<?php echo sogo_meta('right_icon') ?>"/>
                    </div>
                </div>
                <!-- .page-header -->
            </div>
        </div>
    </div>
</section>
<!-- #accessibility-floor-3 -->
<section id="accessibility-floor-3" class="section floor cover <?php sogo_extra_class('section-3-align') ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="mobile-text-align-center col-md-7 col-lg-6">
                <header class="floor-header">
                    <h2 class="floor-title extra-margin"><?php echo sogo_meta('sec-3-title') ?></h2>
                </header>
                <!-- .page-header -->
                <div class="adv-two-sections side-padding">
                    <ul class="floor-3-ul">
                        <?php
                        $floor_3_ul = sogo_meta('floor-3-li');
                        foreach ($floor_3_ul as $row) {
                            ?>
                            <li>
                                <h4 class="item-heading"><?php echo $row['item_heading'] ?></h4>

                                <p class="item-text"><?php echo $row['item_text'] ?></p>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="visible-sm visible-xs text-center man-img">
                <img src="<?php echo sogo_meta('sec-3-picture') ?>"/>
            </div>

        </div>
    </div>
</section>
<!-- #accessibility-floor-4 -->
<section id="accessibility-floor-4" class="section floor <?php sogo_extra_class('section-4-align') ?>">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <header class="floor-header">
                    <h2 class="floor-title color-white"><?php echo sogo_meta('section-4-title') ?></h2>
                </header>
                <!-- .page-header -->
                <div class="principles-icon-wrapper">
                    <?php
                    $list = sogo_meta('principles');
                    foreach ((array)$list as $l):
                        ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="icon-box">
                                <i class="fa <?php echo $l['icon'] ?> color-white round-white font-60"></i>
                                <h4 class="color-white uppercase bold">
                                    <?php echo $l['name'] ?>
                                </h4>

                                <p class="color-white">
                                    <?php echo nl2br($l['description']) ?>
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

</section>
<!-- #accessibility-floor-5 -->
<section id="accessibility-floor-5" class="section floor cover <?php sogo_extra_class('section-5-align') ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="mobile-text-align-center col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
                <div class="what-included-section">
                    <header class="floor-header">
                        <h2 class="floor-title text-center"><?php echo sogo_meta('sec-5-title') ?></h2>
                    </header>
                    <!-- .page-header -->

                    <ul class="floor-5-ul">
                        <?php
                        $floor_5_ul = sogo_meta('floor-5-li');
                        foreach ($floor_5_ul as $row) {
                            ?>
                            <li>
                                <h4 class="item-heading"><?php echo $row['item_heading'] ?>
                                    <span class="item-text"><?php echo $row['item_text'] ?>
                                    </span>
                                </h4>

                            </li>
                        <?php } ?>
                    </ul>
                </div>

            </div>

        </div>
    </div>
</section>
<!-- #accessibility-floor-1 -->
<section id="accessibility-floor-6" class="section floor cover vertical-top <?php sogo_extra_class('section-6-align') ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                <header class="floor-header text-center">
                    <h2 class="floor-title"><?php echo sogo_meta('section-6-title') ?></h2>
                </header>
                <!-- .floor-header -->
                <p class="text-center">
                    <?php echo sogo_meta('section-6-text') ?>
                </p>



            </div>
        </div>
    </div>
</section>
<?php get_footer() ?>
