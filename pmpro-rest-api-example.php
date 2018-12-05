<?php
/*
Plugin Name: PMPro REST API Client Example
Plugin URI: 
Description: Example of calling the PMPro REST API Endpoint
Version: 1.0
Author: Hersha Venkatesh
Author URI: 
*/


function pmpro_rest_api_client_example()
{
	/*
	Basic Authentication string ie: base64_encode($username . ':' . $password)
	$username and $password are credentials to remote server running REST API
	Only use Basic Auth for testing/dev environments in production use OAuth 1 or 2.
   	*/
    
    $username = "";
    $password = "";
	$auth = base64_encode($username . ':' . $password);
		
	//$remote_url = "https://example.com/wp-json/wp/v2/posts/58/user_id/2/pmpro_has_membership_access";
	$remote_url = "https://example.com/wp-json/wp/v2/users/1404/pmpro_membership_level"; 
	$args = array(
    			'headers'=>
    				array('Authorization' =>'Basic '.$auth),
	);
	
	$response = wp_remote_get($remote_url, $args);
	$data =  wp_remote_retrieve_body($response);

	return print_r(json_decode($data), true);
		
}

add_shortcode('pmpro_rest_api_example', 'pmpro_rest_api_client_example');