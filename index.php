<?php

define('CONTROLLERS', 'application/controllers/');
define('VIEWS', 'application/views/');
define('MODELS', 'application/models/');

function __autoload($file) {
    require_once( MODELS . $file . '.php');
}

require_once('system/core.php');
require_once('system/controller.php');
require_once('system/model.php');

$core = new Core();
