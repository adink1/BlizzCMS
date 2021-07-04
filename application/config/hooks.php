<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['post_controller_constructor'][] = [
    'class' => 'Settings',
    'function' => 'initialize',
    'filename' => 'Settings.php',
    'filepath' => 'hooks'
];

$hook['post_controller_constructor'][] = [
    'class' => 'Installer',
    'function' => 'initialize',
    'filename' => 'Installer.php',
    'filepath' => 'hooks'
];

$hook['post_controller_constructor'][] = [
    'class' => 'Langs',
    'function' => 'initialize',
    'filename' => 'Langs.php',
    'filepath' => 'hooks'
];