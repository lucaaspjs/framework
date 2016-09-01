<?php

/**
 * Description of controller
 *
 * @author Lucaas
 */
class Controller {

    protected function view($nome) {
        require_once "application/views/" . $nome . ".php";
        exit;
    }

}
