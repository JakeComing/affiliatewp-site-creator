<?php

function get_affiliate_record($atts) {


	$attr = shortcode_atts(array(
		'affiliate_id' => '',
	), $atts);


	$curl = curl_init();

	$curl_url = "https://radicalskincare.com/wp-json/affwp/v1/affiliates/" . $attr['affiliate_id'];



	curl_setopt_array($curl, array(

	  CURLOPT_URL => $curl_url,

	  CURLOPT_RETURNTRANSFER => true,

	  CURLOPT_ENCODING => "",

	  CURLOPT_MAXREDIRS => 10,

	  CURLOPT_TIMEOUT => 30,

	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

	  CURLOPT_CUSTOMREQUEST => "GET",

	  CURLOPT_POSTFIELDS => "",

	  CURLOPT_HTTPHEADER => array(

	    "Authorization: Basic amFrZWNvbWluZzpqYWtlY29taW5nITEyMw=="

	  ),

	));



	$response = curl_exec($curl);

	$err = curl_error($curl);



	curl_close($curl);



	if ($err) {

	  return var_dump($err);

	} else {

		return json_decode($response, true);

	}

}

add_shortcode('get_affiliate', 'get_affiliate_record');





//fires after "Create Affiliate Site" ninja form is submitted



add_action( 'affwp_set_affiliate_status', 'create_new_affiliate_site', 10, 3 );



function create_new_affiliate_site($affiliate_id = 0, $status = '', $args = array()) {



	if( empty( $affiliate_id ) || 'active' !== $status ) {

		return;

	}



	$the_affiliate = get_affiliate_record($affiliate_id);





	$affiliate_user_id = $the_affiliate['user_id'];



	$affiliate_wordpress_user = get_user_by('ID', $affiliate_user_id);

	$affiliate_first_name = $affiliate_wordpress_user->first_name;

	$affiliate_last_name = $affiliate_wordpress_user->last_name;



	

	$domain = 'radicalskincare.com';



	$url_string = '/' . $affiliate_user_id . '/';

	$site_name = $affiliate_first_name . " " . $affiliate_last_name . " Affiliate Blog";







	// wpmu_create_blog($domain, $url_string, $site_name, $affiliate_id);



	// Use this line instead of the one above to test that this function can create a blog. 

	// wpmu_create_blog('radicalskincare.com', '/jake/', 'Test Blog', 5640);

}
