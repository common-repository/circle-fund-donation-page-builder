<?php
/*
Plugin Name: Circle Fund Donation Page Builder
Plugin URI: https://www.circlefund.org/wordpress
Description: This plugin will add donation, event or crowdfunding pages to your website.  Just sign up for a free account at circlefund.org, login to the Dashboard / Fundraising / E-commerce or Events and then add your campaign URL to the shortcode [donate url="https://www.gocirclefund.com/campaign" width="800" height="1200"] which can be added to any page or post. 
Author: circlefund
Author URI: https://circlefund.org
Tags: donor, donation, donations, nonprofit, nonprofits, e-commerce, ecommerce, fundraising, payment, payments, crowdfunding, campaign, stripe, campaigns, social causes, causes, credit card, credit cards
Version: 1.0
License: GPLv2 or later.
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// register style 
add_action('init', 'circlefund_donate_register_script');
function circlefund_donate_register_script() {
wp_register_style( 'circlefund_donate_iframe_style', plugins_url('/css/cf-styles.css', __FILE__), false, '1.0.0', 'all');
}

// use the registered style above
add_action('wp_enqueue_scripts', 'circlefund_enqueue_style');

function circlefund_enqueue_style(){
wp_enqueue_style( 'circlefund_donate_iframe_style' );
}

function circlefund_donate($atts) {
	extract(shortcode_atts(array(
		"url" => 'https://',
		"width" => '800',
		"height" => '1400',			
	), $atts));
	return '<iframe src="'.$url.'" frameborder="0" style="height: '.$height.'px; width: '.$width.'px" class="aspect-ratio"></iframe>';
}
add_shortcode("donate", "circlefund_donate");