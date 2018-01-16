<?php if ( ! defined( 'ABSPATH' ) ) exit;

return array(

    /*
     * TAG
     */

    'endpoint_url' => array(
        'name' => 'endpoint_url',
        'type' => 'textbox',
        'group' => 'primary',
        'label' => __( 'Endpoint URL', 'ninja-forms' ),
        'placeholder' => 'https://my-app.org/endpoint/',
        'value' => '',
        'width' => 'full',
        'use_merge_tags' => array(
            'include' => array(
                'calcs',
            ),
        ),
    ),

    'endpoint_method' => array(
        'name' => 'endpoint_method',
        'type'    => 'select',
        'options' => array(
            'GET' => array(
                'label' => 'GET',
                'value' => 'GET'
            ),
            'POST' => array(
                'label' => 'POST',
                'value' => 'POST'
            ),
            'PUT' => array(
                'label' => 'PUT',
                'value' => 'PUT'
            ),
            'PATCH' => array(
                'label' => 'PATCH',
                'value' => 'PATCH'
            ),
        ),
        'group' => 'primary',
        'label' => __( 'HTTP Method', 'ninja-forms' ),
        'value' => '',
        'width' => 'full',
        'use_merge_tags' => array(
            'include' => array(
                'calcs',
            ),
        ),
    ),
    
    'success_message' => array(
        'name' => 'success_message',
        'type' => 'rte',
        'group' => 'primary',
        'label' => __( 'Message on Success', 'ninja-forms' ),
        'placeholder' => '',
        'width' => 'full',
        'value' => __( 'Your data has been successfully submitted.', 'ninja-forms' ),
        'use_merge_tags' => array(
            'include' => array(
                'calcs',
            ),
        ),
    ),

    'error_message' => array(
        'name' => 'error_message',
        'type' => 'rte',
        'group' => 'primary',
        'label' => __( 'Message on Failure', 'ninja-forms' ),
        'placeholder' => '',
        'width' => 'full',
        'value' => __( 'There was an error sending your data.', 'ninja-forms' ),
        'use_merge_tags' => array(
            'include' => array(
                'calcs',
            ),
        ),
    ),

);
