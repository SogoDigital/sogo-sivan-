<?php echo sogo_option( 'google_remarketing' ) ?>

</div><!-- .site -->

<a href="#" class="scrollup hidden-xs hidden-sm" style="">
    To Top
</a>

<a class="rfq-btn" data-toggle="modal" data-target="#popup-form" href="#" title="<?php _e( 'Request for quotation', 'sogoc' ) ?>">
    <div class="footer-tell-us-image"><?php echo wp_get_attachment_image(get_field('_sogo_footer_tell_us_image', 'option'), 'full', false, array('class'=> 'img-fluid')) ; ?></div>
    <div class="footer-tell-us-image-hover"><?php echo wp_get_attachment_image(get_field('_sogo_footer_tell_us_image_hover', 'option'), 'full', false, array('class'=> 'img-fluid')) ; ?></div>
	<?php //echo get_field('_sogo_get_quote', 'option')?>
<!--	--><?php //_e( 'Get a Quote', 'sogoc' ) ?>
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
                        <p class="popup-title"><?php echo get_field('_sogo_footer_popup_title', 'option')?></p>
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