<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri() ?>/favicon.png" type="image/x-icon"/>
	<?php echo sogo_option( 'google_analytics' ) ?>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-PVP2NT');</script>
    <!-- End Google Tag Manager -->

	<?php wp_head(); ?>
    <meta name="google-site-verification" content="CENsDkKhUNlnrPBe-J_9bi10C8YYnFAZa2sUDYDhnTc"/>
    <meta name="google-site-verification" content="u6y7i806g-p2NKYeuDxGcoEOXMpGpgUQ2_x-gXjf4_U"/>
</head>
<?php
global $fullpage;
if ( $fullpage === null ) {
	$fullpage = ( is_404() || is_single() || is_archive() || is_search() || is_home() || sogo_meta( 'disable_fullpage' ) == 'on' ) ? '' : 'fullpage';
}
$fullpage .= wp_is_mobile() ? " mobile " : '';
?>
<body <?php body_class( $fullpage ); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PVP2NT"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<?php echo sogo_option( 'google_tag' ) ?>

<header id="header">
<!--  Desktop Header -->
    <div class="desktop-header container-fluid hidden-xs hidden-sm visible-md-block visible-lg-block">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="d-flex justify-content-between align-items-center">
<!--                    <div class="col-md-2 d-flex">-->
                        <div id="logo">
                            <a title="<?php echo esc_attr( __( 'Go to home page', 'sogoc' ) ) ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"
                               accesskey="H">
                                <?php echo wp_get_attachment_image(get_field('_sogo_logo', 'option'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                            </a>
                        </div>
<!--                    </div>-->
<!--                    <div class="col-md-8 d-flex justify-content-center">-->
                        <div class="desktop-menu">
                            <?php
                            wp_nav_menu( array(
                                'theme_location' => 'primary_menu',
                                'link_before'    => '<span class="">',
    //								'link_before'    => '<span class="screen-reader-text">',
                                'link_after'     => '</span>',

                            ) );
                            ?>
                        </div>
<!--                    </div>-->
<!--                    <div class="col-md-2">-->
                        <div class="d-flex align-items-center justify-content-end">
                            <?php while (have_rows('_sogo_header_social', 'option')): the_row(); ?>
                                <div class="social-card">
                                    <a href="<?php echo get_sub_field( 'link' ) ?>">
                                        <img class="social-icon" src="<?php echo get_sub_field( 'image' ) ?>" alt="">
                                        <img class="social-hover-icon" src="<?php echo get_sub_field( 'hover_image' ) ?>" alt="">
                                    </a>
                                </div>
                            <?php endwhile; ?>

                            <div class="contact-header position-relative">
                                <a href="<?php echo get_field('_sogo_header_contact_link', 'option')?>">
                                    <div class="contact-header-inner d-flex justify-content-center align-items-center">
                                        <span class="margin-bottom-0">צרו קשר</span>
                                    </div>
                                </a>
                            </div>
                        </div>
<!--                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <!--  Mobile Header -->
    <div class="mobile-header container-fluid visible-xs-block visible-sm-block hidden-md hidden-lg">
        <div class="row d-flex">
            <div class="col-xs-12 position-relative">
                <div class="d-flex justify-content-between h-100">
                    <div class="h-100">
                        <div class="h-100 d-flex align-items-center">
                                <a class="nav-button ml-auto mr-4">
                                    <span id="nav-icon3">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </span>
                                </a>
                        </div> <!--navbar end-->
                        <div class="fixed-top dineuron-menu">
                            <div class="flex-center p-5">
                                <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'primary_menu',
                                    'link_before'    => '<span class="">',
                                    //								'link_before'    => '<span class="screen-reader-text">',
                                    'link_after'     => '</span>',

                                ) );
                                ?>
                            </div>
                        </div> <!--dineuron-menu end-->
                    </div>
                    <div id="logo">
                        <a title="<?php echo esc_attr( __( 'Go to home page', 'sogoc' ) ) ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"
                           accesskey="H">
                            <?php echo wp_get_attachment_image(get_field('_sogo_logo', 'option'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!--<header id="main-header">-->
<!---->
<!--    <div class="container-fluid mobile-white">-->
<!--        <div class="row">-->
<!--            <div class="col-xs-3 --><?php //echo ( is_rtl() ) ? 'col-xs-pull-9 col-md-pull-0' : 'col-xs-push-9 col-md-push-0'; ?><!--  col-md-2">-->
<!--                <div id="logo">-->
<!--                    <a title="--><?php //echo esc_attr( __( 'Go to home page', 'sogoc' ) ) ?><!--" href="--><?php //echo esc_url( home_url( '/' ) ); ?><!--" rel="home"-->
<!--                       accesskey="H">--><?php //bloginfo( 'name' ); ?><!--</a>-->
<!--                </div>-->
                <!-- #logo -->
<!--            </div>-->
<!--            <div id="main-nav-container" class="col-xs-3 col-sm-3 col-md-7 --><?php //echo is_rtl() ? 'col-xs-push-3 col-md-push-0' : 'col-xs-pull-3 col-md-pull-0'; ?><!--">-->
<!---->
<!--				--><?php //if ( has_nav_menu( 'primary_menu' ) ) : ?>
<!--                    <nav id="primary-navigation" class="navbar primary-navigation" role="navigation">-->
<!--                        <div itemscope itemtype="http://schema.org/SiteNavigationElement" class="navbar-header">-->
<!--                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"-->
<!--                                    data-target="#primary-navigation" style="border: none;">-->
<!---->
<!--                                <span class="sr-only">--><?php //_e( 'Toggle navigation', 'sogoc' ); ?><!--</span>-->
<!--                                <span class="icon-bar top-bar"></span>-->
<!--                                <span class="icon-bar middle-bar"></span>-->
<!--                                <span class="icon-bar bottom-bar"></span>-->
<!--                            </button>-->
<!--                        </div>-->
<!---->
<!---->
<!---->
<!--                        <div class="collapse navbar-collapse primary-navigation-collapse">-->
<!--							--><?php
//							// Social links navigation menu.
//							wp_nav_menu( array(
//								'theme_location' => 'primary_menu',
//								'link_before'    => '<span class="">',
////								'link_before'    => '<span class="screen-reader-text">',
//								'link_after'     => '</span>',
//
//							) );
//							?>
<!--                        </div>-->
<!--                    </nav>-->
<!--    				--><?php //endif; ?>
<!--            </div>-->
<!--            <div class="call-now visible-xs col">-->
<!--                <a href="tel:--><?php //echo sogo_option( 'phone_num' ) ?><!--">-->
<!--                    <i class="fa fa-mobile" aria-hidden="true"></i>-->
<!--                    <span>--><?php //_e( 'Call now', 'sogoc' ) ?><!--</span>-->
<!--                </a>-->
<!--            </div>-->
            <!-- .col-md-8 -->
<!---->
            <!-- .col-md-2 -->
<!--            <div class="col-md-3 col-sm-2">-->
<!--                <div class="d-flex align-items-center">-->
<!--                    --><?php //while (have_rows('_sogo_header_social', 'option')): the_row(); ?>
<!--                        <div class="social-card">-->
<!--                            <a href="--><?php //echo get_sub_field( 'link' ) ?><!--">-->
<!--                                <img class="social-icon" src="--><?php //echo get_sub_field( 'image' ) ?><!--" alt="">-->
<!--                                <img class="social-hover-icon" src="--><?php //echo get_sub_field( 'hover_image' ) ?><!--" alt="">-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    --><?php //endwhile; ?>
<!---->
<!--                    <div class="contact-header position-relative">-->
<!--                        <div class="contact-header-inner">-->
<!--                            <p class="margin-bottom-0">צרו קשר</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--				--><?php //if ( has_nav_menu( 'social_menu' ) ) : ?>
<!--                    <nav id="social-navigation" class="social-navigation" role="navigation">-->
<!--						--><?php
//						// Social links navigation menu.
////						wp_nav_menu( array(
////							'theme_location' => 'social_menu',
////							'depth'          => 1,
////							'link_before'    => '<span class="screen-reader-text">',
////							'link_after'     => '</span>',
////							'walker'         => new sogo_social_walker_nav_menu()
////						) );
////						?>
<!--                    </nav>
<!--				--><?php //endif; ?>
<!--                <div class="phone-num hidden-xs hidden-sm hidden-md">-->
<!--                    <a href="tel:--><?php //echo sogo_option( 'phone_num' ) ?><!--">-->
<!--                        <span>--><?php //echo sogo_option( 'phone_num' ) ?><!--</span>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
            <!-- .col-md-2 -->
<!--        </div>-->
        <!-- .row -->
<!--    </div>-->
    <!-- .container -->
<!--</header>-->
<!-- #home-floor-1 -->

<div id="page" class="site">

