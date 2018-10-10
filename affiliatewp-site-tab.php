<?php 

/**
 * Step 1. Register the tab within AffiliateWP.
 *
 * @param array  $tabs Array of currently-registered tabs.
 * @return array Filtered array of tabs.
 */
function affwp_sites_tab( $tabs ) {

    /**
     * Tab ID: my-tab
     * Tab Title: My Tab
     */
    $tabs = array_merge( $tabs, array( 'affiliate-sites' => 'Affiliate Sites' ) );

    return $tabs;
}
add_filter( 'affwp_affiliate_area_tabs', 'affwp_sites_tab', 10, 1 );

/**
 * Step 2. Render the content for the custom tab.
 *
 * @param string $content The currently active tab's content.
 * @param string $tab The currently active tab's ID.
 * 
 * @return string $content The currently active tab's content.
 */ 
function affwp_render_my_sites_tab( $content, $tab ) {

    if ( $tab === 'affiliate-sites' ) {
        $content = do_shortcode('[ninja_form id=4]'); // You could also call another function here to output the content.
    }

    return $content;
    
}
add_filter( 'affwp_render_affiliate_dashboard_tab', 'affwp_render_my_sites_tab', 10, 2 );