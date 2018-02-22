<?php // Template Name: case page ?>
<?php
global  $fullpage;
$fullpage = "fullpage"; ?>
<?php get_header() ?>
<section id="case-floor-1" class="section floor cover" style="background-image: url('<?php echo sogo_meta('bg') ?>')">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <header class="page-header">
                    <h1 class="page-title color-white"><?php the_title() ?></h1>
                    <h3 class="page-sub-title uppercase"><?php echo sogo_meta('sub-title')?></h3>
                </header>
                <!-- .page-header -->
            </div>
        </div>
        <div class="col-md-6 col-md-offset-2 text-left">
            <div class="title-text-wrapper">
                <h5 class="bold under-line"><?php echo sogo_meta('left_title')?></h5>
                <p>
                    <?php echo nl2br(sogo_meta('left_text'))?>
                </p>
            </div>
        </div>
    </div>
</section> <!-- #case-floor-1 -->
<?php
$floors = sogo_meta('floors');

if ($floors) {
    foreach ($floors as $key => $floor) {
        ?>
        <section id="<?php echo $floor['id'] ?>"
                 class="section floor <?php echo $floor['align'] . " " . $floor['background-size'] ?>">
            <div
                class="bg-image moving-bg  <?php echo $floor['align'] . " " . $floor['background-size'] ?>"
                style="background-image: url('<?php echo $floor['background'] ?>')">
            </div>

            <?php
            if ($floor['overlay-image'] != '') {
                echo '<div class="overlay-image layer '.$floor['overlay-animation'].' animated' . $floor['overlay-size'] . '"
                        style="background-image: url(\'' . $floor['overlay-image'] . '\');"></div>';
            }
            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="<?php echo $floor['col'] ?>">
                        <header class="floor-header">
                            <h2 class="floor-title <?php echo $floor['title-class'] ?>"><?php echo $floor['title'] ?></h2>
                        </header><!-- .floor-header -->

                            <?php echo apply_filters('the_content',$floor['text']) ?>

                    </div>
                </div>
            </div>
            <div class="continue-down">
                     <span class="scroll-to continue">
                         <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                     </span>
            </div>
        </section> <!-- /floor- -->
        <?php
    }
}
?>

<section id="case-floor-9" class="bg-light-green section fp-auto-height">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="color-white"><?php _e('what our clients says','sogoc')?></h2>
                <div class="client-img full-radius">
                  <?php sogo_image('customer_avatar')?>
                </div>
                <p class="color-white bold uppercase margin-bottom-0">
                    <?php echo sogo_meta('customer_name')?>
                </p>
                <p class="color-white under-line">
                    <?php echo sogo_meta('customer_job_title')?>, <span class="bold">    <?php echo sogo_meta('customer_company')?></span>
                </p>
                <p class="color-white italic center-content padding-bottom-100">
                    <?php echo sogo_meta('customer_description')?>
                </p>
            </div>
        </div>

    </div>
</section> <!-- #case-floor-9 -->
<?php get_footer() ?>
