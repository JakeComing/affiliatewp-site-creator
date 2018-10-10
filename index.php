<?php
/*
Plugin Name: AffiliateWP Site Creator
Description: Creates a new site on a multisite cluster after a new affiliate is approved. 
Version 0.1
Author: Jake Coming
Text Domain: affiliate-site-creator
*/


// function responsible for creating affiliate blog on multisite
include('create-affiliate-blog-site.php');

// $new_affiliate_site = shortcode_create_affiliate_blog_site($affiliate_attributes);

// register & configure management tab in back end
include('affiliatewp-site-tab.php');


// Eventually this should email the new affiliate, letting them know their site is ready to start using

