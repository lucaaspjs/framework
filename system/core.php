<?php

/**
 * Description of core
 *
 * @author Lucaas
 */
class core {

    private $_explode;
    private $_url;
    public $_controller;
    public $_action;
    public $_params;

    public function __construct() {
        $this->setUrl();
        $this->setExplode();
        $this->setController();
        $this->setAction();
        $this->setParams();
        $this->run();
    }

    public function run() {
        $controller_path = CONTROLLERS . $this->_controller . ".php";
        if (!file_exists($controller_path)) {
            die("ERRO : Controle não existe");
        }

        require_once $controller_path;

        $app = new $this->_controller();

        if (!method_exists($app, $this->_action)) {
            die("ERRO : Método não existe");
        }

        $action = $this->_action;

        $app->$action($this->_params[0], $this->_params[1], $this->_params[2], $this->_params[3], $this->_params[4]);
    }

    private function setParams() {
        $num_params = 5;
        $temp = array_slice($this->_explode, 2);
        for ($i = 0; $i < $num_params; $i++) {
            $this->_params[] = isset($temp[$i]) ? $temp[$i] : NULL;
        }
    }

    private function setUrl() {
        $this->_url = (isset($_GET['url'])) ? $_GET['url'] . "/" : "app/index";
    }

    private function setExplode() {
        $this->_explode = explode("/", $this->_url);
    }

    private function setController() {
        $this->_controller = $this->_explode[0];
    }

    private function setAction() {
        $this->_action = ((!isset($this->_explode[1])) || ($this->_explode[1] == NULL)) ? "index" : $this->_explode[1];
    }

}
