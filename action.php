<?php if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class NFR_Action
 */
final class NFR_Action extends NF_Abstracts_Action
{
    /**
    * @var string
    */
    protected $_name  = 'nf_rest';

    /**
    * @var array
    */
    protected $_tags = array();

    /**
    * @var string
    */
    protected $_timing = 'late';

    /**
    * @var int
    */
    protected $_priority = 10;

    /**
    * Constructor
    */
    public function __construct()
    {
        parent::__construct();

        $this->_nicename = __( 'Send to REST Endpoint', 'ninja-forms' );

        $settings = include 'config.php';
        
        $this->_settings = array_merge( $this->_settings, $settings );

    }

    /*
    * PUBLIC METHODS
    */

    public function save( $action_settings )
    {

    }

    public function process( $action_settings, $form_id, $data )
    {
        $payload = array();
        $fields = $data['fields'];

        foreach($fields as $field){
            $key = $field["key"];
            $val = $field["value"];
            $payload[$key] = $val;
        }

        $url = $action_settings['endpoint_url'];
        $method = $action_settings['endpoint_method'];

        $args = array(
          'reject_unsafe_urls' => false,
          'method' => $method,
          'user-agent' => 'josegomezr/ninja-form',
          'body' => $payload
        );

        $obj = wp_remote_request($url, $args);
        
        $message = "";

        if(is_wp_error($obj) || $obj['response']['code'] >= 300){
            $message = do_shortcode( $action_settings['error_message'] );
        }else{
            $message = do_shortcode( $action_settings['success_message'] );
        }
        
        if( ! isset( $data[ 'actions' ] ) || ! isset( $data[ 'actions' ][ 'success_message' ] ) ) {
            $data[ 'actions' ][ 'success_message' ] = '';
        }

        $data['actions']['success_message'] .= wpautop( $message );

        return $data;
    }


}
