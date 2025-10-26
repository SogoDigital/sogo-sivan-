<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri() ?>/favicon.png" type="image/x-icon"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-PVP2NT');</script>
    <!-- End Google Tag Manager -->
</head>

<body class="landing-page">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PVP2NT"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<header id="header">
    <!--  Desktop Header -->
    <div class="desktop-header container-fluid hidden-xs hidden-sm visible-md-block visible-lg-block">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="d-flex justify-content-between align-items-center">
                    <div id="logo">
                        <a title="<?php echo esc_attr( __( 'Go to home page', 'sogoc' ) ) ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"
                           accesskey="H">
                            <?php echo wp_get_attachment_image(get_field('_sogo_logo', 'option'), 'full', false, array('class'=> 'img-fluid')) ; ?>
                        </a>
                    </div>

                    <div class="desktop-menu">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'primary_menu',
                            'link_before'    => '<span class="">',
                            'link_after'     => '</span>',

                        ) );
                        ?>
                    </div>
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
                                <span class="margin-bottom-0">צרו קשר</span>
                            </a>
                        </div>
                    </div>
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