<?php
/**
 * @package NF_Rest
 * @version 1.0
 */
/*
Plugin Name: NF Rest
Plugin URI: http://josegomezr.com.ve/
Description: Send your ninja-forms via rest.
Author: José Gómez
Version: 1.0
Author URI: http://josegomezr.com.ve/
*/

require_once ABSPATH . 'wp-content/plugins/ninja-forms/includes/Abstracts/Action.php';
require_once 'action.php';

add_filter( 'ninja_forms_register_actions', 'njrest_action' );

function njrest_action($actions)
{
	$actions['nf_rest'] = new NFR_Action();
	return $actions;
}



/**
 * @tag my_ninja_forms_processing
 * @callback my_ninja_forms_processing_callback
 */

/*add_filter( 'ninja_forms_after_submission', 'ninja_rest_handler' );
function ninja_rest_handler( $form_data ) {
    $log = "\n------------\n";
    $fields = $form_data["fields"];
    $payload = array();
    foreach($fields as $field){
        $key = $field["key"];
        $val = $field["value"];
        $payload[$key] = $val;
    }
    $log .= print_r($payload, 1);
    if(!isset($payload["rest_endpoint_url"]) or !isset($payload["rest_http_method"])){
        $log .= "\n:::EXITED, NO WHERE TO SEND DATA\n";
        file_put_contents("/tmp/phplog", $log);
        return;
    }
    $url = $payload['rest_endpoint_url'];
    $method = strtolower($payload['rest_http_method']);

    $args = array(
      'reject_unsafe_urls' => true,
      'method' => $method,
      'user-agent' => 'josegomezr/ninja-form',
      'body' => $payload
    );
    $req = wp_remote_request($url, $args);
    $log .= print_r($req, 1);
    file_put_contents("/tmp/phplog", $log);
}

*/