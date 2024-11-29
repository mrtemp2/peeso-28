<?php
function log_request()
{
    $CI =& get_instance();
    log_message('debug', 'Request URI: ' . $CI->uri->uri_string());
}