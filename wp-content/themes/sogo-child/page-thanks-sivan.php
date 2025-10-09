<?php // Template Name: Thanks page Sivan ?>
<?php get_header();
the_post();
?>

<section class="thanks-floor floor section vertical-top" style="background-image: url('<?php echo get_field('_sogo_thanks_bg')?>')">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="page-title">
                    <?php the_title(); ?>
                </h1>

                <p><?php the_content(); ?></p>

            </div>
        </div>
    </div>
    <div class="btn-wrapper">
<!--        <a href="--><?php //echo site_url() ?><!--"-->
<!--           title="--><?php //_e('Back to home', 'sogoc'); ?><!--"-->
<!--           class="gradient-btn">-->
<!--            --><?php //_e('Back to homepage', 'sogoc'); ?>
<!--        </a>-->
        <a class="gradient-btn" href="<?php echo site_url() ?>" title="<?php _e('Back to home', 'sogoc'); ?>">
            <span class="gradient-btn-text">
                <?php _e('Back to homepage', 'sogoc'); ?>
            </span>
            <span class="gradient-btn-arrow">
                <?php echo wp_get_attachment_image(get_field('_sogo_landing_floor1_button_arrow'), 'full', false, array('class' => 'img-fluid')); ?>
            </span>
        </a>
    </div>
</section> <!-- 404-floor-1 -->


<?php get_footer() ?>
