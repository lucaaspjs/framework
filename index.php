<?php

$key = isset($_GET['key']) ? $_GET['key'] : "app/index";

$separador = explode("/", $key);
$controller = $separador[0];
$action = $separador[1];
