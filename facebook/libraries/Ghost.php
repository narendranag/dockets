<?php

/**
 * Ghost is an Error Handling Class for Codeigntier
 *
 * Ghost will serve as a central server for dispatching or errors and other related stuff.
 *
 * @author Neeraj Kumar a.k.a Codemaster Snake
 * @copyright copyright 2010 (c) Neeraj Kumar.
 * @package CodeIgniter
 * @version 0.1beta
 *
 */


/**
 * Main ghost Class
 *
 * @package Ghost
 * @since 0.1beta
 * @author Neeraj Kumar a.k.a Codemaster Snake
 *
 */

class Ghost {
    
    var $errors = array();

    /**
     *
     * Registers a new error
     *
     * @param <mixed> $params
     * @since 0.1beta
     * @access public
     *
     */
    public function register_error($params = array()) {
        array_push($params,$this->errors);
        
    }

    /**
     * Returns information about an error
     *
     * @param <mixed> $error_id
     * @return <json>
     * @since 0.1beta
     * @access public
     */
    public function get_error_message($error_id) {
        $err_info = $this->errors($error_id);
        return json_encode($err_info);
    }

}
