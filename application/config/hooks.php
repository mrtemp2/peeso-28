<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/userguide3/general/hooks.html
|
*/
$config['enable_hooks'] = TRUE;
$hook['pre_controller'][] = array(
    'class'    => '',
    'function' => 'log_request',
    'filename' => 'log_request.php',
    'filepath' => 'hooks'
);