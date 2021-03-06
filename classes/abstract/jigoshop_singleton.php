<?php

/**
 * Abstract Singleton Class: Ensure that there can be only one instance of Class. Provide a global access point to that instance.
 *
 * DISCLAIMER
 *
 * Do not edit or add directly to this file if you wish to upgrade Jigoshop to newer
 * versions in the future. If you wish to customise Jigoshop core for your needs,
 * please use our GitHub repository to publish essential changes for consideration.
 *
 * @package    Jigoshop
 * @category   Core
 * @author     Jigowatt
 * @copyright  Copyright (c) 2011 Jigowatt Ltd.
 * @license    http://jigoshop.com/license/commercial-edition
 */

abstract class jigoshop_singleton extends jigoshop_base_class {

    private static $instance = array();
    
    
    protected function __construct() { }
	
	
    public static function instance() {
		
    	$class = get_called_class();
		
    	if ( isset( self::$instance[$class] ) ) return self::$instance[$class];
    	
    	$args = func_get_args();
    	
    	self::$instance[$class] = new $class( $args );
    	
    	return self::$instance[$class];
    
    }
    
    
	public function __clone() {
        trigger_error( "Cloning Singleton's is not allowed.", E_USER_ERROR );
    }
	
	
    public function __wakeup() {
        trigger_error( "Unserializing Singleton's is not allowed.", E_USER_ERROR );
    }
    
}