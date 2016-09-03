<?php

/**
 * Description of controller
 *
 * @author Lucaas
 */
class Controller {

    protected function view($file, Array $vars = NULL) {
        if (count($vars) > 0) {
            extract($vars);
        }
        require_once "application/views/" . $file . ".php";
        exit;
    }

}
