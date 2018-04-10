<?php echo sogo_option( 'google_remarketing' ) ?>


<footer id="site-footer" class="site-footer section fp-auto-height" role="contentinfo">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div id="rights">
                    &copy; <?php echo date( 'Y' ); ?> SOGO <?php _e( 'All right reserved.', 'sogoc' ) ?>
                </div> <!-- #rights -->
            </div><!-- .col-md-2 -->
            <div class="col-md-7 hidden-xs hidden-sm">

				<?php if ( has_nav_menu( 'primary_menu' ) ) : ?>
                    <nav class="primary-navigation navbar" role="navigation">
                        <div class=" primary-navigation">
							<?php
							// Social links navigation menu.
							wp_nav_menu( array(
								'theme_location' => 'primary_menu',
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>',
							) );
							?>
                        </div>
                    </nav><!-- .social-navigation -->
				<?php endif; ?>
            </div><!-- .col-md-8 -->
            <div class="col-md-2 hidden-xs hidden-sm">
				<?php if ( has_nav_menu( 'social_menu' ) ) : ?>
                    <nav class="social-navigation" role="navigation">
						<?php
						// Social links navigation menu.
						wp_nav_menu( array(
							'theme_location' => 'social_menu',
							'depth'          => 1,
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>',
							'walker'         => new sogo_social_walker_nav_menu()
						) );
						?>
                    </nav><!-- .social-navigation -->
				<?php endif; ?>
            </div><!-- .col-md-2 -->
        </div><!-- .row -->
    </div><!-- .container -->
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
