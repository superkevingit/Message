<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$hook['post_controller_constructor'] = array(
    'class' => 'AdminAuth',
    'function' => 'auth',
    'filename' => 'AdminAuth.php',
    'filepath' => 'hooks'
);
