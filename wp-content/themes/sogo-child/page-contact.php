<?php // Template Name: contact page ?>
<?php get_header() ?>
    <section id="contact-floor-1" class="section fp-auto-height">
        <div class="container-fluid">
            <div class="row">
                <div itemscope itemtype="https://schema.org/ContactPage" class="col-md-8 col-md-offset-2 text-center">
                    <header class="page-header">
                        <h1 itemprop="headline"  class="page-title margin-top-150 color-white"><?php _e('contact us','sogoc')?></h1>
                    </header><!-- .page-header -->
                </div>
            </div>
        </div>
    </section> <!-- #contact-floor-1 -->
<a class="btn btn-primary hidden" data-toggle="modal" href="#modal-id">need to be submit btn</a>
<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title uppercase "><?php _e('thank you!','sogoc')?></h4>
                <p>
                    <?php _e('Your mail was successfully received, the marketing department will call you back as soon as possible. Thank you for your inquiry','sogoc')?>
                </p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <section id="contact-floor-2" class="section fp-auto-height">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-md-offset-1 text-center">
                    <!--                 @todo need to fix the form-->
                    <div class="contact-form-main">
                        <?php echo do_shortcode(sogo_meta('section-1-form')) ?>
                    </div>
                </div>
                <div itemscope itemtype="http://schema.org/LocalBusiness"  class="col-md-2 col-sm-6 col-md-offset-1 text-center">
                    <div class="contact-box-wrapper">
                        <div class="contact-box">
                            <a href="<?php echo sogo_meta('google-map') ?>" target="_blank">
                                <div class="contact-label">
                                    <span itemprop="name"><?php _e('address:','sogoc')?></span>
                                </div>
                                <div class="contact-icon bg-red full-radius">
                                    <i class="fa fa-map-marker "></i>
                                </div>
                                <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" class="text">
                                    <p itemprop="addressLocality"><?php _e('Israel, Kfar Saaba,','sogoc')?></p>
                                    <p  itemprop="streetAddress"><?php _e('Atir Yeda 1','sogoc')?></p>

                                </div>
                            </a>
                        </div>
                        <div class="contact-box">
                            <a href="mailto:Support@sogo.co.il?subject=hello" target="_top">
                                <div class="contact-label">
                                    <span><?php _e('Support:','sogoc')?></span>
                                </div>
                                <div class="contact-icon bg-green full-radius">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
                                <div class="text">
                                    <p itemprop="email">
                                        Support@sogo.co.il
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-md-offset-1 text-center">
                    <div class="contact-box">
                        <a href="tel:+97297719393" onclick="goog_report_conversion ()">
                            <div class="contact-label">
                                <span><?php _e('Phone:','sogoc')?></span>
                            </div>
                            <div class="contact-icon bg-green full-radius">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div itemprop="telephone" class="text">
                                <p><?php _e('Office: 09-7719393','sogoc')?>  </p>
<!--                                <p>--><?php //_e('Fax: 09-7665724','sogoc')?><!--  </p>-->

                            </div>
                        </a>
                    </div>
                    <div class="contact-box">
                        <a target="_blank" href="https://www.facebook.com/sogopage/?fref=ts">
                            <div class="contact-label">
                                <span><?php _e('Facebook:','sogoc')?></span>
                            </div>
                            <div class="contact-icon bg-red full-radius">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </div>
                            <div class="text">
                                <p>
                                    <?php _e('Follow us on FB','sogoc')?>
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- #contact-floor-2 -->


    <section id="contact-floor-3" class="section fp-auto-height">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="map-wrapper">
                        <iframe width="100%" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=100%&amp;height=450&amp;hl=en&amp;q=atir%20yeda%201%20+()&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- #contact-floor-3 -->


<!--    <footer id="customers-logos" class="section fp-auto-height">-->
<!--        <ul class="flex-slider">-->
<!--            --><?php
//            $logos = sogo_meta('customers_logos');
//            if ($logos) {
//                foreach ($logos as $id => $logo) {
//                    echo "<li>";
//                    sogo_print_image($id, $logo);
//                    echo "</li>";
//                }
//            }
//            ?>
<!--        </ul>-->
<!--    </footer>-->

<?php get_footer() ?>
