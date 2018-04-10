<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri() ?>/favicon.png" type="image/x-icon"/>
	<?php echo sogo_option( 'google_analytics' ) ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-PVP2NT');</script>
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
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PVP2NT"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php echo sogo_option( 'google_tag' ) ?>


<header id="main-header">

    <div class="container-fluid mobile-white">
        <div class="row">
            <div class="col-xs-3 col-xs-pull-9 col-md-pull-0 col-md-2    ">
                <div id="logo">
                    <a title="<?php echo esc_attr(__('Go to home page','sogoc')) ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" accesskey="H"><?php bloginfo( 'name' ); ?></a>
                </div>
                <!-- #logo -->
            </div>
            <div id="main-nav-container" class="col-xs-3 col-sm-3 col-md-7 col-md-push-0  col-xs-push-3">

				<?php if ( has_nav_menu( 'primary_menu' ) ) : ?>
                    <nav id="primary-navigation" class="navbar primary-navigation" role="navigation">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div itemscope itemtype="http://schema.org/SiteNavigationElement" class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#primary-navigation" style="border: none;top: -1px; right: -1px;">

                                <span class="sr-only"><?php _e( 'Toggle navigation', 'sogoc' ); ?></span>
                                <span class="icon-bar top-bar"></span>
                                <span class="icon-bar middle-bar"></span>
                                <span class="icon-bar bottom-bar"></span>
                            </button>
                        </div>


                        <div class="collapse navbar-collapse primary-navigation-collapse">
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
            </div>
            <div class="call-now visible-xs col">
                <a href="tel:<?php echo sogo_option( 'phone_num' ) ?>">
                    <i class="fa fa-mobile" aria-hidden="true"></i>
                    <span><?php _e( 'Call now', 'sogoc' ) ?></span>
                </a>
            </div>
            <!-- .col-md-8 -->

            <!-- .col-md-2 -->
            <div class="col-md-3 col-sm-2   " style="padding: 0">
				<?php if ( has_nav_menu( 'social_menu' ) ) : ?>
                    <nav id="social-navigation" class="social-navigation" role="navigation">
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
                <div class="phone-num hidden-xs hidden-sm hidden-md">
                    <a href="tel:<?php echo sogo_option( 'phone_num' ) ?>">
                        <span><?php echo sogo_option( 'phone_num' ) ?></span>
                    </a>
                </div>
            </div>
            <!-- .col-md-2 -->
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</header>
<!-- #home-floor-1 -->
<div id="page" class="site">