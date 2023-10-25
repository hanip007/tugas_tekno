<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('is_authenticated')) {
    function is_authenticated() {
        $CI =& get_instance();
        return $CI->session->userdata('username') !== NULL;
    }
}
?>