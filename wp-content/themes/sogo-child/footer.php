<?php echo sogo_option( 'google_remarketing' ) ?>


<footer id="site-footer" class="site-footer section fp-auto-height" role="contentinfo">

    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-xs-12 col-md-10">
                <div class="d-flex justify-content-between site-footer-wrapper">
                    <div class="d-flex site-footer-nav-wrapper">
<!--                        <div id="logo">-->
<!--                            <a title="--><?php //echo esc_attr( __( 'Go to home page', 'sogoc' ) ) ?><!--" href="--><?php //echo esc_url( home_url( '/' ) ); ?><!--" rel="home"-->
<!--                               accesskey="H">--><?php //bloginfo( 'name' ); ?><!--</a>-->
<!--                        </div>-->
                        <?php if ( has_nav_menu( 'primary_menu' ) ) : ?>
                            <nav class="navbar" role="navigation">
                                <div class="footer-navigation">
                                    <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'primary_menu',
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

<a class="rfq-btn" data-toggle="modal" href="#rfq-modal" title="<?php _e( 'Request for quotation', 'sogoc' ) ?>">
	<?php _e( 'Get a Quote', 'sogoc' ) ?>
</a>

<div class="modal fade rfq" id="rfq-modal">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="col-md-10 col-md-offset-1">
                    <h3 class="modal-title uppercase">
						<?php _e( 'To get a quotation, please fill up the form', 'sogoc' ) ?>
                    </h3>

                    <div class="modal-form">
						<?php echo do_shortcode( sogo_meta( 'modal_form', get_option( 'page_on_front' ) ) ) ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php wp_footer(); ?>
</body>
</html>
