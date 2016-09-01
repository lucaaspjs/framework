<?php

$key = isset($_GET['key']) ? $_GET['key'] . "/" : "app/index";

$separador = explode("/", $key);
$controller = $separador[0];
$action = $separador[1] == NULL ? "index" : $separador[1];

require_once "system/controller.php";
require_once "system/model.php";
require_once "application/controllers/" . $controller . ".php";

$app = new $controller();
$app->$action();
