<?php echo sogo_option( 'google_remarketing' ) ?>

<?php if(!(is_page_template('page-contact.php') || is_page_template('page-thanks.php') || is_page_template('page-thanks-sivan.php'))) { ?>
    <div id="footer-form" class="footer-form" style="background-image: url(<?php echo get_field('_sogo_footer_bg', 'option'); ?>); ">
        <div class="footer-form-wrapper">

            <div class="footer-form-circle text-center">
                <div class="footer-form-circle-blur"></div>
                <div class="position-relative">
                    <div class="red-ball-wrapper">
                        <?php echo wp_get_attachment_image(get_field('_sogo_footer_red_ball', 'option'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                    </div>
                    <div class="green-ball-wrapper">
                        <?php echo wp_get_attachment_image(get_field('_sogo_footer_green_ball', 'option'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                    </div>
                    <div class="footer-blur-image">
                        <?php echo wp_get_attachment_image(get_field('_sogo_footer_blur_image', 'option'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                    </div>
                    <h3 class="footer-blur-title"><?php echo get_field('_sogo_footer_blur_title', 'option') ?></h3>
                    <p class="footer-blur-subtitle"><?php echo get_field('_sogo_footer_blur_subtitle', 'option') ?></p>
                    <p class="footer-blur-address"><?php echo get_field('_sogo_footer_blur_address', 'option') ?></p>
                    <div class="footer-blur-social d-flex justify-content-center align-items-center">
                        <?php while (have_rows('_sogo_footer_blur_social', 'option')): the_row(); ?>
                                <a href="<?php echo get_sub_field( 'link' ) ?>">
                                    <?php echo wp_get_attachment_image(get_sub_field('icon'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                                </a>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <div class="footer-form-tofes">
                <div class="footer-form-tofes-blur"></div>
                <p class="footer-tofes-title">
                    <span class="footer-tofes-title-black"><?php echo get_field('_sogo_footer_tofes_title', 'option') ?></span>
                    <span class="footer-tofes-title-gradient"><?php echo get_field('_sogo_footer_tofes_title_gradient', 'option') ?></span>
                </p>
                <p class="footer-tofes-subtitle">
                    <?php echo get_field('_sogo_footer_tofes_subtitle', 'option') ?>
                </p>
                <div>
                    <?php echo do_shortcode('[contact-form-7 id="' . get_field('_sogo_footer_form', 'option') . '" title="Footer Form"]'); ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<footer id="site-footer" class="site-footer section fp-auto-height" role="contentinfo">

    <div class="container-fluid py-2 py-lg-4">
        <div class="row d-flex bottom-footer-columns justify-content-center">
            <div class="bottom-footer-menu col-xs-12 col-lg-10 col-xxl-8">
                <div class="row">
                    <?php if ( is_active_sidebar( 'footer-col-1' ) ) :  ?>
                        <div class="col-xs-6 col-lg-3 footer-first">
                            <?php dynamic_sidebar( 'footer-col-1' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( is_active_sidebar( 'footer-col-2' ) ) :  ?>
                        <div class="col-xs-6 col-lg-3 footer-second">
                            <?php dynamic_sidebar( 'footer-col-2' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( is_active_sidebar( 'footer-col-3' ) ) :  ?>
                        <div class="col-xs-6 col-lg-3 footer-third">
                            <?php dynamic_sidebar( 'footer-col-3' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( is_active_sidebar( 'footer-col-4' ) ) :  ?>
                        <div class="col-xs-6 col-lg-3 footer-fourth">
                            <?php dynamic_sidebar( 'footer-col-4' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-xs-12 col-md-10">
                <div class="d-flex justify-content-between site-footer-wrapper">
                    <div class="d-flex site-footer-nav-wrapper">
<!--                        <div id="logo">-->
<!--                            <a title="--><?php //echo esc_attr( __( 'Go to home page', 'sogoc' ) ) ?><!--" href="--><?php //echo esc_url( home_url( '/' ) ); ?><!--" rel="home"-->
<!--                               accesskey="H">--><?php //bloginfo( 'name' ); ?><!--</a>-->
<!--                        </div>-->
                        <?php if ( has_nav_menu( 'footer_menu' ) ) : ?>
                            <nav class="navbar" role="navigation">
                                <div class="footer-navigation">
                                    <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'footer_menu',
                                        'link_before'    => '<span class="">',
                                        'link_after'     => '</span>',
                                    ) );
                                    ?>
                                </div>
                            </nav><!-- .social-navigation -->
                        <?php endif; ?>
                        <div class="d-flex align-items-center justify-content-end">
                            <?php while (have_rows('_sogo_header_social', 'option')): the_row(); ?>
                                <div class="social-card">
                                    <a href="<?php echo get_sub_field( 'link' ) ?>">
                                        <img class="social-icon" src="<?php echo get_sub_field( 'image' ) ?>" alt="">
                                        <img class="social-hover-icon" src="<?php echo get_sub_field( 'hover_image' ) ?>" alt="">
                                    </a>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <div id="rights">
                        &copy; <?php echo date( 'Y' ); ?> SOGO <?php _e( 'All right reserved.', 'sogoc' ) ?>
                    </div> <!-- #rights -->
                </div>
            </div>
        </div>
    </div>


</footer><!-- .site-footer -->
</div><!-- .site -->

<a href="#" class="scrollup hidden-xs hidden-sm" style="">
    To Top
</a>

<a class="footer-tell-us-mobile d-block d-lg-none" data-toggle="modal" data-target="#popup-form" href="#" title="<?php _e( 'Request for quotation', 'sogoc' ) ?>">
    <div class=""><?php echo wp_get_attachment_image(get_field('_sogo_footer_tell_us_mobile', 'option'), 'full', false, array('class'=> 'img-fluid')) ; ?></div>
</a>
<a class="rfq-btn d-none d-lg-block" data-toggle="modal" data-target="#popup-form" href="#" title="<?php _e( 'Request for quotation', 'sogoc' ) ?>">
    <div class="footer-tell-us-image"><?php echo wp_get_attachment_image(get_field('_sogo_footer_tell_us_image', 'option'), 'full', false, array('class'=> 'img-fluid')) ; ?></div>
    <div class="footer-tell-us-image-hover"><?php echo wp_get_attachment_image(get_field('_sogo_footer_tell_us_image_hover', 'option'), 'full', false, array('class'=> 'img-fluid')) ; ?></div>
</a>


<!--<div class="modal" id="popup-form">-->
<div class="modal fade" id="popup-form">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="popup-man text-center"><?php echo wp_get_attachment_image(get_field('_sogo_footer_popup_man', 'option'), 'full', false, array('class'=> 'img-fluid')) ; ?></div>
            <div class="modal-content text-center">
                <div class="modal-body">
                    <div class="popup-blue-ball"><?php echo wp_get_attachment_image(get_field('_sogo_footer_popup_blue_ball', 'option'), 'full', false, array('class'=> 'img-fluid')) ; ?></div>
                    <div class="popup-red-ball"><?php echo wp_get_attachment_image(get_field('_sogo_footer_popup_red_ball', 'option'), 'full', false, array('class'=> 'img-fluid')) ; ?></div>
                    <div class="popup-airplane"><?php echo wp_get_attachment_image(get_field('_sogo_footer_popup_airplane', 'option'), 'full', false, array('class'=> 'img-fluid')) ; ?></div>
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                    <div class="text-center">
                        <p class="popup-top-text"><?php echo get_field('_sogo_footer_popup_top_text', 'option')?></p>
                        <h2 class="popup-title"><?php echo get_field('_sogo_footer_popup_title', 'option')?></h2>
                        <div class="modal-form">
                            <?php echo do_shortcode( '[contact-form-7 id="07fdc94" title="Popup Form"]' ) ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<!-- /.modal -->



<?php wp_footer(); ?>
</body>
</html>