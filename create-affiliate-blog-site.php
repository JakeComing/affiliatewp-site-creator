<?php

function shortcode_create_affiliate_blog_site($atts) {
	$attr = shortcode_atts(array(
		'url_string' => '',
		'title' => '',
		'user_id' => 5640 // default to add Jake's user to multisite for diagnostic purposes
		// 'meta' => '' // initial site options, likely useful in phase 2 of development
	), $atts);

	// create new site
	// $domain = site_url(1);
	$domain = 'radicalskincare.com';
	$url_string = '/' . $attr['url_string'] . '/';
	$site_name = $attr['title'];
	// make sure to test if user is logged in. Logged out users should be redirected away from this page
	$the_user_id = get_current_user_id();

	$new_affiliate_site = wpmu_create_blog($domain, $url_string, $site_name, $the_user_id);
	if(gettype($new_affiliate_site) === "boolean") {
		echo var_dump(get_blog_details($new_site_id));
	} else {
		echo "Oops, the new site was not created";
		echo var_dump($new_affiliate_site);
	}
	
	//return details for validation purposes
	// return $new_site;
	// return var_dump($new_site);
} add_shortcode( 'create_blog',  'shortcode_create_affiliate_blog_site'); // for testing only, remove for Production

// fires after "Create Affiliate Site" ninja form is submitted
add_action( 'affwp_set_affiliate_status', function($affiliate_id){
	
} , 10, 1);
do_action( 'affwp_set_affiliate_status', $affiliate->ID, "active", "pending");

// // callback function to process submission. Ninja Forms provides the semantic $form_data object
function create_new_affiliate_site() {
	// $affiliate_user_id = $affiliate->ID;

	// wpmu_create_blog( "radicalskincare.com", $affiliate_user_id, "Test Title", 5640);

}
// 	// THIS ACTION FIRES AFTER NEW SITE IS CREATED: wpmu_new_blog
	// add_action('wpmu_new_blog', 'send_site_info_to_new_affilliate');
	function send_site_info_to_new_affilliate() {
		// send an email to newly accepted affiliate
	}
