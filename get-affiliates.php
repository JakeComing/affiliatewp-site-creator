<?php

function  shortcode_get_pending_affiliates() {
	//RESTful API request to AffiliateWP plugin
	// Curl code output from Postman
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://radicalskincare.com/wp-json/affwp/v1/affiliates",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "Authorization: Basic Yzg1Y2E0N2UyNjEwZDBmNjFhZWJhOGI0NzRkYWI0NDU6MDM5ZDMzMWE2N2RlOWJiZjJiZDIzNzU1YjllM2EwNWM=",
	    "Cache-Control: no-cache",
	    "Postman-Token: c65b19ac-36b1-4b46-8e8c-e97bdbc1c68f"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  return "cURL Error #:" . $err;
	} else {
	  return  json_decode($response, true);
	}
} add_shortcode( 'get_pending_affiliates', 'shortcode_get_pending_affiliates' ); // for testing only, remove for Production