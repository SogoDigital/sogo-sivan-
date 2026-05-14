<?php
/* 
This file handles the admin area and functions.
You can use this file to make changes to the
dashboard. Updates to this page are coming soon.
It's turned off by default, but you can call it
via the functions file.

Developed by: Eddie Machado
URL: http://themble.com/bones/

Special Thanks for code & inspiration to:
@jackmcconnell - http://www.voltronik.co.uk/
Digging into WP - http://digwp.com/2010/10/customize-wordpress-dashboard/

*/

/************* DASHBOARD WIDGETS *****************/

// disable default dashboard widgets
function disable_default_dashboard_widgets()
{
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'core'); // Comments Widget
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');  // Incoming Links Widget
    remove_meta_box('dashboard_plugins', 'dashboard', 'core');         // Plugins Widget
    remove_meta_box('dashboard_quick_press', 'dashboard', 'core');     // Quick Press Widget
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');   // Recent Drafts Widget
    remove_meta_box('dashboard_primary', 'dashboard', 'core');
    remove_meta_box('dashboard_secondary', 'dashboard', 'core');
    remove_meta_box('yoast_db_widget', 'dashboard', 'normal');         // Yoast's SEO Plugin Widget
}

// RSS Dashboard Widget
function ohav_rss_dashboard_widget()
{
    if ( ! function_exists( 'fetch_feed' ) ) {
        echo '<div>RSS functionality is unavailable.</div>';
        return;
    }

    include_once( ABSPATH . WPINC . '/feed.php' );

    $feed = fetch_feed( 'https://sogo.co.il/feed/' );

    // Check for errors (WP_Error or failed fetch)
    if ( is_wp_error( $feed ) ) {
        echo '<div>The RSS Feed is currently unavailable.</div>';
        return;
    }

    $limit = $feed->get_item_quantity( 7 );

    if ( $limit === 0 ) {
        echo '<div>The RSS Feed is either empty or unavailable.</div>';
        return;
    }

    $items = $feed->get_items( 0, $limit );

    foreach ( $items as $item ) : ?>
        <h4 style="margin-bottom: 0;">
            <a href="<?php echo esc_url( $item->get_permalink() ); ?>"
               title="<?php echo esc_attr( $item->get_date( 'j F Y @ g:i a' ) ); ?>"
               target="_blank" rel="noopener noreferrer">
                <?php echo esc_html( $item->get_title() ); ?>
            </a>
        </h4>
    <?php endforeach;
}

function oh_help_dashboard_widget()
{
    echo 'ברוכים הבאים לאתר';
}

// calling all custom dashboard widgets
function bones_custom_dashboard_widgets()
{
    add_meta_box( 'ohav_rss_dashboard_widget', __( 'Recent Sites' ), 'ohav_rss_dashboard_widget', 'dashboard', 'normal', 'core' );
    add_meta_box( 'oh_help_dashboard_widget', __( 'Updates' ), 'oh_help_dashboard_widget', 'dashboard', 'side', 'core' );
}

add_action( 'admin_menu', 'disable_default_dashboard_widgets' );
add_action( 'wp_dashboard_setup', 'bones_custom_dashboard_widgets' );


/************* CUSTOMIZE ADMIN *******************/

function sogo_custom_admin_footer()
{
    echo '<span id="footer-thank-you">Developed by: <a href="https://sogo.co.il" target="_blank" rel="noopener noreferrer">SOGO</a></span>';
}

add_filter( 'admin_footer_text', 'sogo_custom_admin_footer' );