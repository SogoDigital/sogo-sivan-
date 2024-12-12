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


<div id="page" class="site">

