<?php

/**
 * An app context to contain data avaiable across the app
 *
 * @author Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
class AppContext
{
    private static $instance = null;
    private $values = array();
    
    private function __construct() {}
    
    static function instance() {
        if ( is_null( self::$instance ) ) { self::$instance = new self(); }
        return self::$instance;
    }
    
    function get( $key ) {
    if ( isset( $this->values[$key] ) ) {
        return $this->values[$key];
    }
        return null;
    }
    
    function set( $key, $value ) {
        $this->values[$key] = $value;
    }
}

?>