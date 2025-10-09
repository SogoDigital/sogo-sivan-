<?php // Template Name: Thanks page ?>
<?php get_header();
the_post();
?>

<section class="thanks-floor floor section vertical-top" style="background-image: url('<?php echo get_field('_sogo_thanks_bg')?>')">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="page-title color-green">
                    <?php the_title(); ?>
                </h1>

                <p><?php the_content(); ?></p>

            </div>
        </div>
    </div>
    <div class="btn-wrapper">
        <a href="<?php echo site_url() ?>"
           title="<?php _e('Back to home', 'sogoc'); ?>"
           class="btn-home btn">
            <?php _e('Back to homepage', 'sogoc'); ?>
        </a>
    </div>
</section> <!-- 404-floor-1 -->


<?php get_footer() ?>
